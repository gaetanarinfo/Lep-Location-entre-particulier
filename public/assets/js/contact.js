$(document).ready(function () {

    var fichier = [];
    var name_file = [];

    var file_size = 250000;

    // Contact //

    $('#contact').submit(function (e) {

        e.preventDefault();

        $("html, body").animate({
            scrollTop: $('.content').offset().top
        }, 200);

        var form = [],
            form_data = new FormData(),
            genre_contact = $('#genre_contact').val(),
            email_contact = $('#email_contact').val(),
            tel_contact = $('#tel_contact').val(),
            nom_contact = $('#nom_contact').val(),
            prenom_contact = $('#prenom_contact').val(),
            sujet_contact = $('#sujet_contact').val(),
            ticket_contact = $('#ticket_contact').val(),
            content_contact = $('#content_contact').val(),
            url = '../ajax/ajax-contact.php'


        if (fichier.length == 1) {
            for (let i = 0; i < fichier.length; i++) {
                if ($.inArray(fichier[i].name, name_file) !== -1) form_data.append('file_' + i, fichier[i]);
            }
        }

        form.forEach(e => {

            if (e.name != "genre_contact") form_data.append(e.name, e.value);
            if (e.name != "email_contact") form_data.append(e.name, e.value);
            if (e.name != "tel_contact") form_data.append(e.name, e.value);
            if (e.name != "nom_contact") form_data.append(e.name, e.value);
            if (e.name != "prenom_contact") form_data.append(e.name, e.value);
            if (e.name != "sujet_contact") form_data.append(e.name, e.value);
            if (e.name != "ticket_contact") form_data.append(e.name, e.value);
            if (e.name != "content_contact") form_data.append(e.name, e.value);

        });

        form_data.append('genre_contact', genre_contact);
        form_data.append('email_contact', email_contact);
        form_data.append('tel_contact', tel_contact);
        form_data.append('nom_contact', nom_contact);
        form_data.append('prenom_contact', prenom_contact);
        form_data.append('sujet_contact', sujet_contact);
        form_data.append('ticket_contact', ticket_contact);
        form_data.append('content_contact', content_contact);

        $('.bloc-form').fadeOut(300);

        setTimeout(() => {
            $('#loader-form').removeClass('hidden');
            $('.col-md-6.contents').addClass('login');
        }, 600);

        $.ajax({
            url: url,
            type: 'POST',
            data: form_data,
            enctype: "multipart/form-data",
            processData: false,
            contentType: false,
            success: function (data) {

                setTimeout(() => {
                    $('#loader-form').addClass('hidden');
                }, 2000);

                var parsed = JSON.parse(data);

                if (parsed.contact == true) {

                    $('.message-validation .message-icone').attr('src', parsed.icone);
                    $('.message-validation .message-title').html(parsed.title);
                    $('.message-validation .message-body').html(parsed.message);
                    $('.message-validation').addClass('message-success');

                    setTimeout(() => {
                        $('.message-validation').fadeIn(300);
                    }, 2300);

                }

            }

        })

    })

    $('#formFile').on('change', function (e) {

        let that = e.currentTarget

        if (name_file.length < 2) {

            $.each($('#formFile').prop('files'), (index, item) => {
                fichier.push(item);
            })

            for (i = 0; i < fichier.length; i++) {

                if (name_file.length < 2) {

                    if (fichier[i].size < file_size) {

                        if (name_file.indexOf(fichier[i].name) == -1) {

                            $('.error-1').hide();
                            $('.validationFile').hide();
                            $('#formFile').removeClass('is-invalid');

                            name_file.push(fichier[i].name);

                        }

                    } else {

                        $('.validationFile').hide();
                        $('#formFile').addClass('is-invalid');

                    }

                }
            };

        }

    });

    // -------- //

})