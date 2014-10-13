<?php

// Filename of the named pipe that receives IRC messages
$GLOBALS['irc_pipe'] = '';

// Maximum allowed length of an IRC message
$GLOBALS['irc_max_line_length'] = 390;

include __DIR__ . '/private/irc.php';

if(!isset($GLOBALS['irc_socket'])) {
	$GLOBALS['irc_socket'] = 'unix://' . $GLOBALS['irc_pipe'] . '/socket';
}

if(!isset($GLOBALS['irc_buffer'])) {
	$GLOBALS['irc_buffer'] = $GLOBALS['irc_pipe'] . '/buffer';
}
