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
        <li><a href="login.php">Login</a></li>
        <li><a class="active" href="register.php">Register</a></li>
    </ul>

    <div class="container">
        <form action="" method="post" class="forms" id="register">
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
            <p class="copyright">Designed by <a href="https://www.github.com/oenea" target="_blank"
                    title="Paweł Pstrągowski">oenea</a></p>
        </form>
        <?php
        $password = $_POST['password'];
        $hash = password_hash($password);
        $login = $_POST['login'];
        $db->users->insert([
            'login' => $login;
            'password' => $hash;
        ]);
        header('Location: success.php');
    </div>
</body>

</html>