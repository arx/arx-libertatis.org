<?
// Release announcement

$p->time = strtotime('2012-06-14 17:42:42');

$p->import('makenews');

 $p->synopsis()
?>

<p>
	Version 1.0.2 fixes various crashes, disappearing items when sorting the inventory, and minor rendering and input bugs. This release also fixes a bug that left the Spanish version with no text. See the <a href="<?= url($p->changelog) ?>">changelog</a> for more details.
</p>

<?
 $p->details()
?>

<p>
	<a href="<?= url('p:download') ?>"><?= $p->i_windows ?> and <?= $p->i_linux ?></a> packages are available. We still don't have <?= $p->i_macosx ?> binaries, but a user has created a <a href="<?= url('p:mac_wineskin') ?>">Wine-based wrapper</a> that allows the Windows version to run on Mac for those who don't want to compile from source. We recommend switching to the OpenGL renderer when running under Wine. Arx Libertatis is also <a href="<?= url('p:freebsd_port') ?>">available as a <?= $p->i_freebsd ?> port</a>.
</p>
<p>
	Fans of Arx Fatalis might also be interested in <a href="<?= url('p:openmw') ?>">OpenMW</a>, a project to create an open source and cross-platform engine for Morrowind. While they haven't yet reached a stable release, the current progress looks promising.
</p>
