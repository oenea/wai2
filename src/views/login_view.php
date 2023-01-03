<!DOCTYPE html>
<html>

<head>
    <title>Logowanie</title>
    <?php include "includes/head.inc.php"; ?>
</head>

<body>
    <?php dispatch($routing, '/menu') ?>

    <br><br><br>
    <div class="container">
        <form action="<?= $model['action'] ?>" method="POST">
            <h3>Login</h3>
            <h4>Log in if you want</h4>

            <label for="username">
                <?php if ($model['label'])
                echo 'username' ?>
            </label>
            <input type="text" name="username" placeholder="<?php if (!$model['label'])
            echo 'username' ?>" required>

            <br><br>

            <label for="password">
                <?php if ($model['label'])
                echo 'password' ?>
            </label>
            <input type="password" name="password" placeholder="<?php if (!$model['label'])
            echo 'password' ?>" required>

            <br><br>
            <button name="login" type="submit">submit</button>
        </form>
        <?= $model['log'] ?>
    </div>
    <?php include "includes/footer.inc.php"; ?>
</body>

</html>