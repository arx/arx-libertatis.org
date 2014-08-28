<?php

require_once __DIR__ . '/../config/irc.php';

$irc_handle = null;

function irc_message($recipient, $message, $ending = null) {
	global $irc_handle, $irc_pipe, $irc_max_line_length;
	
	// Open the IRC named pipe if it isn't open yet
	if($irc_handle === null) {
		$irc_handle = fopen($irc_pipe, 'a');
		if($irc_handle === false) {
			throw Exception('error opening irc pipe');
		}
		stream_set_timeout($irc_handle, 1);
	}
	
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
	
	if(fwrite($irc_handle, $recipient . ' ' . $message . "\n") === false) {
		throw Exception('error writing to irc pipe');
	}
	
}
