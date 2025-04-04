<?php
/*
Plugin Name: Course Recommender
Plugin URI: https://github.com/deepeshJCU/wp-course-recommender.git
Description: A simple rule-based course recommendation plugin for students.
Version: 1.0
Author: Deepesh
Author URI: https://github.com/deepeshJCU
License: GPL2
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include necessary files
//include_once plugin_dir_path(__FILE__) . 'admin/admin-menu.php';
//include_once plugin_dir_path(__FILE__) . 'includes/recommendation-logic.php';
// add_action('admin_menu', 'course_recommender_admin_menu');
// add_action('admin_init', 'course_recommender_register_settings');


// Admin menu for easier input management
function course_recommender_admin_menu()
{
    add_menu_page(
        'Course Recommender',
        'Course Recommender',
        'manage_options',
        'course-recommender',
        'course_recommender_admin_page',
        'dashicons-welcome-learn-more',
        6
    );
}
add_action('admin_menu', 'course_recommender_admin_menu');

function course_recommender_admin_page()
{
?>
    <div class="wrap">
        <h1>Course Recommender Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('course_recommender_settings_group');
            do_settings_sections('course-recommender');
            submit_button();
            ?>
        </form>
    </div>
<?php
}

function course_recommender_register_settings()
{
    register_setting('course_recommender_settings_group', 'course_recommender_mappings', 'course_recommender_validate_mappings');
    add_settings_section('course_recommender_main_section', 'Course Mappings', null, 'course-recommender');
    add_settings_field(
        'course_mappings',
        'Interest to Course Mapping',
        'course_recommender_mappings_callback',
        'course-recommender',
        'course_recommender_main_section'
    );
}
add_action('admin_init', 'course_recommender_register_settings');

function course_recommender_validate_mappings($input)
{
    $decoded = json_decode($input, true);
    if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
        add_settings_error('course_recommender_mappings', 'invalid_json', 'Invalid JSON format. Please check your input.');
        return get_option('course_recommender_mappings');
    }
    return json_encode($decoded, JSON_PRETTY_PRINT);
}

function course_recommender_mappings_callback()
{
    $mappings = get_option('course_recommender_mappings', array());
?>
    <textarea name="course_recommender_mappings" rows="5" cols="50"><?php echo esc_textarea(json_encode($mappings, JSON_PRETTY_PRINT)); ?></textarea>
    <p>Enter interest-to-course mappings in JSON format.</p>
<?php
}


// Json for course recommendation
function course_recommender_get_recommendations($interest)
{
    $mappings = array(
        'ai' => [
            'Intro to AI',
            'Machine Learning 101',
            'Neural Networks',
            'Deep Learning with TensorFlow',
            'AI Ethics and Society',
            'Natural Language Processing'
        ],
        'design' => [
            'UX Design Basics',
            'Graphic Design Essentials',
            'Adobe Photoshop Masterclass',
            'Figma for UI Design',
            'Design Thinking'
        ],
        'web' => [
            'Web Development Basics',
            'HTML & CSS',
            'JavaScript Fundamentals',
            'React for Beginners',
            'Full Stack Web Development',
            'WordPress Theme Development'
        ],
        'frontend' => [
            'HTML & CSS',
            'JavaScript Fundamentals',
            'Responsive Web Design',
            'React for Beginners',
            'Vue.js Essentials',
            'Frontend Performance Optimization'
        ],
        'backend' => [
            'Node.js for Beginners',
            'PHP with MySQL',
            'Python Django Development',
            'Java Spring Boot Essentials',
            'API Development and Testing',
            'Databases & SQL'
        ],
        'react' => [
            'React for Beginners',
            'Advanced React Patterns',
            'React Hooks Deep Dive',
            'React + Redux',
            'Building SPAs with React',
            'React Native Basics'
        ],
        'python' => [
            'Python Programming for Beginners',
            'Data Analysis with Python',
            'Python for Web Development (Django/Flask)',
            'Automation with Python',
            'Python for AI and ML'
        ],
        'java' => [
            'Java Programming Basics',
            'Object-Oriented Programming in Java',
            'Java for Web Development (Spring)',
            'JavaFX for Desktop Apps',
            'Java Algorithms & Data Structures'
        ],
        'c++' => [
            'C++ Fundamentals',
            'OOP in C++',
            'Advanced C++ Programming',
            'Data Structures with C++',
            'Game Development with C++'
        ],
        'c#' => [
            'C# Basics',
            'Building Desktop Apps with C#',
            '.NET Core for Beginners',
            'Unity Game Development with C#',
            'C# for Web (ASP.NET)'
        ],
        'php' => [
            'PHP for Beginners',
            'PHP with MySQL',
            'Building Web Apps with Laravel',
            'Secure PHP Coding',
            'WordPress Plugin Development'
        ],
        'r' => [
            'Introduction to R',
            'Data Analysis with R',
            'Statistical Modeling in R',
            'R for Data Science',
            'R Shiny for Dashboards'
        ],
        'data' => [
            'Data Science 101',
            'Statistics for Beginners',
            'Big Data Tools',
            'Python for Data Analysis',
            'SQL for Data Exploration',
            'Data Visualization with Tableau'
        ],
        'security' => [
            'Cybersecurity Basics',
            'Ethical Hacking',
            'Network Security',
            'Digital Forensics',
            'Security+ Certification Prep',
            'Web Application Security'
        ],
        'cloud' => [
            'AWS Cloud Practitioner',
            'Introduction to Google Cloud',
            'Azure Fundamentals',
            'Cloud DevOps Engineer',
            'Serverless Computing'
        ],
        'mobile' => [
            'Android App Development',
            'iOS App Development with Swift',
            'Flutter for Beginners',
            'React Native Crash Course',
            'Mobile UI/UX Design'
        ],
        'marketing' => [
            'Digital Marketing Strategy',
            'SEO Fundamentals',
            'Social Media Marketing',
            'Google Ads Certification',
            'Email Marketing with Mailchimp'
        ],
        'business' => [
            'Entrepreneurship 101',
            'Project Management Essentials',
            'Agile and Scrum Fundamentals',
            'Finance for Non-Financial Managers',
            'Business Analytics'
        ]
    );

    $interest_key = strtolower(trim($interest));
    return isset($mappings[$interest_key]) ? $mappings[$interest_key] : array();
}



// Shortcode for displaying the course recommendation form
function course_recommender_form()
{
    ob_start();
?>
    <style>
        .course-recommender-form {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            max-width: 400px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .course-recommender-form label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .course-recommender-form input[type="text"],
        .course-recommender-form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .course-recommender-form input[type="submit"] {
            background: #0073aa;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .course-recommender-form input[type="submit"]:hover {
            background: #005177;
        }

        .course-recommender-results {
            text-align: center;
        }

        .course-recommender-results ul {
            list-style: none;
            padding: 0;
        }

        .course-recommender-results li {
            margin: 5px 0;
        }
    </style>
    <form method="post" class="course-recommender-form">
        <label for="student_interest">Enter Your Interest:</label>
        <input type="text" placeholder="Design, Frontend, Python..." name="student_interest" id="student_interest" required pattern="[A-Za-z0-9 ]{2,50}" title="Please enter a valid interest (2-50 alphanumeric characters)." />
        <input type="submit" name="get_recommendation" value="Get Recommendations" />
    </form>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['get_recommendation'])) {
        $interest = sanitize_text_field($_POST['student_interest']);
        if (preg_match('/^[A-Za-z0-9 ]{2,50}$/', $interest)) {
            $recommendations = course_recommender_get_recommendations($interest);
            if (!empty($recommendations)) {
                echo '<div class="course-recommender-results">';
                echo '<h3>Recommended Courses:</h3>';
                echo '<ul>';
                foreach ($recommendations as $course) {
                    echo '<li>' . esc_html($course) . '</li>';
                }
                echo '</ul>';
                echo '</div>';
            } else {
                echo '<p>No matching courses found.</p>';
            }
        } else {
            echo '<p>Invalid input. Please enter a valid interest.</p>';
        }
    }
    return ob_get_clean();
}
add_shortcode('course_recommender', 'course_recommender_form');
