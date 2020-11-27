<?php 
	class Student extends CI_Controller
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

		function Student_Enquiry()
		{
			if($this->session->userdata('role')=="User" || $this->session->userdata('role')=="Admin")
			{
				$active['active']=array('main'=>'studentenquiry','whichactive'=>'enquiry');
				$this->load->view("Enquiry/enquiry",$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function Enquiry_List()
		{
			if($this->session->userdata('role')=="User" || $this->session->userdata('role')=="Admin")
			{
				$active['active']=array('main'=>'studentenquiry','whichactive'=>'enquirylist');
				$this->load->view('Enquiry/enquirylist',$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function Cancel_Enquiry_List()
		{
			if($this->session->userdata('role')=="User" || $this->session->userdata('role')=="Admin")
			{
				$active['active']=array('main'=>'studentenquiry','whichactive'=>'cancelenquirylist');
				$this->load->view('Enquiry/cancelenquirylist',$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function register_student()
		{
			$answer = array();

			$this->form_validation->set_rules('studentname','Student Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('emailaddress','Email Address','required|valid_email');
			$this->form_validation->set_rules('phonenumber','Phone Number','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('collegename','College Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('qualification','Qualification','required');
			$this->form_validation->set_rules('interest','Interest','required');
			$this->form_validation->set_rules('reference','Reference','required');
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
	        	$rememberdate = $this->input->post('rememberdate');
	        	$rememberdetail = $this->input->post('rememberdetail');
	        	$birthdate = $this->input->post('birthdate');

	        	$data = array('name'=>$studentname,'email'=>$emailaddress,'gender'=>$gender,'phone'=>$phonenumber,'pphone'=>$pphonenumber,'college'=>$collegename,'address'=>$address,'qualification'=>$qualification,'interest'=>$interest,'reference'=>$reference,'reg_date'=>date("m/d/Y"),'birthdate'=>$birthdate,'remember_Date'=>$rememberdate,'remember_detail'=>$rememberdetail,'status'=>1);
	        	$result=$this->Model->model_insert('tbl_enquiry',$data);
	        	$insertid = $this->db->insert_id();

	        	$data1 = array('reminder_date'=>$rememberdate,'reminder'=>$rememberdetail,'enquiry_id'=>$insertid,'status'=>1);
	        	$result1=$this->Model->model_insert('tbl_enquiry_reminder',$data1);

	        	if($result != '' && $result1 != '')
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

		function Cancel_enquiry($enq_id)
		{
			$data = array('status'=>0);
			$result = $this->Model->model_update('tbl_enquiry',$data,array('enq_id'=>$enq_id));
			echo "success";
		}
	}
?>