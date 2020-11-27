<?php
	class Usercontroller extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->model('Model');
			$this->load->library('form_validation');
			$this->load->library('upload');	
		}

		function index()
		{
			$this->session->unset_userdata('custid');
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

		function customer_exist_or_not($cust_code)
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
                                <a href="product-single.html">
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
	}
?>