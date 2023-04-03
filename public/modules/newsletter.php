<div class="alert alert-success alert-newsletter mt-5 reveal" role="alert">

    <div class="before-icone mb-3">
        <div class="message-icone"></div>
        <h4 class="alert-heading message-title mb-0 ms-2"></h4>
    </div>

    <p class="text-center message-content mb-0"></p>

</div>

<aside class="bg-success bg-gradient rounded-3 p-4 p-sm-5 mt-5 bloc_newsletter">

    <div class="loader_inf" id="loader_newsletter">
        <img width="67" height="67" src="<?= $image_url . 'loader.svg' ?>">
    </div>

    <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start" id="bloc_newsletter">

        <div class="mb-4 mb-xl-0">

            <div class="fs-3 fw-bold text-white">Ne manquez rien.</div>

            <div class="text-white-50">Inscrivez-vous à notre newsletter pour recevoir les dernières mises à jour.</div>

        </div>

        <div class="ms-xl-4">

            <div class="input-group mb-2">

                <form id="newsletter" method="POST">

                    <input class="form-control" required id="email_newsletter" name="email_newsletter" type="email" placeholder="Adresse email" aria-label="Adresse email" aria-describedby="button-newsletter" />
                    <div id='recaptcha' class="g-recaptcha" data-sitekey="6Ld3v1AlAAAAAN-WwC2MQYPo19jBSBpMYZSWV4eV" data-callback="recaptchacheck" data-size="invisible"></div>
                    <button class="btn btn-outline-light" id="button-newsletter" type="submit">S'inscrire</button>

                </form>

            </div>

            <div class="small text-white-50">Nous nous soucions de la confidentialité et ne partagerons jamais vos données.</div>

        </div>

    </div>

</aside>