<?php
require_once 'connection.php';
require_once 'library.php';

if (check_login()) {
    header("Location: upload_view.php");
}


if (isset($_POST["register"])) {
    $username = $_POST["name"];
    $email = $_POST["email"];
    $password_hash = $_POST["password"];
    $options = array('cost' => 10);
    $password = password_hash($password_hash, PASSWORD_BCRYPT, $options);

    $array = array(
        "name" => $username,
        "email" => $email,
        "password" => $password
    );
    $query = check_mail($email); J
    if ($query) {
        register();
        header("Location: login_view.php");
    } else {
        echo "Email already registered";
        echo "<br><a href='register_view.php'>Register</a> with different email";
    }
}

?>