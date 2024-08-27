$(document).ready(function()
{
    var allowSubmit = false;

    $form = $('form[data-nsStripePayment]');
    $form.prop('action', $form.data('action'));
    $($form.data('button')).prop('disabled', false).html($form.data('defaulttext'));

    $form.submit(function(event)
    {
        if(allowSubmit)
            return true;

        event.preventDefault();

        $($form.data('button')).prop('disabled', true).html($form.data('loadingtext'));
        var success = false;

        Stripe.card.createToken($form, function(status, response)
        {
            switch(status)
            {
                case 200:
                    $form.append($('<input type="hidden" name="stripeToken" />').val(response.id));
                    $form.append($('<input type="hidden" name="stripeResponse" />').val(JSON.stringify(response)));
                    success = true;
                    break;
                case 400:
                    alert('Some required payment information was missing.  Please double check that you have your correct credit card number, CVC, and expiry date.');
                    $($form.data('button')).prop('disabled', false).html($form.data('defaulttext'));
                    break;
                case 401:
                    alert('No valid API key provided.');
                    $($form.data('button')).prop('disabled', false).html($form.data('defaulttext'));
                    break;
                case 402:
                    alert('Card declined. Please double check your card number, CVC and expiry date.');
                    $($form.data('button')).prop('disabled', false).html($form.data('defaulttext'));
                    break;
                case 404:
                    alert('Payment processor not found.');
                    $($form.data('button')).prop('disabled', false).html($form.data('defaulttext'));
                    break;
                case 500:
                case 502:
                case 503:
                case 504:
                    alert('Payment processor server error.  Please try again in a few minutes.');
                    $($form.data('button')).prop('disabled', false).html($form.data('defaulttext'));
                    break;
                default:
                    alert('Unkown error. Please try again in a few minutes.');
                    $($form.data('button')).prop('disabled', false).html($form.data('defaulttext'));
                    break;
            }

            if(success)
            {
                allowSubmit = true;
                $form.submit();
            }
        });

        return false;
   });
});