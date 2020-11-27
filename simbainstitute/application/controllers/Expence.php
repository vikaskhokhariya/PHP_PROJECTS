<?php 
	class Expence extends CI_Controller
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

		function New_Expence()
		{
			if($this->session->userdata('role') == "Admin")
			{
				$active['active']=array('main'=>'expence','whichactive'=>'newexpence');
				$this->load->view("Expence/expence",$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function Expence_List()
		{
			if($this->session->userdata('role') == "Admin")
			{
				$active['active']=array('main'=>'expence','whichactive'=>'expencelist');
				$this->load->view("Expence/expencelist",$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function New_Expence_Category()
		{
			if($this->session->userdata('role') == "Admin")
			{
				$active['active']=array('main'=>'expence','whichactive'=>'expencecategory');
				$this->load->view("Expence/expencecategory",$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function Expence_Category_List()
		{
			if($this->session->userdata('role') == "Admin")
			{
				$active['active']=array('main'=>'expence','whichactive'=>'expencecategorylist');
				$this->load->view("Expence/expencecategorylist",$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function addnewexpence()
		{
			$answer = array();

			$this->form_validation->set_rules('expencedate','Expence Date','required');
			$this->form_validation->set_rules('expencetitle','Expence Title','required');
			$this->form_validation->set_rules('expencedetail','Expence Detail','required');
			$this->form_validation->set_rules('expenceamount','Expence Amount','required|numeric');

			if($this->form_validation->run()==FALSE)
			{
				$answer = array('code'=>0,'msg'=>validation_errors());
			}
			else
			{
				$expencedate = $this->input->post('expencedate');
				$expencetitle = $this->input->post('expencetitle');
				$expencedetail = $this->input->post('expencedetail');
				$expenceamount = $this->input->post('expenceamount');

				$data = array('expence_date'=>$expencedate,'expence_title'=>$expencetitle,'expence_detail'=>$expencedetail,'expence_amount'=>$expenceamount);

				$result = $this->Model->model_insert('tbl_expence',$data);

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

		function add_expence_category()
		{
			$answer = array();

			$this->form_validation->set_rules('categoryname','Expence Category Name','required');

			if($this->form_validation->run()==FALSE)
			{
				$answer = array('code'=>0,'msg'=>validation_errors());
			}
			else
			{
				$expencecategory = $this->input->post('categoryname');

				$data = array('expence_category'=>$expencecategory);

				$result = $this->Model->model_insert('tbl_expence_category',$data);

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

		function delete_expence($id)
		{
			$this->Model->model_delete('tbl_expence',array('expence_id'=>$id));
			echo "success";
		}

		function Edit_Expence($expenceid)
		{
			$active['active']=array('main'=>'expence','whichactive'=>'expencecategorylist');
			$res['result'] = $this->Model->model_select('tbl_expence',array('expence_id'=>$expenceid));
			$arraymerge = array_merge($active,$res);
			$this->load->view('Expence/editexpence',$arraymerge);
		}

		function editRecord($expence_id)
		{
			$answer = array();

			$this->form_validation->set_rules('expencedate','Expence Date','required');
			$this->form_validation->set_rules('expencetitle','Expence Title','required');
			$this->form_validation->set_rules('expencedetail','Expence Detail','required');
			$this->form_validation->set_rules('expenceamount','Expence Amount','required|numeric');

			if($this->form_validation->run()==FALSE)
			{
				$answer = array('code'=>0,'msg'=>validation_errors());
			}
			else
			{
				$expencedate = $this->input->post('expencedate');
				$expencetitle = $this->input->post('expencetitle');
				$expencedetail = $this->input->post('expencedetail');
				$expenceamount = $this->input->post('expenceamount');

				$data = array('expence_date'=>$expencedate,'expence_title'=>$expencetitle,'expence_detail'=>$expencedetail,'expence_amount'=>$expenceamount);

				$result = $this->Model->model_update('tbl_expence',$data,array('expence_id'=>$expence_id));

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

		function delete_expence_category($id)
		{
			$this->Model->model_delete('tbl_expence_category',array('expence_category_id'=>$id));
			echo "success";
		}

		function Edit_expencecategory($expence_category_id)
		{
			$active['active']=array('main'=>'expence','whichactive'=>'expencecategorylist');
			$res['result'] = $this->Model->model_select('tbl_expence_category',array('expence_category_id'=>$expence_category_id));
			$arraymerge = array_merge($active,$res);
			$this->load->view('Expence/editexpencecategorylist',$arraymerge);
		}

		function update_record($expence_category_id)
		{
			$answer=array();

			$this->form_validation->set_rules('categoryname','expence category Name','required');
			
			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>0,'msg'=>validation_errors());
			}
			else
			{
				$expence_category=$this->input->post('categoryname');
				$data=array('expence_category'=>$expence_category);
				$res=$this->Model->model_update('tbl_expence_category',$data,array('expence_category_id'=>$expence_category_id));

				if($res!=null)
				{
					$answer=array('code'=>1 ,'msg'=>'success');
				}
				else
				{
					$answer=array('code'=>0 ,'msg'=>'fail');
				}
			}
			echo json_encode($answer);
		}
	}
?>