<!DOCTYPE html>
<html>

<head>
    <?php include "includes/head.inc.php"; ?>
</head>

<body>
    <?php dispatch($routing, '/menu') ?>

    <div class="container">
        <form action="<?= $model['action'] ?>" method="POST">
            <h3>Register</h3>
            <h4>Register for more features</h4>

            <label for="username">
                <?php if ($model['label'])
                echo 'username' ?>
            </label>
            <input type="text" name="username" placeholder="<?php if (!$model['label'])
            echo 'username' ?>" required>

            <label for="email">
                <?php if ($model['label'])
                echo 'email' ?>
            </label>
            <input type="email" name="email" placeholder="<?php if (!$model['label'])
            echo 'email' ?>" required>

            <label for="password">
                <?php if ($model['label'])
                echo 'Your password' ?>
            </label>
            <input type="password" name="password" placeholder="<?php if (!$model['label'])
            echo 'email' ?>" required>

            <button name="register" type="submit">submit</button>
        </form>
    </div>
    <?php include "includes/footer.inc.php"; ?>
</body>

</html>