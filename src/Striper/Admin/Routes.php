<?php
namespace Striper\Admin;

class Routes extends \Dsc\Routes\Group
{
    public function initialize()
    {
        $this->setDefaults(array(
            'namespace' => '\Striper\Admin\Controllers',
            'url_prefix' => '/admin/striper'
        ));
        
        $this->addCrudGroup( 'Plans', 'Plan' );
        $this->addCrudGroup( 'Subscriptions', 'Subscription' );
        $this->addCrudGroup( 'PaymentRequests', 'PaymentRequest' );
        $this->add( '/events', 'GET', array(
        		'controller' => 'Events',
        		'action' => 'index'
        ) );
        
        $this->addSettingsRoutes();
    }
}