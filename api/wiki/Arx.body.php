<?php

// Prevent a user from accessing this file directly
if(!defined('MEDIAWIKI')) {
	exit(1);
}

include_once __DIR__ . '/../config/wiki.php';
require_once __DIR__ . '/../lib/irc.php';

class Arx {
	
	public static function onPageSaveComplete($article, $user, $summary, $flags, $revision, $result) {
		
		global $wiki_channel, $wiki_prefix, $wiki_namespaces, $wiki_ignore_minor, $wiki_users;
		
		try {
			
			if($revision === null) {
				return true;
			}
			
			$title = $article->getTitle();
			$namespace = $title->getNamespace();
			
			if(!isset($wiki_namespaces[$namespace])) {
				return true;
			}
			
			if($wiki_ignore_minor && ($flags & EDIT_MINOR)) {
				return true;
			}
			
			$username = $user->isAnon() ? 'An anonymous user' : $user->getName();
			if(isset($wiki_users[$username])) {
				$username = $wiki_users[$username];
			}
			$action = ($flags & EDIT_UPDATE) ? 'edited' : $wiki_namespaces[$namespace];
			$page = $title->getPrefixedText();
			
			$message = $username . ' ' . $action . ' ' . $page;
			$summary = trim($summary);
			$prefix = 'Created page with "';
			if($action == 'created' && substr($summary, 0, strlen($prefix)) == $prefix) {
				// Ignore automatically generated summary for new pages
				$summary = '';
			}
			if($summary != '') {
				if(substr($summary, 0, 2) == '/*' && substr($summary, -2) == '*/') {
					$summary = '→' . trim(substr($summary, 2, -2));
				}
				$message .= ' (' . $summary . ')';
			}
			
			$url = $wiki_prefix . $revision->getId();
			
			irc_message($wiki_channel, $message, ': ' . $url);
			
		} catch(Exception $e) {
			trigger_error($e, E_USER_ERROR);
		}
		
		return true;
	}
	
}
