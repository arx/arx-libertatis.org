<?
// Arx Libertatis homepage

$p->inherit('frame');
$p->import('icons');

$p->title = 'Arx Libertatis - a cross-platform port of Arx Fatalis';

?>

<div id="content" itemscope itemtype="http://schema.org/SoftwareApplication" itemid="<? url('p:home', false) ?>">
	<link itemprop="url" href="<? url('p:home', false) ?>" />
	<link itemprop="softwareApplicationCategory" href="http://schema.org/GameApplication" />
	<link itemprop="downloadURL" href="<? url('p:download') ?>" />
	<meta itemprop="softwareVersion" content="<? url('c:version') ?>" />
	<link itemprop="versionChanges" href="<? url('p:changelog') ?>" />
	<link itemprop="image" href="<? url('r:icon-80') ?>" />
	
	<div id="share">
		<a id="identica" href="<? url('share:identica') ?>" title="share on identi.ca"></a>
		<a id="reddit" href="<? url('share:reddit') ?>" title="submit to reddit"></a>
		<a id="google-plus" href="<? url('share:google-plus') ?>" title="share on Google+"></a>
		<a id="twitter" href="<? url('share:twitter') ?>" title="share on Twitter"></a>
		<a id="facebook" href="<? url('share:facebook') ?>" title="share on Facebook"></a>
		<hr>
		<a id="ohloh" href="<? url('p:ohloh') ?>" title="ohloh page"></a>
		<a id="github" href="<? url('p:git') ?>" title="GitHub project"></a>
		<a id="sourceforge" href="<? url('p:sourceforge') ?>" title="SourceForge.net project"></a>
		<a id="moddb" href="<? url('p:moddb') ?>" title="Mod DB page"></a>
		<a id="freecode" href="<? url('p:freecode') ?>" title="free(code) page"></a>
	</div>
	
	<p itemprop="description">
		<b itemprop="name">Arx Libertatis</b> is a cross-platform, open source port of <a href="<? url('p:arxfatalis') ?>">Arx Fatalis</a>, a 2002 first-person <span itemprop="softwareApplicationSubCategory">role-playing game</span> / dungeon crawler developed by <a href="<? url('p:arkane') ?>">Arkane Studios</a>.
	</p>
	
	<iframe width="560" height="315" src="<? url('r:video') ?>" frameborder="0" allowfullscreen itemprop="videos" itemscope itemtype="http://schema.org/VideoObject"></iframe>
	
	<div class="section">
		
		<div class="screenshot" itemprop="screenshots" itemscope itemtype="http://schema.org/ImageObject">
			<a itemprop="url" href="<? url('p:gallery') ?>">
				<img itemprop="thumbnail" src="<? url('r:spellcasting') ?>" width="156" height="130" alt="Spellcasting screenshot">
			</a>
			<span itemprop="caption">Spellcasting in Arx Fatalis</span>
		</div>
		
		<p>
			Arx Fatalis features crafting, melee and ranged combat, as well as a unique casting system where the player draws runes in real time to effect the desired spell.
		</p>
		
		<p>
			Arx Libertatis updates and improves Arx Fatalis by supporting modern systems, porting the game to new systems as well as eliminating bugs and limitations. In the future we plan to improve and modernize the engine as well as enable customizations and mods by the community.
		</p>
		
	</div>
	
	<div class="section">
		
		<div class="right screenshot" itemprop="screenshots" itemscope itemtype="http://schema.org/ImageObject">
			<a itemprop="url" href="<? url('p:gallery') ?>">
				<img itemprop="thumbnail" src="<? url('r:castle-of-arx') ?>" width="156" height="130" alt="Screenshot of the Castle of Arx">
			</a>
			<span itemprop="caption">Castle of Arx</span>
		</div>
		
		<p>
			Arx Libertatis is based on the publicly released <a href="<? url('p:patch') ?>">Arx Fatalis sources</a> and available under the <a href="<? url('p:gpl') ?>">GPL 3+ license</a>. This does however not include the game data, so you need to <a href="<? url('wiki:Getting_the_game_data') ?>">obtain a copy of the original Arx Fatalis</a>  or its demo to play Arx Libertatis.
		</p>
		
		<p>
			There are <a href="<? url('p:download') ?>">packages</a> for <? echo $p->windows_icon ?><span itemprop="operatingSystems">Windows</span>, <? echo $p->linux_icon ?><span itemprop="operatingSystems">Linux</span> and <? echo $p->freebsd_icon ?><span itemprop="operatingSystems">FreeBSD</span>, but you might also get it to compile and run under <? echo $p->macosx_icon ?><span itemprop="operatingSystems">Mac OS X</span> and other operating systems.
		</p>
		
	</div>
	
</div>

<?

inject_page('news.html', [
	'max_items' => 2,
	'typed_max_items' => [ 'news' => 1, 'release' => 1 ],
	'typed_detail' => [ 'news' => 'synopsis', 'release' => 'detail' ],
	'frame' => false
])

?>

<?
 $p->header()->append()
?>

<meta name="description" content="Arx Libertatis is a cross-platform, open source port of Arx Fatalis, a 2002 first-person role-playing game developed by Arkane Studios.">
<meta name="keywords" content="arx, arx fatalis, linux, port, fixed, patch, update, arx libertatis, cross-platform, open source, role-playing, game">

<?
 $p->footer()->append()
?>

<p>
	This page uses <a href="http://icondock.com/free/vector-social-media-icons">Vector Social Media Icons</a> by IconDock.com &amp; <a href="http://www.doublejdesign.co.uk">Double-J Design</a>.
</p><?
