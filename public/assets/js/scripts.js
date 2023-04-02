$(document).ready(function () {

  // Carousel Header

  var headerCarousel = document.querySelector('#headerCarousel')

  var carousel = new bootstrap.Carousel(headerCarousel, {
    interval: 2000,
    wrap: false,
    touch: true
  })

  // --------- //

  // Newsletter

  $('#newsletter').submit(function (e) {

    e.preventDefault();

    if (!grecaptcha.getResponse()) {

      grecaptcha.execute(
      );
    } else { }

  })

  // --------- //

});

// Newsletter

function recaptchacheck(token) {

  var url = '../ajax/ajax-newsletter.php';
  $('#bloc_newsletter').attr('style', 'display:none!important');
  $('.loader_inf#loader_newsletter').fadeIn();

  $.ajax({
    url: url,
    type: 'POST',
    data: {
      email: $('#email_newsletter').val()
    },
    success: function (data) {

      setTimeout(() => {
        $('.loader_inf#loader_newsletter').hide();
        $('.bloc_newsletter').attr('style', 'display:none!important');
      }, 1300);

      setTimeout(() => {

        var parsed = JSON.parse(data);

        if (parsed.success == true) {

          $('.alert-newsletter .message-title').html(parsed.title);
          $('.alert-newsletter .message-icone').html(parsed.icone);
          $('.alert-newsletter .message-content').html(parsed.message);
          $('.alert-newsletter').removeClass('alert-danger').addClass('alert-success');
          $('.alert-newsletter').attr('style', 'display: block !important');

        } else {

          $('.alert-newsletter .message-title').html(parsed.title);
          $('.alert-newsletter .message-icone').html(parsed.icone);
          $('.alert-newsletter .message-content').html(parsed.message);
          $('.alert-newsletter').removeClass('alert-success').addClass('alert-danger');
          $('.alert-newsletter').attr('style', 'display: block !important');

          setTimeout(() => {
            location.reload()
          }, 2500);

        }

      }, 1600);

    }
  });

}

// --------- //
