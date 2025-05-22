<?php include_once("./includes/header.php"); ?>
<main>
    <section class="my-profile">
        <div class="container">
            <div class="form-container">
                <h1>My Profile</h1>
                <form action="/controllers/user.php" method="POST">
                    <input type="hidden" name="PUT" value="true">
                    <div>
                        <label for="first_name">First name</label>
                        <input type="text" name="first_name" placeholder="Enter your first name" value="<?php echo $_SESSION["first_name"]; ?>" required>
                        <div class="first_name-error"></div>
                    </div>
                    <div>
                        <label for="last_name">Last name</label>
                        <input type="text" name="last_name" placeholder="Enter your last name" value="<?php echo $_SESSION["last_name"]; ?>" required>
                        <div class="last_name-error"></div>
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Enter your email" value="<?php echo $_SESSION["email"]; ?>" required>
                        <div class="email-error"></div>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </section>
</main>
<?php include_once("./includes/footer.php"); ?>