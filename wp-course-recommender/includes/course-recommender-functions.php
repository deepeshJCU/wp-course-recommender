<?php
function cr_get_programming_courses_by_interest($interests) {
    $course_data = get_option('cr_course_data', []);
    $matches = [];

    $normalized = array_map(function($i) {
        return strtolower(trim($i));
    }, $interests);

    foreach ($course_data as $course) {
        $tags = array_map('strtolower', array_map('trim', $course['tags']));

        foreach ($normalized as $interest) {
            if (in_array($interest, $tags)) {
                $matches[] = $course;
                break;
            }
        }
    }

    return $matches;
}