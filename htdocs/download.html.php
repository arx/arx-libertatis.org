<?
// Contact page

$p->inherit('frame');
$p->title = 'Download Arx Libertatis';
$p->import('icons');

?>

<section>
	
	<h2>Download</h2>
	
	<p>
		The current version of Arx Libertatis is <b>1.2.1</b> (<a href="/releases/1.2" itemprop="releaseNotes">announcement</a>):
	</p>
	
	<ul class="multi downloads">
		
		<li>
			<a href="files/arx-libertatis-1.2.1-windows.exe"><span class="big windows icon"></span>Arx Libertatis Windows Installer</a>
			<a href="https://github.com/arx/ArxLibertatis/releases/download/1.2.1/arx-libertatis-1.2.1-windows.exe">(mirror)</a>
			<br>
			<span class="name">arx-libertatis-1.2.1-windows.exe</span>
			<span class="size">9.2 MiB</span>
			<br>
			<span class="checksum">MD5: <code>539cd327b673a0b80ddb2ec2f91111e8</code></span>
			<a class="signature" href="files/arx-libertatis-1.2.1-windows.exe.sig">signature</a>
		</li>
		
		<li>
			<a href="files/arx-libertatis-1.2.1-linux.tar.xz"><span class="big linux icon"></span>Arx Libertatis Linux Binaries</a>
			<a href="https://github.com/arx/ArxLibertatis/releases/download/1.2.1/arx-libertatis-1.2.1-linux.tar.xz">(mirror)</a>
			<br>
			<span class="name">arx-libertatis-1.2.1-linux.tar.xz</span>
			<span class="size">5.6 MiB</span>
			<br>
			<span class="checksum">MD5: <code>af3c124ecd0a2c5d98f7b995cb4c36f2</code></span>
			<a class="signature" href="files/arx-libertatis-1.2.1-linux.tar.xz.sig">signature</a>
		</li>
		
	</ul>
	
	<p>
		To play Arx Libertatis you need <a href="<?= url('wiki:Getting_the_game_data') ?>">the original game</a> from <a href="<?= url('p:gog_arx') ?>"><?= $p->i_gog ?></a>, <a href="<?= url('p:steam_arx')   ?>"><?= $p->i_steam ?></a>, the <a href="<?= url('p:msstore_arx') ?>">Microsoft Store</a>, the <a href="<?= url('p:bethesda_arx') ?>">Bethesda Store</a> or a CD.
	</p>
	
	<p>
		On <?= $p->i_windows ?> install Arx Fatalis (and <a href="<?= url('p:patch_dl') ?>">the 1.21 patch</a> if installing from CD) before installing Arx Libertatis.<br>
		On <?= $p->i_linux ?> see the wiki article for <a href="<?= url('wiki:Installing_the_game_data_under_Linux') ?>">installing the game data</a> or <a href="<?= url('wiki:Steam#Linux') ?>">configure <?= $p->i_steam ?> to use Arx Libertatis</a>.
	</p>
	
	<p>
		Files are signed with <a href="release.asc">this OpenPGP key</a> (<a href="http://keys.gnupg.net/pks/lookup?search=0xF87D7DF750859A5E">F87D7DF750859A5E</a>)
	</p>
	
	<h3>Other download options</h3>
	
	<p>
		For other operating systems, build from Source. There is also a portable .zip version for the Windows binaries.
	</p>
	
	<ul class="multi downloads other">
		
		<li>
			<a href="files/arx-libertatis-1.2.1.tar.xz"><span class="big download icon"></span>Arx Libertatis Source Code</a>
			<a href="https://github.com/arx/ArxLibertatis/releases/download/1.2.1/arx-libertatis-1.2.1.tar.xz">(mirror)</a>
			<br>
			<span class="name">arx-libertatis-1.2.1.tar.xz</span>
			<span class="size">2.4 MiB</span>
			<br>
			<span class="checksum">MD5: <code>e5bc9482dada975b6b8a2dc5451f3671</code></span>
			<a class="signature" href="files/arx-libertatis-1.2.1.tar.xz.sig">signature</a>
		</li>
		
		<li>
			<a href="files/arx-libertatis-1.2.1-windows.zip"><span class="big windows icon"></span>Arx Libertatis Windows Binaries</a>
			<a href="https://github.com/arx/ArxLibertatis/releases/download/1.2.1/arx-libertatis-1.2.1-windows.zip">(mirror)</a>
			<br>
			<span class="name">arx-libertatis-1.2.1-windows.zip</span>
			<span class="size">11.2 MiB</span>
			<br>
			<span class="checksum">MD5: <code>f256ad08d83b9ca1878faceb84b5e73f</code></span>
			<a class="signature" href="files/arx-libertatis-1.2.1-windows.zip.sig">signature</a>
		</li>
		
	</ul>
	
	<p>
		<a href="files/">Older releases are archived here.</a>
	</p>
	
	<p>
		The <a href="<?= url('p:git') ?>">Arx Libertatis repository on GitHub</a> contains the latest development code. Read-only access is available through the following URL:
	</p>
	
	<pre>git clone <?= url('r:git') ?></pre>
	
	<p>
		We also provide <a href="<?= url('p:snapshots') ?>">pre-built <?= $p->i_windows ?> and <?= $p->i_linux ?> binaries for regular development snapshots</a>.
	</p>
	
