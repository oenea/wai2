<?php

































































/*
//login and register section
function register($document)
{
    global $collection;
    $collection->insert($document);
    return true;
}

function check_mail($email)
{
    global $collection;
    $temp = $collection->findOne(array('Email Address' => $email));
    if (empty($temp)) {
        return true;
    } else {
        return false;
    }
}

function setsession($email)
{
    $_SESSION["user_logged_in"] = 1;
    global $collection;
    $temp = $collection->findOne(array('Email Address' => $email));
    $_SESSION["username"] = $temp["First Name"];
    $_SESSION["email"] = $email;
    return true;
}

function check_login()
{
    if ($_SESSION["user_logged_in"]) {
        return true;
    } else {
        return false;
    }
}

function logout(){
    unset($_SESSION["user_logged_in"]);
    unset($_SESSION["username"]);
    unset($_SESSION["email"]);
    return true;
}

// images sections
function get_images()
{
    return $images_db->find()->toArray();
}
function get_image($id)
{
    return $images_db->findOne(['id' => new ObjectID($id)]);
}

function add_image(){
    $uniq_id = uniqid();
    while(images_db->$uniq_d)
}
function delete_image($id)
{
    $db = get_db();
    $db->images->deleteOne(['id' => new ObjectID($id)]);
}

*/

