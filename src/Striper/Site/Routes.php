<?php
namespace Striper\Site;

class Routes extends \Dsc\Routes\Group
{

    public function initialize()
    {
        $this->setDefaults(array(
            'namespace' => '\Striper\Site\Controllers',
            'url_prefix' => '/striper'
        ));
        $this->add('/webhooks', 'POST', array(
            'controller' => 'Webhooks',
            'action' => 'receive'
        ));
        
        $this->add('/connect', 'GET|POST', array(
        		'controller' => 'Connect',
        		'action' => 'connect'
        ));
        
        $this->add('/paymentrequest/@id', 'GET', array(
            'controller' => 'PaymentRequest',
            'action' => 'read'
        ));
        
        $this->add('/paymentrequest/number/@number', 'GET', array(
            'controller' => 'PaymentRequest',
            'action' => 'read'
        ));
        
        $this->add('/paymentrequest/charge/@id', 'POST', array(
            'controller' => 'PaymentRequest',
            'action' => 'charge'
        ));

        $this->add('/subscription/@id', 'GET', array(
            'controller' => 'Subscription',
            'action' => 'read'
        ));
        
        $this->add('/subscription/number/@number', 'GET', array(
            'controller' => 'Subscription',
            'action' => 'read'
        ));
         $this->add('/subscription/charge/@id', 'POST', array(
            'controller' => 'Subscription',
            'action' => 'charge'
        ));
         $this->add('/subscription/cancel/@id', 'GET', array(
         		'controller' => 'Subscription',
         		'action' => 'cancel'
         ));
         
         $this->add('/account/payment/connect', 'POST', array(
         		'controller' => 'Connect',
         		'action' => 'connect'
         ));
         
    }
}