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
        $this->app->set('subscription', $subscription);
        if(empty($subscription->subscriber)) {
        $this->app->set('meta.title', $subscription->title);
        
        $settings = \Striper\Models\Settings::fetch();
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here https://manage.stripe.com/account
        
        $this->app->set('plan', \Stripe_Plan::retrieve($subscription->{'plan'}));
        $this->app->set('settings', $settings);
        
        echo $this->theme->render('Striper/Site/Views::subscription/read.php');
        } else {
        echo $this->theme->render('Striper/Site/Views::subscription/alreadypaid.php');
        }
      	
        
    }

    
    public function charge()
    {
        $id = $this->inputfilter->clean($this->app->get('PARAMS.id'), 'alnum');
    
        $subscription = $this->getModel()->setState('filter.id', $id)->getItem();
        
        // Get the credit card token submitted by the form
        $token = $this->inputfilter->clean($this->app->get('POST.stripeToken'), 'string');
        $email = $this->inputfilter->clean($this->app->get('POST.stripeEmail'), 'string');
        
        // Create the charge on Stripe's servers - this will charge the user's card
        try
        {	
        	//create a stripe user 
        	$user = \Stripe_Customer::create(array(
			  "description" => "Customer for ".$email,
			  "email" => $email,
			  "card" => $token // obtained with Stripe.js
			));
        	$user->subscriptions->create(array("plan" => $subscription->plan));
        	
            // this needs to be created empty in model
          
            $subscription->set('subscriber.id',  $user->id );
            $subscription->set('subscriber.email',   $user->email );
            $subscription->set('client.email', $email );
            $subscription->save();
            // SEND email to the client
            
            $this->app->set('subscription', $subscription);
            $this->app->set('plan', \Stripe_Plan::retrieve($subscription->{'plan'}));
            
            $subscription->sendChargeEmailClient($subscription);
            $subscription->sendChargeEmailAdmin($subscription);
            
           
            
            
            $view = \Dsc\System::instance()->get('theme');
            echo $view->render('Striper/Site/Views::subscription/success.php');
        }
        catch (\Stripe_CardError $e)
        {
            //set error message
            
            // The card has been declined
            $view = \Dsc\System::instance()->get('theme');
            echo $view->render('Striper/Site/Views::subscription/index.php');
        }
    }
}