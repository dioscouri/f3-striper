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
                'base' => '/admin/stripe'
            ));
        
            $children = array(
                array(
                    'title' => 'Settings',
                    'route' => '/admin/stripe/settings',
                    'icon' => 'fa fa-cogs'
                ),
            );
        
            $app->addChildren($children, $root);
        
            \Dsc\System::instance()->addMessage('Stripe added its admin menu items.');
        }
        
    }
}