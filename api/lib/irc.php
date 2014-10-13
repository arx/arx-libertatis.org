<?php

require_once __DIR__ . '/../config/irc.php';

$GLOBALS['irc_handle'] = null;
$GLOBALS['irc_fallback'] = false;


function irc_send($message) {
	
	global $irc_handle, $irc_fallback, $irc_socket, $irc_buffer;
	
	// Open the IRC named pipe if it isn't open yet
	if($irc_handle === null) {
		$irc_handle = fsockopen($irc_socket, -1, $errno, $errstr, 1);
		if($irc_handle !== false) {
			stream_set_timeout($irc_handle, 1);
		}
	}
	
	// Try to send the message
	$result = false;
	if($irc_handle !== false) {
		$result = fwrite($irc_handle, $message);
	}
	
	// Open fallback buffer file and write message if needed
	if($result === false && $irc_fallback === false) {
		$irc_fallback = true;
		$irc_handle = fopen($irc_buffer, 'a');
		chmod($irc_buffer, 0666);
		if($irc_handle !== false) {
			$result = fwrite($irc_handle, $message);
		}
	}
	
	if($result === false) {
		throw Exception('error writing to irc pipe');
	}
	
}

function irc_message($recipient, $message, $ending = null) {
	global $irc_max_line_length;
	
	// Cut off long messages that are supposed to fit on one line
	if($ending !== null) {
		if(strlen($message) > $irc_max_line_length) {
			if(substr($message, -6) == ' …') {
				// Prevent duplicated ellipsis
				$message = substr($message, 0, -6);
			}
			$message = substr($message, 0, $irc_max_line_length - 6 - strlen($ending)) . ' …';
		}
		$message .= $ending;
	}
	
	// Remove newlines
	$message = str_replace("\n", '', str_replace("\r", '', $message));
	
	irc_send($recipient . ' ' . $message . "\n");
}
