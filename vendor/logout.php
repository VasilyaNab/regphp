<?php
    session_start();
    session_unset(); // очищаем сессию, т.е. $_SESSION
    header("Location: /login.php");
