<?php
    require_once("../includes/db_config.php");
    require_once("../models/database_schema.php");

    function runDatabaseMigration($db_conn) {
        try {
            $database = new DatabaseSchema($db_conn);
            $database->createUsersTable();
            $database->createPostsTable();
            $database->createImagesTable();
        } catch(Exception $e) {
            throw new error("died: " . $e->getMessage());
        }
    }

    runDatabaseMigration($db_conn);
?>