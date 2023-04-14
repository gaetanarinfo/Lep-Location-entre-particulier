
$(document).ready(function () {

    var request = null;

    var prod = "pk_test_51Mv1ACKNlFQUQJlOnuv8T2vIjjsvUnznglyMpBoCF2VEL7s3BJZIgqk80nzfokuON5fRwrAUhYKP2e3JGEJiEna400xYEA3fWM"
    // var prod = "pk_live_51JWyC5Gkyhx4qcwe5A8jWjQlcMhLdTwsv7McySd8t2I7kJKtovnUu6TH93nmH4PK0YLCw27AKGoJEcOyVS7H0F3S00WW8qVLQU"

    var stripe,
        api;

    // The items the customer wants to buy
    var amount = 2999,
        description = $('#description').val(),
        purchase = [];

    purchase = {
        items: [{
            id: "1",
            amount: parseInt(amount),
            description: description
        }]
    };

    api = prod;

    // A reference to Stripe.js initialized with your real test publishable API key.
    stripe = Stripe(api);

    // Disable the button until we have Stripe set up on the page
    document.querySelector("#submit_card").disabled = true;

    fetch("../ajax/ajax-card.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(purchase)
    })
        .then(function (result) {
            return result.json();
        }).catch(function (error) {
            console.log(error);
        })
        .then(function (data) {

            var elements = stripe.elements();

            var card = elements.create("card", {
                //style: style
            });

            // Stripe injects an iframe into the DOM

            card.mount("#card-element");

            card.on("change", function (event) {

                // Disable the Pay button if there are no card details in the Element
                document.querySelector("#submit_card").disabled = event.empty;

            });

            $(document).on('submit', '#validate-cart', function (event) {
                event.preventDefault();

                // Complete payment when the submit button is clicked
                payWithCard(stripe, card, data.clientSecret);
            })

        }).catch(function (error) {
            console.log(error);
        });

    // Calls stripe.confirmCardPayment
    // If the card requires authentication Stripe shows a pop-up modal to
    // prompt the user to enter authentication details without leaving your page.
    var payWithCard = function (stripe, card, clientSecret) {

        // Show a success message within this page, e.g.
        $(".coordonnees").fadeOut(300);
        $(".code_promo").fadeOut(300);

        $('.bloc-paiement').fadeIn(600);

        setTimeout(() => {
            $("#loader-paiement").removeClass('hidden');
            $("#loader-paiement").show();
        }, 200);

        stripe
            .confirmCardPayment(clientSecret, {
                // receipt_email: $.cookie('email'),
                payment_method: {
                    card: card
                }
            })
            .then(function (result) {

                if (result.error) {
                    // Show error to your customer

                    if (result.error.type == "card_error") {

                        if (result.error.payment_method != undefined) {
                            showError(result.error.payment_method['id'], result.error.payment_method['code']);
                        } else {
                            showError2(result.error.code);
                        }

                    } else if (result.error.type == "invalid_request_error") {

                        showError3(result.error.payment_method['id'], result.error.payment_method['code']);

                    } else if (result.error.type == "validation_error") {
                        showError2(result.error.code);
                    } else if (result.error.type == "api_error") {

                        showError4(result.error.payment_method['id'], result.error.payment_method['code']);

                    }


                } else {

                    // The payment succeeded!
                    orderComplete(result.paymentIntent.id, result.paymentIntent.status);
                }
            });
    };

    /* ------- UI helpers ------- */
    // Shows a success message when the payment is complete
    var orderComplete = function (paymentIntentId, status) {

        // Paiement acceptee

        if (request != null) {
            request.abort();
        }

        request = $.ajax({
            url: "../ajax/users/ajax-paiementSuccessful.php",
            method: 'POST',
            data: {
                transaction_id: paymentIntentId,
                statut_transaction: status,
                email: $('#email_cart').val(),
                cp: $('#cp_cart').val(),
                ville: $('#ville_cart').val(),
                adresse: $('#adresse_cart').val(),
                pays: $('#pays_cart').val()
            },
            cache: false,
            success: function (data) {

                var parsed = JSON.parse(data);

                if (parsed.paiement == true) {

                    setTimeout(() => {
                        $("#loader-paiement").addClass('hidden');
                        $("#loader-paiement").hide();
                    }, 750);

                    $('.message-validation .message-icone').attr('src', parsed.icone);
                    $('.message-validation .message-title').html(parsed.title);
                    $('.message-validation .message-body').html(parsed.message);
                    $('.message-validation').addClass('message-success');

                    setTimeout(() => {
                        $('.message-validation').fadeIn(300);
                    }, 800);

                    setTimeout(() => {
                        location.reload()
                    }, 6000);

                }

            }

        });

    };

    // Show the customer the error from Stripe if their card fails to charge
    var showError = function (paymentIntentId, status) {

        $.ajax({
            url: "../ajax/users/ajax-paiementCanceled.php",
            method: 'POST',
            data: {
                transaction_id: paymentIntentId,
                statut_transaction: 'CANCELED',
                email: $('#email_cart').val(),
                cp: $('#cp_cart').val(),
                ville: $('#ville_cart').val(),
                adresse: $('#adresse_cart').val(),
                pays: $('#pays_cart').val()
            },
            cache: false,
            success: function (data) {

                var parsed = JSON.parse(data);

                if (parsed.paiement == true) {

                    setTimeout(() => {
                        $("#loader-paiement").addClass('hidden');
                        $("#loader-paiement").hide();
                    }, 750);

                    $('.message-validation .message-icone').attr('src', parsed.icone);
                    $('.message-validation .message-title').html(parsed.title);
                    $('.message-validation .message-body').html(parsed.message);
                    $('.message-validation').addClass('message-success');

                    setTimeout(() => {
                        $('.message-validation').fadeIn(300);
                    }, 800);

                    setTimeout(() => {
                        location.reload()
                    }, 6000);

                }

            }

        });



    };

    var showError2 = function () {

        $.ajax({
            url: "../ajax/users/ajax-paiementCanceled.php",
            method: 'POST',
            data: {
                transaction_id: paymentIntentId,
                statut_transaction: 'CANCELED',
                email: $('#email_cart').val(),
                cp: $('#cp_cart').val(),
                ville: $('#ville_cart').val(),
                adresse: $('#adresse_cart').val(),
                pays: $('#pays_cart').val()
            },
            cache: false,
            success: function (data) {

                var parsed = JSON.parse(data);

                if (parsed.paiement == true) {

                    setTimeout(() => {
                        $("#loader-paiement").addClass('hidden');
                        $("#loader-paiement").hide();
                    }, 750);

                    $('.message-validation .message-icone').attr('src', parsed.icone);
                    $('.message-validation .message-title').html(parsed.title);
                    $('.message-validation .message-body').html(parsed.message);
                    $('.message-validation').addClass('message-success');

                    setTimeout(() => {
                        $('.message-validation').fadeIn(300);
                    }, 800);

                    setTimeout(() => {
                        location.reload()
                    }, 6000);

                }

            }

        });



    };

    var showError3 = function () {

        $.ajax({
            url: "../ajax/users/ajax-paiementCanceled.php",
            method: 'POST',
            data: {
                transaction_id: paymentIntentId,
                statut_transaction: 'CANCELED',
                email: $('#email_cart').val(),
                cp: $('#cp_cart').val(),
                ville: $('#ville_cart').val(),
                adresse: $('#adresse_cart').val(),
                pays: $('#pays_cart').val()
            },
            cache: false,
            success: function (data) {

                var parsed = JSON.parse(data);

                if (parsed.paiement == true) {

                    setTimeout(() => {
                        $("#loader-paiement").addClass('hidden');
                        $("#loader-paiement").hide();
                    }, 750);

                    $('.message-validation .message-icone').attr('src', parsed.icone);
                    $('.message-validation .message-title').html(parsed.title);
                    $('.message-validation .message-body').html(parsed.message);
                    $('.message-validation').addClass('message-success');

                    setTimeout(() => {
                        $('.message-validation').fadeIn(300);
                    }, 800);

                    setTimeout(() => {
                        location.reload()
                    }, 6000);

                }

            }

        })
    };

    var showError4 = function () {

        $.ajax({
            url: "../ajax/users/ajax-paiementCanceled.php",
            method: 'POST',
            data: {
                transaction_id: paymentIntentId,
                statut_transaction: 'CANCELED',
                email: $('#email_cart').val(),
                cp: $('#cp_cart').val(),
                ville: $('#ville_cart').val(),
                adresse: $('#adresse_cart').val(),
                pays: $('#pays_cart').val()
            },
            cache: false,
            success: function (data) {

                var parsed = JSON.parse(data);

                if (parsed.paiement == true) {

                    setTimeout(() => {
                        $("#loader-paiement").addClass('hidden');
                        $("#loader-paiement").hide();
                    }, 750);

                    $('.message-validation .message-icone').attr('src', parsed.icone);
                    $('.message-validation .message-title').html(parsed.title);
                    $('.message-validation .message-body').html(parsed.message);
                    $('.message-validation').addClass('message-success');

                    setTimeout(() => {
                        $('.message-validation').fadeIn(300);
                    }, 800);

                    setTimeout(() => {
                        location.reload()
                    }, 6000);

                }

            }

        })

    };


})