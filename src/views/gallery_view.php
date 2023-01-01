<!DOCTYPE html>
<html>

<head>
	<title>Galeria</title>
	<?php include "includes/head.inc.php"; ?>
</head>

<body>
	<?php include "partial/menu.inc.php";?>
	<div>
		<ul style="<?php if ($total_pages == 1) {
		echo 'display: none;';
	} ?>">
			<li><a href="gallery?page=1">First<?php print($images[0]['filename'] . $images[1]['filename'] . count($images)) ?></a></li>
			<li style="<?php if ($page_number <= 1) {
			echo 'display: none;';
		} ?>">
				<a href="<?php echo "gallery?page=" . ($page_number - 1); ?>">Prev</a>
			</li>
			<li style="<?php if ($page_number >= $total_pages) {
			echo 'display: none;';
		} ?>">
				<a href="<?php echo "gallery?page=" . ($page_number + 1); ?>">Next</a>
			</li>
			<li><a href="gallery?page=<?php echo ($total_pages) ?>">Last</a></li>

		</ul>
	</div>
	<ul>
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

	<?php include "includes/footer.inc.php"; ?>

</body>

</html>