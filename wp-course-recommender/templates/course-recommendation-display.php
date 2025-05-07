<?php if (!empty($recommended)): ?>
    <h3>Recommended Courses</h3>
    <ul>
        <?php foreach ($recommended as $course): ?>
            <li>
                <strong><?php echo esc_html($course['title']); ?></strong>:<br>
                <?php echo esc_html($course['description']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No matching courses found. Try different keywords.</p>
<?php endif; ?>