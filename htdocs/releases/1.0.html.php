<?
// Release announcement

$p->codename = 'Bloody Gobblers!';
$p->time     = strtotime('2012-04-19 09:42:42');

$p->import('makenews');

 $p->synopsis()
?>

<p>
	After over a year of work we are proud to announce the first release of Arx Libertatis.
	While some minor graphical glitches remain, the game is fully playable on both Windows and Linux as well as other platforms.
	There are <a href="<? url('p:download') ?>">packages available for <?= $p->i_windows ?> and <?= $p->i_linux ?></a>. On other systems you may still be able to run the game by compiling the <a href="<? url('wiki:Download#Source_Code') ?>">source code</a> yourself.
</p>

<?
 $p->details()
?>

<p>
	Besides porting the game to SDL, OpenGL, OpenAL and the amd64 architecture while maintaining native Direct X backends, we fixed some performance issues with newer operating systems, added more configuration options and improved the interface scaling for widescreen resolutions. See the wiki for the <a href="<? url($p->changelog) ?>">full changelog</a>.
</p>
<p>
	But that does not mean that the work on Arx Libertatis is done.
	There is still much code to clean and features to add.
	Contributions, small or large, are welcome:
	Feel free to fork the <a href="<? url('p:git') ?>">project on github</a> or join us in <b><? url('c:irc') ?></b> on the Freenode IRC network.
</p>
