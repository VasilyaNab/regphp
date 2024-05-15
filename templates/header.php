<?php
    session_start();
    require_once 'functions.php'
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<header>
    <a href="/">Главная</a>
    <?php if (isset($_SESSION['id_user'])) {?>
        <a href="/lk.php">ЛК</a>
        <a href="/vendor/logout.php">Выход</a>
    <?php } else {?>
        <a href="/login.php">Авторизация</a>
        <a href="/register.php">Регистрация</a>
    <?php }?>
</header>