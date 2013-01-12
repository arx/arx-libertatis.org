<?
// RSS feed for news items

// RSS feeds don't suppot relative URLs at all
PP::optimize_urls(PP::URL_ABSOLUTE);

$p->mimetype = 'application/rss+xml';

$p->import('newslist');

$max_items = 10;

?>
<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title>Arx Libertatis Announcements</title>
		<link><? url('p:home') ?></link>
		<description>News of Arx Libertatis, a cross-platform port of Arx Fatalis.</description>
		<language>en-us</language>
		<atom:link href="<? url('p:rss') ?>" rel="self" type="application/rss+xml" />
<?

$count = 0;
foreach($p->items as $item) {
	
	inject_page($item->page, [ 'format' => 'rss']);
	
	$count++;
	if($count >= $max_items) {
		break;
	}
}

?>
	</channel>
</rss>
