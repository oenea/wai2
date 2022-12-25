<!DOCTYPE html>
<html lang="pl-PL">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Wai2">
		<meta  name="keywords" content="Wai, mongodb, php, html, css">
		<link rel="stylesheet" href="style/style.css">
		<!--<link rel="icon" href="image/x-icon.jpg" type="image/x-icon">-->

		<title>Wai2</title>
	</head>
	
	<body>
	<form action="up.php" method="post" class="upload-photo" id="upload-photo" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="name">Name: </label>
				<input type="text" name="name" id="upload-name">
			</li>
			<li>		
				<label for="radio">Public: </label>
				<input type="radio" name="public-private" id="upload-private">
				<label for="radio">Private: </label>
				<input type="radio" name="public-private" id="upload-public">
			</li>
			<li>
				<label for="file">File: </label>
				<input type="file" name="fileToUpload" id="fileToUpload">
			</li>
			<li>
				<button type="submit" name="submit" id="upload-submit">Submit</button>
			</li>
		</ul>
	</form>


	</body>
</html>
 