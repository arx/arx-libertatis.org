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
		<link rel="shortcut icon" href="<? ref('r:favicon') ?>">
		<link rel="stylesheet" type="text/css" href="<? url('r:style') ?>" title="...">
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
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

	</head>
	
	<body>
		
		<h1>
			<a href="<? url('p:home') ?>">
				<img src="<? ref('r:logo') ?>" alt="Arx Libertatis">
			</a>
		</h1>
		
		<div id="link-bar"><?
				$link_bar = [
					[ 'p:home',     'home',     "Arx Libertatis Homepage" ],
					[ 'p:download', 'download', 'Downloads for Windows, Linux and more' ],
					[ 'p:news',     'news',     'Arx Libertatis Announcements' ],
					[ 'p:faq',      'faq',      'Frequently Asked Questions' ],
					[ 'p:gallery',  'gallery',  'Screenshots' ],
					[ 'p:wiki',     'wiki',     'Arx Libertatis Wiki' ],
					[ 'p:git',      'code',     'Source Code on GitHub' ],
					[ 'p:bugs',     'bugs',     'Bug Tracker' ],
					[ 'p:contact',  'contact',  'Contact Information' ],
				];
				foreach($link_bar as $link):
					$url = get_url($link[0]);
					$text = encode_text($link[1]);
					$title = encode_attr($link[2]);
					if(isset($p->url) && $url == $p->url):
						?>

			<span title="<? echo $title ?>"><? echo $text ?></span><?
					else:
						$url = encode_attr($p->optimize_url($url));
						?>

			<a href="<? echo $url ?>" title="<? echo $title ?>"><? echo $text ?></a><?
					endif;
				endforeach;
			?>

		</div>
		
<? inject() ?>
		
		<div id="footer"><?
			inject('footer')
			?>

			<p>
				Arx Libertatis, this page and the Arx Libertatis Team are in no way associated with or supported by <a href="<? url('p:arkane') ?>">Arkane Studios</a> or <a href="<? url('p:zenimax') ?>">ZeniMax Media Inc.</a> Arx Fatalis, Arkane Studios, ZeniMax and their respective logos are registered trademarks of ZeniMax Media Inc. All Rights Reserved. All other trademarks are properties of their respective owners. All texures, models, designs, sounds and music reproduced in screenshots and videos are the property of ZeniMax Media Inc. unless otherwise specified.
			</p>
		</div>
		
	</body>
</html>
