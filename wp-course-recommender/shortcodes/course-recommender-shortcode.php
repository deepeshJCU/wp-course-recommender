<?php
function cr_course_recommender_form() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cr_interests'])) {
        $interests = explode(',', sanitize_text_field($_POST['cr_interests']));
        $recommended = cr_get_programming_courses_by_interest($interests);
        ob_start();
        include plugin_dir_path(__FILE__) . '../templates/course-recommendation-display.php';
        return ob_get_clean();
    }
    ob_start(); ?>
    <form method="POST">
        <label for="cr_interests">Enter your interests (e.g., python, web):</label>
        <input type="text" id="cr_interests" name="cr_interests" placeholder="python, web" />
        <button type="submit">Recommend Courses</button>
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode('course_recommender', 'cr_course_recommender_form');