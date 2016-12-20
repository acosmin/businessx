# Businessx WordPress Theme #
Businessx is distributed under the terms of the GNU GPL v2.0.

### Changelog ###

**v1.0.5.4**
* Fixed Safari issues;
* Added an option to disable the shopping cart button;
* Escaped an attribute in partials/partial-template-functions.php:293;
* Fixed index heading - global refresh;
* Updated .po files;

**v1.0.5.3**
* Fixed a few issues for TRT review;

**v1.0.5.2**
* Added WooCommerce support;
* Changed screenshot;

**v1.0.5.1**
* Updated license to GPLv3;
* Updated screenshot.jpg;
* Remade the menu script;
* Fixed issues regarding WordPress v4.7;

**v1.0.5**
* Changed version from 1.0.4 to 1.0.5;
* Removed Theme Updater (everything related to this option);
* Made theme ready for review;
* Fixed & removed a lot of things, please check github commits;

**v1.0.4**
* Added filters for get_header() & get_footer();
* Added filter to remove theme credits;
* Added style for Businessx Extensions' notice if it's not activated;
* Added checks (function_exists) for all functions;
* Fixed bx_search_placeholder's escaping to esc_attr__;
* Changed description for "Logo Type";
* Removed home.php;
* Removed admin.css and added its contents to customizer.css;
* Removed businessx_section_parallax(), moved it to Businessx Extensions;
* Removed icons.php, moved its contents to Businessx Extensions;

**v1.0.3.3**
* Defined some constants in functions.php and updated some links;
* Added Upsell/Link section via Customizer API;
* Removed bleed from parallax;
* Moved hero/slider options to plugin;
* Fixed - changed width to max-width for .widget img;
* Fixed - show demo widgets message if current_user_can();
* Fixed - comments in recommend.php;
* Fixed - don't show burger button if no menu is added;
* Added support for header_text;
* Fixed the_title() markup arguments for some heading templates;
* Removed imagesLoaded;

**v1.0.3.2**
* Fix - Changed prefixes for post thumbnails from `bx` to `businessx`. Use Regenerate thumbnails to refresh them: https://wordpress.org/plugins/regenerate-thumbnails/;
* Fix - Unexpected error in `partials\headings\index-heading-no-sections.php`;
* Removed - Unnecessary tags in style.css;

**v1.0.3.1**
* Fix - `partials\partial-template-functions.php`, `businessx_footer_creds_copyright()` changed escaping and added translation functions;
* Fix - Removed translation escaping in `partials\partial-template-functions.php`, line 127;
* Fix - `partials\partial-template-helpers.php`, line 240, added escaping for `$pid`;
* Fix - `the_title()` arguments for before and after in `partials\headings\page-heading-full-width.php`;
* Fix - Unescape `get_search_query()` in `partials\headings\search-heading-full-width.php`, already escaped by Core;

**v1.0.3**
* Released on GitHub;
