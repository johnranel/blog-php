<?php
    class Comments {
        private $db_connect;

        public function __contruct($db_conn) {
            $this->db_connect = $db_conn;
        }

        public function getCommentsByPostId($comment_data) {
            $action = "Get comments by post id";
            $query = "SELECT comments.* FROM comments WHERE post_id = ?";
            $type = "i";
            $fields_array = [$comment_data["post_id"]];
            return $this->executeQuery($action, $query, $type, $fields_array);
        }

        public function insertComment($comment_data) {
            $today = date("Y-m-d H:i:s");
            $action = "Insert new comment";
            $query = "INSERT INTO comments (
                    user_id,
                    post_id,
                    comment,
                    created_at,
                    updated_at
                ) VALUES (
                    ?,
                    ?,
                    ?,
                    ?,
                    ?
                );
            ";
            $type = "iisss";
            $fields_array = [$comment_data["user_id"], $comment_data["post_id"], $comment_data["comment"], $today, $today];
            return $this->executeQuery($action, $query, $type, $fields_array);
        }

        public function updateComment($comment_data) {
            $today = date("Y-m-d H:i:s");
            $action = "Update comment";
            $query = "UPDATE comments SET comment = ?, updated_at = ? WHERE id = ?";
            $type = "ssi";
            $fields_array = [$comment_data["comment"], $today, $comment_data["id"]];
            return $this->executeQuery($action, $query, $type, $fields_array);
        }

        public function deleteComment($comment_data) {
            $action = "Delete comment";
            $query = "DELETE comments WHERE id = ?";
            $type = "i";
            $fields_array = [$comment_data["id"]];
            return $this->executeQuery($action, $query, $type, $fields_array);
        }

        private function executeQuery($action, $query, $type = NULL, $fields_array = NULL) {
            if($stmt = $this->db_connect->prepare($query)) {
                if($type !== NULL) {
                    $stmt->bind_params($type, ...$fields_array);
                }
                $stmt->execute();
                return $stmt->get_result();
            }
            return new Exception("Failed data query: " + $action);
        }
    }

?>