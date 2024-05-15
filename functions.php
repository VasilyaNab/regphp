<?php
    // подключение к базе
    function connect(){
        $driver = 'mysql';
        $host = 'localhost';
        $db_name = 'bazaa';
        $db_user = 'root';
        $db_password = '';
        $charset = 'utf8mb4';

        try{
            return new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_password);
        }catch(PDOException $e){
            die('Нет подключения к базе данных. Ошибка - ' . $e->getMessage());
        }
    }

    //функция для запросов поиска (SELECT)
    function query($sql, $params = []){
        $sth = connect();
        $sth = $sth->prepare($sql); //Подготавливает запрос к выполнению и возвращает связанный с этим запросом объект
        $sth->execute($params); //Запускает подготовленный запрос на выполнение
        $result = $sth->fetchAll(PDO::FETCH_ASSOC); //Возвращает массив, содержащий все строки результирующего набора

        if (!$result) return [];
        return $result;
    }

    //метод для добавления, удаления, изменения данных, если успешно то возвратит 1
    //INSERT, UPDATE, DELETE
    function make($sql, $params = []){
        $sth = connect();
        $sth = $sth->prepare($sql); //Подготавливает запрос к выполнению и возвращает связанный с этим запросом объект
        return $sth->execute($params); //Запускает подготовленный запрос на выполнение
    }

    // валидация полей с html-форм
    function validate($data) {
        $data = strip_tags($data); // убираем теги
        $data = trim($data); // убираем пробелы в начале и в конце
        $data = preg_replace('/\s+/', ' ', $data); // регулярное выражение, если больше 1 пробела то заменяется на 1 пробел
        $data = htmlspecialchars($data); // удаляются спец. символы
        return $data;
    }