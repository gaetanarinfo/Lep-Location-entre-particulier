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
                    window.location.href = '/espace';
                }, 3000);

            }

            if (parsed.login == false) {

                $('.message-validation .message-icone').attr('src', parsed.icone);
                $('.message-validation .message-title').html(parsed.title);
                $('.message-validation .message-body').html(parsed.message);
                $('.message-validation').addClass('message-error');
                $('.message-validation .back-login').show();
                $('.message-validation .back-login a').attr('href', '/register');

                setTimeout(() => {
                    $('.message-validation').fadeIn(300);
                }, 2300);

            }

        }

    })
}

// -------- //
