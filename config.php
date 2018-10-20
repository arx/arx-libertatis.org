<?

$here = dirname(__FILE__);

PP::source_dir("$here/htdocs", [
	'/(?:^|\/)index\.html$/' => '',
	'/\.html$/' => '',
]);
PP::route('main', 'http://arx-libertatis.org/');

PP::inlude_dir("$here/include");

// pass-through standard protocols
PP::route('http', ':http:');
PP::route('https', ':https:');
PP::route('mailto', ':mailto:');
PP::route('irc', ':irc:');

// Resources
PP::route('r', [
	'style'         => 'style.css',
	'favicon'       => 'favicon.png',
	'favicon_ie'    => 'favicon.ico',
	'logo'          => 'images/logo.png',
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
	'video'         => 'http://www.youtube.com/embed/mIribIqKee8?rel=0',
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
	'wiki'         => 'http://wiki.arx-libertatis.org/',
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
	'irc'          => 'irc://irc.freenode.net/arxfatalis',
	'chat'         => 'http://webchat.freenode.net/?channels=arxfatalis',
	'subreddit'    => 'http://old.reddit.com/r/ArxFatalis/',
	'openhub'      => 'https://www.openhub.net/p/arx',
	'moddb'        => 'http://www.moddb.com/mods/arx-libertatis',
	'freshcode'    => 'http://freshcode.club/projects/arx',
	// community pages
	'freebsd_port' => 'http://www.freebsd.org/cgi/cvsweb.cgi/ports/games/arx-libertatis/',
	'mac_wineskin' => 'http://portingteam.com/files/file/7385-arx-libertatis-wine/',
	// other websites
	'arkane'       => 'http://www.arkane-studios.com/',
	'arxfatalis'   => 'http://web.archive.org/web/20180201053030/https://www.arkane-studios.com/uk/arx.php',
	'patch'        => 'http://web.archive.org/web/20180105233341/https://www.arkane-studios.com/uk/arx_downloads.php',
	'zenimax'      => 'http://www.zenimax.com/',
	'freenode'     => 'http://freenode.net/',
	'opengameart'  => 'http://opengameart.org/',
	'constexpr'    => 'http://constexpr.org/',
	'gpl'          => 'http://www.gnu.org/licenses/gpl.html',
	'openmw'       => 'http://openmw.org/',
	'wp_arx'       => 'http://en.wikipedia.org/wiki/Arx_Fatalis',
	'pcgw_arx'     => 'http://pcgamingwiki.com/wiki/Arx_Fatalis',
	'gog_arx'      => 'http://www.gog.com/gamecard/arx_fatalis',
	'steam_arx'    => 'http://store.steampowered.com/app/1700/',
	'arxendofsun'  => 'https://web.archive.org/web/20170709140048/http://arxendofsun.solarsplace.com/',
	'arxcatalyst'  => 'http://arxcatalyst.weebly.com/',
	'forum_arx'    => 'http://forums.bethsoft.com/forum/149-arx-fatalis-general-discussion/',
	'forum_ttlg'   => 'http://www.ttlg.com/forums/forumdisplay.php?f=76',
	'forum_gog'    => 'http://www.gog.com/forum/arx_fatalis',
	'comm_steam'   => 'http://steamcommunity.com/app/1700/',
	'group_steam'  => 'http://steamcommunity.com/groups/Arx_Fatalis',
	// mods
	'mod_polish'   => 'http://www.portal24h.pl/gry/spolszczenia-gier/ac/arx-fatalis-plprojekt-655/',
	'mod_turkish'  => 'http://pinkertonoyun.blogspot.com/2012/07/arx-fatalis-turkce-yama.html',
	'mod_korean'   => 'http://nsm53p.tistory.com/500',
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
		'http://arx-libertatis.org/news/',
		'http://arx-libertatis.org/releases/',
		'http://arx-libertatis.org/',
		'http://wiki.arx-libertatis.org/',
		'https://bugs.arx-libertatis.org/arx/issues/',
	];
	foreach($prefixes as $prefix) {
		if(starts_with($u, $prefix)) {
			$su = 'http://arx.vg/' . substr($u, strlen($prefix));
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
			$url = 'http://old.reddit.com/submit';
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
	'irc'          => ':#arxfatalis',
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
