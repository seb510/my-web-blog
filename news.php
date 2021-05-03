<!DOCTYPE html>
<html lang="ru">

<head>

    <?php
    require_once 'mysql_connect.php';

    $slq = 'SELECT * FROM `articles` WHERE `id` = :id';
    $id = $_GET['id'];
    $query = $pdo->prepare($slq);
    $query->execute(['id' => $id]);

    $article = $query->fetch(PDO::FETCH_OBJ);

    $website_title = $article->title;
    require_once 'blocks/head.php';
    ?>
</head>

<body class='body'>
    <?php require_once 'blocks/header.php' ?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="jumbotron">
                    <h1>
                        <?= $article->title ?>
                    </h1>
                    <p><b>Автор статьи: </b><mark><?= $article->author ?></mark></p>
                    <?php
                    $date = date('d ', $article->date);
                    $array = [
                        'Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'
                    ];

                    $date .= $array[date('n ', $article->date) - 1];
                    $date .= date(" H:i", $article->date);
                    ?>
                    <p><b>Время публикации: </b><u><?= $date ?></u></p>
                    <p>
                        <?= $article->intro ?>
                    </p>
                    <p>
                        <?= $article->text ?>
                    </p>
                </div>
                <h3 class='mt-5'>Коментарий</h3>
                <form class='add-comments' action="news.php?id=<?= $_GET['id'] ?>" method="post">
                    <label for="username">Ваше имя</label> 
                    <input type="text" name="username" id="username" value="<?= $_COOKIE['login']?>" class="form-control" require>
                    <label for="mess">Сообщения</label>
                    <textarea class="form-control" name="mess" id="mess"></textarea require>
                    <div class="alert alert-danger mt-2" id="error__block"></div>
                    <button class="btn btn-success mt-3 mb-5" id="comment_send" type="submit">
                        Добавить коментарий
                    </button>
                </form>
                <?php
                    if ($_POST['username'] != "" &&  $_POST['mess'] != "") {
                        $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
                        $mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));

                        $sql = 'INSERT INTO comments(name, mess, article_id) VALUES(?, ?, ?)';
                        $query = $pdo->prepare($sql);
                        $query->execute([$username, $mess, $_GET['id']]);
                    }

                    $sql = 'SELECT * FROM `comments` WHERE `article_id` = :id ORDER BY `id` DESC';
                    $query = $pdo->prepare($sql);
                    $query->execute(['id'=> $_GET['id']]);
                    $comments = $query->fetchAll(PDO::FETCH_OBJ);

                    foreach($comments as $comment) {
                        echo "
                            <div class='alert alert-info mb-2'>
                                <h4>$comment->name</h4>
                                <p>$comment->mess</p>
                            </div>
                        ";
                    }

                ?>
            </div>
            <?php require_once 'blocks/aside.php' ?>
        </div>
    </main>

    <?php require_once 'blocks/footer.php' ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/function.js"></script>
    <script>
        $('#comment_send').attr('disabled','disabled');
        $('#username, #mess').change(function(){
            if($(this).val != ''){
                $('#comment_send').removeAttr('disabled');
            }
        });

    </script>
</body>

</html>