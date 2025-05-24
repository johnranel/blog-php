<?php
    class DatabaseSchema {
        private $db_connect;

        public function __construct($db_conn) {
            $this->db_connect = $db_conn;
        }

        public function createUsersTable() {
            $db_name = "users";
            $query = "CREATE TABLE users (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                first_name VARCHAR(100) NOT NULL,
                last_name VARCHAR(100) NOT NULL,
                email VARCHAR(150) UNIQUE NOT NULL,
                password VARCHAR(255) NOT NULL,
                role VARCHAR(10) NOT NULL
            )";

            $this->executeQuery($db_name, $query);
        }

        public function createPostsTable() {
            $db_name = "posts";
            $query = "CREATE TABLE posts (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                user_id INT UNSIGNED,
                title VARCHAR(255) NOT NULL UNIQUE,
                slug_title VARCHAR(255) NOT NULL,
                type VARCHAR(20) NOT NULL,
                short_description VARCHAR(255),
                content VARCHAR(150),
                category VARCHAR(50) NOT NULL,
                date DATE NOT NULL,
                created_at DATETIME NOT NULL,
                updated_at DATETIME NOT NULL,
                FOREIGN KEY(user_id) REFERENCES users(id)
            )";

            $this->executeQuery($db_name, $query);
        }

        public function createImagesTable() {
            $db_name = "images";
            $query = "CREATE TABLE images (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                user_id INT UNSIGNED,
                post_id INT UNSIGNED,
                image_url VARCHAR(255) NOT NULL UNIQUE,
                FOREIGN KEY(user_id) REFERENCES users(id),
                FOREIGN KEY(post_id) REFERENCES posts(id)
            )";

            $this->executeQuery($db_name, $query);
        }

        private function executeQuery($db_name, $query) {
            $table_exists = $this->db_connect->query("SHOW TABLES LIKE '$db_name'");
            if(mysqli_num_rows($table_exists) <= 0) {
                $stmt = $this->db_connect->prepare($query);
                $stmt->execute();
            }
        }
    }
?>