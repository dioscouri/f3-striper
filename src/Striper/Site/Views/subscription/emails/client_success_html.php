<h1>Success!</h1>
<p>
You have successfully subscribed to <?php echo $plan->name; ?>, at a billing rate of 
<?php setlocale(LC_MONETARY, 'en_US.UTF-8');
echo money_format('$%i', number_format(($plan->amount/100),2));?>/<?php echo $plan->interval; ?>
</p>
Reference Number: <?php echo $subscription->{'subscriber.id'}; ?>

