$(document).ready(function () {

    // Filter remove
    $(document).on('click', '#remove_filter', function (e) {
        e.preventDefault();
        location.reload();
    })

    // Slider range prix
    $('#loyer_propriete').on('change', function () {

        var value = $(this).val(),
            span = $('.rangePrix');

        span.html(value);

    })

    // Slider range chambres
    $('#chambres_propriete').on('change', function () {

        var value = $(this).val(),
            span = $('.rangeChambres');

        span.html(value);

    })

    // Slider range pieces
    $('#pieces_propriete').on('change', function () {

        var value = $(this).val(),
            span = $('.rangePieces');

        span.html(value);

    })

    // Logique du formulaire

    $('#location').on('keyup', function (e) {

        $('.error').hide();
        $('.filter').fadeIn(300);

        var location = $(this).val();
        var type = $('#type_propriete').val();
        var loyer_propriete = $('#loyer_propriete').val();
        var chambres_propriete = $('#chambres_propriete').val();
        var pieces_propriete = $('#pieces_propriete').val();

        $('.locations').fadeOut(300);

        setTimeout(() => {
            $('#loader-form').removeClass('hidden');
        }, 600);

        // Load Vin Filter
        $.ajax({
            url: '../ajax/ajax-search-location.php',
            type: 'GET',
            data: {
                location: location,
                type_propriete: type,
                loyer_propriete: loyer_propriete,
                chambres_propriete: chambres_propriete,
                pieces_propriete: pieces_propriete
            },
            success: function (data) {

                setTimeout(() => {
                    $('#loader-form').addClass('hidden');
                }, 1200);

                if (data.length != "1") {
                    setTimeout(() => {
                        $('.error').hide();
                        $('.locations').html(data);
                        $('.locations').fadeIn(300);
                    }, 1800);
                } else {
                    setTimeout(() => {
                        $('.error').fadeIn(300);
                    }, 1800);
                }

            }
        })

    })

    $('#type_propriete').on('change', function (e) {

        $('.error').hide();
        $('.filter').fadeIn(300);

        var location = $('#location').val();
        var type = $(this).val();
        var loyer_propriete = $('#loyer_propriete').val();
        var chambres_propriete = $('#chambres_propriete').val();
        var pieces_propriete = $('#pieces_propriete').val();

        $('.locations').fadeOut(300);

        setTimeout(() => {
            $('#loader-form').removeClass('hidden');
        }, 600);

        // Load Vin Filter
        $.ajax({
            url: '../ajax/ajax-search-location.php',
            type: 'GET',
            data: {
                location: location,
                type_propriete: type,
                loyer_propriete: loyer_propriete,
                chambres_propriete: chambres_propriete,
                pieces_propriete: pieces_propriete
            },
            success: function (data) {

                console.log(data.length);

                setTimeout(() => {
                    $('#loader-form').addClass('hidden');
                }, 1200);

                if (data.length != "1") {
                    setTimeout(() => {
                        $('.error').hide();
                        $('.locations').html(data);
                        $('.locations').fadeIn(300);
                    }, 1800);
                } else {
                    setTimeout(() => {
                        $('.error').fadeIn(300);
                    }, 1800);
                }

            }
        })

    })

    $('#loyer_propriete').on('change', function (e) {

        $('.error').hide();
        $('.filter').fadeIn(300);

        var location = $('#location').val();
        var type = $('#type_propriete').val();
        var loyer_propriete = $(this).val();
        var chambres_propriete = $('#chambres_propriete').val();
        var pieces_propriete = $('#pieces_propriete').val();

        $('.locations').fadeOut(300);

        setTimeout(() => {
            $('#loader-form').removeClass('hidden');
        }, 600);

        // Load Vin Filter
        $.ajax({
            url: '../ajax/ajax-search-location.php',
            type: 'GET',
            data: {
                location: location,
                type_propriete: type,
                loyer_propriete: loyer_propriete,
                chambres_propriete: chambres_propriete,
                pieces_propriete: pieces_propriete
            },
            success: function (data) {

                setTimeout(() => {
                    $('#loader-form').addClass('hidden');
                }, 1200);

                if (data.length != "1") {
                    setTimeout(() => {
                        $('.error').hide();
                        $('.locations').html(data);
                        $('.locations').fadeIn(300);
                    }, 1800);
                } else {
                    setTimeout(() => {
                        $('.error').fadeIn(300);
                    }, 1800);
                }

            }
        })

    })

    $('#chambres_propriete').on('change', function (e) {

        $('.error').hide();
        $('.filter').fadeIn(300);

        var location = $('#location').val();
        var type = $('#type_propriete').val();
        var loyer_propriete = $('#loyer_propriete').val();
        var chambres_propriete = $(this).val();
        var pieces_propriete = $('#pieces_propriete').val();

        $('.locations').fadeOut(300);

        setTimeout(() => {
            $('#loader-form').removeClass('hidden');
        }, 600);

        // Load Vin Filter
        $.ajax({
            url: '../ajax/ajax-search-location.php',
            type: 'GET',
            data: {
                location: location,
                type_propriete: type,
                loyer_propriete: loyer_propriete,
                chambres_propriete: chambres_propriete,
                pieces_propriete: pieces_propriete
            },
            success: function (data) {

                setTimeout(() => {
                    $('#loader-form').addClass('hidden');
                }, 1200);

                if (data.length != "1") {
                    setTimeout(() => {
                        $('.error').hide();
                        $('.locations').html(data);
                        $('.locations').fadeIn(300);
                    }, 1800);
                } else {
                    setTimeout(() => {
                        $('.error').fadeIn(300);
                    }, 1800);
                }

            }
        })

    })

    $('#pieces_propriete').on('change', function (e) {

        $('.error').hide();
        $('.filter').fadeIn(300);

        var location = $('#location').val();
        var type = $('#type_propriete').val();
        var loyer_propriete = $('#loyer_propriete').val();
        var chambres_propriete = $('#chambres_propriete').val();
        var pieces_propriete = $(this).val();

        $('.locations').fadeOut(300);

        setTimeout(() => {
            $('#loader-form').removeClass('hidden');
        }, 600);

        // Load Vin Filter
        $.ajax({
            url: '../ajax/ajax-search-location.php',
            type: 'GET',
            data: {
                location: location,
                type_propriete: type,
                loyer_propriete: loyer_propriete,
                chambres_propriete: chambres_propriete,
                pieces_propriete: pieces_propriete
            },
            success: function (data) {

                setTimeout(() => {
                    $('#loader-form').addClass('hidden');
                }, 1200);

                if (data.length != "1") {
                    setTimeout(() => {
                        $('.error').hide();
                        $('.locations').html(data);
                        $('.locations').fadeIn(300);
                    }, 1800);
                } else {
                    setTimeout(() => {
                        $('.error').fadeIn(300);
                    }, 1800);
                }

            }
        })

    })

})