<?php
require_once 'business.php';


function gallery(&$model)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        foreach ($_POST as $key => $value):
            $_SESSION['selected'][$key] = $value;
        endforeach;
    }
    $is_selected = isset($model['is_selected']);

    $model['login'] = (isset($_SESSION['login']) && (strlen($_SESSION['login']) > 0)) ? $_SESSION['login'] : "";
    $model['page_number'] = isset($_GET['page']) ? $_GET['page'] : 1;

    $limit = 5;
    $thumbnail_directory = 'images/thumbnail/';
    $images_directory = 'images/watermark/';
    $all_files = array_slice(scandir($thumbnail_directory), 2);

    $model['count_files'] = count($all_files);
    $model['total_pages'] = ceil($model['count_files'] / $limit);

    $n = 0;
    $m = 0;
    for ($idx = 0; $idx < count($all_files); $idx++) {
        $key = str_replace(".", "_", $all_files[$idx]);

        if (
            (!$is_selected && ($model['page_number'] >= 1) && ($model['page_number'] <= $model['total_pages']) && ($idx >= ($model['page_number'] - 1) * $limit)) ||
            ($is_selected && isset($_SESSION['selected'][$key]) && ($_SESSION['selected'][$key] === 'true'))
        ) {

            if ($is_selected) {
                if ($m < (($model['page_number'] - 1) * $limit)) {
                    $m++;
                    continue;
                }
            }

            if ($n < $limit) {
                if (
                    (!$model['login'] && check_image_by_filename($all_files[$idx], '')) ||
                    ($model['login'] && check_image_by_filename($all_files[$idx], $model['login']))
                ) {
                    continue;
                }
                $model['images'][$idx]['private'] = check_image_by_filename($all_files[$idx], '') ? 'true' : 'false';
                $model['images'][$idx]['href'] = $images_directory . $all_files[$idx];
                $model['images'][$idx]['src'] = $thumbnail_directory . $all_files[$idx];
                $model['images'][$idx]['description'] = $all_files[$idx];
                $model['images'][$idx]['author'] = get_author_image_by_filename($all_files[$idx]);
                $model['images'][$idx]['author2'] = get_author_public_by_filename($all_files[$idx]);
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
    $model['login'] = (isset($_SESSION['login']) && (strlen($_SESSION['login']) > 0)) ? $_SESSION['login'] : "";

    $model['menu'] = array(
        'gallery' => 'Galeria zdjęć',
        'gallery_selected' => 'Galeria zdjęć wybranych',
        'upload' => 'Wrzucanie plików',
        'find' => 'Wyszukiwanie'

    );

    if (!isset($_SESSION['login'])) {
        $model['menu']['register'] = 'Rejestracja';
        $model['menu']['login'] = 'Logowanie';

    } else if (strlen($_SESSION['login']) > 0) {
        $model['menu']['logout'] = 'Wylogowanie';
    }
    return 'menu_view';
}

function login(&$model)
{
    $model['log'] = '';
    $model['action'] = '';
    $model['label'] = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (check_user_by_name($_POST['username'])) {
            if (check_password(($_POST['username']), $_POST['password'])) {
                $_SESSION['login'] = $_POST['username'];
                return 'redirect:gallery';
            }
        }
        $model['log'] .= 'Błędny login lub hasło';
    }
    return 'login_view';
}

function logout(&$model)
{
    session_regenerate_id();
    unset($_SESSION);
    session_destroy();
    session_write_close();
    return 'redirect:gallery';
}


function find(&$model)
{
    return 'find_view';
}


function find_submit(&$model)
{
    $model['login'] = (isset($_SESSION['login']) && (strlen($_SESSION['login']) > 0)) ? $_SESSION['login'] : "";

    if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['name']) && strlen($_POST['name'])) {
        $thumbnail_directory = 'images/thumbnail/';
        $images_directory = 'images/watermark/';
        $all_files = array_slice(scandir($thumbnail_directory), 2);
        $n = 0;
        for ($idx = 0; $idx < count($all_files); $idx++) {
            if (strpos($all_files[$idx], $_POST['name']) !== false) {

                if (
                    (!$model['login'] && check_image_by_filename($all_files[$idx], '')) ||
                    ($model['login'] && check_image_by_filename($all_files[$idx], $model['login']))
                ) {
                    continue;
                }

                $key = str_replace(".", "_", $all_files[$idx]);
                $model['images'][$n]['private'] = check_image_by_filename($all_files[$idx], '') ? 'true' : 'false';
                $model['images'][$n]['href'] = $images_directory . $all_files[$idx];
                $model['images'][$n]['src'] = $thumbnail_directory . $all_files[$idx];
                $model['images'][$n]['description'] = $all_files[$idx];
                $model['images'][$n]['author'] = get_author_image_by_filename($all_files[$idx]);
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
    $model['log'] = '';
    $model['action'] = '';
    $model['label'] = false;
    if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST['name']) && strlen($_POST['name'])) {
        if ($_POST['password'] !== $_POST['password-repeat']) {
            $model['log'] = 'Hasła nie są takie same';
            return 'register_view';
        }
        if (!check_user_by_name($_POST['name'])) {
            $user = array(
                'name' => $_POST['name'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'email' => $_POST['email']
            );
            save_user(null, $user);
            return 'redirect:gallery';

        } else {
            $model['log'] = 'Login zajęty';
        }
    }
    return 'register_view';
}



function upload(&$model)
{
    $model['login'] = (isset($_SESSION['login']) && (strlen($_SESSION['login']) > 0)) ? $_SESSION['login'] : "";
    $model['action'] = '';
    $model['username'] = 'a';
    $model['label'] = true;
    $model['title'] = 'a';
    $model['log'] = '';
    if (isset($_POST['upload'])) {
        $target_dir = 'images/images/';
        $target_file = $target_dir . basename($_FILES['file']['name']);
        $upload_ok = 1;
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = @getimagesize($_FILES['file']['tmp_name']);
        if ($check !== false) {
            $upload_ok = 1;
        } else {
            $model['log'] .= "File is not an image. ";
            $upload_ok = 0;
        }
        if (file_exists($target_file)) {
            $model['log'] .= "File already exists. ";
            $upload_ok = 0;
        }
        if ($_FILES['file']['size'] > (1024 * 1024)) {
            $model['log'] .= "File is too large. ";
            $upload_ok = 0;
        }
        if ($image_file_type != 'jpg' && $image_file_type != 'png' && $image_file_type != 'jpeg') {
            $model['log'] .= "Only JPG, JPEG, PNG, files are allowed. ";
            $upload_ok = 0;
        }
        if ($upload_ok == 0) {
            $model['log'] .= "File was not uploaded. ";
        } else {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                if (isset($_POST['public-private']) && ($_POST['public-private'] === 'prywatne')) {
                    $image = array(
                        'filename' => basename($_FILES['file']['name']),
                        'description' => 'brak',
                        'user' => $_SESSION['login'],
                        'author' => $_POST['author']
                    );
                    save_image(null, $image);
                } else {
                    $image = array(
                        'filename' => basename($_FILES['file']['name']),
                        'author' => $_POST['author']
                    );
                    save_public(null, $image);
                }
                $model['log'] .= "File " . htmlspecialchars(basename($_FILES['file']['name'])) . " has been uploaded. ";
                $watermark = $_POST['watermark'];
                $obj_image = new image($target_file);
                $obj_image->watermark_image($watermark, 'images/watermark/');
                $obj_image->thumbnail_image(200, 125, 'images/thumbnail/');
            } else {
                $model['log'] .= "There was an error uploading file. ";
            }
        }
    }
    return 'upload_view';
}