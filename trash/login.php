<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Wai2">
    <meta name="keywords" content="Wai, mongodb, php, html, css">
    <link rel="stylesheet" href="style/style.css">
    <!--<link rel="icon" href="image/x-icon.jpg" type="image/x-icon">-->

    <title>Wai2</title>
</head>

<body>
    <ul class="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a class="active" href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
    </ul>
    <div class="container">
        <form action="" method="post" class="forms" id="login">
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
            <p class="copyright">Designed by <a href="https://www.github.com/oenea" target="_blank"
                    title="Paweł Pstrągowski">oenea</a></p>
        </form>
        <?php 
        $user = $db->users->findOne(['login' => $login]);
        if($_POST['name'] !== null && password_verify($password, $user['password'])){
        }
    </div>
</body>

</html>