<?
// Release announcement

$p->time = strtotime('2022-04-10 14:42:42');

$p->import('makenews');

 $p->synopsis()
?>

<p>
	This release is a hotfix addressing an unintended change to the calculation of the player armor class as well as poison and magic resistance. It also restores death screams which were missing for most NPCs and fixes issues with using stacks of potions by dropping them on the player book and fixes number of crashes, performance issues and bugs. This release also restores <?= $p->i_windows ?> XP support for the official binaries. See the <a href="<?= url($p->changelog) ?>">full changelog</a> for more details.
</p>

<?
 $p->details()
?>

<?
inject_page('screenshot', [
	'image' => $p->imgdir . 'steam',
	'caption' => 'Stylish rendering with Steam',
])
?>

<p>
	Updated <a href="<?= url('p:download') ?>"><?= $p->i_windows ?> and <?= $p->i_linux ?> binaries</a> and packages are available.<br>
</p>

<p>
	One notable fix is for the "Crisp" Alpha Cutout Anti-Aliasing setting introduce in 1.2 which has been causing performance issues when near fogs or smoke for some players while resulting in crashes for <?= $p->i_windows ?> users with Intel graphics. In this release the performance issues have been fixed and the setting has been disabled for OpenGL drivers experiencing crashes.
</p>

<p>
	<?= $p->i_linux ?> Steam users with Mesa graphics drivers may have noticed textures being replaced with solid colors once the Steam overlay loads. We have added a workaround to no longer promise the graphics drivers that we are good API-respecting citizens if we detect the Steam overlay so that its naughtyness can go unseen again.
</p>
