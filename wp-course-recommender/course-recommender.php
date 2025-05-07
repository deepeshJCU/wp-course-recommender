<?php
/*
Plugin Name: Course Recommender
Description: Recommends programming language courses based on user input.
Version: 1.0
*/

// Include essential files
include_once plugin_dir_path(__FILE__) . 'includes/course-recommender-functions.php';
include_once plugin_dir_path(__FILE__) . 'shortcodes/course-recommender-shortcode.php';

// Admin UI
if (is_admin()) {
    include_once plugin_dir_path(__FILE__) . 'admin/admin-ui.php';
}