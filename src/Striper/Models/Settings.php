<?php 
namespace Striper\Models;

class Settings extends \Dsc\Mongo\Collections\Settings
{
    protected $__type = 'striper.settings';

    public $mode = 'test';
    
    public $test = array(
        'secret_key' => null,
        'publishable_key' => null
    );
    
    public $live = array(
        'secret_key' => null,
        'publishable_key' => null
    );
}