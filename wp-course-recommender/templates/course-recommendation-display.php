<?php if (!empty($recommended)) : ?>
    <h2>Recommended Courses</h2>
    <ul>
        <?php foreach ($recommended as $course) : ?>
            <li style="margin-bottom: 20px;">
                <h3><?php echo esc_html($course['title']); ?></h3>
                <p><?php echo esc_html($course['description']); ?></p>
                <p><strong>Tags:</strong> <?php echo esc_html(implode(', ', $course['tags'])); ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>No matching courses found. Try different keywords.</p>
<?php endif; ?>

<a href="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" class="button">Try Again</a>
