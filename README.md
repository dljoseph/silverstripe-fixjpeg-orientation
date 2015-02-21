# SilverStripe Fix JPEG Orientation Module
Automatically rotate JPEG image on upload, according to Exif Orientation data for consistent, upright viewing on a web page.


Maintainer Contacts
-------------------
*  Darren-Lee Joseph `<darrenleejoseph (at) gmail (dot) com>`


Requirements
------------
* SilverStripe 3.1


Installation Instructions
-------------------------

Installation can be done either by composer or by manually downloading a release.

### Via composer (best practice)

`composer require "thisisbd/silverstripe-fixjpeg-orientation:*"`

### Manually

 1.  Download the module from [the releases page](https://github.com/thisisbd/silverstripe-fixjpeg-orientation/releases).
 2.  Extract the file (if you are on windows try 7-zip for extracting tar.gz files
 3.  Make sure the folder after being extracted is named 'fixjpeg-orientation'
 4.  Place this directory in your sites root directory. This is the one with framework and cms in it.
 5.  Visit `<yoursite.com>/?flush` to clear the manifest cache.


Usage Overview
--------------
This module will read the Exif Orientation data of uploaded JPEG images uploaded via the UploadField and automatically rotate them and re-save them for upright display on a web
page.

![Exif Orientation Flag Values](http://www.impulseadventure.com/photo/images/orient_flag2.gif)


Known Issues
------------
There are no known issues.