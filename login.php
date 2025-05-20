<?php include_once("./includes/header.php"); ?>
<main>
    <section class="login">
        <div class="container">
            <div class="form-container">
                <h1>Login</h1>
                <form action="/controllers/user.php" method="POST">
                    <div>
                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="Enter your name">
                        <div class="email-error"></div>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter your password">
                        <div class="password-error"></div>
                    </div>
                    <button type="submit">Submit</button>
                    <?php echo (array_key_exists("error", $_GET)) ? '<div class="login-error">Email and password does not match the database records.</div>' : ''; ?>
                </form>
            </div>
        </div>
    </section>
</main>
<?php include_once("./includes/footer.php"); ?>