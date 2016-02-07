<?php
class StriperBootstrap extends \Dsc\Bootstrap
{
    protected $dir = __DIR__;
    protected $namespace = 'Striper';

    
    protected function runAdmin()
    {	
    	$settings = \Striper\Models\Settings::fetch();
    	// Set your secret key: remember to change this to your live secret key in production
    	// See your keys here https://manage.stripe.com/account
    	\Stripe\Stripe::setApiKey($settings->{$settings->mode.'.secret_key'});
        \Dsc\System::instance()->get('theme')->registerViewPath($this->dir .'/src/Striper/Site/Views', 'Striper/Site/Views' );

    	parent::runAdmin();
    }
    protected function runSite()
    {	
        \Dsc\System::instance()->get('theme')->registerViewPath($this->dir .'/src/Striper/Site/Views', 'Striper/Site/Views' );

    	$settings = \Striper\Models\Settings::fetch();
    	// Set your secret key: remember to change this to your live secret key in production
    	// See your keys here https://manage.stripe.com/account
    	\Stripe\Stripe::setApiKey($settings->{$settings->mode.'.secret_key'});
    	parent::runSite();
    }
}
$app = new StriperBootstrap();