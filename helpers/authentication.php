<?php
    session_start();

    function isLoggedIn() {
        if(array_key_exists("is_logged_in", $_SESSION)) {
            return true;
        }
        return false;
    }

    function logout() {
        session_destroy();
        header("Location: /index.php");
    }

    function setSession($user_data) {
        $_SESSION["first_name"] = $user_data["first_name"];
        $_SESSION["last_name"] = $user_data["last_name"];
        $_SESSION["email"] = $user_data["email"];
        $_SESSION["is_logged_in"] = true;
    }
?>