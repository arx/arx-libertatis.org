<?
// Arx Libertatis homepage

$p->inherit('frame');
$p->import('icons');

$p->title = 'Arx Libertatis - a cross-platform port of Arx Fatalis';

$news = compile('news.html', [
	'max_items' => 2,
	'typed_max_items' => [ 'news' => 1, 'release' => 1 ],
	'detail' => 'synopsis',
	'frame' => false
]);

$version = null;
foreach($news->items as $item) {
	if($item->type == 'release') {
		$version = $item->version;
		break;
	}
}

?>

<article itemscope itemtype="http://schema.org/SoftwareApplication" itemid="<?= url('p:home', false) ?>">
	<link itemprop="url" href="<?= url('p:home', false) ?>" />
	<link itemprop="softwareApplicationCategory" href="http://schema.org/GameApplication" />
	<link itemprop="downloadURL" href="<?= url('p:download') ?>" />
	<meta itemprop="softwareVersion" content="<?= encode_attr($version) ?>" />
	<link itemprop="versionChanges" href="<?= url('p:changelog') ?>" />
	<link itemprop="image" href="<?= url('r:icon-80') ?>" />
	
	<p itemprop="description" id="description">
		<b itemprop="name">Arx Libertatis</b> is a cross-platform, open source port of <a href="<?= url('p:arxfatalis') ?>">Arx Fatalis</a>, a 2002 first-person <span itemprop="softwareApplicationSubCategory">role-playing game</span> / dungeon crawler developed by <a href="<?= url('p:arkane') ?>">Arkane Studios</a>.
	</p>
	
	<iframe width="560" height="315" src="<?= ref('r:video') ?>" frameborder="0" allowfullscreen itemprop="videos" itemscope itemtype="http://schema.org/VideoObject"></iframe>
	
	<section>
		
<?
		inject_page('screenshot', [
			'float' => 'left',
			'link' => 'p:gallery',
			'image' => 'r:spellcasting',
			'caption' => 'Spellcasting in Arx Fatalis',
			'microcode' => true
		])
?>
		
		<p>
			Arx Fatalis features crafting, melee and ranged combat, as well as a unique casting system where the player draws runes in real time to effect the desired spell.
		</p>
		
		<p>
			Arx Libertatis <b><?= encode_text($version) ?></b> updates and improves Arx Fatalis by supporting modern systems, porting the game to new systems as well as eliminating bugs and limitations. In the future we plan to improve and modernize the engine as well as enable customizations and mods by the community.
		</p>
		
	</section>
	
	<section>
		
<?
		inject_page('screenshot', [
			'float' => 'right',
			'link' => 'p:gallery',
			'image' => 'r:castle-of-arx',
			'caption' => 'Castle of Arx',
			'microcode' => true
		])
?>
		
		<p>
			Arx Libertatis is based on the publicly released <a href="<?= url('p:patch') ?>">Arx Fatalis sources</a> and available under the <a href="<?= url('p:gpl') ?>">GPL 3+ license</a>. This does however not include the game data, so you need to <a href="<?= url('wiki:Getting_the_game_data') ?>">obtain a copy of the original Arx Fatalis</a>  or its demo to play Arx Libertatis.
		</p>
		
		<p>
			There are <a href="<?= url('p:download') ?>">packages</a> for <span itemprop="operatingSystems"><?= $p->i_windows ?></span>, <span itemprop="operatingSystems"><?= $p->i_linux ?></span> and <span itemprop="operatingSystems"><?= $p->i_freebsd ?></span>, but you might also get it to compile and run under <span itemprop="operatingSystems"><?= $p->i_macosx ?></span> and other operating systems.
		</p>
		
	</section>
	
	<footer id="share">
		<a id="identica" href="<?= url('share:identica') ?>" title="share on identi.ca"></a>
		<a id="reddit" href="<?= url('share:reddit') ?>" title="submit to reddit"></a>
		<a id="google-plus" href="<?= url('share:google-plus') ?>" title="share on Google+"></a>
		<a id="twitter" href="<?= url('share:twitter') ?>" title="share on Twitter"></a>
		<a id="facebook" href="<?= url('share:facebook') ?>" title="share on Facebook"></a>
		<hr>
		<a id="ohloh" href="<?= url('p:ohloh') ?>" title="ohloh page"></a>
		<a id="github" href="<?= url('p:git') ?>" title="GitHub project"></a>
		<a id="sourceforge" href="<?= url('p:sourceforge') ?>" title="SourceForge.net project"></a>
		<a id="moddb" href="<?= url('p:moddb') ?>" title="Mod DB page"></a>
		<a id="freecode" href="<?= url('p:freecode') ?>" title="free(code) page"></a>
	</footer>
	
</article>

<?

echo $news->content;

?>

<?
 $p->header()->append()
?>

<meta name="description" content="Arx Libertatis is a cross-platform, open source port of Arx Fatalis, a 2002 first-person role-playing game developed by Arkane Studios.">
<meta name="keywords" content="arx, arx fatalis, linux, port, fixed, patch, update, arx libertatis, cross-platform, open source, role-playing, game">
<? if(isset($news->header)) { echo $news->header; } ?>

<?
 $p->footer()->append()
?>

<p>
	This page uses <a href="http://icondock.com/free/vector-social-media-icons">Vector Social Media Icons</a> by IconDock.com &amp; <a href="http://www.doublejdesign.co.uk">Double-J Design</a>.
</p>
<? if(isset($news->footer)) { echo $news->footer; } ?>
