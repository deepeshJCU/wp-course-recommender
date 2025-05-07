<?php
function cr_add_admin_menu() {
    add_menu_page('Course Recommender Settings', 'Course Recommender', 'manage_options', 'cr-settings', 'cr_admin_settings_page');
}
add_action('admin_menu', 'cr_add_admin_menu');

function cr_admin_settings_page() {
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

add_action('admin_init', 'course_recommender_register_settings');

function course_recommender_register_settings() {
    register_setting('course_recommender_settings_group', 'course_recommender_interests');

    add_settings_section(
        'course_recommender_main_section',
        'General Settings',
        null,
        'course-recommender'
    );

    add_settings_field(
        'course_recommender_interests',
        'Default Interests (comma separated)',
        'course_recommender_interests_callback',
        'course-recommender',
        'course_recommender_main_section'
    );
}

function course_recommender_interests_callback() {
    $value = get_option('course_recommender_interests', '');
    echo '<input type="text" name="course_recommender_interests" value="' . esc_attr($value) . '" class="regular-text">';
}
