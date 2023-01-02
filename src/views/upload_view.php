<!DOCTYPE html>
<html>

<head>
    <?php include "includes/head.inc.php"; ?>
</head>

<body>
    <?php dispatch($routing, '/menu') ?>

    <div class="container">
        <form action="<?= $model['action'] ?>" method="POST" enctype="multipart/form-data">
            <h3>Upload</h3>
            <h4>Upload photo</h4>
            <label for="author">
                <?php if ($model['label'])
                echo 'autor' ?>
            </label>
            <input type="text" name="author" placeholder="<?php if (!$model['label'])
            echo 'autor' ?>" required>

            <label for="watermark">
                <?php if ($model['label'])
                echo 'znak wodny' ?>
            </label>
            <input type="text" name="watermark" placeholder="<?php if (!$model['label'])
            echo 'znak wodny' ?>" required>

            <label for="public-private">
                <?php if ($model['label'])
                echo 'publiczne' ?>
            </label>
            <input type="radio" name="public-private" value="<?php if (!$model['label'])
            echo 'publiczne' ?>" checked="checked" required>

            <label for="public-private">
                <?php if ($model['label'])
                echo 'prywatne' ?>
            </label>
            <input type="radio" name="public-private" value="<?php if (!$model['label'])
            echo 'prywatne' ?>" required>

            <label for="file">
                <?php if ($model['label'])
                echo 'file' ?>
            </label>
            <input type="file" name="file" placeholder="<?php if (!$model['label'])
            echo 'file' ?>" required>


            <button name="upload" type="submit">submit</button>
        </form>
        <?= $model['log']?>
    </div>
    <?php include "includes/footer.inc.php"; ?>
</body>

</html>