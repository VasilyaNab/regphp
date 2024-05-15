<?php
    session_start(); // создали сессию, теперь мы можем записывать данные в $_SESSION
    require_once '../functions.php';

    // получаем данные с формы
    $name = $_POST['name'];
    $login = $_POST['login'];
    $age = $_POST['age']; 
    $gender = $_POST['gender']; 
    $email = $_POST['email'];
    $password = $_POST['password']; 


    // ищем пользователя по логину
    $checkUser = query("SELECT id_user FROM `user` WHERE login = ?", [$login]);
    $checkEmail = query("SELECT id_user FROM `user` WHERE email = ?", [$email]);


    // если есть пользователь с таким логином, то перенапрвляем на страницу с регистрацией
    if (count($checkUser) > 0) {
        $_SESSION['msg'] = 'Такой логин уже занят';
        header("Location: /register.php");
    } 
    else if(count($checkEmail)>0){
        $_SESSION['msg']='Такая почта уже существует';
        header("Location: /register.php");
    }
    else {
        // выполнили запрос на добавление записи и перенаправили на страницу авторизации
        make("INSERT INTO `user` (`name`,`age`,`gender`, `login`,`email`,`password`) VALUES (?,?,?,?,?,?)", [$name,$age,$gender,$login,$email,$password]);
        header("Location: /login.php");
    }

