<?php 
	class Enroll extends CI_Controller
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

		function Enroll_Student()
		{
			if($this->session->userdata('role')=="User" || $this->session->userdata('role')=="Admin")
			{
				$active['active']=array('main'=>'enrollstudent','whichactive'=>'enroll');
				$this->load->view("Enroll/enroll",$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function Enroll_Students($enquiry)
		{
			if($this->session->userdata('role')=="User" || $this->session->userdata('role')=="Admin")
			{
				$active['active']=array('main'=>'enrollstudent','whichactive'=>'enroll');
				$studentdetails['student']=$this->Model->model_select('tbl_enquiry',array('enq_id'=>$enquiry));
				$final_array=array_merge($active,$studentdetails);
				$this->load->view("Enroll/enroll1",$final_array);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function register_student()
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

	        	$data = array('name'=>$studentname,'email'=>$emailaddress,'gender'=>$gender,'phone'=>$phonenumber,'pphone'=>$pphonenumber,'college'=>$collegename,'address'=>$address,'qualification'=>$qualification,'course'=>$course,'course_fees'=>$fees,'reg_date'=>$registration,'birthdate'=>$birthdate);

	        	$result=$this->Model->model_insert('tbl_enroll_student',$data);
	        	$insert_id = $this->db->insert_id();

	        	$q = "SELECT * FROM tbl_enroll_student ORDER BY enroll_id DESC LIMIT 2";
	        	$lastrow = $this->db->query($q)->result();

	        	$data1 = array('enroll_id'=>$insert_id,'remain_amount'=>$fees);
	        	$this->Model->model_insert('tbl_fees_status',$data1);

	        	if(count($lastrow)==1)
	        	{
	        		$number = $lastrow[0]->enroll_no;
	        	}
	        	else
	        	{
	        		$number = $lastrow[1]->enroll_no;
	        	}
	        	$number++;
		        $newenroll = str_pad($number, 6, "0", STR_PAD_LEFT);

	        	$data = array('enroll_no'=>$newenroll);
	        	$result1 = $this->Model->model_update('tbl_enroll_student',$data,array('enroll_id'=>$insert_id));

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

		function Enroll_studentlist()
		{
			if($this->session->userdata('role')=="User" || $this->session->userdata('role')=="Admin")
			{
				$active['active']=array('main'=>'enrollstudent','whichactive'=>'enrolllist');
				$this->load->view('Enroll/enrollstudentlist',$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function Student_Profile($enrollid)
		{
			if($this->session->userdata('role')=="User" || $this->session->userdata('role')=="Admin")
			{
				$active['active']=array('main'=>'enrollstudent','whichactive'=>'');
				$studentdetails['student']=$this->Model->model_select('tbl_enroll_student',array('enroll_id'=>$enrollid));
				$final_array=array_merge($active,$studentdetails);
				$this->load->view('Enroll/studentprofile',$final_array);
			}
			else
			{
				$this->load->view("login");
			}
		}
	}
?>