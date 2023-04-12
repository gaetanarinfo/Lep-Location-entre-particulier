$(document).ready(function () {

    // Rester connecté
    $('#connect_login').change(function () {
        $('#connect_login').val($(this).is(':checked'));
    })

    if (localStorage.getItem('email_login') == null && localStorage.getItem('password_login') == null) {
        $('#connect_login').click(function () {
            localStorage.setItem('email_login', $('#email_login').val())
            localStorage.setItem('password_login', $('#password_login').val())
        });
        $('#connect_login').prop('checked', false);
        $('#connect_login').val('false');
    } else {
        $('#connect_login').click(function () {
            localStorage.removeItem('email_login')
            localStorage.removeItem('password_login')
        });
        $('#connect_login').prop('checked', true);
        $('#connect_login').val('true');
    }

    if (localStorage.getItem('email_login') !== null && localStorage.getItem('password_login') !== null) {
        $('#email_login').val(localStorage.getItem('email_login'))
        $('#password_login').val(localStorage.getItem('password_login'))
        $('#connect_login').prop('checked', true);

        $('#email_login').change(function () {
            localStorage.setItem('email_login', $('#email_login').val())
        })

        $('#password_login').change(function () {
            localStorage.setItem('password_login', $('#password_login').val())
        })
    }

    // Afficher ou masquer le mot de passe

    const eye = document.querySelector(".feather-eye");
    const eyeoff = document.querySelector(".feather-eye-off");
    const passwordField = document.querySelector("input[type=password]");

    eye.addEventListener("click", () => {
        eye.style.display = "none";
        eyeoff.style.display = "block";

        passwordField.type = "text";
    });

    eyeoff.addEventListener("click", () => {
        eyeoff.style.display = "none";
        eye.style.display = "block";

        passwordField.type = "password";
    });

    // -------- //

    // Login user //

    $('#login').submit(function (e) {

        e.preventDefault();

        if (!grecaptcha.getResponse()) {
            grecaptcha.execute();
        } else { }

    })

    // -------- //

    // Forgot password //

    $(document).on('click', '.forgot-password', function (e) {

        e.preventDefault();

        $('.bloc-form').hide();
        $('.bloc-forgot').fadeIn(600);
        $('#forgot-password').fadeIn(600);

    })

    $('#forgot-login').on('submit', function (e) {

        e.preventDefault();

        var email = $('#email_forgot_login').val(),
            url = '../ajax/ajax-forgot-login.php'

        $('.bloc-forgot').fadeOut(300);
        $('#forgot-password').fadeOut(300);

        setTimeout(() => {
            $('#loader-form').removeClass('hidden');
            $('.col-md-6.contents').addClass('login');
        }, 600);


        $.ajax({
            url: url,
            type: 'POST',
            data: {
                email_forgot_login: email,
            },
            success: function (data) {
    
                setTimeout(() => {
                    $('#loader-form').addClass('hidden');
                }, 2000);

                var parsed = JSON.parse(data);
    
                if (parsed.login == true) {
    
                    $('.message-validation .message-icone').attr('src', parsed.icone);
                    $('.message-validation .message-title').html(parsed.title);
                    $('.message-validation .message-body').html(parsed.message);
                    $('.message-validation').addClass('message-success');
    
                    setTimeout(() => {
                        $('.message-validation').fadeIn(300);
                    }, 2300);
    
                    setTimeout(() => {
                    }, 3000);
    
                }
    
                if (parsed.login == false) {
    
                    $('.message-validation .message-icone').attr('src', parsed.icone);
                    $('.message-validation .message-title').html(parsed.title);
                    $('.message-validation .message-body').html(parsed.message);
                    $('.message-validation').addClass('message-error');
                    $('.message-validation .back-login').show();
                    $('.message-validation .back-login a').attr('href', '/utilisateurs/register');
    
                    setTimeout(() => {
                        $('.message-validation').fadeIn(300);
                    }, 2300);
    
                }
    
            }
    
        })
    })

    // -------- //

    // Forgot password check //

    $('#forgot-password-form').on('submit', function (e) {

        e.preventDefault();

        var password = $('#password_forgot_check').val(),
            token = $('#token_forgot_check').val(),
            url = '../ajax/ajax-forgot-login-check.php'

        $('.bloc-forgot-check').fadeOut(300);
        $('#forgot-password-check').fadeOut(300);

        setTimeout(() => {
            $('#loader-form').removeClass('hidden');
            $('.col-md-6.contents').addClass('login');
        }, 600);

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                password_forgot_check: password,
                token_forgot_check: token
            },
            success: function (data) {
    
                setTimeout(() => {
                    $('#loader-form').addClass('hidden');
                }, 2000);

                var parsed = JSON.parse(data);
    
                if (parsed.login == true) {
    
                    $('.message-validation .message-icone').attr('src', parsed.icone);
                    $('.message-validation .message-title').html(parsed.title);
                    $('.message-validation .message-body').html(parsed.message);
                    $('.message-validation').addClass('message-success');
    
                    setTimeout(() => {
                        $('.message-validation').fadeIn(300);
                    }, 2300);
    
                    setTimeout(() => {
                        window.location.href = '/utilisateurs/login';
                    }, 6000);
    
                }
    
                if (parsed.login == false) {
    
                    $('.message-validation .message-icone').attr('src', parsed.icone);
                    $('.message-validation .message-title').html(parsed.title);
                    $('.message-validation .message-body').html(parsed.message);
                    $('.message-validation').addClass('message-error');
                    $('.message-validation .back-login').show();
                    $('.message-validation .back-login a').attr('href', '/utilisateurs/login');
    
                    setTimeout(() => {
                        $('.message-validation').fadeIn(300);
                    }, 2300);
    
                }
    
            }
    
        })
    })

    // -------- //
});

// Login user //

function recaptchacheck(token) {

    var email = $('#email_login').val(),
        password = $('#password_login').val(),
        url = '../ajax/ajax-login.php'

    $('.bloc-form').fadeOut(300);

    setTimeout(() => {
        $('#loader-form').removeClass('hidden');
        $('.col-md-6.contents').addClass('login');
    }, 600);

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            email_login: email,
            password_login: password
        },
        success: function (data) {

            setTimeout(() => {
                $('#loader-form').addClass('hidden');
            }, 2000);

            var parsed = JSON.parse(data);

            if (parsed.login == true) {

                $('.message-validation .message-icone').attr('src', parsed.icone);
                $('.message-validation .message-title').html(parsed.title);
                $('.message-validation .message-body').html(parsed.message);
                $('.message-validation').addClass('message-success');

                setTimeout(() => {
                    $('.message-validation').fadeIn(300);
                }, 2300);

                setTimeout(() => {
                    window.location.href = '/mon-espace';
                }, 6000);

            }

            if (parsed.login == false) {

                $('.message-validation .message-icone').attr('src', parsed.icone);
                $('.message-validation .message-title').html(parsed.title);
                $('.message-validation .message-body').html(parsed.message);
                $('.message-validation').addClass('message-error');
                $('.message-validation .back-login').show();
                $('.message-validation .back-login a').attr('href', '/utilisateurs/register');

                setTimeout(() => {
                    $('.message-validation').fadeIn(300);
                }, 2300);

            }

        }

    })
}

// -------- //
