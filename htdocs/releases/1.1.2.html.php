<?
// Release announcement

$p->time = strtotime('2013-10-17 20:42:42');

$p->import('makenews');

 $p->synopsis()
?>

<p>
	This is another small hotfix, this time to fix a crash when hovering over map markers after the window size or resolution has changed. See the <a href="<?= url($p->changelog) ?>">full changelog</a> <del>for more details</del> to read this same change summary again. We encourage all users of Arx Libertatis 1.1.1 to upgrade to 1.1.2 whenever they feel like it.
</p>

<?
 $p->details()
?>

<p>
	Updated <a href="<?= url('p:download') ?>"><?= $p->i_windows ?>, <?= $p->i_linux ?> and <?= $p->i_freebsd ?> binaries</a> and packages are available.<br>
</p>

<p>
	Yup, this release is really only one small fix. We have been working on bigger changes, and are getting closer to having fully hardware-accelerated rendering and per-pixel lighting, but did not want to delay this fix until those changes are ready for release.
</p>
