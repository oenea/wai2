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
        imagefttext($dest_image,  ($source_image_width/20), 45, ($source_image_width) / 3, (2 * $source_image_height) / 3, $watermark_color, $font, $watermark);

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