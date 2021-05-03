$(document).ready(function() {

    //Работа с бургер меню
    $('.menu__btn').on('click', function() {
        $('.header__info ').toggleClass('active');
        console.log('click');
    });

    let clearForm = function() {
        $('#username').val(""),
            $('#email').val(""),
            $('#login').val(""),
            $('#password').val("");
        $('#title').val(""),
            $('#intro').val(""),
            $('#text').val("");
        $('#mess').val("");
    }

    //Отправка на регистрацию пользователя
    $('#reg_user').on('click', function(e) {
        e.preventDefault();
        let name = $('#username').val(),
            email = $('#email').val(),
            login = $('#login').val(),
            password = $('#password').val();

        $.ajax({
            url: 'ajax/reg.php',
            type: 'POST',
            cache: false,
            data: {
                'username': name,
                'email': email,
                'login': login,
                'password': password
            },
            dataType: 'html',
            success: function(data) {
                if (data == 'Готово') {
                    $('#reg_user').html('Все готово');
                    $('#error__block').hide(200);
                    clearForm();
                } else {
                    $('#error__block').fadeIn(200).text(data);
                }
            }
        });

    });

    //Отправака на проверку пользвателя(Авторизация)
    $('#auth_user').on('click', function() {
        let login = $('#login').val(),
            password = $('#password').val();
        $.ajax({
            url: 'ajax/auth.php',
            type: 'POST',
            cache: false,
            data: {
                'login': login,
                'password': password
            },
            dataType: 'html',
            success: function(data) {
                if (data == 'Готово') {
                    $('#auth_user').html('Все готово');
                    $('#error__block').hide(200);
                    document.location.reload(true);
                } else {
                    $('#error__block').fadeIn(200).text(data);
                }
            }
        });

    });


    //Выход с кабинета пользователя
    $('#exit-btn').on('click', function() {
        $.ajax({
            url: 'ajax/exit.php',
            type: 'POST',
            cache: false,
            data: {},
            dataType: 'html',
            success: function(data) {
                document.location.reload(true);
            }
        })
    });

    //Отправка обратной связи 
    $('#mess_send').on('click', function(e) {
        e.preventDefault();
        let name = $('#username').val(),
            email = $('#email').val(),
            mess = $('#mess').val();
        $.ajax({
            url: 'ajax/mail.php',
            type: 'POST',
            cache: false,
            data: {
                'username': name,
                'email': email,
                'mess': mess
            },
            dataType: 'html',
            success: function(data) {
                if (data == 'Готово') {
                    $('#mess_send').html('Все готово');
                    $('#error__block').hide(200);
                    clearForm();
                } else {
                    $('#error__block').fadeIn(200).text(data);
                }
            }
        });

    });

    //Добавления статьи
    $('#add-article').on('click', function(e) {
        e.preventDefault();
        let title = $('#title').val(),
            intro = $('#intro').val(),
            text = $('#text').val();

        $.ajax({
            url: 'ajax/add_article.php',
            type: 'POST',
            cache: false,
            data: {
                'title': title,
                'intro': intro,
                'text': text
            },
            dataType: 'html',
            success: function(data) {
                if (data == 'Готово') {
                    $('#add-article').html('Все готово');
                    $('#error__block').hide(200);
                    clearForm();

                } else {
                    $('#error__block').fadeIn(200).text(data);
                }
            }
        })
    });

})