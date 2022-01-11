<?php
$website_title = "Авторизация на странице";
require_once 'template/header.php';

?>

<main class="main mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-3">
                <?php
                if($_COOKIE['login'] == ''):
                ?>
                <h3>Форма авторизации</h3>
                <form action="" method="post">
                    <label for="login">Логин</label>
                    <input type="text" name="login" id="login" class="login form-control mb-2">
                    <label for="username">Пароль</label>
                    <input type="password" name="pass" id="pass" class="pass form-control mb-2">

                    <div class="error-block alert alert-danger mt-2 mb-2"></div>
                    <button type="button" id="auth_user" class="btn btn-success mt-5">Войти</button>
                </form>
                <?php else: ?>
                    <h2><?php echo $_COOKIE['login']?></h2>
                    <button type="button" id="exit-btn" class="btn btn-danger mt-5">Выйти</button>
                <?php endif; ?>
            </div>
            <?php require_once 'template/aside.php'; ?>
        </div>
    </div>
    <div class="load-ajax">
        <div class="bubblingG">
            <span id="bubblingG_1">
            </span>
            <span id="bubblingG_2">
            </span>
            <span id="bubblingG_3">
            </span>
        </div>
    </div>
</main>

<?php require_once 'template/footer.php'; ?>
