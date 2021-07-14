<?
// Release announcement

$p->codename = 'Mega Mega Mega';
$p->time = strtotime('2021-07-13 23:42:42');

$p->import('makenews');

 $p->synopsis()
?>

<p>
	Eight years after version 1.1 we are finally ready to publish Arx Libertatis 1.2. This release brings improved rune recognition when casting spells, as well as a new bow aim mode. Support for high resolutions and wide monitors is enhanced with configurable HUD and player book scaling. The text and audio language can now be changed in the menu. Further, item physics have been fixed and item dragging has been refined. On top of that, this release adds a console to execute arbitrary script commands. See the <a href="<?= url($p->changelog) ?>">changelog</a> for full details.
</p>

<?
 $p->details()
?>

<p>
	Updated <a href="<?= url('p:download') ?>"><?= $p->i_windows ?> and <?= $p->i_linux ?> builds</a> are available.
</p>

<?
inject_page('screenshot', [
	'image' => $p->imgdir . 'casting',
	'caption' => 'Improved rune recognition',
])
?>

<?
inject_page('screenshot', [
	'image' => $p->imgdir . 'bow',
	'caption' => 'Bow aim and arrow direction now match',
])
?>

<h2>Rune recognition and bow aim revamped</h2>

<p>
	One of the defining features of Arx Fatalis is drawing runes to cast spells. However, that can also be one of the more frustrating mechanics as the game expects you to draw straight horizontal, vertical or diagonal lines with hard corners - all while dodging enemy attacks - without much tolerance for slanted or otherwise imperfect lines. To making casting more fun, bsxf47 has implemented a more forgiving rune stroke recognition algorithm. On top of that, we have also fixed problems with the recognition at higher frame rates.
</p>

<p>
	Ranged combat might not be Arx's strength with only two different bows in the game, but for this update we have nevertheless decided to give it some love by adding an improved bow aim mode. With this mode, the orientation of the arrow while aiming matches the direction it will be launched in. Additionally, the cross-hair cursor that is normally disabled in combat mode is now shown once the bow aim is fully charged. This release also restores the arrow trail effect which was missing in version 1.1 and improves its appearance.
</p>

<p>
	The new rune recognition and bow aim are active by default, but can be disabled in the options menu to experience the original controls.
</p>

<h2>High-resolution, widescreen, and high frame rate support</h2>

<p>
	While the player book already scaled with the screen resolution, the rest of the interface elements always had the same pixel size since Arx Fatalis 1.21. This is now rectified so that icons and buttons are no longer tiny when playing on high-DPI monitors. With the default settings, HUD scale only becomes active at resolutions greater than 1080p and is restricted to round scale factors to preserve the crispness of interface elements. The exact scaling behavior is configurable separately for the cursor, player book, and HUD, with an option of linear or nearest-neighbor filtering. For the player book, the font size and weight can now be adjusted to improve readability. The size of light flares and other in-game effects has also been fixed to correctly scale with the display resolution, and we have disabled Windows' automatic DPI scaling to allow the game to render at the native resolution.
</p>

<p>
	The player book and minimap are no longer stretched with widescreen or ultrawide displays, and there are options to limit the width of text lines in conversations and to control the rendering of cinematics at aspect ratios wider than 4:3. Weapons no longer degrade faster or generate more sparks at higher frame rates, and there is a new option to limit the frame rate.
</p>

<?
inject_page('screenshot', [
	'float' => 'left',
	'image' => $p->imgdir . 'interface',
	'caption' => 'HUD scaling and aspect ratio fixes',
])
?>

<h2>Enhanced localization</h2>

<p>
	Most Arx Fatalis versions come with audio files for multiple languages, but before now there was no option to select the language outside of editing the config file. With Arx Libertatis 1.2 the language can now be changed in the menu, separately for text and audio. Thanks to contributions from the awesome Arx Fatalis community, we are also able to provide localized text for new options in German, Italian, Russian, and Spanish. Entering names for save files now respects the active keyboard layout and input methods supported by the OS.
</p>

