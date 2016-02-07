<?php
namespace Striper\Models;

class Accounts extends \Dsc\Mongo\Collections\Describable
{

 	
   
    protected $__collection_name = 'striper.accounts';
    protected $__type = 'striper.accounts';

    protected function fetchConditions()
    {
        parent::fetchConditions();

        
       
            
        return $this;
    }
    
    
}