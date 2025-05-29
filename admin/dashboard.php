<?php include_once("../includes/header.php"); ?>
<main>
    <div class="container">
        <?php
            include_once(FOLDER_ROOT . "/includes/admin/side_menu.php");
        ?>
        <section>
            <h1>Dashboard</h1>
            <div class="statistics">
                <div class="user">
                    <h2>Users</h2>
                    <span>0</span>
                </div>
                <div class="travel">
                    <h2>Travel Posts</h2>
                    <span>0</span>
                </div>
                <div class="blog">
                    <h2>Blog Posts</h2>
                    <span>0</span>
                </div>
                <div class="ootd">
                    <h2>OOTD Posts</h2>
                    <span>0</span>
                </div>
                <div>
                    <h2>User Comments</h2>
                    <span>6</span>
                </div>
            </div>
        </section>
    </div>
</main>
<?php include_once("../includes/footer.php"); ?>