=== User Post Gallery - UPG ===
Contributors: odude
Tags: image gallery, youtube gallery, user submit, community, user profile, content gallery, photo album, frontend post, buddypress, user post gallery, Ultimate Member
Donate link: http://www.odude.com
Requires at least: 3.8
Tested up to: 4.9.1
Stable tag: 1.42
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Visitors submitted image, content & Youtube Gallery.

== Description ==

= UPG - User Post Gallery =

User Post Gallery (UPG) is the easy way to allow visitors to post images, article & YouTube videos without registration from the frontend.

UPG adds a frontend form via shortcode that enables your visitors to submit posts and upload images. 

That's all there is to it! Your site now can accept user generated content. Everything is super easy to customize via Plugin Settings page.

The pages like submission form, gallery page are auto created as soon as plugin is activated. 

= Features =

* Responsive image/YouTube gallery for mobile & tablets.
* Registered & Visitors can upload images/article from the front end.
* Loggedin users can delete own uploaded post with ajax system.
* My Gallery page for loggedin users.
* Automatically display all submitted content on the frontend
* Content & images can also be posted from the backend with additional options.
* Administrator can show or hide particular categories/albums from the frontend.
* Options to set as approval of post/images before it is displayed at the frontend.
* Filter UPG post by particular users or category by using shortcode.
* Clean search engine friendly.
* External plugins shortcodes can be added near UPG post.
* Options for both lightbox and static page (Preview Page).
* Set number of images to be displayed per page.
* Multiple layout options available. You can create own layout from scratch using personal layout.
* Controls over custom fields to be displayed at backend & frontend.
* Options to include posts into archive pages
* Built-in widgets to list categories
* Multisite compatible
* Bulk Image Upload
* Integrated with Ultimate-Member profile plugin 


Basic installation video
[youtube https://www.youtube.com/watch?v=NjkUddltDZw]



= Support =

For further questions feel free to drop a line at <a href="mailto:navneet@odude.com">navneet@odude.com</a>.
or
Go to our site to read full updated documentations and features at <a href="http://odude.com/demo/faq/">UPG FAQ</a>. 

= Live Demo =

Used WP-UPG Plugin : <a href="http://odude.com/demo/photo/users-post-gallery/" target="_blank">Built for Photographers</a>

Used WP-UPG Plugin : <a href="http://odude.com/demo/faq/" target="_blank">FAQ System</a>


== Installation ==

= Automatic Installation =

* Go to your Plugins page inside your Wordpress installation and search `odude` by keyword. Then choose User Photo Gallery and click install. It will be installed in a few seconds.
* Activate the plugin from `Plugins` menu after installation

= Manual Installation =

* Download the latest version and extract the folder to the `/wp-content/plugins/` directory
* The plugin will appear as inactive in your Dashboard `Plugins` menu
* Activate the plugin through the Dashboard `Plugins` menu in WordPress



== Frequently Asked Questions ==
   
= 1. What type of images does WP-UPG support? =

UPG supports the following types of image files: JPG, JPEG, PNG, GIF, YouTube URL

= 2. How thumbnails are created? =

Thumbnails and previews are based on the main default settings of Wordpress media manager.

= 3. Create page to post/upload image =
Create a page and giveit the as you wish. Insert the shortcode [upg-post type=image] in the description area. Link this page at your menu.

= 4. Show images from specific album/category =

 Insert this shortcode in the textarea for a page and link that page to your menu.<br>
[upg-list perrow="3" perpage="30" orderby="date" page="off" layout="list" album="test" button="off"]
<br>
<b>test </b> is a album or category slug name.<br>Leave it blank to show all images. 

album="test"  specifies a particular album or category slug name. Leave this parameter out to show all images.
   

==  Screenshots ==

1. Responsive Image Gallery
2. Frontend Post Form for visitors
3. Admin Setting Options
4. Admin Side Image List
5. Lightbox Video
6. Gallery Flat Layout

== Upgrade Notice ==

Safe to update

== Changelog ==

=1.42=
* Code optimized and added basic layout

=1.41=
* Logged in users can delete own uploded post.

=1.40=
* Own submission form layout editor.

=1.39=
* Fixed some of the issues with lightbox

=1.36 =
* Integrated with Ultimate-Member plugin. New tab in UPG setting page.
* Fixed layout issues