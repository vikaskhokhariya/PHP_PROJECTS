<?php 
	class User_cnt extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->model('Model');
			$this->load->library('form_validation');
			$this->load->library('upload');	
			$this->load->library('email');
			$this->load->database('second', TRUE);
		}

		function load_marketlist()
		{
			$msg=$this->getsetdata();
			$this->load->view('Client/marketlist',$msg);
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
			//print_r($msg);
			$this->load->view('Client/home',$msg);
		}
		
		function load_home()
		{
			$msg=$this->getsetdata();
			$this->load->view('Client/home',$msg);
		}

		function load_login()
		{
			$msg=$this->getsetdata();
			$this->load->view('Client/login',$msg);
		}
		
		function register_business()
		{
			$msg=$this->getsetdata();
			$this->load->view('Client/registerbusiness',$msg);
		}

		function load_contactus()
		{
			$msg=$this->getsetdata();
			$this->load->view('Client/contactus',$msg);
		}

		function load_aboutus()
		{
			$msg=$this->getsetdata();
			$this->load->view('Client/aboutus',$msg);
		}

		function load_subcategorylist()
		{
			$msg=$this->getsetdata();
			//print_r($msg);
			$this->load->view('Client/subcategory-list',$msg);
		}

		function load_productlist()
		{
			$msg=$this->getsetdata();
			$this->load->view('Client/productlist',$msg);
		}

		function load_allmaincategorylist()
		{
			$msg=$this->getsetdata();
			$this->load->view('Client/all-maincategory-list',$msg);
		}

		function load_allblogs()
		{
			$msg=$this->getsetdata();
			$this->load->view('Client/blogs',$msg);
		}

		function load_services()
		{
			$msg=$this->getsetdata();
			$this->load->view('Client/services',$msg);
		}

		function add_enquiry()
		{
			$this->form_validation->set_rules('nm','Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('email','Email','required|regex_match[/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix]');
			$this->form_validation->set_rules('enq','Enquiry','required');
			$this->form_validation->set_error_delimiters('<div class="errr">','</div>');

			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>0,'msg'=>validation_errors());
			}
			else
			{
				$name=$this->input->post('nm');
				$email=$this->input->post('email');
				$enq=$this->input->post('enq');

				$data=array('enq_id'=>null,'enq_name'=>$name,'enq_email'=>$email,'enq_enq'=>$enq);

				$q=$this->Model->model_insert('tbl_enquiry',$data);

				if($q!='')
				{
					$answer=array('code'=>1,'msg'=>'sucess');
				}
				else
				{ 
					$answer=array('code'=>0,'msg'=>'failed');
				}
			}
			echo json_encode($answer);
		}

		function seller_registration()
		{
			$answer = array();

			$this->form_validation->set_rules('username','User Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('businessname','Business Name','required');
			$this->form_validation->set_rules('email','Business Email','required|valid_email');
			$this->form_validation->set_rules('mobileno','Mobile Number','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('password','Password','required|min_length[5]|max_length[20]');

			if($this->form_validation->run()==false)
        	{
            	$answer=array('code'=>0,'msg'=>validation_errors());
        	}
        	else
        	{
        		$username = $this->input->post('username');
        		$businessname = $this->input->post('businessname');
        		$email = $this->input->post('email');
        		$mobileno = $this->input->post('mobileno');
        		$password = $this->input->post('password');

        		$dataseller = array('seller_name'=>$username,'business_name'=>$businessname,'p_email'=>$email,'password'=>md5($password),'p_contact'=>$mobileno);
        		$resultseller = $this->Model->model_insert('sellersimbamart.tbl_seller',$dataseller);

        		$sellerid=$this->db->insert_id();
        		$databusiness = array('business_name'=>$businessname,'seller_id'=>$sellerid);
        		$resultbusiness = $this->Model->model_insert('sellersimbamart.tbl_business',$databusiness);

        		if($resultseller!='' && $resultbusiness)
        		{
        			$answer = array('code'=>1);
        		}
        		else
        		{
        			$answer = array('code'=>0);
        		}
        	}
        	echo json_encode($answer);
		}
	}
?>