
.icon, #share > a {
	background-image: url("<?= url('r:icons') ?>");
	background-repeat: no-repeat;
	padding: 0px;
	display: inline-block;
	vertical-align: text-bottom;
}

<? if($p->url == 'https://arx-libertatis.org/style.css'): ?>

/* share buttons */
#sidebar  #share > a            { width: 32px; height: 32px; }
#sidebar  #share > #identica    { background-position:   -0px  -0px; }
#sidebar  #share > #reddit      { background-position:   -0px -32px; }
#sidebar  #share > #google-plus { background-position:  -32px  -0px; }
#sidebar  #share > #twitter     { background-position:  -32px -32px; }
.navigate #share > a            { width: 16px; height: 16px; }
.navigate #share > #identica    { background-position: -312px -32px; }
.navigate #share > #reddit      { background-position: -248px -16px; }
.navigate #share > #google-plus { background-position: -328px  -0px; }
.navigate #share > #twitter     { background-position: -312px -48px; }

<? endif ?>

/* big (32x32) icons */
.icon.big         { width: 32px; height: 32px; }
.icon.windows.big { background-position:  -64px  -0px; }
.icon.linux.big   { background-position:  -64px -32px; }
.icon.macos.big   { background-position:  -96px  -0px; }
.icon.freebsd.big { background-position:  -96px -32px; }
.icon.github.big  { background-position: -128px  -0px; }

/* small (16x16 and 24x24) icons */
.icon              { width: 16px; height: 16px; }

/* 24x24 icons */
.icon.rss          { background-position: -160px  -0px;  width: 24px; height: 24px; }
.icon.download     { background-position: -160px -24px;  width: 24px; height: 24px; }

/* os icons */
.icon.windows      { background-position: -128px -32px; }
.icon.linux        { background-position: -128px -48px; }
.icon.macos        { background-position: -144px -32px; }
.icon.freebsd      { background-position: -144px -48px; }
/* linux distribution icons */
.icon.arch         { background-position: -200px  -0px; }
.icon.chakra       { background-position: -200px -16px; }
.icon.debian       { background-position: -200px -32px; }
.icon.fedora       { background-position: -200px -48px; }
.icon.gentoo       { background-position: -216px  -0px; }
.icon.mageia       { background-position: -328px -32px; }
.icon.mandriva     { background-position: -216px -16px; }
.icon.openmandriva { background-position: -216px -32px; }
.icon.opensuse     { background-position: -216px -48px; }
.icon.rosa         { background-position: -232px  -0px; }
.icon.slackware    { background-position: -328px -16px; }
.icon.ubuntu       { background-position: -232px -16px; }

/* website icons */
.icon.blogger      { background-position: -184px  -0px; }
.icon.googlecode   { background-position: -184px -16px; }
.icon.sourceforge  { background-position: -184px -32px; }
.icon.github       { background-position: -184px -48px; }
.icon.reddit       { background-position: -248px -16px; }
.icon.steam        { background-position: -248px -32px; }
.icon.gog          { background-position: -248px -48px; }
.icon.ebay         { background-position: -264px  -0px; }
.icon.amazon       { background-position: -264px -16px; }
.icon.moddb        { background-position: -264px -32px; }
.icon.youtube      { background-position: -280px -16px; }
.icon.wikipedia    { background-position: -280px -32px; }
.icon.arkane       { background-position: -280px -48px; }
.icon.pcgamingwiki { background-position: -296px  -0px; }
.icon.bethesda     { background-position: -296px -16px; }
.icon.openhub      { background-position: -296px -32px; }
.icon.freshcode    { background-position: -296px -48px; }
.icon.ttlg         { background-position: -312px  -0px; }
.icon.openmw       { background-position: -312px -16px; }
.icon.identica     { background-position: -312px -32px; }
.icon.twitter      { background-position: -312px -48px; }
.icon.google_plus  { background-position: -328px  -0px; }
.icon.nexus        { background-position: -328px -48px; }

