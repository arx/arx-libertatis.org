<?
// Contact page

$p->inherit('frame');
$p->title = 'Contact';
$p->import('icons');

?>

<section>
	
	<h2>Contact</h2>
	
	<h3>IRC Channel</h3>
	
	<p>
		We mainly hang out in the <b><a href="<?= url('p:irc') ?>"><?= url('c:irc') ?></a></b> channel on the <a href="<?= url('p:libera') ?>">Libera.Chat</a> network.<br>
		If you are new to IRC, please see the <a href="<?= url('wiki:IRC_channel') ?>">wiki page</a>!<br>
	</p>
	
	<p>
		An easy way to chat in <?= url('c:irc') ?> is to use the <b><a href="<?= url('p:chat') ?>">web-based client</a></b>.
	</p>
	
	<p>
		<?= url('c:irc') ?> is <a href="<?= url('p:irclogs') ?>">logged</a> for better communication across timezones.
	</p>
	
	<h3>Bug Tracker</h3>
	
	<p>
		If you have found a problem with Arx Libertatis, please <b><a href="<?= url('p:bugs') ?>"><?= $p->bug_icon ?> open a bug report</a></b>.
	</p>
	
	<h3>Forums</h3>
	
	<p>
		We don't have our own forum, but occasionally visit some of the existing <a href="<?= url('wiki:FAQ#Are_there_any_Arx_Libertatis_discussion_forums.3F') ?>">Arx Fatalis communities</a>:
	</p>
	<ul>
		<li><a href="<?= url('p:forum_ttlg')  ?>"><?= $p->ttlg_icon ?> TTLG Forum</a></li>
		<li><a href="<?= url('p:subreddit')  ?>"><?= $p->reddit_icon ?> Arx Fatalis Subreddit</a></li>
		<li><a href="<?= url('p:forum_gog')   ?>"><?= $p->gog_icon ?> GOG.com Forum</a></li>
		<li><a href="<?= url('p:comm_steam')  ?>"><?= $p->steam_icon ?> Steam Community</a></li>
		<li><a href="<?= url('p:group_steam') ?>"><?= $p->steam_icon ?> Steam Group</a></li>
	</ul>
	
</section>

<section>
	
	<h2>Webmaster</h2>
	
	<p class="center">
		This website is hosted and administered by
		<span itemscope itemtype="https://schema.org/Person">
			<a href="<?= url('p:constexpr') ?>" itemprop="url"><span itemprop="name"><?= $p->i_daniel ?></span></a>.
		</span>
	</p>
	
</section>
