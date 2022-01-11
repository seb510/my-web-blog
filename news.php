
<?php
    require_once 'mysql_connect.php';
    $article_id = $_GET['id'];
    $sql = 'SELECT * FROM `articles` WHERE `id` = :id';
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $article_id]);
    $article = $query->fetch(PDO::FETCH_OBJ);

    $date = date(' d ', $article->date);
    $months = [
        "Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября",
        "Октабря", "Ноября", "Декабря"
    ];
    $date .= $months[date('n', $article->date) - 1];
    $date .= date(' H:i', $article->date);
    $website_title = $article->title;
    require_once 'template/header.php';
?>
<main class="main mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-3">
                <div class="p-5 mb-4 bg-light rounded-3">
                    <p><b>Автор статьи: </b><mark> <?= $article->author; ?></mark></p>
                    <p><b>Время публикации: </b><mark> <?= $date; ?></mark></p>
                    <h1><?= $article->title; ?></h1>
                    <p><?= $article->intro; ?></p>
                    <p><?= $article->text; ?></p>
                </div>
                <div class="comments">
                    <h3 class="mt-5">Коментарий</h3>
                    <form action="/news.php?id=<?= $article_id; ?>" method="post">
                        <label for="username">Ваше имя</label>
                        <input type="text" name="username" value="<?= $_COOKIE['logo']; ?>" id="username" class="name form-control mb-2">
                        <label for="mess">Сообщение</label>
                        <textarea name="mess" id="mess" class="mess form-control mb-2"></textarea>

                        <button type="submit" id="comments-btn" class="btn btn-success mt-5 mb-5">Добавить коментарий</button>
                    </form>
                    <?php
                    if ($_POST['username'] != '' && $_POST['mess'] != ''){
                        $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
                        $mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));

                        $sql = 'INSERT INTO comments(name, mess, article_id) VALUES (?,?,?)';
                        $query = $pdo->prepare($sql);
                        $query->execute([$username, $mess, $article_id]);
                    }


                    $sql = "SELECT * FROM `comments` WHERE `article_id` = :id ORDER BY `id` DESC";
                    $query = $pdo->prepare($sql);
                    $query->execute(['id' => $article_id]);
                    $comments = $query->fetchAll(PDO::FETCH_OBJ);

                    foreach ($comments as $comment) {
                        echo "<div class='alert alert-info mb-2'>
                            <h4>$comment->name</h4>
                            <p>$comment->mess</p>
                        </div>";
                    }


                    ?>
                </div>
            </div>
            <?php require_once 'template/aside.php'; ?>
        </div>
    </div>
</main>

<?php require_once 'template/footer.php'; ?>
