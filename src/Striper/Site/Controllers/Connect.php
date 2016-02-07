<?php
namespace Striper\Site\Controllers;

class Connect extends \Dsc\Controller
{

    protected function getModel()
    {
        $model = new \Striper\Models\Accounts;
        return $model;
    }

    public function connect() {
    	
    	
    	$user = $this->getIdentity();
    	
    	$data = $_REQUEST;
    	
    	$user->set('stripe.account', $data['code']);
    	$user->save();
    	
    	$this->app->reroute();
    	
    }
}