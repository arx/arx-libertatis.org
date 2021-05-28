<?

$here = dirname(__FILE__);

PP::source_dir("$here/htdocs", [
	'/(?:^|\/)index\.html$/' => '',
	'/\.html$/' => '',
]);
PP::route('main', 'https://arx-libertatis.org/');

PP::inlude_dir("$here/include");

// pass-through standard protocols
PP::route('http', ':http:');
PP::route('https', ':https:');
PP::route('mailto', ':mailto:');
PP::route('irc', ':irc:');
PP::route('ircs', ':ircs:');

// Resources
PP::route('r', [
	'style'         => 'style.css',
	'favicon'       => 'favicon.png',
	'favicon_ie'    => 'favicon.ico',
	'logo'          => 'images/logo.png',
	'icons'         => 'images/icons.png',
	'icon'          => 'images/arx-libertatis-128.png',
	'icon-24'       => 'images/arx-libertatis-24.png',
	'icon-32'       => 'images/arx-libertatis-32.png',
	'icon-48'       => 'images/arx-libertatis-48.png',
	'icon-64'       => 'images/arx-libertatis-64.png',
	'icon-80'       => 'images/arx-libertatis-80.png',
	'icon-96'       => 'images/arx-libertatis-96.png',
	'icon-128'      => 'images/arx-libertatis-128.png',
	'icon-192'      => 'images/arx-libertatis-192.png',
	'icon-256'      => 'images/arx-libertatis-256.png',
	'icon-512'      => 'images/arx-libertatis-512.png',
	'spellcasting'  => 'images/spellcasting.jpg',
	'castle-of-arx' => 'images/castle-of-arx.jpg',
	'video'         => 'https://www.youtube-nocookie.com/embed/mIribIqKee8?rel=0',
]);

// Pages
PP::route('p', [
	// Arx Libertatis website
	'home'         => '',
	'contact'      => 'contact',
	'news'         => 'news',
	'irclogs'      => 'irclogs/',
	'files'         => 'files/',
	'rss'          => 'feed.rss',
	'bugs'         => 'https://bugs.arx-libertatis.org/',
	'wishlist'     => 'https://bugs.arx-libertatis.org/arx/issues/find/saved_search/2/search/1',
	// wiki
	'wiki'         => 'https://wiki.arx-libertatis.org/',
	'gallery'      => 'wiki:Gallery',
	'faq'          => 'wiki:FAQ',
	'download'     => 'wiki:Download',
	'download_windows' => 'wiki:Download#Windows',
	'download_linux'   => 'wiki:Download#Linux',
	'download_freebsd' => 'wiki:Download#FreeBSD',
	'changelog'    => 'wiki:Changelog',
	'forums'       => 'wiki:FAQ#Are_there_any_Arx_Libertatis_discussion_forums.3F',
	// external pages
	'git'          => 'https://github.com/arx/ArxLibertatis',
	'README'       => 'https://github.com/arx/ArxLibertatis/blob/master/README.md',
	'OPTIONS'      => 'https://github.com/arx/ArxLibertatis/blob/master/OPTIONS.md',
	'irc'          => 'ircs://irc.libera.chat:6697/arx',
	'matrix_room'  => 'https://matrix.to/#arx:libera.chat',
	'chat'         => 'https://web.libera.chat/#arx',
	'subreddit'    => 'https://old.reddit.com/r/ArxFatalis/',
	'openhub'      => 'https://www.openhub.net/p/arx',
	'moddb'        => 'https://www.moddb.com/mods/arx-libertatis',
	'freshcode'    => 'https://freshcode.club/projects/arx',
	// community pages
	'freebsd_port' => 'https://www.freshports.org/games/arx-libertatis/',
	'mac_wineskin' => 'https://portingteam.com/files/file/7385-arx-libertatis-native/',
	// other websites
	'arkane'       => 'https://www.arkane-studios.com/',
	'arxfatalis'   => 'https://web.archive.org/web/20180201053030/https://www.arkane-studios.com/uk/arx.php',
	'patch'        => 'https://web.archive.org/web/20180105233341/https://www.arkane-studios.com/uk/arx_downloads.php',
	'arxjapanese'  => 'https://web.archive.org/web/20090421121337/http://www.capcom.co.jp/pc/arx/',
	'zenimax'      => 'https://www.zenimax.com/',
	'libera'       => 'https://libera.chat/',
	'libera_rules' => 'https://libera.chat/policies',
	'matrix'       => 'https://matrix.org/',
	'opengameart'  => 'https://opengameart.org/',
	'constexpr'    => 'https://constexpr.org/',
	'gpl'          => 'https://www.gnu.org/licenses/gpl.html',
	'openmw'       => 'https://openmw.org/',
	'wp_arx'       => 'https://en.wikipedia.org/wiki/Arx_Fatalis',
	'pcgw_arx'     => 'https://pcgamingwiki.com/wiki/Arx_Fatalis',
	'gog_arx'      => 'https://www.gog.com/game/arx_fatalis',
	'steam_arx'    => 'https://store.steampowered.com/app/1700/Arx_Fatalis/',
	'arxendofsun'  => 'https://web.archive.org/web/20170709140048/http://arxendofsun.solarsplace.com/',
	'arxinsanity'  => 'https://arxinsanity.weebly.com/',
	'arxue4'       => 'https://www.moddb.com/mods/arx-fatalis-ue4-remastered',
	'arxcatalyst'  => 'http://arxcatalyst.weebly.com/',
	'forum_ttlg'   => 'https://www.ttlg.com/forums/forumdisplay.php?f=76',
	'forum_gog'    => 'https://www.gog.com/forum/arx_fatalis',
	'comm_steam'   => 'https://steamcommunity.com/app/1700/',
	'group_steam'  => 'https://steamcommunity.com/groups/Arx_Fatalis',
	// mods
	'mod_polish'   => 'https://web.archive.org/web/20190503065440/http://www.portal24h.pl/gry/spolszczenia-gier/ac/arx-fatalis-plprojekt-655/',
	'mod_turkish'  => 'https://pinkertonoyun.blogspot.com/2012/07/arx-fatalis-turkce-yama.html',
	'mod_korean'   => 'https://nsm53p.tistory.com/500',
	'guide_spawn'  => 'https://web.archive.org/web/20161022113416/http://forums.steampowered.com/forums/showpost.php?p=32434076&postcount=3'
]);

