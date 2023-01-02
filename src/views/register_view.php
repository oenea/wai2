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
                echo 'login' ?>
            </label>
            <input type="text" name="username" placeholder="<?php if (!$model['label'])
            echo 'login' ?>" required>

            <label for="email">
                <?php if ($model['label'])
                echo 'adres e-mail' ?>
            </label>
            <input type="email" name="email" placeholder="<?php if (!$model['label'])
            echo 'adres e-mail' ?>" required>

            <label for="password">
                <?php if ($model['label'])
                echo 'hasło' ?>
            </label>
            <input type="password" name="password" placeholder="<?php if (!$model['label'])
            echo 'hasło' ?>" required>

            <label for="password-repeat">
                <?php if ($model['label'])
                echo 'powtórz hasło' ?>
            </label>
            <input type="password" name="password-repeat" placeholder="<?php if (!$model['label'])
            echo 'powtórz hasło' ?>" required>

            <button name="register" type="submit">submit</button>
        </form>
        <?= $model['log']?>
    </div>
    <?php include "includes/footer.inc.php"; ?>
</body>

</html>