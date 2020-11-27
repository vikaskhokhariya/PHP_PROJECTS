<?php 
	class Admin_cnt extends CI_Controller
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
			if($this->session->userdata('admin'))
			{
				$this->load->view('Admin/dashboard');
			}
			else
			{
				$res['result']=$this->Model->model_select('tbl_general');
				$this->load->view('Admin/login',$res);
			}
		}

		function login()
		{
			$email=$this->input->post('email');
			$password=$this->input->post('password');

			$result=$this->Model->model_select('tbl_user',array('user_email'=>$email,'user_password'=>$password,'user_role'=>'admin'));
			$total=count($result);

			if($total==1)
			{
				$this->session->set_userdata('admin',$result[0]->user_email);
				$answer=array('code'=>1);
			}
			else
			{
				$answer=array('code'=>0);
			}
			echo json_encode($answer);
		}

		function logout_admin()
		{
			$this->session->unset_userdata('admin');
			$res['result']=$this->Model->model_select('tbl_general');
			$this->load->view('Admin/login',$res);
		}

		function load_dashboard()
		{
			if($this->session->userdata('admin'))
			{
				$this->load->view('Admin/dashboard');
			}
			else
			{
				$res['result']=$this->Model->model_select('tbl_general');
				$this->load->view('Admin/login',$res);
			}
		}

		function load_maincatlist()
		{
			if($this->session->userdata('admin'))
			{
				$this->load->view('Admin/maincategorylist');
			}
			else
			{
				$res['result']=$this->Model->model_select('tbl_general');
				$this->load->view('Admin/login',$res);
			}
		}

		function load_subcatlist()
		{
			if($this->session->userdata('admin'))
			{
				$this->load->view('Admin/subcategorylist');
			}
			else
			{
				$res['result']=$this->Model->model_select('tbl_general');
				$this->load->view('Admin/login',$res);
			}
		}

		function load_bloglist()
		{
			if($this->session->userdata('admin'))
			{
				$this->load->view('Admin/bloglist');
			}
			else
			{
				$res['result']=$this->Model->model_select('tbl_general');
				$this->load->view('Admin/login',$res);
			}
		}

		function load_addmaincat()
		{
			if($this->session->userdata('admin'))
			{
				
			}
			else
			{
				$res['result']=$this->Model->model_select('tbl_general');
				$this->load->view('Admin/login',$res);
			}
			$this->load->view('Admin/addmaincat');
		}

		function load_addsubcat()
		{
			if($this->session->userdata('admin'))
			{
				$this->load->view('Admin/addsubcat');
			}
			else
			{
				$res['result']=$this->Model->model_select('tbl_general');
				$this->load->view('Admin/login',$res);
			}
		}

		function load_addblog()
		{
			if($this->session->userdata('admin'))
			{
				$this->load->view('Admin/addblog');
			}
			else
			{
				$res['result']=$this->Model->model_select('tbl_general');
				$this->load->view('Admin/login',$res);
			}
		}

		function load_generalsetting()
		{
			if($this->session->userdata('admin'))
			{
				$this->load->view('Admin/generalsetting');
			}
			else
			{
				$res['result']=$this->Model->model_select('tbl_general');
				$this->load->view('Admin/login',$res);
			}
		}

		function load_seosetting()
		{
			if($this->session->userdata('admin'))
			{
				$this->load->view('Admin/seosetting');
			}
			else
			{
				$res['result']=$this->Model->model_select('tbl_general');
				$this->load->view('Admin/login',$res);
			}
		}

		function load_blogsetting()
		{
			if($this->session->userdata('admin'))
			{
				$this->load->view('Admin/blogsetting');
			}
			else
			{
				$res['result']=$this->Model->model_select('tbl_general');
				$this->load->view('Admin/login',$res);
			}
		}

		function load_slidersetting()
		{
			if($this->session->userdata('admin'))
			{
				$this->load->view('Admin/slidersetting');
			}
			else
			{
				$res['result']=$this->Model->model_select('tbl_general');
				$this->load->view('Admin/login',$res);
			}
		}

		function load_addslidersetting()
		{
			if($this->session->userdata('admin'))
			{
				$this->load->view('Admin/addslidersetting');
			}
			else
			{
				$res['result']=$this->Model->model_select('tbl_general');
				$this->load->view('Admin/login',$res);
			}
		}

		function edit_general_settings()
		{
			$answer=array();
			$res=$this->Model->model_select('tbl_general');
			$logo=$res[0]->web_logo;

			$this->form_validation->set_rules('webtitle','Website Title','required');
			$this->form_validation->set_rules('tagline','Tag Line','required');
			$this->form_validation->set_rules('facebook','Facebook Link','required');
			$this->form_validation->set_rules('instagram','Instagram Link','required');
			$this->form_validation->set_rules('twitter','Twitter Link','required');
			$this->form_validation->set_rules('google','Google Link','required');
			$this->form_validation->set_rules('youtube','Youtube Link','required');
			$this->form_validation->set_rules('linkedin','Linkedin Link','required');
			$this->form_validation->set_rules('pinterest','Pinterest Link','required');
			$this->form_validation->set_rules('email','Email Address','required|valid_email');
			$this->form_validation->set_rules('phone','Phone Number','numeric|required');
			$this->form_validation->set_rules('telphone','Alternative phone Number','required');
			$this->form_validation->set_rules('gmap','GMAP Location','required');
			$this->form_validation->set_rules('address1','Address1','required|min_length[10]|max_length[220]');
			$this->form_validation->set_rules('address2','Address2','required|min_length[10]|max_length[220]');
			$this->form_validation->set_rules('footer','Footer Line','required');

			if($this->form_validation->run()==FALSE)
			{
				$answer=array('code'=>0,'msg'=>validation_errors());
			}
			else
			{
				$webtitle=$this->input->post('webtitle');
				$tagline=$this->input->post('tagline');
				$facebook=$this->input->post('facebook');
				$instagram=$this->input->post('instagram');
				$twitter=$this->input->post('twitter');
				$google=$this->input->post('google');
				$youtube=$this->input->post('youtube');
				$linkedin=$this->input->post('linkedin');
				$pinterest=$this->input->post('pinterest');
				$email=$this->input->post('email');
				$phone=$this->input->post('phone');
				$telphone=$this->input->post('telphone');
				$gmap=$this->input->post('gmap');
				$address1=$this->input->post('address1');
				$address2=$this->input->post('address2');
				$footer=$this->input->post('footer');

				if(!empty($_FILES['logo']['name']))
				{
					$config['upload_path'] = '.';
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['file_name'] = $_FILES['logo']['name'];
					$this->upload->initialize($config);

					if($this->upload->do_upload('logo'))
					{
						$logo = $this->upload->data('file_name');
						$config['image_library']='gd2';
		            	$config['source_image']='.'.$logo;
		            	$config['create_thumb']=FALSE;
		            	$config['maintain_ratio']=FALSE;
		            	$config['quality']='100%';
		            	$config['height']=75;
		            	$config['width']=175;
		            	$config['new_image']='.'.$logo;
		            	$this->load->library('image_lib',$config);
			            $this->image_lib->resize();
					}
					else
					{
						$logo1 = $this->upload->display_errors();
					}
				}

				$data=array('web_title'=>$webtitle,'web_logo'=>$logo,'web_tagline'=>$tagline,'fb_link'=>$facebook,'insta_link'=>$instagram,'twitter_link'=>$twitter,'google_link'=>$google,'youtube_link'=>$youtube,'linkedin_link'=>$linkedin,'pintrest_link'=>$pinterest,'web_mail'=>$email,'web_mono'=>$phone,'web_telno'=>$telphone,'web_gmap'=>$gmap,'web_adr1'=>$address1,'web_adr2'=>$address2,'web_footerline'=>$footer);

				$res=$this->Model->model_generalsettings_update($data);

				if($res!='')
				{
					$answer=array('code'=>1,'msg'=>'Success');
				}
				else
				{
					$answer=array('code'=>0,'msg'=>'failed');
				}
			}
			echo json_encode($answer);
		}

		function add_maincategory()
		{
			$this->form_validation->set_rules('maincategory_name','Category Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('cattitle','Category Title','required|min_length[5]|max_length[1000]');
			$this->form_validation->set_rules('pgcontent','Page Content','required');
			$this->form_validation->set_rules('clonepage','clone page','required');

			if(empty($_FILES['mainpic']['name']))
			{
				$this->form_validation->set_rules('mainpic','Image','required');
			}

			if($this->form_validation->run()==false)
        	{
            	$answer=array('code'=>0,'msg'=>validation_errors());
        	}
        	else
        	{
	        	$catnm=$this->input->post('maincategory_name');
	        	$cattitle=$this->input->post('cattitle');
	        	$page_content=$this->input->post('pgcontent');
	        	$clonepage=$this->input->post('clonepage');
	        	$pagetitle=$this->input->post('title');
	        	$pageslug=$this->input->post('slug');
	        	$pagemeta=$this->input->post('meta');
	        	$pagedescription=$this->input->post('description');
	        	$pagecontent=$this->input->post('content');

        		$maincatchk1=$this->Model->model_select('tbl_category',array('cat_name'=>$catnm,'cat_status'=>1));

        		if($maincatchk1==null)
        		{
        			mkdir("Upload/Admin/Category"."/".$catnm,0777,true);
					chmod("Upload/Admin/Category"."/".$catnm,0777);

					//cofigration
					$config['upload_path']='Upload/Admin/Category/'.$catnm;
		            $config['allowed_types']='jpg|png|jpeg';
		            $config['file_name']=$_FILES['mainpic']['name'];
		            
		            $this->load->library('upload',$config );
		            $this->upload->initialize( $config);

		            if(!$this->upload->do_upload('mainpic'))
		            {
		                //if file upload fail
		                $answer=array('code'=>0,'msg'=>$this->upload->display_errors());
		            }
		            else
		            {
		            	$img=$this->upload->data('file_name');
		            	// $config['image_library']='gd2';
		            	// $config['source_image']='Upload/Admin/Category/'.$catnm.'/'.$img;
		            	// $config['create_thumb']=FALSE;
		            	// $config['maintain_ratio']=FALSE;
		            	// $config['quality']='90%';
		            	// $config['width']=300;
		            	// $config['height']=300;
		            	// $config['new_image']='Upload/Admin/Category/'.$catnm.'/'.$img;
		            	// $this->load->library('image_lib',$config);
		            	// $this->image_lib->resize();

		            	$data=array('cat_id'=>null,'cat_name'=>$catnm,'cat_image'=>$img,'cat_title'=>$cattitle,'page_content'=>$page_content,'type'=>'main','cat_status'=>1);
		            	$sql=$this->Model->model_insert('tbl_category',$data);
		            	$insert_id = $this->db->insert_id();

		        		$data1=array('page_name'=>$catnm,'page_list_id'=>$clonepage,'background'=>'maincategory','path'=>'','content'=>$pagecontent,'page_title'=>$pagetitle,'page_slug'=>$pageslug,'meta_keyword'=>$pagemeta,'page_desc'=>$pagedescription,'cat_id'=>$insert_id);
		        		$sql1=$this->Model->model_insert('seo_pages',$data1);

		        		if($sql!='')
		        		{
		        			$answer=array('code'=>1,'msg'=>'success');
		        		}
		        		else
		        		{
		        			$answer=array('code'=>0,'msg'=>'fail');
		        		}
		        	}	
        		}
        		else
        		{
        			$answer=array('code'=>0,'msg'=>'record is already present');
        		}
			}        		
	        echo json_encode($answer);
		}

		function add_subcategory()
		{
			$this->form_validation->set_rules('maincatid','Main Category','required');
			$this->form_validation->set_rules('subcatnm','Subcategory Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('cattitle','Category Title','required|min_length[5]|max_length[1000]');
			$this->form_validation->set_rules('pgcontent','Page Content','required');
			$this->form_validation->set_rules('clonepage','clone page','required');

			if(empty($_FILES['pic']['name']))
			{
				$this->form_validation->set_rules('pic','Image','required');
			}

			if($this->form_validation->run()==false)
        	{
            	$answer=array('code'=>0,'msg'=>validation_errors());
        	}
        	else
        	{
        		$maincatid=$this->input->post('maincatid');
        		$res=$this->Model->model_select('tbl_category',array('cat_id'=>$maincatid));
        		$cnm=$res[0]->cat_name;	
	        	$subcatnm=$this->input->post('subcatnm');
	        	$cattitle=$this->input->post('cattitle');
	        	$page_content=$this->input->post('pgcontent');
	        	$clonepage=$this->input->post('clonepage');
	        	$pagetitle=$this->input->post('title');
	        	$pageslug=$this->input->post('slug');
	        	$pagemeta=$this->input->post('meta');
	        	$pagedescription=$this->input->post('description');
	        	$pagecontent=$this->input->post('content');

        		$subcatnmchk1=$this->Model->model_select('tbl_category',array('cat_name'=>$subcatnm,'cat_status'=>1));

        		if($subcatnmchk1==null)
        		{
        			mkdir("Upload/Admin/Category/".$subcatnm,0777,true);
					chmod("Upload/Admin/Category/".$subcatnm,0777);
					$config['upload_path']='Upload/Admin/Category/'.$subcatnm;
		            $config['allowed_types']='jpg|png|jpeg';
		            $config['file_name']=$_FILES['pic']['name'];
		            //cofigration
		            $this->load->library('upload',$config );
		            $this->upload->initialize( $config );

		            if(!$this->upload->do_upload('pic'))
		            {
		                //if file upload fail
		                $answer=array('code'=>0,'msg'=>$this->upload->display_errors());
		            }
		            else
		            {
		            	$img=$this->upload->data('file_name');
		            	$config['image_library']='gd2';
		            	$config['source_image']='Upload/Admin/Category/'.$subcatnm.'/'.$img;
		            	$config['create_thumb']=FALSE;
		            	$config['maintain_ratio']=FALSE;
		            	$config['quality']='90%';
		            	$config['width']=300;
		            	$config['height']=300;
		            	$config['new_image']='Upload/Admin/Category/'.$subcatnm.'/'.$img;
		            	$this->load->library('image_lib',$config);
		            	$this->image_lib->resize();

		        		$data=array('cat_id'=>null,'cat_name'=>$subcatnm,'parentid'=>$maincatid,'
		        			cat_image'=>$img,'cat_title'=>$cattitle,'page_content'=>$page_content,'type'=>'sub','cat_status'=>1);
		        		$sql=$this->Model->model_insert('tbl_category',$data);
		        		$insert_id = $this->db->insert_id();
		        		$data1=array('page_name'=>$subcatnm,'page_list_id'=>$clonepage,'background'=>'subcategory','path'=>'','content'=>$pagecontent,'page_title'=>$pagetitle,'page_slug'=>$pageslug,'meta_keyword'=>$pagemeta,'page_desc'=>$pagedescription,'cat_id'=>$insert_id);
		        		$sql1=$this->Model->model_insert('seo_pages',$data1);

		        		if($sql!='')
		        		{
		        			$answer=array('code'=>1,'msg'=>'success');
		        		}
		        		else
		        		{
		        			$answer=array('code'=>0,'msg'=>'fail');
		        		}
		        	}
	        	}
				else
				{
					$answer=array('code'=>0,'msg'=>'subcategory is already present');
				}
	        }
	        echo json_encode($answer);
		}

		function add_newblog()
		{
			$answer=array();

			$this->form_validation->set_rules('cattitle','Category Title','required|min_length[5]|max_length[1000]');
			$this->form_validation->set_rules('pgcontent','Blog Content','required');
			$this->form_validation->set_rules('clonepage','clone page','required');

			if(empty($_FILES['mainpic']['name']))
			{
				$this->form_validation->set_rules('mainpic','Image','required');
			}

			if($this->form_validation->run()==false)
        	{
            	$answer=array('code'=>0,'msg'=>validation_errors());
        	}
        	else
        	{
	        	$cattitle=$this->input->post('cattitle');
	        	$page_content=$this->input->post('pgcontent');
	        	$clonepage=$this->input->post('clonepage');
	        	$pagetitle=$this->input->post('title');
	        	$pageslug=$this->input->post('slug');
	        	$pagemeta=$this->input->post('meta');
	        	$pagedescription=$this->input->post('description');
	        	$pagecontent=$this->input->post('content');

				//cofigration
				$config['upload_path']='Upload/Admin/Blog/';
	            $config['allowed_types']='jpg|png|jpeg';
	            $config['file_name']=$_FILES['mainpic']['name'];
		            
	            $this->load->library('upload',$config);
	            $this->upload->initialize($config);

	            if(!$this->upload->do_upload('mainpic'))
	            {
	                //if file upload fail
	                $answer=array('code'=>0,'msg'=>$this->upload->display_errors());
	            }
	            else
	            {
	            	$img=$this->upload->data('file_name');
	            	$config['image_library']='gd2';
	            	$config['source_image']='Upload/Admin/Blog/'.$img;
	            	$config['create_thumb']=FALSE;
	            	$config['maintain_ratio']=FALSE;
	            	$config['quality']='90%';
	            	$config['width']=300;
	            	$config['height']=300;
	            	$config['new_image']='Upload/Admin/Category/'.$img;
	            	$this->load->library('image_lib',$config);
	            	$this->image_lib->resize();

	            	$data=array('blog_id'=>null,'blog_title'=>$cattitle,'blog_image'=>$img,'blog_content'=>$page_content,'blog_date'=>date("d M, Y"),'blog_status'=>1);
	            	$sql=$this->Model->model_insert('tbl_blog',$data);
	            	$insert_id = $this->db->insert_id();

	        		$data1=array('page_name'=>$cattitle,'page_list_id'=>$clonepage,'background'=>'blog','path'=>'','content'=>$pagecontent,'page_title'=>$pagetitle,'page_slug'=>$pageslug,'meta_keyword'=>$pagemeta,'page_desc'=>$pagedescription,'cat_id'=>$insert_id);
	        		$sql1=$this->Model->model_insert('seo_pages',$data1);

	        		if($sql!=null)
	        		{
	        			$answer=array('code'=>1,'msg'=>'success');
	        		}
	        		else
	        		{
	        			$answer=array('code'=>0,'msg'=>'fail');
	        		}
        		}
			}        		
	        echo json_encode($answer);
		}

		function edit_maincategory($maincatid)
		{
			$res['result']=$this->Model->model_select('tbl_category',array('cat_id'=>$maincatid));
			$this->load->view('Admin/editmaincat',$res);
		}

		function edit_subcategory($subcatid)
		{
			$res['result']=$this->Model->model_select('tbl_category',array('cat_id'=>$subcatid));
			$this->load->view('Admin/editsubcat',$res);
		}

		function edit_blog($blogid)
		{
			$res['result']=$this->Model->model_select('tbl_blog',array('blog_id'=>$blogid));
			$this->load->view('Admin/editblog',$res);
		}

		function edit_seosetting($pageid)
		{
			$res['result']=$this->Model->model_select('seo_pages',array('page_id'=>$pageid));
			$this->load->view('Admin/editseosetting',$res);
		}

		function edit_blogseosetting($pageid)
		{
			$res['result']=$this->Model->model_select('seo_pages',array('page_id'=>$pageid));
			$this->load->view('Admin/editblogseosetting',$res);
		}

		function edit__seosetting($pageid)
		{
			$pagename=$this->input->post('pagename');
			$clonepage=$this->input->post('clonepage');
			$title=$this->input->post('title');
			$slug=$this->input->post('slug');
			$meta=$this->input->post('meta');
			$description=$this->input->post('description');
			$content=$this->input->post('content');

			$data=array('page_list_id'=>$clonepage,'content'=>$content,'page_title'=>$title,'page_slug'=>$slug,'meta_keyword'=>$meta,'page_desc'=>$description);
			$sql=$this->Model->model_update('seo_pages',$data,array('page_id'=>$pageid));

			if($sql!=null)
    		{
    			$answer=array('code'=>1,'msg'=>'success');
    		}
    		else
    		{
    			$answer=array('code'=>0,'msg'=>'fail');
    		}
    		echo json_encode($answer);
		}

		function edit_category($catid)
		{
			$this->form_validation->set_rules('maincategory_name','Category Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('cattitle','Category Title','required|min_length[5]|max_length[1000]');
			$this->form_validation->set_rules('pgcontent','Page Content','required');

			if($this->form_validation->run()==false)
			{
				$answer=array('code'=>0,'msg'=>validation_errors());
			}
			else
			{
				$catnm=$this->input->post('maincategory_name');
				$cattitle=$this->input->post('cattitle');
				$page_content=$this->input->post('pgcontent');

				$q=$this->Model->model_select('tbl_category',array('cat_id'=>$catid));

				rename("Upload/Admin/Category/".$q[0]->cat_name,"Upload/Admin/Category/".$catnm);
				chmod("Upload/Admin/Category/".$catnm,0777);

				if(empty($_FILES['catimg']['name']))
				{
					$data=array('cat_name'=>$catnm,'cat_title'=>$cattitle,'page_content'=>$page_content,);
					$res=$this->Model->model_update('tbl_category',$data,array('cat_id'=>$catid));
					$data1=array('page_name'=>$catnm);
					$sql1=$this->Model->model_update('seo_pages',$data1,array('cat_id'=>$catid));

					if($res!='')
					{
						$answer=array('code'=>1,'msg'=>'success');
					}
					else
					{
						$answer=array('code'=>0,'msg'=>'fail');
					}
				}
				else
				{
					unlink('Upload/Admin/Category/'.$catnm.'/'.$q[0]->cat_image);
					$config['upload_path']='Upload/Admin/Category'.'/'.$catnm;
			        $config['allowed_types']='jpg|png|jpeg';
			        $config['file_name']=$_FILES['catimg']['name'];
		            //cofigration
		            $this->load->library('upload',$config );
		            $this->upload->initialize( $config );
		            if(! $this->upload->do_upload('catimg'))
		            {
		                //if file upload fail
		                $answer=array('code'=>0,'msg'=>$this->upload->display_errors());
		            }
		            else
		            {
		            	$img=$this->upload->data('file_name');
		        		$data=array('cat_image'=>$img,'cat_name'=>$catnm,'cat_title'=>$cattitle,'page_content'=>$page_content,'cat_status'=>1);
		        		$data1=array('page_name'=>$catnm);
		        		
		        		$sql=$this->Model->model_update('tbl_category',$data,array('cat_id'=>$catid));
		        		$sql1=$this->Model->model_update('seo_pages',$data1,array('cat_id'=>$catid));
		        		
		        		
		        		if($sql!=null && $sql1!=null)
		        		{
		        			$answer=array('code'=>1,'msg'=>'success');
		        		}
		        		else
		        		{
		        			$answer=array('code'=>0,'msg'=>'fail');
		        		}
		        	}
				}
			}
			echo json_encode($answer);
		}

		function edit__subcategory($catid)
		{
			$res=$this->Model->model_select('tbl_category',array('cat_id'=>$catid));
			$this->form_validation->set_rules('subcatnm','Subcategory Name','required|regex_match[/^[a-zA-Z][a-zA-Z ]+$/]');
			$this->form_validation->set_rules('cattitle','Category Title','required|min_length[5]|max_length[1000]');
			$this->form_validation->set_rules('pgcontent','Page Content','required');

			if($this->form_validation->run()==false)
			{
				$answer=array('code'=>0,'msg'=>validation_errors());
			}
			else
			{
				$maincatid=$this->input->post('maincatid');
				$subcatnm=$this->input->post('subcatnm');
				$cattitle=$this->input->post('cattitle');
				$page_content=$this->input->post('pgcontent');
				
				rename("Upload/Admin/Category/".$res[0]->cat_name,"Upload/Admin/Category/".$subcatnm);
				chmod("Upload/Admin/Category/".$subcatnm,0777);
				
				if(empty($_FILES['catimg']['name']))
				{
					$data=array('cat_name'=>$subcatnm,'cat_title'=>$cattitle,'page_content'=>$page_content,'parentid'=>$maincatid);
					$res=$this->Model->model_update('tbl_category',$data,array('cat_id'=>$catid));

					if($res!='')
					{
						$answer=array('code'=>1,'msg'=>'success');
					}
					else
					{
						$answer=array('code'=>0,'msg'=>'fail');
					}
				}
				else
				{
					unlink('Upload/Admin/Category/'.$subcatnm.'/'.$res[0]->cat_image);
					$config['upload_path']='Upload/Admin/Category/'.$subcatnm;
			        $config['allowed_types']='jpg|png|jpeg';
			        $config['file_name']=$_FILES['catimg']['name'];
		            //cofigration
		            $this->load->library('upload',$config);
		            $this->upload->initialize($config);
		            
		            if(! $this->upload->do_upload('catimg'))
		            {
		                //if file upload fail
		                $answer=array('code'=>0,'msg'=>$this->upload->display_errors());
		            }
		            else
		            {
		            	$img=$this->upload->data('file_name');
		        		$data=array('cat_name'=>$subcatnm,'cat_image'=>$img,'cat_title'=>$cattitle,'page_content'=>$page_content,'parentid'=>$maincatid,'cat_status'=>1);
		        		$data1=array('page_name'=>$subcatnm);
		        		$sql=$this->Model->model_update('tbl_category',$data,array('cat_id'=>$catid));
		        		$sql1=$this->Model->model_update('seo_pages',$data1,array('cat_id'=>$catid));

		        		if($sql!=null && $sql1!=null)
		        		{
		        			$answer=array('code'=>1,'msg'=>'success');
		        		}
		        		else
		        		{
		        			$answer=array('code'=>0,'msg'=>'fail');
		        		}
		        	}
				}
			}
			echo json_encode($answer);
		}

		function edit__blog($blogid)
		{
			$this->form_validation->set_rules('cattitle','Category Title','required|min_length[5]|max_length[1000]');
			$this->form_validation->set_rules('pgcontent','Page Content','required');

			if($this->form_validation->run()==false)
			{
				$answer=array('code'=>0,'msg'=>validation_errors());
			}
			else
			{
				$cattitle=$this->input->post('cattitle');
				$page_content=$this->input->post('pgcontent');

				$q=$this->Model->model_select('tbl_blog',array('blog_id'=>$blogid));

				if(empty($_FILES['catimg']['name']))
				{
					$data=array('blog_title'=>$cattitle,'blog_content'=>$page_content);
					$res=$this->Model->model_update('tbl_blog',$data,array('blog_id'=>$blogid));
					$data1=array('page_name'=>$cattitle);
					$res1=$this->Model->model_update('seo_pages',$data1,array('cat_id'=>$blogid));

					if($res!='')
					{
						$answer=array('code'=>1,'msg'=>'success');
					}
					else
					{
						$answer=array('code'=>0,'msg'=>'fail');
					}
				}
				else
				{
					unlink('Upload/Admin/Blog/'.$q[0]->blog_image);
					$config['upload_path']='Upload/Admin/Blog';
			        $config['allowed_types']='jpg|png|jpeg';
			        $config['file_name']=$_FILES['catimg']['name'];
		            //cofigration
		            $this->load->library('upload',$config );
		            $this->upload->initialize( $config );
		            if(! $this->upload->do_upload('catimg'))
		            {
		                //if file upload fail
		                $answer=array('code'=>0,'msg'=>$this->upload->display_errors());
		            }
		            else
		            {
		            	$img=$this->upload->data('file_name');

		        		$data=array('blog_image'=>$img,'blog_title'=>$cattitle,'blog_content'=>$page_content,'blog_status'=>1);
		        		$sql=$this->Model->model_update('tbl_blog',$data,array('blog_id'=>$blogid));

		        		$data1=array('page_name'=>$cattitle);
						$res=$this->Model->model_update('seo_pages',$data1,array('cat_id'=>$blogid));
		        		
		        		
		        		if($sql!=null)
		        		{
		        			$answer=array('code'=>1,'msg'=>'success');
		        		}
		        		else
		        		{
		        			$answer=array('code'=>0,'msg'=>'fail');
		        		}
		        	}
				}
			}
			echo json_encode($answer);
		}

		function del_maincategory($catid)
		{
			$maincatres=$this->Model->model_select('tbl_category',array('cat_id'=>$catid));

			$data=array('cat_status'=>0);
			$where=array('cat_id'=>$catid);
			$res=$this->Model->model_update('tbl_category',$data,$where);
			//$where1=array('page_id'=>$maincatres[0]->page_id);

			if($res!='')
			{
				$where1=array('parentid'=>$catid);
				$data1=array('cat_status'=>0);
				$res1=$this->Model->model_update('tbl_category',$data1,$where1);

				if($res1!='')
				{
					echo "success";
				}
				else
				{
					echo "fail";
				}
			}
			else
			{
				echo "fail";
			}
		}

		function del_subcategory($catid)
        {
            $res=$this->Model->model_select('tbl_category',array('cat_id'=>$catid));

            $data=array('cat_status'=>0);
            $where=array('cat_id'=>$catid);
            $res=$this->Model->model_update('tbl_category',$data,$where);
            //$where1=array('page_id'=>$maincatres[0]->page_id);

            if($res!='')
            {
                echo "success";
            }
            else
            {
                echo "fail";
            }
        }

        function add_slider()
		{
			$this->form_validation->set_rules('id','Id','required');
			if(empty($_FILES['mainpic']['name']))
			{
				$this->form_validation->set_rules('mainpic','Image','required');
			}
			if($this->form_validation->run()==false)
        	{
            	$answer=array('code'=>0,'msg'=>validation_errors());
        	}
        	else
        	{
				//cofigration
				$config['upload_path']='Upload/Admin/slider';
	            $config['allowed_types']='jpg|png|jpeg';
	            $config['file_name']=$_FILES['mainpic']['name'];
	            
	            $this->load->library('upload',$config);
	            $this->upload->initialize($config);

	            if(!$this->upload->do_upload('mainpic'))
	            {
	                //if file upload fail
	                $answer=array('code'=>0,'msg'=>'picerr');
	            }
	            else
	            {
	            	$img=$this->upload->data('file_name');
	            	$config['image_library']='gd2';
	            	$config['source_image']='Upload/Admin/slider/'.$img;
	            	$config['create_thumb']=FALSE;
	            	$config['maintain_ratio']=FALSE;
	            	$config['quality']='90%';
	            	$config['width']=1920;
	            	$config['height']=700;
	            	$config['new_image']='Upload/Admin/slider';
	            	$this->load->library('image_lib',$config);
	            	$this->image_lib->resize();

	        		$data=array('slider_id'=>null,'slider_image'=>$img,'slider_priority'=>'sub','slider_status'=>'on');
	        		$sql=$this->Model->model_insert('tbl_slider',$data);
	        		if($sql!=null)
	        		{
	        			$answer=array('code'=>1,'msg'=>'success');
	        		}
	        		else
	        		{
	        			$answer=array('code'=>0,'msg'=>'fail');
	        		}
	        	}
        	}
	        echo json_encode($answer);
		}

		function delete_slider($sliderid)
		{
			$sliderresult=$this->Model->model_select('tbl_slider',array('slider_id'=>$sliderid));
			$result=$this->Model->model_delete('tbl_slider',array('slider_id'=>$sliderid));
			

			if($result!=null)
			{
				echo 1;
			}
			else
			{
				unlink('Upload/Admin/slider/'.$sliderresult[0]->slider_image);
				echo 0;
			}
		}

		function delete_blog($blogid)
		{
			$result=$this->Model->model_delete('tbl_blog',array('blog_id'=>$blogid));
			//$result1=$this->Model->model_delete('seo_pages',array('background'=>'blog','cat_id'=>$blogid));
			echo "sucess";
		}
	}
?>