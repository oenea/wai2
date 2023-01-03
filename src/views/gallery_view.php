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
	<br><br><br>
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
	<br><br><br>

	<form class="form" method="POST">
		<ul>
			<?php if (isset($images))
			foreach ($images as $key => $value): ?>
					<div class="images-border">
						<a href="<?= $value['href'] ?>"><img src="<?= $value['src'] ?>"></a>
						<input class="form-input" type="hidden" value="false" name="<?= $value['id'] ?>" />
						<input class="form-input" type="checkbox" <?php if ($value['checked'] === 'true')
						echo "checked=\"checked\""; ?> value="true" name="<?= $value['id'] ?>">
						<label class="form-label" for="<?= $value['id'] ?>">
							<?= $value['description'] ?>
							<?php if ($value['private'] === 'true')
							echo " |<strong>PRIVATE</strong>| " . $value['author']; ?>
							<?php if($value['private'] !== 'true')
							echo ' | ' . $value['author2']; ?>
						</label>
					</div>
			<?php endforeach ?>
		</ul>
		<button class="form-button" type="submit">remember selected</button>
	</form>
	<footer>
		<?php include 'includes/footer.inc.php'; ?>
	</footer>
</body>

</html>