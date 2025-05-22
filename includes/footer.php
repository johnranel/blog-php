        <footer>
            <div class="container">
                <div class="footer-container">
                    <div class="logo-container">
                        <a href="index.html">
                            <?php 
                                echo '<img src="' . SITE_URL . '/assets/images/footer/life_musings_of_jane_logo.png" alt="Life Musings of Jane logo">';
                            ?>
                        </a>
                    </div>
                    <div class="menu-container">
                        <?php echo navLinks(SITE_PATH); ?>
                    </div>
                    <hr>
                    <div class="socials-container">
                        <p>FOLLOW ME ON MY SOCIALS</p>
                        <?php
                            $social_links = '<a href="#"><img src="' . SITE_URL . '/assets/images/footer/instagram.png" alt="Instagram logo"></a>';
                            $social_links .= '<a href="#"><img src="' . SITE_URL . '/assets/images/footer/telegram.png" alt="Telegram logo"></a>';
                            $social_links .= '<a href="#"><img src="' . SITE_URL . '/assets/images/footer/facebook.png" alt="Facebook logo"></a>';
                            echo $social_links;
                        ?>
                    </div>
                    <div class="copyright-container">
                        <p>COPYRIGHT <?php echo date("Y"); ?> ALL RIGHTS RESERVED</p>
                        <a href="">TERMS OF USE</a><a href="">PRIVACY POLICY</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>