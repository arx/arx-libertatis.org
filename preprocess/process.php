<?

date_default_timezone_set('GMT');

require('log.php');
require('page.php');
require('pp.php');
require('api.php');

// --------------------------

// TODO parse command-line
$_config_file = $argv[1];
$_source_file = $argv[2];
$_output_file = $argv[3];

if($argc >= 5 && $argv[4] == 'quiet') {
	$_log_enabled = false;
}

if(!file_exists($_source_file)) {
	error('missing source file', v($_source_file));
}
$_source_file = realpath($_source_file);

info('source file', v($_source_file));

require($_config_file);

$_url = PP::to_url($_source_file);
if($_url !== null) {
	info('mapped source file to URL', v($_url));
} else {
	error('could not map source file to URL');
}

$page = PP::compile($_source_file, [ 'url' => $_url ]);

if(!isset($page->content)) {
	error('no content produced');
}

// Minify

// Guess the mimetype from the filename
if(!isset($page->mimetype)) {
	$f = $page->page;
	$p = strrpos($f, '.');
	if($p !== false) {
		$f = substr($f, $p + 1);
		if($f == 'html' || $f == 'htm') {
			$page->mimetype = 'text/html';
		} else if($f == 'rss') {
			$page->mimetype = 'application/rss+xml';
		} else if($f == 'css') {
			$page->mimetype = 'text/css';
		} else if($f == 'js') {
			$page->mimetype = 'application/javascript';
		}
	}
}

if(isset($page->mimetype)) {
	
	$minified = true;
	if($page->mimetype == 'text/html') {
		$content = minify_html($page->content);
	} else if($page->mimetype == 'application/rss+xml') {
		$content = minify_xml($page->content);
	} else if($page->mimetype == 'text/css') {
		$content = minify_css($page->content);
	} else if($page->mimetype == 'application/javascript') {
		$content = minify_js($page->content);
	} else {
		$content = $page->content;
		$minified = false;
	}
	
	if($minified) {
		$old_size = strlen($page->content);
		$new_size = strlen($content);
		$reduction = round(($old_size - $new_size) / $old_size * 100, 2);
		info('minified:', $old_size, 'bytes =>', $new_size, 'bytes', "($reduction% reduction)");
	}
	
} else {
	$content = $page->content;
}

if(file_put_contents($_output_file, $content) === false) {
	error('could not write', v($_output_file));
}

info('wrote', v($_output_file));

//file_put_contents('url.txt', $megalog);
