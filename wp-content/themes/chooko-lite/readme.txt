# Chooko Lite

**Contributors:** iceable
**Requires at least:** WordPress 4.7
**Tested up to:** WordPress 4.9
**Stable tag:** 1.2.15
**Version:** 1.2.15
**License:** GPLv2 or later
**License URI:** http://www.gnu.org/licenses/gpl-2.0.html
**Tags:** one-column, two-columns, right-sidebar, custom-background, custom-header, custom-menu, footer-widgets, editor-style, featured-images, full-width-template, sticky-post, theme-options, threaded-comments, translation-ready, blog, food-and-drink, photography

A sweet, colorful and responsive WordPress Theme by Iceable Themes.


## Description

Chooko Lite is a sweet, colorful and responsive theme for WordPress. Perfect for personal, fashion, beauty or cooking oriented blogs and creative websites.

It features two widgetizable areas in the sidebar and the optional footer, two custom menu locations in the navbar and footer, tagline display, custom logo and favicon, custom header image and custom background.

Chooko Lite is the lite version of Chooko Pro, which comes with many additional features and access to premium class pro support forum and can be found at https://www.iceablethemes.com/shop/chooko-pro/

### Getting started with Chooko Lite

* Once you activate the theme from your WordPress admin panel, you can visit the customizer (Appearance > Customize) to set your own logo, header image, background, menus etc.
* If you will be using a custom header image, you will find options to enable or disable it on your homepage, blog index pages, single post pages and individual pages.
* It is highly recommended to set a menu yourself, instead of relying on the default menu. Doing so will automatically activate the dropdown version of your menu in responsive mode.
* You can also set a custom menu at the bottom right of your site. Note this footer menu doesn't support sub-menus, only top-level menu items will be displayed.
* Footer widgets: The widgetizable footer is disabled by default. To activate it, simply go to Appearance > Widgets and drop some widgets in the "Footer" area, just like you would do for the sidebar. It is recommended to use 4 widgets in the footer, or no widgets at all to disable it.
* Additional documentation and free support forums can be found at https://www.iceablethemes.com under "support".

### Translation

