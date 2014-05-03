<?php
namespace Striper\Admin;

class Routes extends \Dsc\Routes\Group
{
    public function initialize()
    {
        $this->setDefaults(array(
            'namespace' => '\Striper\Admin\Controllers',
            'url_prefix' => '/admin/stripe'
        ));
        
        $this->addSettingsRoutes();
    }
}