<?php
    class Users {
        private $db_connect;

        public function __construct($db_conn) {
            $this->db_connect = $db_conn;
        }

        public function getUserCount() {
            $action = "Get user count";
            $query = "SELECT COUNT(*) as count FROM users WHERE role = ?;";
            $type = "s";
            $fields_array = ["user"];
            return $this->executeQuery($action, $query, $type, $fields_array);
        }

        public function getUserByEmail($email) {
            $action = "Fetch user by email";
            $query = "SELECT * FROM users WHERE email = ?;";
            $type = "s";
            $fields_array = [$email];
            return $this->executeQuery($action, $query, $type, $fields_array);
        }

        public function insertUser($user_data) {
            $action = "Insert user";
            $query = "INSERT INTO users (
                    first_name, 
                    last_name, 
                    email, 
                    password,
                    role
                ) VALUES (
                    ?,
                    ?,
                    ?,
                    ?,
                    ?
                );
            ";
            $type = "sssss";
            $fields_array = [$user_data["first_name"], $user_data["last_name"], $user_data["email"], password_hash($user_data["password"], PASSWORD_BCRYPT), "member"];
            $this->executeQuery($action, $query, $type, $fields_array);
        }

        public function updateUser($user_data) {
            $action = "Insert user";
            $query = "UPDATE users SET
                    first_name = ?, 
                    last_name = ?, 
                    email = ?
                    WHERE id = ?;
            ";
            $type = "ssss";
            $fields_array = [$user_data["first_name"], $user_data["last_name"], $user_data["email"], $user_data["id"]];
            $this->executeQuery($action, $query, $type, $fields_array);
        }

        private function executeQuery($action, $query, $type = NULL, $fields_array = NULL) {
            try {
                $stmt = $this->db_connect->prepare($query);
                if($type !== NULL) {
                    $stmt->bind_param($type, ...$fields_array);
                }
                $stmt->execute();
                $result = $stmt->get_result();
                return $result;
            } catch(Exception $e) {
                throw new Exception($e->getMessage());
            }
        }
    }
?>