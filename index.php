<!DOCTYPE html>
<html lang="ru">

<head>
    
    <?php 
        $website_title = 'PHP Блог';
        require_once 'blocks/head.php';
    ?>  
</head>

<body class='body'>
    
    <?php require_once 'blocks/header.php' ?>

    <main class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <?php 
                        require_once 'mysql_connect.php';

                        $slq = 'SELECT * FROM `articles` ORDER BY `date` DESC';
                        $query = $pdo->query($slq);
                        while($row = $query->fetch(PDO::FETCH_OBJ)) {
                            echo "<h2>$row->title</h2>
                            <p>$row->intro</p>
                            <p><b>Автор статьи: </b><mark>$row->author</mark></p>
                            <a class='btn btn-warning mb-5' href='news.php?id=$row->id' title='$row->title'>
                            Прочитать больше
                            </a>";
                        }
                    ?>
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