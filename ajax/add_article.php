<?php

$title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
$intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
$text = trim(filter_var($_POST['text']));

$error = "";
if(strlen($title) <= 3) 
    $error = "Введите название статьи";
else if (strlen($intro) <= 15)
    $error = "Введите данные для статьи";
else if(strlen($text) <= 20) 
    $error = "Введите текст стать";

if($error != '') {
    echo $error;
    die();
}


//Подключения к базе данных
require_once '../mysql_connect.php';

$sql = 'INSERT INTO `articles`(title, intro, text, date, author) VALUES(?, ?, ?, ?, ?)';
$qwery = $pdo->prepare($sql);
$qwery->execute([$title, $intro, $text, time(), $_COOKIE['login']]);

echo 'Готово';

?>