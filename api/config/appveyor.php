<?php

# API key to prevent spam
$GLOBALS['appveyor_passkey'] = '';

# IRC channel to send messages to
$GLOBALS['appveyor_channel'] = '#arx';

# How many digits of the commit SHA to show in commit messages
$GLOBALS['appveyor_sha_size'] = 7;

// Name of the default repo whose name does not need to be included in IRC messages
$GLOBALS['appveyor_refault_project'] = 'arxlibertatis';

// Rewrites to apply to github URLs
$GLOBALS['appveyor_rewrites'] = array(
	# Generic rewrites for arx repos
	'/^https?\:\/\/github\.com\/arx\/([^\/]*)\/pull\/(.*)$/' => 'https://arx.vg/g/\1/pull/\2',
	'/^https?\:\/\/github\.com\/arx\/([^\/]*)\/commit\/([0-9a-f]{5,7})[0-9a-f]*$/' => 'https://arx.vg/g/\1/\2',
	# Special additional shortening for the main repo
	'/^https:\/\/arx\.vg\/g\/ArxLibertatis\//' => 'https://arx.vg/',
);

include __DIR__ . '/private/appveyor.php';
