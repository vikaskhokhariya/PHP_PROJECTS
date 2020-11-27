<?php 
	class Reminder extends CI_Controller
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

		function Enquiry_reminder()
		{
			if($this->session->userdata('role')=="User" || $this->session->userdata('role')=="Admin")
			{
				$active['active']=array('main'=>'remember','whichactive'=>'');
				$this->load->view('Reminder/reminderenquirylist',$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function Confirm_enquiry($enq_id)
		{
			$data = array('status'=>0);
			$result = $this->Model->model_update('tbl_enquiry_reminder',$data,array('reminder_id'=>$enq_id));
			echo "success";
		}

		function Edit_reminder($reminder_id)
		{
			$reminderid['reminderid']=array('reminderid'=>$reminder_id);
			$active['active']=array('main'=>'','whichactive'=>'');
			$mergearray = array_merge($reminderid,$active);
			$this->load->view('Reminder/editreminder',$mergearray);
		}

		function Edit_reminder_enquiry($reminder_id)
		{
			$answer = array();

			$this->form_validation->set_rules('rememberdate','Reminder Date','required');
			$this->form_validation->set_rules('rememberdetail','Reminder Detail','required');

			if($this->form_validation->run()==FALSE)
			{
				$answer = array('code'=>0,'msg'=>validation_errors());
			}
			else
			{
				$rdate = $this->input->post('rememberdate');
				$detail = $this->input->post('rememberdetail');

				$data = array('reminder_date'=>$rdate,'reminder'=>$detail);

				$result = $this->Model->model_update('tbl_enquiry_reminder',$data,array('reminder_id'=>$reminder_id));

				if($result!='')
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