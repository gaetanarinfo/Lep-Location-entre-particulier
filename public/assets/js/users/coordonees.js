$(document).ready(function () {

    // On envoi le formulaire
    $('#update').submit(function (e) {

        e.preventDefault();

        var url = '../ajax/users/ajax-update-user.php',
        form_data = $('#update').serialize();

        $('.bloc-form').fadeOut(300);

        setTimeout(() => {
            $('#loader-form').removeClass('hidden');
        }, 800);

        $.ajax({
            url: url,
            type: 'POST',
            data: form_data,
            success: function (data) {

                setTimeout(() => {
                    $('#loader-form').addClass('hidden');
                }, 2000);

                var parsed = JSON.parse(data);

                if (parsed.update == true) {

                    $('.message-validation .message-icone').attr('src', parsed.icone);
                    $('.message-validation .message-title').html(parsed.title);
                    $('.message-validation .message-body').html(parsed.message);
                    $('.message-validation').addClass('message-success');

                    setTimeout(() => {
                        $('.message-validation').fadeIn(300);
                    }, 2300);

                }

                if (parsed.update == false) {

                    $('.message-validation .message-icone').attr('src', parsed.icone);
                    $('.message-validation .message-title').html(parsed.title);
                    $('.message-validation .message-body').html(parsed.message);
                    $('.message-validation').addClass('message-error');

                    setTimeout(() => {
                        $('.message-validation').fadeIn(300);
                    }, 2300);

                }

            }

        })

    })

})