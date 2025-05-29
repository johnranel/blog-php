<?php
    require_once("../includes/db_config.php");
    require_once("../models/user.php");
    require_once("../helpers/authentication.php");

    $user_db = new Users($db_conn);

    switch($_SERVER["REQUEST_METHOD"]) {
        case "POST":
            if(array_key_exists("register", $_POST)) {
                registration($user_db);
            }

            if(array_key_exists("PUT", $_POST)) {
                updateUserProfile($user_db);
            }
            
            if(!array_key_exists("register", $_POST) && !array_key_exists("PUT", $_POST)) {
                login($user_db);
            }
        case "GET":
            if(array_key_exists("user_count", $_GET)) {
                getUserCount($user_db);
            }

            if(array_key_exists("logout", $_GET)) {
                logout();
            }
            break;
    }

    function getUserCount($user_db) {
        try {
            $user_db_res = $user_db->getUserCount();
            $user_count = $user_db_res->fetch_assoc();
            echo json_encode($user_count);
        } catch(Exception $e) {
            echo "Something went wrong!";
        }
    }

    function registration($user_db) {
        try {
            $user_db->insertUser($_POST);
            $request = "?success=1";
        } catch(Exception $e) {
            $request = "?error=2";
        }
        header("Location: /register.php" . $request);
    }

    function updateUserProfile($user_db) {
        try {
            $_POST["id"] = $_SESSION["id"];
            $_POST["role"] = $_SESSION["role"];
            $user_db->updateUser($_POST);
            $request = "?success=1";
            setSession($_POST);
        } catch(Exception $e) {
            $request = "?error=1";
        }
        header("Location: /my_profile.php" . $request);
    }

    function login($user_db) {
        try {
            $user_db_res = $user_db->getUserByEmail($_POST["email"]);
            $user_data = $user_db_res->fetch_assoc();
        } catch(Exception $e) {
            $request = "?error=2";
        }
        if(isset($user_data) && password_verify($_POST["password"], $user_data["password"])) {
            setSession($user_data);
            header("Location: /index.php");
        } else {
            $request = "?error=1";
        }
        
        header("Location: /login.php" . $request);
    }
?>