<?
// News item

$p->title = 'Gentoo, Mandriva and ROSA Linux Packages';
$p->time  = strtotime('2012-07-12 00:42:42');

$p->import('makenews');

 $p->synopsis()
?>

<p>
	Thanks to Gentoo developer <emph>hasufell</emph>, <a href="<? url('wiki:Linux_packages#Gentoo_Linux') ?>">Arx Libertatis ebuilds</a> are now available in the portage tree. This means Gentoo users no longer need the <b>arx-libertatis</b> overlay. <a href="<? url('wiki:Linux_packages#Mandriva') ?>">Mandriva</a> and <a href="<? url('wiki:Linux_packages#ROSA') ?>">ROSA</a> packages have also been available in the distribution repositories for a while now.
</p>

<?
 $p->details()
?>

<p>
	If you want to see Arx Libertatis available in the default repositories of more <? echo $p->linux_icon ?>Linux distributions, please open a package request for your favorite distro at the appropriate location - even if we already <a href="<? url('wiki:Download#Packages') ?>">provide our own packages for that distribution</a>.
</p>
