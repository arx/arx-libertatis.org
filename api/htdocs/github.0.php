<?php

/*
 * GitHub webhook -> IRC gateway
 */

include_once '../config/github.php';
require_once '../lib/irc.php';

// Indicate a fatal errot to the API user
function error($message, $code = 503) {
	$protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');
	header($protocol . ' ' . $code . ' ' . 'Meh');
	header('Content-Type: text/plain; charset=UTF-8');
	die($message);
}

// Send a message to the configured IRC channel
function msg($message, $ending = null) {
	global $github_channel;
	irc_message($github_channel, $message, $ending);
}

// Rewrite URL according to configured replacements
function url($url) {
	
	global $github_rewrites;
	foreach($github_rewrites as $pattern => $replacement) {
		if($pattern{0} != '/') {
			$pattern = str_replace('/', '\/', $pattern);
			$pattern = '/^https?\:\/\/github\.com\/' . $pattern . '$/';
		}
		$url = preg_replace($pattern, $replacement, $url);
	}
	
	return $url;
}

// Message prefix for an action performed by a user
function action_message($repo_name, $user_name) {
	
	global $github_refault_repo;
	
	$msg = '';
	if($repo_name != $github_refault_repo) {
		$msg .= '[' . $repo_name . '] ';
	}
	$msg .= $user_name;
	
	return $msg;
}

function handle_push($data) {
	
	global $github_sha_size, $github_max_commits;
	
	
	//// Parse push data
	
	// Get the type and name of the object that was modified (branch/tag)
	$refspec = explode('/', $data->ref);
	if(count($refspec) !== 3 || $refspec[0] !== 'refs') {
		throw Exception('unexpected refspec: ' . $data->ref);
	}
	$type = $refspec[1];
	$ref = $refspec[2];
	
	// Repository name
	$repo_name = $data->repository->name;
	$repo_url = $data->repository->url;
	
	// User that initiated this event
	$pusher_name = isset($data->pusher) ? $data->pusher->name : 'someone';
	
	// Check if the ref has been created or deleted
	$null_sha = '0000000000000000000000000000000000000000';
	$created = $data->created || $data->before === $null_sha;
	$deleted = $data->deleted || $data->after === $null_sha;

	// Get a list of new commits
	$new_commits = array();
	foreach($data->commits as $commit) {
		if($commit->distinct && trim($commit->message) != '') {
			$new_commits[] = $commit;
		}
	}
	$count = count($new_commits);
	
	// Base ref name
	if(isset($data->base_ref)) {
		$base_ref_name = preg_replace('/^refs\/(heads|tags)\//', '', $data->base_ref);
	}
	
	// Commit SHAs
	$before_sha = substr($data->before, 0, $github_sha_size);
	$after_sha = substr($data->after, 0, $github_sha_size);
	
	
	//// Construct and send summary message
	
	$msg = action_message($repo_name, $pusher_name);
	
	if($created) {
		
		if($type == 'tags') {
			$msg .= ' tagged ' . $ref . ' at ';
			$msg .= (isset($data->base_ref) ? $base_ref_name : $after_sha);
		} else {
			$msg .= ' created branch ' . $ref;
			if(isset($data->base_ref)) {
				$msg .= ' from ' . $base_ref_name;
			} elseif($count == 0) {
				$msg .= ' at ' . $after_sha;
			}
		}
		
		$msg .= ': ';
		if($count == 0) {
			$msg .= url($repo_url . '/commits/' . $ref);
		} else {
			$msg .= url($data->compare);
		}
		
	} elseif($deleted) {
		
		$msg .= ' deleted ' . ($type == 'tags' ? 'tag' : 'branch') . ' ' . $ref;
		$msg .= ' at ' . url($repo_url . '/commit/' . $before_sha);
		
	} elseif($data->forced) {
		
		$msg .= ' force-pushed ' . $ref . ' from ' . $before_sha . ' to ' . $after_sha;
		$msg .= ': ' . url($repo_url . '/commits/' . $ref);
		
	} else {
		
		if(count($data->commits) > 0 && $count == 0) {
			if(isset($data->base_ref)) {
				$msg .= ' merged ' . $base_ref_name . ' into ' . $ref;
			} else {
				$msg .= ' fast-forwarded ' . $ref;
			}
		} else {
			$msg .= ' pushed to ' . $ref;
		}
		
		$msg .= ': ';
		if($count == 1) {
			$msg .= url($new_commits[0]->url);
		} else {
			$msg .= url($data->compare);
		}
		
	}
	
	msg($msg);
	
	
	//// Construct and send commit messages
	
	if($count > $github_max_commits) {
		$count = $github_max_commits - 1;
	}
	
	for($i = 0; $i < $count; $i++) {
		
		$commit = $new_commits[$i];
		
		$commit_sha = substr($commit->id, 0, $github_sha_size);
		if(isset($commit->author->username) && !empty($commit->author->username)) {
			$committer_name = $commit->author->username;
		} else {
			$committer_name =  $commit->author->name;
		}
		$commit_title = trim($commit->message);
		if(($pos = strpos($commit_title, "\n")) !== false) {
			$commit_title = trim(substr($commit_title, 0, $pos)) . ' …';
		}
		
		$msg = $commit_sha . ' ';
		if($committer_name != $pusher_name) {
			$msg .= $committer_name . ': ';
		}
		$msg .= $commit_title;
		
		msg($msg, /* trim long lines */'');
		
	}
	
	if($count < count($new_commits)) {
		msg('… and ' . (count($new_commits) - $count) . ' more');
	}
	
}

