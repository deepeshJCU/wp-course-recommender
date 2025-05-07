<?php
function cr_get_programming_courses_by_interest($interests) {
    include plugin_dir_path(__FILE__) . 'course-data.php';
    $matches = [];

    $normalized = array_map(function($i) {
        return strtolower(trim($i));
    }, $interests);

    foreach ($course_data as $course) {
        foreach ($normalized as $interest) {
            if (in_array($interest, $course['tags'])) {
                $matches[] = $course;
                break;
            }
        }
    }

    return $matches;
}
