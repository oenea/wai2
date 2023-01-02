<!DOCTYPE html>
<html>

<head>
    <title>Wrzucanie plików</title>
    <?php include "includes/head.inc.php"; ?>
</head>

<body>
    <?php dispatch($routing, '/menu') ?>

    <div class="container">
        <form class="form" action="<?= $model['action'] ?>" method="POST" enctype="multipart/form-data">
            <h3>Upload</h3>
            <h4>Upload photo</h4>
            <label class="form-label" for="author">
                <?php if ($model['label'])
                echo 'autor' ?>
            </label>
            <input class="form-input" type="text" name="author" value="<?= $login ?>" placeholder="<?php if (!$model['label'])
            echo 'autor' ?>" required>

            <label class="form-label" for="watermark">
                <?php if ($model['label'])
                echo 'znak wodny' ?>
            </label>
            <input class="form-input" type="text" name="watermark" placeholder="<?php if (!$model['label'])
            echo 'znak wodny' ?>" required>

<?php if ($login) { ?>
            <label class="form-label" for="public-private">
                <?php if ($model['label'])
                echo 'publiczne' ?>
            </label>
            <input class="form-input" type="radio" name="public-private" value="publiczne" checked="checked" required>

            <label class="form-label" for="public-private">
                <?php if ($model['label'])
                echo 'prywatne' ?>
            </label>
            <input class="form-input" type="radio" name="public-private" value="prywatne" required>
<?php } ?>
            <label class="form-label" for="file">
                <?php if ($model['label'])
                echo 'file' ?>
            </label>
            <input class="form-input" type="file" name="file" placeholder="<?php if (!$model['label'])
            echo 'file' ?>" required>

            <button class="form-button" name="upload" type="submit">submit</button>
        </form>
        <?= $model['log'] ?>
    </div>
    <?php include "includes/footer.inc.php"; ?>
</body>

</html>