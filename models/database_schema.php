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