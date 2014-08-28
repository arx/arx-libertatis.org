<?php

// Filename of the named pipe that receives IRC messages
$GLOBALS['irc_pipe'] = '';

// Maximum allowed length of an IRC message
$GLOBALS['irc_max_line_length'] = 390;

include __DIR__ . '/private/irc.php';
