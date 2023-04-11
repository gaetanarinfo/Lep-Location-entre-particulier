$(document).ready(function () {

    // Notation de l'article

    $(document).on('click', '.note a', function (e) {

        e.preventDefault();

        var value = $(this).data('note'),
            li = $(this),
            url = '../ajax/ajax-note.php',
            blog_id = $('#blog-id').val()

        if (value == "1") {
            $(document).find('.note a').removeClass('activate');
            li.parent().find(':first-child').addClass('activate');
        }

        if (value == "2") {
            $(document).find('.note a').removeClass('activate');
            li.parent().find(':nth-child(1)').addClass('activate');
            li.parent().find(':nth-child(2)').addClass('activate');
        }

        if (value == "3") {
            $(document).find('.note a').removeClass('activate');
            li.parent().find(':nth-child(1)').addClass('activate');
            li.parent().find(':nth-child(2)').addClass('activate');
            li.parent().find(':nth-child(3)').addClass('activate');
        }

        if (value == "4") {
            $(document).find('.note a').removeClass('activate');
            li.parent().find(':nth-child(1)').addClass('activate');
            li.parent().find(':nth-child(2)').addClass('activate');
            li.parent().find(':nth-child(3)').addClass('activate');
            li.parent().find(':nth-child(4)').addClass('activate');
        }

        if (value == "5") {
            $(document).find('.note a').removeClass('activate');
            li.parent().find(':nth-child(1)').addClass('activate');
            li.parent().find(':nth-child(2)').addClass('activate');
            li.parent().find(':nth-child(3)').addClass('activate');
            li.parent().find(':nth-child(4)').addClass('activate');
            li.parent().find(':nth-child(5)').addClass('activate');
        }

        if (value == "6") {
            $(document).find('.note a').removeClass('activate');
            li.parent().find(':nth-child(1)').addClass('activate');
            li.parent().find(':nth-child(2)').addClass('activate');
            li.parent().find(':nth-child(3)').addClass('activate');
            li.parent().find(':nth-child(4)').addClass('activate');
            li.parent().find(':nth-child(5)').addClass('activate');
            li.parent().find(':nth-child(6)').addClass('activate');
        }

        // $('#avisFinal').val(value);

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                note: value,
                blog_id: blog_id
            },
            success: function (data) {

                var parsed = JSON.parse(data);

                if (parsed.note == true) {
                    $('.result-note .icone').html(parsed.icone);
                    $('.result-note .message').html(parsed.message);
                    $('.result-note').fadeIn(600);
                    $('.result-note').addClass('d-flex');
                }

                if (parsed.note == false) {
                    $('.result-note .icone').html(parsed.icone);
                    $('.result-note .message').html(parsed.message);
                    $('.result-note').fadeIn(600);
                    $('.result-note').addClass('d-flex');
                }

                setTimeout(() => {
                    $('.result-note').fadeOut();
                }, 1700);

                setTimeout(() => {
                    $('.result-note').removeClass('d-flex');
                }, 2100);
            }

        })

    })

    // ------------ //

})