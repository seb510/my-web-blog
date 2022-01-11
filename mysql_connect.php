<?php
    $user = "root";
    $password = "root";
    $db = "blog";
    $host = "127.0.0.1";

    $dsn = "mysql:host=" . $host . ';dbname=' . $db;
    $pdo = new PDO($dsn, $user, $password);