<?php
    require_once("../includes/db_config.php");
    require_once("../models/post.php");
    require_once("../helpers/authentication.php");

    $post_db = new Posts($db_conn);

    switch($_SERVER["REQUEST_METHOD"]) {
        case "POST":
            if(array_key_exists("create", $_GET)) {
                createPost($post_db);
            }

            if(array_key_exists("update", $_GET)) {
                modifyPost($post_db);
            }
            break;
        case "GET":
            if(array_key_exists("type", $_GET) && array_key_exists("limit", $_GET) && array_key_exists("offset", $_GET)) {
                getPostTableData($post_db);
            }

            if(array_key_exists("id", $_GET)) {
                getPostById($post_db);
            }
            break;
        case "DELETE":
            removePost($post_db);
            break;
    }

    function convertTitleToURL($str) { 
        $str = strtolower($str); 
        $str = preg_replace('/[^a-z0-9]+/', '-', $str); 
        $str = trim($str, '-'); 
        return $str;
    }

    function createPost($post_db) {
        $_POST["user_id"] = $_SESSION["id"];
        $_POST["slug_title"] = convertTitleToURL($_POST["title"]);
        $post_db->insertPost($_POST);
    }

    function modifyPost($post_db) {
        $_POST["slug_title"] = convertTitleToURL($_POST["title"]);
        $post_db->updatePost($_POST);
    }

    function getPostTableData($post_db) {
        $post_res = $post_db->getPostByTypeLimited($_GET);
        $rows = [];
        if ($post_res->num_rows > 0) {
            while ($row = $post_res->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        echo json_encode($rows);
    }

    function getPostById($post_db) {
        $post_res = $post_db->getPostById($_GET);
        echo json_encode($post_res->fetch_assoc());
    }

    function removePost($post_db) {
        $post_db->deletePost($_GET);
    }
?>