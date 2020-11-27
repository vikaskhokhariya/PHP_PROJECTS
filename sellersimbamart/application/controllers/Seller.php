<?php 
	class Seller extends CI_Controller
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
			if($this->session->userdata('selleremail'))
			{
				$this->load->view('Seller/dashboard');
			}
			else
			{
				$res['result']=$this->Model->model_select('simbamart.tbl_general');
				$this->load->view('Seller/login',$res);
			}
		}

		function login()
		{
			$email=$this->input->post('email');
			$password=$this->input->post('password');

			$result=$this->Model->model_select('tbl_seller',array('p_email'=>$email,'password'=>md5($password)));
			$total=count($result);

			if($total==1)
			{
				$this->session->set_userdata('selleremail',$result[0]->p_email);
				$this->session->set_userdata('sellerid',$result[0]->seller_id);
				$answer=array('code'=>1);
			}
			else
			{
				$answer=array('code'=>0);
			}
			echo json_encode($answer);
		}

		function logout()
		{
			$this->session->unset_userdata('selleremail');
			$this->session->unset_userdata('sellerid');

			$res['result']=$this->Model->model_select('simbamart.tbl_general');
			redirect("Seller");
			//$this->load->view('Seller/login',$res);
		}
	}
?>