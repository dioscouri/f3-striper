<?php 
namespace Striper\Site\Controllers;

class PaymentRequests extends \Dsc\Controller 
{    
    protected function getModel() 
    {
        $model = new \Striper\Models\PaymentRequests;
        return $model; 
    }
    
    public function index()
    {
    	$id = $this->inputfilter->clean( $this->app->get('PARAMS.id'), 'alnum' );
    	$number = $this->inputfilter->clean( $this->app->get('PARAMS.number'), 'alnum' );
    	$model = $this->getModel();
    	if($id) {
    		$model->setState('filter.id',$id);
    	} elseif($number) {
    		$model->setState('filter.number',$number);
    		
    	}
    		
    	try {
    	    $paymentrequest = $model->getItem();
    	} catch ( \Exception $e ) {
    		\Dsc\System::instance()->addMessage( "Invalid Items", 'error');
    		$f3->reroute( '/' );
    		return;
    	}
    	
    	

    	$this->app->set('meta.title', $paymentrequest->title );
    	$this->app->set('paymentrequest', $paymentrequest );
    	$this->app->set('settings', \Striper\Models\Settings::fetch());
    	$view = \Dsc\System::instance()->get('theme');
    	echo $view->render('Striper/Site/Views::paymentrequest/index.php');
    	 
    }
    
    public function charge() {
    	$id = $this->inputfilter->clean( $this->app->get('PARAMS.id'), 'alnum' );
    	$request = $model = $this->getModel()->setState('filter.id',$id);
    	$settings = \Striper\Models\Settings::fetch();
    	// Set your secret key: remember to change this to your live secret key in production
    	// See your keys here https://manage.stripe.com/account
    	\Stripe::setApiKey($settings->{$settings->mode.'.secret_key'});
    	
    	// Get the credit card token submitted by the form
    	$token = $this->inputfilter->clean( $_POST['stripeToken'], 'string' );
    	
    	// Create the charge on Stripe's servers - this will charge the user's card
    	try {
    		$charge = \Stripe_Charge::create(array(
    				"amount" => $request->getTotal(), // amount in cents, again
    				"currency" => "usd",
    				"card" => $token,
    				"description" => "payinguser@example.com")
    		);
    		//this needs to be created empty in model
    		$request->acceptPayment($charge);
    		
    		//SEND email to the client
    		
    		
    		$this->app->set('charge', $charge);
    		$this->app->set('paymentrequest', $request);
    				
    		
    		$view = \Dsc\System::instance()->get('theme');
    		echo $view->render('Striper/Site/Views::paymentrequest/success.php');
    	} catch(\Stripe_CardError $e) {
    		
    		
    		// The card has been declined
    		$view = \Dsc\System::instance()->get('theme');
    		echo $view->render('Striper/Site/Views::paymentrequest/index.php');
    	}
    	
    }
}