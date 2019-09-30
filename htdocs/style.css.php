
<? require('images/icons.css.php') ?>

/* global settings */

/* HTML 5 compatability for older browsers */
header, nav, section, article, aside, footer, hgroup {
	display: block;
}

body > header > h1 {
	margin: 0px;
}

body {
	margin: 0;
	padding: 0;
	background-color: #1a1a1a;
	color: #ccc;
	font-family: "DejaVu Sans", "Bitstream Vera Sans", "Liberation Sans", Arial, sans-serif;
	font-size: 10pt;
	padding-top: 19px;
}

iframe {
	border: none;
}

/* common elements */

h2 {
	color: #777;
	margin: 5px;
	text-align: center;
	margin-bottom: 0px;
}

h3 {
	margin: 7px;
	margin-top: 15px;
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
	white-space: nowrap;
	text-align: center;
}

body > header:after {
	border-bottom: 2px solid #444;
	margin: auto;
	width: 710px;
	content: '';
	display: block;
}

#link-bar {
	font-size: 0;
	letter-spacing: -1px;
	padding-top: 9px;
	padding-bottom: 10px;
	text-transform: lowercase;
	font-variant: small-caps;
}

#link-bar * {
	padding-right: 8px;
	padding-left: 8px;
	font-weight: bold;
	font-size: 12pt;
	letter-spacing: 0px;
}

#link-bar * + * {
	border-left: 2px solid #444;
}

/* footer */

body > footer {
	margin: auto;
	width: 700px;
	font-size: 8pt;
	padding-top: 8px;
	margin-top: 35px;
	color: #555;
	border-top: 2px solid #444;
}

body > footer a {
	color: #543;
	text-shadow: none;
}

/* main structure */

body > header + section {
	margin-top: 25px;
}

body > section {
	margin: auto;
	width: 700px;
	background-color: #2c2c2a;
	padding: 5px;
	margin-bottom: 30px;
	margin-top: 20px;
	padding-left: 15px;
	padding-right: 10px;
	box-shadow: inset 0px 0px 10px 2px #181818;
	clear: both;
}

body > article {
	margin: auto;
	width: 700px;
	margin-top: 19px;
	margin-bottom: 40px;
	position: relative;
	text-shadow: #000 0px 0px 5px;
}

body > article > section {
	width: 560px;
}

article > section {
	display: block;
}

article > section + section {
	padding-top: 2px;
}

/* content footer */

#description {
	width: 560px; /* leave some space for the sidebar! */
}

#sidebar {
	padding: 0;
	width: 170px;
	margin-left: 0px;
	margin-top: -5px;
	position: absolute;
	top: 2px;
	right: -45px;
	height: 375px;
	font-size: 8pt;
	font-weight: bold;
	color: #666;
	white-space: nowrap;
}

#sidebar #download .button {
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

#sidebar #download .button:hover {
	color: #eef;
	background-color: #483;
	border-color: #7a7;
}

#sidebar #download .os-icons > * {
	margin-left: 3px;
	margin-right: 2px;
	display: inline-block;
}

#sidebar #download .os-icons > *:hover .icon, #sidebar #download .os-icons > *:focus .icon {
	box-shadow: 0px 0px 16px 1px #555;
	background-color: #333;
	border-radius: 8px;
	opacity: 1;
}

#sidebar #download .os-icons {
	margin-left: 10px;
	margin-bottom: 7px;
}

#sidebar > ul {
	padding: 0px;
	margin: 0px;
	margin-top: 6px;
	margin-bottom: 16px;
}

#sidebar > ul > li {
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

#sidebar #share {
	padding: 0;
	left: 0px;
	width: 100%;
	margin-top: 7px;
	margin-bottom: 7px;
}

#sidebar a:not(:hover), #comment:not(:hover) {
	text-shadow: #543 0px 0px 1px;
	color: #766D5E;
}

/* Fade out icons in some links */
#share > a, #rss, #sidebar ul a > .icon, #comment > .icon {
	
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
#share > a:hover, #share > a:focus,
#sidebar a:hover, #sidebar a:focus,
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

#sidebar a > .icon {
	display: block;
	float: left;
	margin-right: 5px;
	position: relative;
	top: -2px;
}

#sidebar #share > a {
	margin-bottom: 5px;
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
}

.screenshot {
	float: left;
	margin-left: 10px;
	margin-right: 20px;
	margin-top: 5px;
	margin-bottom: 15px;
	text-shadow: #000 1px 1px 2px;
	font-size: 8pt;
	text-align: center;
	clear: left;
}

.screenshot.right {
	float: right;
	margin-right: 10px;
	margin-left: 20px;
	clear: right;
}

.screenshot img {
	display: block;
	box-shadow: 0px 0px 3px 1px #654;
	margin-bottom: 7px;
	border-radius: 5px;
}

#share > a:focus, .screenshot a:focus img {
	box-shadow: 0px 0px 5px 1px #aaa;
	background-color: #666;
}

/* news items */

#news article {
	clear: both;
}

#news article > header > h1 {
	margin: 7px;
	margin-top: 15px;
	font-size: 1.17em;
}

#news article > header > h1 a {
	color: #eee;
	text-shadow: none;
}

#news article > header > h1:before {
	content: "\00bb\0020";
	color: #555;
}

#news article > header >  h1:after {
	content: "\0020\00ab";
	color: #555;
}

#news article > header > time {
	float: right;
	font-size: 10pt;
	color: #666;
	text-shadow: #000 1px 1px 2px;
	font-weight: bold;
	margin-top: -1.95em;
	margin-right: 7px;
}

#news article h2 {
	color: #ccc;
	font-size: 10pt;
	text-align: left;
	margin-bottom: 0px;
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
}

#news .navigate .options > #comment {
	border-left: 1px dotted #3a3a3a;
	padding-left: 15px;
}

#news .navigate .options > #share:before {
	border-left: 1px dotted #3a3a3a;
	padding-left: 16px;
	content: 'share: ';
	padding-right: 2px;
	color: #777;
}

#news .navigate .options > #share {
	padding-right: 10px;
	border-right: 1px dotted #3a3a3a;
}

#news .navigate .options > #share > a:hover {
	box-shadow: 0px 0px 5px 0px #111;
	background-color: #222;
}

#news .navigate .options > #share > * {
	margin-left: 3px;
	margin-right: 3px;
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
