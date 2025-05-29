<?php
    function errorHandler(callable $function, $error_message = "Something went wrong!") {
        try {
            return $function();
        } catch(Exception $e) {
            echo json_encode(["error_message" => $error_message]);
        }
    }
?>