<?php

use App\Exceptions\AlreadyLoggedInException;
use App\Exceptions\InvalidSymbolsException;
use App\models\Auth;
use App\models\QueryBuilder;

session_start();

if (isset($_SESSION['user'])) {
    header('Location: /main');
}

$queryBuilder = new QueryBuilder();
$auth = new Auth($queryBuilder);
$userData = $_POST;
if(str_contains($userData['phoneOrEmail'], '@')) {
    $userData['email'] = $userData['phoneOrEmail'];
}
else {
    $userData['phone'] = $userData['phoneOrEmail'];
}
unset($userData['phoneOrEmail']);
try {
    $auth->login('users', $userData);
    $_SESSION['message']['success'] = 'Вы успешно вошли.';
    $userData['password'] = sha1($userData['password']);
    $_SESSION['user'] = $queryBuilder->getOne('users', $userData);
    unset($_SESSION['user']['password']);
    header('Location:' . '/main');
}
catch (InvalidSymbolsException $e) {
    $_SESSION['message']['warning'] = 'Вы ввели недопустимые символы!';
    header('Location:' . '/log-in');
}
catch (\App\Exceptions\NotFoundDataException $e) {
    $_SESSION['message']['warning'] = 'Такого пользователя не существует';
    header('Location:' . '/log-in');
}
catch (\App\Exceptions\WrongPasswordException $e) {
    $_SESSION['message']['warning'] = 'Вы ввели неверный пароль';
    header('Location:' . '/log-in');
}
?>