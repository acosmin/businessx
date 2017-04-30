# Businessx WordPress Theme #
Businessx is distributed under the terms of the GNU GPL v3.0.

### Changelog ###

**v1.0.5.6**
* Fixed buttons not displaying any icon if the link was non-social type - Team section;
* Fixed mobile buttons clickable area, made it larger;
* Added a `Leave a rating` button in the customizer and change the `Documentation` button's position;
* Changed theme description;

**v1.0.5.5**
* Fixed Scroll to section, doesn't work in some browsers;
* Fixed Actions menu not working on all mobile displays. It was moved into a separate mobile menu with a button. To change the button icon, use the `businessx_mobile_actions_menu_button___output` filter;
* Fixed Scroll To Section if the current page doesn't have a section to scroll to. On click it will redirect to your homepage;
* Fixed Primary menu issues on Safari. `.main-header-inner-wrap` uses `display: flex` now, solving the issue;
* Added `archive-jetpack-portfolio.php` for support with Jetpack Portfolios. You can now use the `/portfolio/` permalink witout using the custom page template;
* Added two full width page templates, one with page title displaying and one without (this one has the colored/fixed menu enabled and can only be changed with the use of filters);
* Added styles for the Polylang language switcher (dropdown enabled), only works with the Primary location;
* Added option for sticky logo. The logo will remain visible on scroll;

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
