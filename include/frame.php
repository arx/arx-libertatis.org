<?
// Common page frame

$project = 'Arx Libertatis';
$title_prefix = "$project :: ";

$p->param('title',  "Page title - will be prefixed with '$title_prefix' if required!");
$p->param('header', 'Additional header elements', '');
$p->param('',       'The main content');
$p->param('footer', 'Additional footer content', '');

$p->mimetype = 'text/html';

?>
<!DOCTYPE html>
<html>
	
	<head>
		<meta charset='utf-8'>
		<link rel="shortcut icon" href="<?= ref('r:favicon_ie') ?>">
		<link rel="icon" href="<?= ref('r:icon') ?>" sizes="<?= ref('c:icon_size') ?>">
		<link rel="icon" href="<?= ref('r:favicon') ?>" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="<?= url('r:style') ?>" title="...">
		<title><?
			$title = $p->title;
			if(strpos($title, $project) === false) {
				$title = $title_prefix . $title;
			}
			echo encode_text($title);
		?></title>
		<?
		inject('header')
		?>
		<!--[if lt IE 9]>
			<script>
var e = [ 'header', 'nav', 'section', 'article', 'aside', 'footer', 'hgroup' ];
for(var i = 0; i < e.length; i++) { document.createElement(e[i]); }
			</script>
		<![endif]-->
	</head>
	
	<body>
		
		<header>
			
			<h1>
				<a href="<?= url('p:home') ?>">
					<img src="<?= ref('r:logo') ?>" alt="Arx Libertatis">
				</a>
			</h1>
			
			<div id="link-bar"><?
					$link_bar = [
						[ 'p:home',     'Home',     "Arx Libertatis Homepage" ],
						[ 'p:download', 'Download', 'Downloads for Windows, Linux and more' ],
						[ 'p:news',     'News',     'Arx Libertatis Announcements' ],
						[ 'p:faq',      'FAQ',      'Frequently Asked Questions' ],
						[ 'p:gallery',  'Gallery',  'Screenshots' ],
						[ 'p:wiki',     'Wiki',     'Arx Libertatis Wiki' ],
						[ 'p:git',      'Code',     'Source Code on GitHub' ],
						[ 'p:bugs',     'Bugs',     'Bug Tracker' ],
						[ 'p:contact',  'Contact',  'Contact Information' ],
					];
					foreach($link_bar as $link):
						$url = get_url($link[0]);
						$text = encode_text($link[1]);
						$title = encode_attr($link[2]);
						if(isset($p->url) && $url == $p->url):
							?>

				<span title="<?= $title ?>"><?= $text ?></span><?
						else:
							$url = encode_attr($p->optimize_url($url));
							?>

				<a href="<?= $url ?>" title="<?= $title ?>"><?= $text ?></a><?
						endif;
					endforeach;
				?>

			</div>
			
		</header>
		
<? inject() ?>
		
		<footer><?
			inject('footer')
			?>

			<p>
				Arx Libertatis, this page and the Arx Libertatis Team are in no way associated with or supported by <a href="<?= url('p:arkane') ?>">Arkane Studios</a> or <a href="<?= url('p:zenimax') ?>">ZeniMax Media Inc.</a> Arx Fatalis, Arkane Studios, ZeniMax and their respective logos are registered trademarks of ZeniMax Media Inc. All Rights Reserved. All other trademarks are properties of their respective owners. All textures, models, designs, sounds and music reproduced in screenshots and videos are the property of ZeniMax Media Inc. unless otherwise specified.
			</p>
		</footer>
		
	</body>
</html>
