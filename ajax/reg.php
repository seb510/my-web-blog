<?php

$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

$error = "";
if(strlen($username) <= 3) 
    $error = "Введите имя";
else if (strlen($email) <= 3)
    $error = "Введите email";
else if(strlen($login) <= 3) 
    $error = "Введите логин";
else if (strlen($pass) <= 3)
    $error = "Введите пароль";

if($error != '') {
    echo $error;
    die();
}

//$pass = password_hash($pass, PASSWORD_DEFAULT); 

$hash = "sdfjalsfjalsjf";
$pass = md5($pass . $hash);

//Подключения к базе данных
require_once '../mysql_connect.php';

$sql = 'INSERT INTO users(name, email, login, password) VALUES(?, ?, ?, ?)';
$qwery = $pdo->prepare($sql);
$qwery->execute([$username, $email, $login, $pass]);

echo 'Готово';

?>