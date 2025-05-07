<?php if (!empty($recommended)) : ?>
    <h2>Recommended Courses</h2>
    <ul>
        <?php foreach ($recommended as $course) : ?>
            <li><?php echo esc_html($course['title']); ?></li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>No matching courses found. Try different keywords.</p>
<?php endif; ?>

<a href="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" class="button">Try Again</a>

