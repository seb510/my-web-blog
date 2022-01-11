<?php

    if ($_COOKIE['log' == ""]){
        header('Location: /reg.php');
        exit();
    }
    $website_title = "Добавленя статьи";
    require_once 'template/header.php';

?>
    <main class="main mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <h3>Добавления статьи</h3>
                    <form action="" method="post" enctype="multipart/form-data">
                        <label for="title">Заголовок статьи</label>
                        <input type="text" name="title" id="title" class="title form-control mb-2">
                        <label for="intro">Интро статьи</label>
                        <textarea name="intro" id="intro" class="intro form-control mb-2"></textarea>
                      <!--  <div class="input-group mb-3">
                            <input type="file" name="image" class="form-control mt-2" id="image">
                        </div>-->
                        <label for="text">Текст статьи</label>
                        <textarea name="text" id="text" class="text form-control mb-2"></textarea>
                        <div class="error-block alert alert-danger mt-2 mb-2"></div>
                        <button type="button" id="add-article" class="btn btn-success mt-5">Добавить</button>
                    </form>
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

