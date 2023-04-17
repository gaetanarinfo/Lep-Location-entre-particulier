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
                    $('.message-validation .back-login a').attr('href', '/register');

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
                        window.location.href = '/login';
                    }, 6000);

                }

                if (parsed.login == false) {

                    $('.message-validation .message-icone').attr('src', parsed.icone);
                    $('.message-validation .message-title').html(parsed.title);
                    $('.message-validation .message-body').html(parsed.message);
                    $('.message-validation').addClass('message-error');
                    $('.message-validation .back-login').show();
                    $('.message-validation .back-login a').attr('href', '/login');

                    setTimeout(() => {
                        $('.message-validation').fadeIn(300);
                    }, 2300);

                }

            }

        })
    })

    // -------- //

    $('#facebook-btn').on('click', function (e) {

        e.preventDefault();

        fb_login();
    })

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
                $('.message-validation .back-login a').attr('href', '/login');

                setTimeout(() => {
                    $('.message-validation').fadeIn(300);
                }, 2300);

            }

        }

    })
}

// -------- //

// Login user Facebook

function fb_login() {

    FB.login(function (response) {

        if (response.status === 'connected') { // Logged into your webpage and Facebook.
            facebookApi();
        } else { // Not logged into your webpage or we are unable to tell.

        }

    }, { scope: 'email,public_profile' });

}

function checkLoginState() { // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function (response) { // See the onlogin handler
        fb_login(response);
    });
}

window.fbAsyncInit = function () {
    FB.init({
        appId: '996414568185217',
        cookie: true, // Enable cookies to allow the server to access the session.
        xfbml: false, // Parse social plugins on this webpage.
        version: 'v16.0' // Use this Graph API version for this call.
    });


    FB.getLoginStatus(function (response) { // Called after the JS SDK has been initialized.
        fb_login(response); // Returns the login status.
    });
};

function facebookApi() { // Testing Graph API after login.  See fb_login() for when this call is made.


    var user = new Array(),
        url = '../ajax/ajax-login-fb.php'

    FB.api('/me', {
        fields: [
            'id',
            'email',
            'first_name',
            'last_name',
            'picture',
        ]
    }, function (response) {
        user['id'] = response.id;
        user['email'] = response.email;
        user['first_name'] = response.first_name;
        user['last_name'] = response.last_name;
        user['avatar'] = response.picture.data.url;
    });

    $('.bloc-form').fadeOut(300);

    setTimeout(() => {
        $('#loader-form').removeClass('hidden');
        $('.col-md-6.contents').addClass('login');
    }, 600);

    setTimeout(() => {

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                email_login: user['email'],
                first_name: user['first_name'],
                last_name: user['last_name'],
                avatar: user['avatar'],
                id: user['id']
            },
            success: function (data) {

                console.log(data);

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
                    $('.message-validation .back-login a').attr('href', '/login');

                    setTimeout(() => {
                        $('.message-validation').fadeIn(300);
                    }, 2300);

                }

            }

        })

    }, 1500);


}

// -------- //
