<?
// Contact page

$p->inherit('frame');
$p->title = 'Contact';
$p->import('icons');

?>

<section>
	
	<h2>Contact</h2>
	
	<h3>Bug Tracker</h3>
	
	<p>
		If you have found a problem with Arx Libertatis, please <b><a href="<?= url('p:bugs') ?>"><?= $p->bug_icon ?> open a bug report</a></b>.
	</p>
	
	<h3>Chat</h3>
	
	<p>
		We mainly hang out in the <b><a href="<?= url('p:irc') ?>"><?= url('c:irc') ?></a></b> channel on the <a href="<?= url('p:libera') ?>">Libera.Chat</a> IRC network. To chat with us either
	</p>
	
	<ul>
		<li>Use the <b><a href="<?= url('p:chat') ?>">Libera.Chat web client</a></b> in your browser.
		<li>Connect to <b><a href="<?= url('p:irc') ?>">irc.libera.chat:6697</a></b> using a standalone <a href="https://en.wikipedia.org/wiki/Comparison_of_Internet_Relay_Chat_clients">IRC client</a> and join the <b><?= url('c:irc') ?></b> channel.
		<li>Or join the <b><a href="<?= url('p:matrix_room') ?>"><?= url('c:matrix') ?></a></b> room in a <a href="<?= url('p:matrix') ?>">Matrix</a> client.
	</ul>
	
	<p>
		Please follow the <a href="<?= url('p:libera_rules') ?>">network policies</a>, and if you are new to IRC, see the <a href="<?= url('wiki:IRC_channel') ?>">wiki page</a> for some pointers!<br>
	</p>
	
	<p>
		We aren't always around so if you have a question just ask it without waiting for anyone to say hi. If you don't get any answer immediately please wait a bit or check the <a href="<?= url('p:irclogs') ?>">channel logs</a> later.
	</p>
	
	<h3>Forums</h3>
	
	<p>
		We don't have our own forum, but read posts on some of the existing <a href="<?= url('wiki:FAQ#Are_there_any_Arx_Libertatis_discussion_forums.3F') ?>">Arx Fatalis communities</a>:
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
