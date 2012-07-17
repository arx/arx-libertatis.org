<?
// News item

$p->param('title', 'A title describing the news item (any string)');
$p->param('time', 'The date / time when the news was published (a unix time)');
$p->param('synopsis', 'The first paragraph of the news');
$p->param('details', 'More news', '');
$p->param('updates', 'Post-publishing additions', '');
$p->param('format', 'Generate the news item as HTML or rss', 'html');
// title -> synopsis -> details -> full
$p->param('detail', 'Post-publishing additions', 'full');
$p->param('id', 'News id', '');

$news_date = encode_text(date('Y-m-d', $p->time));

$news_url = get_url('main:' . $p->page);
if(substr($news_url, -5) == ".html") {
	$news_url = substr($news_url, 0, -5);
}
$p->news_url = $news_url;

$p->news_id = preg_replace('/^.*?\/((releases|news)\/[^\/]+$)/', '$1', $news_url);

if(substr($p->news_id, 0, 5) === 'news/') {
	$p->type = 'news';
	$p->version = substr($p->news_id, 5);
	$elem_id = 'item-' . $p->version;
} else if(substr($p->news_id, 0, 9) === 'releases/') {
	$p->type = 'release';
	$p->version = substr($p->news_id, 9);
	$elem_id = 'release-' . $p->version;
} else {
	error('unsupported news category in', v($p->news_id));
}

if($p->format == 'html'):
	
	if($p->detail == 'full') {
		$p->inherit('newsframe');
		$p->import('newslist');
	}
	
	$news_datetime = encode_attr(date('c', $p->time));
	
?>

<div class="item" id="<? echo $elem_id ?>" itemprop="blogPosts" itemscope itemtype="http://schema.org/BlogPosting" itemid="<? url($news_url, false) ?>">
	<link itemprop="url" href="<? url($news_url, false) ?>" />
	<h3><a itemprop="name" href="<? url($news_url) ?>"><? text('title') ?></a> <time itemprop="datePublished" datetime="<? echo $news_datetime ?>"><? echo $news_date ?></time></h3>
<?
	
	// For the lowest detail level, only show the title and date
	if($p->detail != 'title'):
		
		if($p->detail != 'synopsis'):
?>
	<div itemprop="articleBody">
<?
		else:
?>
	<div>
<?
		endif;
		
		// The synopsis is always shown except for the lowest detail level
		inject('synopsis')
		
?>
<?
		
		// Show all text if the detail level is high enough,
		// otherwise indicate that there are more details
		if($p->detail != 'synopsis') {
			inject('details');
		} else if($p->details != ''): ?>
		<div class="more"><a href="<? url($news_url) ?>">read more</a></div><?
		endif;
		
?>
	</div>
<?
		
		// Post-publishing updates are only shown with the highest detail level
		if($p->detail == 'full'):
			
			inject('updates');
			
			// Add a link to the next release if there is any
			if($p->type == 'release'):
			
				$next = null;
				foreach($p->items as $item) {
					if($item->page == $p->page) {
						break;
					}
					if($item->type == 'release') {
						$next = $item;
					}
				}
				
				if($next !== null):
?>
<p>
	<b>Update:</b> <a href="<? url($next->news_url) ?>">Arx Libertatis <? echo encode_text($next->version) ?></a> has been released. <a href="<? url('sfdl:arx-libertatis-' . $p->version . '/') ?>">Version <? text('version') ?> is archived at SourceForge.</a>
</p>
<?
				endif;
				
			endif /* $p->type == 'release' */;
			
		endif /* $p->detail == 'full' */;
		
?>
<?
	
	endif /* $p->detail != 'title' */;
	
?>
</div>
<?
	
	// For the highest detail level, also show navigation links!
	if($p->detail == 'full'):
		
		$i = 0;
		for(; $i < count($p->items); $i++) {
			$item = $p->items[$i];
			if($item->page == $p->page) {
				break;
			}
		}
		
		if($i < count($p->items)):
?>

<div class="navigate">
<?
			
			if($i + 1 < count($p->items)) :
				$prev = $p->items[$i + 1];
?>
	<div class="prev"><a href="<? url($prev->news_url) ?>">previous</a></div>
<?
			endif;
			
			if($i > 0) :
				$next = $p->items[$i - 1];
?>
	<div class="next"><a href="<? url($next->news_url) ?>">next</a></div>
<?
			endif;
?>
</div>
<?
		endif /* $i < count($p->items) */;
		
	endif /* $p->detail == 'full */;
?>

<?
	
elseif($p->format == 'rss'):
	
?>

<item>
	<title><? text('title') ?></title>
	<link><? url($news_url) ?></link>
	<pubDate><? echo encode_text(date('r', $p->time)) ?></pubDate>
	<guid isPermaLink="true"><? url($news_url) ?></guid>
	<description>
<?
	
	// RSS view always shows the full text but never the updates
	
	$body = $p->synopsis . "\n" . $p->details;
	echo encode_text(minify_html($body));
	
?>
	</description>
</item>

<?
	
endif;
