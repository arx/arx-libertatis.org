<?php

# IRC channel to send messages to
$GLOBALS['wiki_channel'] = '#arxfatalis';

// Prefix for Wiki URLs
$GLOBALS['wiki_prefix'] = 'http://arx.vg';

// Wiki namespaces to watch
$GLOBALS['wiki_namespaces'] = array(
	NS_MAIN => 'created',
	NS_FILE => 'uploaded',
	NS_HELP => 'created',
	NS_CATEGORY => 'created',
);

// Ignore minor edits?
$GLOBALS['wiki_ignore_minor'] = true;

include __DIR__ . '/private/wiki.php';
