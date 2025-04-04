<?php
/*
Plugin Name: Course Recommender
Plugin URI: https://github.com/deepeshJCU/wp-course-recommender.git
Description: A simple rule-based course recommendation plugin for students.
Version: 1.0
Author: Deepesh
Author URI: https://github.com/deepeshJCU
License: GPL2
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include necessary files
include_once plugin_dir_path(__FILE__) . 'admin/admin-menu.php';
include_once plugin_dir_path(__FILE__) . 'includes/recommendation-logic.php';

// Admin menu for easier input management
function course_recommender_admin_menu() {
    add_menu_page(
        'Course Recommender',
        'Course Recommender',
        'manage_options',
        'course-recommender',
        'course_recommender_admin_page',
        'dashicons-welcome-learn-more',
        6
    );
}
add_action('admin_menu', 'course_recommender_admin_menu');

function course_recommender_admin_page() {
    ?>
    <div class="wrap">
        <h1>Course Recommender Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('course_recommender_settings_group');
            do_settings_sections('course-recommender');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function course_recommender_register_settings() {
    register_setting('course_recommender_settings_group', 'course_recommender_mappings', 'course_recommender_validate_mappings');
    add_settings_section('course_recommender_main_section', 'Course Mappings', null, 'course-recommender');
    add_settings_field(
        'course_mappings',
        'Interest to Course Mapping',
        'course_recommender_mappings_callback',
        'course-recommender',
        'course_recommender_main_section'
    );
}
add_action('admin_init', 'course_recommender_register_settings');

// ✅ Improved JSON validation and handling
function course_recommender_validate_mappings($input) {
    $decoded = json_decode(stripslashes($input), true);
    if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
        add_settings_error('course_recommender_mappings', 'invalid_json', 'Invalid JSON format. Please check your input.');
        return get_option('course_recommender_mappings'); // Keep old value
    }
    return json_encode($decoded, JSON_PRETTY_PRINT);
}

function course_recommender_mappings_callback() {
    $mappings = get_option('course_recommender_mappings', '{}'); // Default to empty JSON
    $decoded_mappings = json_decode($mappings, true);

    if (!is_array($decoded_mappings)) {
        $decoded_mappings = [];
    }
    ?>
    <textarea name="course_recommender_mappings" rows="5" cols="50"><?php echo esc_textarea(json_encode($decoded_mappings, JSON_PRETTY_PRINT)); ?></textarea>
    <p>Enter interest-to-course mappings in JSON format.</p>
    <?php
}

// ✅ Shortcode for displaying the course recommendation form
function course_recommender_form() {
    ob_start();
    ?>
    <style>
        .course-recommender-form {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            max-width: 400px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .course-recommender-form label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .course-recommender-form input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .course-recommender-form input[type="submit"] {
            background: #0073aa;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .course-recommender-form input[type="submit"]:hover {
            background: #005177;
        }
    </style>

    <form method="post" class="course-recommender-form">
        <label for="student_interest">Enter Your Interest:</label>
        <input type="text" name="student_interest" id="student_interest" required pattern="[A-Za-z0-9 ]{2,50}" title="Please enter a valid interest (2-50 alphanumeric characters)." />
        <input type="submit" name="get_recommendation" value="Get Recommendations" />
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['get_recommendation'])) {
        $interest = sanitize_text_field(filter_input(INPUT_POST, 'student_interest', FILTER_SANITIZE_STRING));

        if ($interest && preg_match('/^[A-Za-z0-9 ]{2,50}$/', $interest)) {
            $recommendations = course_recommender_get_recommendations($interest);

            if (!empty($recommendations)) {
                echo '<h3>Recommended Courses:</h3><ul>';
                foreach ($recommendations as $course) {
                    echo '<li>' . esc_html($course) . '</li>';
                }
                echo '</ul>';
            } else {
                echo '<p>No matching courses found. Please try a different interest.</p>';
            }
        } else {
            echo '<p>Invalid input. Please enter a valid interest.</p>';
        }
    }
    return ob_get_clean();
}
add_shortcode('course_recommender', 'course_recommender_form');

// ✅ Improved function to fetch recommendations
function course_recommender_get_recommendations($interest) {
    $mappings_json = get_option('course_recommender_mappings', '{}');
    $mappings = json_decode($mappings_json, true);

    if (!is_array($mappings)) {
        return [];
    }

    return $mappings[$interest] ?? [];
}
?>
