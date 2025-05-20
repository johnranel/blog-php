<?php 
    include_once("global_variables.php");
    include_once("db_config.php");
    include_once(FOLDER_ROOT . "/helpers/navigation.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>HOME | LIFE MUSINGS BY JANE</title>
        <link rel="stylesheet" href="./assets/styles/header-footer.css" type="text/css">
        <?php echo loadProperCssFiles(SITE_PATH); ?>
        <script type="text/javascript" src="./assets/js/jquery-3.7.1.min.js"></script>
        <script type="text/javascript" src="./assets/js/scripts.js"></script>
        <script type="text/javascript" src="./assets/js/helpers/validation.js"></script>
    </head>
    <body>
        <nav>
            <div class="container">
                <div class="logo-container">
                    <a href="index.html">
                        <img src="./assets/images/nav/life_musings_of_jane_logo.png" alt="Life Musings of Jane logo">
                    </a>
                </div>
                <div class="navbar">
                    <div class="burger">
                        <span class="line-1"></span>
                        <span class="line-2"></span>
                        <span class="line-3"></span>
                    </div>
                </div>
                <div class="menu-container">
                    <button class="close-menu"><img src="./assets/images/flex/close.png" alt="Close menu"></button>
                    <?php echo navLinks(SITE_PATH); ?>
                    <div class="social-icons-container">
                        <a href="#"><img src="./assets/images/nav/instagram.png" alt="Instagram logo"></a>
                        <a href="#"><img src="./assets/images/nav/telegram.png" alt="Telegram logo"></a>
                        <a href="#"><img src="./assets/images/nav/facebook.png" alt="Facebook logo"></a>
                    </div>
                </div>
            </div>
        </nav>