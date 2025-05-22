<?php 
    include_once("../includes/header.php");
?>
<main>
    <div class="container">
        <?php
            include_once(FOLDER_ROOT . "/includes/admin/side_menu.php");
        ?>
        <section>
            <?php include_once(FOLDER_ROOT . "/includes/admin/admin_tables.php") ?>
            <?php include_once(FOLDER_ROOT . "/includes/modals/form_posts.php") ?>
            <?php include_once(FOLDER_ROOT . "/includes/modals/delete_post.php") ?>
        </section>
    </div>
</main>
<?php include_once("../includes/footer.php") ?>