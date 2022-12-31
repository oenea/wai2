<!DOCTYPE html>
<html lang="pl-PL">

<head>


	<title>Wai2</title>
</head>

<body>
	<ul class="menu">
		<li><a class="active" href="index.php">Home</a></li>
		<li><a href="gallery.php">Gallery</a></li>
		<li><a href="login.php">Login</a></li>
		<li><a href="register.php">Register</a></li>
		<li><a href="logout.php" id="logout">Logout</a></li>
	</ul>
	<div class="container">
		<form action="upload.php" method="post" class="forms" id="upload" enctype="multipart/form-data">
			<h3>Upload</h3>
			<h4>Upload photo</h4>
			<fieldset>
				<input placeholder="Author" type="text" name="author" tabindex="1" autofocus>
			</fieldset>
			<fieldset>
				<input placeholder="Watermark" type="text" name="watermark" tabindex="2" required>
			</fieldset>
			<fieldset>
				<input type="radio" id="radio-public" value="Public" name="public-private">
				<label for="radio-public">Public: </label>
				<input type="radio" id="radio-private" value="Private" name="public-private">
				<label for="radio-private">Private: </label>
			</fieldset>
			<fieldset>
				<input placeholder="file" id="upload-file" type="file" name="userfile" tabindex="3">
			</fieldset>
			<fieldset>
				<button name="submit" type="submit" id="register-submit" data-submit="...Sending">Submit</button>
			</fieldset>
		</form>
    </div>
</body>

</html>
