<?php
require_once 'business.php';


function gallery(&$model)
{
    $model['page_number'] = isset($_GET['page']) ? $_GET['page'] : 1;

    $model['limit'] = 2;
    $model['thumbnail_directory'] = 'images/thumbnail/';
    $model['images_directory'] = 'images/watermark/';

    $model['all_files'] = array_slice(scandir($model['thumbnail_directory']), 2);
    $model['offset'] = ($model['page_number'] - 1) * $model['limit'];
    $model['count_files'] = count($model['all_files']);
    $model['total_pages'] = ceil($model['count_files'] / $model['limit']);

    $model['images'] = array(
        array('filename' => 'gdhgfhdsgf.jpg', 'description' => 'opis', 'checkbox' => true),
        array('filename' => 'gdhgfhdsgf.jpg', 'description' => 'opis', 'checkbox' => true),
        array('filename' => 'gdhgfhdsgf.jpg', 'description' => 'opis', 'checkbox' => true)
    );


    //$images = get_image();
    return 'gallery_view';
}


function register(&$model)
{
    $model['action'] = '../business.php';
    $model['label'] = false;
    return 'register_view';
}


function login(&$model)
{
    $model['action'] = '../business.php';
    $model['label'] = false;
    return 'login_view';
}


function search(&$model)
{
    return 'search_view';
}


function upload(&$model)
{
    $model['action'] = '../business';
    $model['username'] = 'a';
    $model['label'] = true;
    $model['title'] = 'a';
    return 'upload_view';
}