<?php 
	class Demo extends CI_Controller
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

		function Demo_List()
		{
			if($this->session->userdata('role')=="User" || $this->session->userdata('role')=="Admin")
			{
				$active['active']=array('main'=>'demo','whichactive'=>'demolist');
				$this->load->view("Demo/demolist",$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function Cancel_Demo_List()
		{
			if($this->session->userdata('role')=="User" || $this->session->userdata('role')=="Admin")
			{
				$active['active']=array('main'=>'demo','whichactive'=>'canceldemolist');
				$this->load->view("Demo/canceldemostudentlist",$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function Demo_Student($enquiry)
		{
			if($this->session->userdata('role')=="User" || $this->session->userdata('role')=="Admin")
			{
				$active['active']=array('main'=>'enrollstudent','whichactive'=>'enroll');
				$studentdetails['student']=$this->Model->model_select('tbl_enquiry',array('enq_id'=>$enquiry));
				$final_array=array_merge($active,$studentdetails);
				$this->load->view("Demo/demostudent",$final_array);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function register_student_demo()
		{
			$answer = array();
			$lastrow = array();

			$this->form_validation->set_rules('studentname','Student Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('emailaddress','Email Address','required|valid_email');
			$this->form_validation->set_rules('phonenumber','Phone Number','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('collegename','College Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			//$this->form_validation->set_rules('pphonenumber','Parent Contact Number','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('qualification','Qualification','required');
			$this->form_validation->set_rules('registration','registration Date','required');
			$this->form_validation->set_rules('course','Course','required');
			$this->form_validation->set_rules('fees','Fees','required');
			$this->form_validation->set_rules('birthdate','Birth Date','required');

			if($this->form_validation->run()==false)
        	{
            	$answer=array('code'=>0,'msg'=>validation_errors());
        	}
        	else
        	{
	        	$studentname = $this->input->post('studentname');
	        	$emailaddress = $this->input->post('emailaddress');
	        	$gender = $this->input->post('gender');
	        	$phonenumber = $this->input->post('phonenumber');
	        	$collegename = $this->input->post('collegename');
	        	$pphonenumber = $this->input->post('pphonenumber');
	        	$address = $this->input->post('address');
	        	$qualification = $this->input->post('qualification');
	        	$interest = $this->input->post('interest');
	        	$reference = $this->input->post('reference');
	        	$registration = $this->input->post('registration');
	        	$course = $this->input->post('course');
	        	$fees = $this->input->post('fees');
	        	$birthdate = $this->input->post('birthdate');

	        	$data = array('name'=>$studentname,'email'=>$emailaddress,'gender'=>$gender,'phone'=>$phonenumber,'pphone'=>$pphonenumber,'college'=>$collegename,'address'=>$address,'qualification'=>$qualification,'course'=>$course,'course_fees'=>$fees,'reg_date'=>$registration,'birthdate'=>$birthdate,'status'=>1);

	        	$result=$this->Model->model_insert('tbl_demo',$data);

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

		function Demo_Students($demo)
		{
			if($this->session->userdata('role')=="User" || $this->session->userdata('role')=="Admin")
			{
				$active['active']=array('main'=>'demo','whichactive'=>'');
				$studentdetails['student']=$this->Model->model_select('tbl_demo',array('demo_id'=>$demo));
				$final_array=array_merge($active,$studentdetails);
				$this->load->view("Enroll/enroll1",$final_array);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function cancel_enquiry($demo_id)
		{
			$data = array('status'=>0);
			$result = $this->Model->model_update('tbl_demo',$data,array('demo_id'=>$demo_id));
			echo "success";
		}
	}
?>