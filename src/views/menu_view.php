<ul class="menu">
	<?php if ($login) { ?>
		<h3><?= $login ?></h3>
	<?php } ?>
	<?php foreach ($menu as $key => $value): ?>
		<li><a href="<?= $key ?>">
				<?= $value ?>
			</a></li>
		<?php endforeach ?>
</ul>
