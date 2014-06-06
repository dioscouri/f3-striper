<?php
namespace Striper\Site\Controllers;

class Webhooks extends \Dsc\Controller
{

    
    public function receive() {

            // Retrieve the request's body and parse it as JSON
        $body = @file_get_contents('php://input');
        $event_json = json_decode($body);

        foreach ($event_json as $event) {
            # code...
        }
    }


}