function starts_with($haystack, $needle) {
	$length = strlen($needle);
	return (substr($haystack, 0, $length) === $needle);
}

function query_encode($string) {
	$entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D',
	                  '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
	$replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",",
	                      "/", "?", "%", "#", "[", "]");
	return str_replace($entities, $replacements, rawurlencode($string));
}

function build_query($array) {
	$q = '';
	foreach($array as $key => $value) {
		if($q != '') {
			$q .= '&';
		}
		$q .= query_encode($key);
		if($value !== null) {
			$q .= '=' . query_encode($value);
		}
	}
	return $q;
}

PP::route('share', function ($name) {
	
	global $p;
	
	$su = $u = $p->url;
	$prefixes = [
		'https://arx-libertatis.org/news/',
		'https://arx-libertatis.org/releases/',
		'https://arx-libertatis.org/',
		'https://wiki.arx-libertatis.org/',
		'https://bugs.arx-libertatis.org/arx/issues/',
	];
	foreach($prefixes as $prefix) {
		if(starts_with($u, $prefix)) {
			$su = 'https://arx.vg/' . substr($u, strlen($prefix));
			break;
		}
	}
	
	$q = [ ];
	
	if(isset($p->title)) {
		$project = 'Arx Libertatis';
		$title_prefix = "$project :: ";
		$title = $p->title;
		if(strpos($title, $project) === false) {
			$title = $title_prefix . $title;
		}
	}
	
	
	switch($name) {
		
		case 'identica': {
			$url = 'https://identi.ca//index.php';
			$q['action'] = 'newnotice';
			if(isset($title)) {
				$q['status_textarea'] = $title . ' ' . $su;
			} else {
				$q['status_textarea'] = $su;
			}
			break;
		}
		
		case 'reddit': {
			$url = 'https://old.reddit.com/submit';
			$q['url'] = $u;
			if(isset($title)) {
				$q['title'] = $title;
			}
			break;
		}
		
		case 'reddit-comments': {
			$url = get_url('p:subreddit') . $u;
			break;
		}
		
		case 'google-plus': {
			$url = 'https://plus.google.com/share';
			$q['url'] = $u;
			break;
		}
		
		case 'twitter': {
			$url = 'https://twitter.com/share';
			$q['url'] = $su;
			if(isset($title)) {
				$q['text'] = $title;
			}
			break;
		}
		
		case 'facebook': {
			$url = 'https://www.facebook.com/sharer/sharer.php';
			$q['u'] = $u;
			break;
		}
		
	}
	
	if(empty($q)) {
		return $url;
	} else {
		return $url . '?' . build_query($q);
	}
	
	
});

// Constants
PP::route('c', [
	'irc'          => ':#arx',
	'matrix'       => ':#arx:libera.chat',
	'icon-80_size' => ':80x80',
	'icon_size'    => ':128x128',
]);

PP::route('wiki', 'p:wiki');
PP::route('changelog', 'wiki:Changelog#');
PP::route('news', 'news/');
PP::route('release', 'releases/');
PP::route('files', 'p:files');

PP::route('bug', 'https://bugs.arx-libertatis.org/arx/issues/');

// PP::optimize_urls(PP::URL_RELATIVE_ONLY); // for local testing
PP::optimize_urls(PP::URL_RELATIVE); // for deployment
PP::minify(true);
