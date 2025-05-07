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
            settings_fields('cr_settings_group');
            do_settings_sections('cr-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}