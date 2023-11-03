<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: /main');
}
?>

<!DOCKTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вход</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<br>
<form class="mx-5" action="/enter" method="POST">
    <h2 class="display-4 pt-5">Вход</h2>
    <?php
    if (isset($_SESSION['message']['warning'])) {
        echo '<div class="alert alert-warning" role="alert"> ' . $_SESSION['message']['warning'] . ' </div>';
    }
    if (isset($_SESSION['message']['success'])) {
        echo '<div class="alert alert-success" role="alert"> ' . $_SESSION['message']['success'] . ' </div>';
    }
    unset($_SESSION['message']);
    ?>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Введите телефон или email</label>
        <input required type="text" class="form-control" name="phoneOrEmail" id="phoneOrEmail" aria-describedby="phoneHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Введите пароль</label>
        <input required type="password" class="form-control" name="password" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
</form>

</body>
</html>