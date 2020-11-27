<?php 
	class Product extends CI_Controller
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

		function index()
		{
		
		}

		function newproduct()
		{
			$this->load->view('Seller/Product/addproduct');
		}	

		function manageproduct()
		{
			$result['product'] = $this->Model->model_select('tbl_product',array('seller_id'=>$this->session->userdata("sellerid")));
			$this->load->view('Seller/Product/productlist',$result);
		}

		function find_subcategorylist($maincatid)
		{
			$subcatresult=$this->Model->model_select('simbamart.tbl_category',array('parentid'=>$maincatid));

			$bigdata='<option hidden="" value="">Select</option>';
			foreach($subcatresult as $value)
			{
				$bigdata.='<option value="'.$value->cat_id.'">'.$value->cat_name.'</option>';
			}
			echo $bigdata;
		}

		function add_product()
		{
			$answer = array();

			$this->form_validation->set_rules('productname','Product Name','required');
			$this->form_validation->set_rules('productprice','Product Price','required|numeric');
			$this->form_validation->set_rules('unittype','Unit Type','required|regex_match[/^[a-zA-Z][a-zA-Z]+$/]');
			$this->form_validation->set_rules('minqty','Minimum Order Quantity','required|numeric');
			$this->form_validation->set_rules('description','Description','required');
			$this->form_validation->set_rules('maincategory','Main Category','required');
			$this->form_validation->set_rules('subcategory','Sub Category','required');

			if(empty($_FILES['primaryimage']['name']))
			{
				$this->form_validation->set_rules('primaryimage','Primary Image','required');
			}

			if($this->form_validation->run()==false)
        	{
            	$answer=array('code'=>0,'msg'=>validation_errors());
        	}
        	else
        	{
        		$productname = $this->input->post('productname');
        		$productprice = $this->input->post('productprice');
        		$unittype = $this->input->post('unittype');
        		$minqty = $this->input->post('minqty');
        		$businesstype = $this->input->post('businesstype');
        		$description = $this->input->post('description');
        		$maincategory = $this->input->post('maincategory');
        		$subcategory = $this->input->post('subcategory');

        		$config['upload_path']='Upload/Seller/'.$this->session->userdata("sellerid").'/Product';
		        $config['allowed_types']='jpg|png|jpeg';
		        $config['file_name']=$productname;

	            //cofigration
	            $this->load->library('upload',$config);
	            $this->upload->initialize($config);

	            if(!$this->upload->do_upload('primaryimage'))
	            {
	                $answer=array('code'=>0,'msg'=>$this->upload->display_errors());
	            }
	            else
	            {
	            	$primaryimage = $this->upload->data('file_name');
	            	$data = array('product_name'=>$productname,'price'=>$productprice,'min_qty'=>$minqty,'unit_type'=>$unittype,'description'=>$description,'maincatid'=>$maincategory,'subcatid'=>$subcategory,'primary_image'=>$primaryimage,'seller_id'=>$this->session->userdata("sellerid"),'update_time'=>date("d M Y h:i:s A"));
	        		$result = $this->Model->model_insert('tbl_product',$data);

	        		if($result != '')
	        		{
	        			$answer = array('code'=>1);
	        		}
	        		else
	        		{
	        			$answer = array('code'=>0);
	        		}
	            }
        	}
        	echo json_encode($answer);
		}

		function edit_product($productid)
		{
			$result['productresult'] = $this->Model->model_select('tbl_product',array('product_id'=>$productid));
			$this->load->view('Seller/Product/editproduct',$result);
		}

		function edit__product($productid)
		{
			$answer = array();

			$this->form_validation->set_rules('productname','Product Name','required');
			$this->form_validation->set_rules('productprice','Product Price','required|numeric');
			$this->form_validation->set_rules('unittype','Unit Type','required|regex_match[/^[a-zA-Z][a-zA-Z]+$/]');
			$this->form_validation->set_rules('minqty','Minimum Order Quantity','required|numeric');
			$this->form_validation->set_rules('description','Description','required');
			$this->form_validation->set_rules('maincategory','Main Category','required');
			$this->form_validation->set_rules('subcategory','Sub Category','required');

			if($this->form_validation->run()==false)
        	{
            	$answer=array('code'=>0,'msg'=>validation_errors());
        	}
        	else
        	{
        		$productname = $this->input->post('productname');
        		$productprice = $this->input->post('productprice');
        		$unittype = $this->input->post('unittype');
        		$minqty = $this->input->post('minqty');
        		$businesstype = $this->input->post('businesstype');
        		$description = $this->input->post('description');
        		$maincategory = $this->input->post('maincategory');
        		$subcategory = $this->input->post('subcategory');

        		if(empty($_FILES['primaryimage']['name']))
        		{
        			$data = array('product_name'=>$productname,'price'=>$productprice,'min_qty'=>$minqty,'unit_type'=>$unittype,'description'=>$description,'maincatid'=>$maincategory,'subcatid'=>$subcategory,'seller_id'=>$this->session->userdata("sellerid"),'update_time'=>date("d M Y h:i:s A"));
        		}
        		else
        		{
        			$config['upload_path']='Upload/Seller/'.$this->session->userdata("sellerid").'/Product';
			        $config['allowed_types']='jpg|png|jpeg';
			        $config['file_name']=$productname;

		            //cofigration
		            $this->load->library('upload',$config);
		            $this->upload->initialize($config);

		            if(!$this->upload->do_upload('primaryimage'))
		            {
		                $answer=array('code'=>0,'msg'=>$this->upload->display_errors());
		            }
		            else
		            {
		            	$primaryimage = $this->upload->data('file_name');
		            	$data = array('product_name'=>$productname,'price'=>$productprice,'min_qty'=>$minqty,'unit_type'=>$unittype,'description'=>$description,'maincatid'=>$maincategory,'subcatid'=>$subcategory,'primary_image'=>$primaryimage,'seller_id'=>$this->session->userdata("sellerid"),'update_time'=>date("d M Y h:i:s A"));
		            }
        		}
        		$result = $this->Model->model_update('tbl_product',$data,array('product_id'=>$productid));

        		if($result != '')
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

		function delete_product($productid)
		{
			$answer = array();
			$oldproductresult = $this->Model->model_select('tbl_product',array('product_id'=>$productid));
			unlink('Upload/Seller/'.$this->session->userdata("sellerid").'/Product/'.$oldproductresult[0]->primary_image);
			$res = $this->Model->model_delete('tbl_product',array('product_id'=>$productid));

			$answer = array('code'=>0);
			echo json_encode($answer);
		}
	}
?>