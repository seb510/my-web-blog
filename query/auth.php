<?php
    require_once '../mysql_connect.php';

    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

    $error = '';

    if (strlen($login) <= 3)
        $error = "Введите логин";
    elseif (strlen($pass) <= 3)
        $error = "Введите пароль";

    if ($error != ''){
        echo $error;
        exit();
    } else {
        $hash = "sdlajalfSDKajlasjfiejfa";
        $pass = md5($pass . $hash);

        $sql = 'SELECT `id` FROM `users` WHERE `login` = ? && `pass` = ?';
        $query = $pdo->prepare($sql);
        $query->execute([$login,$pass]);

        $user = $query->fetch(PDO::FETCH_OBJ);

        if ($user->id == 0) {
            echo 'Такого пользователя не существует ';
        } else {
            setcookie('login', $login, time() +3600 * 24, '/');
            echo "success";
        }
    }