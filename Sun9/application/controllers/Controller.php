<?php
	class Controller extends CI_Controller
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
			$this->load->view('admin/slidersetting');
		}

		function admin()
		{
			redirect('Controller/load_admin_login');
		}

		function load_admin_login()
		{
			if($this->session->userdata('adminname'))
			{
				redirect('Controller/load_masteradmindashboard');
			}
			else
			{
				$this->load->view('admin/loginadmin');
			}
		}

		function load_masteradmindashboard()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/masteradmindashboard');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_subadmindashboard()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/subadmindashboard');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function loginadmin()
		{
			$answer=array();
			$email=$this->input->post('email');
			$password=$this->input->post('password');

			$res=$this->Model->model_select('admintb',array('email'=>$email,'password'=>base64_encode($password),'status'=>1,'allowed'=>1));

			if(sizeof($res) == 1)
			{
				if($res[0]->type == "master")
				{
					$this->session->set_userdata('adminname',$res[0]->username);
					$this->session->set_userdata('admintype',$res[0]->type);
					$this->session->set_userdata('adminprofile',$res[0]->profile);
					$answer=array('code'=>0,'msg'=>'master');
				}
				else
				{
					$this->session->set_userdata('adminname',$res[0]->username);
					$this->session->set_userdata('admintype',$res[0]->type);
					$this->session->set_userdata('adminprofile',$res[0]->profile);
					$answer=array('code'=>0,'msg'=>'sub');
				}
			}
			else
			{
				$answer=array('code'=>1,'msg'=>'failed');
			}
			echo json_encode($answer);
		}

		function logout_admin()
		{
			$this->session->unset_userdata('adminname');
			$this->session->unset_userdata('adminprofile');
			$this->session->unset_userdata('admintype');
			redirect('Controller/admin');
		}

		function branch()
		{
			$this->session->set_userdata('login','branch');
			redirect('Controller/load_branch_login');
		}

		function load_branch_login()
		{
			if($this->session->userdata('branchname'))
			{
				redirect('Controller/load_branchdashboard');
			}
			else
			{
				$this->load->view('branch/loginbranch');
			}
		}

		function load_branchdashboard()
		{
			if($this->session->userdata('branchname'))
			{
				$this->load->view('branch/branchdashboard');
			}
			else
			{
				redirect('Controller/load_branch_login');
			}
		}

		function loginbranch()
		{
			$answer=array();
			$email=$this->input->post('email');
			$password=$this->input->post('password');

			$res=$this->Model->model_select('branchtb',array('email'=>$email,'password'=>md5($password),'status'=>1,'allowed'=>1));

			if(sizeof($res) > 0)
			{
				foreach($res as $value)
				{
					$this->session->set_userdata('branchname',$value->bname);
					$this->session->set_userdata('branchemail',$value->email);
					$answer=array('code'=>0,'msg'=>'success');
				}
			}
			else
			{
				$answer=array('code'=>1,'msg'=>'failed');
			}
			echo json_encode($answer);
		}
		
		function logout_branch()
		{
			$this->session->unset_userdata('branchname');
			$this->session->unset_userdata('branchemail');
			redirect('Controller/branch');
		}

		function load_addnewadmin()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/addadmin');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_addadmincustomer()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/addcustomer');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_addbranchcustomer()
		{
			if($this->session->userdata('branchname'))
			{
				$this->load->view('branch/addcustomer');
			}
			else
			{
				redirect('Controller/load_branch_login');
			}
		}

		function load_addbranch()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/addbranch');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_addplan()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/addplan');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}	
		}

		function load_adminaddsponsor()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/addsponsor');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}	
		}

		function load_addbranchsponsor()
		{
			if($this->session->userdata('branchname'))
			{
				$this->load->view('branch/addsponsor');
			}
			else
			{
				redirect('Controller/load_branch_login');
			}	
		}

		function load_custreceipt()
		{
			if($this->session->userdata('branchname'))
			{
				$this->load->view('branch/createreceipt');
			}
			else
			{
				redirect('Controller/load_branch_login');
			}	
		}

		/*Load List*/
		function load_planlist()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/planlist');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}	
		}

		function load_branchlist()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/branchlist');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_adminsponsorlist()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/sponsorlist');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_branchsponsorlist()
		{
			if($this->session->userdata('branchname'))
			{
				$this->load->view('branch/sponsorlist');
			}
			else
			{
				redirect('Controller/load_branch_login');
			}
		}
		
		function load_admincustomerlist()
		{
			if($this->session->userdata('adminname'))
			{ 
				$this->load->view('admin/customerlist');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_branchcustomerlist()
		{
			if($this->session->userdata('branchname'))
			{ 
				$this->load->view('branch/customerlist');
			}
			else
			{
				redirect('Controller/load_branch_login');
			}
		}

		function load_adminlist()
		{
			if($this->session->userdata('admintype')=="master")
			{
				$this->load->view('admin/adminlist');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		/*Load BlockList*/
		function load_adminblockcustomerlist()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/blockcustomerlist');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_branchblockcustomerlist()
		{
			if($this->session->userdata('branchname'))
			{
				$this->load->view('branch/blockcustomerlist');
			}
			else
			{
				redirect('Controller/load_branch_login');
			}
		}

		function load_adminblockedsponsorlist()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/blockedsponsorlist');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_branchblockedsponsorlist()
		{
			if($this->session->userdata('branchname'))
			{
				$this->load->view('branch/blockedsponsorlist');
			}
			else
			{
				redirect('Controller/load_branch_login');
			}
		}

		function load_blockadminlist()
		{
			if($this->session->userdata('admintype')=="master")
			{
				$this->load->view('admin/blockadminlist');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		/*Load Details*/
		function load_plandetails($id)
		{
			$res=$this->Model->model_select('plantb',array('plan_code'=>$id));
			echo json_encode($res);
		}

		function load_sponsordetails($id)
		{
			$res=$this->Model->model_select('sponsortb',array('sponsor_code'=>$id));

			$resbranchname=$this->Model->model_select('branchtb',array('bid'=>$res[0]->bassociated));
			$resultstatename=$this->Model->model_select('state',array('StateID'=>$res[0]->sstate));
			$resultcityname=$this->Model->model_select('city',array('city_id'=>$res[0]->scity));

			$merge_array=array_merge($res,$resbranchname,$resultstatename,$resultcityname);
			echo json_encode($merge_array);
		}

		function load_customerdetails($id)
		{
			$res1=$this->Model->model_select('customertb',array('cust_code'=>$id));

			$resbranchname1=$this->Model->model_select('branchtb',array('bid'=>$res1[0]->branch_code));
			$resultstatename1=$this->Model->model_select('state',array('StateID'=>$res1[0]->stateid));
			$resultcityname1=$this->Model->model_select('city',array('city_id'=>$res1[0]->cityid));
			$resspon1=$this->Model->model_select('sponsortb',array('sponsor_code'=>$res1[0]->sponsor_code));
			$resplan1=$this->Model->model_select('plantb',array('plan_code'=>$res1[0]->cplan));
			$respur1=$this->Model->model_select('purchasetb',array('cust_code'=>$id));
			$merge_array1=array_merge($res1,$resbranchname1,$resultstatename1,$resultcityname1,$resspon1,$resplan1,$respur1);
			echo json_encode($merge_array1);
		}

		
		function block_sponsor($spid)
		{
			$this->Model->model_blockunblocksponsor_update('sponsortb',array('status'=>0),$spid);
			echo "success";
		}

		function unblock_sponsor($spid)
		{
			$this->Model->model_blockunblocksponsor_update('sponsortb',array('status'=>1),$spid);
			echo "success";
		}

		function block_customer($custid)
		{
			date_default_timezone_set('Asia/Kolkata');
			$this->Model->model_blockunblockcustomerupdate('customertb',array('status'=>0,'blockdate'=>date('d/m/Y')),$custid);
			echo "Success";
		}

		function unblock_customer($custid)
		{
			$this->Model->model_blockunblockcustomerupdate('customertb',array('status'=>1),$custid);
			echo "Success";
		}

		function block_admin($adminid)
		{
			$this->Model->model_blockunblockadminupdate('admintb',array('status'=>0),$adminid);
			echo "success";
		}

		function unblock_admin($adminid)
		{
			$this->Model->model_blockunblockadminupdate('admintb',array('status'=>1),$adminid);
			echo "success";
		}

		/*Delete*/
		function delete_customer($custid)
		{
			$this->Model->model_deletecustomerupdate('customertb',array('allowed'=>0),$custid);
			echo "Success";
		}

		function delete_branch($branchid)
		{
			$this->Model->model_deletebranchupdate('branchtb',array('allowed'=>0),$branchid);
			echo "Success";
		}

		function delete_plan($planid)
		{
			$this->Model->model_deleteplanupdate('plantb',array('allowed'=>0),$planid);
			echo "Success";
		}

		function delete_sponsor($sponsorid)
		{
			$this->Model->model_deletesponsorupdate('sponsortb',array('allowed'=>0),$sponsorid);
			echo "Success";
		}

		function delete_admin($adminid)
		{
			$this->Model->model_deleteadminupdate('admintb',array('allowed'=>0),$adminid);
			echo "Success";
		}

		/*Addition*/
		function add_branch()
		{
			$key=0;
			$this->form_validation->set_rules('bnm','Branch Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('city','City','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('password','Password','required|min_length[5]|max_length[25]');

			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>1,'msg'=>validation_errors());
			}
			else
			{
				$bnm=$this->input->post('bnm');
				$address=$this->input->post('address');
				$state=$this->input->post('state');
				$city=$this->input->post('city');
				$email=$this->input->post('email');
				$password=$this->input->post('password');

				$stateresult=$this->Model->model_select('state',array('StateID'=>$state));
					
				foreach($stateresult as $value)
				{
					$statevalue=$value->StateName;
				}

				$cityresult=$this->Model->model_select('city',array('city_id'=>$city));
			
				foreach($cityresult as $value)
				{
					$cityvalue=$value->city_name;
				}

				$bstate=substr($statevalue, 0,2);
				$bcity=substr($cityvalue, 0,2);

				$availrecord=$this->Model->model_branchcode_generate('branchtb');

				if(sizeof($availrecord) > 0)
				{
					foreach($availrecord as $value)
					{
						$key=$value->bid;
					}
					if($key < 10)
					{
						$bcode=strtoupper($bstate.$bcity.'00'.$key);	
					}
					elseif ($key < 100)
					{
						$bcode=strtoupper($bstate.$bcity.'0'.$key);
					}
					else
					{
						$bcode=strtoupper($bstate.$bcity.$key);
					}
				}
				else
				{
					$bcode=strtoupper($bstate.$bcity.'001');
				}
				
				$data=array('bid'=>null,'branch_code'=>$bcode,'bname'=>$bnm,'baddress'=>$address,'bstate'=>$state,'bcity'=>$city,'email'=>$email,'password'=>md5($password));

				$q=$this->Model->model_insert('branchtb',$data);
		
				if($q!='')
				{
					$answer=array('code'=>0,'msg'=>'sucess');
				}
				else
				{
					$answer=array('code'=>1,'msg'=>'failed');
				}
			}
			echo json_encode($answer);	
		}

		function add_admin()
		{
			$this->form_validation->set_rules('fnm','First Name','required|alpha');
			$this->form_validation->set_rules('mnm','Middle Name','required|alpha');
			$this->form_validation->set_rules('lnm','Last Name','required|alpha');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('city','City','required');
			$this->form_validation->set_rules('dob','Date Of Birth','required');
			$this->form_validation->set_rules('phno','Phone Number','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('user','User Name','required|min_length[5]|max_length[25]|regex_match[/^[a-zA-Z_.]{1,}[0-9]*$/]');
			$this->form_validation->set_rules('pass','Password','required|min_length[5]|max_length[50]');

			if(empty($_FILES['profile']['name']))
			{
				$this->form_validation->set_rules('profile','Profile','required');
			}

			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>1,'msg'=>validation_errors());
			}
			else
			{
				$fnm=$this->input->post('fnm');
				$mnm=$this->input->post('mnm');
				$lnm=$this->input->post('lnm');
				$gender=$this->input->post('gender');
				$address=$this->input->post('address');
				$state=$this->input->post('state');
				$city=$this->input->post('city');
				$dob=$this->input->post('dob');
				$phno=$this->input->post('phno');
				$email=$this->input->post('email');
				$user=$this->input->post('user');
				$password=base64_encode($this->input->post('pass'));

				if(!empty($_FILES['profile']['name']))
				{
					$config['upload_path'] = 'assets/uploads/admin/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $fnm.$mnm.$lnm.$phno;
					$this->upload->initialize($config);
						
					if($this->upload->do_upload('profile'))
					{
						$dt = $this->upload->data('file_name');
					}
				}

				$data=array('admin_code'=>null,'fname'=>$fnm,'mname'=>$mnm,'lname'=>$lnm,'gender'=>$gender,'address'=>$address,'state'=>$state,'city'=>$city,'dob'=>$dob,'phno'=>$phno,'profile'=>$dt,'email'=>$email,'username'=>$user,'password'=>$password,'type'=>'sub');

				$q=$this->Model->model_insert('admintb',$data);
				if($q!='')
				{
					$answer=array('code'=>0,'msg'=>'sucess');
				}
				else
				{
					$answer=array('code'=>1,'msg'=>'failed');
				}
			}
			echo json_encode($answer);
		}
		
		function add_plan()
		{
			$answer=array();
			
			$this->form_validation->set_rules('pnm','Plan Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('pmon','Plan Month','required|numeric');
			$this->form_validation->set_rules('inm','Plan Interest','required|numeric');
			$this->form_validation->set_rules('srate','Price Per Square feet','required|numeric');
			$this->form_validation->set_rules('vnm','Plan Validity','required|numeric');

			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>1,'msg'=>validation_errors());
			}
			else
			{
				$pnm=$this->input->post('pnm');
				$pmon=$this->input->post('pmon');
				$inm=$this->input->post('inm');
				$srate=$this->input->post('srate');
				$validity=$this->input->post('vnm');

				$data=array('plan_code'=>null,'pname'=>$pnm,'pmonth'=>$pmon,'pinterest'=>$inm,'pricepersfeet'=>$srate,'pvalidity'=>$validity);

				$q=$this->Model->model_insert('plantb',$data);

				if($q!='')
				{
					$answer=array('code'=>0,'msg'=>'sucess');
				}
				else
				{
					$answer=array('code'=>1,'msg'=>'failed');
				}
			}
			echo json_encode($answer);	
		}
		
		function add_sponsor()
		{
			$this->form_validation->set_rules('snm','Sponsor Name','required');
			$this->form_validation->set_rules('dob','Date Of Birth','required');
			$this->form_validation->set_rules('mno','Mobile Number','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('amno','Alternative Phone Number','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('city','City','required');
			$this->form_validation->set_rules('bassoc','Branch Associate','required');
			$this->form_validation->set_rules('ptype','Payment Type','required');
			$this->form_validation->set_rules('crate','Commission Rate','required|numeric');
			$this->form_validation->set_rules('pno','Pan Card','required');
			$this->form_validation->set_rules('ano','Aadhar Card','required|numeric');
			$this->form_validation->set_rules('nnm','Nominee Name','required');
			$this->form_validation->set_rules('address','Nominee Address','required');
			$this->form_validation->set_rules('nrel','Nominee Relation','required|alpha');
			$this->form_validation->set_rules('ndob','Nominee Date Of Birth','required');
			$this->form_validation->set_rules('ctype','Commission Type','required');
			$this->form_validation->set_rules('crate','Commission Rate','required');
			$this->form_validation->set_rules('payf','Pay Frecuency','required');

			if(empty($_FILES['profilepic']['name']))
			{
				$this->form_validation->set_rules('profilepic','Profile','required');
			}
			if(empty($_FILES['rproof']['name']))
			{
				$this->form_validation->set_rules('rproof','Resident Proof','required');
			}
			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>1,'msg'=>validation_errors());
			}
			else
			{
				$snm=$this->input->post('snm');
				$gender=$this->input->post('gender');
				$dob=$this->input->post('dob');
				$mno=$this->input->post('mno');
				$altmno=$this->input->post('amno');
				$email=$this->input->post('email');
				$state=$this->input->post('state');
				$city=$this->input->post('city');
				$bassoc=$this->input->post('bassoc');
				$ptype=$this->input->post('ptype');
				$pancard=$this->input->post('pno');
				$ano=$this->input->post('ano');
				$nnm=$this->input->post('nnm');
				$address=$this->input->post('address');
				$nrel=$this->input->post('nrel');
				$ndob=$this->input->post('ndob');
				$ctype=$this->input->post('ctype');
				$crate=$this->input->post('crate');
				$payf=$this->input->post('payf');
				$date=date('d/m/Y');

				if(!empty($_FILES['rproof']['name']))
				{
					$config['upload_path'] = 'assets/uploads/sponsor/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $snm.$mno;
					$this->upload->initialize($config);

					if($this->upload->do_upload('rproof'))
					{
						$dt = $this->upload->data('file_name');
					}
				}

				if(!empty($_FILES['profilepic']['name']))
				{
					$config['upload_path'] = 'assets/uploads/sponsorprofile/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $snm.$dob;
					$this->upload->initialize($config);

					if($this->upload->do_upload('profilepic'))
					{
						$dt1 = $this->upload->data('file_name');
					}
				}

				$data=array('sponsor_code'=>null,'sname'=>$snm,'sgender'=>$gender,'sdob'=>$dob,'sphno'=>$mno,'saltphno'=>$altmno,'semail'=>$email,'sstate'=>$state,'scity'=>$city,'sprofile'=>$dt1,'bassociated'=>$bassoc,'spaymenttype'=>$ptype,'spancardno'=>$pancard,'saadharno'=>$ano,'sresidentproof'=>$dt,'snomineename'=>$nnm,'snomineeaddress'=>$address,'snomineerelation'=>$nrel,'snomineedob'=>$ndob,'screationdate'=>$date,'scommissiontype'=>$ctype,'commissionrate'=>$crate,'payfrequancy'=>$payf);

				$q=$this->Model->model_insert('sponsortb',$data);

				if($q!='')
				{
					$answer=array('code'=>0,'msg'=>'sucess');
				}
				else
				{
					$answer=array('code'=>1,'msg'=>'failed');
				}
			}
			echo json_encode($answer);
		}

		function add_customer()
		{
			$this->form_validation->set_rules('scode','Sponsor code','required');
			$this->form_validation->set_rules('bcode','Branch code','required');
			$this->form_validation->set_rules('cnm','Customer Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('fnm','Father/Husband Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('dob','Date Of Birth','required');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('city','City','required');
			$this->form_validation->set_rules('pcode','pin code','required|numeric|exact_length[6]');
			$this->form_validation->set_rules('mno','Phone Number','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('amno','Alternative Phone Number','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('pno','Pan Card','required|exact_length[10]|regex_match[/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/]');
			$this->form_validation->set_rules('ano','Aadhar Card','required|exact_length[12]|numeric');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('nnm','Nominee Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('nrel','Nominee Relation','required|alpha');
			$this->form_validation->set_rules('ndob','Nominee Date Of Birth','required');
			$this->form_validation->set_rules('naddress','Nominee Address','required');
			$this->form_validation->set_rules('jdate','Joining Date','required');
			$this->form_validation->set_rules('mstatus','Marital Status','required');
			$this->form_validation->set_rules('occu','Occupation','required|alpha');
			$this->form_validation->set_rules('nationality','Nationality','required');
			$this->form_validation->set_rules('splan','Plan','required');
			$this->form_validation->set_rules('sfeet','Square Feet','required|numeric');
			$this->form_validation->set_rules('damt','Down Payment','required|numeric');
			
			if(empty($_FILES['rproof']['name']))
			{
				$this->form_validation->set_rules('rproof','Resident Proof','required');
			}
			if(empty($_FILES['iproof']['name']))
			{
				$this->form_validation->set_rules('iproof','Identity Proof','required');
			}
			if(empty($_FILES['profile']['name']))
			{
				$this->form_validation->set_rules('profile','Profile Pic','required');
			}

			$answer=array();

			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>1,'msg'=>validation_errors());
			}
			else
			{
				$scode=$this->input->post('scode');
				$bcode=$this->input->post('bcode');
				$cnm=$this->input->post('cnm');
				$fnm=$this->input->post('fnm');
				$gender=$this->input->post('gender');
				$address=$this->input->post('address');
				$dob=$this->input->post('dob');
				$country=$this->input->post('country');
				$state=$this->input->post('state');
				$city=$this->input->post('city');
				$pincode=$this->input->post('pcode');
				$mno=$this->input->post('mno');
				$altmno=$this->input->post('amno');
				$pno=$this->input->post('pno');
				$ano=$this->input->post('ano');
				$email=$this->input->post('email');
				$nnm=$this->input->post('nnm');
				$nrel=$this->input->post('nrel');
				$ndob=$this->input->post('ndob');
				$naddress=$this->input->post('naddress');
				$jdate=$this->input->post('jdate');
				$mstatus=$this->input->post('mstatus');
				$occu=$this->input->post('occu');
				$nationality=$this->input->post('nationality');
				$splan=$this->input->post('splan');
				$sfeetp=$this->input->post('sfeetp');
				$sfeet=$this->input->post('sfeet');
				$dpay=$this->input->post('damt');
				$tamt=$this->input->post('tamt');
				$ramt=$this->input->post('ramt');
				$temi=$this->input->post('temi');
				$eval=$this->input->post('eval');
				$ndate=$this->input->post('ndate');
				$bookingno = mt_rand(1000000, 9999999);

				if(!empty($_FILES['rproof']['name']))
				{
					$config['upload_path'] = 'assets/uploads/custresident/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $cnm;
					$this->upload->initialize($config);

					if($this->upload->do_upload('rproof'))
					{
						$dt = $this->upload->data('file_name');
					}
				}

				if(!empty($_FILES['iproof']['name']))
				{
					$config['upload_path'] = 'assets/uploads/custidentity/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $cnm;
					$this->upload->initialize($config);

					if($this->upload->do_upload('iproof'))
					{
						$dt1 = $this->upload->data('file_name');
					}
				}

				if(!empty($_FILES['profile']['name']))
				{
					$config['upload_path'] = 'assets/uploads/custprofile/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $cnm;
					$this->upload->initialize($config);

					if($this->upload->do_upload('profile'))
					{
						$dt2 = $this->upload->data('file_name');
					}
				}

				date_default_timezone_set('Asia/Kolkata');

				$data=array('cust_code'=>null,'cust_name'=>$cnm,'fhname'=>$fnm,'cgender'=>$gender,'cdob'=>$dob,'caddress'=>$address,'ccountry'=>$country,'stateid'=>$state,'cityid'=>$city,'cpincode'=>$pincode,'cphno'=>$mno,'caltphno'=>$altmno,'cpancardno'=>$pno,'caadharcardno'=>$ano,'cemail'=>$email,'profile'=>$dt2,'password'=>$mno,'cresidentproof'=>$dt,'nname'=>$nnm,'nrelation'=>$nrel,'ndob'=>$ndob,'naddress'=>$naddress,'cjoiningdate'=>$jdate,'cnextduedate'=>$ndate,'cmaritalstatus'=>$mstatus,'coccupation'=>$occu,'cnationality'=>$nationality,'cidentityproof'=>$dt1,'cplan'=>$splan,'sponsor_code'=>$scode,'branch_code'=>$bcode,'reg_date'=>date('d/m/Y'),'bookingno'=>$bookingno);

				$qus=$this->Model->model_insert('customertb',$data);
				$custid=$this->db->insert_id();

				$data2=array('purchase_code'=>null,'plan_code'=>$splan,'squarefeetprice'=>$sfeetp,'squarefeet'=>$sfeet,'totalamount'=>$tamt,'downpayment'=>$dpay,'remainingamount'=>$ramt,'totalEMI'=>$temi,'EMIvalue'=>$eval,'cust_code'=>$custid);
				$pur=$this->Model->model_insert('purchasetb',$data2);

				$res=$this->Model->model_customer_receipt_no_select('paymenttb');

				if(sizeof($res)>0)
				{
					$recno=((int)$res[0]->rec_no)+1;
				}

				$data3=array('pay_id'=>null,'rec_no'=>$recno,'rec_date'=>date('d/m/Y'),'cust_code'=>$custid,'installment_no'=>0,'installment_amt'=>$dpay,'due_date'=>$jdate,'next_due_date'=>$ndate,'other_amt'=>0,'pay_mode'=>'Cash','inst_no'=>null,'inst_date'=>null,'inst_bank_name'=>null,'remark'=>null,'net_amt'=>$dpay);
				$pay=$this->Model->model_insert('paymenttb',$data3);

				$data4=array('id'=>null,'cust_code'=>$custid,'type'=>'newcustomer','date'=>date('d/m/Y'),'status'=>1,'msg'=>'true','allowed'=>1);
				$noti=$this->Model->model_insert('notificationtb',$data4);

				$customercoderesult=$this->Model->model_max_cust_code();
				$last_cust_code=$customercoderesult[0]->cust_code;

				$config = array(
                    'protocol'=>'smtp',
                    'smtp_host'=>'ssl://smtp.googlemail.com',
                    'smtp_port'=>'465',
                    'smtp_user'=>'colorfestweb@gmail.com',
                    'smtp_pass'=>'mywebsite',
                    'mailtype'=>'html',
                    'charset'=>'iso-8859-1',
                    'wordwrap'=> TRUE
                );

                $data=array();
                //$body=$this->load->view('user/forget-pwd-mail',$data,TRUE);
                $this->load->library('email',$config);
                $this->email->initialize($config);
                $this->email->from('colorfestweb@gmail.com','Sun9');
                $this->email->to($email);
                $this->email->subject('Welcome '.$cnm);
                $this->email->message("Your Password is : ".$mno."<br> Your Customer Code is : ".$last_cust_code);
                $this->email->set_newline("\r\n");
                $this->email->send();

				if($qus!='' && $pur!='' && $pay!='' && $noti!='')
				{
                	$answer=array('code'=>0,'msg'=>'sucess');
				}
				else
				{
				 	$answer=array('code'=>1,'msg'=>'failed');
				}
			}
			echo json_encode($answer);
		}

		/*Edition*/
		function edit_branch($bcode='')
		{
			$this->form_validation->set_rules('bnm','Branch Name','required');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('city','City','required');

			$answer=array();

			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>1,'msg'=>validation_errors());
			}
			else
			{
				$bnm=$this->input->post('bnm');
				$address=$this->input->post('address');
				$state=$this->input->post('state');
				$city=$this->input->post('city');

				$data=array('bname'=>$bnm,'baddress'=>$address,'bstate'=>$state,'bcity'=>$city);

				$sql=$this->Model->model_branch_update('branchtb',$data,$bcode);

				if($sql!='')
				{
					$answer=array('code'=>0,'msg'=>'sucess');
				}
				else
				{
					$answer=array('code'=>1,'msg'=>'failed');
				}
			}
			echo json_encode($answer);
		}

		function edit_plan($pcode='')
		{
			$this->form_validation->set_rules('pnm','Plan Name','required');
			$this->form_validation->set_rules('pmon','Plan Month','required|numeric');
			$this->form_validation->set_rules('inm','Plan Interest','required|numeric');
			$this->form_validation->set_rules('srate','Price Per Square feet','required|numeric');
			$this->form_validation->set_rules('vnm','Plan Validity','required|numeric');

			$answer=array();

			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>1,'msg'=>validation_errors());
			}
			else
			{
				$pnm=$this->input->post('pnm');
				$pmon=$this->input->post('pmon');
				$inm=$this->input->post('inm');
				$srate=$this->input->post('srate');
				$validity=$this->input->post('vnm');

				$data=array('pname'=>$pnm,'pmonth'=>$pmon,'pinterest'=>$inm,'pricepersfeet'=>$srate,'pvalidity'=>$validity);

				$sql=$this->Model->model_plan_update('plantb',$data,$pcode);
				
				if($sql!='')
				{
					$answer=array('code'=>0,'msg'=>'sucess');
				}
				else
				{
					$answer=array('code'=>1,'msg'=>'failed');
				}
			}
			echo json_encode($answer);
		}

		function edit_sponsor($scode)
		{
			$res=$this->Model->model_select('sponsortb',array('sponsor_code'=>$scode));
			$dt=$res[0]->sprofile;
			$dt1=$res[0]->sresidentproof;

			$this->form_validation->set_rules('snm','Sponsor Name','required');
			$this->form_validation->set_rules('dob','Date Of Birth','required');
			$this->form_validation->set_rules('mno','Mobile Number','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('amno','Alternative Phone Number','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('city','City','required');
			$this->form_validation->set_rules('bassoc','Branch Associate','required');
			$this->form_validation->set_rules('ptype','Payment Type','required');
			$this->form_validation->set_rules('crate','Commission Rate','required|numeric');
			$this->form_validation->set_rules('pno','Pan Card','required');
			$this->form_validation->set_rules('ano','Aadhar Card','required|numeric');
			$this->form_validation->set_rules('nnm','Nominee Name','required');
			$this->form_validation->set_rules('address','Nominee Address','required');
			$this->form_validation->set_rules('nrel','Nominee Relation','required|alpha');
			$this->form_validation->set_rules('ndob','Nominee Date Of Birth','required');
			$this->form_validation->set_rules('ctype','Commission Type','required');
			$this->form_validation->set_rules('crate','Commission Rate','required');
			$this->form_validation->set_rules('payf','Pay Frecuency','required');

			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>1,'msg'=>validation_errors());
			}
			else
			{
				$snm=$this->input->post('snm');
				$gender=$this->input->post('gender');
				$dob=$this->input->post('dob');
				$mno=$this->input->post('mno');
				$altmno=$this->input->post('amno');
				$email=$this->input->post('email');
				$state=$this->input->post('state');
				$city=$this->input->post('city');
				$bassoc=$this->input->post('bassoc');
				$ptype=$this->input->post('ptype');
				$pancard=$this->input->post('pno');
				$ano=$this->input->post('ano');
				$nnm=$this->input->post('nnm');
				$address=$this->input->post('address');
				$nrel=$this->input->post('nrel');
				$ndob=$this->input->post('ndob');
				$ctype=$this->input->post('ctype');
				$crate=$this->input->post('crate');
				$payf=$this->input->post('payf');
				$date=date('d/m/Y');

				if(!empty($_FILES['profile']['name']))
				{
					$config['upload_path'] = 'assets/uploads/sponsorprofile/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $snm.$dob;
					$this->upload->initialize($config);

					if($this->upload->do_upload('profile'))
					{
						$dt = $this->upload->data('file_name');
					}
					else
					{
						$str1=$this->upload->display_errors();
					}
				}

				if(!empty($_FILES['rproof']['name']))
				{
					$config['upload_path'] = 'assets/uploads/sponsor/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $snm.$mno;
					$this->upload->initialize($config);
					if($this->upload->do_upload('rproof'))
					{
						$dt1 = $this->upload->data('file_name');
					}
					else
					{
						$str=$this->upload->display_errors();
					}
				}

				$data=array('sname'=>$snm,'sgender'=>$gender,'sdob'=>$dob,'sphno'=>$mno,'saltphno'=>$altmno,'semail'=>$email,'sstate'=>$state,'scity'=>$city,'sprofile'=>$dt,'bassociated'=>$bassoc,'spaymenttype'=>$ptype,'spancardno'=>$pancard,'saadharno'=>$ano,'sresidentproof'=>$dt1,'snomineename'=>$nnm,'snomineeaddress'=>$address,'snomineerelation'=>$nrel,'snomineedob'=>$ndob,'screationdate'=>$date,'scommissiontype'=>$ctype,'commissionrate'=>$crate,'payfrequancy'=>$payf);

				$sql=$this->Model->model_sponsor_update('sponsortb',$data,$scode);
				
				if($sql!='')
				{
					$answer=array('code'=>0,'msg'=>'sucess','dt'=>$dt,'dt1'=>$dt1);
				}
				else
				{
					$answer=array('code'=>1,'msg'=>'failed');
				}
			}
			echo json_encode($answer);
		}

		function edit_admin($acode)
		{
			$res=$this->Model->model_select('admintb',array('admin_code'=>$acode));
			$dt=$res[0]->profile;
				
			$this->form_validation->set_rules('fnm','First Name','required|alpha');
			$this->form_validation->set_rules('mnm','Middle Name','required|alpha');
			$this->form_validation->set_rules('lnm','Last Name','required|alpha');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('city','City','required');
			$this->form_validation->set_rules('dob','Date Of Birth','required');
			$this->form_validation->set_rules('phno','Phone Number','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('user','User Name','required|min_length[5]|max_length[15]|regex_match[/^[a-zA-Z_.]{1,}[0-9]*$/]');
			$this->form_validation->set_rules('password','Password','required|min_length[5]|max_length[20]');

			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>1,'msg'=>validation_errors());
			}
			else
			{
			    $fnm=$this->input->post('fnm');
				$mnm=$this->input->post('mnm');
				$lnm=$this->input->post('lnm');
				$gender=$this->input->post('gender');
				$address=$this->input->post('address');
				$state=$this->input->post('state');
				$city=$this->input->post('city');
				$dob=$this->input->post('dob');
				$phno=$this->input->post('phno');
				$email=$this->input->post('email');
				$user=$this->input->post('user');
				$password=base64_encode($this->input->post('password'));

				if(!empty($_FILES['profile']['name']))
				{
					$config['upload_path'] = 'assets/uploads/admin/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $fnm.$mnm.$lnm.$phno;
					$this->upload->initialize($config);

					if($this->upload->do_upload('profile'))
					{
						$dt = $this->upload->data('file_name');
					}
				}
				else
				{
					$str=$this->upload->display_errors();
				}

				$data=array('fname'=>$fnm,'mname'=>$mnm,'lname'=>$lnm,'gender'=>$gender,'address'=>$address,'state'=>$state,'city'=>$city,'dob'=>$dob,'phno'=>$phno,'profile'=>$dt,'email'=>$email,'username'=>$user,'password'=>$password,'type'=>'sub');

				$sql=$this->Model->model_admin_update('admintb',$data,$acode);
			
				if($sql!='')
				{
					$answer=array('code'=>0,'msg'=>'sucess','dt'=>$dt);
				}
				else
				{
					$answer=array('code'=>1,'msg'=>'failed');
				}
			}
			echo json_encode($answer);
		}

		function edit_customer($ccode='')
		{
			$res=$this->Model->model_select('customertb',array('cust_code'=>$ccode));
			$dt=$res[0]->cresidentproof;
			$dt1=$res[0]->cidentityproof;
			$dt2=$res[0]->profile;

			$this->form_validation->set_rules('scode','Sponsor code','required');
			$this->form_validation->set_rules('bcode','Branch code','required');
			$this->form_validation->set_rules('cnm','Customer Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('fnm','Father/Husband Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('dob','Date Of Birth','required');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('city','City','required');
			$this->form_validation->set_rules('pcode','pin code','required|numeric|exact_length[6]');
			$this->form_validation->set_rules('mno','Phone Number','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('amno','Alternative Phone Number','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('pno','Pan Card','required|exact_length[10]|regex_match[/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/]');
			$this->form_validation->set_rules('ano','Aadhar Card','required|exact_length[12]|numeric');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('nnm','Nominee Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('nrel','Nominee Relation','required|alpha');
			$this->form_validation->set_rules('ndob','Date Of Birth','required');
			$this->form_validation->set_rules('naddress','Address','required');
			$this->form_validation->set_rules('jdate','Joining Date','required');
			$this->form_validation->set_rules('mstatus','Marital Status','required');
			$this->form_validation->set_rules('occu','Occupation','required');
			$this->form_validation->set_rules('nationality','Nationality','required');
			$this->form_validation->set_rules('splan','Plan','required');
			$this->form_validation->set_rules('sfeet','Square Feet','required|numeric');
			$this->form_validation->set_rules('damt','Down Payment','required|numeric');

			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>1,'msg'=>validation_errors());
			}
			else
			{
				$scode=$this->input->post('scode');
				$bcode=$this->input->post('bcode');
				$cnm=$this->input->post('cnm');
				$fnm=$this->input->post('fnm');
				$gender=$this->input->post('gender');
				$address=$this->input->post('address');
				$dob=$this->input->post('dob');
				$country=$this->input->post('country');
				$state=$this->input->post('state');
				$city=$this->input->post('city');
				$pincode=$this->input->post('pcode');
				$mno=$this->input->post('mno');
				$altmno=$this->input->post('amno');
				$pno=$this->input->post('pno');
				$ano=$this->input->post('ano');
				$email=$this->input->post('email');
				$nnm=$this->input->post('nnm');
				$nrel=$this->input->post('nrel');
				$ndob=$this->input->post('ndob');
				$naddress=$this->input->post('naddress');
				$jdate=$this->input->post('jdate');
				$mstatus=$this->input->post('mstatus');
				$occu=$this->input->post('occu');
				$nationality=$this->input->post('nationality');
				$splan=$this->input->post('splan');
				$sfeetp=$this->input->post('sfeetp');
				$sfeet=$this->input->post('sfeet');
				$dpay=$this->input->post('damt');
				$tamt=$this->input->post('tamt');
				$ramt=$this->input->post('ramt');
				$temi=$this->input->post('temi');
				$eval=$this->input->post('eval');
				$ndate=$this->input->post('ndate');

				if(!empty($_FILES['rproof']['name']))
				{
					$config['upload_path'] = 'assets/uploads/custresident/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $cnm.$pincode.rand(1000,1000000);
					$this->upload->initialize($config);
					if($this->upload->do_upload('rproof'))
					{
						$dt = $this->upload->data('file_name');
					}
				}

				if(!empty($_FILES['iproof']['name']))
				{
					$config['upload_path'] = 'assets/uploads/custidentity/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $cnm.$pincode.rand(1000,1000000);
					$this->upload->initialize($config);
					if($this->upload->do_upload('iproof'))
					{
						$dt1 = $this->upload->data('file_name');
					}
				}

				if(!empty($_FILES['profile']['name']))
				{
					$config['upload_path'] = 'assets/uploads/custprofile/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $cnm.$pincode.rand(1000,1000000);
					$this->upload->initialize($config);
					if($this->upload->do_upload('iproof'))
					{
						$dt2 = $this->upload->data('file_name');
					}
				}

				$data=array('cust_name'=>$cnm,'fhname'=>$fnm,'cgender'=>$gender,'cdob'=>$dob,'caddress'=>$address,'ccountry'=>$country,'stateid'=>$state,'cityid'=>$city,'cpincode'=>$pincode,'cphno'=>$mno,'caltphno'=>$altmno,'cpancardno'=>$pno,'caadharcardno'=>$ano,'cemail'=>$email,'profile'=>$dt2,'cresidentproof'=>$dt,'nname'=>$nnm,'nrelation'=>$nrel,'ndob'=>$ndob,'naddress'=>$naddress,'cjoiningdate'=>$jdate,'cnextduedate'=>$ndate,'cmaritalstatus'=>$mstatus,'coccupation'=>$occu,'cnationality'=>$nationality,'cidentityproof'=>$dt1,'cplan'=>$splan,'sponsor_code'=>$scode,'branch_code'=>$bcode);

				$qus=$this->Model->model_customer_update('customertb',$data,$ccode);

				$data2=array('plan_code'=>$splan,'squarefeetprice'=>$sfeetp,'squarefeet'=>$sfeet,'totalamount'=>$tamt,'downpayment'=>$dpay,'remainingamount'=>$ramt,'totalEMI'=>$temi,'EMIvalue'=>$eval);
					$pur=$this->Model->model_customer_update('purchasetb',$data2,$ccode);
						
				if($qus!='' && $pur!='')
				{
					$answer=array('code'=>0,'msg'=>'sucess');
				}
				else
				{
					$answer=array('code'=>1,'msg'=>'failed');
				}
			}
			echo json_encode($answer);
		}

		function preview_customer($status)
		{
			$this->form_validation->set_rules('scode','Sponsor code','required');
			$this->form_validation->set_rules('bcode','Branch code','required');
			$this->form_validation->set_rules('cnm','Customer Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('fnm','Father/Husband Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('dob','Date Of Birth','required');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('city','City','required');
			$this->form_validation->set_rules('pcode','pin code','required|numeric|exact_length[6]');
			$this->form_validation->set_rules('mno','Phone Number','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('amno','Alternative Phone Number','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('pno','Pan Card','required|exact_length[10]|regex_match[/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/]');
			$this->form_validation->set_rules('ano','Aadhar Card','required|exact_length[12]|numeric');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('nnm','Nominee Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('nrel','Nominee Relation','required|alpha');
			$this->form_validation->set_rules('ndob','Nominee Date Of Birth','required');
			$this->form_validation->set_rules('naddress','Nominee Address','required');
			$this->form_validation->set_rules('jdate','Joining Date','required');
			$this->form_validation->set_rules('mstatus','Marital Status','required');
			$this->form_validation->set_rules('occu','Occupation','required|alpha');
			$this->form_validation->set_rules('nationality','Nationality','required');
			$this->form_validation->set_rules('splan','Plan','required');
			$this->form_validation->set_rules('sfeet','Square Feet','required|numeric');
			$this->form_validation->set_rules('damt','Down Payment','required|numeric');

			if($status=="add")
			{
				if(empty($_FILES['rpic']['name']))
				{
					$this->form_validation->set_rules('rpic','Resident Proof','required');
				}

				if(empty($_FILES['ipic']['name']))
				{
					$this->form_validation->set_rules('ipic','Identity Proof','required');
				}
			}

			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>1,'msg'=>validation_errors());
			}
			else
			{
				$statename;
				$cityname;

				$state=$this->input->post('state');
				$city=$this->input->post('city');
				$stateresult=$this->Model->model_select('state',array('StateID'=>$state));
				$cityresult=$this->Model->model_select('city',array('city_id'=>$city));

				foreach($stateresult as $value)
				{
					$statename=$value->StateName;
				}
				foreach($cityresult as $value1)
				{
					$cityname=$value1->city_name;
				}
					
				$answer=array('code'=>0,'msg'=>'success','state'=>$statename,'city'=>$cityname);
			}
			echo json_encode($answer);
		}

		/*Load Edit*/
		function load_editbranch($bid)
		{
			if($this->session->userdata('adminname'))
			{
				$array['i']=$bid;
				$this->load->view('admin/editbranch',$array);
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_editplan($plan_code)
		{
			if($this->session->userdata('adminname'))
			{
				$array['i']=$plan_code;
				$this->load->view('admin/editplan',$array);
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_admineditsponsor($sponsor_code)
		{
			if($this->session->userdata('adminname'))
			{
				$array['i']=$sponsor_code;
				$this->load->view('admin/editsponsor',$array);
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_brancheditsponsor($sponsor_code)
		{
			if($this->session->userdata('branchname'))
			{
				$array['i']=$sponsor_code;
				$this->load->view('branch/editsponsor',$array);
			}
			else
			{
				redirect('Controller/load_branch_login');
			}
		}

		function load_admineditcustomer($customer_code)
		{
			if($this->session->userdata('adminname'))
			{
				$array['i']=$customer_code;
				$this->load->view('admin/editcustomer',$array);
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_brancheditcustomer($customer_code)
		{
			if($this->session->userdata('branchname'))
			{
				$array['i']=$customer_code;
				$this->load->view('branch/editcustomer',$array);
			}
			else
			{
				redirect('Controller/load_branch_login');
			}
		}

		function load_editadmin($admin_code)
		{
			if($this->session->userdata('adminname'))
			{
				$array['i']=$admin_code;
				$this->load->view('admin/editadmin',$array);
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function find_receiptdata($cust_code)
		{
			$branchcode;
			$res=$this->Model->model_select('customertb',array('cust_code'=>$cust_code));
			$res1=$this->Model->model_customer_receipt_select('paymenttb',$cust_code);
			$res3=$this->Model->model_custplan_receipt_select($cust_code);
			$res2=$this->Model->model_select('purchasetb',array('cust_code'=>$cust_code));

			foreach($res as $value)
			{
				$branchcode=$value->branch_code;
				$sponsorcode=$value->sponsor_code;
			}	

			$res4=$this->Model->model_branchnm_receipt_select($branchcode);
			$res5=$this->Model->model_sponsornm_receipt_select($sponsorcode);
			if(sizeof($res) > 0)
			{
				$status=array('status'=>'found');
				$result=array_merge($res,$res1,$res2,$res3,$res4,$res5,$status);
				echo json_encode($result);	
			}
			else
			{
				$result=array('status'=>'notfound');
				echo json_encode($result);
			}
		}

		// function find_receiptdata($cust_code)
		// {
		// 	$res=$this->Model->model_select('customertb',array('cust_code'=>$cust_code));
		// 	$res1=$this->Model->model_customer_receipt_select('paymenttb',$cust_code);
		// 	$res3=$this->Model->model_custplan_receipt_select($cust_code);
		// 	$res2=$this->Model->model_select('purchasetb',array('cust_code'=>$cust_code));	
			
		// 	if(sizeof($res) > 0)
		// 	{
		// 		$status=array('status'=>'found');
		// 		$result=array_merge($res,$res2,$res3,$res1,$status);
		// 		echo json_encode($result);	
		// 	}
		// 	else
		// 	{
		// 		$result=array('status'=>'notfound');
		// 		echo json_encode($result);
		// 	}
		// }

		function load_receiptlist()
		{
			if($this->session->userdata('branchname'))
			{ 
				$this->load->view('branch/receiptlist');
			}
			else
			{
				redirect('Controller/load_branch_login');
			}
		}

		function load_customer_ledger()
		{
			if($this->session->userdata('branchname'))
			{ 
				$this->load->view('branch/customerledger');
			}
			else
			{
				redirect('Controller/load_branch_login');
			}
		}

		function load_receipt_data($cust_code)
		{
			$res=$this->Model->model_select('customertb',array('cust_code'=>$cust_code));
			$res1=$this->Model->model_customer_receipt_select('paymenttb',$cust_code);
			$res3=$this->Model->model_custplan_receipt_select($cust_code);
			$res2=$this->Model->model_select('purchasetb',array('cust_code'=>$cust_code));	
			
			if(sizeof($res) > 0)
			{
				$status=array('status'=>'found');
				$result=array_merge($res,$res2,$res3,$res1,$status);
				echo json_encode($result);	
			}
			else
			{
				$result=array('status'=>'notfound');
				echo json_encode($result);
			}
		}

		// function load_receipt_data($cust_code,$rec_no)
		// {
		// 	$res1=$this->Model->model_select('customertb',array('cust_code'=>$cust_code));
		// 	$res2=$this->Model->model_select('paymenttb',array('rec_no'=>$rec_no));
		// 	$res3=$this->Model->model_select('purchasetb',array('cust_code'=>$cust_code));

		// 	foreach ($res1 as $value)
		// 	{
		// 		$sponsor_code=$value->sponsor_code;
		// 		$branch_code=$value->branch_code;
		// 	}
		// 	$res4=$this->Model->model_select('sponsortb',array('sponsor_code'=>$sponsor_code));
		// 	$res5=$this->Model->model_select('branchtb',array('branch_code'=>$branch_code));

		// 	$arr=array_merge($res1,$res2,$res3,$res4,$res5);
		// 	echo json_encode($arr);
		// }

		function ledger_front_details($cust_code)
		{
			$res1=$this->Model->model_select('customertb',array('cust_code'=>$cust_code));
			foreach($res1 as $value)
			{
				$plancode=$value->cplan;
			}
			$res2=$this->Model->model_select('plantb',array('plan_code'=>$plancode));
			$res3=$this->Model->model_select('purchasetb',array('cust_code'=>$cust_code));
			$result=array_merge($res1,$res2,$res3);
			echo json_encode($result);
		}

		function ledger_second_details($cust_code)
		{
			$count=1;
			$inst_no=0;
			$cust_code;
			$plan_code;
			$plan_month;
			$remain_installment;
			$installment_amount=0;
			$next_due_date='';
			$total_installment=0;
			$day=0;
			$month=0;
			$year=0;
			$newmonth=0;
			$newyear=0;

			$res1=$this->Model->model_select('paymenttb',array('cust_code'=>$cust_code));

			foreach($res1 as $value)
			{
				$inst_no=$value->installment_no;
				$cust_code=$value->cust_code;
			}

			$res2=$this->Model->model_select('customertb',array('cust_code'=>$cust_code));

			foreach($res2 as $value1)
			{
				$plan_code=$value1->cplan;
			}

			$res3=$this->Model->model_select('plantb',array('plan_code'=>$plan_code));

			foreach($res3 as $value2)
			{
				$plan_month=$value2->pmonth;
			}

			$remain_installment=$plan_month-$inst_no;

			$bigdata='<div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive b-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped text-center">
                                            <thead>
                                                <tr>
                                                	<th>Print</th>
                                                    <th>No</th>
                                                    <th>Receipt <br> No</th>
                                                    <th>Receipt <br> Date</th>
                                                    <th>Installment <br> No</th>
                                                    <th>Installment <br> Amount</th>
                                                    <th>Late <br> Fee</th>
                                                    <th>Net <br> Amount</th>
                                                    <th>Due <br> Date</th>
                                                    <th>NextDue <br> Date</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>';
                                                 
                                            foreach($res1 as $value)
                                            {
                                                $bigdata.='<tr>
                                                    <th><a href="javascript:printreceipt('.$value->cust_code.')"><i class="ion-printer" style="font-size:25px;"></i></a></th>
                                                    <td>'.$count.'</td>
                                                    <td>'.$value->rec_no.'</td>
                                                    <td>'.$value->rec_date.'</td>
                                                    <td>'.$value->installment_no.'</td>
                                                    <td>'.$value->installment_amt.'</td>
                                                    <td>';if($value->other_amt)$bigdata.=$value->other_amt;else $bigdata.="--" ;
                                                    $bigdata.='</td>
                                                    <td>'.$value->net_amt.'</td>
                                                    <td>'.$value->due_date.'</td>
                                                    <td>'.$value->next_due_date.'</td>
                                                </tr>';
                                                $count++;
                                                $installment_amount=$value->installment_amt;
                                                $next_due_date=$value->next_due_date;
                                                $total_installment=$total_installment+$value->installment_amt;
                                            }

                                            for($i=0;$i<$remain_installment;$i++)
                                            {
	                                            $inst_no++;
	                                            $bigdata.='
                                            	<tr>
                                            		<th></th>
                                            		<td>'.$count.'</td>
                                            		<td>'."--".'</td>
                                            		<td>'."--".'</td>
                                            		<td>'.$inst_no.'</td>
                                            		<td>'.$installment_amount.'</td>
                                            		<td>'."--".'</td>
                                            		<td>'."--".'</td>
                                            		<td>'.$next_due_date.'</td>';

                                            		$day=substr($next_due_date, 0,2);
	                                            	$month=substr($next_due_date, 3,2);
	                                            	$year=substr($next_due_date, 6,4);

	                                            	$newmonth=(int)$month + 1;
	                                            	if((int)$newmonth < 10)
	                                            	{
	                                            		$newmonth="0".$newmonth;
	                                            	}
	                                            	if((int)$newmonth > 12)
	                                            	{
	                                            		$newyear=(int)$year + 1;
	                                            		$newmonth='01';
	                                            	}
	                                            	else
	                                            	{
	                                            		$newyear=$year;
	                                            	}
	                                            	$next_due_date=$day."/".$newmonth."/".$newyear;
                                            		$bigdata.='<td>'.$next_due_date.'</td>
                                            	</tr>';
                                            	$count++;
                                            }
                                            $bigdata.='<tr><td></td><td></td><td></td><td></td><td>Total amount</td><td>'.$total_installment.'</td><tr>';
                                            $bigdata.='</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                echo $bigdata;		
		}

		function load_admindetails($id)
		{
			$res=$this->Model->model_select('admintb',array('admin_code'=>$id));

			foreach($res as $value)
			{
				
				$stateid=$value->state;
				$cityid=$value->city;
			}

			$resultstatename=$this->Model->model_select('state',array('StateID'=>$stateid));
			$resultcityname=$this->Model->model_select('city',array('city_id'=>$cityid));

			$merge_array=array_merge($res,$resultstatename,$resultcityname);

			echo json_encode($merge_array);
		}
		
		function load_city($stateid)
		{
			$res=$this->Model->model_select_city('city',array('State_ID'=>$stateid));

			$bigdata='<option hidden="" value="">Select</option>';
			foreach($res as $value)
			{
				$bigdata.='<option value="'.$value->city_id.'">'.$value->city_name.'</option>';
			}
			echo $bigdata;
		}

		function load_sponsorname($sponsorcode)
		{
			$res=$this->Model->model_select('sponsortb',array('sponsor_code'=>$sponsorcode));

			foreach($res as $value)
			{
				$bigdata=$value->sname;
			}
			echo $bigdata;
		}

		function load_branchname($branchcode)
		{
			$bigdata='';
			$res=$this->Model->model_select('branchtb',array('bid'=>$branchcode));

			foreach($res as $value)
			{
				$bigdata=$value->bname;
			}
			echo $bigdata;
		}

		function create_receipt()
		{
			$pmode;
			$otheramt;
			$answer=array();
			$data;

			$this->form_validation->set_rules('cust_id','Customer ID','required|numeric');
			$this->form_validation->set_rules('other_amt','Other Amount','numeric');
			$this->form_validation->set_rules('pmode','Payment Mode','required');

			$pmode=$this->input->post('pmode');
			if($pmode=="Cheque")
			{
				$this->form_validation->set_rules('chequeno','Chequeno','required|numeric|exact_length[6]');
				$this->form_validation->set_rules('chequedate','Cheque Date','required');
				$this->form_validation->set_rules('chequebankname','Bank Name','required');
			}
			if($pmode=="Demand Draft")
			{
				$this->form_validation->set_rules('ddno','DD No','required|numeric|exact_length[6]');
				$this->form_validation->set_rules('dddate','DD Date','required');
				$this->form_validation->set_rules('ddbankname','Bank Name','required');
			}

			$otheramt=$this->input->post('other_amt');
			if($otheramt!='')
			{
				$this->form_validation->set_rules('remark','Remark','required');
			}

			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>1,'msg'=>validation_errors());
			}
			else
			{
				$recno=$this->input->post('rec_no');
				$recdate=$this->input->post('rec_date');
				$custid=$this->input->post('cust_id');
				$instno=$this->input->post('inst_no');
				$instamt=$this->input->post('inst_amt');
				$duedate=$this->input->post('due_date');
				$nextduedate=$this->input->post('next_due_date');
				$chequeno=$this->input->post('chequeno');
				$chequedate=$this->input->post('chequedate');
				$chequebankname=$this->input->post('chequebankname');
				$ddno=$this->input->post('ddno');
				$dddate=$this->input->post('dddate');
				$ddbankname=$this->input->post('ddbankname');
				$remark=$this->input->post('remark');
				$netamount=$this->input->post('netamt');
				$duetime=$this->input->post('duetime');

				if($pmode=="Cash" && $otheramt!="")
				{
					$data=array('pay_id'=>null,'rec_no'=>$recno,'rec_date'=>$recdate,'cust_code'=>$custid,'installment_no'=>$instno,'installment_amt'=>$instamt,'due_date'=>$duedate,'next_due_date'=>$nextduedate,'other_amt'=>$otheramt,'pay_mode'=>$pmode,'inst_no'=>null,'inst_date'=>null,'inst_bank_name'=>null,'remark'=>$remark,'net_amt'=>$netamount,'duetime'=>$duetime);
				}
				else if($pmode=="Cheque" && $otheramt!="")
				{
					$data=array('pay_id'=>null,'rec_no'=>$recno,'rec_date'=>$recdate,'cust_code'=>$custid,'installment_no'=>$instno,'installment_amt'=>$instamt,'due_date'=>$duedate,'next_due_date'=>$nextduedate,'other_amt'=>$otheramt,'pay_mode'=>$pmode,'inst_no'=>$chequeno,'inst_date'=>$chequedate,'inst_bank_name'=>$chequebankname,'remark'=>$remark,'net_amt'=>$netamount,'duetime'=>$duetime);
				}
				else if($pmode=="Demand Draft" && $otheramt!="")
				{
					$data=array('pay_id'=>null,'rec_no'=>$recno,'rec_date'=>$recdate,'cust_code'=>$custid,'installment_no'=>$instno,'installment_amt'=>$instamt,'due_date'=>$duedate,'next_due_date'=>$nextduedate,'other_amt'=>$otheramt,'pay_mode'=>$pmode,'inst_no'=>$ddno,'inst_date'=>$dddate,'inst_bank_name'=>$ddbankname,'remark'=>$remark,'net_amt'=>$netamount,'duetime'=>$duetime);
				}
				if($pmode=="Cash" && $otheramt=="")
				{
					$data=array('pay_id'=>null,'rec_no'=>$recno,'rec_date'=>$recdate,'cust_code'=>$custid,'installment_no'=>$instno,'installment_amt'=>$instamt,'due_date'=>$duedate,'next_due_date'=>$nextduedate,'other_amt'=>null,'pay_mode'=>$pmode,'inst_no'=>null,'inst_date'=>null,'inst_bank_name'=>null,'remark'=>null,'net_amt'=>$netamount,'duetime'=>$duetime);
				}
				else if($pmode=="Cheque" && $otheramt=="")
				{
					$data=array('pay_id'=>null,'rec_no'=>$recno,'rec_date'=>$recdate,'cust_code'=>$custid,'installment_no'=>$instno,'installment_amt'=>$instamt,'due_date'=>$duedate,'next_due_date'=>$nextduedate,'other_amt'=>null,'pay_mode'=>$pmode,'inst_no'=>$chequeno,'inst_date'=>$chequedate,'inst_bank_name'=>$chequebankname,'remark'=>null,'net_amt'=>$netamount,'duetime'=>$duetime);
				}
				else if($pmode=="Demand Draft" && $otheramt=="")
				{
					$data=array('pay_id'=>null,'rec_no'=>$recno,'rec_date'=>$recdate,'cust_code'=>$custid,'installment_no'=>$instno,'installment_amt'=>$instamt,'due_date'=>$duedate,'next_due_date'=>$nextduedate,'other_amt'=>null,'pay_mode'=>$pmode,'inst_no'=>$ddno,'inst_date'=>$dddate,'inst_bank_name'=>$ddbankname,'remark'=>null,'net_amt'=>$netamount,'duetime'=>$duetime);
				}
				else if($otheramt=='')
				{
					$data=array('pay_id'=>null,'rec_no'=>$recno,'rec_date'=>$recdate,'cust_code'=>$custid,'installment_no'=>$instno,'installment_amt'=>$instamt,'due_date'=>$duedate,'next_due_date'=>$nextduedate,'other_amt'=>null,'pay_mode'=>$pmode,'inst_no'=>$ddno,'inst_date'=>$dddate,'inst_bank_name'=>$ddbankname,'remark'=>null,'net_amt'=>$netamount,'duetime'=>$duetime);
				}

				$q=$this->Model->model_insert('paymenttb',$data);

				if($q!='')
				{
					$data1=array('id'=>null,'cust_code'=>$custid,'type'=>'newpayment','date'=>date('d/m/Y'),'status'=>1,'msg'=>'true','allowed'=>1);
					$noti=$this->Model->model_insert('notificationtb',$data1);
					$answer=array('code'=>0,'msg'=>'sucess');
				}
				else
				{
					$answer=array('code'=>1,'msg'=>'failed');
				}
			}
			echo json_encode($answer);
		}

		function receipt_data()
		{
			 $res=$this->Model->model_select_for_customerreceipt_desc('paymenttb');
                                                   
				$bigdata='<div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive b-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Print</th>
                                                    <th>Receipt <br> No</th>
                                                    <th>Receipt <br> Date</th>
                                                    <th>Cust <br> Code</th>
                                                    <th>Cust <br> Name</th>
                                                    <th>Installment <br> No</th>
                                                    <th>Installment <br> Amount</th>
                                                    <th>Other <br> Amount</th>
                                                    <th>Bank <br> Name</th>
                                                    <th>Cheque <br> no</th>
                                                    <th>Total <br> Amount</th>
                                                    <th>Remark</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>';
                                                 
                                             foreach($res as $value)
                                             {
                                               	$res1=$this->Model->model_select('customertb',array('cust_code'=>$value->cust_code));
                                                $bigdata.='<tr>
                                                    <th><a href="javascript:printreceipt('.$value->cust_code.')"><i class="ion-printer" style="font-size:25px;"></i></a></th>
                                                    <td>'.$value->rec_no.'</td>
                                                    <td>'.$value->rec_date.'</td>
                                                    <td>'.$value->cust_code.'</td>
                                                    <td>'.$res1[0]->cust_name.'</td>
                                                    <td>'.$value->installment_no.'</td>
                                                    <td>'.$value->installment_amt.'</td>
                                                    <td>';if($value->other_amt)$bigdata.=$value->other_amt;else $bigdata.="--" ;
                                                    $bigdata.='</td>
                                                    <td>';if($value->inst_bank_name)$bigdata.=$value->inst_bank_name;else $bigdata.="--";
                                                    $bigdata.='</td>
                                                    <td>';if($value->inst_no)$bigdata.=$value->inst_no;else $bigdata.="--";
                                                    $bigdata.='</td>
                                                    <td>'.$value->net_amt.'</td>
                                                    <td>';if($value->remark)$bigdata.=$value->remark;else $bigdata.="--";$bigdata.='</td>
                                                </tr>';
                                                    }
                                            $bigdata.='</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                    echo $bigdata;
		}

		function load_search_data($recno='',$custid='',$custnm='',$scode='',$fdate='',$tdate='')
		{
			$res=$this->Model->model_search_rec($recno,$custid,$custnm,$scode,$fdate,$tdate);
			
			if(sizeof($res) > 0) 
			{
					$bigdata='<div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive b-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Print</th>
                                                    <th>Receipt <br> No</th>
                                                    <th>Receipt <br> Date</th>
                                                    <th>Cust <br> Code</th>
                                                    <th>Cust <br> Name</th>
                                                    <th>Installment <br> No</th>
                                                    <th>Installment <br> Amount</th>
                                                    <th>Other <br> Amount</th>
                                                    <th>Bank <br> Name</th>
                                                    <th>Cheque <br> no</th>
                                                    <th>Total <br> Amount</th>
                                                    <th>Remark</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>';
                                                 
                                             foreach($res as $value)
                                             {
                                               	$res1=$this->Model->model_select('customertb',array('cust_code'=>$value->cust_code));
                                                $bigdata.='<tr>
                                                    <th><i class="ion-printer" style="font-size:25px;"></i></th>
                                                    <td>'.$value->rec_no.'</td>
                                                    <td>'.$value->rec_date.'</td>
                                                    <td>'.$value->cust_code.'</td>
                                                    <td>'.$res1[0]->cust_name.'</td>
                                                    <td>'.$value->installment_no.'</td>
                                                    <td>'.$value->installment_amt.'</td>
                                                    <td>';if($value->other_amt)$bigdata.=$value->other_amt;else $bigdata.="--" ;
                                                    $bigdata.='</td>
                                                    <td>';if($value->inst_bank_name)$bigdata.=$value->inst_bank_name;else $bigdata.="--";
                                                    $bigdata.='</td>
                                                    <td>';if($value->inst_no)$bigdata.=$value->inst_no;else $bigdata.="--";
                                                    $bigdata.='</td>
                                                    <td>'.$value->net_amt.'</td>
                                                    <td>';if($value->remark)$bigdata.=$value->remark;else $bigdata.="--";$bigdata.='</td>
                                                </tr>';
                                                    }
                                            $bigdata.='</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                echo $bigdata;
            }
            else
            {
            	$bigdata='<div class="row">
                    <div class="col-12 text-center">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h3>No Record Found</h3>
                            </div>
                        </div>
                    </div>
                </div> ';
            	echo $bigdata;
            }
		}

		function customer_exist_or_not($cust_code)
		{
			$answer=array();
			$res=$this->Model->model_select('customertb',array('cust_code'=>$cust_code));
			if(sizeof($res) > 0)
			{ 
				$answer=array('msg'=>'found');
			}
			else
			{
				$answer=array('msg'=>'notfound');
			}
			echo json_encode($answer);
		}

		function load_overduelist()
		{
			if($this->session->userdata('branchname'))
			{
				$this->load->view('branch/overduelist');
			}
			else
			{
				redirect('Controller/load_branch_login');
			}
		}

		function overduelist()
		{
			 $res=$this->Model->model_overdue_list();
				$bigdata='<div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive b-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Cust <br> Code</th>
                                                    <th>Cust <br> Name</th>
                                                    <th>Total Due <br> Month</th>
                                                    <th>Installment <br> Amount</th>
                                                    <th>Total <br> panalty</th>
                                                    <th>Total <br> Due</th>
                                                    <th>Due <br> Date</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>';
                                                 
                                             foreach($res as $value)
                                             {
	                                             	$ndate=$value->next_due_date;
	                                             	$cust_code=$value->cust_code;
	                                               $res1=$this->Model->model_select('customertb',array('cust_code'=>$value->cust_code));
	                                               $res2=$this->Model->model_custplan_receipt_select($cust_code);
	                                               $res3=$this->Model->model_select('purchasetb',array('cust_code'=>$cust_code));	
	                                               foreach($res2 as $value2)
	                                               {
	                                               		$pint=$value2->pinterest;
	                                               }
	                                               foreach($res3 as $value3)
	                                               {
	                                               		$instamt=$value3->EMIvalue;
	                                               }
                                               		$day=substr($ndate, 0,2);
	                                            	$month=substr($ndate, 3,2);
	                                            	$year=substr($ndate, 6,4);
	                                            	$todate=date('d/m/Y');
	                                            	$today=substr($todate, 0,2);
	                                            	$tomonth=substr($todate, 3,2);
	                                            	$toyear=substr($todate, 6,4);
	                                            	$diffday=(int)$today-(int)$day;
	                                            	$diffmonth=(int)$tomonth-(int)$month;
	                                            	$diffyear=(int)$toyear-(int)$year;
	                                            		if($diffmonth>0)
		                                            	{
		                                            		$panalty=($instamt*$pint*$diffmonth)/100;
		                                            			$totpanalty=$instamt+$panalty;
		                                            		
		                                            		if($diffday>15)
		                                            		{
		                                            			$panalty+=($instamt*$pint*1)/100;
		                                            			$totpanalty=$instamt+$panalty;
							                                 	$bigdata.='<tr>
			                                                    <td>'.$value->cust_code.'</td>
			                                                    <td>'.$res1[0]->cust_name.'</td>
			                                                    <td>'.$diffmonth.'</td>
			                                                    <td>'.$instamt.'</td>
			                                                    <td>'.$panalty.'</td>
			                                                    <td>'.$totpanalty.'</td>
			                                                    <td>'.$value->next_due_date.'</td>
			                                                    </tr>';
			                                                    
										                    
										                    }   
										                    else
										                    {
										                    	$bigdata.='<tr>
			                                                    <td>'.$value->cust_code.'</td>
			                                                    <td>'.$res1[0]->cust_name.'</td>
			                                                    <td>'.$diffmonth.'</td>
			                                                    <td>'.$instamt.'</td>
			                                                    <td>'.$panalty.'</td>
			                                                    <td>'.$totpanalty.'</td>
			                                                    <td>'.$value->next_due_date.'</td>
			                                                    </tr>';
			                                                    
		                                            			
										                    }
																															                    
		                								}
		                								else
		                								{
		                									if($diffday>15)
		                                            		{
		                                            			$panalty=($instamt*$pint*1)/100;
		                                            			$totpanalty=$instamt+$panalty;
							                                 	$bigdata.='<tr>
			                                                    <td>'.$value->cust_code.'</td>
			                                                    <td>'.$res1[0]->cust_name.'</td>
			                                                    <td>'.$diffmonth.'</td>
			                                                    <td>'.$instamt.'</td>
			                                                    <td>'.$panalty.'</td>
			                                                    <td>'.$totpanalty.'</td>
			                                                    <td>'.$value->next_due_date.'</td>
			                                                    </tr>';
										                    }
		                								}							
                    						}
                                            $bigdata.='</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
				echo $bigdata;	
		}

		function edit_general_settings()
		{
			$answer=array();

			$res=$this->Model->model_select('generalsettings');
			$logo=$res[0]->logo;

			$this->form_validation->set_rules('sitetitle','Site Title','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('facebook','Facebook Link','required');
			$this->form_validation->set_rules('instagram','Instagram Link','required');
			$this->form_validation->set_rules('twitter','twitter Link','required');
			$this->form_validation->set_rules('phno','Phone Number','required');
			$this->form_validation->set_rules('altphno','Alternative phone Number','required');
			$this->form_validation->set_rules('gmap','GMAP Location','required');
			$this->form_validation->set_rules('address','Address','required|min_length[10]|max_length[220]');
			$this->form_validation->set_rules('footerline','Footer Line','required');

			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>0,'msg'=>validation_errors());
			}
			else
			{
				$title=$this->input->post('sitetitle');
				$email=$this->input->post('email');
				$facebook=$this->input->post('facebook');
				$instagram=$this->input->post('instagram');
				$twitter=$this->input->post('twitter');
				$phno=$this->input->post('phno');
				$altphno=$this->input->post('altphno');
				$gmap=$this->input->post('gmap');
				$address=$this->input->post('address');
				$footerline=$this->input->post('footerline');

				if(!empty($_FILES['logo']['name']))
				{
					$config['upload_path'] = 'assets/uploads/logo/';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $title.$phno;
					$this->upload->initialize($config);

					if($this->upload->do_upload('logo'))
					{
						$logo = $this->upload->data('file_name');
					}
					else
					{
						$logo1 = $this->upload->display_errors();
					}
				}

				$data=array('sitetitle'=>$title,'email'=>$email,'facebook'=>$facebook,'instagram'=>$instagram,'twitter'=>$twitter,'phno'=>$phno,'altphno'=>$altphno,'logo'=>$logo,'gmap'=>$gmap,'address'=>$address,'footerline'=>$footerline);

				$res=$this->Model->model_generalsettings_update($data);

				if($res!='')
				{
					$answer=array('code'=>1,'msg'=>'success');
				}
				else
				{
					$answer=array('code'=>0,'msg'=>'failed');
				}
			}
			echo json_encode($answer);
		}

		function load_generalsettings()
		{
			$this->load->view('admin/generalsettings');
		}

		function addnews()
		{
			if(empty($_FILES['npic']['name']))
            {
                $answer=array('ans'=>0,'msg'=>'Please Enter the picture');
            }
            else
            {
            
             	$summernote=$this->input->post('summernote');
             	$newstitle=$this->input->post('newstitle');
             	
			  	if(!empty($_FILES['npic']['name']))
                {
                	$config['upload_path'] = 'assets/uploads/news/';
                	$config['allowed_types'] = 'jpg|jpeg|png';
                	$config['file_name'] = $_FILES['npic']['name'];
                	$this->upload->initialize($config);
                        
                	if($this->upload->do_upload('npic'))
                	{
                    	$dt = $this->upload->data('file_name');
                 	}
                }

				$data=array('newsid'=>null,'ntitle'=>$newstitle,'ndescription'=>$summernote,'newspic'=>$dt);
				$nins=$this->Model->model_insert('newstb',$data);
				if($nins!='')
				{
					$answer=array('ans'=>1,'msg'=>'success');
				}
				else
				{
					$answer=array('ans'=>0,'msg'=>'failed');
				}
			}
			echo json_encode($answer);
		}

		function addevents()
		{
			
			if(empty($_FILES['epic']['name']))
            {
                $answer=array('ans'=>0,'msg'=>'Please Enter Event the picture');
            }
            else
            {
            
             	$summernote=$this->input->post('summernote');
             	$etitle=$this->input->post('etitle');
             	
			  	if(!empty($_FILES['epic']['name']))
                {
                	$config['upload_path'] = 'assets/uploads/events/';
                	$config['allowed_types'] = 'jpg|jpeg|png';
                 	$config['file_name'] = $_FILES['epic']['name'];
                 	$this->upload->initialize($config);
                        
                 	if($this->upload->do_upload('epic'))
                 	{
                     	$dt = $this->upload->data('file_name');
                 	}
                }

				$data=array('eventid'=>null,'etitle'=>$etitle,'edescription'=>$summernote,'eventpic'=>$dt);
				$eins=$this->Model->model_insert('eventstb',$data);
				if($eins!='')
				{
					$answer=array('ans'=>1,'msg'=>'success');
				}
				else
				{
					$answer=array('ans'=>0,'msg'=>'failed');
				}
			}
			echo json_encode($answer);
		}

		function addAnnouncements()
		{
        	$this->form_validation->set_rules('atitle','Announcement Title','required');
        	if($this->form_validation->run()==FALSE)
			{
				$answer=array('ans'=>0,'msg'=>validation_errors());
			}
			else
			{
             	$summernote=$this->input->post('summernote');
             	$atitle=$this->input->post('atitle');
				$data=array('Announcementsid'=>null,'atitle'=>$atitle,'adescription'=>$summernote);
				$ains=$this->Model->model_insert('announcementstb',$data);
				if($ains!='')
				{
					$answer=array('ans'=>1,'msg'=>'success');
				}
				else
				{
					$answer=array('ans'=>0,'msg'=>'failed');
				}
			}
			echo json_encode($answer);
		}
		
		function load_news()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/news');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}
		
		function load_events()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/events');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_Announcements()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/announcements');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_newseventslist()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/newseventslist');	
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_addprojects()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/addproject');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_projectlist()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/projectslist');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_slidersetting()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/slidersetting');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}	
		}
		
		function delete_news($newsid)
		{
			if($this->session->userdata('adminname'))
			{
				$this->Model->model_deletenewsupdate('newstb',array('allowed'=>0),$newsid);
				echo "Success";
			}
			else
			{
				redirect('Controller/load_admin_login');
			}	
		}

		function delete_events($eid)
		{
			if($this->session->userdata('adminname'))
			{
				$this->Model->model_deleteeventsupdate('eventstb',array('allowed'=>0),$eid);
				echo "Success";
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function delete_anncounements($aid)
		{
			if($this->session->userdata('adminname'))
			{
				$this->Model->model_deleteanncounementupdate('announcementstb',array('allowed'=>0),$aid);
				echo "Success";
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_message_data()
		{	
			$res=$this->Model->model_select_messagedata_limit5();

			$bigdata='
			<div class="dropdown-item noti-title">
                <h5>Messages</h5>
            </div>';

            foreach($res as $value)
            {
            	if($value->status == 1)
            	{
	            	$bigdata.='<div style="background-color:#e7f5ff"><a href="javascript:openreplymodal('.$value->id.')" class="dropdown-item notify-item">
                	<div class="notify-icon"><img src="'.base_url().'assets/uploads/otherimages/reply.png" alt="user-img" class="img-fluid rounded-circle" /> </div>
                	<p class="notify-details"><b>'.$value->name.'</b><small class="text-muted">'.$value->message.'</small></p></a></div>';
	            }
	            else
	            {
	            	$bigdata.='<a href="javascript:openreplymodal('.$value->id.')" class="dropdown-item notify-item">
                	<div class="notify-icon"><img src="'.base_url().'assets/uploads/otherimages/reply.png" alt="user-img" class="img-fluid rounded-circle" /> </div>
                	<p class="notify-details"><b>'.$value->name.'</b><small class="text-muted">'.$value->message.'</small></p></a>';
	            }
            }
			echo $bigdata;
		}

		function load_csponsor($bid)
		{
			$res=$this->Model->model_select('sponsortb',array('bassociated'=>$bid));

			$bigdata='<option hidden="" value="">Select</option>';
			foreach($res as $value)
			{
				$bigdata.='<option value="'.$value->sponsor_code.'">'.$value->sponsor_code.'</option>';
			}
			echo $bigdata;
		}

		function load_notification_data()
		{	
			$res=$this->Model->model_select_notificationdata_limit5();

			$bigdata='
			<div class="dropdown-item noti-title">
                <h5>Notification</h5>
            </div>';

            foreach($res as $value)
            {
            	$customerdetails=$this->Model->model_select('customertb',array('cust_code'=>$value->cust_code));
            	if($value->status == 1)
            	{
            		if($value->type=="newcustomer")
            		{
		            	$bigdata.='<div style="background-color:#e7f5ff"><a class="dropdown-item notify-item">
	                	<div class="notify-icon"><img src="'.base_url().'assets/uploads/custprofile/'.$customerdetails[0]->profile.'" alt="user-img" class="img-fluid rounded-circle"/> </div>
	                	<p class="notify-details"><b>'.$customerdetails[0]->cust_name.'</b><small class="text-muted">New Customer Arrived...</small></p></a></div>';
	                }
	                else
	                {
	                	$bigdata.='<div style="background-color:#e7f5ff"><a class="dropdown-item notify-item">
	                	<div class="notify-icon"><img src="'.base_url().'assets/uploads/custprofile/'.$customerdetails[0]->profile.'" alt="user-img" class="img-fluid rounded-circle"/> </div>
	                	<p class="notify-details"><b>'.$customerdetails[0]->cust_name.'</b><small class="text-muted">Payment has been Done...</small></p></a></div>';
	                }
	            }
	            else
	            {
	            	if($value->type=="newcustomer")
            		{
		            	$bigdata.='<a class="dropdown-item notify-item">
	                	<div class="notify-icon"><img src="'.base_url().'assets/uploads/otherimages/reply.png" alt="user-img" class="img-fluid rounded-circle" /> </div>
	                	<p class="notify-details"><b>'.$customerdetails[0]->cust_name.'</b><small class="text-muted">New Customer Arrived...</small></p></a>';
	                }
	                else
	                {
	                	$bigdata.='<a class="dropdown-item notify-item">
	                	<div class="notify-icon"><img src="'.base_url().'assets/uploads/otherimages/reply.png" alt="user-img" class="img-fluid rounded-circle" /> </div>
	                	<p class="notify-details"><b>'.$customerdetails[0]->cust_name.'</b><small class="text-muted">Payment has been Done...</small></p></a>';
	                }
	            }
            }
			echo $bigdata;
		}

		function msg_change_false()
		{
			if($this->session->userdata('adminname'))
			{
				$res=$this->Model->model_update_msg();
				echo json_encode($res);
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function noti_msg_change_false()
		{
			if($this->session->userdata('adminname'))
			{
				$res=$this->Model->model_update_msg();
				echo json_encode($res);
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
			$res=$this->Model->model_noti_update_msg();
			echo json_encode($res);
		}

		function msg_count_true()
		{
			if($this->session->userdata('adminname'))
			{
				$res=$this->Model->model_select_count_msg_true();
				$count=sizeof($res);
				echo $count;
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function noti_msg_count_true()
		{
			if($this->session->userdata('adminname'))
			{
				$res=$this->Model->model_select_count_noti_msg_true();
				$count=sizeof($res);
				echo $count;
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}



		function load_sponsor($bid)
        {
            $res=$this->Model->model_select('sponsortb',array('bassociated'=>$bid));

            $bigdata='<option hidden="" value="">Select</option>';
            foreach($res as $value)
            {
                $bigdata.='<option value="'.$value->sponsor_code.'">'.$value->sponsor_code.'</option>';
            }
            echo $bigdata;
        }

		function load_promoter()
		{
			if($this->session->userdata('adminname'))
			{ 
				$this->load->view('admin/promotercommission');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}
		function load_branchsales()
		{
			if($this->session->userdata('adminname'))
			{ 
				$this->load->view('admin/branchsales');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}
		function load_promotersales()
		{
			if($this->session->userdata('adminname'))
			{ 
				$this->load->view('admin/promotersales');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

    	function load_totalcustomer()
		{
			if($this->session->userdata('adminname'))
			{ 
				$this->load->view('admin/totalcustomer');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}
		
		function branchview()
		{
			 $res=$this->Model->model_select_for_branch_sale();
                                                   
			$bigdata='<div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="table-rep-plugin">
                                <div class="table-responsive b-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>Branch  Code</th>
                                                <th>Branch  Name</th>
                                                <th>Promoter  Code</th>
                                                <th>Total  Customer</th>
                                                <th>Total  Sales</th>

                                            </tr>
                                        </thead>
                                        
                                        <tbody>';
                                             
                                         foreach($res as $value)
                                         {
                                            $bigdata.='<tr>
                                                <td>'.$value->branch_code.'</td>
                                                <td>'.$value->bname.'</td>
                                                <td>'.$value->sponsor_code.'</td>
                                                <td>'.$value->totcust.'</td>
                                                <td>'.$value->totamt.'</td>
                                            </tr>';
                                                }
                                        $bigdata.='</tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            echo $bigdata;
		}

		function load_search_data_bsale($bcode,$bname,$fdate,$tdate)
		{
			$res=$this->Model->model_search_rec_bsale($bcode,$bname,$fdate,$tdate);
			if(sizeof($res) > 0) 
			{
					$bigdata='<div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive b-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped text-center">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Branch  Code</th>
                                                    <th>Branch  Name</th>
                                                    <th>Promoter  Code</th>
                                                    <th>Total  Customer</th>
                                                    <th>Total  Sales</th>
												</tr>
                                            </thead>
                                            
                                            <tbody>';
                                                 
                                           foreach($res as $value)
                                             {
                                                $bigdata.='<tr>
                                                    <td>'.$value->branch_code.'</td>
                                                    <td>'.$value->bname.'</td>
                                                    <td>'.$value->sponsor_code.'</td>
                                                    <td>'.$value->totcust.'</td>
                                                    <td>'.$value->totamt.'</td>
                                                </tr>';
                                                    }

                                            $bigdata.='</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                    echo $bigdata;
            }
            else
            {
            	$bigdata='<div class="row">
                    <div class="col-12 text-center">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h3>No Record Found</h3>
                            </div>
                        </div>
                    </div>
                </div> ';
            	echo $bigdata;
            }
		}

		function load_addcommissionpay()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/commissionpay');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_commission_data($sponsorcode)
		{
			$res=$this->Model->model_sponsor_commission_select($sponsorcode);
			$res1=$this->Model->countcommission($sponsorcode);
			$ans=array_merge($res,$res1);
			echo json_encode($ans);
		}
		
		function psaleview()
		{
			$res=$this->Model->model_select_for_promoter_sale();

			$bigdata='<div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="table-rep-plugin">
                                <div class="table-responsive b-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>Promoter Code</th>
                                                <th>Promoter Name</th>
                                                <th>Total customers</th>
                                                <th>Total sales</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>';
                                             
                                         foreach($res as $value)
                                         {
                                            $bigdata.='<tr>
                                                <td>'.$value->sponsor_code.'</td>
                                                <td><a href="javascript:load_modal('.$value->sponsor_code.')">'.$value->sname.'</td>
                                                <td>'.$value->totcust.'</td>
                                                <td>'.$value->totamt.'</td>
                                            </tr>';
                                                }
                                        $bigdata.='</tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            echo $bigdata;
		}
		
		function load_search_data_psale($pcode,$pname,$fdate,$tdate)
        {
            $res=$this->Model->model_search_rec_psale($pcode,$pname,$fdate,$tdate);
            if(sizeof($res) > 0) 
            {
                    $bigdata='<div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive b-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Promoter Code</th>
                                                    <th>Promoter Name</th>
                                                    <th>Total customers</th>
                                                    <th>Total sales</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>';
                                                 
                                             foreach($res as $value)
                                             {
                                                $bigdata.='<tr>
                                                    <td>'.$value->sponsor_code.'</td>
                                                    <td>'.$value->sname.'</td>
                                                    <td>'.$value->totcust.'</td>
                                                    <td>'.$value->totamt.'</td>
                                                </tr>';
                                                    }
                                            $bigdata.='</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                    echo $bigdata;
            }
            else
            {
                $bigdata='<div class="row">
                    <div class="col-12 text-center">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h3>No Record Found</h3>
                            </div>
                        </div>
                    </div>
                </div> ';
                echo $bigdata;
            }
        }
		
		function totalcustomer()
		{
			$res=$this->Model->model_select_for_total_cust();
                                                   
			$bigdata='<div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>Customer <br> Code</th>
                                            <th>Branch <br> Code</th>
                                            <th>Promoter <br> Code</th>
                                            <th>Plan <br> Name</th>
                                            <th>Plan <br> Start Date</th>
                                            <th>Total <br> Sale Value</th>
                                            <th>Total <br> EMI Paid</th>
                                            <th>Total <br> Late Fees</th>
                                            <th>Plan <br> End Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                           
                                   foreach($res as $value)
                                     {
                                     		//$enddate='';
                                     		$emival=$value->totalEMI;
                                            $sdate=$value->rec_date;
                                            
                                     		$day=substr($sdate, 0,2);
                                        	$month=substr($sdate, 3,2);
                                        	$year=substr($sdate, 6,4);
                                        	for($i=1;$i<=$emival;$i++)
                                        	{
                                            	$month=(int)$month + 1;
                                            	if((int)$month < 10)
                                            	{
                                            		$month="0".$month;
                                            	}
                                            	if((int)$month == 13)
                                            	{
                                            		$year=(int)$year + 1;
                                            		$month='01';
                                            	}
                                            	else
                                            	{
                                            		$year=$year;
                                            	}
                                            }
                                        	$enddate=$day."/".$month."/".$year;
                                        
                                     	$bigdata.='<tr>
                                            <td><a href="javascript:load_modal('.$value->cust_code.')">'.$value->cust_code.'</td>
                                            <td>'.$value->branch_code.'</td>
                                            <td>'.$value->sponsor_code.'</td>
                                            <td>'.$value->pname.'</td>
                                            <td>'.$value->rec_date.'</td>
                                            <td>'.$value->totnamt.'</td>
                                            <td>'.$value->inst.'</td>
                                           <td>';if($value->totoamt)$bigdata.=$value->totoamt;else $bigdata.="--" ;
                                            
                                            $bigdata.='<td>'.$enddate.'</td>
                                            
                                        </tr>';
                                            }
                                   $bigdata.='</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            echo $bigdata;
		}

		function add_commission()
		{
			$this->form_validation->set_rules('scode','Sponsor Code','required');
			
			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>1,'msg'=>validation_errors());
			}
			else
			{
				$scode=$this->input->post('scode');
				$snm=$this->input->post('snm');
				$ctype=$this->input->post('ctype');
				$crate=$this->input->post('crate');
				$payf=$this->input->post('payf');
				$totcom=$this->input->post('totcom');

				$data=array('commission_code'=>null,'sponsor_code'=>$scode,'sname'=>$snm,'commissiontype'=>$ctype,'commissionrate'=>$crate,'payfrequency'=>$payf,'totalcommission'=>$totcom,'paydate'=>date('d/m/Y'));

				$q=$this->Model->model_insert('commissionpay',$data);

				if($q!='')
				{
					$answer=array('code'=>0,'msg'=>'sucess');
				}
				else
				{
					$answer=array('code'=>1,'msg'=>'failed');
				}
			}
			echo json_encode($answer);
		}

		function load_adminaddproject()
		{
			$this->load->view('admin/addproject');
		}

		function addproject()
		{
			$dt;
         	$projecttitle=$this->input->post('title');
         	$projecttype=$this->input->post('type');
         	$state=$this->input->post('state');
         	$city=$this->input->post('city');
         	$price=$this->input->post('price');
         	$description=$this->input->post('description');
             	
		  	if(!empty($_FILES['projectpic']['name']))
            {
            	$config['upload_path'] = 'assets/uploads/project/';
             	$config['allowed_types'] = 'jpg|jpeg|png';
             	$config['file_name'] = $projecttitle.$projecttype.$price;
             	$this->upload->initialize($config);
                    
             	if($this->upload->do_upload('projectpic'))
             	{
                	$dt = $this->upload->data('file_name');
             	}
            }

			$data=array('projectid'=>null,'ptitle'=>$projecttitle,'ptype'=>$projecttype,'pdescription'=>$description,'projectpic'=>$dt,'stateid'=>$state,'cityid'=>$city,'price'=>$price);

			$pins=$this->Model->model_insert('projecttb',$data);

			if($pins!='')
			{
				$answer=array('ans'=>1,'msg'=>'success');
			}
			else
			{
				$answer=array('ans'=>0,'msg'=>'failed');
			}
			echo json_encode($answer);
		}

		function load_allmessages()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/messages');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_allnotifications()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/notifications');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		/*delete message by admin*/
		function delete_message($id)
		{
			if($this->session->userdata('adminname'))
			{
				$res=$this->Model->model_message_delete($id);
				echo "yes";
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function user_message_details($id)
		{
			$this->Model->model_status_update($id);
			$res=$this->Model->model_select('questiontb',array('id'=>$id));
			echo json_encode($res);
		}

		function sendmessage()
		{
			$answer=array();
			$email=$this->input->post('email');
			$reply=$this->input->post('replymessage');
			$cnm=$this->input->post('nm');
			
				$config = array(
                    'protocol'=>'smtp',
                    'smtp_host'=>'ssl://smtp.gmail.com',
                    'smtp_port'=> '465',
                    'smtp_user'=>'colorfestweb@gmail.com',
                    'smtp_pass'=>'mywebsite',
                    'mailtype'=>'html',
                    'charset'=>'iso-8859-1',
                    'wordwrap'=> TRUE
                );

                $data=array();
                //$body=$this->load->view('user/forget-pwd-mail',$data,TRUE);
                $this->load->library('email',$config);
                $this->email->initialize($config);
                $this->email->from('colorfestweb@gmail.com','Sun9');
                $this->email->to($email);
                $this->email->subject('Welcome '.$cnm);
                $this->email->message($reply);
                $this->email->set_newline("\r\n");
                //$this->email->send();
                
				if($this->email->send())
				{
					$answer=array('msg'=>'success');
				}
				echo json_encode($answer);
		}

		function load_customer_review()
		{
			if($this->session->userdata('adminname'))
			{
				$this->load->view('admin/customerreview');
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}

		function load_recentreview($status)
		{
			$result=$this->Model->model_select_review('feedbacktb',$status);

			if(sizeof($result) > 0)
			{
				$bigdata='
				<table id="datatable" class="table table-bordered text-center table-hover">
	            <thead>
	                <tr>
	                    <th>Cust Code</th>
	                    <th>Name</th>
	                    <th>Review Rate</th>
	                    <th>Description</th>
	                    <th>Action</th>
	                </tr>
	            </thead>
	            <tbody>';

	            foreach($result as $value)
	            {
		            $customerdetails=$this->Model->model_select('customertb',array('cust_code'=>$value->cust_code));
		            $bigdata.='
		            <tr>
		                <td>'.$value->cust_code.'</td>
		                <td>'.$customerdetails[0]->cust_name.'</td>
		                <td>'.$value->rate.'</td>
		                <td>'.$value->description.'</td>
		                <td>';

	                	if($status=="approve")
	                	{
		             		$bigdata.='<a href="javascript:disapproved('.$value->feedid.')"><i class="mdi mdi-thumb-down" style="font-size:25px;color:red;"></i></a>';
	                	}
		                else if($status=="reject")
		               	{
		               		$bigdata.='<a href="javascript:approved('.$value->feedid.')"><i class="mdi mdi-thumb-up" style="font-size:25px;color:green;"></i></a>';
	                	}
	                	else
	                	{
		               		$bigdata.='<a href="javascript:approved('.$value->feedid.')"><i class="mdi mdi-thumb-up" style="font-size:25px;color:green;"></i></a>
		               		 <a href="javascript:disapproved('.$value->feedid.')"><i class="mdi mdi-thumb-down" style="font-size:25px;color:red;"></i></a>';
	                	};

	                	$bigdata.='
		                </td>
		            </tr>
		           	';
				}
				$bigdata.='</tbody>
		            </table>';
			}
			else
			{
				$bigdata='<div class="row">
                    <div class="col-12 text-center">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h3>No Record Found</h3>
                            </div>
                        </div>
                    </div>
                </div> ';
			}
			echo $bigdata;
		}

		function change_review_status($status,$id)
		{
			if($this->session->userdata('adminname'))
			{
				$res=$this->Model->model_change_review_status($status,$id);
				echo "success";
			}
			else
			{
				redirect('Controller/load_admin_login');
			}
		}























































		function sponsor()
		{
			$this->session->set_userdata('login','sponsor');
			redirect('Controller/load_sponsor_login');
		}

		function load_sponsor_login()
		{
			if($this->session->userdata('sponsorname'))
			{
				redirect('Controller/load_sponsordashboard');
			}
			else
			{
				$this->load->view('sponsor/loginsponsor');
			}
		}

		function load_sponsordashboard()
		{
			if($this->session->userdata('sponsorname'))
			{
				$this->load->view('sponsor/sponsordashboard');
			}
			else
			{
				redirect('Controller/load_sponsor_login');
			}
		}

		function loginsponsor()
		{
			$answer=array();
			$email=$this->input->post('email');
			$password=$this->input->post('password');

			$res=$this->Model->model_select('sponsortb',array('semail'=>$email,'sphno'=>$password,'status'=>1,'allowed'=>1));

			if(sizeof($res) > 0)
			{
				foreach($res as $value)
				{
					$this->session->set_userdata('sponsorname',$value->sname);
					$this->session->set_userdata('sponsorid',$value->sponsor_code);
					$this->session->set_userdata('sponsorprofile',$value->sprofile);
					$answer=array('code'=>0,'msg'=>'sucess');
				}
			}
			else
			{
				$answer=array('code'=>1,'msg'=>'failed');
			}
			echo json_encode($answer);
		}

		function load_search_data_commission($pcode='',$pname='')
		{
			if($pcode=='' && $pname=='')
			{
				$res=$this->Model->model_select_commission('commissionpay');
			}
			else
			{
				$res=$this->Model->model_select_for_promoter_commission($pcode,$pname);
			}
			
			$count=1;
			$totamt=0;
			if(sizeof($res) > 0) 
			{
				$bigdata='<div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive b-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped text-center">
                                                <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Sponsor_Code</th>
                                                    <th>Sponsor Name</th>
                                                    <th>Commission<br>Type</th>
                                                    <th>Commission<br>Rate</th>
                                                    <th>Pay<br>Frequancy</th>
                                                    <th>Total<br>Commission</th>
                                                    <th>Pay Date</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>';
                                                    foreach($res as $value)
                                                    {
                                                        $bigdata.='<tr>
                                                            <td>'.$count.'</td>
                                                            <td>'.$value->sponsor_code.'</td>
                                                            <td><a href="javascript:load_modal('.$value->sponsor_code.')">'.$value->sname.'</a></td>
                                                             <td>'.$value->commissiontype.'</td>
                                                            <td>'.$value->commissionrate.'</td>
                                                            <td>'.$value->payfrequency.'</td>
                                                            <td>'.$value->totalcommission.'</td>
                                                            <td>'.$value->paydate.'</td>
                                                        </tr>';
                                                    
                                                        $totamt=$totamt+$value->totalcommission;
                                                        $count++;
                                                    }
                                                
                                                $bigdata.='<tr>
                                                    <td></td><td></td><td></td><td></td><td></td><td>Total <br>Amount</td><td>'.$totamt.'</td><td></td>
                                                </tr>
                                            </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div> 
                        </div>';
                        echo $bigdata;	
            }
            else
            {
            	$bigdata='<div class="row">
                    <div class="col-12 text-center">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h3>No Record Found</h3>
                            </div>
                        </div>
                    </div>
                </div> ';
            	echo $bigdata;
            }
		}

		function load_search_data_cust($bcode,$pcode)
		{
			$res=$this->Model->model_search_rec_cust($bcode,$pcode);
			if(sizeof($res) > 0) 
			{
					$bigdata='<div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive b-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped text-center">
                                            <thead>
                                                <tr>
                                                   <th>Customer <br> Code</th>
                                                    <th>Branch <br> Code</th>
                                                    <th>Promoter <br> Code</th>
                                                    <th>Plan <br> Name</th>
                                                    <th>Plan <br> Start Date</th>
                                                    <th>Total <br> Sale Value</th>
                                                    <th>Total <br> EMI Paid</th>
                                                    <th>Total <br> Late Fees</th>
                                                    <th>Plan <br> End Date</th>
												</tr>
                                            </thead>
                                            
                                            <tbody>';
                                                 
                                           foreach($res as $value)
                                             {
                                                $bigdata.='<tr>
                                                    <td>'.$value->cust_code.'</td>
                                                    <td>'.$value->branch_code.'</td>
                                                    <td>'.$value->sponsor_code.'</td>
                                                    <td>'.$value->pname.'</td>
                                                    <td>'."--".'</td>
                                                    <td>'.$value->totnamt.'</td>
                                                    <td>'."null".'</td>
                                                   <td>';if($value->totoamt)$bigdata.=$value->totoamt;else $bigdata.="--" ;
                                                    
                                                    $bigdata.='<td>'."--".'</td>
                                                    
                                                </tr>';
                                                    }
                                            $bigdata.='</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                    echo $bigdata;
            }
		}

		function load_totcustomer()
		{
			if($this->session->userdata('sponsorname'))
			{
				$this->load->view('sponsor/customerlist');
			}
			else
			{
				redirect('Controller/load_sponsor_login');
			}
		}

		function load_custladger()
		{
			if($this->session->userdata('sponsorname'))
			{
				$this->load->view('sponsor/customerladger');
			}
			else
			{
				redirect('Controller/load_sponsor_login');
			}
		}

		function load_sponsorcommission()
		{
			if($this->session->userdata('sponsorname'))
			{
				$this->load->view('sponsor/commission');
			}
			else
			{
				redirect('Controller/load_sponsor_login');
			}
		}

		function load_customerladger($id)
		{
			$count=1;
			$inst_no=0;
			$cust_code=$id;
			$plan_code;
			$plan_month;
			$remain_installment;
			$installment_amount=0;
			$next_due_date='';
			$total_installment=0;
			
			$res1=$this->Model->model_select('paymenttb',array('cust_code'=>$cust_code));

			foreach($res1 as $value)
			{
				$inst_no=$value->installment_no;
				$cust_code=$value->cust_code;
			}

			$res2=$this->Model->model_select('customertb',array('cust_code'=>$cust_code));

			foreach($res2 as $value1)
			{
				$plan_code=$value1->cplan;
			}

			$res3=$this->Model->model_select('plantb',array('plan_code'=>$plan_code));

			foreach($res3 as $value2)
			{
				$plan_month=$value2->pmonth;
			}

			$remain_installment=$plan_month-$inst_no;

			$bigdata='<div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <table id="tech-companies-1" class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Receipt <br> No</th>
                                    <th>Receipt <br> Date</th>
                                    <th>Installment <br> No</th>
                                    <th>Installment <br> Amount</th>
                                    <th>Late <br> Fee</th>
                                    <th>Net <br> Amount</th>
                                    <th>Due <br> Date</th>
                                    <th>NextDue <br> Date</th>
                                </tr>
                            </thead>
                            
                            <tbody>';
                                 
                            foreach($res1 as $value)
                            {
                                $bigdata.='<tr>
                                    <td>'.$count.'</td>
                                    <td>'.$value->rec_no.'</td>
                                    <td>'.$value->rec_date.'</td>
                                    <td>'.$value->installment_no.'</td>
                                    <td>'.$value->installment_amt.'</td>
                                    <td>';if($value->other_amt)$bigdata.=$value->other_amt;else $bigdata.="--" ;
                                    $bigdata.='</td>
                                    <td>'.$value->net_amt.'</td>
                                    <td>'.$value->due_date.'</td>
                                    <td>'.$value->next_due_date.'</td>
                                </tr>';
                                $count++;
                                $installment_amount=$value->installment_amt;
                                $next_due_date=$value->next_due_date;
                                $total_installment=$total_installment+$value->installment_amt;
                            }

                            
                            $bigdata.='<tr><td></td><td></td><td></td><td>Total amount</td><td>'.$total_installment.'</td><tr>';
                            $bigdata.='</tbody>
                        </table>
     			   </div>
   			 </div>';
                    echo $bigdata;

		}
		

		function logout_sponsor()
		{
			$this->session->unset_userdata('sponsorname');
			$this->session->unset_userdata('sponsorprofile');
			$this->session->unset_userdata('sponsorid');
			redirect('Controller/sponsor');
		}

































































		function user()
		{
			if($this->session->has_userdata('custid'))
			{
				$this->load->view('userview/userprofile');
			}
			else
			{	
				$this->load->view('userview/index');	
			}	
		}

		function load_loginpage()
		{
			if($this->session->has_userdata('custid'))
			{
				$this->load->view('userview/logincust');
			}
			else
			{	
				$this->load->view('userview/logincust');	
			}	
		}

		function loginuser()
		{
			$answer=array();
			$email=$this->input->post('email');
			$password=$this->input->post('password');

			$res=$this->Model->model_select('customertb',array('cemail'=>$email,'password'=>$password));

			if(sizeof($res) > 0)
			{
				foreach($res as $value)
				{
					$this->session->set_userdata('custname',$value->cust_name);
					$this->session->set_userdata('custid',$value->cust_code);
				}
				$answer=array('code'=>0,'msg'=>'sucess');
			}
			else
			{
				$answer=array('code'=>1,'msg'=>'failed');
			}
			echo json_encode($answer);
		}

		function logoutcust()
		{
			$this->session->unset_userdata('custname');
			$this->session->unset_userdata('custid');
			$this->load->view('userview/index');
		}

		function load_afterlogin()
		{
			if($this->session->has_userdata('custid'))
			{
				$this->load->view('userview/userprofile');
			}
			else
			{	
				$this->load->view('userview/logincust');	
			}		
		}

		function load_myproperty()
		{
			if($this->session->has_userdata('custid'))
			{
				$this->load->view('userview/mypropertypage');
			}
			else
			{	
				$this->load->view('userview/logincust');	
			}	
		}

		function load_myduelist()
		{
			if($this->session->has_userdata('custid'))
			{
				$this->load->view('userview/duelist');
			}
			else
			{	
				$this->load->view('userview/logincust');	
			}	
		}

		function customer_existornot($cust_code)
		{
			$answer=array();
			$res=$this->Model->model_select('customertb',array('cust_code'=>$cust_code));
			if(sizeof($res) > 0)
			{ 
				$answer=array('code'=>1,'msg'=>'found');
			}
			else
			{
				$answer=array('code'=>0,'msg'=>'notfound');
			}
			echo json_encode($answer);
		}

		function link_property()
		{
			$flag=0;
			$arraylinkedid=array();
			$data='';

			$customerid1=$this->input->post('customerid1');
			$customerid2=$this->input->post('customerid2');

			$res1=$this->Model->model_select('customertb',array('cust_code'=>$customerid1));
			$res2=$this->Model->model_select('customertb',array('cust_code'=>$customerid2));

			$customername1=$res1[0]->cust_name;
			$customername2=$res2[0]->cust_name;

			if($customername1==$customername2)
			{
				$linkedid1=$res1[0]->linkedid;
				$linkedid2=$res2[0]->linkedid; 

				if($linkedid1!='')
				{
					$data1=array('linked'=>'yes','linkedid'=>$linkedid1.','.$customerid2);	
				}
				else
				{
					$data1=array('linked'=>'yes','linkedid'=>$customerid2);
				}

				if($linkedid2!='')
				{
					$data2=array('linked'=>'yes','linkedid'=>$linkedid2.','.$customerid1);
					$arraychecked=explode();	
				}
				else
				{
					$data2=array('linked'=>'yes','linkedid'=>$customerid1);
				}

				$res=$this->Model->model_link_property($customerid1,$customerid2,$data1,$data2);

				if($res != '')
				{
					$res3=$this->Model->model_select('customertb',array('cust_code'=>$customerid2));
					$linkedid=$res3[0]->linkedid;
		
					$arraylinkedid=array();

					for ($i = 0; $i < strlen($linkedid); $i++)
					{
					    if($linkedid[$i] === ',')
					    {
					    	$flag=1;
					    }
					}

					if($flag===1)
					{
						$arraylinkedid=explode(',', $linkedid);

						for($i=0;$i<count($arraylinkedid);$i++)
						{
							$data='';
							for($j=0;$j<count($arraylinkedid);$j++)
							{
								if($i != $j)
								{
									$string=$arraylinkedid[$j].',';
									$data.=$string;
								}
							}
							$newdata = array('linked'=>'yes','linkedid'=>$data.$customerid2);
							$res=$this->Model->model_link_property1($arraylinkedid[$i],$newdata);
						}
						$array=array('code'=>1,'msg'=>'success');
					}

					if($res != '')
					{
						$array=array('code'=>1,'msg'=>'success');
					}
					else
					{
						$array=array('code'=>0,'msg'=>'failed');
					}
				}
				else
				{
					$array=array('code'=>0,'msg'=>'failed');
				}
			}
			else
			{
				$array=array('code'=>0,'msg'=>'notmatch');
			}

			//$array=array('1'=>$customername1,'2'=>$customername2);
			echo json_encode($array);
		}


		function load_propertydropdown()
		{
			$custcode = $this->session->userdata('custid');

			$res=$this->Model->model_select('customertb',array('cust_code'=>$custcode));
    		
 		   	$linkedid=$custcode.',';
    		$linkedid.=$res[0]->linkedid;
		
			$arraylinkedid=array();

			for ($i = 0; $i < strlen($linkedid); $i++)
			{
			    if($linkedid[$i] === ',')
			    {
			    	$flag=1;
			    }
			}
			if($flag===1)
			{
				$arraylinkedid=explode(',',$linkedid);
				for($i=0;$i<count($arraylinkedid);$i++)
				{
					$res2=$this->Model->model_select('customertb',array('cust_code'=>$arraylinkedid[$i]));
					$plancode=$res2[0]->cplan;
	  			   		 $res3=$this->Model->model_select('plantb',array('plan_code'=>$plancode));
	   					$bigdata='<option hidden="" value="">Select</option>';
					foreach($res3 as $value)
					{
						$bigdata.='<option style="color:white;background-color:black;font-weight:bold;" value="'.$arraylinkedid[$i].'">'.$value->pname.'</option>';
					}
					echo $bigdata;
				}
			}
		}

		function customer_property_details($custcode)
		{
		    $res=$this->Model->model_select('customertb',array('cust_code'=>$custcode));
		    $cityid=$res[0]->cityid;
		    $res1=$this->Model->model_select('city',array('city_id'=>$cityid));
		    $stateid=$res[0]->stateid;
		    $res2=$this->Model->model_select('state',array('StateID'=>$stateid));

		    $planid=$res[0]->cplan;
		    $res3=$this->Model->model_select('plantb',array('plan_code'=>$planid));

		    $res4=$this->Model->model_select('purchasetb',array('cust_code'=>$custcode));

		    $bigdata1='
		    <div class="row">
            <div class="col-sm-1"></div>
                <div class="col-sm-10 col-lg-10">
                    <div class="ct-js-sidebar">
                        <div class="ct-heading ct-u-marginBottom20">
                            <h3 class="text-uppercase">Summary</h3>
                        </div>
                        <div class="ct-u-displayTableVertical ct-productDetails">
                            <div class="ct-u-displayTableRow">
                                <div class="ct-u-displayTableCell">
                                    <span class="ct-fw-600">Price</span>
                                </div>
                                <div class="ct-u-displayTableCell text-right">
                                    <span class="ct-price">&#x20B9 '.$res4[0]->totalamount.'</span>
                                </div>
                            </div>
                            <div class="ct-u-displayTableRow">
                                <div class="ct-u-displayTableCell">
                                    <span class="ct-fw-600">Area</span>
                                </div>
                                <div class="ct-u-displayTableCell text-right">
                                    <span>'.$res4[0]->squarefeet.'<b>sq ft</b></span>
                                </div>
                            </div>
                            <div class="ct-u-displayTableRow">
                                <div class="ct-u-displayTableCell">
                                    <span class="ct-fw-600">Price per sq ft</span>
                                </div>
                                <div class="ct-u-displayTableCell text-right">
                                    <span>'.$res4[0]->squarefeetprice.'</span>
                                </div>
                            </div>
                            <div class="ct-u-displayTableRow">
                                <div class="ct-u-displayTableCell">
                                    <span class="ct-fw-600">Plan Duration</span>
                                </div>
                                <div class="ct-u-displayTableCell text-right">
                                    <span>'.$res3[0]->pmonth.'</span>
                                </div>
                            </div>
                            <div class="ct-u-displayTableRow">
                                <div class="ct-u-displayTableCell">
                                    <span class="ct-fw-600">Total EMI</span>
                                </div>
                                <div class="ct-u-displayTableCell text-right">
                                    <span>'.$res4[0]->totalEMI.'</span>
                                </div>
                            </div>
                            <div class="ct-u-displayTableRow">
                                <div class="ct-u-displayTableCell">
                                    <span class="ct-fw-600">EMI Value</span>
                                </div>
                                <div class="ct-u-displayTableCell text-right">
                                    <span>'.$res4[0]->EMIvalue.'</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-sm-1"></div>
        </div>';

        $bigdata2=$res3[0]->pname;

        
        $answer=array('data1'=>$bigdata1,'data2'=>'<i class="fa fa-leaf"></i>&nbsp; '.$bigdata2.' &nbsp;<i class="fa fa-leaf"></i>');

        echo json_encode($answer);
		}

		function load_customerdropdown()
		{
			$custcode = $this->session->userdata('custid');

			$res=$this->Model->model_select('customertb',array('cust_code'=>$custcode));
    		
 		   	$linkedid=$custcode.',';
    		$linkedid.=$res[0]->linkedid;
		
			$arraylinkedid=array();

			for ($i = 0; $i < strlen($linkedid); $i++)
			{
			    if($linkedid[$i] === ',')
			    {
			    	$flag=1;
			    }
			}
			
			if($flag===1)
			{
				$arraylinkedid=explode(',',$linkedid);
				for($i=0;$i<count($arraylinkedid);$i++)
				{
					$res2=$this->Model->model_select('customertb',array('cust_code'=>$arraylinkedid[$i]));
					$bigdata='<option hidden="" value="">Select</option>';
					foreach($res2 as $value)
					{
						$bigdata.='<option style="color:white;background-color:black;font-weight:bold;" value="'.$arraylinkedid[$i].'">'.$value->cust_code.'</option>';
					}
					echo $bigdata;
				}
			}
		}
		function custoverduelist($custcode)
		{
			 $res=$this->Model->model_cust_overdue_list($custcode);
			 	$bigdata='<div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="table-rep-plugin">
                                    <div class="table-responsive b-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>Cust <br> Code</th>
                                                    <th>Cust <br> Name</th>
                                                    <th>Total Due <br> Month</th>
                                                    <th>Installment <br> Amount</th>
                                                    <th>Total <br> panalty</th>
                                                    <th>Total <br> Due</th>
                                                    <th>Due <br> Date</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>';
                                                 
                                             foreach($res as $value)
                                             {
	                                             	$ndate=$value->next_due_date;
	                                             	$cust_code=$value->cust_code;
	                                               $res1=$this->Model->model_select('customertb',array('cust_code'=>$value->cust_code));
	                                               $res2=$this->Model->model_custplan_receipt_select($cust_code);
	                                               $res3=$this->Model->model_select('purchasetb',array('cust_code'=>$cust_code));	
	                                               foreach($res2 as $value2)
	                                               {
	                                               		$pint=$value2->pinterest;
	                                               }
	                                               foreach($res3 as $value3)
	                                               {
	                                               		$instamt=$value3->EMIvalue;
	                                               }
                                               		$day=substr($ndate, 0,2);
	                                            	$month=substr($ndate, 3,2);
	                                            	$year=substr($ndate, 6,4);
	                                            	$todate=date('d/m/Y');
	                                            	$today=substr($todate, 0,2);
	                                            	$tomonth=substr($todate, 3,2);
	                                            	$toyear=substr($todate, 6,4);
	                                            	$diffday=(int)$today-(int)$day;
	                                            	$diffmonth=(int)$tomonth-(int)$month;
	                                            	$diffyear=(int)$toyear-(int)$year;
	                                            		if($diffmonth>0)
		                                            	{
		                                            		$panalty=($instamt*$pint*$diffmonth)/100;
		                                            			$totpanalty=$instamt+$panalty;
		                                            		
		                                            		if($diffday>15)
		                                            		{
		                                            			$panalty+=($instamt*$pint*1)/100;
		                                            			$totpanalty=$instamt+$panalty;
							                                 	$bigdata.='<tr>
			                                                    <td>'.$value->cust_code.'</td>
			                                                    <td>'.$res1[0]->cust_name.'</td>
			                                                    <td>'.$diffmonth.'</td>
			                                                    <td>'.$instamt.'</td>
			                                                    <td>'.$panalty.'</td>
			                                                    <td>'.$totpanalty.'</td>
			                                                    <td>'.$value->next_due_date.'</td>
			                                                    </tr>';
										                    }   
										                    else
										                    {
										                    	$bigdata.='<tr>
			                                                    <td>'.$value->cust_code.'</td>
			                                                    <td>'.$res1[0]->cust_name.'</td>
			                                                    <td>'.$diffmonth.'</td>
			                                                    <td>'.$instamt.'</td>
			                                                    <td>'.$panalty.'</td>
			                                                    <td>'.$totpanalty.'</td>
			                                                    <td>'.$value->next_due_date.'</td>
			                                                    </tr>';
										                    }
																															                    
		                								}
		                								else if($diffday>15)
		                								{
	                                            			$panalty=($instamt*$pint*1)/100;
	                                            			$totpanalty=$instamt+$panalty;
						                                 	$bigdata.='<tr>
		                                                    <td>'.$value->cust_code.'</td>
		                                                    <td>'.$res1[0]->cust_name.'</td>
		                                                    <td>'.$diffmonth.'</td>
		                                                    <td>'.$instamt.'</td>
		                                                    <td>'.$panalty.'</td>
		                                                    <td>'.$totpanalty.'</td>
		                                                    <td>'.$value->next_due_date.'</td>
	                                                    </tr>';
		                								}
	                								 else
											            {
											            	$bigdata='<div class="row">
											                    <div class="col-12 text-center">
											                        <div class="card m-b-30">
											                            <div class="card-body">
											                                <h3>No Record Found</h3>
											                            </div>
											                        </div>
											                    </div>
											                </div> ';
											            	
											            }

                    						}

                                            $bigdata.='</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                   echo $bigdata;		                		
		}

		function load_introduction()
		{
			$this->load->view('userview/introduction');
		}

		function check_old_password($oldpassword,$custcode)
		{
			$answer=array();
			$res=$this->Model->model_select('customertb',array('cust_code'=>$custcode,'password'=>$oldpassword));

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

		function change_password($newpassword,$confirmpassword,$custcode)
		{
			$res=$this->Model->model_password_update($custcode,array('password'=>$confirmpassword));
			echo "success";
		}

		function load_gallary()
		{
			$this->load->view('userview/gallary');
		}

		function load_ourprojects()
		{
			$this->load->view('userview/ourprojects');
		}

		function load_contactus()
		{
			$this->load->view('userview/contactus');	
		}

		function add_question()
		{
			$this->form_validation->set_rules('name','Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('contact','Contact','required|numeric|exact_length[10]');
			$this->form_validation->set_rules('message','Message','required|max_length[200]');

			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>1,'msg'=>validation_errors());
			}
			else
			{
				date_default_timezone_set('Asia/Kolkata');
				$name=$this->input->post('name');
				$email=$this->input->post('email');
				$contact=$this->input->post('contact');
				$message=$this->input->post('message');

				$data=array('id'=>null,'name'=>$name,'email'=>$email,'mobile'=>$contact,'message'=>$message,'date'=>date('d/m/Y'),'status'=>1,'msg'=>'true');

				$res=$this->Model->model_insert('questiontb',$data);

				if($res!='')
				{
					$answer=array('code'=>0,'msg'=>'sucess');
				}
				else
				{
					$answer=array('code'=>1,'msg'=>'failed');
				}
			}
			echo json_encode($answer);
		}

		function feedback($custcode)
		{
			$this->form_validation->set_rules('rate','Rate','required');
			$this->form_validation->set_rules('description','Description','required');
			

			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>1,'msg'=>validation_errors());
			}
			else
			{
				$rate=$this->input->post('rate');
				$description=$this->input->post('description');
				$datetime=$date = date('d-m-Y H:i:s');
				$data=array('feedid'=>null,'cust_code'=>$custcode,'rate'=>$rate,'description'=>$description,'datetime'=>$datetime,'approved'=>'panding');

				$q=$this->Model->model_insert('feedbacktb',$data);
		
				if($q!='')
				{
					$answer=array('code'=>0,'msg'=>'sucess');
				}
				else
				{
					$answer=array('code'=>1,'msg'=>'failed');
				}
			}
			echo json_encode($answer);	
		}

		function load_state_data_for_property_search()
		{
			$res=$this->Model->model_load_statename();
			echo json_encode($res);
		}

		function load_city_data_for_property_search()
		{
			$res=$this->Model->model_load_cityname();
			echo json_encode($res);
		}

		function search_properties()
		{
			$bigdata='';
			$state=$this->input->post('state');
			$city=$this->input->post('city');
			$minprice=$this->input->post('minprice');
			$maxprice=$this->input->post('maxprice');

			$res=$this->Model->model_search_property($state,$city,$minprice,$maxprice);

			foreach($res as $value)
			{
			$bigdata.=
			'<div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="ct-itemProducts ct-u-marginBottom30 ct-hover">
                                <label class="control-label sale">'.$value->ptype.'</label>
                                <a>
                                    <div class="ct-main-content">
                                        <div class="ct-imageBox">
                                            <img src="'.base_url().'assets/uploads/project/'.$value->projectpic.'" alt="" height="205px"><i class="fa fa-eye"></i>
                                        </div>
                                        <div class="ct-main-text">
                                            <div class="ct-product--tilte">'.
                                                $value->ptitle
                                            .'</div>
                                            <div class="ct-product--price">
                                                <span> RS : '.$value->price.'</span>
                                            </div>
                                            <div class="ct-product--description">'.
                                             	$value->pdescription  
                                            .'</div>
                                        </div>
                                    </div>
                                    <div class="ct-product--meta">
                                        <div class="ct-icons">
                                            <span>
                                                <i class="fa fa-bed"></i> 3
                                            </span>
                                            <span>
                                                <i class="fa fa-cutlery"></i> 2
                                            </span>
                                        </div>
                                        <div class="ct-text">
                                            <span> Area: <span>105 m2</span></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>';
                }

			echo $bigdata;
		}

		function projectdisplay($protype)
		{
			$bigdata='';
			$protype=str_replace('%20', ' ', $protype);
			$res=$this->Model->model_select_project($protype);

			if(sizeof($res) > 0)
			{
			
			foreach ($res as $q) 
			{
				
			$bigdata.='<div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="ct-itemProducts ct-u-marginBottom30 ct-hover">
                                <label class="control-label sale">
                                    '.$q->ptype.'
                                </label>
                                <a>
                                    <div class="ct-main-content">
                                        <div class="ct-imageBox">
                                            <img src="'.base_url().'assets/uploads/project/'.$q->projectpic.'" alt="" height="205px">
                                        </div>
                                        <div class="ct-main-text">
                                            <div class="ct-product--tilte">
                                                '.$q->ptitle.'
                                            </div>
                                            <div class="ct-product--price">
                                                <span> RS : '.$q->price.'</span>
                                            </div>
                                            <div class="ct-product--description">
                                                '.$q->pdescription.'
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ct-product--meta">
                                        <div class="ct-icons">
                                            <span>
                                            </span>
                                            <span>
                                                
                                            </span>
                                        </div>
                                        <div class="ct-text">
                                            
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>';
				}
				echo $bigdata;
		}
		else
		{
			$bigdata.='<div class="col-sm-6 col-md-6 col-lg-4">
			</div>
			<div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="ct-itemProducts ct-u-marginBottom30 ct-hover">
                            <label class="control-label sale">
                            		Opps..!!
                            </label>
                            <a>
                                <div class="ct-main-content">
                                    <div class="ct-imageBox">
                                        <img src="" alt="" height="205px"><i class="fa fa-eye"></i>
                                    </div>
                                    <div class="ct-main-text">
                                        <div class="ct-product--tilte">
                                        </div>
                                        <div class="ct-product--price">
                                            <span> </span>
                                        </div>
                                        <div class="ct-product--description">
                                            <b>No Data Found</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="ct-product--meta">
                                    <div class="ct-icons">
                                        <span>
                                        </span>
                                        <span>
                                            
                                        </span>
                                    </div>
                                    <div class="ct-text">
                                        
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>';
			
			echo $bigdata;
		}
	}
	}
?>

