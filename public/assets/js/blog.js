$(document).ready(function () {

    var count = 1;

    $('#show_news').on('click', function (e) {

        e.preventDefault();

        $('#show_news_bloc').html('<div class="loader_inf" id="loader-form"><img width="67" height="67" src="public/assets/images/loader.svg"></div>');

        setTimeout(() => {
            callData(count);
            count++;
        }, 1200);

    })

    function callData(counter) {

        var url = "../ajax/ajax-blog.php"

        $.ajax({
            url: url,
            type: "POST",
            data: {
                offset: counter
            },
            success: function (data) {

                setTimeout(() => {
                    $('#loader-form').addClass('hidden');
                }, 300);

                setTimeout(() => {
                    $('.search_box_actualites').append(data);
                    $('#show_news').html($('#showPlus').val());

                    if (parseInt($('.countActualites').last().val()) > $('.actualites_search').length) $('#show_news').hide();

                }, 500);

            },
            error: function (err) {
                console.log("Error: ", err);
            }
        })

    }

})