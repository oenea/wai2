<ul>
	<?php foreach ($menu as $key => $value): ?>
		<li><a href="<?= $key ?>">
				<?= $value ?>
			</a></li>
		<?php endforeach ?>
	<form action="" method="POST">
		<li><button name="logout" type="submit">Wyloguj</button></li>
	</form>
</ul>