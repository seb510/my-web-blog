<?php

$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));

$error = "";
if(strlen($username) <= 3) 
    $error = "Введите имя";
else if (strlen($email) <= 3)
    $error = "Введите email";
else if(strlen($mess) <= 3) 
    $error = "Введите Сообщение"; 

if($error != '') {
    echo $error;
    die();
}

$my_email = 'test@mail.com';
$subject = "=?utf-8?B?". base64_encode("Новое сообщения с сайта"). "?=";
$headers= "From: $email\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";

mail($to, $subject, $mess, $headers);

echo 'Готово';
?>