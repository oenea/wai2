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
	<ul class="menu">
		<li><a href="index.php">Home</a></li>
		<li><a class="active" href="gallery.php">Gallery</a></li>
		<li><a href="login.php">Login</a></li>
		<li><a href="register.php">Register</a></li>
	</ul>
	<?php
    $page_number = isset($_GET['page']) ? $_GET['page'] : 1;

    $limit = 2;
    $thumbnail_directory = 'images/thumbnail/';
	$images_directory = 'images/watermark/';

    $all_files = array_slice(scandir($thumbnail_directory), 2);
    $offset = ($page_number - 1) * $limit;
    $count_files = count($all_files);
    $total_pages = ceil($count_files / $limit);
    ?>
	<div class="empty"></div>
	<div class="images-menu">
		<ul class="images-menu" style="<?php if($total_pages == 1) { echo 'display: none;'; } ?>">
			<li><a class="images-menu" href="?page=1">First</a></li>
			<li style="<?php if ($page_number <= 1) { echo 'display: none;'; } ?>">
				<a class="images-menu" href="<?php echo "?page=" . ($page_number - 1); ?>">Prev</a>
			</li>
			<li style="<?php if ($page_number >= $total_pages) { echo 'display: none;'; } ?>">
				<a class="images-menu" href="<?php echo "?page=" . ($page_number + 1); ?>">Next</a>
			</li>
			<li><a class="images-menu" href="?page=<?php echo ($total_pages)?>">Last</a></li>
			
		</ul>
	</div>
	<div class="empty"></div>
	<ul class="images">
		<?php
        for ($iterator = 0; $iterator < $limit; $iterator += 1) {
	        if ($page_number >= 1 && $page_number <= $total_pages) {
		        if (count($all_files) > $iterator + ($page_number - 1) * $limit) {
			        echo "<div class=\"images-border\">";
			        echo "<a href=" . $images_directory . $all_files[$iterator + ($page_number - 1) * $limit] . ">";
			        echo "<img src=" . $thumbnail_directory . $all_files[$iterator + ($page_number - 1) * $limit] . "></a>";
			        echo "</div>";
		        }
	        }
        }
		?>
		</div>
	</ul>
</body>

</html>