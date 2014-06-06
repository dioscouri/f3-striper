<?php 
namespace Striper\Admin\Controllers;

class Events extends \Admin\Controllers\BaseAuth 
{	
	
    use \Dsc\Traits\Controllers\AdminList;
    use \Dsc\Traits\Controllers\SupportPreview;
    
    protected $list_route = '/admin/striper/events';

    protected function getModel($name = 'events')
    {
        $model = null;
        switch( $name ) {
        	case 'events' :
		        $model = new \Striper\Models\Events;
        		break;
       		
        }
        return $model;
    }
	
	public function index()
    {
        // when ACL is ready
        //$this->checkAccess( __CLASS__, __FUNCTION__ );
        
    	//TODO we sync the objects into the collections than we filter and search through them like normal
    	
    	$events = \Stripe_Event::all();
    	foreach ($events['data'] as $event) {
    		
    		
    		//$data = array_filter((array)$event->data->object);
    		
    		
    		$item = $this->getModel();
    		$item->set('event.id', $event->id);
    		$item->set('event.created', $event->created);
    		$item->set('event.type', $event->type);
    		//$item->set('data', $cleaned);
    		$item->save();
    	}
    	
    	
        $model = $this->getModel();
        $state = $model->populateState()->getState();
        $this->app->set('state', $state );
        
        $paginated = $model->paginate();
        $this->app->set('paginated', $paginated );
        
        /*$categories_db = (array) $this->getModel( "categories" )->getItems();
        $categories = array(
        	array( 'text' => 'All Categories', 'value' => ' ' ),
       		array( 'text' => '- Uncategorized -', 'value' => '--' ),
        );
        array_walk( $categories_db, function($cat) use(&$categories) {
        	$categories []= array(
        			'text' => $cat->title,
        			'value' => (string)$cat->slug,
        	);
        } );
        
        $this->app->set('categories', $categories );
        */
        
       /* $all_tags = array(
       		array( 'text' => 'All Tags', 'value' => ' ' ),
       		array( 'text' => '- Untagged -', 'value' => '--' ),
        );
        $tags = (array) $this->getModel()->getTags();
        array_walk( $tags, function($tag) use(&$all_tags) {
        	$all_tags []= array(
        			'text' => $tag,
        			'value' => $tag
        	);
        } );

        $this->app->set('all_tags', $all_tags );
        */
    	
    	
        $this->app->set('meta.title', 'Events');
         
        $view = \Dsc\System::instance()->get('theme');
        echo $view->render('Striper/Admin/Views::events/list.php');
    }
}