<?
inject_page('screenshot', [
	'float' => 'left',
	'image' => $p->imgdir . 'items',
	'caption' => 'You can now hoard all the items!',
])
?>

<h2>Item physics and dragging refined</h2>

<p>
	With previous versions, thrown items could sometimes get stuck on walls, fall through the level geometry, or hover above the floor. We have fixed the physics code so that this no longer happens.
</p>

<p>
	There have been numerous tweaks to inventory handling and dragging items both inside and outside of inventories. Accidentally dragging items when trying to pick them up using shift click is prevented, and the position and rotation of dragged items is corrected. Additionally, entire stacks of items can now be thrown or dropped outside inventories. When combining items, invalid targets are no longer highlighted.
</p>

<p>
	We have also fixed a crash when loading save files with over 1500 entities in one level, so nothing is stopping you from obsessively collecting all items in the game. Playthroughs longer than 1193 hours are now also possible without running into save file issues.
</p>

<h2>New video, audio, and input options</h2>

<p>
	Players who cannot tolerate (or don't like) the camera movement from the player character's head bobbing or from earthquakes, can now disable these and increase the field of view if desired. Objects and interface elements that have their shape influenced by textures now optionally have their outlines smoothed to reduce aliasing, and anisotropic texture filtering can now be disabled. Additionally, the display gamma can now be configured again when running full-screen.
</p>

<p>
	The audio output device and OpenAL Soft's virtual surround (HRTF) mode can now be controlled from the audio options menu (enabled by default when using headphones). The subtle reverb that was available with sound cards supporting EAX in Arx Fatalis has now been re-added and is available for everyone.
</p>

<p>
	Level transitions can optionally be activated by jumping (or automatically when walking into them), to avoid having to exit mouselook mode and click an icon in the corner of the screen. The Escape key now closes the player book and notes, and there is an option to automatically enter combat mode and draw your weapon when clicking on a hostile NPC while in mouselook mode. It is now also possible to assign a key to drink a Cure Poison potion without opening the inventory. Finally, the "Resume game" button (and F9 key) in the main menu will now load the latest save file if no game is loaded.
</p>

<p>
	The windowing and input backend has been upgraded to SDL 2, bringing windowed fullscreen support (selected with the "Desktop" resolution) to <?= $p->i_windows ?> users, as well as fixing the keyboard being grabbed when in fullscreen mode under <?= $p->i_linux ?>, and adding Wayland support. We also made sure that the mouse grab is released during cutscenes, conversations, and cinematics. The SDL 2 backend also implements raw mouse input support for camera rotation with optional acceleration.
</p>

<?
inject_page('screenshot', [
	'image' => $p->imgdir . 'console',
	'caption' => 'New script console',
])
?>

<h2>Script console added</h2>

<p>
	To help debugging mods or the game itself, we have added new <a href="<?= url('wiki:Debugging#Debug_views') ?>">debug views</a> in Arx Libertatis 1.2 and made the key binding configurable.
</p>

<p>
	New is also an <a href="<?= url('wiki:Script_console') ?>">in-game console</a> to execute <a href="<?= url('wiki:Script:Commands') ?>">script commands</a>. Give yourself boundless experience, gold, and items, teleport to any level, delete locked doors in your way, or just get back at a <a href="<?= url('wiki:Lich') ?>">lich</a> for <a href="<?= url('wiki:Slow_time') ?>">freezing your controls</a> one too many times — all that and more is now easy, if you know the right incantation.
</p>

<h2>Community news</h2>

<p>
	The Arx Fatalis modding community has not been asleep while we were getting this update ready. One mod that will be of interest to many looking to play Arx Fatalis is the AI-upscaled texture pack <a href="<?= url('p:neuralis') ?>">Arx Neuralis</a>. Pedro Ordaz' ambitious <a href="<?= url('p:arxinsanity') ?>">Arx Insanity Overhaul mod</a> is also getting close to a release. Check out the wiki for more <a href="<?= url('p:mods') ?>">Arx Fatalis mods</a>.
</p>
