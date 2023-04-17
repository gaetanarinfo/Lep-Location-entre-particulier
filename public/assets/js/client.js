$(document).ready(function () {

    var request = null;

    // var prod = "pk_test_51Mv1ACKNlFQUQJlOnuv8T2vIjjsvUnznglyMpBoCF2VEL7s3BJZIgqk80nzfokuON5fRwrAUhYKP2e3JGEJiEna400xYEA3fWM"
    var prod = "pk_live_51Mv1ACKNlFQUQJlOwzfFFCAhpiBMWYjIv8IwKIj4napO4hj0jkTPzASzILuKlLevLDGLzCQjoJrXA7pId9IaNUgD00SxObQcXq"

    var stripe,
        api;

    // The items the customer wants to buy
    var amount = 2198,
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

            $(document).on('submit', '#payment-form', function (event) {
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
        $(".card_element").fadeOut(300);

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
            url: "../ajax/ajax-paiementSuccessful.php",
            method: 'POST',
            data: {
                transaction_id: paymentIntentId,
                statut_transaction: status,
                email: $('#email_contact').val()
            },
            cache: false,
            success: function (data) {

                var dtExpire = new Date();
                dtExpire.setTime(dtExpire.getTime() + 730001 * 3600 * 1000);

                setCookie('location_email', $('#email_contact').val(), dtExpire, '/');

                setTimeout(() => {
                    $("#loader-paiement").addClass('hidden');
                    $("#loader-paiement").hide();
                }, 750);

                setTimeout(() => {
                    $("#alert-card-success").fadeIn(300);
                }, 800);

                setTimeout(() => {
                    location.reload()
                }, 6000);

            }

        });

    };

    // Show the customer the error from Stripe if their card fails to charge
    var showError = function (paymentIntentId, status) {

        $.ajax({
            url: "../ajax/ajax-paiementCanceled.php",
            method: 'POST',
            data: {
                transaction_id: '',
                statut_transaction: 'CANCELED',
                email: email
            },
            cache: false,
            success: function (data) {

                setTimeout(() => {
                    $("#loader-paiement").addClass('hidden');
                    $("#loader-paiement").hide();
                }, 750);

                setTimeout(() => {
                    $("#alert-card-danger").fadeIn(300);
                }, 800);

            }

        });



    };

    var showError2 = function () {

        $.ajax({
            url: "../ajax/ajax-paiementCanceled.php",
            method: 'POST',
            data: {
                transaction_id: '',
                statut_transaction: 'CANCELED',
                email: email
            },
            cache: false,
            success: function (data) {

                setTimeout(() => {
                    $("#loader-paiement").addClass('hidden');
                    $("#loader-paiement").hide();
                }, 750);

                setTimeout(() => {
                    $("#alert-card-danger").fadeIn(300);
                }, 800);

            }

        });



    };

    var showError3 = function () {

        $.ajax({
            url: "../ajax/ajax-paiementCanceled.php",
            method: 'POST',
            data: {
                transaction_id: '',
                statut_transaction: 'CANCELED',
                email: email
            },
            cache: false,
            success: function (data) {

                setTimeout(() => {
                    $("#loader-paiement").addClass('hidden');
                    $("#loader-paiement").hide();
                }, 750);

                setTimeout(() => {
                    $("#alert-card-danger").fadeIn(300);
                }, 800);

            }

        })
    };

    var showError4 = function () {

        $.ajax({
            url: "../ajax/ajax-paiementCanceled.php",
            method: 'POST',
            data: {
                transaction_id: '',
                statut_transaction: 'CANCELED',
                email: email
            },
            cache: false,
            success: function (data) {

                setTimeout(() => {
                    $("#loader-paiement").addClass('hidden');
                    $("#loader-paiement").hide();
                }, 750);

                setTimeout(() => {
                    $("#alert-card-danger").fadeIn(300);
                }, 800);

            }

        })

    };

});

// Cookie

function setCookie(nom, valeur, expire, chemin, domaine, securite) {
    document.cookie = nom + ' = ' + escape(valeur) + '  ' +
        ((expire == undefined) ? '' : ('; expires = ' + expire.toGMTString())) +
        ((chemin == undefined) ? '' : ('; path = ' + chemin)) +
        ((domaine == undefined) ? '' : ('; domain = ' + domaine)) +
        ((securite == true) ? '; secure' : '');
}

  // -------- //