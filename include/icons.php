<?
// News item 0-linux-packages

$p->param('format', 'Generate the icons as HTML or RSS', 'html');

$p->all_icons = [
	
	/* 24x24 icons */
	'rss'          => 'RSS',
	'download'     => 'Download',
	
	/* os icons */
	'windows'      => 'Windows',
	'linux'        => 'Linux',
	'macosx'       => 'Mac OS X',
	'freebsd'      => 'FreeBSD',
	/* linux distribution icons*/
	'arch'         => 'Arch Linux',
	'chakra'       => 'Chakra',
	'debian'       => 'Debian',
	'fedora'       => 'Fedora',
	'gentoo'       => 'Gentoo Linux',
	'mandriva'     => 'Mandriva',
	'openmandriva' => 'OpenMandriva',
	'opensuse'     => 'openSUSE',
	'rosa'         => 'ROSA',
	'ubuntu'       => 'Ubuntu',
	
	/* website icons */
	'blogger'      => 'Blogger',
	'googlecode'   => 'Google Code',
	'github'       => 'GitHub',
	'reddit'       => 'reddit',
	'steam'        => 'Steam',
	'gog'          => 'GOG.com',
	'ebay'         => 'eBay',
	'amazon'       => 'Amazon',
	'moddb'        => 'Mod DB',
	'youtube'      => 'TouTube',
	'wikipedia'    => 'Wikipedia',
	'arkane'       => 'Arkane Studios',
	'pcgamingwiki' => 'PCGamingWiki',
	'bethesda'     => 'Bethesda Softworks',
	'openhub'      => 'Open Hub',
	'freshcode'    => 'fresh(code)',
	'ttlg'         => 'TTLG',
	'openmw'       => 'OpenMW',
	'identica'     => 'identi.ca',
	'twitter'      => 'Twitter',
	'google_plus'  => 'Google+',
	
	/* misc icons */
	'arx'          => 'Arx Libertatis',
	'arxendofsun'  => 'Arx – End Of Sun',
	'arxcatalyst'  => 'Arx Catalyst',
	'wine'         => 'Wine',
	'bug'          => 'Bug',
	'idea'         => 'Idea',
	'daniel'       => 'Daniel Scharrer',
	
];

if($p->format == 'html'):
	
	foreach($p->all_icons as $icon => $text) {
		$icon_name = $icon . '_icon';
		$p->$icon_name() ?><span class="<?= $icon ?> icon"></span><?
		$big_icon_name = 'big_' . $icon . '_icon';
		$p->$big_icon_name() ?><span class="big <?= $icon ?> icon"></span><?
		$i_name = 'i_' . $icon;
		$p->$i_name() ?><span class="<?= $icon ?> icon"></span> <?= $text ?><?
	}
	
else /* $p->format != 'html' */:
	
	foreach($p->all_icons as $icon => $text) {
		$icon_name = $icon . '_icon';
		$p->$icon_name = '';
		$big_icon_name = 'big_' . $icon . '_icon';
		$p->$big_icon_name = '';
		$i_name = 'i_' . $icon;
		$p->$i_name = $text;
	}
	
endif;
