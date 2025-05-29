<?php
    require_once("../includes/global_variables.php");
    require_once("../includes/db_config.php");
    require_once("../models/post.php");
    require_once("../models/images.php");
    require_once("../helpers/authentication.php");
    require_once("../helpers/error_handler.php");

    $post_db = new Posts($db_conn);
    $image_db = new Images($db_conn);

    switch($_SERVER["REQUEST_METHOD"]) {
        case "POST":
            if(array_key_exists("create", $_GET)) {
                errorHandler(fn() => createPost($post_db, $image_db));
            }

            if(array_key_exists("update", $_GET)) {
                errorHandler(fn() => modifyPost($post_db, $image_db));
            }
            break;
        case "GET":
            if(array_key_exists("type", $_GET) && array_key_exists("limit", $_GET) && array_key_exists("offset", $_GET)) {
                errorHandler(fn() => getPostTableData($post_db));
            }

            if(array_key_exists("slug_title", $_GET)) {
                errorHandler(fn() => getPostBySlugTitle($post_db));
            }

            if(array_key_exists("id", $_GET)) {
                errorHandler(fn() => getPostById($post_db));
            }

            if(array_key_exists("type", $_GET) && array_key_exists("search_key", $_GET)) {
                errorHandler(fn() => getPostBySearchKey($post_db));
            }
            break;
        case "DELETE":
            errorHandler(fn() => removePost($post_db, $image_db));
            break;
    }

    function convertTitleToURL($str) { 
        $str = strtolower($str); 
        $str = preg_replace('/[^a-z0-9]+/', '-', $str); 
        $str = trim($str, '-'); 
        return $str;
    }

    function createPost($post_db, $image_db) {
        if(!isAdmin()) return "Unauthorized access please login as administrator.";
        $_POST["user_id"] = $_SESSION["id"];
        $_POST["slug_title"] = convertTitleToURL($_POST["title"]);
        $post_id = $post_db->insertPost($_POST);
        insertImage($post_id, $image_db);
    }

    function modifyPost($post_db, $image_db) {
        if(!isAdmin()) return "Unauthorized access please login as administrator.";
        $_POST["slug_title"] = convertTitleToURL($_POST["title"]);
        $post_db->updatePost($_POST);
        if(isset($_FILES["post_image"])) {
            $image_db->deleteImage(["id" => $_POST["image_id"], "image_url" => $_POST["image_url"]]);
            insertImage($_POST["id"], $image_db);
        }
    }

    function insertImage($post_id, $image_db) {
        if(!isAdmin()) return "Unauthorized access please login as administrator.";
        $uploaded_image = $image_db->uploadImage($_FILES["post_image"], FOLDER_ROOT);
        $image_db->insertImage(["post_id" => $post_id, "user_id" => NULL, "image_url" => $uploaded_image]);
    }

    function getPostTableData($post_db) {
        $post_res = $post_db->getPostByTypeLimited($_GET);
        createArrayConvertDataToJSON($post_res);
    }

    function getPostBySlugTitle($post_db) {
        $post_res = $post_db->getPostBySlugTitle($_GET);
        echo json_encode($post_res->fetch_assoc());
    }

    function getPostById($post_db) {
        $post_res = $post_db->getPostById($_GET);
        echo json_encode($post_res->fetch_assoc());
    }

    function getPostBySearchKey($post_db) {
        $post_res = $post_db->getPostBySearchKey($_GET);
        createArrayConvertDataToJSON($post_res);
    }

    function createArrayConvertDataToJSON($post_res) {
        $rows = [];
        if ($post_res->num_rows > 0) {
            while ($row = $post_res->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        echo json_encode($rows);
    }

    function removePost($post_db, $image_db) {
        if(!isAdmin()) return "Unauthorized access please login as administrator.";
        $image_db->deleteImage(["id" => $_GET["image_id"], "image_url" => FOLDER_ROOT . $_GET["image_url"]]);
        $post_db->deletePost($_GET);
    }
?>