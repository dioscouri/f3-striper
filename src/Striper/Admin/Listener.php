<?php 
namespace Striper\Admin;

class Listener extends \Prefab 
{
    public function onSystemRebuildMenu( $event )
    {
        if ($model = $event->getArgument('model'))
        {
            $root = $event->getArgument('root');
            $app = clone $model;
        
            $app->insert(array(
                'type' => 'admin.nav',
                'priority' => 50,
                'title' => 'Stripe',
                'icon' => 'fa fa-money',
                'is_root' => false,
                'tree' => $root,
                'base' => '/admin/striper'
            ));
        
            $children = array(
            	array(
            				'title' => 'Payment Requests',
            				'route' => '/admin/striper/paymentrequests',
            				'icon' => 'fa fa-cogs'
            	),
                array(
                    'title' => 'Settings',
                    'route' => '/admin/striper/settings',
                    'icon' => 'fa fa-cogs'
                ),
            );
        
            $app->addChildren($children, $root);
        
            \Dsc\System::instance()->addMessage('Stripe added its admin menu items.');
        }
        
    }
}