function handle_pull_request($data) {
	
	if($data->action != 'opened' && $data->action != 'closed') {
		return; // Ignore other actions!
	}
	
	$msg = action_message($data->repository->name, $data->sender->login);
	$msg .= ' ' . $data->action . ' pull request';
	$msg .= ' ' . $data->pull_request->title;
	
	$end = ': ' . url($data->pull_request->html_url);
	
	msg($msg, $end);
	
}

function handle_fork($data) {
	
	$msg = action_message($data->repository->name, $data->sender->login);
	$msg .= ' forked the repository';
	$msg .= ': ' . $data->forkee->html_url;
	
	msg($msg);
	
}


// This API has only one resource
if(!isset($_GET['resource']) || $_GET['resource'] !== 'hook') {
	error('bad resource', 404);
}

// GitHub must connect via HTTPS
if(empty($_SERVER['HTTPS'])) {
	error('https required', 400);
}

// Webhooks don't use GET
if($_SERVER['REQUEST_METHOD'] !== 'POST') {
	error($_SERVER['REQUEST_METHOD'] . ' not supported', 405);
}

// Prevent spam, restrict access
if(!isset($_REQUEST['passkey']) || $_REQUEST['passkey'] !== $github_passkey) {
	error('bad key', 403);
}

// Get the event type from the X-Github-Event header
if(!isset($_SERVER['HTTP_X_GITHUB_EVENT'])) {
	error('missing event', 400);
}
$event = $_SERVER['HTTP_X_GITHUB_EVENT'];

// Decode the event data
if(!isset($HTTP_RAW_POST_DATA)) {
	error('missing payload', 400);
}
$payload = $HTTP_RAW_POST_DATA;
$data = json_decode($payload);
if($data === null) {
	error('invalid payload', 400);
}

try {
	switch($event) {
		case 'ping':         error('pong', 200);         break;
		case 'push':         handle_push($data);         break;
		case 'pull_request': handle_pull_request($data); break;
		case 'fork':         handle_fork($data);         break;
		default: error('unexpected event', 400); break;
	}
} catch(Exception $e) {
	error_log('error handling ' . $event . ' event ' . $payload . ': ' . $e);
	error('error handling event', 500);
}
