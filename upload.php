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

<?php
class image {
    private $source;
    public function __construct($source_image_path) {
        $this->source = $source_image_path;
    }
    public function thumbnail_image($dest_image_width, $dest_image_height, $dest_image_path){
        if (
            (strtolower(pathinfo($this->source, PATHINFO_EXTENSION)) == "jpg") ||
            (strtolower(pathinfo($this->source, PATHINFO_EXTENSION)) == "jpeg")
        )
            $source_image = imagecreatefromjpeg($this->source);
        else if ((strtolower(pathinfo($this->source, PATHINFO_EXTENSION))) == "png")
            $source_image = imagecreatefrompng($this->source);

        list($source_image_width, $source_image_height) = getimagesize($this->source);
        $dest_image = imagecreatetruecolor($dest_image_width, $dest_image_height);

        imagecopyresampled($dest_image, $source_image, 0, 0, 0, 0, $dest_image_width, 
                           $dest_image_height, $source_image_width, $source_image_height);
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
    public function watermark_image($watermark, $dest_image_path){
        if (
            (strtolower(pathinfo($this->source, PATHINFO_EXTENSION)) == "jpg") ||
            (strtolower(pathinfo($this->source, PATHINFO_EXTENSION)) == "jpeg")
        )
            $source_image = imagecreatefromjpeg($this->source);
        else if ((strtolower(pathinfo($this->source, PATHINFO_EXTENSION))) == "png")
            $source_image = imagecreatefrompng($this->source);

        list($source_image_width, $source_image_height) = getimagesize($this->source);
        $dest_image = imagecreatetruecolor($source_image_width, $source_image_height);

        imagecopyresampled($dest_image, $source_image, 0, 0, 0, 0, $source_image_width, 
                           $source_image_height, $source_image_width, $source_image_height);
        $watermark_color = imagecolorallocate($dest_image, 0, 0, 0);
        imagestring($dest_image, 50, 130, 117, $watermark, $watermark_color);

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

$target_dir = "images/images/";
$target_file = $target_dir . basename($_FILES['userfile']['name']);
$upload_ok = 1;
$image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if (isset($_POST['submit'])) { 
    $check = @getimagesize($_FILES['userfile']['tmp_name']);
    if ($check !== false) {
        $upload_ok = 1;
    } else {
        echo "File is not an image.\n";
        $upload_ok = 0;
    }
}
if (file_exists($target_file)) {
    echo "File already exists.\n";
    $upload_ok = 0;
}
if ($_FILES['userfile']['size'] > 1000000) {
    echo "File is too large.\n";
    $upload_ok = 0;
}
if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg") {
    echo "Only JPG, JPEG, PNG, files are allowed.\n";
    $upload_ok = 0;
}
if ($upload_ok == 0) {
    echo "File was not uploaded.\n";
} else {
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $target_file)) {
        echo "File " . htmlspecialchars(basename($_FILES['userfile']['name'])) . " has been uploaded.\n";
        $watermark = $_POST['watermark'];
        $obj_image = new image($target_file);
        $obj_image->watermark_image($watermark, 'images/watermark/');
        $obj_image->thumbnail_image(200, 125, 'images/thumbnail/');
        
    } else {
        echo "There was an error uploading file.\n";
    }
}
?>

</body>
</html>