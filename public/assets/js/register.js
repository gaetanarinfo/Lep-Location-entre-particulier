$(document).ready(function () {

    // Upload galerie

    var fichier = [];
    var name_file = [];

    var fichier2 = [];
    var name_file2 = [];

    var fichier3 = [];
    var name_file3 = [];

    var fichier4 = [];
    var name_file4 = [];

    var file_size = 250000;

    $('#upload-galerie').on('change', function (e) {

        let that = e.currentTarget

        if (name_file.length < 2) {

            $.each($('#upload-galerie').prop('files'), (index, item) => {
                fichier.push(item);
            })

            for (i = 0; i < fichier.length; i++) {

                if (name_file.length < 2) {

                    if (fichier[i].size < file_size) {

                        if (name_file.indexOf(fichier[i].name) == -1) {

                            $('.error-1').hide();

                            name_file.push(fichier[i].name);

                            var number_span = $('.div_img div').length;

                            let reader = new FileReader();

                            reader.onload = (e) => {

                                const image = new Image();

                                image.src = e.target.result;
                                image.onload = () => {

                                    if (image.width <= 800 && image.height <= 800) {

                                        var html = '<div class="div-img" id="' + number_span + '"><img class="img-fluid rounded shadow" style="width: 100%; max-height: 196px;" data-fancybox src="' + e.target.result + '"/><span class="delete-image" id="del-1"><i class="fa-solid fa-xmark"></i></span>';

                                        $('#upload-galerie').prop('disabled', true);
                                        $('#galerie-received').html(html);

                                        $('.error-1').html('');

                                        $('.upload-bloc p').hide();
                                        $('.upload-bloc #button-add-galerie').hide();

                                    } else {

                                        name_file = [];
                                        fichier = [];
                                        $('.upload-bloc p').show();
                                        $('.upload-bloc #button-add-galerie').show();
                                        $('.error-1').show();
                                        $('.error-1').html('<i class="fa-solid fa-xmark me-1"></i><p>L\'image ne correspond pas aux dimensions spécifiées.</p>');

                                    }

                                };

                            }

                            reader.readAsDataURL(that.files[0]);

                        }

                    } else {

                        $('.error-1').show();
                        $('.error-1').html('<i class="fa-solid fa-xmark me-1"></i><p>Le fichier est trop volumineux.</p>');

                    }

                }
            };

        }

    });

    $('#upload-galerie-2').on('change', function (e) {

        let that = e.currentTarget

        if (name_file2.length < 6) {

            $.each($('#upload-galerie-2').prop('files'), (index, item) => {
                fichier2.push(item);
            })

            for (i = 0; i < fichier2.length; i++) {

                if (name_file2.length < 2) {

                    if (fichier2[i].size < file_size) {

                        if (name_file2.indexOf(fichier2[i].name) == -1) {

                            $('.error-1-2').hide();

                            name_file2.push(fichier2[i].name);

                            var number_span = $('.div_img div').length;

                            let reader = new FileReader();

                            reader.onload = (e) => {

                                const image = new Image();

                                image.src = e.target.result;
                                image.onload = () => {

                                    if (image.width <= 800 && image.height <= 800) {

                                        var html = '<div class="div-img" id="' + number_span + '"><img class="img-fluid rounded shadow" style="width: 100%; max-height: 196px;" data-fancybox src="' + e.target.result + '"/><span class="delete-image" id="del-2"><i class="fa-solid fa-xmark"></i></span>';

                                        $('#upload-galerie-2').prop('disabled', true);
                                        $('#galerie-received-2').html(html);

                                        $('.error-1-2').html('');

                                        $('.upload-bloc-2 p').hide();
                                        $('.upload-bloc-2 #button-add-galerie').hide();
                                    } else {

                                        name_file2 = [];
                                        fichier2 = [];
                                        $('.upload-bloc-2 p').show();
                                        $('.upload-bloc-2 #button-add-galerie').show();
                                        $('.error-1-2').show();
                                        $('.error-1-2').html('<i class="fa-solid fa-xmark me-1"></i><p>L\'image ne correspond pas aux dimensions spécifiées.</p>');

                                    }

                                };

                            }

                            reader.readAsDataURL(that.files[0]);

                        }

                    } else {

                        $('.error-1-2').show();
                        $('.error-1-2').html('<i class="fa-solid fa-xmark me-1"></i><p>Le fichier est trop volumineux.</p>');

                    }

                }
            };

        }

    });

    $('#upload-galerie-3').on('change', function (e) {

        let that = e.currentTarget

        if (name_file3.length < 6) {

            $.each($('#upload-galerie-3').prop('files'), (index, item) => {
                fichier3.push(item);
            })

            for (i = 0; i < fichier3.length; i++) {

                if (name_file3.length < 2) {

                    if (fichier3[i].size < file_size) {

                        if (name_file3.indexOf(fichier3[i].name) == -1) {

                            $('.error-1-3').hide();

                            name_file3.push(fichier3[i].name);

                            var number_span = $('.div_img div').length;

                            let reader = new FileReader();

                            reader.onload = (e) => {

                                const image = new Image();

                                image.src = e.target.result;
                                image.onload = () => {

                                    if (image.width <= 800 && image.height <= 800) {

                                        var html = '<div class="div-img" id="' + number_span + '"><img class="img-fluid rounded shadow" style="width: 100%; max-height: 196px;" data-fancybox src="' + e.target.result + '"/><span class="delete-image" id="del-3"><i class="fa-solid fa-xmark"></i></span>';

                                        $('#upload-galerie-3').prop('disabled', true);
                                        $('#galerie-received-3').html(html);

                                        $('.error-1-3').html('');

                                        $('.upload-bloc-3 p').hide();
                                        $('.upload-bloc-3 #button-add-galerie').hide();
                                    } else {

                                        name_file3 = [];
                                        fichier3 = [];
                                        $('.upload-bloc-3 p').show();
                                        $('.upload-bloc-3 #button-add-galerie').show();
                                        $('.error-1-3').show();
                                        $('.error-1-3').html('<i class="fa-solid fa-xmark me-1"></i><p>L\'image ne correspond pas aux dimensions spécifiées.</p>');

                                    }

                                };

                            }

                            reader.readAsDataURL(that.files[0]);

                        }

                    } else {

                        $('.error-1-3').show();
                        $('.error-1-3').html('<i class="fa-solid fa-xmark me-1"></i><p>Le fichier est trop volumineux.</p>');

                    }

                }
            };

        }

    });

    $('#upload-galerie-4').on('change', function (e) {

        let that = e.currentTarget

        if (name_file4.length < 6) {

            $.each($('#upload-galerie-4').prop('files'), (index, item) => {
                fichier4.push(item);
            })

            for (i = 0; i < fichier4.length; i++) {

                if (name_file4.length < 2) {

                    if (fichier4[i].size < file_size) {

                        if (name_file4.indexOf(fichier4[i].name) == -1) {

                            $('.error-1-4').hide();

                            name_file4.push(fichier4[i].name);

                            var number_span = $('.div_img div').length;

                            let reader = new FileReader();

                            reader.onload = (e) => {

                                const image = new Image();

                                image.src = e.target.result;
                                image.onload = () => {

                                    if (image.width <= 800 && image.height <= 800) {

                                        var html = '<div class="div-img" id="' + number_span + '"><img class="img-fluid rounded shadow" style="width: 100%; max-height: 196px;" data-fancybox src="' + e.target.result + '"/><span class="delete-image" id="del-4"><i class="fa-solid fa-xmark"></i></span>';

                                        $('#upload-galerie-4').prop('disabled', true);
                                        $('#galerie-received-4').html(html);

                                        $('.error-1-4').html('');

                                        $('.upload-bloc-4 p').hide();
                                        $('.upload-bloc-4 #button-add-galerie').hide();
                                    } else {

                                        name_file4 = [];
                                        fichier4 = [];
                                        $('.upload-bloc-4 p').show();
                                        $('.upload-bloc-4 #button-add-galerie').show();
                                        $('.error-1-4').show();
                                        $('.error-1-4').html('<i class="fa-solid fa-xmark me-1"></i><p>L\'image ne correspond pas aux dimensions spécifiées.</p>');

                                    }

                                };

                            }

                            reader.readAsDataURL(that.files[0]);

                        }

                    } else {

                        $('.error-1-4').show();
                        $('.error-1-4').html('<i class="fa-solid fa-xmark me-1"></i><p>Le fichier est trop volumineux.</p>');

                    }

                }
            };

        }

    });

    // Register user //

    // Case à cocher

    $('#meuble').change(function () {
        $('#meuble').val($(this).is(':checked'));
    })

    $('#animeaux_acceptes').change(function () {
        $('#animeaux_acceptes').val($(this).is(':checked'));
    })

    $('#sous_location').change(function () {
        $('#sous_location').val($(this).is(':checked'));
    })
    // -------- //

    // On envoi le formulaire
    $('#register').submit(function (e) {

        e.preventDefault();

        $("html, body").animate({
            scrollTop: $('.content').offset().top
        }, 200);

        var form = [],
            form_data = new FormData(),
            type_propriete = $('#type_propriete').val(),
            duree_location = $('#duree_location').val(),
            disponible = $('#disponible').val(),
            pieces = $('#pieces').val(),
            chambre = $('#chambre').val(),
            surface = $('#surface').val(),
            loyer = $('#loyer').val(),
            garantie = $('#garantie').val(),
            frais_supp = $('#frais_supp').val(),
            meuble = $('#meuble').val(),
            animeaux_acceptes = $('#animeaux_acceptes').val(),
            sous_location = $('#sous_location').val(),
            location = $('#location').val(),
            address = $('#address').val(),
            region = $('#region').val(),
            cp = $('#cp').val(),
            genre = $('#genre').val(),
            email_contact = $('#email_contact').val(),
            tel_contact = $('#tel_contact').val(),
            nom_contact = $('#nom_contact').val(),
            prenom_contact = $('#prenom_contact').val(),
            title_annonce = $('#title_annonce').val(),
            content_annonce = $('#content_annonce').val(),
            email_login = $('#email_login').val(),
            password_login = $('#password_login').val(),
            disponibilite = $('#disponibilite').val()


        if (fichier.length == 1) {
            for (let i = 0; i < fichier.length; i++) {
                if ($.inArray(fichier[i].name, name_file) !== -1) form_data.append('file_' + i, fichier[i]);
            }
        }

        if (fichier2.length == 1) {
            for (let i = 0; i < fichier2.length; i++) {
                if ($.inArray(fichier2[i].name, name_file2) !== -1) form_data.append('file_2' + i, fichier2[i]);
            }
        }

        if (fichier3.length == 1) {
            for (let i = 0; i < fichier3.length; i++) {
                if ($.inArray(fichier3[i].name, name_file3) !== -1) form_data.append('file_3' + i, fichier3[i]);
            }
        }

        if (fichier4.length == 1) {
            for (let i = 0; i < fichier4.length; i++) {
                if ($.inArray(fichier4[i].name, name_file4) !== -1) form_data.append('file_4' + i, fichier4[i]);
            }
        }

        form.forEach(e => {

            if (e.name != "type_propriete") form_data.append(e.name, e.value);
            if (e.name != "duree_location") form_data.append(e.name, e.value);
            if (e.name != "disponible") form_data.append(e.name, e.value);
            if (e.name != "pieces") form_data.append(e.name, e.value);
            if (e.name != "chambre") form_data.append(e.name, e.value);
            if (e.name != "surface") form_data.append(e.name, e.value);
            if (e.name != "loyer") form_data.append(e.name, e.value);
            if (e.name != "garantie") form_data.append(e.name, e.value);
            if (e.name != "frais_supp") form_data.append(e.name, e.value);
            if (e.name != "meuble") form_data.append(e.name, e.value);
            if (e.name != "animeaux_acceptes") form_data.append(e.name, e.value);
            if (e.name != "sous_location") form_data.append(e.name, e.value);
            if (e.name != "location") form_data.append(e.name, e.value);
            if (e.name != "cp") form_data.append(e.name, e.value);
            if (e.name != "address") form_data.append(e.name, e.value);
            if (e.name != "region") form_data.append(e.name, e.value);
            if (e.name != "genre") form_data.append(e.name, e.value);
            if (e.name != "email_contact") form_data.append(e.name, e.value);
            if (e.name != "tel_contact") form_data.append(e.name, e.value);
            if (e.name != "nom_contact") form_data.append(e.name, e.value);
            if (e.name != "prenom_contact") form_data.append(e.name, e.value);
            if (e.name != "title_annonce") form_data.append(e.name, e.value);
            if (e.name != "content_annonce") form_data.append(e.name, e.value);
            if (e.name != "email_login") form_data.append(e.name, e.value);
            if (e.name != "password_login") form_data.append(e.name, e.value);
            if (e.name != "disponibilite") form_data.append(e.name, e.value);

        });

        form_data.append('type_propriete', type_propriete);
        form_data.append('duree_location', duree_location);
        form_data.append('disponible', disponible);
        form_data.append('pieces', pieces);
        form_data.append('chambre', chambre);
        form_data.append('surface', surface);
        form_data.append('loyer', loyer);
        form_data.append('garantie', garantie);
        form_data.append('frais_supp', frais_supp);
        form_data.append('meuble', meuble);
        form_data.append('animeaux_acceptes', animeaux_acceptes);
        form_data.append('sous_location', sous_location);
        form_data.append('location', location);
        form_data.append('address', address);
        form_data.append('region', region);
        form_data.append('cp', cp);
        form_data.append('genre', genre);
        form_data.append('email_contact', email_contact);
        form_data.append('tel_contact', tel_contact);
        form_data.append('nom_contact', nom_contact);
        form_data.append('prenom_contact', prenom_contact);
        form_data.append('title_annonce', title_annonce);
        form_data.append('content_annonce', content_annonce);
        form_data.append('email_login', email_login);
        form_data.append('password_login', password_login);
        form_data.append('disponibilite', disponibilite);

        var url = '../ajax/ajax-register.php';

        $('.bloc-form').fadeOut(300);

        setTimeout(() => {
            $('#loader-form').removeClass('hidden');
        }, 800);

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

                if (parsed.create == true) {

                    $('.message-validation .message-icone').attr('src', parsed.icone);
                    $('.message-validation .message-title').html(parsed.title);
                    $('.message-validation .message-body').html(parsed.message);
                    $('.message-validation').addClass('message-success');

                    setTimeout(() => {
                        $('.message-validation').fadeIn(300);
                    }, 2300);

                }

                if (parsed.create == false) {

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

    // -------- //

    // Suppression des différentes images de l'utilisateur

    $(document).on('click', '#del-1', function (e) {

        e.preventDefault();

        $('#galerie-received').html('');
        $('.upload-bloc p').show();
        $('.upload-bloc #button-add-galerie').show();
        $('#upload-galerie').prop('disabled', false);

        fichier = [];
        name_file = [];

    })

    $(document).on('click', '#del-2', function (e) {

        e.preventDefault();

        $('#galerie-received-2').html('');
        $('.upload-bloc-2 p').show();
        $('.upload-bloc-2 #button-add-galerie').show();
        $('#upload-galerie-2').prop('disabled', false);

        fichier2 = [];
        name_file2 = [];

    })

    $(document).on('click', '#del-3', function (e) {

        e.preventDefault();

        $('#galerie-received-3').html('');
        $('.upload-bloc-3 p').show();
        $('.upload-bloc-3 #button-add-galerie').show();
        $('#upload-galerie-3').prop('disabled', false);

        fichier3 = [];
        name_file3 = [];

    })

    $(document).on('click', '#del-4', function (e) {

        e.preventDefault();

        $('#galerie-received-4').html('');
        $('.upload-bloc-4 p').show();
        $('.upload-bloc-4 #button-add-galerie').show();
        $('#upload-galerie-4').prop('disabled', false);

        fichier4 = [];
        name_file4 = [];

    })

    // -------- //

    // Input select adresse

    $('#address').on('keyup', function (e) {

        var value = $(this).val(),
            url = "../ajax/ajax-searcInAdress.php",
            input = $(this)

        if (value.length >= 6) {

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    value: value
                },
                success: function (data) {
                    $('.input-select>ul').html(data);
                    $('.input-select').fadeIn(300);
                    $(input).addClass('input-select-open');
                }
            })

        }

    })

    $(document).on('click', '.clic-adresse-input', function (e) {

        e.preventDefault();

        var cp = $(this).data('cp'),
            city = $(this).data('city'),
            adresse = $(this).data('adresse')

        $('#address').val(adresse);
        $('#cp').val(cp);
        $('#location').val(city);

        $('.input-select>ul').html('');
        $('.input-select').fadeOut(300);
        $('#address').removeClass('input-select-open');

    })

    //

});