<?
// Release announcement

$p->inherit('newsitem');
$p->import('icons');

$p->news_url = to_url($p->page);
$p->news_id = preg_replace('/^.*?\/((news|releases)\/[^\/]+$)/', '$1', $p->news_url);

if(substr($p->news_id, 0, 5) === 'news/') {
	
	$p->type = 'news';
	$p->version = substr($p->news_id, 5);
	$p->elem_id = 'item-' . $p->version;
	
} else if(substr($p->news_id, 0, 9) === 'releases/') {
	
	$p->type = 'release';
	$p->version = substr($p->news_id, 9);
	$p->elem_id = 'release-' . $p->version;
	
	if(!isset($p->title)) {
		if(isset($p->codename)) {
			$p->title = 'Arx Libertatis ' . $p->version . ' "' . $p->codename . '" released';
		} else {
			$p->title = 'Arx Libertatis ' . $p->version . ' bugfix release';
		}
	}
	
	if(!isset($p->changelog)) {
		if(isset($p->codename)) {
			$c = str_replace('%', '.', rawurlencode(str_replace(' ', '_', $p->codename)));
			$p->changelog = get_url('changelog:Arx_Libertatis_' . $p->version . '_.22' . $c . '.22');
		} else {
			$p->changelog = get_url('changelog:Patch_' . $p->version);
		}
	}
	
	
} else {
	error('unsupported news category in', v($p->news_id));
}
