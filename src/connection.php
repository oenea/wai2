<?php

require_once '../vendor/autoload.php';

try {
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]
    );
    $db = $mongo->wai;
    $collection = $db->users;
}
catch (Exception $e){
    die("Error");
}
session_start();
?>