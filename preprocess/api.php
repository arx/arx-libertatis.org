<?

set_include_path(__DIR__ . '/lib/minify/min/lib' . PATH_SEPARATOR . get_include_path());

require_once('Minify.php');
require_once('Minify/Source.php');

/*!
 * Resolve a virtual URL
 */
function get_url($resource) {
	return PP::resolve($resource);
}

/*!
 * Resolve a virtual URL, minimize it, encode it and echo it.
 */
function url($resource, $optimize = true, $protocol_relative = false) {
	global $p;
	$url = get_url($resource);
	if($optimize) {
		global $megalog;
		$megalog .= "\n + \"" . $resource . "\" = \"" . $url . "\"";
		$url = $p->optimize_url($url, $protocol_relative);
	}
	echo encode_attr($url);
}

function ref($resource) {
	url($resource, true, true);
}

function inject($var = 'content') {
	global $p;
	echo $p->get($var);
}

function attr($var) {
	global $p;
	echo encode_attr($p->get($var));
}

function text($var) {
	global $p;
	echo encode_text($p->get($var));
}

function encode_text($text) {
	return htmlspecialchars($text, ENT_NOQUOTES);
}

function encode_attr($text) {
	return htmlspecialchars($text);
}

function _minify($content, $type) {
	if(!PP::minify_enabled()) {
		return $content;
	}
	$source = new Minify_Source([
		'id' => 'evil-source-file',
		'content' => $content,
		'contentType' => $type,
	]);
	return Minify::combine([ $source ]);
	
}

function minify_html($content) {
	return _minify($content, Minify::TYPE_HTML);
}

function minify_xml($content) {
	// Specify configuration
	$config = array(
		'input-xml'  => true,
		'output-xml' => true,
		'wrap'       => 200
	);
	
	// Tidy
	$tidy = new tidy;
	$tidy->parseString($content, $config, 'utf8');
	$tidy->cleanRepair();
	return (string)$tidy;
}

function minify_css($content) {
	return _minify($content, Minify::TYPE_CSS);
}

function minify_js($content) {
	return _minify($content, Minify::TYPE_JS);
}

function compile($file, $options = [ ]) {
	global $p;
	if(!isset($options['url']) && isset($p->url)) {
		$options['url'] = $p->url;
	}
	return PP::compile(PP::find_file($file), $options);
}

function compile_all($pattern, $options = [ ]) {
	global $p;
	if(!isset($options['url']) && isset($p->url)) {
		$options['url'] = $p->url;
	}
	$files = PP::find_files($pattern);
	$pages = [ ];
	foreach($files as $file) {
		$pages[] = PP::compile($file, $options);
	}
	return $pages;
}

function inject_page($file, $options) {
	$page = compile($file, $options);
	if(isset($page->content)) {
		echo $page->content;
	}
}

function to_url($page) {
	return PP::to_url(PP::find_file($page));
}
