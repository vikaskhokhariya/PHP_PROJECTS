<?php 
	class Fees extends CI_Controller
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

		function Fees_Pay()
		{
			if($this->session->userdata('role')=="User" || $this->session->userdata('role')=="Admin")
			{
				$active['active']=array('main'=>'fees','whichactive'=>'payfees');
				$this->load->view('Fees/feespay',$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function Fees_List()
		{
			if($this->session->userdata('role')=="User" || $this->session->userdata('role')=="Admin")
			{
				$active['active']=array('main'=>'fees','whichactive'=>'feeslist');
				$this->load->view('Fees/feeslist',$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function Fees_status_List()
		{
			if($this->session->userdata('role')=="User" || $this->session->userdata('role')=="Admin")
			{
				$active['active']=array('main'=>'fees','whichactive'=>'feesstatus');
				$this->load->view('Fees/feesstatuslist',$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function get_student_details($enrollno)
		{	
			$bigdata="";
			$student = $this->Model->model_select('tbl_enroll_student',array('enroll_no'=>$enrollno));

			if(count($student)==0)
			{
				$bigdata="notfound";
			}
			else
			{
			$bigdata.='<section class="content">

            <div class="row">       
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            		<div class="box bg-deathstar-dark">
            			<div class="box-body box-profile">
                        	<h2 class="profile-username text-center mb-0">'.
                    			$student[0]->name.
                        	'</h2>
                        	<h2 class="profile-username text-center mb-0">
                            	<span class="text-yellow text-center">Enroll No : </span>'.
								$student[0]->enroll_no.'
                        	</h2>

                            <div class="row">
                            	<div class="col-sm-6">
	                                <div class="profile-user-info">
				                        <p>
				                            <h3 class="text-yellow">Email Address : </h3>
				                            <i class="fa fa-envelope pr-15"></i>'.$student[0]->email.'
				                        </p>
				                        <p>
				                            <h3 class="text-yellow">Contact Number : </h3>
				                            <i class="fa fa-phone pr-15"></i>'.$student[0]->phone.'
				                            &nbsp;&nbsp;<i class="fa fa-phone pr-15"></i>'.$student[0]->pphone.'
				                        </p>
				                        <p>
				                            <h3 class="text-yellow">Parmenent Address : </h3>
				                            <i class="fa fa-map-marker pr-15"></i>'.$student[0]->address.'
				                        </p>
				                        <p>
				                            <h3 class="text-yellow">School / College : </h3>
				                            <i class="fa fa-graduation-cap pr-15"></i>'.$student[0]->college.'
				                        </p>
				                    </div>
                            	</div>

                            	<div class="col-sm-6">
                                	<div class="profile-user-info">
                                    <p>
                                        <h3 class="text-yellow">Qualification : </h3>
                                        <i class="fa fa-graduation-cap pr-15"></i>'.$student[0]->qualification.'
                                    </p>
                                    <p>
                                        <h3 class="text-yellow">Course : </h3>';
                                            $coursedata = $this->Model->model_select('tbl_course',array('course_id'=>$student[0]->course));
                                    		$bigdata.='<i class="fa fa-book pr-15"></i>'.$coursedata[0]->course_name.'
                                    </p>
                                    <p>
                                        <h3 class="text-yellow">Course Fees : </h3>
                                        <i class="fa fa-inr pr-15"></i>'.$student[0]->course_fees.'
                                    </p>
                                    <p>
                                        <h3 class="text-yellow">Registration Date : </h3>
                                        <i class="fa fa-calendar pr-15"></i>'.$student[0]->reg_date.'
                                    </p>
                                </div>
                            </div>
                        </div>

            				<div class="row">
            					<h2 class="title w-p100 mt-10 mb-0 p-20">Fees Payment</h2>
	                				<div class="col-sm-12">
	                    				<div class="table-responsive">
	                        				<table class="table table-hover">
	                           					<tr>
	                              					<th>No</th>
	                              					<th>Payment Date</th>
	                              					<th>Fees Amount</th>
	                              					<th>Payment Method</th>
													<th>Bank Name</th>
													<th>Cheque Number</th>
													<th>Cheque Date</th>
													<th>Method Name</th>
	                              					<th>Action</th>
	                            				</tr>';

					                            $feesresult = $this->Model->model_select("tbl_fees",array("enroll_id"=>$student[0]->enroll_id));
									            $count = 1;
									            $totalamount=0;
									            $remainamount=0;
									            $printremainamount;

					                            foreach($feesresult as $value)
					                                {
					                                $bigdata.='<tr>
						                                <td>'.
						                                	$count.'
						                                </td>
						                                <td>'.
						                                	$value->pay_date.
						                                '</td>
						                                <td>'. 
															$value->amount.
						                                '</td>
						                                <td>'.
		                                                    $value->pay_type.
		                                                '</td>
		                                                <td>'.
		                                                    $value->bank_name.
		                                                '</td>
		                                                <td>'.
		                                                    $value->cheque_number.
		                                                '</td>
		                                                <td>'.
		                                                    $value->cheque_date.
		                                                '</td>
		                                                <td>'.
		                                                    $value->method_name.
		                                                '</td>
					                                	<td></td>
					                            	</tr>';
					                                $count++;
					                                $totalamount = $totalamount + $value->amount;
					                                $remainamount=$value->remain_amount;
					                                }
					                        $bigdata.='</table>
					                    </div>

	                    				<div class="col-12">
	                        				<div class="media-list media-list-hover w-p100 mt-0">
	                            				<h5 class="media media-single py-10 px-0 w-p100 justify-content-between">
	                                				<p>
	                                    				<h3 class="text-yellow">Total Course Fees </h3>
	                                    				<span class="text-red">
	                                        				<i class="fa fa-inr"></i>'.
	                                            			$student[0]->course_fees.
	                                    				'</span>
	                                				</p>
					                                <p>
					                                    <h3 class="text-yellow">Total Paid Fees </h3>
					                                    <span class="text-red">
					                                        <i class="fa fa-inr"></i>'.$totalamount.'
					                                    </span>
					                                </p>
					                                <p>
					                                    <h3 class="text-yellow">Total Remaining Fees </h3>
					                                    <span class="text-red">
					                                        <i class="fa fa-inr"></i>';
					                                            if($remainamount==0)
					                                            {
					                                                $printremainamount=$student[0]->course_fees;
					                                            }
					                                            else
					                                            {
					                                                $printremainamount=$remainamount;
					                                            }
					                                    $bigdata.=$printremainamount.'</span>
					                                </p>
	                            				</h5>
	                        				</div>
	                    				</div>
	                				</div>
                				</div>
            				</div>
            			</div>
            		</div>
            	</div>
        	</section>
        </div>';
     	}
            echo $bigdata;
		}

		function Pay_fees()
		{
			$answer = array();
			$remainingamount = 0;

			$amount = $this->input->post('amount');
			$enrollno = $this->input->post('enrollno');
			$paymentmethod = $this->input->post('paymentmethod');
			$bankname = $this->input->post('bankname');
			$chequenumber = $this->input->post('chequenumber');
			$chequedate = $this->input->post('chequedate');
			$methodname = $this->input->post('methodname');

			$this->form_validation->set_rules('amount','Fees Amount','required|numeric');

			if($paymentmethod == "Cheque")
			{
				$this->form_validation->set_rules('bankname','Bank Name','required');
				$this->form_validation->set_rules('chequenumber','Cheque Number','required|numeric');
				$this->form_validation->set_rules('chequedate','Cheque Date','required');
			}
			else if($paymentmethod == "Other")
			{
				$this->form_validation->set_rules('methodname','Method Name','required');
			}

			if($this->form_validation->run()==FALSE)
			{
				$answer = array('code'=>0,'msg'=>validation_errors());
			}
			else
			{
				$enrollstudentresult = $this->Model->model_select('tbl_enroll_student',array('enroll_no'=>$enrollno));

				$enrollid = $enrollstudentresult[0]->enroll_id;

				$enrollstudents = $this->Model->model_select('tbl_fees',array('enroll_id'=>$enrollid));
				$terms = count($enrollstudents) + 1;

				if($paymentmethod == "Cash")
				{
					$data = array('enroll_id'=>$enrollid,'amount'=>$amount,'pay_date'=>date("m/d/Y"),'pay_type'=>$paymentmethod,'fees_term'=>$terms);
				}
				else if($paymentmethod == "Cheque")
				{
					$data = array('enroll_id'=>$enrollid,'amount'=>$amount,'pay_date'=>date("m/d/Y"),'pay_type'=>$paymentmethod,'bank_name'=>$bankname,'cheque_number'=>$chequenumber,'cheque_date'=>$chequedate,'fees_term'=>$terms);
				}
				else if($paymentmethod == "Other")
				{
					$data = array('enroll_id'=>$enrollid,'amount'=>$amount,'pay_date'=>date("m/d/Y"),'pay_type'=>$paymentmethod,'method_name'=>$methodname,'fees_term'=>$terms);
				}

				$q = $this->Model->model_insert('tbl_fees',$data);
				$insertid1 = $this->db->insert_id();

				$this->Model->model_delete('tbl_fees_status',array('enroll_id'=>$enrollid));

				$data1 = array('enroll_id'=>$enrollid);
				$q1 = $this->Model->model_insert('tbl_fees_status',$data1);
				$insertid2 = $this->db->insert_id();

				$result = $this->Model->model_select('tbl_fees',array('enroll_id'=>$enrollid));

				foreach($result as $value)
				{
					$remainingamount = $remainingamount + $value->amount;
				}

				$resultenrollstudent = $this->Model->model_select('tbl_enroll_student',array('enroll_id'=>$enrollid));
				$totalfees = $resultenrollstudent[0]->course_fees;

				$finalremainamount = $totalfees - $remainingamount;
				$data2 = array('remain_amount'=>$finalremainamount);

				$q2 = $this->Model->model_update('tbl_fees',$data2,array('fees_id'=>$insertid1));
				$q3 = $this->Model->model_update('tbl_fees_status',$data2,array('fees_status_id'=>$insertid2));

				if($q != '' && $q1 != '' && $q2 != '' && $q3)
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

		function get_fees_receipt($feesid)
		{
			$feesdetail = $this->Model->model_select('tbl_fees',array('fees_id'=>$feesid));
			$enrollresultresult = $this->Model->model_select('tbl_enroll_student',array('enroll_id'=>$feesdetail[0]->enroll_id));
			$courseresult = $this->Model->model_select('tbl_course',array('course_id'=>$enrollresultresult[0]->course));
			$result = array_merge($feesdetail,$enrollresultresult,$courseresult);
			echo json_encode($result);
		}
	}
?>