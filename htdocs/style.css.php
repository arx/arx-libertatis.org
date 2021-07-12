
<? require('images/icons.css.php') ?>

/* global settings */

/* HTML 5 compatability for older browsers */
header, nav, section, article, aside, footer, hgroup {
	display: block;
}

body > header > h1 {
	margin: 0px;
	margin-left: 10px;
	margin-right: 10px;
}

body > header > h1 img {
	max-width: 100%;
	height: auto;
}

body {
	margin: 0;
	padding: 0;
	background: url('images/background.png') #0c0c0c;
	background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="128" height="128"><defs><filter id="bg"><feTurbulence type="fractalNoise" baseFrequency="0.6" stitchTiles="stitch"/><feColorMatrix values="0.005 0 0 0 0 0 0.005 0 0 0 0 0 0.005 0 0 0 0 0 0 1"/></filter></defs><rect width="100%" height="100%" filter="url(%23bg)"/></svg>'), linear-gradient(transparent, transparent) #0c0c0c;
	color: #ccc;
	font-family: "DejaVu Sans", "Verdana", "Bitstream Vera Sans", "Liberation Sans", sans-serif;
	font-size: 13px;
	font-size-adjust: 0.55;
	line-height: 140%;
	text-rendering: optimizeLegibility;
	padding-top: 15px;
}

code, pre {
	white-space: pre;
	font-family: "DejaVu Sans Mono", "Bitstream Vera Sans Mono", "Liberation Mono", "Lucida Console", monospace;
}

iframe {
	border: none;
}

/* common elements */

h2 {
	color: #777;
	margin-top: 5px;
	text-align: center;
}

h3 {
	margin-top: 20px;
	margin-bottom: 7px;
}

a {
	color: #e8cc8e;
	text-shadow: #777 1px 1px 3px;
	text-decoration: none;
	outline: none;
	-moz-outline: none;
}

a:hover {
	color: #aaf;
	text-decoration: underline;
}

a:focus {
	color: #aaf;
	text-shadow: #aa5 0px 0px 5px;
	text-decoration: underline
}

img {
	vertical-align: text-bottom;
	border: none;
}

.center {
	text-align: center;
}

.hidden {
	display: none;
}

/* header */

body > header {
	text-align: center;
}

body > header + article:before {
	width: 100%;
	border-top: 2px solid #444;
	margin: auto;
	content: '';
	display: block;
}

#link-bar {
	font-size: 0;
	letter-spacing: -1px;
	padding-top: 5px;
	padding-bottom: 5px;
	text-transform: lowercase;
	font-variant: small-caps;
	padding-top: -5px;
}

#link-bar * {
	font-weight: bold;
	font-size: 17px;
	letter-spacing: 0px;
}

#link-bar * + *:before {
	content: ' ';
	border-left: 2px solid #444;
	font-size: 70%;
	margin-right: 8px;
	margin-left: 8px;
}

/* footer */

body > footer {
	margin: auto;
	max-width: 900px;
	font-size: 85%;
	margin-top: 35px;
	color: #555;
	border-top: 1px solid #444;
	line-height: 120%;
	padding-left: 10px;
	padding-right: 5px;
}

body > footer a {
	color: #543;
	text-shadow: none;
}

/* main structure */

body > header + section {
	margin-top: 5px;
}

body > section {
	margin: auto;
	max-width: 900px;
	background: url('images/section.png') #1b1b1a;
	background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="128" height="128"><defs><filter id="bg"><feTurbulence type="fractalNoise" baseFrequency="0.6" stitchTiles="stitch"/><feColorMatrix values="0.015 0 0 0 0.004 0 0.015 0 0 0.004 0 0 0.015 0 0.0035 0 0 0 0 1"/></filter></defs><rect width="100%" height="100%" filter="url(%23bg)"/></svg>'), linear-gradient(transparent, transparent) #1b1b1a;
	padding: 5px;
	margin-bottom: 30px;
	margin-top: 20px;
	padding-left: 15px;
	padding-right: 10px;
	box-shadow: inset 0px 0px 10px 2px #111;
	clear: both;
}

body > article {
	margin: auto;
	max-width: 900px;
	margin-bottom: 40px;
	position: relative;
	text-shadow: #000 0px 0px 5px;
}

body > article > section {
	max-width: 760px;
}

article > section {
	display: block;
}

article > section + section {
	padding-top: 2px;
}

/* content footer */

#description {
	max-width: 760px; /* leave some space for the sidebar! */
}

#download {
	padding: 0;
	margin-left: 0px;
	margin-top: 10px;
	position: absolute;
	top: 2px;
	right: -5px;
	margin-bottom: 7px;
}

