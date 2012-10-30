<?
// News item

$p->title = 'Wiki moved to arx-libertatis.org domain';
$p->time  = strtotime('2012-08-09 00:42:42');

$p->import('makenews');

 $p->synopsis()
?>

<p>
	The Arx Libertatis wiki has been moved from <b>arx.parpg.net</b> to <a href="<? url('p:wiki') ?>">wiki.arx-libertatis.org</a>. User accounts and passwords from the old wiki should still work. While we have set up a redirect for now, please update all links and bookmarks pointing to the old URL.
</p>

<?
 $p->details()
?>

<p>
	Many thanks go to <em>barra</em> for having hosted the wiki so far. Having a place to collaborate beyond the code and IRC channel even before we had our own infrastructure was of great help to the Arx Libertatis project.
</p>
