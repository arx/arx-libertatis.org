<?
// Release announcement

$p->time = strtotime('2012-07-31 03:42:42');

$p->import('makenews');

 $p->synopsis()
?>

<p>
	The 1.0.3 release fixes two regressions introduced in 1.0.2 for <? echo $p->windows_icon ?>Windows users: Crashes on startup after selecting the OpenGL renderer and low mouse sensitivity with the DirectInput backend. There are also fixes for other crashes, rendering glitches, missing speech during cinematics in the Russian and Italian versions, missing ambient sound effects as well as bugs in how some skill values were calculated. See the <a href="<? url($p->changelog) ?>">changelog</a> for more details.
</p>

<?
 $p->details()
?>


<?
inject_page('screenshot', [
	'image' => $p->imgdir . 'spellcast',
	'caption' => 'glitch while casting',
	'format' => (isset($p->format) ? $p->format : 'html')
])
?>

<p>
	<a href="<? url('p:download') ?>"><? echo $p->windows_icon ?>Windows and <? echo $p->linux_icon ?>Linux packages</a> have been updated.
</p>

<p>
	One rendering glitch that is now fixed in 1.0.3 is spell effects sometimes shining through walls while the player is casting. Another one is a the position of the  glow effect drawn around some magical rings while equipped. This version also fixes text not being rendered with some Direct3D drivers.
</p>

<?
inject_page('screenshot', [
	'image' => $p->imgdir . 'halo-offset',
	'caption' => 'bad halo offset',
	'format' => (isset($p->format) ? $p->format : 'html')
])
?>

<p>
	In Arx Fatalis, the effective skills are calculated by a adding (amongst other things) the player's attribute values multiplied by <a href="<? url('wiki:Skills#Attribute-based_Skill_modifications') ?>">attribute-skill factors</a>. The original game and Arx Libertatis 1.0.2 and earlier include attribute modifiers (e.g. from items) in this calculation for all skills - except for the <b>object knowledge</b> and <b>projectile</b> skills, where only the raw attribute values are considered. We believe this is a bug and have fixed it in 1.0.3 by using the modfied attributes for all skills. See the <a href="<? url('wiki:Skills') ?>">wiki page on skills</a> for more details.
</p>

<p>
	There are similar inconsistencies for <a href="<? url('wiki:Stats') ?>">other player stats</a> such as armor class, magic and poison resistance, and the damages dealt. Those are likely to be changed as well in future versions of Arx Libertatis. There is a <a href="http://www.reddit.com/r/ArxFatalis/comments/wbz0m/attribute_skill_modifiers_and_calculated_stats/">reddit thread</a> discussing these changes.
</p>

<?
inject_page('screenshot', [
	'float' => 'left',
	'image' => $p->imgdir . 'delete-save',
	'caption' => 'delete save button',
	'format' => (isset($p->format) ? $p->format : 'html')
])
?>

<p>
	There has also been <a href="<? url('bug:307') ?>">concern raised</a> over the <a href="<? url('wiki:Harm_(Spell)') ?>">Harm spell</a>: While the player is never told about this spell, the incarnation can be deduced from the <a href="<? url('wiki:Heal_(Spell)') ?>">Heal spell</a>. The problem is that the Harm spell makes most fights pointless by <a href="<? url('wiki:Spells') ?>">dealing a decent amount of damage while costing almost no mana</a> - so little that a decent magic user will regenerate the mana faster than it is used up.
</p>

<p>
	Should we change cost of the Harm spell? If so, what is a fair value? We'd love to hear your feedback on this and anything else in the <a href="<? url('p:irc') ?>"><? url('c:irc') ?></a> <a href="<? url('wiki:IRC_channel') ?>">irc channel</a>, the <a href="<? url('p:subreddit') ?>">Arx Fatalis subreddit</a> or one of the <a href="<? url('p:forums') ?>">Arx Fatalis forums</a>.
</p>

<p>
	Finally, we were able to sneak one minor feature into this patch release: a button to delete old save games from the save and load menus - enjoy.
</p>
