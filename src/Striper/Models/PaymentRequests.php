<?php
namespace Striper\Models;

class PaymentRequests extends \Dsc\Mongo\Collections\Taggable
{
 	var $title = '';
 	var $client = array();
 	var $items = array();
 	
   
    protected $__collection_name = 'striper.paymentrequests';
    protected $__type = 'striper.paymentrequests';

    protected function fetchConditions()
    {
        parent::fetchConditions();

        
       
            
        return $this;
    }
    
    public function  getTotal() {
    	//calculate the total
    	return 1000;
    }
    
    public function  acceptPayment($charge) {
    	//update the document that we got paid
    }
    

    protected function beforeValidate()
    {
        return parent::beforeValidate();
    }

    public function validate()
    {
       
        return parent::validate();
    }



}