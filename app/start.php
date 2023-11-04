<?php

$url = $_SERVER['REQUEST_URI'];
if ($url === '/') {
    require 'views/sign-up.php';
}
else if ($url === '/main') {
    require 'views/main.php';
}
else if ($url === '/log-in') {
    require 'views/log-in.php';
}
else if ($url === '/register') {
    require 'logic/register.php';
}
else if ($url === '/enter') {
    require 'logic/enter.php';
}
else if ($url === '/logout') {
    require 'logic/logout.php';
}
else if ($url === '/edit-profile') {
    require 'logic/edit-profile.php';
}
else {
    echo 'Error 404';
}
exit;