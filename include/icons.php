<?
// News item 0-linux-packages

$p->param('format', 'Generate the icons as HTML or RSS', 'html');

if($p->format == 'html'):
	
	$p->windows_icon() ?><span class="os windows"></span><?
	$p->linux_icon()   ?><span class="os linux"></span><?
	$p->macosx_icon()  ?><span class="os macosx"></span><?
	$p->freebsd_icon() ?><span class="os freebsd"></span><?
	
else /* $p->format != 'html' */:
	
	$p->windows_icon = '';
	$p->linux_icon = '';
	$p->macosx_icon = '';
	$p->freebsd_icon = '';
	
endif;
