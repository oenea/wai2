

    <?php
	if(isset($_POST["submit"])){
		$check = getimagesize($_FILES["fileToUpload"]["name"]);
		if($check !== false){
			if($_FILES["fileToUpload"]["size"] > 1000000){
				echo "File is too large, select another file or make this file smaller.";
				$upload_ok = 0;
			}
			if(file_exists($target_file)){
				echo "File with disame name exists, change name and upload again.";
				$uploadOk = 0;
            }
			if($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg"){
				echo "Sorry, only JPG, PNG, JPEG files are allowed. Convert this file to valid format";
				$uploadOk = 0;
			}
			} else {
				echo "File is not an image.";
				$upload_ok = 0;
			}
	}
	if($upload_ok == 1){
		if(move_uploaded_file($_FILES["fileToUpload"]["name"], $target_file)){
			echo "The file " . htmlspecialchars( basename($_FILES["upload-file"]["name"])). " has been uploaded successfully.";
		}else{
			echo "Unknown error, file not uploaded";
		}
	}
?>

