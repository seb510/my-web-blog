<!DOCTYPE html>
<html lang="ru">

<head>
    <?php 
        $website_title = 'Авторизация на сайте';
        require_once 'blocks/head.php';
    ?>   
</head>

<body class="body">
    
    <?php require_once 'blocks/header.php' ?>
    
    <div class="main">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 mb-3">
                <?php
                    if($_COOKIE['login'] == "") :
                ?>
                <h4>Форма Авторизации</h4>
                <form action="" method="post">
                        <label for="login">Логин</label>
                        <input type="text" name="login" id="login" class="form-control">
                        <label for="password">Пароль</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <div class="alert alert-danger mt-2" id="error__block">

                        </div>
                        <button class="btn btn-success mt-3" id="auth_user" type="button">Войти</button>
                </form>
                <?php
                    else:
                ?>
                <div class='author__block'>
                    <h2><?= $_COOKIE['login'] ?></h2>
                    <button class="btn btn-danger" id="exit-btn">Выйти</button>
                </div>
                <div class='author__coment d-flex'>
                    <div class="author__article">
                    <h2>Мои статьи</h2>
                    </div>

                   <div class="author__comments">
                   <h2>Мои коменты</h2>
                   </div>

                </div>
                <?php
                    endif;
                ?>
                </div>
                <?php require_once 'blocks/aside.php' ?>
            </div>
        </div>
    </div>
   
    <?php require_once 'blocks/footer.php' ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/function.js"></script>
</body>

</html>