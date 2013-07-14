<?
// Release announcement

$p->inherit('newsitem');
$p->import('icons');

$p->news_url = to_url($p->page);
$p->news_id = preg_replace('/^.*?\/((news|releases)\/[^\/]+$)/', '$1', $p->news_url);

if(!isset($p->format)) {
	$p->format = 'html';
}

if(substr($p->news_id, 0, 5) === 'news/') {
	
	$p->type = 'news';
	$p->version = substr($p->news_id, 5);
	$p->elem_id = 'item-' . $p->version;
	$p->imgdir = 'news/images/' . $p->version . '/';
	
} else if(substr($p->news_id, 0, 9) === 'releases/') {
	
	$p->type = 'release';
	$p->version = substr($p->news_id, 9);
	$p->elem_id = 'release-' . $p->version;
	$p->imgdir = 'releases/images/' . $p->version . '/';
	
	if(!isset($p->title)) {
		if(isset($p->codename)) {
			$p->title = 'Arx Libertatis ' . $p->version . ' "' . $p->codename . '" released';
		} else {
			$p->title = 'Arx Libertatis ' . $p->version . ' bugfix release';
		}
	}
	
	if(!isset($p->changelog)) {
		$p->changelog = get_url('changelog:' . $p->version);
	}
	
	
} else {
	error('unsupported news category in', v($p->news_id));
}
