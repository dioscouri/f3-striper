<?php
namespace Striper\Models;

class Plans extends \Dsc\Mongo\Collections\Describable
{
    public $stripe = array();
 	public $site = array();
 	
   
    protected $__collection_name = 'striper.plans';
    protected $__type = 'striper.plans';

    protected function fetchConditions()
    {
        parent::fetchConditions();

        
       
            
        return $this;
    }
    
    
    public function amount()
    {
        $amount = $this->{'stripe.amount'};
        
        // TODO ensure that the $amount value is a float, if necessary, 
        // and if a decimal is present, convert it to whatever format stripe requires

        return $amount;
    }
    
    public function amountForStripe()
    {
         $amount = $this->{'stripe.amount'};
    
        // ensure that the $amount value is a float, if necessary,
        // and if a decimal is present, convert it to whatever format stripe requires
        if (strpos($amount, '.') !== false) {
            $amount = $amount * 100;
        }
    
        return $amount;
    }

    public static function planDescription($plan)
    {   
        $amount = money_format('$%i', number_format(( $plan->amount/100),2));
        $interval = $plan->interval;
        $interval_count = $plan->interval_count;
        $string = $amount;
        if($interval_count > 1) {
            $string .= ' every ' .$interval_count ;
            switch ($interval) {
                case 'week':
                    $string .= ' weeks. ';
                    break;
                case 'month':
                    $string .= ' months ';
                    break;
                case 'year':
                    $string .= ' years ';
                    break;    
            }
        } else {
            $string .= '/'.$interval;
        }

        return $string;
    }
    
    
    public function  acceptPayment($charge) {
    	//update the document that we got paid
    	$this->status = 'PAID';
    	$this->charge = array('id' => $charge->id, 'created' =>  $charge->created);
    	$this->save();
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
        $this->{'stripe.amount'} = (float) $this->{'stripe.amount'};
        
        return parent::beforeSave();
    }
    
    public function sendChargeEmailClient($charge){
    	
     \Dsc\System::instance()->get('mailer')->send($this->{'client.email'}, $subject, array($html, $text) );
    	 
    }
    
    public function sendChargeEmailAdmin($charge){
    	 
    }
    
}