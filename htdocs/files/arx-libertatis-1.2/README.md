
# Arx Libertatis 1.2

This directory contains source code and binaries for version 1.2 of [Arx Libertatis](https://arx-libertatis.org/), a cross-platform, open source port of Arx Fatalis.

See the main [downloads page](https://wiki.arx-libertatis.org/Download) for alternate download locations and Linux packages.

## MD5 Checksums

* `8e05754b75af0ed7fbf709d30b28df3c`  arx-libertatis-1.2.tar.xz
* `d69330c67033628c1fafa5dc781079dd`  arx-libertatis-1.2-linux.tar.xz
* `ebeb1fb140dad4bcf426d9b18927e6a0`  arx-libertatis-1.2-windows.exe
* `ea6ab380a93cb418cb0bc18bcdcd9eb7`  arx-libertatis-1.2-windows.zip

## Changelog

Gameplay:

* Added an alternate, less strict rune recognition algorithm (enabled by default) (feature request #289, #653)
* Made rune recognition less dependent on framerate (bug #856)
* Added an alternate bow aim mode
* Added gravity to arrows unless fully charged
* Fixed weapon durability degrading faster at higher framerates (bug #790)
* Fixed poison and magic resistance bonus from equipment and cheats being ignored in some cases
* Fixed player ascending infinitely when attacked while levitating (bug #640)
* Fixed Slow down spell affecting user interface and input and improve player movement while it is active (bug #534)
* Fixed hunger dropping below 0% when overeating (bug #132, fix is also applied when loading save files)
* Higher caster level now makes the Curse spell ''more'' effective against NPC Damages, Armor Class and Damage Absorption instead of less effective
* Calculated Armor Class, Magic Resistance, Poison Resistance and Damages stats now include attribute and skill modifiers from items and spells (bug #322)
* The Critical Hit chance now includes item and cheat modifiers
* The Negate magic spell and effect now correctly follows the target
* Fixed player not receiving experience for kills by summoned creatures
* Fixed selection of replacement weapon when the equipped one breaks to select one that is similarly powerful
* Fixed maximum player Health and Mana ignoring attribute modifiers from items and spells while the MAX or MAR cheats are active
* Fixed Akbaa not attacking the player after using his tentacle attack twice (bug #584)
* Fixed spells without mana drain using the mana drain from previous spells
* Fixed Confuse spell ending immediately (bug #615)

Graphics:

* Windows: In multi-GPU setups (Optimus/PowerXpress) the more powerful GPU is now used by default
* Added a configurable FPS limit independent of vsync, defaulting to the display refresh rate
* Added a field of view setting (feature request #404)
* Re-added a fullscreen gamma option (feature request #254)
* Added support for fullscreen modes with different refresh rates
* Added anti-aliasing to alpha cutouts (color key anti-aliasing, alpha to coverage and sample shading
* Added an option to disable anisotropic filtering (feature request #96)
* Added options to disable view bobbing and camera shake (feature request #405)
* Fixed missing blob shadows under dragged entities
* Fixed wrongly displayed light flare when dragging a torch (bug #783)
* Fixed water and lava not being animated while the night vision spell is active (bug #1053)
* Fixed scaling of flares around lights with higher resolutions
* Fixed light flares showing through scene geometry or disappearing when the light is still visible (bug #120)
* Fixed light flares showing through non-interactive entities (e.g. doors that are opening or closing)
* Fixed light flares being drawn in front interface elements including notes (bug #1145)
* Fixed light flares being disabled when the player book is open
* Fixed flashes, flares and other effects appearing in front of the cinematic border
* Fixed missing dynamic lighting for far away scene geometry (bug #1213)
* Fixed amount of sparks, flame and smoke particles depending on the framerate
* Fixed cinematic light flicker depending on the framerate
* Fixed VSync setting not being applied until the game is restarted
* Fixed water and lava animation overlay (bug #512)
* Fixed map rendering glitches with buggy OpenGL drivers (bug #539)
* Fixed Negate magic and Trap spell effects not rotating
* Fixed overzealous entity culling (bug #588)
* Fixed weapons and equipment always being drawn in front of the player hands and arms
* Fixed player hands clipping with walls in first person view
* Fixed arrow object rotation not matching direction
* Fixed missing arrow trails (bug #538) and improved the effect (also used in the Speed spell)
* Fixed NPC animations not playing when close to the player (bug #270)
* Fixed missing aura when a protection spell ended before a Lower armor on the same target
* Fixed Ylside blow up effect only disappearing when looking at it (bug #122)
* Fixed lighting only being updated every other frame (bug #75)
* Increased depth buffer from 16 bits minimum to 24 bits to prevent Z-fighting (bug #759)
* Linux: Fixed missing anti-aliasing for some drivers

Interface:

* Added options to scale the player book, HUD and cursor with larger resolutions (feature request #391, #996)
* Added an option to limit speech width on wide screens (enabled by default)
* Fixed scaling and positioning of magic flares when casting with higher resolutions (bug #535)
* Fixed scaling of cinematics with higher and wide resolutions
* Add an option to letterbox or fade out cinematics with wide resolutions (fade by default)
* Fixed player book and minimap being stretched with wide resolutions (bug #211)
* Fixed minimap texture filtering changing when hovering map markers (bug #570)
* Added anti-aliasing to HUD element borders (even without MSAA)
* Improved quest book text layout
* Added options to control the in-game font size and weight
* Increased default font weight for text in the player book and notes to improve readability
* Improved shop inventory sorting
* Added crosshair when aiming with a fully charged bow
* Sorting the inventory now never drops items to the ground
* Fixed missing quest book background when there are no quest entries (bug #1021)
* Fixed wrong items being highlighted when in combine mode (bug #121)
* Add missing item halo when combining items
* Fixed item halo being displayed in front of dragged items
* Fixed too small font size at resolutions slightly above 640x480
* Fixed rendering of runes in the player book
* Removed light affecting the world when clicking on runes in the book
* Tweaked how spell/stealth/equipment/torch icons move when opening the inventory
* Fixed purse halo not showing when selling certain items
* Fixed health and mana gauges not being hidden during the death animation (bug #806)
* Fixed position of number in cursor when distributing skill points
* Fixed level transition icons on the map not being displayed correctly (bug #782)
* The player book is now closed when returning to mouse look mode (bug #143)
* Fixed missing characters after forced line breaks in text (bug #718)

Controls:

* Added raw mouse input support and an option to control mouse acceleration
* Fixed border turning (bug #255) and added an option to disable it
* The "Resume game" menu entry and quickload (F9) now load the last save if no game is running (feature request #45)
* Added a keyboard shortcut for drinking cure poison potions (not bound by default)
* Added a keyboard shortcut to enter level transitions (feature request #105)
* Add an auto ready weapon mode that only triggers on enemies
* Player book and notes can now be closed using Escape (feature request #409)
* Improved item drag and drop behavior
* Improved drag threshold to make it less likely to accidentally drag an item when Shift+clicking it (bug #1225)
* Fixed being able to exceed item stack size limits in some cases (bug #1111)
* Added the ability to drop stacks of items to the floor or throw them (feature request #36)
* Added the ability to pick up stacks of items outside inventories while holding shift (stealth mode shortcut)
* Items can now be dragged across saves and level transitions
* Fixed rotation of dragged and thrown entities (bug #591)
* Fixed invert mouse setting affecting turning via keyboard or screen borders
* Fixed double-click only working for the first slot in the Action binding (bug #795)
* Mouse grab now released during cutscenes, conversations and cinematics
* Fixed mouse not always being centered when exiting mouse look mode
* Mouse look mode is now cancelled on focus loss to prevent the cursor being continuously warped to the window center

Audio:

* Added an option to enable [OpenAL Soft](https://openal-soft.org/)'s virtual surround (HRTF) support (enabled automatically when using headphones)
* Re-added environmental audio effects (reverb) using OpenAL EFX (the game uses only one relatively neutral environment)
* Added a config option to select the audio device (feature request #379)
* Restored more spell sounds and fixed spell sound positions
* The Harm, Ignite and Douse sound effects now correctly follow the caster/target (bug #740)
* Added an option to mute audio when the window is not focused
* Fixed duplicated page turn sound when clicking top tabs in the player book (bug #1125)
* Fixed casting sound being played on level load when restoring persistent fields of protection
* Fixed bare handed entity hit sound being repeated each frame
* Fixed sound position when dousing torches
* Added missing panning for ambient sounds
* Audio listener orientation now uses the camera pitch (only noticeable with HRTF)
* Fixed audio suddenly cutting off when getting too far from sources

Menu:

* Added text and audio language options (available languages depend on your Arx Fatalis version)
* Added German, Italian, Russian and Spanish localization of new menu strings (feature request #1006)
* Improved customize controls menu:
* Overwriting bindings no longer moves the old key (bug #717)
* Key bindings can now be removed using the escape key (feature request #408)
* Displayed key names now use the current keyboard layout
* Fixed removing duplicated key assignments
* Fixed being locked out of the config menu when binding the 'toggle fullscreen' action to the left mouse button (bug #1136)
* Fixed UI not updating properly when changing key bindings (bug #717)
* Sliders and option widgets can now be controlled using the mouse wheel or by clicking at the desired position
* Fixed checkbox mouseover area (bug #528)
* Fixed disappearing menu textures after resizing the window (bug #275)
* Fixed slow cursor animation and shorter cursor trail with higher framerates
* Increased the save thumbnail size
* Added support for Unicode save names (feature request #1032)
* Improved editing support in the save name textbox, including copy & paste support
* Improved date/time display in the save list
* Added additional highlighting and improved positioning to the credits
* Added the libraries and tools used for the build to the credits
* Added support for scrolling the credits using the mouse wheel or keyboard
* Fixed credits scroll position changing on window size changes

Windowing:

* Switched to [SDL 2](https://libsdl.org/) for windowing and input (task #506) - SDL 1 backend will be removed in the next version
* No longer grabs all keys when fullscreen (with SDL2)
* The default ("Desktop") resolution now selects fullscreen windowed mode (with SDL2) (feature request #300, #449)
* Added an option not to minimize the fullscreen window on Alt+TAB (feature request #814)
* Added a new high-resolution icon
* Screen saver is no longer inhibited while in the menu in windowed mode
* Windows: Disabled OS-level DPI scaling (bug #706)
* Windows: Fixed missing window icon
* Linux: Translated the .desktop file to Italian and Spanish
* macOS: Handle Command + Q shortcut to close the window

Modding:

* Added support for loading uncompressed FTL files
* Added a blender plugin for FTL files
* Added support for extending localization strings in mods
* Added a `^camera` system variable returning the active camera
* Added a `^dragged` system variable returning the item being dragged
* Added the `^angle*` and `^view*` system system variables returning the rotation of the player or another entity
* Fixed `^gamedays` system variable to give the number of days since the playthrough start instead of the the number of 10-days
* Added the `-o` flag to the `spellcast` script command to orphan the spell after being cast
* Added library and python wrapper for decompressing FTL files

Debugging:

* Added a script console (feature request #356)
* Added more debug views and made the key binding configurable (feature request #1500)
* Added `--skiplogo`, `--loadlevel`, `--loadslot` and `--loadsave` command-line option to skip startup logos or load a level or save file on startup
* Added support for loading save files by drag & drop
* Added ability to rename saves to `arxsavetool`
* Added a `--benchmark` command-line option
* Added a `--override-gl` command-line option and `extension_overrides` setting to control used OpenGL extensions
* Changed to OpenGL debug context and enabled ARB_debug_output for debug builds or with the `--debug-gl` option
* Added a config option for the vertex streaming buffer size

Tools:

* Added support to `arxunpak` to extract all resources as seen by the game (default when no arguments are given)
* Added support to `arxunpak` to create resource manifests with checksums
* `arxunpak` now handles non-ASCII characters in filenames
* Unix: Added support for different French and Russian Arx Fatalis CD versions to the data install script
* Unix: Added support for different localized demo versions to the data install script
* Unix: Fixed support for copying non-English data files from Steam installs in the data install script (bug #829)

Performance:

* A '''lot''' of code cleanup and various performance tweaks
* Reduced number of redundant OpenGL state changes
* Improved vertex upload, now uses persistently mapped buffers when available
* MSAA is now disabled for interface draw calls where it does not make a difference
* Optimized particle effect rendering
* Changed blood rendering to only need one draw command per particle
* Disabled denormalized floating point numbers on x86 and ARM for better performance
* Added a performance profiling tool
* Changed magic missile spell to only use one sound source instead of one per missile
* Improved CPU usage when the window is minimized
* Improved pathfinding performance, especially when the target is unreachable (bug #652)
* Windows: The OpenGL context is no longer re-initialized on resolution changes
* Unix: Enabled `-ffast-math` in release builds (was already enabled for MSVC)

Other Fixes:

* Significantly improved the item-world collision test: thrown or dropped items should no longer get stuck in walls, hover above the ground or fall through the ground or walls (bug #50, #556, #956)
* Fixed screenshot shortcut (F10) always overriding the same file
* Fixed potential resource leaks
* Fixed direction of player speech outside cutscenes
* Save files now correctly store game time for playthroughs longer than 1193 hours (AL 1.1.x and older as well as AF 1.21 simply ignore the additional data)
* Fixed inconsistent state (weapon equipped while not in combat mode) when loading a save that was created while in combat mode
* Fixed persistent arrow trails if arrows get outside the world
* Fixed game time not being reset to 0 when starting a new playthrough after having an old one loaded
* Fixed ^sender script variable possibly changing during script execution
* Fixed a buffer overflow when saving with very long script variables
* Fixed missing black bars in a cutscene in the castle of Arx (bug #1014)
* Fixed Akbaa tentacle not being hidden when it is supposed to be in the Ylside bunker
* Fixed crashes with item stack sizes or player gold amounts above 999999
* Fixed wrat teleport breaking when saving and loading during the teleport
* Fixed inconsistent weapon attachment when saving while in combat mode (bug #581)
* Fixed getting stuck in a cutscene in level 5 (bug #1293)
* Made saving more robust against unexpected filesystem errors (bug #439) or other programs opening the save file (bug #1218)
* Improved handling of corrupted inventories in save files (bug #1445)
* Fixed initial player position when starting a new game after already having loaded an existing game (bug #140)
* Fixed minimap reveal status not being reset when starting a new game (bug #1349)
* Fixed script variables not getting cleared on new game
* Fixed an error when a resource file size changed after the game start
* Fixed various crashes:
* Fixed a crash when loading saves with more than 1500 entities in a single level (bug #375)
* Fixed a crash when the entity whose inventory is open is destroyed (bug #843)
* Fixed a crash when the caster or target of a spell is destroyed (bug #951)
* Fixed a crash when the entity selected for combining is destroyed (bug #452)
* Fixed a lockup when throwing items at certain objects
* Fixed problems when loading save files with bugged entity positions (bug #894, #995)
* Fixed asserts with very high player stats not obtainable during normal gameplay  (bug #942)

Technical Changes:

* Fixed build with CMake 3.5.0 or newer
* Fixed Windows XP support with newer MSVC versions
* New dependency: [GLM](https://glm.g-truc.net/) 0.9.5.0 or newer
* macOS: New dependency: iconutil (from Xcode) or [icnsutil](https://github.com/pornel/libicns) for building the .icns icon
* New crash reporter dependency: WinHTTP / [libcurl](https://curl.haxx.se/libcurl/) 7.20.0 or newer
* Dropped support for CMake < 2.8.3
* Dropped support for Boost < 1.48
* Dropped support for Qt < 4.7
* Added support for using libepoxy instead of GLEW to load OpenGL functions
* The unity build is now enabled by default
* No longer stores deleted entities in save files if not needed
* Added SDL 2 fall-back for error dialogs
* Cleaned up missing data files error dialog, ask before running `arx-install-data`
* Added support for statically linking Freetype and ZLIB
* Color output is no longer enabled if `$NO_COLOR` is set or if `$TERM` is unset or set to "`dumb`"
* Added support for setting a runtime `libexec` search dir different from the install path
* Added support for the `ARX_PATH` environment variable under Windows
* Added support for storing .pak and loose files in a `data` subdirectory
* Added support for loading data files relative to the executable
* Added support for configuring additional data search paths
* There is now a dialog on crash and the crash report is prepared even if the Qt-based reporter is not available
* Fixed build on newer macOS versions
* Save files now track which playthrough they belong to (not used in the UI yet)
* The arx binary now displays a graphical error dialog when passed bad command-line arguments
* Changed passwall cheat to bypass culling
* Removed the need for a custom vertex shader
* Added support for using OpenGL ES-CM 1.x when desktop OpenGL is not available
* Add a script warning when a command is missing parameters
* The Gold linker is used and link time optimizations are now enabled automatically when building from source
* Enabled address randomization for the main executable in MSVC builds
* Made .pak loading case-insensitive on all platforms
* Windows: Added support for statically linking Qt in the crash reporter
* Windows: Support using a 32-bit crash reporter for a 64-bit arx process
* Windows: Added Unicode filesystem support (feature request #786)

Removed Features:

* DirectX backends (Direct3D, DirectSound, DirectInput)
* Video bit depth option
* Support for loading uncooked objects (.teo) and scenes (.scn)
* Removed `link_mouse_look_to_use` config option
* Removed the unused `killme` script command
* Removed the unused `stack`, `code` and `rgb` sub-commands from the `zoneparam` script command
* Remove stubbed-out `-a` flag from the `set` script command

See the full [changelog](https://wiki.arx-libertatis.org/Changelog) for changes in other versions.
