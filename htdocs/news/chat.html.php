<?
// News item

$p->title = 'IRC channel moved to #arx on Libera.Chat';
$p->time  = strtotime('2021-06-02 22:42:42');

$p->import('makenews');

 $p->synopsis()
?>

<p>
	We have decided to move the <a href="<?= url('p:contact') ?>">Arx Libertatis development chat IRC channel</a> to the <a href="<?= url('p:libera') ?>">Libera.Chat</a> network. You can join us using the <b><a href="<?= url('p:chat') ?>">Libera.Chat web client</a></b> in your browser or by connecting to <b><a href="<?= url('p:irc') ?>">irc.libera.chat:6697</a></b> using a standalone <a href="https://en.wikipedia.org/wiki/Comparison_of_Internet_Relay_Chat_clients">IRC client</a> and joining the <b><a href="<?= url('p:irc') ?>"><?= url('c:irc') ?></a></b> channel. Alternatively, enter the <b><a href="<?= url('p:matrix_room') ?>"><?= url('c:matrix') ?></a></b> room in a <a href="<?= url('p:matrix') ?>">Matrix</a> client.
</p>

<?
 $p->details()
?>

<p>
	Many thanks go to the previous freenode volunteer staff for having hosted our IRC channel over the last ten years and for now providing Libera.Chat.
</p>

<p>
	We also realize that it has been a really long time since the last stable release of Arx Libertatis and are working on getting version 1.2 out soon - stay tuned. Until then feel free to check out the <a href="<?= url('p:snapshots') ?>">development snapshots</a> and report any issues you find to the <a href="<?= url('p:bugs') ?>">bug tracker</a>.
</p>