</section>

<section id="packages">
	
	<h2>Packages</h2>
	
	<p>
		Arx Libertatis packages are available for the following operating systems and Linux distributions:
	</p>
	
	<table class="packages">
		
		<tr>
			<th>OS / Distribution</th>
			<th>Repository</th>
			<th>Package</th>
			<th>Version</th>
			<th>Type</th>
			<th></th>
		</tr>
		
		<tr id="alt">
			<td>ALT Linux</td>
			<td><a href="https://packages.altlinux.org/en/sisyphus/home">Sisyphus repository</a></td>
			<td><a href="https://packages.altlinux.org/en/sisyphus/srpms/ArxLibertatis">ArxLibertatis</a></td>
			<td class="okay">1.2</td>
			<td class="good">distro</td>
			<td></td>
		</tr>
		
		<tr id="arch">
			<td><span class="arch icon"></span> Arch Linux</td>
			<td><a href="https://aur.archlinux.org/">Arch User Repository</a></td>
			<td><a href="https://aur.archlinux.org/packages/arx-libertatis/">arx-libertatis</a></td>
			<td class="good">1.2.1</td>
			<td class="okay">user</td>
			<td><a href="<?= url('wiki:Linux_packages#Arch_Linux') ?>">Instructions</a></td>
		</tr>
		
		<tr id="debian">
			<td><span class="debian icon"></span> Debian</td>
			<td><a href="https://build.opensuse.org/project/show/home:dscharrer">home:dscharrer</a> on <a href="https://build.opensuse.org/">OBS</a></td>
			<td><a href="https://software.opensuse.org/download/package?project=home%3Adscharrer&amp;package=arx-libertatis">arx-libertatis</a></td>
			<td class="good">1.2.1</td>
			<td class="okay">own</td>
			<td><a href="<?= url('wiki:Linux_packages#Debian') ?>">Instructions</a></td>
		</tr>
		
		<tr id="dragonflybsd">
			<td>DragonFly BSD</td>
			<td><a href="https://github.com/DragonFlyBSD/DPorts">DPorts</a></td>
			<td><a href="https://github.com/DragonFlyBSD/DPorts/tree/master/games/arx-libertatis">arx-libertatis</a></td>
			<td class="poor">1.1.2</td>
			<td class="good">distro</td>
			<td></td>
		</tr>
		
		<tr id="exherbo">
			<td>Exherbo</td>
			<td><a href="https://git.exherbo.org/summer/repositories/hasufell/index.html">hasufell</a></td>
			<td><a href="https://git.exherbo.org/summer/packages/games-rpg/arx-libertatis/index.html">arx-libertatis</a></td>
			<td class="poor">1.1.2</td>
			<td class="okay">user</td>
			<td></td>
		</tr>
		
		<tr id="fedora">
			<td><span class="fedora icon"></span> Fedora</td>
			<td><a href="https://build.opensuse.org/project/show/home:dscharrer">home:dscharrer</a> on <a href="https://build.opensuse.org/">OBS</a></td>
			<td><a href="https://software.opensuse.org/download/package?project=home%3Adscharrer&amp;package=arx-libertatis">arx-libertatis</a></td>
			<td class="good">1.2.1</td>
			<td class="okay">own</td>
			<td><a href="<?= url('wiki:Linux_packages#Fedora') ?>">Instructions</a></td>
		</tr>
		
		<tr id="freebsd">
			<td id="FreeBSD"><span class="freebsd icon"></span> FreeBSD</td>
			<td><a href="https://www.freebsd.org/ports/">FreeBSD ports</a></td>
			<td><a href="https://www.freshports.org/games/arx-libertatis/">arx-libertatis</a></td>
			<td class="good">1.2.1</td>
			<td class="good">distro</td>
			<td><a href="<?= url('wiki:Other_packages#FreeBSD') ?>">Instructions</a></td>
		</tr>
		
		<tr id="funtoo">
			<td>Funtoo</td>
			<td><a href="https://github.com/funtoo/games-kit">games-kit</a></td>
			<td><a href="https://github.com/funtoo/games-kit/tree/1.4-release/games-rpg/arx-libertatis">arx-libertatis</a></td>
			<td class="poor">1.1.2</td>
			<td class="good">distro</td>
			<td></td>
		</tr>
		
		<tr id="gentoo">
			<td><span class="gentoo icon"></span> Gentoo</td>
			<td><a href="https://github.com/arx/ArxGentoo">arx-libertatis overlay</a></td>
			<td><a href="https://gpo.zugaina.org/games-rpg/arx-libertatis">arx-libertatis</a></td>
			<td class="good">1.2.1</td>
			<td class="okay">own</td>
			<td><a href="<?= url('wiki:Linux_packages#Gentoo_Linux') ?>">Instructions</a></td>
		</tr>
		
		<tr id="guix">
			<td>GuixSD</td>
			<td>GNU Guix</td>
			<td><a href="https://guix.gnu.org/packages/arx-libertatis-1.2/">arx-libertatis</a></td>
			<td class="okay">1.2</td>
			<td class="good">distro</td>
			<td></td>
		</tr>
		
		<tr id="haiku">
			<td>Haiku</td>
			<td><a href="https://depot.haiku-os.org/#!/repository/haikuports">HaikuPorts</a></td>
			<td><a href="https://depot.haiku-os.org/#!/pkg/arx_libertatis">arx_libertatis</a></td>
			<td class="okay">1.2</td>
			<td class="good">distro</td>
			<td></td>
		</tr>
		
		<tr id="luxtorpeda">
			<td>Luxtorpeda</td>
			<td><a href="https://https://github.com/luxtorpeda-dev/luxtorpeda">luxtorpeda-dev</a></td>
			<td><a href="https://luxtorpeda-dev.github.io/packages.html">arxlibertatis</a></td>
			<td class="good">1.2.1</td>
			<td class="okay">user</td>
			<td></td>
		</tr>
		
		<tr id="macos">
			<td id="macOS"><span class="macos icon"></span> macOS</td>
			<td id="Mac_OS_X"><a href="https://brew.sh/">Homebrew</a></td>
			<td><a href="https://formulae.brew.sh/formula/arx-libertatis">arx-libertatis</a></td>
			<td class="good">1.2.1</td>
			<td class="good">distro</td>
			<td><a href="<?= url('wiki:Other_packages#macOS') ?>">Instructions</a></td>
		</tr>
		
		<tr id="mageia">
			<td><span class="mageia icon"></span> Mageia</td>
			<td>Core</td>
			<td><a href="https://madb.mageia.org/package/show/release/cauldron/application/0/name/arx-libertatis">arx-libertatis</a></td>
			<td class="okay">1.2</td>
			<td class="good">distro</td>
			<td><a href="<?= url('wiki:Linux_packages#Mageia') ?>">Instructions</a></td>
		</tr>
		
		<tr id="netbsd">
			<td>NetBSD</td>
			<td><a href="http://pkgsrc.se/">pkgsrc</a></td>
			<td><a href="https://pkgsrc.se/games/arx-libertatis">arx-libertatis</a></td>
			<td class="okay">1.2</td>
			<td class="good">distro</td>
			<td></td>
		</tr>
		
		<tr id="nintendoswitch">
			<td>Nintendo Switch</td>
			<td>Homebrew</td>
			<td><a href="https://gbatemp.net/threads/arx-libertatis-port-arx-fatalis-for-the-switch.591621/">arx</a></td>
			<td class="okay">1.2</td>
			<td class="okay">user</td>
			<td></td>
		</tr>
		
		<tr id="nixos">
			<td>NixOS</td>
			<td><a href="https://nixos.org/nixos/packages.html">NixOS packages</a></td>
			<td><a href="https://github.com/NixOS/nixpkgs/blob/master/pkgs/games/arx-libertatis/default.nix">arx-libertatis</a></td>
			<td class="bad">1.2-dev</td>
			<td class="good">distro</td>
			<td></td>
		</tr>
		
		<tr id="openbsd">
			<td>OpenBSD</td>
			<td><a href="http://openports.se/">OpenBSD ports</a></td>
			<td><a href="https://openports.se/games/arx-libertatis">arx-libertatis</a></td>
			<td class="good">1.2.1</td>
			<td class="good">distro</td>
			<td></td>
		</tr>
		
		<tr id="openmandriva">
			<td><span class="openmandriva icon"></span> OpenMandriva</td>
			<td>Contrib</td>
			<td><a href="https://github.com/OpenMandrivaAssociation/arx-libertatis">arx-libertatis</a></td>
			<td class="poor">1.1.2</td>
			<td class="good">distro</td>
			<td><a href="<?= url('wiki:Linux_packages#Mandriva') ?>">Instructions</a></td>
		</tr>
		
		<tr id="opensuse">
			<td><span class="opensuse icon"></span> openSUSE</td>
			<td><a href="https://build.opensuse.org/project/show/home:dscharrer">home:dscharrer</a> on <a href="https://build.opensuse.org/">OBS</a></td>
			<td><a href="https://software.opensuse.org/download/package?project=home%3Adscharrer&amp;package=arx-libertatis">arx-libertatis</a></td>
			<td class="good">1.2.1</td>
			<td class="okay">own</td>
			<td><a href="<?= url('wiki:Linux_packages#openSUSE') ?>">Instructions</a></td>
		</tr>
		
		<tr id="pandora">
			<td>Pandora</td>
			<td><a href="https://repo.openpandora.org/">repo.openpandora.org</a></td>
			<td><a href="https://repo.openpandora.org/?page=detail&amp;app=arxlibertatis_ptitseb">arxlibertatis</a></td>
			<td class="poor">1.1.1</td>
			<td class="good">distro</td>
			<td></td>
		</tr>
		
		<tr id="rosa">
			<td><span class="rosa icon"></span> ROSA</td>
			<td>Contrib</td>
			<td><a href="https://abf.io/import/arx-libertatis">arx-libertatis</a></td>
			<td class="okay">1.2</td>
			<td class="good">distro</td>
			<td><a href="<?= url('wiki:Linux_packages#ROSA') ?>">Instructions</a></td>
		</tr>
		
		<tr id="slackware">
			<td><span class="slackware icon"></span> Slackware</td>
			<td><a href="https://slackbuilds.org/">slackbuilds.org</a></td>
			<td><a href="https://slackbuilds.org/result/?search=arx-libertatis&amp;sv=">arx-libertatis</a></td>
			<td class="poor">1.1.2</td>
			<td class="okay">user</td>
			<td></td>
		</tr>
		
		<tr id="solus">
			<td>Solus</td>
			<td><a href="https://packages.getsol.us/shannon/">shannon</a></td>
			<td><a href="https://packages.getsol.us/shannon/a/arx-libertatis/">arx-libertatis</a></td>
			<td class="okay">1.2</td>
			<td class="good">distro</td>
			<td></td>
		</tr>
		
		<tr id="ubuntu">
			<td><span class="ubuntu icon"></span> Ubuntu</td>
			<td><a href="https://launchpad.net/~arx/+archive/release">ppa:arx/release</a></td>
			<td><a href="https://launchpad.net/~arx/+archive/release">arx-libertatis</a></td>
			<td class="good">1.2.1</td>
			<td class="okay">own</td>
			<td><a href="<?= url('wiki:Linux_packages#Ubuntu') ?>">Instructions</a></td>
		</tr>
		
	</table>
	
	<p>
		If your distribution is not listed, first check <a href="<?= url('p:repology') ?>">Repology's package version list</a> as well as the appropriate repositories in case someone already created a package for your distribution. If you create your own packages or find one that isn't listed here, <a href="<?= url('p:contact') ?>">let us know</a> so that we can add them.
	</p>
	
