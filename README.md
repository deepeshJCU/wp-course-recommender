# Course Recommender Plugin for WordPress

[![WordPress Tested Up To](https://img.shields.io/badge/WordPress-6.5+-blue.svg)](https://wordpress.org)
[![PHP](https://img.shields.io/badge/PHP-7.4+-777bb4.svg)](https://www.php.net/)
[![License: GPL v2 or later](https://img.shields.io/badge/License-GPLv2-blue.svg)](https://www.gnu.org/licenses/gpl-2.0.html)
[![Build Status](https://github.com/deepeshJCU/wp-course-recommender/actions/workflows/plugin-ci.yml/badge.svg)](https://github.com/deepeshJCU/wp-course-recommender/actions)

**Course Recommender** is a smart, rule-based WordPress plugin that recommends programming courses based on user-selected interests. A perfect fit for educators, coding bootcamps, or content platforms looking to personalize their course offerings.



# ✨ Features

- 📋 Shortcode form `[course_recommender_form]`
- 💡 Rule-based course suggestions (e.g., Python, Java, JavaScript)
- ⚙️ Modular plugin structure for easy extension
- 🎨 Customizable templates for form and results
- 🧑‍💻 Admin UI stub for future configurations



# 🗂 Folder Structure



wp-course-recommender/
├── .github/
│   └── workflows/
│       └── plugin-ci.yml
├── admin/
│   ├── admin-menu.php
│   ├── admin-styles.css
│   └── admin-ui.php
├── assets/
│   ├── style.css
│   ├── recommended_courses.png
│   ├── results.png
│   └── admin_uploads.png
├── includes/
│   ├── course-recommender-functions.php
├── shortcodes/
│   └── course-recommender-shortcode.php
├── templates/
│   ├── course-recommendation-display.php
│   └── form-template.php
├── course-recommender.php
├── readme.txt
└── README.md




# 🖼️ Screenshots

# 1. Frontend form to select user interests
![Frontend Form](assets/recommended_courses.png)

# 2. Course recommendation results page
![Course Recommendations](assets/results.png)

# 3. Admin settings page with editable course table
![Admin Settings](assets/admin_uploads.png)



# 🚀 Getting Started

# 🔧 Installation

1. Clone or download this plugin into your WordPress `/wp-content/plugins/` directory:

   ```bash
   git clone https://github.com/deepeshJCU/wp-course-recommender.git
````

2. Activate **Course Recommender** in the WordPress dashboard under **Plugins**.

# 📌 Usage

Add the shortcode to any post or page:

```wordpress
[course_recommender_form]
```

Users will be shown a simple form, and based on their selections, the plugin will recommend relevant programming courses.



# 🧠 Logic Overview

The plugin uses a straightforward rule-matching system:

* `includes/course-recommender-functions.php`: applies the logic and matches user input to courses



# ⚙️ GitHub Actions CI

This plugin includes a basic GitHub Actions workflow:

* ✅ Lint PHP files
* ✅ Run `phpcs` against WordPress Coding Standards
* ✅ Validate plugin headers

Config is in: `.github/workflows/plugin-ci.yml`



# ✅ Compatibility

* **WordPress:** 6.0+
* **PHP:** 7.4+



# 🎯 Roadmap

* 📝 Store user selections in the database
* 🔍 Add course thumbnails and descriptions
* 🧑‍🎓 Link recommended courses to detail pages
* ⚙️ Expand admin UI customization options
* 🔌 Expose functionality via REST API



# 🤝 Contributing

We welcome contributions! Fork the repo, open a pull request, or create an issue for discussion.



# 📄 License

Licensed under the [GNU GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html).



# 🙌 Credits

Built with ❤️ by [Deepesh Bijarnia](https://github.com/deepeshJCU) for the learning community.



