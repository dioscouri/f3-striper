<?php 
namespace Striper\Admin\Controllers;

class Settings extends \Admin\Controllers\BaseAuth 
{
	use \Dsc\Traits\Controllers\Settings;
	
	protected $layout_link = 'Striper/Admin/Views::settings/default.php';
	protected $settings_route = '/admin/striper/settings';
    
    protected function getModel()
    {
        $model = new \Striper\Models\Settings;
        return $model;
    }
}