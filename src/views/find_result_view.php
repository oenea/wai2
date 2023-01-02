<ul>
	<?php if(isset($images)) foreach($images as $key => $value): ?>
		<div class="images-border">
			<a href="<?= $value['href'] ?>"><img src="<?= $value['src'] ?>"></a>
			<label for="<?= $value['id'] ?>"><?= $value['description'] ?></label>
		</div>
	<?php endforeach ?>
</ul>
