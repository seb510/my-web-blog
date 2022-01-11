<?php

    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $message = trim(filter_var($_POST['message'], FILTER_SANITIZE_STRING));

    $error = '';

    if (strlen($username) <= 3)
        $error = "Введите имя";
    elseif (strlen($email) <= 3)
        $error = "Введите email";
    elseif (strlen($message) <= 3)
        $error = "Введите само сообщения";

    if ($error != ''){
        echo $error;
        exit();
    }

    $my_email = 'sebi@gmail.com';
    $subject = "Новое сообщения с сайта";
   /* $headers = "From: $email\r\Reply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";*/

    $headers  = "Content-type: text/html; charset=windows-1251 \r\n";
    $headers .= "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    mail($my_email, $subject, $message, $headers);

    echo 'success';

