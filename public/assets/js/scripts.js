$(document).ready(function () {

  // Scroll révélation
  ScrollReveal().reveal('.reveal', {
    delay: 200
  });

  // Newsletter

  $('#newsletter').submit(function (e) {

    e.preventDefault();

    if (!grecaptcha.getResponse()) {

      grecaptcha.execute(
      );
    } else { }

  })

  // --------- //

  // Back to top

  $(window).scroll(function () {
    if ($(this).scrollTop() > 1200) {
      $('#toTopBtn').fadeIn();
    } else {
      $('#toTopBtn').fadeOut();
    }
  });

  $('#toTopBtn').click(function () {
    $("html, body").animate({
      scrollTop: 0
    }, 1000);
    return false;
  });

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
