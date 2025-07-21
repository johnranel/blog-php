# Blog‑PHP

Life Musings of Jane – a personal blog site built with **PHP**, **HTML**, **CSS**, **JavaScript**, and **MySQL**, following an MVC-like structure.

---

## Features

- User registration & login
- Admin dashboard to manage posts (Travel, OOTD, Blog, Contact, etc.)
- Categories for posts (e.g. Travel, Ootd)
- Responsive UI using CSS/JavaScript
- Database-driven content with PHP/MySQL
- Modular organization via controllers, models, helpers, includes

---

## Project Structure

|── admin/ # Admin panel pages\
|── assets/ # CSS, JS, images\
|── controllers/ # Handling HTTP requests\
|── helpers/ # Utility functions\
|── includes/ # Shared components (header, footer)\
|── migration/ # DB migration scripts\
|── models/ # DB interaction (Post, User, etc.)\
|── *.php # Public-facing pages:\
| ├── index.php # Homepage\
| ├── blog.php # Blog listing\
| ├── blog-post.php # Single blog post\
| ├── travel.php # Travel category listing\
| ├── travel-post.php # Single travel post\
| ├── ootd.php # Outfit-of-the-day category\
| ├── about.php # About page\
| ├── contact.php # Contact form\
| ├── login.php # User login\
| ├── register.php # User registration\
| └── my_profile.php # Profile editing\
── README.md # This file

---

## Requirements

- PHP 7.4+ (or PHP 8+)
- MySQL (or MariaDB)
- Web server (Apache / Nginx)

---

## 🛠️ Setup and Installation

1. **Clone the repo**

        ```bash
        git clone https://github.com/johnranel/blog-php.git
        cd blog-php```

2. **Database Setup**

    Create a new database (e.g., blog_db)

    Run SQL migration in ```migration/database.php``` to create tables (e.g. users, posts, categories)

    Configure Database

    Edit DB credentials in ```includes/db_config.php```.

3. **Ready to go**
    If vanilla PHP, you're ready to go

    Access in browser: http://localhost/blog-php/

    Register/log in, create posts, and explore

## MVC Flow
Public pages call respective controllers

Controllers fetch data from models (e.g., Post, User)

Models execute DB queries

Includes/views render HTML with data

Helpers manage reusable logic (e.g. auth, sanitization)