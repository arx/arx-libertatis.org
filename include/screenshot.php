<?

$p->param('float', 'Should the image float left or right?', 'right');
$p->param('link', 'Where to link to?');
$p->param('image', 'The image to display');
$p->param('width', 'The image width');
$p->param('height', 'The image height');
$p->param('caption', 'Short text describing the image');
$p->param('microcode', 'Generate microcode tags', false);
$p->param('format', 'Generate the news screenshot as HTML or rss', 'html');
$p->param('srcset', 'Generate srcset attribute', false);

if(!isset($p->link)) {
	$p->images = PP::find_files($p->image . '-thumbnail*.jpg', 'required', '');
	$p->link = $p->image . '.jpg';
	$p->image = $p->image . '-thumbnail.jpg';
} else if(substr($p->image, -4) == '.jpg') {
	$p->images = PP::find_files(substr($p->image, 0, -4) . '*.jpg', 'required', '');
}

if(!isset($p->width) || !isset($p->height)) {
	list($w, $h, $ignore___, $ignore___) = getimagesize($p->images[0]);
	if(substr($p->images[0], -7) == '-2x.jpg') {
		$p->width = $w / 2;
		$p->height = $h / 2;
		$p->srcset = true;
	} else {
		$p->width = $w;
		$p->height = $h;
	}
}

if($p->format == 'html'):
?>

<div class="<?= $p->float ?> screenshot"<? if($p->microcode): ?> itemprop="screenshots" itemscope itemtype="https://schema.org/ImageObject"<? endif; ?>>
	<a<? if($p->microcode): ?> itemprop="url"<? endif; ?> href="<?= url($p->link) ?>">
		<img<? if($p->microcode): ?> itemprop="thumbnail"<? endif; ?> src="<?= ref($p->image) ?>"<? if($p->srcset): ?> srcset="<?= ref($p->image) ?> <?= attr('width') ?>w, <?= ref(substr($p->image, 0, -4) . '-1.5x.jpg') ?> <?= floor(attr('width') * 1.5) ?>w, <?= ref(substr($p->image, 0, -4) . '-2x.jpg') ?> <?= attr('width') * 2 ?>w" sizes="(max-width: <?= attr('width') ?>px) 100vw, <?= attr('width') ?>px"<? endif; ?> width="<?= attr('width') ?>" height="<?= attr('height') ?>" alt="Screenshot: <?= attr('caption') ?>">
	</a>
	<span<? if($p->microcode): ?> itemprop="caption"<? endif; ?>><?= text('caption') ?></span>
</div>

<?
elseif($p->format == 'rss'):
?>

<div style="float: <?= $p->float ?>; clear: <?= $p->float ?>; margin: 15px; margin-top: 0px; text-align: center; width: <?= attr('width') ?>px;">
	<a href="<?= url($p->link) ?>">
		<img src="<?= ref($p->image) ?>"<? if($p->srcset): ?> srcset="<?= ref(substr($p->image, 0, -4) . '-2x.jpg') ?> 2x, <?= ref(substr($p->image, 0, -4) . '-1.5x.jpg') ?> 1.5x"<? endif; ?> width="<?= attr('width') ?>" height="<?= attr('height') ?>" alt="Screenshot: <?= attr('caption') ?>" style="border: none">
	</a><br>
	<span style="font-size: small"><?= text('caption') ?></span>
</div>

<?
endif;
