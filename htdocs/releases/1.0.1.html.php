<?
// News item

$p->inherit('newsitem');
$p->import('icons');

$p->title     = 'Arx Libertatis 1.0.1 bugfix release';
$p->time      = strtotime('2012-04-22 21:42:42');
$p->changelog = get_url('changelog:Patch_1.0.1');

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
	As before, <a href="<? url('p:download') ?>">packages for <? echo $p->windows_icon ?>Windows and <? echo $p->linux_icon ?>Linux</a> are available.
</p>
<?
 $p->updates()
?>
<p>
	<b>Update:</b> <a href="<? url('release:1.0.2') ?>">Arx Libertatis 1.0.2</a> has been released. <a href="<? url('sfdl:arx-libertatis-1.0.1/') ?>">Version 1.0.1 is archived at SourceForge.</a>
</p>
