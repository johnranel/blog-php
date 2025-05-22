<?php include_once("./includes/header.php"); ?>
<main>
    <section class="register">
        <div class="container">
            <div class="form-container">
                <h1>Register</h1>
                <form action="/controllers/user.php" method="POST">
                    <input type="hidden" name="register" value="true">
                    <div>
                        <label for="first_name">First name</label>
                        <input type="text" name="first_name" placeholder="Enter your first name" required>
                        <div class="first_name-error"></div>
                    </div>
                    <div>
                        <label for="last_name">Last name</label>
                        <input type="text" name="last_name" placeholder="Enter your last name" required>
                        <div class="last_name-error"></div>
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Enter your email" required>
                        <div class="email-error"></div>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter your password" required>
                        <div class="password-error"></div>
                    </div>
                    <button type="submit">Submit</button>
                    <?php echo (array_key_exists("error", $_GET) && $_GET["error"] == 2) ? '<div class="register-error">Email is already taken.</div>' : ''; ?>
                </form>
            </div>
        </div>
    </section>
</main>
<?php include_once("./includes/footer.php"); ?>