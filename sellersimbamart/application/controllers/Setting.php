<?php 
	class Setting extends CI_Controller
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
			$this->load->view('Seller/Setting/changepassword');
		}

		function changepassword()
		{
			$this->load->view('Seller/Setting/changepassword');
		}

		function check_old_password($oldpassword)
		{
			$answer=array();
			$res=$this->Model->model_select('sellersimbamart.tbl_seller',array('seller_id'=>$this->session->userdata("sellerid"),'password'=>md5($oldpassword)));

			if(sizeof($res) > 0)
			{
				$answer=array('code'=>1,'msg'=>'success');
			}
			else
			{
				$answer=array('code'=>0,'msg'=>'notmatch');
			}
			echo json_encode($answer);
		}

		function change_password()
		{
			$newpassword = $this->input->post('newpassword');
			$res=$this->Model->model_update('sellersimbamart.tbl_seller',array('password'=>md5($newpassword)),array('seller_id'=>$this->session->userdata("sellerid")));
			echo "success";
		}
	}
?>