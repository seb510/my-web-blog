<?php

$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

$error = "";

if(strlen($login) <= 3) 
    $error = "Введите логин";
else if (strlen($pass) <= 3)
    $error = "Введите пароль";

if($error != '') {
    echo $error;
    die();
}


$hash = "sdfjalsfjalsjf";
$pass = md5($pass . $hash);

//Подключения к базе данных
require_once '../mysql_connect.php';

$sql = 'SELECT `id` FROM `users` WHERE `login` = :login && `password` = :pass';
$query = $pdo->prepare($sql);
$query->execute(['login' => $login, 'pass' => $pass]);

$user = $query->fetch(PDO::FETCH_OBJ);
if($user->id == 0) {
    echo 'Такого пользователя не существует';
} else {
    setcookie('login', $login, time() + 3600 * 24 * 30, "/");
    echo 'Готово';
}

?>