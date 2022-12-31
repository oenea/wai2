<?php
    //require_once '../../library.php';
    //if(check_login()){
      //  header("Location: upload.php");
    //}
?>
<!DOCTYPE html>
<html>

<head>
    <?php include "includes/head.inc.php"; ?>
</head>

<body>
    <div class="container">
        <form action="login_action.php" method="post" class="forms" id="login">
            <h3>Login</h3>
            <h4>Log in if you want</h4>
            <fieldset>
                <input placeholder="Your name" type="text" name="name" tabindex="1" required autofocus>
            </fieldset>
            <fieldset>
                <input placeholder="Your password" type="password" name="password" tabindex="3" required>
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" id="login-submit" data-submit="...Sending">Submit</button>
            </fieldset>
        </form>
    </div>
    <?php include "includes/footer.inc.php"; ?>
</body>

</html>