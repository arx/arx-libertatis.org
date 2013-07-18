<?
// Release announcement

$p->time = strtotime('2013-07-17 04:42:42');

$p->import('makenews');

 $p->synopsis()
?>

<p>
	This release is a hotfix addressing a regression introcuded in 1.1, that caused map markers to not be saved correctly and then removed when such a save is loaded. <b>We encourage all users of Arx Libertatis 1.1 to upgrade to 1.1.1 as soon as possible.</b>
</p>

<?
 $p->details()
?>

<?
inject_page('screenshot', [
	'image' => $p->imgdir . 'mapmarker',
	'caption' => 'map marker with label',
])
?>

<p>
	Updated <a href="<?= url('p:download') ?>"><?= $p->i_windows ?>, <?= $p->i_linux ?> and <?= $p->i_freebsd ?> binaries</a> are available.<br>
	Packages for some <?= $p->i_linux ?> distributions are still being built.
</p>

<p>
	Arx Fatalis scripts can add markers to the maps displayed in the player book using the <code>mapmarker</code> command. These are used to highlight quest locations, stores and other points of interest. In total, there are 15 different map markers in Arx Fatalis.
</p>

<p>
	The 1.1 release introduced a bug causing the labels of these markers to not be saved - this has been fixed in 1.1.1. Because Arx requires map markers to have unique labels, this also results in all but one map marker being permanently removed when loading a save created by 1.1 - it doesn't matter which version of AL is used to load the save.
</p>

<p>
	Save files that have been created before 1.1 was installed are not affected. The 1.1 save files have not been otherwise corrupted, only map markers (or their labels) may be missing.
</p>

<h2>Recovery</h2>

<p>
	It is generally not possible to recreate these markers from the engine side. As the markers are not all added at the same time, and some even removed as the player progresses, it is also not trivial to re-add the correct set of markers from scripts. Because of this, we have decided to not add any recovery mechanic for now.
</p>

<p>
	The complete set of script commands to create all possible map markers is as follows:
</p>

<pre>
mapmarker 100 100 1 [goblinlord_warning]
mapmarker 169 110 1 [addmarker_human_throne_room]
mapmarker 183 194 7 [addmarker_treasure_gob]
mapmarker 195 390 1 [description_miguel]
mapmarker 196 127 4 [addmarker_pathway_snake]
mapmarker 20 385 1 [description_gary]
mapmarker 237 62 1 [addmarker_falan_room]
mapmarker 276 390 3 [addmarker_human_access]
mapmarker 312 174 6 [addmarker_temple_illusions]
mapmarker 333 260 4 [description_alia]
mapmarker 348 22 1 [addmarker_human_access]
mapmarker 365 305 1 [description_tafiok]
mapmarker 404 390 1 [description_maria]
mapmarker 469 320 6 [addmarker_elder_shield]
mapmarker 500 50 1 [addmarker_secret_temple]
</pre>

<p>
	Unfortunately we don't have a script console yet, so there is no straightforward way to execute these commands. Adventurous users may follow <a href="<?= url('p:guide_spawn') ?>">this guide</a>. Be sure to back up your save files beforehand.
</p>

<p>
	We apologize for any inconvenience this may have caused.
</p>