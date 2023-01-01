<!DOCTYPE html>
<html>

<head>
    <?php include "includes/head.inc.php"; ?>
</head>

<body>
    <div class="container">
        <form action="register_action.php" method="post" class="forms" id="register">
            <h3>Register</h3>
            <h4>Register for more features</h4>
            <fieldset>
                <input placeholder="Your name" type="text" name="name" tabindex="1" required autofocus>
            </fieldset>
            <fieldset>
                <input placeholder="Your Email Address" type="email" name="email" tabindex="2" required>
            </fieldset>
            <fieldset>
                <input placeholder="Your password" type="password" name="password" tabindex="3" required>
            </fieldset>
            <fieldset>
                <button name="register" type="submit" id="register-submit" data-submit="...Sending">Submit</button>
            </fieldset>
        </form>
    </div>
    <?php include "includes/footer.inc.php"; ?>
</body>

</html>