#download .button {
	color: #ccc;
	border-radius: 10px;
	background-color: #353;
	border: 1px solid #585;
	display: inline-block;
	padding-left: 3px;
	padding-top: 5px;
	padding-bottom: 0px;
	padding-right: 9px;
	font-size: 11pt;
	font-weight: bold;
	margin: 10px;
	margin-top: 5px;
}

#download .button:hover {
	color: #eef;
	background-color: #483;
	border-color: #7a7;
}

#download .os-icons > * {
	margin-left: 3px;
	margin-right: 2px;
	display: inline-block;
}

#download .os-icons > *:hover .icon, #download .os-icons > *:focus .icon {
	box-shadow: 0px 0px 16px 1px #555;
	background-color: #333;
	border-radius: 8px;
	opacity: 1;
}

#download .os-icons {
	text-align: center;
	width: 100%;
}

#video {
	position: relative;
	overflow: hidden;
	width: 752px;
	height: 423px;
}

/* Then style the iframe to fit in the container div with full height and width */
#video > * {
	position: absolute;
	top: 0;
	left: 0;
	bottom: 0;
	right: 0;
	width: 100%;
	height: 100%;
}

#sidebar {
	padding: 0;
	width: 170px;
	margin-left: 0px;
	margin-top: 10px;
	position: absolute;
	top: 100px;
	right: -35px;
	height: 375px;
	font-size: 8pt;
	font-weight: bold;
	color: #666;
	line-height: 130%;
}

#sidebar ul {
	padding: 0px;
	margin: 0px;
	margin-top: 6px;
	margin-bottom: 16px;
}

#sidebar ul > li {
	padding-right: 8px;
	padding-left: 8px;
	padding-top: 2pt;
	padding-bottom: 1pt;
	letter-spacing: 0px;
	display: block;
	font-weight: normal;
	margin-top: 3px;
	margin-bottom: 3px;
}

@media (max-width: 910px) {
	
	body > article > * {
		margin-left: 10px;
		margin-right: 10px;
	}
	
	#description, body > article > section {
		max-width: 100%;
	}
	
	#download {
		position: relative;
		width: 100%;
		right: 0px;
		text-align: center;
		margin: 0px;
	}
	
	#download .button {
		position: relative;
		bottom: 13px;
	}
	
	#download .os-icons {
		display: inline-block;
		width: auto;
	}
	
	#video {
		width: 100%;
		height: auto;
		padding-top: 56.25%;
		margin: 0px;
	}
	
	#sidebar {
		position: relative;
		width: 100%;
		right: 0px;
		top: 0px;
		margin-top: 20px;
		height: auto;
		clear: both;
	}
	
	#sidebar > * {
		display: inline-block;
		vertical-align: top;
		margin-left: 5px;
		margin-right: 15px;
	}
	
}

#sidebar a:not(:hover), #comment:not(:hover) {
	text-shadow: #543 0px 0px 1px;
	color: #986;
}

/* Fade out icons in some links */
#rss, #sidebar ul a > .icon, #comment > .icon {
	
	/* Nice sepia + colorize filter - works in Firefox 3.5+ but nowhere else */
	/* Inlined to reduce number of  HTTP requests - original file is filters.svg */
	filter: url("data:image/svg+xml;utf8,<svg xmlns=\'https://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.4 0.2 0.2  0.3 0     0.2 0.4 0.2  0.1 0     0.2 0.2 0.4  -.1 0     0   0   0    1   0\'/></filter></svg>#grayscale");
	
	/* Browser-specific aliases of the standard CSS sepia filter */
	-webkit-filter: sepia(0.9); /* Chrome 18+, Safari */
	-webkit-filter: sepia(90%);
	-moz-filter: sepia(90%); /* unimplemented */
	-ms-filter: sepia(90%); /* unimplemented? */
	-o-filter: sepia(90%); /* unimplemented */
	
	filter:
		
		/* IE-specific fallback for IE 9 and older */
		gray
		
		/* Standard CSS sepia filter (Filter Effects 1.0) */
		sepia(90%)
		
		/* Transparency for IE8 and earlier - will this break other browsers? */
		alpha(opacity=15)
	;
	
	/* Standard transparency */
	opacity: 0.15;
	
}

/* Reset filters from above if item/link has mouse/kerboard focus */
#download a:hover, #download a:focus, #sidebar a:hover, #sidebar a:focus,
#rss:hover, #rss:focus,
#sidebar ul a:hover > .icon, #sidebar ul a:focus > .icon,
#comment:hover > .icon, #comment:focus > .icon {
	filter: none;
	-webkit-filter: sepia(0);
	-moz-filter: sepia(0);
	-ms-filter: sepia(0);
	-o-filter: sepia(0);
	opacity: 1;
}

