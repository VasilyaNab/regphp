<?php
    require_once 'templates/header.php';

    // если пользователь не авторизован, т.е. сессия не заполнена данными, то перенаправляем на страницу авторизации
    if (!isset($_SESSION['id_user'])) {
        header("Location: /login.php");
    }
?>

    <main>
        <div>Ваш ID: <?= $_SESSION['id_user'] ?></div>
        <div>Ваше имя: <?= $_SESSION['name'] ?></div>
        <div>Ваш возраст: <?= $_SESSION['age'] ?></div>
        <div>Ваш пол: <?= $_SESSION['gender'] ?></div>
        <div>Ваш логин: <?= $_SESSION['login'] ?></div>
        <div>Ваша почта: <?= $_SESSION['email'] ?></div>
        

    </main>

<?php require_once 'templates/footer.php' ?>