</section>

<?
 $p->header()->append()
?>

<style>

table.packages {
	min-width: 90%;
	margin: 7px auto;
}

table.packages td:nth-child(3) {
	text-align: center;
}

table.packages td:nth-child(6) {
	text-align: center;
}

@media (max-width: 700px) {
	
	table.packages {
		background: none;
		box-shadow: none;
		display: block;
		margin-top: 0px;
		margin-bottom: 0px;
		margin-left: 7px;
	}
	
	table.packages tr:nth-child(odd), table.packages tr:nth-child(even) {
		background: none;
		display: block;
		margin-top: 10px;
		margin-bottom: 10px;
		padding-left: 20px;
	}
	
	table.packages th {
		display: none;
	}
	
	table.packages td {
		border: none;
		display: inline;
		padding: 0px;
	}
	
	table.packages td:nth-child(1) {
		display: block;
		clear: both;
		font-weight: bold;
		margin-bottom: 3px;
		margin-left: -20px;
	}
	
	table.packages td:nth-child(2) {
		display: block;
	}
	
	table.packages td:nth-child(2):before {
		content: 'Repository: ';
	}
	
	table.packages td:nth-child(3):before {
		content: 'Package: ';
	}
	
	table.packages td:nth-child(4) {
		margin: 0px 7px;
	}
	
	table.packages td:nth-child(5):before {
		content: '(';
	}
	
	table.packages td:nth-child(5):after {
		content: ')';
	}
	
	table.packages td:nth-child(6) {
		text-align: left;
	}
	
	table.packages td:nth-child(6) {
		display: block;
		clear: both;
	}
	
}

</style>
