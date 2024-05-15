<?php require_once 'templates/header.php' ?>

    <main>
        <form action="/vendor/createUser.php" method="post">
            <input type="text" placeholder="Имя" name="name" required>
            <input type="text" placeholder="Возраст" name="age" required>
            <label for="pet-select">Выберите свой пол:</label>
                <select name="gender" id="pet-select">
                    <option value="">-</option>
                    <option value="женский">женские</option>
                    <option value="мужской">мужской</option>
                </select>
            <input type="text" placeholder="Логин" name="login" required>
            <input type="email" placeholder="Почта" name="email" required>
            <input type="password" placeholder="Пароль" name="password" required>
            

            <input type="submit" value="Регистрация">
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