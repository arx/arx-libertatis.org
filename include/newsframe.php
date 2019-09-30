<?
// News item / listing frame

$p->param('frame', 'Build a full page with  a frame', true);

if($p->frame) {
	$p->inherit('frame');
}

?>
<section id="news" itemscope itemtype="https://schema.org/Blog" itemid="<?= url('p:news', false) ?>">
	<link itemprop="url" href="<?= url('p:news', false) ?>" />
	<a id="rss" class="rss icon" href="<?= url('p:rss') ?>" title="rss feed"></a>
	
	<h2 itemprop="name"><span class="hidden">Arx Libertatis</span> Announcements</h2>
	
<? inject() ?>
	
</section>

<?
 $p->header()->append()
?>

<link rel="alternate" type="application/rss+xml" title="Arx Libertatis Announcements" href="<?= url('p:rss') ?>"><?
