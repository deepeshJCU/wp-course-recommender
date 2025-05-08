<?php
function cr_course_recommender_form() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cr_interests'])) {
        $interests = array_map('sanitize_text_field', $_POST['cr_interests']);
        $recommended = cr_get_programming_courses_by_interest($interests);
        ob_start();
        include plugin_dir_path(__FILE__) . '../templates/course-recommendation-display.php';
        return ob_get_clean();
    }

    $available_interests = ['python', 'java', 'javascript', 'frontend', 'backend', 'web', 'data analysis', 'beginner', 'advanced'];
    ob_start(); ?>
    <form method="POST">
        <p>Select your interests:</p>
        <?php foreach ($available_interests as $interest): ?>
            <label>
                <input type="checkbox" name="cr_interests[]" value="<?php echo esc_attr($interest); ?>">
                <?php echo esc_html(ucfirst($interest)); ?>
            </label><br>
        <?php endforeach; ?>
        <button type="submit">Recommend Courses</button>
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode('course_recommender_form', 'course_recommender_form_shortcode');
