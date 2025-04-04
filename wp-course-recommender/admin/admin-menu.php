<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

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

function course_recommender_validate_mappings($input) {
    $decoded = json_decode($input, true);
    if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
        add_settings_error('course_recommender_mappings', 'invalid_json', 'Invalid JSON format. Please check your input.');
        return get_option('course_recommender_mappings');
    }
    return json_encode($decoded, JSON_PRETTY_PRINT);
}

function course_recommender_mappings_callback() {
    $mappings = get_option('course_recommender_mappings', array());
    ?>
    <textarea name="course_recommender_mappings" rows="10" cols="60"><?php echo esc_textarea(json_encode($mappings, JSON_PRETTY_PRINT)); ?></textarea>
    <p>Enter interest-to-course mappings in JSON format. Example:<br>
    <code>{ "data science": ["Machine Learning", "Big Data Analytics"], "design": ["UI/UX Design", "Graphic Design"] }</code></p>
    <?php
}
