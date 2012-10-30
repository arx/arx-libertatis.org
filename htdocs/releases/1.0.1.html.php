<?
// Release announcement

$p->time = strtotime('2012-04-22 21:42:42');

$p->import('makenews');

 $p->synopsis()
?>

<p>
	Due to a text rendering bug in 1.0 that breaks the Russian version, we have decided to publish a bugfix release.
	This version also fixes a crash on some Linux systems and uses DirectX by default for rendering and input under Windows - see the <a href="<? url($p->changelog) ?>">changelog</a>.
</p>

<?
 $p->details()
?>

<p>
	As before, <a href="<? url('p:download') ?>">packages for <? echo $p->i_windows ?> and <? echo $p->i_linux ?></a> are available.
</p>
