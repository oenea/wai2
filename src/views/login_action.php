<?php
require_once '../conection.php';
require_once '../library.php';

if(check_login()){
    header("Location: upload_view.php");
}
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $criteria = array("email" => $email);
    $query = $collection->findOne($criteria);
    if (empty($query)){
        echo "Email not registered";
        echo "Either <a href='register_view.php'>Register</a> or 
        <a href='login_view.php'>Login</a> with already registered account";
    } else {
        $password_hash = $query["password"];
        if(password_verify($password, $password_hash)){
            $var = setsession($email);
            if($var){
                header("Location: upload_view.php");
            } else {
                echo "Error";
            }
        } else {
            echo "Wrong password";
            echo "echo Either <a href='register_view.php'>Register</a> or 
            <a href='login_view.php'>Login</a> with already registered account";
        }
    }
}

?>