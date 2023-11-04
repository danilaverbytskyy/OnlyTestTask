<?php

session_start();

if (isset($_SESSION['user'])) {
    header('Location: /main');
}

unset($_SESSION['user']);
header('Location:' . '/');