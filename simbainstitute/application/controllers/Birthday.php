<?php 
	class Birthday extends CI_Controller
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

		function Birthday_List()
		{
			if($this->session->userdata('role')=="User" || $this->session->userdata('role')=="Admin")
			{
				$active['active']=array('main'=>'birthday','whichactive'=>'');
				$this->load->view('Birthday/birthday',$active);
			}
			else
			{
				$this->load->view("login");
			}
		}
	}
?>