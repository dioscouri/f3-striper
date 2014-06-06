<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.8.1/jquery.validate.min.js"></script>
<script src="https://js.stripe.com/v2/"></script>
        
<div class="container">
    
    <?php if (!empty($subscription->title)) { ?>
            <div class="panel-heading">
                <h1 class="panel-title">
                    <?php echo $subscription->title; ?>
                </h1>
            </div>
        <?php } ?>
    
    <hr />
   
    
    <div class="panel panel-default">
        
        
        <div class="panel-body">
            <?php if (!empty($subscription->copy)) { ?>
                <div>        
                    <?php echo $subscription->copy; ?>
                </div>
                
                <hr/>
            <?php } ?>
            
            <?php if (!empty($plan)) { ?>
              I agree to the charges of <?php setlocale(LC_MONETARY, 'en_US.UTF-8');
echo money_format('$%i', number_format(($plan->amount/100),2));?>/<?php echo $plan->interval; ?>
            <?php } ?>
            
        
            <?php if (!empty($subscription->amount())) { ?>
                <?php // TODO Format this so it looks like currency ?>
                    <h3>
                        Total: <?php echo $subscription->amount(); ?>
                    </h3>
            <?php } ?>
        </div>
    
    </div>
    
    <form action="./striper/subscription/charge/<?php echo $subscription->id ?>" method="post">
        <?php // TODO Replate this with a normal credit card input form rather than the Stripe lightbox, no? that's what all the jQuery.validate below is assuming... ?>
        <p>
            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" 
            data-key="<?php echo $settings->{$settings->mode.'.publishable_key'} ?>"
            data-image="/theme/img/logo.png" 
            data-name="<?php echo $subscription->title; ?>" 
            data-description="charges of <?php setlocale(LC_MONETARY, 'en_US');
echo money_format('%i', number_format(($plan->amount/100),2));?>/<?php echo $plan->interval; ?>" 
            data-email="<?php echo $subscription->{'client.email'}; ?>" 
            data-allow-remember-me="false" 
            data-amount="<?php echo $plan->amount ?>">
            </script>
        </p>
    </form>

</div>

<div class="clearfix">
    <?php // echo \Dsc\Debug::dump($subscription->cast()); ?>
</div>

<script>
Stripe.setPublishableKey('<?php echo $settings->{$settings->mode.'.publishable_key'} ?>');

$(document).ready(function() {
    function addInputNames() {
        // Not ideal, but jQuery's validate plugin requires fields to have names
        // so we add them at the last possible minute, in case any javascript 
        // exceptions have caused other parts of the script to fail.
        $(".card-number").attr("name", "card-number")
        $(".card-cvc").attr("name", "card-cvc")
        $(".card-expiry-year").attr("name", "card-expiry-year")
    }

    function removeInputNames() {
        $(".card-number").removeAttr("name")
        $(".card-cvc").removeAttr("name")
        $(".card-expiry-year").removeAttr("name")
    }

    function submit(form) {
        // remove the input field names for security
        // we do this *before* anything else which might throw an exception
        removeInputNames(); // THIS IS IMPORTANT!

        // given a valid form, submit the payment details to stripe
        $(form['submit-button']).attr("disabled", "disabled")

        Stripe.card.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(), 
            exp_year: $('.card-expiry-year').val()
        }, function(status, response) {
            if (response.error) {
                // re-enable the submit button
                $(form['submit-button']).removeAttr("disabled")

                // show the error
                $(".payment-errors").html(response.error.message);

                // we add these names back in so we can revalidate properly
                addInputNames();
            } else {
                // token contains id, last4, and card type
                var token = response['id'];

                // insert the stripe token
                var input = $("<input name='stripeToken' value='" + token + "' style='display:none;' />");
                form.appendChild(input[0])

                // and submit
                form.submit();
            }
        });
        
        return false;
    }
    
    // add custom rules for credit card validating
    jQuery.validator.addMethod("cardNumber", Stripe.card.validateCardNumber, "Please enter a valid card number");
    jQuery.validator.addMethod("cardCVC", Stripe.card.validateCVC, "Please enter a valid security code");
    jQuery.validator.addMethod("cardExpiry", function() {
        return Stripe.card.validateExpiry($(".card-expiry-month").val(), 
                                     $(".card-expiry-year").val())
    }, "Please enter a valid expiration");

    // We use the jQuery validate plugin to validate required params on submit
    $("#example-form").validate({
        submitHandler: submit,
        rules: {
            "card-cvc" : {
                cardCVC: true,
                required: true
            },
            "card-number" : {
                cardNumber: true,
                required: true
            },
            "card-expiry-year" : "cardExpiry" // we don't validate month separately
        }
    });

    // adding the input field names is the last step, in case an earlier step errors                
    addInputNames();
});
</script>
