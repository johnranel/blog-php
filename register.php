<?php include_once("./includes/header.php"); ?>
<main>
    <section class="register">
        <div class="container">
            <div class="form-container">
                <h1>Register</h1>
                <form action="#" method="POST">
                    <div>
                        <label for="first_name">First name</label>
                        <input type="text" name="first_name" placeholder="Enter your first name">
                    </div>
                    <div>
                        <label for="last_name">Last name</label>
                        <input type="text" name="last_name" placeholder="Enter your last name">
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="Enter your email">
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter your password">
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </section>
</main>
<?php include_once("./includes/footer.php"); ?>