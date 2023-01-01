	<ul>
		<?php foreach($routing as $key => $value): ?>
			<li><a href="<?= $value; ?>"><?= $value; ?></a></li>
		<?php endforeach ?>
	</ul>