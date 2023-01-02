<?php
require_once 'business.php';


function gallery(&$model)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        foreach($_POST as $key => $value):
            $_SESSION['selected'][$key] = $value;
        endforeach;
    }
    $is_selected = isset($model['is_selected']);
  
    $model['page_number'] = isset($_GET['page']) ? $_GET['page'] : 1;

    $limit = 2;
    $thumbnail_directory = 'images/thumbnail/';
    $images_directory = 'images/watermark/';
    $all_files = array_slice(scandir($thumbnail_directory), 2);

    $model['count_files'] = count($all_files);
    $model['total_pages'] = ceil($model['count_files'] / $limit);

    $n = 0;
    $m = 0;
    for($idx = 0; $idx < count($all_files); $idx++) {
        $key = str_replace(".", "_", $all_files[$idx]);

        if((!$is_selected && ($model['page_number'] >= 1) && ($model['page_number'] <= $model['total_pages']) && ($idx >= ($model['page_number'] - 1) * $limit)) ||
          ($is_selected && isset($_SESSION['selected'][ $key ]) && ($_SESSION['selected'][ $key ] === 'true'))) {
 
            if($is_selected) {
                if($m < (($model['page_number'] - 1) * $limit)) {
                    $m++;
                    continue;
                }
            }
  
            if ($n < $limit) {
                $model['images'][$idx]['href'] = $images_directory . $all_files[$idx];
                $model['images'][$idx]['src'] = $thumbnail_directory . $all_files[$idx];
                $model['images'][$idx]['description'] = $all_files[$idx];
                $model['images'][$idx]['id'] = $key;
                $model['images'][$idx]['checked'] = isset($_SESSION['selected'][$key]) ? $_SESSION['selected'][$key] : 'false';
                $n++;
            } else {
                break;
            }
        }   
    }
    return 'gallery_view';
}

function gallery_selected(&$model)
{
    $model['is_selected'] = true;
    return gallery($model);
}


function menu(&$model)
{
    $model['menu'] = array(
        'gallery' => 'Galeria zdjęć',
        'gallery_selected' => 'Galeria zdjęć wybranych',
        'register' => 'Rejestracja',
        'find' => 'Wyszukiwanie'
    );
    return 'menu_view';
}

function find(&$model)
{
    return 'find_view';
}


function find_submit(&$model)
{
    if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['name']) && strlen($_POST['name'])) {
        $thumbnail_directory = 'images/thumbnail/';
        $images_directory = 'images/watermark/';
        $all_files = array_slice(scandir($thumbnail_directory), 2);
        $n = 0;
        for($idx = 0; $idx < count($all_files); $idx++) {
            if (strpos($all_files[$idx], $_POST['name']) !== false) {
                $key = str_replace(".", "_", $all_files[$idx]);
                $model['images'][$n]['href'] = $images_directory . $all_files[$idx];
                $model['images'][$n]['src'] = $thumbnail_directory . $all_files[$idx];
                $model['images'][$n]['description'] = $all_files[$idx];
                $model['images'][$n]['id'] = $key;
                $n++;
            }
        }
        return is_ajax() ? find_result($model) : 'redirect:' . $_SERVER['HTTP_REFERER'];
    }
    http_response_code(200);
    exit;
}

function find_result(&$model)
{
    return 'find_result_view';
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