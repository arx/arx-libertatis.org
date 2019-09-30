<?php

// Prevent a user from accessing this file directly
if(!defined('MEDIAWIKI')) {
	exit(1);
}

// Extension credits that will show up on Special:Version
$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Arx',
	'author' => 'Arx Libertatis Team',
	'url' => 'https://arx-libertatis.org/',
	'description' => 'Arx stuff',
	'version'  => 1.0,
);

// Autoload this extension's classes
$wgAutoloadClasses['Arx'] = __DIR__ . DIRECTORY_SEPARATOR . 'Arx.body.php';

// Register a page save hook
$wgHooks['PageContentSaveComplete'][] = 'Arx::pageContentSaveComplete';