#download a > .icon, #sidebar a > .icon {
	display: block;
	float: left;
	margin-right: 5px;
	position: relative;
	top: -2px;
}

.icon {
	opacity: 0.7;
}

#sidebar ul a:hover > .icon {
	box-shadow: 0px 0px 2px 2px #333;
	background-color: #333;
	border-radius: 2px;
}

#rss {
	float: right;
	margin: 4px;
	margin-right: 0px;
	display: inline-block;
	position: relative;
	z-index: 1;
}

.screenshot {
	float: left;
	margin-left: 10px;
	margin-right: 20px;
	margin-top: 5px;
	margin-bottom: 15px;
	text-shadow: #000 1px 1px 2px;
	font-size: 85%;
	text-align: center;
	clear: left;
	max-width: 100%;
}

.screenshot.right {
	float: right;
	margin-right: 10px;
	margin-left: 20px;
	clear: right;
}

@media (max-width: 550px) {
	
	article > div, article > section {
		text-align: center;
	}
	
	article > div > *, article > section > * {
		text-align: left;
	}
	
	.screenshot, .screenshot.right {
		float: none;
		clear: both;
		display: inline-block;
		margin: 5px;
	}
	
}

@media (max-width: 350px) {
	
	.screenshot, .screenshot.right {
		margin-left: 5px;
	}
	
}

.screenshot img {
	display: block;
	box-shadow: 0px 0px 3px 1px #654;
	margin-bottom: 7px;
	border-radius: 3px;
	max-width: 100%;
	height: auto;
}

.screenshot a:focus img {
	box-shadow: 0px 0px 5px 1px #aaa;
	background-color: #666;
}

/* news items */

#news article > header {
	position: relative;
}

#news article > header > h1 {
	margin: 7px;
	margin-top: 15px;
	font-size: 140%;
	padding-right: 120px;
	position: relative;
	padding-left: 8px;
}

#news article > header > h1 a {
	color: #eee;
	text-shadow: none;
}

#news article > header > h1:before {
	content: "\00bb";
	color: #555;
	position: absolute;
	left: -0.5em;
}

#news article > header > h1:after {
	content: "\00ab";
	color: #555;
	white-space: nowrap;
	width: 8px;
	margin-right: -8px;
	position: relative;
	left: 0.4em;
}

#news article > header > time {
	font-size: 10pt;
	color: #666;
	text-shadow: #000 1px 1px 2px;
	font-weight: bold;
	margin-right: 7px;
	position: absolute;
	top: 0px;
	right: 0px;
}

#news #rss + article > header > h1 {
	margin-top: 9px;
}

#news #rss + article > header > time {
	margin-right: 32px;
}

@media (max-width: 650px) {
	
	#news article > header > h1 {
		padding-right: 0px;
	}
	
	#news article > header > time {
		margin-top: -1.1em;
		padding-left: 15px;
		position: relative;
	}
	
}

#news article h2 {
	color: #ccc;
	font-size: 110%;
	text-align: left;
	margin-top: 20px;
	margin-bottom: 0;
}

#news article h2 + p {
	margin-top: 5px;
}

#news article > footer {
	margin-top: 20px;
	clear: both;
}

#news article + article {
	border-top: 1px dotted #555;
	margin-top: 15px;
}

#news .navigate + article {
	margin-top: 5px;
	border-top: 1px dotted #555;
}

#news .navigate {
	height: 1em;
	padding-top: 2px;
	padding-bottom: 6px;
	border-top: 1px dotted #3a3a3a;
	clear: both;
}

#news .navigate .next:before, #news .navigate .more:before {
	content: "\00bb\0020";
	color: #555;
}

#news .navigate .prev:after, #news .navigate .more:after {
	content: "\0020\00ab";
	color: #555;
}

#news .navigate .prev, #news .navigate .next {
	float: right;
	margin: 0px;
	padding: 0px;
}

#news .navigate .prev {
	float: left;
}

#news .navigate .options {
	text-align: center;
	clear: none;
	padding-left: 5px;
}

#news .navigate .options > * {
	display: inline-block;
	margin-left: 10px;
	margin-right: 10px;
	padding: 0 15px;
	border-left: 1px dotted #3a3a3a;
	border-right: 1px dotted #3a3a3a;
}

#news .navigate .more {
	text-align: center;
}

#news article .more {
	height: 1em;
	position: relative;
	top: -6px;
	padding-bottom: 2px;
}

#news article .more:before {
	content: "[...]";
	color: #666;
}

#news article .more a:before {
	content: "(";
	font-size: 80%;
}

#news article .more a:after {
	content: ")";
	font-size: 80%;
}

#news article .more a {
	float: right;
}

img:-moz-loading {
	color: transparent;
}
