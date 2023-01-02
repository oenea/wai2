<!DOCTYPE html>
<html>

<head>
    <title>Rejestracja</title>
    <?php include "includes/head.inc.php"; ?>
</head>

<body>
    <?php dispatch($routing, '/menu') ?>

    <div class="container">
        <form class="form" action="<?= $model['action'] ?>" method="POST">
            <h3>Register</h3>
            <h4>Register for more features</h4>

            <label class="form-label" for="name">
                <?php if ($model['label'])
                echo 'login' ?>
            </label>
            <input class="form-input" type="text" name="name" placeholder="<?php if (!$model['label'])
            echo 'login' ?>" required>

            <label class="form-label" for="email">
                <?php if ($model['label'])
                echo 'adres e-mail' ?>
            </label>
            <input class="form-input" type="email" name="email" placeholder="<?php if (!$model['label'])
            echo 'adres e-mail' ?>" required>

            <label class="form-label" for="password">
                <?php if ($model['label'])
                echo 'hasło' ?>
            </label>
            <input class="form-input" type="password" name="password" placeholder="<?php if (!$model['label'])
            echo 'hasło' ?>" required>

            <label class="form-label" for="password-repeat">
                <?php if ($model['label'])
                echo 'powtórz hasło' ?>
            </label>
            <input class="form-input" type="password" name="password-repeat" placeholder="<?php if (!$model['label'])
            echo 'powtórz hasło' ?>" required>

            <button class="form-button" name="register" type="submit">submit</button>
        </form>
        <?= $model['log'] ?>
    </div>
    <?php include "includes/footer.inc.php"; ?>
</body>

</html>