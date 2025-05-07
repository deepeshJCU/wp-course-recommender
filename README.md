# Course Recommender Plugin for WordPress

[![WordPress Tested Up To](https://img.shields.io/badge/WordPress-6.5+-blue.svg)](https://wordpress.org)
[![PHP](https://img.shields.io/badge/PHP-7.4+-777bb4.svg)](https://www.php.net/)
[![License: GPL v2 or later](https://img.shields.io/badge/License-GPLv2-blue.svg)](https://www.gnu.org/licenses/gpl-2.0.html)
[![Build Status](https://github.com/deepeshJCU/wp-course-recommender/actions/workflows/plugin-ci.yml/badge.svg)](https://github.com/deepeshJCU/wp-course-recommender/actions)
![CI Status](https://github.com/deepeshJCU/wp-course-recommender/actions/workflows/plugin-ci.yml/badge.svg)


**Course Recommender** is a smart, rule-based WordPress plugin that recommends programming courses based on user-selected interests. A perfect fit for educators, coding bootcamps, or content platforms looking to personalize their course offerings.

---

## ✨ Features

- 📋 Shortcode form `[course_recommender_form]`
- 💡 Rule-based course suggestions (e.g., Python, Java, JS)
- ⚙️ Modular plugin structure for easy extension
- 🎨 Customizable templates for form and results
- 🧑‍💻 Admin UI stub for future configurations

---

## 🗂 Folder Structure

```

wp-course-recommender/
├── .github/
│   └── workflows/
│       └── plugin-ci.yml
├── admin/
│   ├── admin-menu.php
│   ├── admin-styles.css
│   └── admin-ui.php
├── assets/
│   └── style.css
├── includes/
│   ├── course-data.php
│   ├── course-recommender-functions.php
│   └── recommendation-logic.php
├── shortcodes/
│   └── course-recommender-shortcode.php
├── templates/
│   ├── course-recommendation-display.php
│   ├── form-template.php
├── course-recommender.php
├── readme.txt
└── README.md


````

---

## 🚀 Getting Started

### 🔧 Installation

1. Clone or download this plugin into `/wp-content/plugins/`:
   ```bash
   git clone https://github.com/deepeshJCU/wp-course-recommender.git
````

2. Go to your WordPress dashboard and activate **Course Recommender** under Plugins.

### 📌 Usage

Embed the following shortcode in a post or page:

```wordpress
[course_recommender_form]
```

Users will receive course suggestions based on their selected areas of interest.

---

## 🧠 Logic Overview

The plugin uses a simple rule-matching system defined in:

* `includes/course-recommender-data.php` (the rule set)
* `includes/course-recommender-functions.php` (matching logic)

---

## ⚙️ GitHub Actions CI

This plugin includes a basic GitHub Actions workflow (`.github/workflows/plugin-ci.yml`) to:

* ✅ Lint PHP files
* ✅ Run `phpcs` against WordPress coding standards
* ✅ Validate plugin header format

You can expand this to run tests or deployments.

---

## ✅ Compatibility

* **WordPress:** 6.0+
* **PHP:** 7.4+

---

## 🎯 Roadmap

* 📝 Save user responses to the database
* 🔍 Add course images and descriptions
* 🧑‍🎓 Link to course detail pages
* ⚙️ More admin customization options
* 🔌 REST API support

---

## 🤝 Contributing

Pull requests and suggestions are welcome! Open an issue to discuss any improvements.

---

## 📄 License

Licensed under the [GNU GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html).

---

## 🙌 Credits

Built by Deepesh Bijarnia (https://github.com/deepeshJCU/wp-course-recommender.git) with ❤️ for the learning community.


