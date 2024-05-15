<?php
    session_start(); // создали сессию, теперь мы можем записывать данные в $_SESSION
    require_once '../functions.php';

    // получаем данные с формы
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $age = $_POST['gender'];


    

    // ищем пользователя по логину и паролю
    $user = query("SELECT id_user, name, age, login, email FROM `user` WHERE email = ? and password = ?", [$email, $password]);

    // если есть пользователь нашелся, то перенапрвляем на страницу с личным кабинетом и записываем данные в сессию
    if (count($user) > 0) {
        $info = $user[0];
        $_SESSION['id_user'] = $info['id_user'];
        $_SESSION['name'] = $info['name'];
        $_SESSION['age'] = $info['age'];
        $_SESSION['gender'] = $info['gender'];
        $_SESSION['login'] = $info['login'];
        $_SESSION['email'] = $info['email'];

        header("Location: /lk.php");
    } else {
        // если не нашли пользователи перенаправляем на страницу с авторизацией и передаем сообщение через сессию
        $_SESSION['msg'] = 'Логин или пароль неверный';
        header("Location: /login.php");
    }
