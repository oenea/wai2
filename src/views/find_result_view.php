<ul>
	<?php if(isset($images)) foreach($images as $key => $value): ?>
		<div class="images-border">
			<a href="<?= $value['href'] ?>"><img src="<?= $value['src'] ?>"></a>
			<label for="<?= $value['id'] ?>"><?= $value['description'] ?><?php if ($value['private'] === 'true') echo "|<strong>PRIVATE</strong>|".$value['author']; ?></label>
		</div>
	<?php endforeach ?>
</ul>
