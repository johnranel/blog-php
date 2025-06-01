<?php
    require_once("../includes/db_config.php");
    require_once("../models/database_schema.php");

    function runDatabaseMigration($db_conn) {
        try {
            $database = new DatabaseSchema($db_conn);
            $database->createUsersTable();
            $database->createPostsTable();
            $database->createImagesTable();
            $database->createCommentsTable();
        } catch(Exception $e) {
            throw new error("Database migration failed.");
        }
    }

    runDatabaseMigration($db_conn);
?>