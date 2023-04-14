$(document).ready(function () {

    $('#refund-validate').on('click', function (e) {

        e.preventDefault();

        var token = $('#token').val(),
            url = "../ajax/users/ajax-paiement-refund.php"

        $('.bloc-refund').fadeOut(300);

        setTimeout(() => {
            $('#loader-form').removeClass('hidden');
        }, 300);

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                token: token
            },
            success: function (data) {

                console.log(data);

                setTimeout(() => {
                    $('#loader-form').addClass('hidden');
                }, 1500);

                var parsed = JSON.parse(data);

                if (parsed.refund == true) {

                    $('.message-validation .message-icone').attr('src', parsed.icone);
                    $('.message-validation .message-title').html(parsed.title);
                    $('.message-validation .message-body').html(parsed.message);
                    $('.message-validation').addClass('message-success');

                    setTimeout(() => {
                        $('.message-validation').fadeIn(300);
                    }, 1500);

                }

                if (parsed.refund == false) {

                    $('.message-validation .message-icone').attr('src', parsed.icone);
                    $('.message-validation .message-title').html(parsed.title);
                    $('.message-validation .message-body').html(parsed.message);
                    $('.message-validation').addClass('message-error');

                    setTimeout(() => {
                        $('.message-validation').fadeIn(300);
                    }, 1500);

                }

            }

        })

    })

})