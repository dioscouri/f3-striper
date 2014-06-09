<?php
namespace Striper\Site\Controllers;

class Webhooks extends \Dsc\Controller
{

    
    public function receive() {

            // Retrieve the request's body and parse it as JSON
        $body = @file_get_contents('php://input');
        $event_json = json_decode($body);
        $name = 'onStriperWebhook';
        if(is_array($event_json)) {
	        foreach ($event_json as $event) {
	         	 
	        	$parts = explode('.', $event->type);

	        	foreach ($parts as $seg) {
	        	 	$name .= ucfirst($seg);
	        	} 
	        	\Dsc\System::instance()->trigger($name, array('event' => $event));    
	      	  
	        }	
        } else {
        	$parts = explode('.', $event_json->type);
        	foreach ($parts as $seg) {
	        	 	$name .= ucfirst($seg);
	        } 
	        \Dsc\System::instance()->trigger($name, array('event' => $event_json));  
        }
        
    }


}