<?php 
    if($_COOKIE['login'] == '') {
        header('location: /reg.php');
        die();
    }
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <?php 
        $website_title = 'Добавления статьи';
        require_once 'blocks/head.php';
    ?>   
</head>

<body class='body'>
    
    <?php require_once 'blocks/header.php' ?>

    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-3">
                <h4>Добавления статьи</h4>
                <form action="" method="post">
                        <label for="title">Заголовок статьи</label>
                        <input type="text" name="title" id="title" class="form-control">
                        <label for="intro">Описание статьи</label>
                        <textarea class="form-control" name="intro" id="intro"></textarea>
                        <label for="title">Текст статьи</label>
                        <textarea class="form-control" name="text" id="text"></textarea>
                        <div class="alert alert-danger mt-2" id="error__block">

                        </div>
                        <button class="btn btn-success mt-3" id="add-article" type="button">Добаить</button>
                </form>
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