<?php
function cr_add_admin_menu() {
    add_menu_page('Course Recommender Settings', 'Course Recommender', 'manage_options', 'cr-settings', 'cr_admin_settings_page');
}
add_action('admin_menu', 'cr_add_admin_menu');

function cr_admin_settings_page() {
    $courses = get_option('cr_course_data', []);
    ?>
<div class="wrap">
    <h1>Course Recommender Settings</h1>
    <form method="post">
        <table class="widefat">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Tags (comma separated)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $index => $course): ?>
                <tr>
                    <td><input type="text" name="courses[<?php echo $index; ?>][title]"
                            value="<?php echo esc_attr($course['title']); ?>" /></td>
                    <td><input type="text" name="courses[<?php echo $index; ?>][description]"
                            value="<?php echo esc_attr($course['description']); ?>" /></td>
                    <td><input type="text" name="courses[<?php echo $index; ?>][tags]"
                            value="<?php echo esc_attr(implode(', ', $course['tags'])); ?>" /></td>
                    <td><input type="submit" name="delete_<?php echo $index; ?>" class="button" value="Delete" /></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td><input type="text" name="courses[new][title]" placeholder="New Title" /></td>
                    <td><input type="text" name="courses[new][description]" placeholder="New Description" /></td>
                    <td><input type="text" name="courses[new][tags]" placeholder="tag1, tag2" /></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <?php submit_button('Save Courses'); ?>
    </form>
</div>
<?php
}

add_action('admin_init', 'cr_handle_course_admin_form');

function cr_handle_course_admin_form() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && current_user_can('manage_options')) {
        // 🧩 1. Handle course delete
        $courses = get_option('cr_course_data', []);
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'delete_') === 0) {
                $index = str_replace('delete_', '', $key);
                unset($courses[$index]);
                update_option('cr_course_data', array_values($courses));
                return;
            }
        }

        // 🧩 2. Handle course save/update
        if (!empty($_POST['courses'])) {
            $new_courses = [];
            foreach ($_POST['courses'] as $course) {
                if (!empty($course['title']) && !empty($course['description']) && !empty($course['tags'])) {
                    $new_courses[] = [
                        'title' => sanitize_text_field($course['title']),
                        'description' => sanitize_text_field($course['description']),
                        'tags' => array_map('trim', explode(',', sanitize_text_field($course['tags'])))
                    ];
                }
            }
            update_option('cr_course_data', $new_courses);

            // ✅ Update available interests as comma-separated string
            $all_tags = [];
            foreach ($new_courses as $course) {
                foreach ($course['tags'] as $tag) {
                    $tag = strtolower(trim($tag));
                    if (!in_array($tag, $all_tags)) {
                        $all_tags[] = $tag;
                    }
                }
            }
            update_option('course_recommender_interests', implode(', ', $all_tags));
        }
    }
}