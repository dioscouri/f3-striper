<?php
namespace Striper\Models;

class PaymentRequests extends \Dsc\Mongo\Collections\Describable
{
    public $amount = null;
 	public $client = array();
 	public $items = array();
 	public $copy = null;
   
    protected $__collection_name = 'striper.paymentrequests';
    protected $__type = 'striper.paymentrequests';

    protected function fetchConditions()
    {
        parent::fetchConditions();

        
       
            
        return $this;
    }
    
    
    public function amount()
    {
        $amount = $this->amount;
        
        // TODO ensure that the $amount value is a float, if necessary, 
        // and if a decimal is present, convert it to whatever format stripe requires

        return $amount;
    }
    
    public function amountForStripe()
    {
        $amount = $this->amount;
    
        // ensure that the $amount value is a float, if necessary,
        // and if a decimal is present, convert it to whatever format stripe requires
        if (strpos($amount, '.') !== false) {
            $amount = $amount * 100;
        }
    
        return $amount;
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


    protected function beforeSave()
    {
        $this->amount = (float) $this->amount;
        
        foreach ($this->items as $key=>$item) 
        {
        	if (empty($item['description']) && empty($item['quantity']) && empty($item['rate'])) 
        	{
        		unset($this->items[$key]);
        	}
        }
        $this->items = array_values($this->items);
        
        return parent::beforeSave();
    }
}