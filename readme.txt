=== Gem ===
Contributors: webulous
Tags: custom-menu, featured-images, post-formats, right-sidebar, left-sidebar, sticky-post, threaded-comments, translation-ready, three-columns, two-columns, one-column, flexible-header, custom-background, custom-header, custom-colors, editor-style, full-width-template, rtl-language-support, theme-options, translation-ready
Requires at least: 4.0
Tested up to: 4.5.2
Stable tag: 1.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Gem is best suited for all types of site and uses Theme Customizer.

== Description ==
Gem comes with modern, stylish and responsive design. It comes with 8 Page templates, so you can choose layout of site to your liking. It also has 7 Widget areas to display your widget wherever you like to. Nearly 100 customizer theme options lets you customize every aspect of your web page. It uses minimal 960 grid framework and SASS to keep stylesheet efficient and speeds up page loading time. It is best suited for any type of sites including Corporate/Business/Blog sites. Demo can be viewed here http://gem.webulous.in/ and support request can be made here http://www.webulousthemes.com/free-support-request/

== Frequently Asked Questions ==
= Installation =
1. Download and unzip `gem` theme
2. Upload the `gem` folder to the `/wp-content/themes/` directory
3. Activate the Theme through the 'Themes' menu in WordPress

= Setting Up Front Page =
1. By default, your front page looks like a blog. However, you can make it look like screenshot by following these steps.
2. Go to Dashboard => Appearance => Customize
3. Click on 'Static Front Page'
4. Select 'A static page' radio option
4. Select a static page for 'Front Page' and another page for 'Posts Page'
5. Click on 'Gem Options' panel
6. Select 'Home' Section
7. Select a category for 'Slider Posts Category'.
8. Enter no. of slides to show from above selected category.
9. Select 3 Pages for 'Services' sections
10. Select no. of recent posts to show on home page.

= How to change `Our Services` heading =
Make a Child Theme
Add following in `functions.php` file
`function childname_change_service_title($title) {
 	$title = __('Your Own Title','childname');
 	return $title;
 }
 add_filter('gem_service_title','childname_change_service_title');`

= How to control featured images visibility =

Go to Dashboard => Appearance => Customize.
Select 'Gem Options' Panel
Select 'Blog' section
Enable/Disable featured images visibility.

== Changelog ==
= 1.0.3 =
* Preview issue fixed

= 1.0.2 =
* Change to kirki customizer
* Added More Options

= 1.0.1 =
* WooCommerce support added
* Review issues fixed

= 1.0.0 =
* Review issues fixed

= 0.0.9 =
* Review issues fixed

= 0.0.8 =
* Initial Release

== Upgrade Notice ==

= 1.0.3 =
* Preview issue fixed

== Resources ==
* {_s}, GPLv2
* {Skeleton}, MIT
* {Flexslider} © 2015 Woo Themes, GPLv2
* {FontAwesome} © Dave Gandy, SIL OFL 1.1 and MIT 
* screenshot.png © 2016 GratisoGraphy, CC0
http://gratisography.com/pictures/238_1.jpg