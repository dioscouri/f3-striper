<?php 
namespace Striper\Admin\Controllers;

class Plan extends \Admin\Controllers\BaseAuth 
{
    use \Dsc\Traits\Controllers\CrudItemCollection;
    use \Dsc\Traits\Controllers\SupportPreview;

    protected $list_route = '/admin/striper/plans';
    protected $create_item_route = '/admin/striper/plan/create';
    protected $get_item_route = '/admin/striper/plan/read/{id}';    
    protected $edit_item_route = '/admin/striper/plan/edit/{id}';
    
    protected function getModel() 
    {
        $model = new \Striper\Models\Plans;
        return $model; 
    }
    
    protected function getItem() 
    {
        $f3 = \Base::instance();
        $id = $this->inputfilter->clean( $f3->get('PARAMS.id'), 'alnum' );
        $model = $this->getModel()
            ->setState('filter.id', $id);

        try {
            $item = $model->getItem();
        } catch ( \Exception $e ) {
            \Dsc\System::instance()->addMessage( "Invalid Item: " . $e->getMessage(), 'error');
            $f3->reroute( $this->list_route );
            return;
        }

        return $item;
    }
    
    protected function displayCreate() 
    {
        $f3 = \Base::instance();
        
        $item = $this->getItem();
        
        //$model = new \Striper\Models\Categories;
        //$categories = $model->getList();
        //\Base::instance()->set('categories', $categories );
        //\Base::instance()->set('selected', 'null' );

       /* $selected = array();
        $flash = \Dsc\Flash::instance();
        $input = $flash->old('category_ids');

        if (!empty($input)) 
        {
            foreach ($input as $id)
            {
                $id = $this->inputfilter->clean( $id, 'alnum' );
                $selected[] = array('id' => $id);
            }
        }
        
        $flash->store( (array) $flash->get('old') + array('categories'=>$selected));        

        $all_tags = $this->getModel()->getTags();
        \Base::instance()->set('all_tags', $all_tags );
        */
        $this->app->set('meta.title', 'Create Payment Request');
        
        $view = \Dsc\System::instance()->get('theme');
        $view->event = $view->trigger( 'onDisplayPlansEdit', array( 'item' => $item, 'tabs' => array(), 'content' => array() ) );
        
        echo $view->render('Striper/Admin/Views::plans/create.php');
    }
    
    protected function displayEdit()
    {
        $f3 = \Base::instance();

        $item = $this->getItem();
        
        /*$model = new \Striper\Models\Categories;
        $categories = $model->getList();
        \Base::instance()->set('categories', $categories );
        \Base::instance()->set('selected', 'null' );
        
        $all_tags = $this->getModel()->getTags();
        \Base::instance()->set('all_tags', $all_tags );
        */
        $this->app->set('meta.title', 'Edit Payment Request');
        $this->app->set( 'allow_preview', $this->canPreview( true ) );
        
        $view = \Dsc\System::instance()->get('theme');
        $view->event = $view->trigger( 'onDisplayPlansEdit', array( 'item' => $item, 'tabs' => array(), 'content' => array() ) );
        
        echo $view->render('Striper/Admin/Views::plans/edit.php');
    }
    
    protected function doAdd($data) 
    {
        if (empty($this->list_route)) {
            throw new \Exception('Must define a route for listing the items');
        }
                
        if (empty($this->create_item_route)) {
            throw new \Exception('Must define a route for creating the item');
        }
                
        if (empty($this->edit_item_route)) {
            throw new \Exception('Must define a route for editing the item'); 
        }
        
        if (!isset($data['submitType'])) {
            $data['submitType'] = "save_edit";
        }
        
        $f3 = \Base::instance();
        $flash = \Dsc\Flash::instance();
        $model = $this->getModel();
        
        // save
        try {
            $values = $data;
		        
            $create = array_filter($values['stripe']);
        
            //make a method for this, convert float to cents
            $create['amount'] = (int) $create['amount']*100;
	   $settings = \Striper\Models\Settings::fetch();
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here https://manage.stripe.com/account
        \Stripe::setApiKey($settings->{$settings->mode.'.secret_key'});	
            $plan = \Stripe_Plan::create($create);
			
            
           
            $values['stripe'] = array('id'=>$plan->id, 'name'=>$plan->name, 'created' => $plan->created);
            unset($values['submitType']);
            //\Dsc\System::instance()->addMessage(\Dsc\Debug::dump($values), 'warning');
            $this->item = $model->create($values);
        }
        catch (\Exception $e) {
            \Dsc\System::instance()->addMessage('Save failed with the following errors:', 'error');
            \Dsc\System::instance()->addMessage($e->getMessage(), 'error');
            if (\Base::instance()->get('DEBUG')) {
                \Dsc\System::instance()->addMessage($e->getTraceAsString(), 'error');
            }
            
            if ($f3->get('AJAX')) {
                // output system messages in response object
                return $this->outputJson( $this->getJsonResponse( array(
                        'error' => true,
                        'message' => \Dsc\System::instance()->renderMessages()
                ) ) );
            }
           
            // redirect back to the create form with the fields pre-populated
            \Dsc\System::instance()->setUserState('use_flash.' . $this->create_item_route, true);
            $flash->store($data);
            
            $this->setRedirect( $this->create_item_route );
                        
            return false;
        }
                
        // redirect to the editing form for the new item
        \Dsc\System::instance()->addMessage('Item saved', 'success');
        
        if (method_exists($this->item, 'cast')) {
            $this->item_data = $this->item->cast();
        } else {
            $this->item_data = \Joomla\Utilities\ArrayHelper::fromObject($this->item);
        }
        
        if ($f3->get('AJAX')) {
            return $this->outputJson( $this->getJsonResponse( array(
                    'message' => \Dsc\System::instance()->renderMessages(),
                    'result' => $this->item_data
            ) ) );
        }
        
        switch ($data['submitType']) 
        {
            case "save_new":
                $route = $this->create_item_route;
                break;
            case "save_close":
                $route = $this->list_route;
                break;
            default:
                $flash->store($this->item_data);
                $id = $this->item->get( $this->getItemKey() );
                $route = str_replace('{id}', $id, $this->edit_item_route );                
                break;
        }

        $this->setRedirect( $route );
        
        return $this;
    }


    /**
     * This controller doesn't allow reading, only editing, so redirect to the edit method
     */
    protected function doRead(array $data, $key=null) 
    {
        $f3 = \Base::instance();
        $id = $this->getItem()->get( $this->getItemKey() );
        $route = str_replace('{id}', $id, $this->edit_item_route );
        $f3->reroute( $route );
    }
    
    protected function displayRead() {}
}
