This repository contains the website for [Arx Libertatis](https://arx-libertatis.org/), a cross-platform port of Arx Fatalis.

Pages are locally compiled to static and can then be uploaded to the webserver.

Requirements to build the static pages:

* **PHP 5.4** or newer
* **CMake 2.8** or newer
* **jpegoptim**
* **optipng** and/or **pngcrush**

To build the website, run:

    $ mkdir build
    $ cd build
    $ cmake ..
    $ make

The final pages will be created in an `output` directory in the source tree. While currently `make` always re-builds *all* pages in the staging directory, only those that actually changed will be copied to the output directory in order to preserve modification timestamps.
