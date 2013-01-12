<?

$p->param('float', 'Should the image float left or right?', 'right');
$p->param('link', 'Where to link to?');
$p->param('image', 'The image to display');
$p->param('width', 'The image width', 156);
$p->param('height', 'The image height', 130);
$p->param('caption', 'Short text describing the image');
$p->param('microcode', 'Generate microcode tags', false);
$p->param('format', 'Generate the news screenshot as HTML or rss', 'html');

if(!isset($p->link)) {
	$p->link = $p->image . '.jpg';
	$p->image = $p->image . '-thumbnail.jpg';
}

if($p->format == 'html'):
?>

<div class="<?= $p->float ?> screenshot"<? if($p->microcode): ?> itemprop="screenshots" itemscope itemtype="http://schema.org/ImageObject"<? endif; ?>>
	<a<? if($p->microcode): ?> itemprop="url"<? endif; ?> href="<?= url($p->link) ?>">
		<img<? if($p->microcode): ?> itemprop="thumbnail"<? endif; ?> src="<?= ref($p->image) ?>" width="<?= attr('width') ?>" height="<?= attr('height') ?>" alt="Screenshot: <?= attr('caption') ?>">
	</a>
	<span<? if($p->microcode): ?> itemprop="caption"<? endif; ?>><?= text('caption') ?></span>
</div>

<?
elseif($p->format == 'rss'):
?>

<div style="float: <?= $p->float ?>; clear: <?= $p->float ?>; margin: 15px; margin-top: 0px; text-align: center; width: <?= attr('width') ?>px;">
	<a href="<?= url($p->link) ?>">
		<img src="<?= ref($p->image) ?>" width="<?= attr('width') ?>" height="<?= attr('height') ?>" alt="Screenshot: <?= attr('caption') ?>" style="border: none">
	</a><br>
	<span style="font-size: small"><?= text('caption') ?></span>
</div>

<?
endif;
