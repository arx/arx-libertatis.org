<?
// 404 error page
// relative URLs will not work for this page as the location isn't fixed!
PP::optimize_urls(PP::URL_ROOT_RELATIVE);
$p->inherit('frame');
$p->title = 'This page does not exist';
$p->nocanonical = true;
?>

<section>
	
	<br>
	
	<h2>This page does not exist</h2>
	
	<p class="center">
		"Go on, have a really good look - I'm sure there's a way to get out of here!" - Kultar
	</p>
	
</section>
