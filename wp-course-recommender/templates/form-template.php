<?php
if (!defined('ABSPATH')) exit;
?>

<form method="post" class="course-recommender-form">
    <label for="student_interest">Enter Your Interest:</label>
    <input type="text" name="student_interest" id="student_interest" required pattern="[A-Za-z0-9 ]{2,50}" title="Please enter a valid interest (2-50 alphanumeric characters)." />
    <input type="submit" name="get_recommendation" value="Get Recommendations" />
</form>

