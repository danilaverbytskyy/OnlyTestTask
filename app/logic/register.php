<?php

use App\Exceptions\AlreadyLoggedInException;
use App\Exceptions\InvalidSymbolsException;
use App\models\Auth;
use App\models\QueryBuilder;

session_start();

if (isset($_SESSION['user'])) {
    header('Location: /main');
}

if($_POST['password'] !== $_POST['password2']) {
    $_SESSION['message']['warning'] = 'Пароли не совпадают!';
    header('Location:' . '/');
}

$queryBuilder = new QueryBuilder();
$auth = new Auth($queryBuilder);
$userData = $_POST;
unset($userData['password2']);
try {
    $auth->register('users', $userData);
    $_SESSION['message']['success'] = 'Вы успешно зарегистрировались.';
    header('Location:' . '/log-in');
} catch (InvalidSymbolsException $e) {
    $_SESSION['message']['warning'] = 'Вы ввели неккоректные символы.';
    header('Location:' . '/');
} catch (AlreadyLoggedInException $e) {
    $_SESSION['message']['warning'] = 'Такой пользователь уже существует';
    header('Location:' . '/');
}

?>