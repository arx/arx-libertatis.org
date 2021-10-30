<?php

# API key to prevent spam
$GLOBALS['github_passkey'] = '';

# IRC channel to send messages to
$GLOBALS['github_channel'] = '#arx';

# How many digits of the commit SHA to show in commit messages
$GLOBALS['github_sha_size'] = 7;

# Maximum number of commit messages to show for each push
$GLOBALS['github_max_commits'] = 4;

// Name of the default repo whose name does not need to be included in IRC messages
$GLOBALS['github_refault_repo'] = 'ArxLibertatis';

// Rewrites to apply to github URLs
$GLOBALS['github_rewrites'] = array(
	# Generic rewrites for arx repos
	'arx/([^/]*)/runs/(.*?)\\?check_suite_focus=true' => 'https://arx.vg/g/\1/run/\2',
	'arx/([^/]*)/pull/(.*)' => 'https://arx.vg/g/\1/pull/\2',
	'arx/([^/]*)/commits/(.*)' => 'https://arx.vg/g/\1/ref/\2',
	'arx/([^/]*)/commit/([0-9a-f]{5,7})[0-9a-f]*' => 'https://arx.vg/g/\1/\2',
	'arx/([^/]*)/compare/([0-9a-f]{5,7})[0-9a-f]*\^?\.\.\.([0-9a-f]{5,7})[0-9a-f]*'
		=> 'https://arx.vg/g/\1/\2..\3',
	# Special additional shortening for main and website repos
	'/^https:\/\/arx\.vg\/g\/arx\-libertatis\.org\//' => 'https://arx.vg/web/',
	'/^https:\/\/arx\.vg\/g\/ArxLibertatis\//' => 'https://arx.vg/',
);

include __DIR__ . '/private/github.php';
