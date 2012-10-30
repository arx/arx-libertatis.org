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
		We mainly hang out in the <b><a href="<? url('p:irc') ?>"><? url('c:irc') ?></a></b> channel on the <a href="<? url('p:freenode') ?>">Freenode</a> network.<br>
		If you are new to irc, please see the <a href="<? url('wiki:IRC_channel') ?>">wiki page</a>!<br>
	</p>
	
	<p>
		<? url('c:irc') ?> is <a href="<? url('p:irclogs') ?>">logged</a> for better communication across timezones. The logging bot has been kindly set up and is hosted by <a href="<? url('p:opengameart') ?>">OpenGameArt.org</a>. 
	</p>
	
	<p>
		An easy way to chat in <? url('c:irc') ?> is to use the <a href="<? url('p:chat') ?>">web-based client</a>
	</p>
	
	<h3><? echo $p->i_reddit ?></h3>
	
	<p>
		If your are more comfortable with message boards, feel free to post to <a href="<? url('p:subreddit') ?>">/r/ArxFatalis</a>.
	</p>
	
	<h3>Forums</h3>
	
	<p>
		We don't have our own forum, but you'll probably be able to find help on one of the various existing <a href="<? url('wiki:FAQ#Are_there_any_Arx_Libertatis_discussion_forums.3F') ?>">Arx Fatalis forums</a>.
	</p>
	
	<h3><? echo $p->bug_icon ?> Bug Tracker</h3>
	
	<p>
		If you have found a problem in Arx Libertatis, please <a href="<? url('p:bugs') ?>">open a bug report</a>.
	</p>
	
</section>

<section>
	
	<h2>Webmaster</h2>
	
	<p class="center">
		This website is hosted and administered by
		<span itemscope itemtype="http://schema.org/Person">
			<a href="<? url('p:constexpr') ?>" itemprop="url"><span itemprop="name"><? echo $p->i_daniel ?></span></a>.
		</span>
	</p>
	
</section>
