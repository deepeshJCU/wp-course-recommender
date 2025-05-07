function course_recommender_form_shortcode() {
    ob_start();
    ?>
    <form method="post">
        <label for="interest">Enter your interest:</label>
        <input type="text" name="interest" id="interest" required>
        <input type="submit" value="Get Recommendation">
    </form>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['interest'])) {
        $interest = sanitize_text_field($_POST['interest']);
        $mapping = get_option('course_recommender_mappings', '{}');
        $mapping_array = json_decode($mapping, true);

        if (isset($mapping_array[$interest])) {
            echo "<p><strong>Recommended Course:</strong> " . esc_html($mapping_array[$interest]) . "</p>";
        } else {
            echo "<p>No course recommendation found for this interest.</p>";
        }
    }

    return ob_get_clean();
}
add_shortcode('course_recommender_form', 'course_recommender_form_shortcode');
