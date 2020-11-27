<?php 
	class Simba extends CI_Controller
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
			if($this->session->userdata('role')=="User" || $this->session->userdata('role')=="Admin")
			{
				$active['active']=array('main'=>'dashboard','whichactive'=>'dashboard');
				$this->load->view("dashboard",$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function login()
		{
			$answer = array();
			$email=$this->input->post('email');
			$password=$this->input->post('password');

			$result=$this->Model->model_select('tbl_user',array('user_email'=>$email,'user_password'=>$password));
			$total=count($result);

			if($total==1)
			{
				//$this->session->set_userdata('branch',$result[0]->user_role);
				$this->session->set_userdata('role',$result[0]->user_role);
				$answer=array('code'=>1);
			}
			else
			{
				$answer=array('code'=>0);
			}
			echo json_encode($answer);
		}

		function logout_branch()
		{
			$this->session->unset_userdata('role');
			redirect('../Simba');
		}
	}
?>