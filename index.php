
<?php
    $website_title = "PHP блог";
    require_once 'template/header.php';
?>
    <main class="main mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <?php
                        require_once 'mysql_connect.php';
                        $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';
                        $query = $pdo->query($sql);
                        while ($row = $query->fetch(PDO::FETCH_OBJ)){
                            echo "<h2>$row->title</h2>
                                    <p>$row->intro</p>
                                    <p><b>Автор статьи: </b><mark> $row->author</mark></p>
                                    <a href='/news.php?id=$row->id' title='$row->title' class='btn btn-warning mb-5'>Прочитать больше</a>";
                        }
                    ?>
                </div>
                <?php require_once 'template/aside.php'; ?>
            </div>
        </div>
    </main>

<?php require_once 'template/footer.php'; ?>
