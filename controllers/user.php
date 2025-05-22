<?php
    require_once("../includes/db_config.php");
    require_once("../models/user.php");
    require_once("../helpers/authentication.php");

    switch($_SERVER["REQUEST_METHOD"]) {
        case "POST":
            if(array_key_exists("register", $_POST)) {
                registration($db_conn);
            }

            if(array_key_exists("PUT", $_POST)) {
                updateUserProfile($db_conn);
            }
            
            if(!array_key_exists("register", $_POST) && !array_key_exists("PUT", $_POST)) {
                login($db_conn);
            }
        case "GET":
            if(array_key_exists("logout", $_GET)) {
                logout();
            }
            break;
    }

    function registration($db_conn) {
        try {
            $user_db = new User($db_conn);
            $user_db->insertUser($_POST);
            $request = "?success=1";
        } catch(Exception $e) {
            $request = "?error=2";
        }
        header("Location: /register.php" . $request);
    }

    function updateUserProfile($db_conn) {
        try {
            $_POST["id"] = $_SESSION["id"];
            $_POST["role"] = $_SESSION["role"];
            $user_db = new User($db_conn);
            $user_db->updateUser($_POST);
            $request = "?success=1";
            setSession($_POST);
        } catch(Exception $e) {
            $request = "?error=1";
        }
        header("Location: /my_profile.php" . $request);
    }

    function login($db_conn) {
        $user_db = new User($db_conn);
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