<?php

use App\Exceptions\NotFoundDataException;
use App\models\Auth;
use App\models\QueryBuilder;

session_start();

if (isset($_SESSION['user']) === false) {
    header('Location: /');
}
?>

<!DOCKTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ваш Профиль</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container row">
        <a href="/logout">Выйти</a>
        <h2>Ваш профиль</h2>
        <?php
            if (isset($_SESSION['message']['warning'])) {
                echo '<div class="alert alert-warning" role="alert"> ' . $_SESSION['message']['warning'] . ' </div>';
            }
            if (isset($_SESSION['message']['success'])) {
                echo '<div class="alert alert-success" role="alert"> ' . $_SESSION['message']['success'] . ' </div>';
            }
            unset($_SESSION['message']);
        ?>
        <?php if(isset($_SESSION['user'])):?>
            <form action="/edit-profile" method="post">
                <div class="form-group">
                    <label>
                        Имя: <input type="text" required name="name" class="form-control" value="<?= $_SESSION['user']['name'];?>">
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        Телефон: <input type="text" required name="phone" class="form-control" value="<?= $_SESSION['user']['phone'];?>">
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        Почта: <input type="email" required name="email" class="form-control" value="<?= $_SESSION['user']['email'];?>">
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        Здесь вы можете поменять пароль, если необходимо:
                        <input type="text" name="password" class="form-control" value="">
                    </label>
                </div>

                <div class="form-group mt-1">
                    <button class="btn btn-warning" type="submit">Изменить профиль</button>
                </div>
            </form>
        <?php endif;?>
    </div>
</body>
</html>
