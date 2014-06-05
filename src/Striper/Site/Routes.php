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
    }
}