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
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);
$upload_ok = 1;
$image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file_to_upload"]["tmp_name"]);
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
if ($_FILES["file_to_upload"]["size"] > 1000000) {
    echo "File is too large.\n";
    $upload_ok = 0;
}
if (
    $image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg"
) {
    echo "Only JPG, JPEG, PNG, files are allowed.\n";
    $upload_ok = 0;
}
if ($upload_ok == 0) {
    echo "File was not uploaded.\n";
} else {
    if (move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file)) {
        echo "File " . htmlspecialchars(basename($_FILES["file_to_upload"]["name"])) . " has been uploaded.\n";
    } else {
        echo "There was an error uploading file.\n";
    }
}
?>
</body>

</html>