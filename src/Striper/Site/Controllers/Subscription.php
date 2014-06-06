<?php
namespace Striper\Site\Controllers;

class Subscription extends \Dsc\Controller
{

    protected function getModel()
    {
        $model = new \Striper\Models\Subscriptions;
        return $model;
    }

    public function read()
    {
        $id = $this->inputfilter->clean($this->app->get('PARAMS.id'), 'alnum');
        
        $number = $this->inputfilter->clean($this->app->get('PARAMS.number'), 'cmd'); // these are like slugs, and can have a hyphen in them
        
        $model = $this->getModel();
        if ($id)
        {
            $model->setState('filter.id', $id);
        }
        elseif ($number)
        {
            $model->setState('filter.number', $number);
        }
        else {
            \Dsc\System::instance()->addMessage("Invalid Item", 'error');
            $this->app->reroute('/');        	
        }
        
        try
        {
            $subscription = $model->getItem();
            if (empty($subscription->id)) 
            {
            	throw new \Exception;
            }
        }
        catch (\Exception $e)
        {
            \Dsc\System::instance()->addMessage("Invalid Item", 'error');
            $this->app->reroute('/');
            return;
        }
        
        $this->app->set('meta.title', $subscription->title);
        $this->app->set('subscription', $subscription);
        $settings = \Striper\Models\Settings::fetch();
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here https://manage.stripe.com/account
        \Stripe::setApiKey($settings->{$settings->mode.'.secret_key'});
        $this->app->set('plan', \Stripe_Plan::retrieve($subscription->{'plan'}));
        $this->app->set('settings', $settings);
        
        echo $this->theme->render('Striper/Site/Views::subscription/read.php');
    }

    
    public function charge()
    {
        $id = $this->inputfilter->clean($this->app->get('PARAMS.id'), 'alnum');
    
        $request = $this->getModel()->setState('filter.id', $id)->getItem();
        $settings = \Striper\Models\Settings::fetch();
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here https://manage.stripe.com/account
        \Stripe::setApiKey($settings->{$settings->mode.'.secret_key'});
        
        // Get the credit card token submitted by the form
        $token = $this->inputfilter->clean($this->app->get('POST.stripeToken'), 'string');
        
        // Create the charge on Stripe's servers - this will charge the user's card
        try
        {
            $charge = \Stripe_Charge::create(array(
                "amount" => $request->amountForStripe(), // amount in cents, again
                "currency" => "usd",
                "card" => $token,
                "description" => $request->{'client.email'}
            ));
            // this needs to be created empty in model
          
            $request->acceptPayment($charge);
            // SEND email to the client
            $request->sendChargeEmailClient($charge);
            $request->sendChargeEmailAdmin($charge);
            
            $this->app->set('charge', $charge);
            $this->app->set('paymentrequest', $request);
            
            $view = \Dsc\System::instance()->get('theme');
            echo $view->render('Striper/Site/Views::subscriptions/success.php');
        }
        catch (\Stripe_CardError $e)
        {
            
            // The card has been declined
            $view = \Dsc\System::instance()->get('theme');
            echo $view->render('Striper/Site/Views::subscriptions/index.php');
        }
    }
}