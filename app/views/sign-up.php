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
    <title>Регистрация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<br>
<form class="mx-5" action="/register" method="POST">
    <h2 class="display-4 pt-5">Регистрация</h2>
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
        <label for="exampleInputEmail1" class="form-label">Введите имя</label>
        <input required type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Введите телефон</label>
        <input required type="text" class="form-control" name="phone" id="phone" aria-describedby="phoneHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Введите почту</label>
        <input required type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Мы не будем делится ваший почтой ни с кем.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Введите пароль</label>
        <input required type="password" class="form-control" name="password" id="password">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Введите пароль еще раз</label>
        <input required type="password" class="form-control" name="password2" id="password2">
    </div>
    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    <p>Уже зарегистрированы? <a href="/log-in">Войдите</a></p>
</form>
</body>
</html>