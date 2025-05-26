<?php
    class Images {
        private $db_connect;

        public function __construct($db_conn) {
            $this->db_connect = $db_conn;
        }

        public function insertImage($image_data) {
            $action = "Insert image";
            $query = "INSERT INTO images (post_id, user_id, image_url) VALUES (?, ?, ?);";
            $type = "iis";
            $fields_array = [$image_data["post_id"], $image_data["user_id"], $image_data["image_url"]];
            $this->executeQuery($action, $query, $type, $fields_array);
        }

        public function uploadImage($image_data, $file_path) {
            $image_name = basename($image_data["name"]);
            $unique_name = rand() . "_" . $image_name;
            $image_tmp = $image_data["tmp_name"];
            $target_path = $file_path . "/uploads/" . $unique_name;
            $target_url = "/uploads/" . $unique_name;
            move_uploaded_file($image_tmp, $target_path);
            return $target_url;
        }

        public function deleteImage($image_data) {
            $action = "Delete image";
            $query = "DELETE FROM images WHERE id = ?;";
            $type = "i";
            $fields_array = [$image_data["id"]];
            unlink($image_data["image_url"]);
            $this->executeQuery($action, $query, $type, $fields_array);
        }

        private function executeQuery($action, $query, $type, $fields_array) {
            try {
                $stmt = $this->db_connect->prepare($query);
                $stmt->bind_param($type, ...$fields_array);
                $stmt->execute();
                return $stmt->get_result();
            } catch(Exception $e) {
                throw new Exception($e->getMessage());
            }
        }
    }
?>