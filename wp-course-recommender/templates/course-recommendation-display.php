<?php if (!empty($recommended_courses)): ?>
    <h2>Recommended Courses</h2>
    <ul>
        <?php foreach ($recommended_courses as $course): ?>
            <li>
                <h3><?php echo esc_html($course['title']); ?></h3>
                <p><?php echo esc_html($course['description']); ?></p>
                <p><strong>Tags:</strong> <?php echo esc_html(implode(', ', $course['tags'])); ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>