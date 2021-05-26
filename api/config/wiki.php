<?php

# IRC channel to send messages to
$GLOBALS['wiki_channel'] = '#arx';

// Prefix for Wiki URLs
$GLOBALS['wiki_prefix'] = 'https://arx.vg/wiki/';

// Wiki namespaces to watch
$GLOBALS['wiki_namespaces'] = array(
	NS_MAIN => 'created',
	NS_FILE => 'uploaded',
	NS_HELP => 'created',
	NS_CATEGORY => 'created',
	430 => 'created', // Script
	440 => 'created', // Action
);

// Ignore minor edits?
$GLOBALS['wiki_ignore_minor'] = true;

// Remap user names
$GLOBALS['wiki_users'] = array( );

include __DIR__ . '/private/wiki.php';
