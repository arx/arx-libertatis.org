<?php

/*
 * AppVeyor webhook -> IRC gateway
 */

include_once __DIR__ . '/../config/appveyor.php';
require_once __DIR__ . '/../lib/irc.php';

// Indicate a fatal error to the API user
function error($message, $code = 503) {
	$protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');
	header($protocol . ' ' . $code . ' ' . 'Meh');
	header('Content-Type: text/plain; charset=UTF-8');
	die($message);
}

// Send a message to the configured IRC channel
function msg($message, $ending = null) {
	global $appveyor_channel;
	irc_message($appveyor_channel, $message, $ending);
}

// Rewrite URL according to configured replacements
function url($url) {
	
	global $appveyor_rewrites;
	foreach($appveyor_rewrites as $pattern => $replacement) {
		$url = preg_replace($pattern, $replacement, $url);
	}
	
	return $url;
}

function handle_build($data) {

	global $appveyor_sha_size;
	
	$event = $data->eventData;
	
	switch($data->eventName) {
		case 'build_failure': break;
		case 'build_success': break;
		default: throw Exception('unexpected event: ' . $data->eventName);
	}
	
	$baseurl = 'https://github.com/' . $event->repositoryName . '/';
	$sha = substr($event->commitId, 0, $appveyor_sha_size);
	
	$msg = 'Windows build ' . ($event->passed ? 'passed' : 'failed');
	$msg .= ' for ' . url($baseurl . 'commit/' . $sha);
	if($event->isPullRequest) {
		$msg .= ' from ' . url($baseurl . 'pull/' . $event->pullRequestId);
	} else {
		$msg .= ' on ' . $event->branch;
	}
	
	msg($msg, ': ' . url($event->buildUrl));
	
}


// This API has only one resource
if(!isset($_GET['resource']) || $_GET['resource'] !== 'hook') {
	error('bad resource', 404);
}

// AppVeyor must connect via HTTPS
if(empty($_SERVER['HTTPS'])) {
	error('https required', 400);
}

// Webhooks don't use GET
if($_SERVER['REQUEST_METHOD'] !== 'POST') {
	error($_SERVER['REQUEST_METHOD'] . ' not supported', 405);
}

// Prevent spam, restrict access
if(!isset($_REQUEST['passkey']) || $_REQUEST['passkey'] !== $appveyor_passkey) {
	error('bad key', 403);
}

// Decode the event data
if(!isset($HTTP_RAW_POST_DATA)) {
	error('missing payload', 400);
}
// See https://www.appveyor.com/docs/notifications/#webhooks for format
$payload = $HTTP_RAW_POST_DATA;
$data = json_decode($payload);
if($data === null) {
	error('invalid payload', 400);
}

try {
	handle_build($data);
} catch(Exception $e) {
	error_log('error handling event ' . $payload . ': ' . $e);
	error('error handling event', 500);
}
