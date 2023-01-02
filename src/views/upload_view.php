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
            <label for="username">
                <?php if ($model['label'])
                echo 'author' ?>
            </label>
            <input type="text" name="author" placeholder="<?php if (!$model['label'])
            echo 'username' ?>" required>

            <label for="watermark">
                <?php if ($model['label'])
                echo 'author' ?>
            </label>
            <input type="text" name="watermark" placeholder="<?php if (!$model['label'])
            echo 'watermark' ?>" required>

            <label for="public-private">
                <?php if ($model['label'])
                echo 'public' ?>
            </label>
            <input type="radio" name="public-private" value="<?php if (!$model['label'])
            echo 'public' ?>" checked="checked" required>

            <label for="public-private">
                <?php if ($model['label'])
                echo 'private' ?>
            </label>
            <input type="radio" name="public-private" value="<?php if (!$model['label'])
            echo 'private' ?>" required>

            <label for="file">
                <?php if ($model['label'])
                echo 'file' ?>
            </label>
            <input type="file" name="file" placeholder="<?php if (!$model['label'])
            echo 'file' ?>" required>


            <button name="upload" type="submit">submit</button>
        </form>
        </form>
    </div>
    <?php include "includes/footer.inc.php"; ?>
</body>

</html>