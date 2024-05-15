<?php require_once 'templates/header.php' ?>

    <main>
        <form action="/vendor/auth.php" method="post">
            <input type="email" placeholder="Почта" name="email" required>
            <input type="password" placeholder="Пароль" name="password" required>
            <input type="submit" value="Войти">
        </form>

        <div>
            <?php
                // если в сессии есть данные по ключем msg, то выводим и потом удаляем сразу
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
        </div>
    </main>

<?php require_once 'templates/footer.php' ?>