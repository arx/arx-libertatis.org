<?php

// Prevent a user from accessing this file directly
if(!defined('MEDIAWIKI')) {
	exit(1);
}

include_once __DIR__ . '/../config/wiki.php';
require_once __DIR__ . '/../lib/irc.php';

class Arx {
	
	public static function pageContentSaveComplete($article, $user, $content, $summary,
	                                               $isMinor, $isWatch, $section, $flags,
	                                               $revision, $status, $baseRevId) {
		
		global $wiki_channel, $wiki_prefix, $wiki_namespaces, $wiki_ignore_minor;
		
		try {
			
			if($revision === null) {
				return true;
			}
			
			$title = $article->getTitle();
			$namespace = $title->getNamespace();
			
			if(!isset($wiki_namespaces[$namespace])) {
				return true;
			}
			
			if($wiki_ignore_minor && $isMinor) {
				return true;
			}
			
			$username = $user->isAnon() ? 'An anonymous user' : $user->getName();
			$action = ($flags & EDIT_UPDATE) ? 'edited' : $wiki_namespaces[$namespace];
			$page = $title->getPrefixedText();
			
			$message = $username . ' ' . $action . ' ' . $page;
			$summary = trim($summary);
			if($summary != '') {
				if(substr($summary, 0, 2) == '/*' && substr($summary, -2) == '*/') {
					$summary = '→' . trim(substr($summary, 2, -2));
				}
				$message .= ' (' . $summary . ')';
			}
			
			$url = $wiki_prefix . '?diff=' . $revision->getId();
			
			irc_message($wiki_channel, $message, ': ' . $url);
			
		} catch(Exception $e) {
			trigger_error($e, E_USER_ERROR);
		}
		
		return true;
	}
	
}