<?php
namespace Striper\Models;

class Events extends \Dsc\Mongo\Collection
{
	var $event = array('id' => null, 'created' =>null, 'type' => null );
	
	var $data = array();
	
    protected $__collection_name = 'striper.events';
    protected $__type = 'striper.events';

   
}