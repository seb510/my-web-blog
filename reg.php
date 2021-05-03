<!DOCTYPE html>
<html lang="ru">

<head>
    <?php 
        $website_title = 'PHP Регистрация';
        require_once 'blocks/head.php';
    ?>   
</head>

<body class='body'>
    
    <?php require_once 'blocks/header.php' ?>

    <main class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-3">
                <h4>Форма Регистрация</h4>
                <form action="" method="post">
                        <label for="username">Ваше имя</label>
                        <input type="text" name="username" id="username" class="form-control">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                        <label for="login">Логин</label>
                        <input type="text" name="login" id="login" class="form-control">
                        <label for="password">Пароль</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <div class="alert alert-danger mt-2" id="error__block">

                        </div>
                        <button class="btn btn-success mt-3" id="reg_user" type="button">Зарегистрироватся</button>
                </form>
                </div>
                <?php require_once 'blocks/aside.php' ?>
            </div>
        </div>
    </main>
   
    <?php require_once 'blocks/footer.php' ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/function.js"></script>
</body>

</html>