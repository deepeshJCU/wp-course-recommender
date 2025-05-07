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
- Clean admin settings page for future customization
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

- `admin/`: Contains admin UI functionality.
- `includes/`: Contains core logic and helper functions.
- `shortcodes/`: Contains shortcode logic for the form and results.
- `templates/`: HTML template files for frontend rendering.
- `assets/css/`: Stylesheets for both frontend and admin.

== Screenshots ==

1. Frontend form to select user interests
2. Course recommendation results page
3. Admin settings page (stub for customization)

== Frequently Asked Questions ==

= Can I add more courses? =  
Yes! You can update the course list and logic in the `includes/course-recommender-data.php` file.

= Can I customize the form? =  
Yes, the form is fully editable via the `templates/form.php` file and follows clean HTML5 standards.

= Will this plugin store user data? =  
Not in the current version. Future updates may include user data logging with consent.

== Changelog ==

= 1.0 =
* Initial release with rule-based course recommendation form.
* Shortcode support.
* Admin page stub added.
* Course focus: Programming languages (Python, Java, JavaScript).

== Upgrade Notice ==

= 1.0 =
First public release.

== License ==

This plugin is licensed under the GPLv2 or later. See https://www.gnu.org/licenses/gpl-2.0.html
