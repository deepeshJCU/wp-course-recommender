=== Course Recommender ===
Contributors: Deepesh Bijarnia  
Tags: course recommendation, programming languages, personalized learning, shortcode, admin ui  
Requires at least: 5.0  
Tested up to: 6.5  
Stable tag: 1.0  
License: GPLv2 or later  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  

A simple plugin to recommend programming language courses to users based on their selected interests.

== Description ==

**Course Recommender** helps WordPress site owners recommend programming language courses such as Python, Java, and JavaScript to users based on their input or preferences. It uses a rule-based logic system and is easy to integrate via a shortcode. This is ideal for e-learning platforms, course providers, or blogs that want to personalize the user learning experience.

**Features:**

- Easy-to-use shortcode: `[course_recommender_form]`
- Clean admin settings page with visual course management
- Modular folder structure for easy plugin development
- Built-in styling and form validation
- Focused on programming languages like Python, Java, and JavaScript

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/course-recommender` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Use the `[course_recommender_form]` shortcode in any post or page to display the form.

== Usage ==

Add the following shortcode to any post or page:

`[course_recommender_form]`

This will render a form for users to select their learning preferences. Upon submission, the plugin will suggest relevant programming courses.

== Folder Structure ==

- `admin/`: Contains admin UI functionality (`admin-ui.php`), settings logic (`admin-menu.php`), and admin styles.
- `assets/`: Contains frontend and admin stylesheets (`style.css`).
- `includes/`: Core logic like course functions (`course-recommender-functions.php`).
- `shortcodes/`: Contains the shortcode implementation (`course-recommender-shortcode.php`).
- `templates/`: HTML templates for frontend display (`form-template.php`, `course-recommendation-display.php`).
- `course-recommender.php`: Main plugin bootstrap file.

== Screenshots ==

1. Frontend form to select user interests  
2. Course recommendation results page  
3. Admin settings page with editable course table  

== Frequently Asked Questions ==

= Can I add more courses? =  
Yes! You can use the admin settings page to add, edit, or delete courses directly from the WordPress dashboard.

= Can I customize the form? =  
Yes, the form is editable via the `templates/form-template.php` file and uses clean HTML5.

= Will this plugin store user data? =  
Not in the current version. Future updates may include user data logging with consent.

== Changelog ==

= 1.0 =
* Initial release with rule-based course recommendation form.  
* Shortcode support.  
* Admin settings UI for managing courses.  
* Course focus: Programming languages (Python, Java, JavaScript).  

== Upgrade Notice ==

= 1.0 =
First public release.

== License ==

This plugin is licensed under the GPLv2 or later.  
See https://www.gnu.org/licenses/gpl-2.0.html
