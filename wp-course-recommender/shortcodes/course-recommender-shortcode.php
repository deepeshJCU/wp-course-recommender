<?php
function cr_course_recommender_form() {
    // Get and clean available interests from settings
    $interests_string = get_option('course_recommender_interests', '');
    $available_interests = array_filter(array_map('trim', explode(',', $interests_string)));

    $recommended_courses = [];

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['cr_interests'])) {
        $interests = array_map(function($i) {
            return strtolower(trim(sanitize_text_field($i)));
        }, $_POST['cr_interests']);

        $recommended_courses = cr_get_programming_courses_by_interest($interests);
    }

    ob_start();
    ?>
    <form method="POST">
        <fieldset>
            <legend>Select your interests:</legend>
            <?php foreach ($available_interests as $interest): ?>
                <?php $trimmed = trim($interest); ?>
                <label>
                    <input type="checkbox" name="cr_interests[]" value="<?php echo esc_attr($trimmed); ?>" />
                    <?php echo esc_html(ucwords($trimmed)); ?>
                </label><br>
            <?php endforeach; ?>
        </fieldset> <br>
        <button type="submit">Recommend Courses</button>
    </form>

    <?php if (!empty($recommended_courses)) : ?>
        <?php include plugin_dir_path(__FILE__) . '../templates/course-recommendation-display.php'; ?>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
        <p>No matching courses found. Try different interests.</p>
    <?php endif; ?>

    <?php
    return ob_get_clean();
}

add_shortcode('course_recommender_form', 'cr_course_recommender_form');