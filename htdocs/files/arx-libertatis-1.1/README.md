
# Arx Libertatis 1.1 "Rhaa Movis"

This directory contains source code and binaries for version 1.1 of [Arx Libertatis](https://arx-libertatis.org/), a cross-platform, open source port of Arx Fatalis.

See the main [downloads page](https://wiki.arx-libertatis.org/Download) for alternate download locations and Linux packages.

## MD5 Checksums

* `1ed70a9dbbc5be0bd61f0643a5180755`  arx-libertatis-1.1.tar.xz
* `7e6883ecbad0355985c36db69ba74ab0`  arx-libertatis-1.1-freebsd.tar.xz
* `733a82397e9f8e7577903d2fe6fac4a9`  arx-libertatis-1.1-linux.tar.xz
* `42503a475897ddf168eedd3444366784`  arx-libertatis-1.1-win-x64.exe
* `84a2343ed8338bb03ad4f37669b1460c`  arx-libertatis-1.1-win-x86.exe

## Changelog

New Features:

* Added support for multiple simultaneous data directories
* The `--data-dir` (`-d`) command-line option can now be repeated to add multiple data directories
* Added a `--no-data-dir` (`-n`) command-line option to disable system data directories
* Improved error messages for missing data files
* Added an error dialog if the user directory could not be created
* Enabled up to 8xMSAA (if supported) with the SDL/OpenGL backend (was: 4xMSAA)
* Ensured that we never request a window size or fullscreen resolution below 640x480
* Linux: Merged the data install script and set it to be installed it with the arx binary
* Linux: Added a GUI to the data install script and launch it automatically if needed - you no longer need to use the terminal to install the game data under Linux!
* Linux: Added support for bundled Arx Fatalis versions to the data install script (bug #348)
* Linux: Translated the .desktop file to French, German and Russian
* Restored some unused spell sounds
* Tweaked color of the Protection from fire aura to make it visually different from the aura of the Armor spell
* Windows: Changed default input/windowing/render backends to SDL+OpenGL - DirectX backends may be removed in a future version

Fixed Bugs:

* Fixed Am Shaegar accelerating too much during slow frames (bug #185)
* Increased jump distance to fix some jumps that have become frustratingly hard (bug #413)
* Replaced [DevIL](http://openil.sourceforge.net/) with [stb_image](https://nothings.org/stb_image.c) for image loading (task #352)
* Fixed a script evaluation bug when looking up Entity-dependent special variables
* Fixed a crash when evaluating script variables
* Fixed a crash caused by entities without an attached 3D object (bug #434)
* Fixed a crash in the `playanim` script command (bug #383)
* Fixed a crash when rendering text ending with two newlines
* Fixed a crash caused by bad window sizes or font loading / texture creation problems (bug #444)
* Windows: Fixed crashes and missing sounds due to bad OpenAL implementations by bundling [OpenAL Soft](https://kcat.strangesoft.net/openal.html) (task #435)
* Linux: Fixed improper handling of set-but-empty $XDG_* variables
* Merged remaining fixes from Nuky's [arx-fatalis-fixed](https://code.google.com/archive/p/arx-fatalis-fixed/): (task #276)
  * Tweaked portrait render zone in the new game screen
  * Fade out rune symbol flares when switching away from the spell page (Issue 13)
  * Fixed detected NPCs from the current level showing up on all level maps in the book (Issue 12)
* Fixed missing page turn sound when switching between book pages via hotkeys (F1-F4)
* Fixed being able to switch to the spell page via prev/next hotkeys before getting any runes
* Fixed minimap showing a smaller area on higher resolutions (bug #64)
* Adjusted the RAF cheat to no longer limit the player's caster level to 1
* Fixed Protection from fire spell not respecting the durations supplied by scripts
* Changed the default duration for Protection from fire and Protection from cold spells cast by NPCs from over 30 minutes to 20 seconds
* Fixed handling of bogus targets in the `spellcast` script command
* Turning off the Detect trap spell no longer turns off Night vision

Technical Changes:

* A **lot** of code cleanup
* Removed dependency on Boost.Program_options - Boost is now only needed at build-time. We tried to keep the same command-line argument syntax but there might be slight changes in corner cases. (task #353)
* Changed to always create a user/config directory in the user's in home directory unless explicitly changed with the `--user-dir` and/or `--config-dir` options or registry keys. Previously, if no data and user directories were found, the current working directory was used as the user directory.
* Linux: Added `/opt` as a system data directory prefix (besides `$XDG_DATA_DIRS`)
* Linux: Added `arx` as a system data directory suffix (besides `games/arx`)
* Added the executable directory as a system data directory (bug #242)
* Improved handling of bad UTF-8 sequences
* Made the text handling code architecture-independent
* Enabled C++11 mode for GNU-compatible compilers, if supported
* Added CMake options to control the custom compiler flags used
* Mac OS X: Fixed some build issues (YMMV)
* Fixed build with the Intel C++ compiler
* Fixed build with some MinGW32 distributions
* Fixed debug build with libc++
* Fixed build with CMake 2.8.10
* Fixed build with MS Visual Studio 2012
* Added support for building the crash reporter with Qt 5
* Aligned and tweaked log output

See the full [changelog](https://wiki.arx-libertatis.org/Changelog) for changes in other versions.
