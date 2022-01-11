<?php
    setcookie('login', $login, time() +3600 * 24, '/');
    unset($_COOKIE['login']);
    echo true;