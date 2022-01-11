$(document).ready(function (){

    const clearForm = () => {
        $('.name').val('');
        $('.email').val('');
        $('.login').val('');
        $('.pass').val('');
        $('.title').val('');
        $('.intro').val('');
        $('.text').val('');
        $('.message').val('');

    }
    // Registration Users
    $(document).on('click', '#reg_user', function (){
        let name = $('#username').val();
        let email = $('#email').val();
        let login = $('#login').val();
        let pass = $('#pass').val();
        $.ajax({
            url: '/query/reg.php',
            type: 'POST',
            cache: false,
            data: {
                'username' : name,
                'email' : email,
                'login' : login,
                'pass' : pass,
            },
            dataType: 'html',
            beforeSend: function (){
                $('.load-ajax').addClass('show');
            },
            success: function (data) {
                $('.load-ajax').removeClass('show');
                if (data == "success"){
                    console.log('success');
                    clearForm();
                    $('.error-block').fadeOut(500);
                } else {
                    $('.load-ajax').removeClass('show');
                    $('.error-block').fadeIn(500).text(data);
                }
            }
        })
    });

    //Authorization

    $(document).on('click', '#auth_user', function (){
        let login = $('#login').val();
        let pass = $('#pass').val();
        $.ajax({
            url: '/query/auth.php',
            type: 'POST',
            cache: false,
            data: {
                'login' : login,
                'pass' : pass,
            },
            dataType: 'html',
            beforeSend: function (){

            },
            success: function (data) {

                if (data == "success"){
                    console.log('success');
                    clearForm();
                    $('.error-block').fadeOut(500);
                    document.location.reload(true);
                } else {
                    console.log(data);
                    $('.error-block').fadeIn(500).text(data);
                }
            }
        })
    });

    //Exit from Account
    $(document).on('click', '#exit-btn', function (){
        $.ajax({
            url: '/query/exit.php',
            type: 'POST',
            cache: false,
            data: {},
            dataType: 'html',
            success: function (data) {
                document.location.reload(true);
            }
        })
    });

    //Add Article

    $(document).on('click', '#add-article', function (){
        let title = $('#title').val();
        let intro = $('#intro').val();
        let text = $('#text').val();
        //let img = $('#image').val()
        $.ajax({
            url: '/query/article.php',
            type: 'POST',
            cache: false,
            data: {
                'title' : title,
                'intro' : intro,
                'text' : text,
            },
            dataType: 'html',
            beforeSend: function (){

            },
            success: function (data) {

                if (data == "success"){
                    console.log('success');
                    clearForm();
                    $('.error-block').fadeOut(500);
                } else {
                    $('.load-ajax').removeClass('show');
                    $('.error-block').fadeIn(500).text(data);
                }
            }
        })
    });

    /* Contact form */

    $(document).on('click', '#contact_send', function (){
        let name = $('#username').val();
        let email = $('#email').val();
        let message = $('#message').val();
        $.ajax({
            url: '/query/mail.php',
            type: 'POST',
            cache: false,
            data: {
                'username' : name,
                'email' : email,
                'message' : message,
            },
            dataType: 'html',
            beforeSend: function (){

            },
            success: function (data) {

                if (data == "success"){
                    console.log('success');
                    clearForm();
                    $('.error-block').fadeOut(500);
                } else {
                    $('.load-ajax').removeClass('show');
                    $('.error-block').fadeIn(500).text(data);
                }
            }
        })
    });

})