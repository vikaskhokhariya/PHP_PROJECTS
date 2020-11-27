<?php 
	class My404 extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->model('Model');
			$this->load->library('form_validation');
			$this->load->library('upload');	
			$this->load->library('email');
		}
		public function getsetdata()
		{
	    	$msg[''] = '';
	    	$routes = array_reverse($this->router->routes);
	    	foreach ($routes as $key =>$val) 
	    	{
	        	$route = $key;
	        	$key = str_replace(array(':any', ':num'), array('[^/]+', '[0-9]+'), $key);

	        	// Does the RegEx match?
	            if (preg_match('#^' . $key . '$#', $this->uri->uri_string(), $matches))
		            break;
	    	}
	    	if (!$route)
	    	{
	        	$route = $routes['default_route'];
	        }
	    	$route_name = $route;
	    	$pagedata='';
	    	if($route_name=='User_cnt/index')
	    	{
	    		$page=$this->Model->model_select('seo_page_list',array('page_url'=>'User_cnt/index'));
	    		$pagedata=$this->Model->model_select('seo_pages',array('page_list_id'=>$page[0]->page_list_id));
	    	}
	    	else
	    	{
	    		$pagedata = $this->Model->my_query("select pl.*,p.* from seo_page_list as pl,seo_pages as p where p.page_list_id=pl.page_list_id and p.page_slug like '$route_name'");
	    	}
	        if (count($pagedata) > 0) 
	        {
	        	$msg["page_id"] = $pagedata[0]->page_id;
		        $msg["page_title"] = $pagedata[0]->page_title;
		        $msg["page_slug"]=$pagedata[0]->page_slug;
	    	    $msg["meta_keywords"] = $pagedata[0]->meta_keyword;
	        	$msg["meta_description"] = $pagedata[0]->page_desc;

	        	if ($pagedata[0]->content == "") 
	        	{
	            	$msg["page_content"] = "";
	            	$msg["page_content_chk"] = 0;
	        	} 
	        	else 
	        	{
	            	$msg["page_content"] = $pagedata[0]->content;
	            	$msg["page_content_chk"] = 1;
	        	}
	    	} 
	    	else 
	    	{
	            $msg["page_title"] = "Simba Mart";
		        $msg["meta_keywords"] = "No";
	    	    $msg["meta_description"] = "No";
	    	    $msg["page_content"] = "";
	        	$msg["page_content_chk"] = 0;
	    	}
	        return $msg;
		}
		function index()
		{
			$msg=$this->getsetdata();
			$this->load->view('Client/404',$msg);
		}
	}
?>