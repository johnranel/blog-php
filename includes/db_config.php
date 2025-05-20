<?php
    $server = "ict726_tutorial6-db-1";
    $database = "blog_db";
    $username = "root";
    $password = "root";

    try {
        $db_conn = mysqli_connect($server, $username, $password, $database);
    } catch(Exception $e) {
        die("Could not connect to the database: " . $e->getMessage());
    }
?>