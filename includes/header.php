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
        <?php 
            $styles = '<link rel="stylesheet" href="' . SITE_URL . '/assets/styles/header-footer.css" type="text/css">';
            $styles .= loadCssFiles(SITE_PATH);
            echo $styles;
            $scripts = '<script type="text/javascript" src="' . SITE_URL . '/assets/js/jquery-3.7.1.min.js"></script>';
            $scripts .= '<script type="text/javascript" src="' . SITE_URL . '/assets/js/scripts.js"></script>';
            $scripts .= '<script type="text/javascript" src="' . SITE_URL . '/assets/js/helpers/validation.js"></script>';
            $scripts .= loadJsFiles(SITE_PATH);
            echo $scripts;
        ?>
    </head>
    <body>
        <nav>
            <div class="container">
                <div class="logo-container">
                    <a href="index.html">
                        <?php 
                            echo '<img src="' . SITE_URL . '/assets/images/nav/life_musings_of_jane_logo.png" alt="Life Musings of Jane logo">';
                        ?>
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
                    <button class="close-menu"><img src="<?php echo SITE_URL ?>/assets/images/flex/close.png" alt="Close menu"></button>
                    <?php echo navLinks(SITE_PATH); ?>
                    <div class="social-icons-container">
                        <?php
                            $social_links = '<a href="#"><img src="' . SITE_URL . '/assets/images/nav/instagram.png" alt="Instagram logo"></a>';
                            $social_links .= '<a href="#"><img src="' . SITE_URL . '/assets/images/nav/telegram.png" alt="Telegram logo"></a>';
                            $social_links .= '<a href="#"><img src="' . SITE_URL . '/assets/images/nav/facebook.png" alt="Facebook logo"></a>';
                            echo $social_links;
                        ?>
                    </div>
                </div>
            </div>
        </nav>