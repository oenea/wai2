<?php

use MongoDB\BSON\ObjectID;


function get_db()
{
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]
    );
    $db = $mongo->wai;
    return $db;
}

function save_public($id, $image){
    $db = get_db();
    if ($id == null) {
        $db->public->insertOne($image);
    } else {
        $db->public->replaceOne(['_id' => new ObjectID($id)], $image);
    }
    return true;
}
function get_author_public_by_filename($filename)
{
    $db = get_db();
    $image = $db->public->findOne(['filename' => $filename]);
    return is_object($image) ? $image['author'] : '';
}

function check_password($user, $password)
{
    $db = get_db();
    $login = $db->users->findOne(['name' => $user]);
    $password_hash = $login['password'];
    return password_verify($password, $password_hash);
}

function check_image_by_filename($filename, $not_user)
{
    $db = get_db();
    if ($not_user) {
        $image = $db->images->findOne(['filename' => $filename, 'user' => ['$ne' => $not_user]]);
    } else {
        $image = $db->images->findOne(['filename' => $filename]);
    }
    return is_object($image);
}

function get_author_image_by_filename($filename)
{
    $db = get_db();
    $image = $db->images->findOne(['filename' => $filename]);
    return is_object($image) ? $image['author'] : '';
}

function save_image($id, $image)
{
    $db = get_db();

    if ($id == null) {
        $db->images->insertOne($image);
    } else {
        $db->images->replaceOne(['_id' => new ObjectID($id)], $image);
    }
    return true;
}

function check_user_by_name($name)
{
    $db = get_db();
    $user = $db->users->findOne(['name' => $name]);
    return is_object($user);
}


function save_user($id, $user)
{
    $db = get_db();

    if ($id == null) {
        $db->users->insertOne($user);
    } else {
        $db->users->replaceOne(['_id' => new ObjectID($id)], $user);
    }
    return true;
}




class image
{
    private $source;
    public function __construct($source_image_path)
    {
        $this->source = $source_image_path;
    }
    public function thumbnail_image($dest_image_width, $dest_image_height, $dest_image_path)
    {
        if (
            (strtolower(pathinfo($this->source, PATHINFO_EXTENSION)) == "jpg") ||
            (strtolower(pathinfo($this->source, PATHINFO_EXTENSION)) == "jpeg")
        )
            $source_image = imagecreatefromjpeg($this->source);
        else if ((strtolower(pathinfo($this->source, PATHINFO_EXTENSION))) == "png")
            $source_image = imagecreatefrompng($this->source);

        list($source_image_width, $source_image_height) = getimagesize($this->source);
        $dest_image = imagecreatetruecolor($dest_image_width, $dest_image_height);

        imagecopyresampled(
            $dest_image,
            $source_image,
            0,
            0,
            0,
            0,
            $dest_image_width,
            $dest_image_height,
            $source_image_width,
            $source_image_height
        );
        if (
            (strtolower(pathinfo($this->source, PATHINFO_EXTENSION)) == "jpg") ||
            (strtolower(pathinfo($this->source, PATHINFO_EXTENSION)) == "jpeg")
        )
            imagejpeg($dest_image, $dest_image_path . basename($this->source), 100);
        else if ((strtolower(pathinfo($this->source, PATHINFO_EXTENSION))) == "png")
            imagepng($dest_image, $dest_image_path . basename($this->source), 0);
        imagedestroy($source_image);
        imagedestroy($dest_image);
    }
    public function watermark_image($watermark, $dest_image_path)
    {
        if (
            (strtolower(pathinfo($this->source, PATHINFO_EXTENSION)) == "jpg") ||
            (strtolower(pathinfo($this->source, PATHINFO_EXTENSION)) == "jpeg")
        )
            $source_image = imagecreatefromjpeg($this->source);
        else if ((strtolower(pathinfo($this->source, PATHINFO_EXTENSION))) == "png")
            $source_image = imagecreatefrompng($this->source);

        list($source_image_width, $source_image_height) = getimagesize($this->source);
        $dest_image = imagecreatetruecolor($source_image_width, $source_image_height);

        imagecopyresampled(
            $dest_image,
            $source_image,
            0,
            0,
            0,
            0,
            $source_image_width,
            $source_image_height,
            $source_image_width,
            $source_image_height
        );
        $watermark_color = imagecolorallocate($dest_image, 0, 0, 0);
        //imagestring($dest_image, $source_image_width/15, $source_image_width/3, $source_image_height/2, $watermark, $watermark_color);
        $font = './LDFComicSans.ttf';
        imagefttext($dest_image, ($source_image_width / 20), 45, ($source_image_width) / 3, (2 * $source_image_height) / 3, $watermark_color, $font, $watermark);

        if (
            (strtolower(pathinfo($this->source, PATHINFO_EXTENSION)) == "jpg") ||
            (strtolower(pathinfo($this->source, PATHINFO_EXTENSION)) == "jpeg")
        )
            imagejpeg($dest_image, $dest_image_path . basename($this->source), 100);
        else if ((strtolower(pathinfo($this->source, PATHINFO_EXTENSION))) == "png")
            imagepng($dest_image, $dest_image_path . basename($this->source), 0);

        imagedestroy($source_image);
        imagedestroy($dest_image);

    }
}