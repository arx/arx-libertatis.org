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

<article itemscope itemtype="https://schema.org/SoftwareApplication" itemid="<?= url('p:home', false) ?>">
	<link itemprop="url" href="<?= url('p:home', false) ?>" />
	<link itemprop="softwareApplicationCategory" href="https://schema.org/GameApplication" />
	<link itemprop="downloadURL" href="<?= url('p:download') ?>" />
	<meta itemprop="softwareVersion" content="<?= encode_attr($version) ?>" />
	<link itemprop="versionChanges" href="<?= url('p:changelog') ?>" />
	<link itemprop="image" href="<?= url('r:icon-80') ?>" />
	
	<p itemprop="description" id="description">
		<b itemprop="name">Arx Libertatis</b> is a cross-platform, open source port of <a href="<?= url('p:arxfatalis') ?>">Arx Fatalis</a>, a 2002 first-person <span itemprop="softwareApplicationSubCategory">role-playing game</span> / dungeon crawler developed by <a href="<?= url('p:arkane') ?>">Arkane Studios</a>.
	</p>
	
	<iframe width="560" height="315" src="<?= ref('r:video') ?>" frameborder="0" allowfullscreen itemprop="videos" itemscope itemtype="https://schema.org/VideoObject"></iframe>
	
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
			There are <a href="<?= url('p:download') ?>">packages</a> for <span itemprop="operatingSystems"><?= $p->i_windows ?></span>, <span itemprop="operatingSystems"><?= $p->i_linux ?></span> and <span itemprop="operatingSystems"><?= $p->i_freebsd ?></span>, but you might also get it to compile and run under <span itemprop="operatingSystems"><?= $p->i_macos ?></span> and other operating systems.
		</p>
		
	</section>
	
	<footer id="sidebar">
		Share:
		<div id="share">
			<a id="identica"    href="<?= url('share:identica')    ?>" title="share on identi.ca"></a>
			<a id="reddit"      href="<?= url('share:reddit')      ?>" title="submit to reddit"></a>
			<a id="google-plus" href="<?= url('share:google-plus') ?>" title="share on Google+"></a>
			<a id="twitter"     href="<?= url('share:twitter')     ?>" title="share on Twitter"></a>
		</div>
		<div id="download">
			<a href="<?= url('p:download') ?>" class="button"><?= $p->i_download ?></a>
			<div class="os-icons">
				<!--
				--><a href="<?= url('p:download_windows') ?>" title="Windows download"><?= $p->big_windows_icon ?></a><!--
				--><a href="<?= url('p:download_linux')   ?>" title="Linux download"><?= $p->big_linux_icon   ?></a><!--
				--><a href="<?= url('p:download_freebsd') ?>" title="FreeBSD download"><?= $p->big_freebsd_icon ?></a><!--
				-->
			</div>
		</div>
		Arx Fatalis:
		<ul>
			<li><a href="<?= url('p:arxfatalis')  ?>"><?= $p->arkane_icon ?>Official Website</a></li>
			<li><a href="<?= url('p:arxjapanese') ?>"><?= $p->arkane_icon ?>Japanese Website</a></li>
			<li><a href="<?= url('p:wp_arx')      ?>"><?= $p->i_wikipedia ?></a></li>
			<li><a href="<?= url('p:pcgw_arx')    ?>"><?= $p->i_pcgamingwiki ?></a></li>
			<li><a href="<?= url('p:gog_arx')     ?>"><?= $p->i_gog ?></a></li>
			<li><a href="<?= url('p:steam_arx')   ?>"><?= $p->i_steam ?></a></li>
		</ul>
		<?= $p->i_arx ?>:
		<ul>
			<li><a href="<?= url('p:moddb')       ?>"><?= $p->i_moddb ?></a></li>
			<li><a href="<?= url('p:git')         ?>"><?= $p->i_github ?></a></li>
			<li><a href="<?= url('p:openhub')     ?>"><?= $p->i_openhub ?></a></li>
			<li><a href="<?= url('p:freshcode')   ?>"><?= $p->i_freshcode ?></a></li>
		</ul>
		Other Arx Projects:
		<ul>
			<li><a href="<?= url('p:arxendofsun') ?>"><?= $p->i_arxendofsun ?></a></li>
			<li><a href="<?= url('p:arxcatalyst') ?>"><?= $p->i_arxcatalyst ?></a></li>
		</ul>
		Arx Community:
		<ul>
			<li><a href="<?= url('p:forum_arx')   ?>"><?= $p->bethesda_icon ?> Official Forum</a></li>
			<li><a href="<?= url('p:forum_ttlg')  ?>"><?= $p->ttlg_icon ?> TTLG Forum</a></li>
			<li><a href="<?= url('p:subreddit')   ?>"><?= $p->i_reddit ?></a></li>
			<li><a href="<?= url('p:forum_gog')   ?>"><?= $p->gog_icon ?> GOG.com Forum</a></li>
			<li><a href="<?= url('p:comm_steam')  ?>"><?= $p->steam_icon ?> Steam Community</a></li>
			<li><a href="<?= url('p:group_steam') ?>"><?= $p->steam_icon ?> Steam Group</a></li>
		</ul>
		Friends:
		<ul>
			<li><a href="<?= url('p:openmw')      ?>"><?= $p->i_openmw ?></a></li>
		</ul>
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
	This page uses <a href="http://icondock.com/free/vector-social-media-icons">Vector Social Media Icons</a> by IconDock.com &amp; <a href="https://www.doublejdesign.co.uk/">Double-J Design</a>.<br>
	<a href="https://www.twolofbees.com/artwork.php?iid=870"><?= $p->linux_icon ?>Stycil Tux</a> by Cheeseness - CC0 1.0 Universal.
</p>
<? if(isset($news->footer)) { echo $news->footer; } ?>
