<?php
    class Posts {
        private $db_connect;

        public function __construct($db_conn) {
            $this->db_connect = $db_conn;
        }

        public function getPostBySlugTitle($post_data) {
            $action = "Get post by slug title";
            $query = "SELECT posts.*, images.id AS image_id, images.image_url
                    FROM posts
                    LEFT JOIN images ON images.post_id = posts.id
                    WHERE slug_title = ?
            ";
            $type = "s";
            $fields_array = [$post_data["slug_title"]];
            return $this->executeQuery($action, $query, $type, $fields_array);
        }

        public function getPostById($post_data) {
            $action = "Get post by id";
            $query = "SELECT posts.*, images.id AS image_id, images.image_url
                    FROM posts
                    LEFT JOIN images ON images.post_id = posts.id
                    WHERE posts.id = ?
            ";
            $type = "i";
            $fields_array = [$post_data["id"]];
            return $this->executeQuery($action, $query, $type, $fields_array);
        }

        public function getPostByTypeLimited($post_data) {
            $action = "Get limited post by type";
            $query = "SELECT posts.*, images.id AS image_id, images.image_url
                    FROM posts
                    LEFT JOIN images ON images.post_id = posts.id
                    WHERE type = ?
                    ORDER BY posts.created_at DESC
                    LIMIT ? OFFSET ?
            ";
            $type = "sii";
            $fields_array = [$post_data["type"], $post_data["limit"], $post_data["offset"]];
            return $this->executeQuery($action, $query, $type, $fields_array);
        }

        public function getPostBySearchKey($search_key) {
            $action = "Get post by search key";
            $query = "SELECT posts.*, images.id AS image_id, images.image_url
                    FROM posts
                    LEFT JOIN images ON images.post_id = posts.id
                    WHERE type = ? AND (title LIKE CONCAT('%',?,'%') OR category LIKE CONCAT('%',?,'%'))
                    ORDER BY posts.created_at DESC
                    LIMIT ?
            ";
            $type = "sssi";
            $fields_array = [$search_key["type"], $search_key["search_key"], $search_key["search_key"], 10];
            return $this->executeQuery($action, $query, $type, $fields_array);
        }

        public function insertPost($post_data) {
            $today = date("Y-m-d H:i:s");
            $action = "Insert post";
            $query = "INSERT INTO posts (
                    user_id,
                    title,
                    slug_title,
                    type,
                    short_description,
                    content,
                    category,
                    date,
                    created_at,
                    updated_at
                ) VALUES (
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?,
                    ?
                );
            ";
            $type = "isssssssss";
            $fields_array = [
                $post_data["user_id"], 
                $post_data["title"], 
                $post_data["slug_title"], 
                $post_data["type"], 
                $post_data["short_description"] ?? NULL,
                $post_data["content"] ?? NULL,
                $post_data["category"],
                $post_data["date"],
                $today,
                $today
            ];
            $result = $this->executeQuery($action, $query, $type, $fields_array);
            return $this->db_connect->insert_id;
        }

        public function updatePost($post_data) {
            $today = date("Y-m-d H:i:s");
            $action = "Update post";
            $query = "UPDATE posts SET
                title = ?,
                slug_title = ?,
                short_description = ?,
                content = ?,
                category = ?,
                date = ?,
                updated_at = ?
                WHERE id = ?
            ";
            $type = "sssssssi";
            $fields_array = [
                $post_data["title"], 
                $post_data["slug_title"], 
                $post_data["short_description"] ?? NULL,
                $post_data["content"] ?? NULL,
                $post_data["category"],
                $post_data["date"],
                $today,
                $post_data["id"]
            ];
            $this->executeQuery($action, $query, $type, $fields_array);
        }

        public function deletePost($post_data) {
            $action = "Delete post";
            $query = "DELETE FROM posts WHERE id = ?";
            $type = "i";
            $fields_array = [$post_data["id"]];
            $this->executeQuery($action, $query, $type, $fields_array);
        }

        private function executeQuery($action, $query, $type, $fields_array) {
            if($stmt = $this->db_connect->prepare($query)) {
                $stmt->bind_param($type, ...$fields_array);
                $stmt->execute();
                return $stmt->get_result();
            }
            return new Exception("Failed data query: " + $action);
        }
    }
?>