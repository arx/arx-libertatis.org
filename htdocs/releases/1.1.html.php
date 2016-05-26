<?
// Release announcement

$p->codename = 'Rhaa Movis';
$p->time = strtotime('2013-07-14 11:42:42');

$p->import('makenews');

 $p->synopsis()
?>

<p>
	With more than 30000 lines of code changed in over 600 git commits, the 1.1 release fixes player movement issues, minimap scaling, and a bunch of crashes and other bugs. We also continued our work on restructuring the engine, to facilitate new features in the future. Further, there is an improved installer for the data files on *nix systems as well as minor graphics and sound tweaks.
	See the <a href="<?= url($p->changelog) ?>">changelog</a> for full details.
	While we haven't managed to include everything originally planned for 1.1, we felt it was high time for another release after nearly a year of development since 1.0.3.
</p>

<?
 $p->details()
?>

<?
inject_page('screenshot', [
	'image' => $p->imgdir . 'jumping',
	'caption' => 'platforms over lava',
])
?>

<?
inject_page('screenshot', [
	'image' => $p->imgdir . 'minimap',
	'caption' => 'minimap scaling fixes',
])
?>

<p>
	Updated <a href="<?= url('p:download') ?>"><?= $p->i_windows ?>, <?= $p->i_linux ?> and <?= $p->i_freebsd ?> binaries</a> are available.
</p>

<h2>Player movement fixed</h2>

<p>
	A long-standing bug in Arx Libertatis and even vanilla Arx Fatalis has been spontaneous acceleration causing the player to jump forward, possibly past important script triggers. The effect was even worse if the game already ran slow. But you guessed it, the past tense in the last two sentences means this has now been fixed.
	Another known problem was that the player could not jump quite as far in AL as he could in vanilla AF. In 1.1 we adjusted the player jump distance to fix this. Please <a href="<?= url('p:contact') ?>">let us know</a> if we got it right or if it needs further tweaking. Note that only the jump distance has been fixed, there are plenty of other things about the jump that could be improved.
</p>

<h2>Minimap scaling fixed</h2>

<p>
	Another notable fixed bug is the minimap scaling. Previously, the minimap in the HUD would cover a smaller area at larger resolutions, as demonstrated in the screenshots to the right.
</p>

<h2>Direct3D backend deprecated</h2>

<p>
	One increasingly inconvenient part of Arx has been the Direct3D renderer backend. As a few D3D-specific rendering bugs have been able to sneak in and none of us really cares to maintain it, it will likely be removed in a future release. This will also hopefully make it easier for us to implement future rendering improvements. For this release however, the D3D renderer is still available, but the default on <?= $p->i_windows ?> has been switched to OpenGL to encourage more testing. This means that if you never switched the renderer away from "Auto-Select" in the video settings, you will now use OpenGL. If you previously manually selected D3D, or do so now, AL will continue to use that backend for the time being. Please <a href="<?= url('p:bugs') ?>">report</a> any rendering glitches and performance issues you encounter with the OpenGL backend, so that they can be fixed before D3D is no longer an option.
</p>

<?
inject_page('screenshot', [
	'float' => 'left',
	'image' => $p->imgdir . 'aura',
	'caption' => 'spell aura colors',
])
?>

<h2>Other improvements</h2>

<p>
	Since the 1.0.3 release we've had three new contributors: <i>Dimoks</i>, <i>LordSk</i> and <i>Eli2</i>. Their additions include restoring missing spell sounds, adjusting the aura color of the <a href="<?= url('wiki:Protection_from_fire') ?>">Protection from fire</a> spell to distinguish it from the <a href="<?= url('wiki:Armor') ?>">Armor</a> spell (difference show to the left), code cleanup for future improvements (most of which isn't included in 1.1 yet) as well as other bug fixes.
</p>

<?
inject_page('screenshot', [
	'float' => 'left',
	'image' => $p->imgdir . 'installer',
	'caption' => '*nix data installer',
])
?>

<p>
	For our non-Windows users we have included a new improved script to install the game data under <?= $p->i_linux ?>, <?= $p->i_freebsd ?> and other UNIX-like systems. This new script supports more obscure Arx Fatalis distributions and adds an optional GUI interface using KDialog, Zenity or Xdialog. Arx Libertatis will even launch the script for you if there are data files missing, allowing Linux users to enjoy Arx without ever touching a terminal, if they are so inclined.
</p>

<h2>Information for packagers</h2>

<p>
	In AL 1.1 we have switched from DevIL to an internal <code>stb_image</code> copy for image loading, removing that dependency. This change was made as DevIL is unmaintained and <a href="<?= url('wiki:Upstream_bugs_under_Linux#DevIL') ?>">faulty Debian packages</a> have caused crashes for some. Secondly, AL no longer uses the Boost.Program_options library, making Boost a build-time only dependency. We have also added more options to fine-tune the build process, documented in <a href="<?= url('p:README') ?>">README.md</a> and <a href="<?= url('p:OPTIONS') ?>">OPTIONS.md</a>.
</p>

<?
inject_page('screenshot', [
	'image' => $p->imgdir . 'korean',
	'caption' => '악스 파탈리스',
])
?>

<h2>User contributions</h2>

<p>
	In the meantime, the Arx Fatalis community has created <a href="<?= url('p:mod_polish') ?>">Polish</a>, <a href="<?= url('p:mod_turkish') ?>">Turkish</a> and <a href="<?= url('p:mod_korean') ?>">Korean</a> (text-only) translations as well as <a href="<?= url('wiki:Arx_Fatalis_mods') ?>">gameplay modifications</a> that also work in Arx Libertatis. Feel free to add your own creations as well as mods you come across to the <a href="<?= url('wiki:Arx_Fatalis_mods') ?>">wiki page</a>.
</p>

<p>
	As always, we'd like to <a href="<?= url('p:contact') ?>">hear what you think</a> about the changes so far and which future improvements we should focus on. Our bug tracker has a <a href="<?= url('p:wishlist') ?>">wishlist</a> for new features or enhancements that can be voted on.
</p>

<?
 $p->updates()
?>

<h2>Update:</h2>

<p>
	We have found a regression in the 1.1 release that prevents map marker labels from being saved correctly. Save files created by 1.1 will be missing labels for map markers. <b>Users should upgrade to version 1.1.1 as soon as possible.</b>
</p>