/* misc icons */
.icon.arx          { background-position: -168px -48px; }
.icon.innoextract  { background-position: -280px  -0px; }
.icon.wine         { background-position: -248px  -0px; }
.icon.bug          { background-position: -232px -32px; }
.icon.idea         { background-position: -232px -48px; }
.icon.daniel       { background-position: -264px -48px; }
.icon.arxendofsun  { background-position: -344px  -0px; }
.icon.arxcatalyst  { background-position: -344px -16px; }

<? if($p->url == 'https://arx-libertatis.org/images/icons.css'): ?>

a.external[href^="https://store.steampowered.com/"],
a.external[href^="https://steamcommunity.com/"],
a.external[href^="https://www.gog.com/"],
a.external[href^="https://www.moddb.com/"],
a.external[href^="https://www.nexusmods.com/"],
a.external[href^="https://old.reddit.com/"],
a.external[href^="https://code.google.com/"],
a.external[href^="https://github.com/"],
a.external[href^="https://sourceforge.net/"],
a.external[href^="https://www.youtube.com/"],
a.extiw[href^="https://en.wikipedia.org/"],
a.external[href^="https://arx-libertatis.org/"],
a.external[href^="https://bugs.arx-libertatis.org/"],
a.external[href*=".blogspot.com/"] {
	background: none !important;
	padding-right: 0px !important;
}

a.external[href^="https://store.steampowered.com/"]:after,
a.external[href^="https://steamcommunity.com/"]:after,
a.external[href^="https://www.gog.com/"]:after,
a.external[href^="https://www.moddb.com/"]:after,
a.external[href^="https://www.nexusmods.com/"]:after,
a.external[href^="https://old.reddit.com/"]:after,
a.external[href^="https://code.google.com/"]:after,
a.external[href^="https://github.com/"]:after,
a.external[href^="https://sourceforge.net/"]:after,
a.external[href^="https://www.youtube.com/"]:after,
a.extiw[href^="https://en.wikipedia.org/"]:after,
a.external[href^="https://arx-libertatis.org/"]:after,
a.external[href^="https://bugs.arx-libertatis.org/"]:after,
a.external[href*=".blogspot.com/"]:after {
	content: '';
	/* import .icon */
	background-image: url("<?= url('r:icons') ?>");
	background-repeat: no-repeat;
	padding: 0px;
	display: inline-block;
	vertical-align: text-bottom;
	width: 16px; height: 16px;
	margin-left: 4px;
}

a.external[href^="https://store.steampowered.com/"]:after,
a.external[href^="https://steamcommunity.com/"]:after {
	background-position: -248px -32px;
}

a.external[href^="https://www.gog.com/"]:after {
	background-position: -248px -48px;
}

a.external[href^="https://www.moddb.com/"]:after {
	background-position: -264px -32px;
}

a.external[href^="https://www.nexusmods.com/"]:after {
	background-position: -328px -48px;
}

a.external[href^="https://code.google.com/"]:after {
	background-position: -184px -16px;
}

a.external[href^="https://github.com/"]:after {
	background-position: -184px -48px;
}

a.external[href^="https://sourceforge.net/"]:after {
	background-position: -184px -32px;
}

a.external[href^="https://www.youtube.com/"]:after {
	background-position: -280px -16px;
}

a.extiw[href^="https://en.wikipedia.org/"]:after {
	background-position: -280px  -32px;
}

a.external[href^="https://old.reddit.com/"]:after {
	background-position: -248px -16px;
}

a.external[href^="https://arx-libertatis.org/"]:after {
	background-position: -168px -48px;
}

a.external[href^="https://bugs.arx-libertatis.org/"]:after {
	background-position: -232px -32px;
}

.feature a.external[href^="https://bugs.arx-libertatis.org/"]:after {
	background-position: -232px -48px;
}

a.external[href*=".blogspot.com/"]:after {
	background-position: -184px  -0px;
}

<? endif ?>
