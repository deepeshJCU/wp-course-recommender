<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function course_recommender_get_recommendations($interest) {
    $mappings_raw = get_option('course_recommender_mappings', '{}');
    $mappings = json_decode($mappings_raw, true);

    if (!is_array($mappings)) {
        return array();
    }

    $interest_lower = strtolower(trim($interest));
    foreach ($mappings as $key => $courses) {
        if (strtolower($key) === $interest_lower) {
            return $courses;
        }
    }

    return array(); // No match found
}