Bundled translations (GPL Licensed):
* French (fr_FR) translation: Copyright 2013-2017, Iceable Themes (https://www.iceablethemes.com)

Translating this theme into your own language is quick and easy, you will find a .POT file in the /languages folder to get you started. It contains about 80 strings only.
If you don't have a .po file editor yet, you can download Poedit from https://www.poedit.net/download.php - Poedit is free and available for Windows, Mac OS and Linux.

If you have translated this theme into your own language and are willing to share your translation with the community, please feel free to do so on the forums at https://www.iceablethemes.com
Your translation files will be added to the next update. Don't forget to leave your name, email address and/or website link so credits can be given to you!

## Copyright

Chooko Lite WordPress Theme, Copyright 2013-2017 Iceable Themes (https://www.iceablethemes.com)
Chooko Lite is distributed under the terms of the GNU GPL

Chooko Lite bundles the following third-party resources:

superfish, Copyright 2013 Joel Birch.
**License:** MIT and GPL
Source: http://users.tpg.com.au/j_birch/plugins/superfish/

HTML5 Shiv v3.6, Copyright @afarkas @jdalton @jon_neal @rem
**License:** MIT/GPL2
Source: https://github.com/aFarkas/html5shiv


## Changelog

### 1.2.15
November 18th, 2017
* Updated Readme.txt file to the new format for WordPress.org
* Updated Tags list
* Tested with WordPress 4.9
* Removed support for WordPress lesser than 4.7

### 1.2.14
October 10th, 2017
* Refactored all PHP code to conform to the WordPress coding standards

### 1.2.13
August 25th, 2017
* Enhanced: Wrapped pingback url in appropriate conditionals in header.php
* Enhanced: HTML5Shiv is now properly enqueued
* Enhanced: Prefixed constants names and Google font enqueuing handle
* Enhanced: Using the_archive_title() for archive page titles
* Enhanced: Ordered placeholders for printf() in footer.php
* Enhanced: Removed additional support for child themes for WP<4.7 (was relying on file_exists() which emits a PHP E_WARNING upon failure)
* Fixed: Singular placeholder in gettext function in comments.php

### 1.2.12
June 21th, 2017
* Removed function_exists('wp_site_icon') checks and related functions (deprecated since WP 4.3)

### 1.2.11
May 8th, 2017
* Added theme constants
* Load CSS and JS file with theme version to prevent potential issue after updates

### 1.2.10
March 8th, 2017
* Fixed chooko_remove_rel_cat() to only remove "category" (but not "tag") value from the rel attribute
* Added php tags in footer.php, making it less confusing for users who want to modify the footer note

### 1.2.9
January 9th, 2017
* Updated copyright to 2017

### 1.2.8
December 12th, 2016
* Now using get_theme_file_uri() to register stylesheets and javascripts for WordPress 4.7
* Tested with WordPress 4.7

### 1.2.7
November 14th, 2016
* Updated searchforms to HTML5 markup

### 1.2.6
August 29th, 2016
* Fixed typo that slipped through the last update

### 1.2.5
August 29th, 2016
* Removed function chooko_render_title() used as a fallback for title tag support
* Dropped support for WordPress lesser than 4.1
* Tested with WordPress 4.6

### 1.2.4
June 16th, 2016
* Tested with WordPress 4.5.2
* Updated external links to wordpress.org and iceablethemes.com to https
* Removed php closing tags from end of files to prevent potential issues
* Updated theme tags for WordPress.org

### 1.2.3
January 13th, 2016
* Enhanced support for <!--more--> quicktag
* Updated copyright to 2016
* Tested with WordPress 4.4.1

### 1.2.2
November 23rd, 2015
* Fixed issue with sidebar in WordPress 4.4
* Tested with WordPress 4.4 (beta 4)

### 1.2.1
November 4th, 2015
* Disabled the "favicon" theme setting for WordPress 4.3+ (no longer useful since WP 4.3+ includes wp_site_icon)
* Added screen-reader-text CSS support
* Changed textdomain to theme slug: 'chooko-lite'
* Tested with WordPress 4.3

### 1.2.0
July 22th, 2015
* Replaced theme options panel with Customizer implementation
* Added "title-tag" support
* Added editor-style
* Updated fr_FR translation file

### 1.1.10
May 26th, 2015
* Tested with WP 4.2.2
* Enhanced menu items: the whole item area is now clickable, not just the text
* Added option to display tagline
* Added option to chose between "excerpt" or "full content" for the blog index page
* Added option to switch off responsiveness
* Made all strings translatable, including the backend
* Updated POT file
* Added french (fr_FR) translation
* Added admin notice when menu is not set (on theme option page only)
* Various PHP/HTML optimizations
* Removed obsolete code from comments.php
* Added extra user permission check in icefit-options
* Enhanced validation and sanitation in icefit-options
* Renamed and moved /page-full-width.php to /page-templates/full-width.php
* Prefixed hook (chooko-style) to enqueue style.css
* Now using core version of hoverintent
* Merged all front-end css in silverclean.dev.css and minified in silverclean.min.css
* Merged all front-end javascripts in silverclean.dev.js and minified in silverclean.min.js
* Removed content filters
* Appropriately use the_title_attribute() to escape title attributes in index.php
* Update copyright dates
* Updated description
* Updated credits

### 1.1.9
September 24th, 2014
* Tested with WP 4.0
* Fixed hAtom structured data (Errors like Missing required field "entry-title" / "updated" / hCard "author" in Google Webmaster tools)
* Removed hentry class from pages (hentry is irrelevant for static content)
* Fixed glitch in blog index: if several posts were made on the same date, the date only displayed for the first one.
* Updated: display date according to the user-defined "date format" in Settings.

### 1.1.8
September 1st, 2014
* Added ellipsis (...) to the end of truncated excerpts when displaying the "read more" button (based on user feedback).
* Fixed W3C validator error caused by the "X-UA-Compatible" meta tag. The theme now fully validates as HTML5.
* Replaced (has_post_thumbnail()) with ('' != get_the_post_thumbnail()) in single.php (as per codex recommendation - fixes an occasional issue)
* Fixed an odd glitch with footer widgets columns
* Fixed CSS glitch in Firefox with large logo and featured images

### 1.1.7
June 16th, 2014
* Removed unused function chooko_get_settings()
* Removed unnecessary function that updated chooko_settings in the database upon activation. Now saving/updating only upon user action (when user clicks "save changes" in Theme options)
* Using sane defaults (No setting is saved in the database without explicit user action)

### 1.1.6
May 19th, 2014
* Moved $content_width definition into a callback function (hooked to after_setup_theme)
* Updated copyright (2013-2014)
* Tested with WP 3.9.1

### 1.1.5
March 31th, 2014
* Loading webfonts with latin + latin extended subset to improve support for some foreign languages
* Webfonts loading (SSL/Non-SSL): removed is_ssl() check and let browsers determine which protocol to use
* Added paginated pages support

### 1.1.4
February 4th, 2014
* Added "Support and Feedback" in theme options
* Tested with WordPress 3.8.1

### 1.1.3
January 2nd, 2013
* Updated tags for WordPress 3.8: fixed-layout and responsive-layout
* Updated screenshot to 880x660px for WordPress 3.8

### 1.1.2
November 18th, 2013
* Child theme and customization support: enqueuing style.css
* Child theme support: stylesheets in child's /css folder override parent's version if they exist
* Updated screenshot.png

### 1.1.1
November 15th, 2013
* Fixed: Appropriately hook css enqueuing to wp_enqueue_scripts
* Added: Option to use a text-based site title instead of logo (used as fallback when no logo is set)

### 1.1
November 11th, 2013
* Revision, enhancement and clean up of the whole code
* Removed the slider which was using CPT (considered plugin territory by the WPTRT)
* Replaced the slider with WP custom header implementation
* Replaced background setting in custom option framework with WP built-in custom background
* Ability to show/hide custom header on front page, blog index, single posts and individual pages
* Changed default logo to something generic (WPTRT compliance)
* Tested with WP 3.7.1

### 1.0.2
May 3rd, 2013
* Fixed: Changed license to GPLv2 for improved compatibility
* Fixed: Escaping user-entered data before printing
* Fixed: Appropriately prefixed all custom functions
* Fixed: Proper enqueuing of google webfonts
* Fixed: "Previous" and "Next" posts links were mixed up on single post view
* Removed: Unnecessary enqueuing of jQuery
* Removed: Unnecessary use of function_exist() conditional
* Removed: Unused images files from the option framework
* Updated: Author URI

### 1.0.1
April 19th, 2013
* Fixed: Icefit Improved Excerpt enhanced to preserve some styling tags without breaking the markup
* Added: Option to choose what content to display on blog index pages (Full content, WP default excerpt or Icefit improved excerpt)
* Added: /languages folder with default po and mo files and POT file for localization
* Changed: Updated Theme URI to Chooko Lite demo site

### 1.0
April 9th, 2013
* Initial release
