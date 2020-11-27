<?php 
	class Course extends CI_Controller
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

		function New_course()
		{
			if($this->session->userdata('role') == "Admin")
			{
				$active['active']=array('main'=>'course','whichactive'=>'addcourse');
				$this->load->view('Course/course',$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function Course_List()
		{
			if($this->session->userdata('role') == "Admin")
			{
				$active['active']=array('main'=>'course','whichactive'=>'courselist');
				$this->load->view('Course/courselist',$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function add_course()
		{
			$answer = array();

			$this->form_validation->set_rules('coursename','Course Name','required');
			$this->form_validation->set_rules('coursefees','Course Fees','required|numeric');

			if($this->form_validation->run()==FALSE)
			{
				$answer = array('code'=>0,'msg'=>validation_errors());
			}
			else
			{
				$coursename = $this->input->post('coursename');
				$coursefees = $this->input->post('coursefees');

				$data = array('course_name'=>$coursename,'course_fees'=>$coursefees);

				$result = $this->Model->model_insert('tbl_course',$data);

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

		function get_coursefees($courseid)
		{
			$result = $this->Model->model_select('tbl_course',array('course_id'=>$courseid));
			echo $result[0]->course_fees;
		}

		function delete_course($id)
		{
			$this->Model->model_update('tbl_course',array('status'=>0),array('course_id'=>$id));
			echo "success";
		}

		function Edit_Course($courseid)
		{
			$active['active']=array('main'=>'course','whichactive'=>'addcourse');
			$res['result'] = $this->Model->model_select('tbl_course',array('course_id'=>$courseid));
			$arraymerge = array_merge($active,$res);
			$this->load->view('Course/editcourse',$arraymerge);
		}

		function update_record($course_id)
		{
			$answer=array();

			$this->form_validation->set_rules('coursename','Course Name','required');
			$this->form_validation->set_rules('coursefees','Course Fees','required|numeric');
			
			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>0,'msg'=>validation_errors());
			}
			else
			{
				$coursename=$this->input->post('coursename');
				$coursefees=$this->input->post('coursefees');
				$data=array('course_name'=>$coursename,'course_fees'=>$coursefees);
				$res=$this->Model->model_update('tbl_course',$data,array('course_id'=>$course_id));

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