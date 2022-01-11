
<?php
    $website_title = "Контакты";
    require_once 'template/header.php';

?>
    <main class="main mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <h3>Обратная связь</h3>
                    <form action="" method="post">
                        <label for="username">Ваше имя</label>
                        <input type="text" name="username" id="username" class="name form-control mb-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="email form-control mb-2">
                        <label for="message">Сообщения</label>
                        <textarea name="message" id="message" class="message mess form-control mb-2"></textarea>

                        <div class="error-block alert alert-danger mt-2 mb-2"></div>
                        <button type="button" id="contact_send" class="btn btn-success mt-5">Отправить сообщения</button>
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

