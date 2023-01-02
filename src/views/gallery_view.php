<!DOCTYPE html>
<html>

<head>
	<title>Galeria</title>
	<?php include 'includes/head.inc.php'; ?>
</head>

<body>
	<?php dispatch($routing, '/menu') ?>

<!--pre>
	<?php print_r($_SESSION); ?>
	<?php print_r($_REQUEST); ?>
</pre-->
	<div>
		<ul style="<?php if ($total_pages == 1) {
		echo 'display: none;';
	} ?>">
			<li><a href="?page=1">First</a></li>
			<li style="<?php if ($page_number <= 1) {
			echo 'display: none;';
		} ?>">
				<a href="<?php echo "?page=" . ($page_number - 1); ?>">Prev</a>
			</li>
			<li style="<?php if ($page_number >= $total_pages) {
			echo 'display: none;';
		} ?>">
				<a href="<?php echo "?page=" . ($page_number + 1); ?>">Next</a>
			</li>
			<li><a href="?page=<?php echo ($total_pages) ?>">Last</a></li>

		</ul>
	</div>

	<form method="post">
		<ul>
			<?php if(isset($images)) foreach($images as $key => $value): ?>
				<div class="images-border">
					<a href="<?= $value['href'] ?>"><img src="<?= $value['src'] ?>"></a>
					<input type="hidden" value="false" name="<?= $value['id'] ?>"/>
					<input type="checkbox" <?php if($value['checked'] === 'true') echo "checked=\"checked\""; ?> value="true" name="<?= $value['id'] ?>">
					<label for="<?= $value['id'] ?>"><?= $value['description'] ?></label>
				</div>
			<?php endforeach ?>
		</ul>
		<button type="submit">remember selected</button>
	</form>
	<footer>
		<?php include 'includes/footer.inc.php'; ?>
	</footer>
</body>

<!--<php print($images[0]['filename'] . $images[1]['filename'] . count($images)) ?>-->

</html>