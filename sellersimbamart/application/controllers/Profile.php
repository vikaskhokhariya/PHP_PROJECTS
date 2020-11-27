<?php 
	class Profile extends CI_Controller
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

		function contactprofile()
		{
			if($this->session->userdata('selleremail'))
			{
				$res['result']=$this->Model->model_select('tbl_seller',array('seller_id'=>$this->session->userdata('sellerid')));
				$this->load->view('Seller/Profile/contactprofile',$res);
			}
			else
			{
				$res['result']=$this->Model->model_select('tbl_general');
				$this->load->view('Seller/login',$res);
			}
		}

		function businessprofile()
		{
			if($this->session->userdata('selleremail'))
			{
				$res['result']=$this->Model->model_select('tbl_business',array('seller_id'=>$this->session->userdata('sellerid')));
				$this->load->view('Seller/Profile/businessprofile',$res);
			}
			else
			{
				$res['result']=$this->Model->model_select('tbl_general');
				$this->load->view('Seller/login',$res);
			}
		}

		function contact_details()
		{
			$profilepicname='';
			$answer = array();
			$data=array();

			$this->form_validation->set_rules('sellername','Seller Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]|max_length[75]');
			$this->form_validation->set_rules('primaryemail','Primary Email','required|valid_email');
			$this->form_validation->set_rules('alternativeemail','Alternative Email','valid_email');
			$this->form_validation->set_rules('primarycontact','Primary Contact','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('alternativecontact','Alternative Contact','numeric|exact_length[10]');
			$this->form_validation->set_rules('zipcode','Zip Code','numeric|exact_length[6]');
			$this->form_validation->set_rules('city','City','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');

			if($this->form_validation->run()==false)
        	{
            	$answer=array('code'=>0,'msg'=>validation_errors());
        	}
        	else
        	{
        		$sellername = $this->input->post('sellername');
        		$primaryemail = $this->input->post('primaryemail');
        		$alternativeemail = $this->input->post('alternativeemail');
        		$primarycontact = $this->input->post('primarycontact');
        		$alternativecontact = $this->input->post('alternativecontact');
        		$address = $this->input->post('address');
        		$zipcode = $this->input->post('zipcode');
        		$city = $this->input->post('city');
        		$state = $this->input->post('state');

        		if(empty($_FILES['profilepic']['name']))
        		{
        			$data = array('seller_name'=>$sellername,'p_email'=>$primaryemail,'a_email'=>$alternativeemail,'p_contact'=>$primarycontact,'a_contact'=>$alternativecontact,'address'=>$address,'zip_code'=>$zipcode,'city'=>$city,'state'=>$state);
        		}
        		else
        		{
        			$config['upload_path']='Upload/Seller/'.$this->session->userdata("sellerid").'/Profileimage';
			        $config['allowed_types']='jpg|png|jpeg';
			        $config['file_name']=$sellername;

		            //cofigration
		            $this->load->library('upload',$config);
		            $this->upload->initialize($config);

		            if(!$this->upload->do_upload('profilepic'))
		            {
		                $answer=array('code'=>0,'msg'=>$this->upload->display_errors());
		            }
		            else
		            {
		            	$oldsellerdetail = $this->Model->model_select('tbl_seller',array('seller_id'=>$this->session->userdata('sellerid')));

		            	$profileimagename = $oldsellerdetail[0]->profile;

		            	if($profilepicname != '')
		            	{
		            		unlink('Upload/Seller/'.$this->session->userdata("sellerid").'/Profileimage/'.$profileimagename);
		            	}

		            	$profilepicname = $this->upload->data('file_name');
		        		$data = array('seller_name'=>$sellername,'p_email'=>$primaryemail,'a_email'=>$alternativeemail,'p_contact'=>$primarycontact,'a_contact'=>$alternativecontact,'address'=>$address,'zip_code'=>$zipcode,'city'=>$city,'state'=>$state,'profile'=>$profilepicname);
		        	}
        		}

        		$result=$this->Model->model_update('tbl_seller',$data,array('seller_id'=>$this->session->userdata('sellerid')));

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

		function removecontactprofilepic($profilepicid)
		{
			
			$data=array('profile'=>'');
			$answer=$this->Model->model_update('tbl_seller',$data,array('seller_id'=>$this->session->userdata('sellerid')));

			if($answer != '')
			{
				$answer = array('code'=>1);
			}
			else
			{
				$answer = array('code'=>0);
			}
			echo json_encode($answer);
		}

		function business_details()
		{
			$answer = array();
			$oldbusinessdetail =array();
			$businessimagename = '';

			$this->form_validation->set_rules('companyname','Company Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]|max_length[75]');
			$this->form_validation->set_rules('primaryemail','Primary Email','required|valid_email');
			$this->form_validation->set_rules('alternativeemail','Alternative Email','valid_email');
			$this->form_validation->set_rules('yearofest','Establishment Year','numeric');

			if($this->form_validation->run()==false)
        	{
            	$answer=array('code'=>0,'msg'=>validation_errors());
        	}
        	else
        	{
        		$companyname = $this->input->post('companyname');
        		$primaryemail = $this->input->post('primaryemail');
        		$alternativeemail = $this->input->post('alternativeemail');
        		$businesstype = $this->input->post('businesstype');
        		$ownershiptype = $this->input->post('ownershiptype');
        		$employee = $this->input->post('noofemployee');
        		$estyear = $this->input->post('yearofest');
        		$website = $this->input->post('website');

        		if(empty($_FILES['businesslogo']['name']))
        		{
        			$data = array('business_name'=>$companyname,'year_of_est'=>$estyear,'p_email'=>$primaryemail,'a_email'=>$alternativeemail,'business_type'=>$businesstype,'ownership_type'=>$ownershiptype,'no_of_employee'=>$employee,'business_website'=>$website);
        		}
        		else
        		{
        			$config['upload_path']='Upload/Seller/'.$this->session->userdata("sellerid").'/Businessimage';
			        $config['allowed_types']='jpg|png|jpeg';
			        $config['file_name']=$companyname;

		            //cofigration
		            $this->load->library('upload',$config);
		            $this->upload->initialize($config);

		            if(!$this->upload->do_upload('businesslogo'))
		            {
		                $answer=array('code'=>0,'msg'=>$this->upload->display_errors());
		            }
		            else
		            {
		            	$oldbusinessdetail = $this->Model->model_select('tbl_business',array('seller_id'=>$this->session->userdata('sellerid')));

		            	$businessimagename = $oldbusinessdetail[0]->business_logo;

		            	if($businessimagename != '')
		            	{
		            		unlink('Upload/Seller/'.$this->session->userdata("sellerid").'/Businessimage/'.$businessimagename);
		            	}

		            	$businesslogo = $this->upload->data('file_name');
		        		$data = array('business_name'=>$companyname,'year_of_est'=>$estyear,'p_email'=>$primaryemail,'a_email'=>$alternativeemail,'business_type'=>$businesstype,'ownership_type'=>$ownershiptype,'no_of_employee'=>$employee,'business_website'=>$website,'business_logo'=>$businesslogo);
		        	}
        		}

        		$result=$this->Model->model_update('tbl_business',$data,array('seller_id'=>$this->session->userdata('sellerid')));

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

		function removebusinesslogo($profilepicid)
		{
			
			$data=array('business_logo'=>'');
			$answer=$this->Model->model_update('tbl_business',$data,array('seller_id'=>$this->session->userdata('sellerid')));

			if($answer != '')
			{
				$answer = array('code'=>1);
			}
			else
			{
				$answer = array('code'=>0);
			}
			echo json_encode($answer);
		}
	}
?>