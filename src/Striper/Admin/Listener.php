<?php 
namespace Striper\Admin;

class Listener extends \Prefab 
{
    public function onSystemRebuildMenu( $event )
    {
        if ($mapper = $event->getArgument('mapper')) 
        {
        	$mapper->reset();
        	$mapper->priority = 50;
        	$mapper->title = 'Stripe';
        	$mapper->base = '/admin/stripe';
        	$mapper->route = '';
        	$mapper->icon = 'fa fa-money';
        	$mapper->children = array(
        	        json_decode(json_encode(array( 'title'=>'Settings', 'route'=>'/admin/stripe/settings', 'icon'=>'fa fa-cogs' )))
        	);
        	$mapper->save();
        	
        	\Dsc\System::instance()->addMessage('Mailer added its admin menu items.');
        }
        
    }
}