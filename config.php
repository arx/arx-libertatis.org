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
	'logo'          => 'images/logo.png',
	'icon-80'       => 'images/arx-libertatis-80.png',
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
	'rss'          => 'feed.rss',
	'bugs'         => 'https://bugs.arx-libertatis.org/',
	// Wiki
	'wiki'         => 'http://wiki.arx-libertatis.org/',
	'gallery'      => 'wiki:Gallery',
	'faq'          => 'wiki:FAQ',
	'download'     => 'wiki:Download',
	'changelog'    => 'wiki:Changelog',
	'forums'       => 'wiki:FAQ#Are_there_any_Arx_Libertatis_discussion_forums.3F',
	// external pages
	'git'          => 'https://github.com/arx/ArxLibertatis',
	'sfdl'         => 'https://sourceforge.net/projects/arx/files/',
	'irc'          => 'irc://freenode/arxfatalis',
	'chat'         => 'http://webchat.freenode.net/?channels=arxfatalis',
	'subreddit'    => 'http://www.reddit.com/r/ArxFatalis/',
	'ohloh'        => 'https://www.ohloh.net/p/arx',
	'sourceforge'  => 'https://sourceforge.net/projects/arx/',
	'moddb'        => 'http://www.moddb.com/mods/arx-libertatis',
	'freecode'     => 'http://freecode.com/projects/arx-libertatis',
	// community pages
	'freebsd_port' => 'http://www.freebsd.org/cgi/cvsweb.cgi/ports/games/arx-libertatis/',
	'mac_wineskin' => 'http://portingteam.com/files/file/7385-arx-libertatis-wine/',
	// other websites
	'arkane'       => 'http://www.arkane-studios.com/',
	'arxfatalis'   => 'http://www.arkane-studios.com/uk/arx.php',
	'patch'        => 'http://www.arkane-studios.com/uk/arx_downloads.php',
	'zenimax'      => 'http://www.zenimax.com/',
	'freenode'     => 'http://freenode.net/',
	'opengameart'  => 'http://opengameart.org/',
	'constexpr'    => 'http://constexpr.org/',
	'gpl'          => 'http://www.gnu.org/licenses/gpl.html',
	'openmw'       => 'http://openmw.org/',
]);

PP::route('share', [
	'identica' => 'https://identi.ca//index.php?action=newnotice&status_textarea=Arx+Libertatis+-+a+cross-platform+port+of+Arx+Fatalis+http%3A%2F%2Farx.vg%2F',
	'reddit' => 'http://www.reddit.com/submit?url=http%3A%2F%2Farx-libertatis.org%2F&title=Arx+Libertatis+-+a+cross-platform+port+of+Arx+Fatalis',
	'google-plus' => 'https://plus.google.com/share?url=http%3A%2F%2Farx-libertatis.org%2F',
	'twitter' => 'https://twitter.com/share?url=http%3A%2F%2Farx.vg%2F&text=Arx+Libertatis+-+a+cross-platform+port+of+Arx+Fatalis',
	'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Farx-libertatis.org%2F',
]);

// Constants
PP::route('c', [
	'irc'     => ':#arxfatalis',
]);

PP::route('wiki', 'p:wiki');
PP::route('changelog', 'wiki:Changelog#');
PP::route('news', 'news/');
PP::route('release', 'releases/');
PP::route('sfdl', 'p:sfdl');

PP::route('bug', 'https://bugs.arx-libertatis.org/arx/issues/');

PP::optimize_urls(PP::URL_RELATIVE);
PP::minify(true);
