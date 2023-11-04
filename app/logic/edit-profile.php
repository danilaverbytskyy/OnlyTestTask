<?php

use App\Exceptions\NotFoundByIdException;
use App\models\Auth;
use App\models\QueryBuilder;

session_start();

if (isset($_SESSION['user']) === false) {
    header('Location: /');
}

$queryBuilder = new QueryBuilder();
$auth = new Auth($queryBuilder);

$newUserInformation = $_POST;
if (strlen($newUserInformation['password']) === 0) {
    unset($newUserInformation['password']);
}
else {
    $newUserInformation['password'] = sha1($newUserInformation['password']);
}
try {
    $queryBuilder->updateOneById('users', $_SESSION['user']['id'], $newUserInformation);
    $_SESSION['user'] = $queryBuilder->getOneById('users', $_SESSION['user']['id']);
    $_SESSION['message']['success'] = 'Профиль успешно обновлен';
}
catch (NotFoundByIdException $e) {
    $_SESSION['message']['warning'] = 'Профиль не обновлен';
}
finally {
    header('Location: ' . '/main');
}