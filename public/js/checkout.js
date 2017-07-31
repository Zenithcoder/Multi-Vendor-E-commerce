/**
 * Created by user on 26-04-17.
 */

Stripe.setPublishableKey('pk_test_JmmVRPDgbHKMFQaJ3h55Yc8P');
/*Payment form javascript */
var $form = $('#payment-form');
$form.submit(function(event){
    $('#charge-error').addClass('hidden');
    /* Visual feedback */
    $form.find('button').prop('disabled',true);
    // .html('Validating <i class="fa fa-spinner fa-pulse"></i>');

    Stripe.card.createToken({
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        name: $('#card-name').val()
    }, stripeResponseHandler);

    return false;

});

    function stripeResponseHandler(status, response) {

        if(response.error) {
            $('#charge-error').removeClass('hidden');
            $('#charge-error').text(response.error.message);
            $form.find('button').prop('disabled',false);
        } else {
            // Get the token ID:
            var token = response.id;
            // Insert the token into the form so it gets submitted to the server:
            $form.append($('<input type="hidden" name="stripeToken" />').val(token));

            // Submit the form:
            $form.get(0).submit();
        }

}


