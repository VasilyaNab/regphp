<?php require_once 'templates/header.php' ?>

    <main>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>age</th>
                <th>gender</th>
                <th>Login</th>
                <th>email</th>

            </tr>
            <?php
                $data = query('SELECT * FROM `user`'); // возрващает массив с пользователями

                // проходимся по каждому элементу в массиве
                foreach ($data as $user) {
                    $id = $user['id_user'];
                    $login = $user['login'];
                    $age = $user['age'];
                    $gender = $user['gender'];
                    $email = $user['email'];
                    $password = $user['password'];
                    

                    // выводим строку
                    echo "
                        <tr>
                            <td>$id</td>
                            <td>$login</td>
                            <td>$age</td>
                            <td>$gender</td>
                            <td>$email</td>
                            <td>$password</td>
                            

                        </tr>
                    ";
                }
            ?>
        </table>
    </main>

<?php require_once 'templates/footer.php' ?>