<?php 
	class Account extends CI_Controller
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

		function Total_Expence()
		{
			if($this->session->userdata('role') == "Admin")
			{
				$active['active']=array('main'=>'account','whichactive'=>'totalexpence');
				$this->load->view('Account/totalexpence',$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function Total_Income()
		{
			if($this->session->userdata('role') == "Admin")
			{
				$active['active']=array('main'=>'account','whichactive'=>'totalincome');
				$this->load->view('Account/totalincome',$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function Account_Summary()
		{
			if($this->session->userdata('role') == "Admin")
			{
				$active['active']=array('main'=>'account','whichactive'=>'summary');
				$this->load->view('Account/summary',$active);
			}
			else
			{
				$this->load->view("login");
			}
		}

		function Search_expence()
		{
			$bigdata="";
			$count = 1;
			$totalexpenceamount=0;

			$from = $this->input->post('from');
			$to = $this->input->post('to');

			$q = "SELECT * FROM `tbl_expence` WHERE STR_TO_DATE(expence_date,'%m/%d/%Y') >= STR_TO_DATE('$from','%m/%d/%Y') and STR_TO_DATE(expence_date,'%m/%d/%Y') <= STR_TO_DATE('$to','%m/%d/%Y')";
			$result=$this->db->query($q)->result();

			if(count($result)==0)
			{
				$bigdata='<section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box">
                            <div class="box-header with-border text-center">
                                <h3 class="box-title">No Record Found</h3>
                            </div>
                        </div>
                    </div>
                </div>
                </section>';
			}
			else
			{
				$bigdata='<section class="content">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <div class="box">
	                            <div class="box-header with-border">
	                                <h3 class="box-title">Expence List</h3>
	                            </div>
	                            <div class="box-body">
	                                <div class="table-responsive">
	                                    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
	                                        <thead>
	                                            <tr>
	                                                <th class="text-yellow text-center">No</th>
	                                                <th class="text-yellow">Expence Title</th>
	                                                <th class="text-yellow">Expence Detail</th>
	                                                <th class="text-yellow">Expence Date</th>
	                                                <th class="text-yellow">Expence Amount</th>
	                                            </tr>
	                                        </thead>
	                                            
	                                        <tbody>';

	                                        foreach($result as $value)
	                                        {
	                                        	$expencetitle = $this->Model->model_select('tbl_expence_category',array('expence_category_id'=>$value->expence_title));

	                                            $bigdata.='<tr>
	                                                <td class="text-center">'.$count.'</td>
	                                                <td>'.$expencetitle[0]->expence_category.'</td>
	                                                <td>'.$value->expence_detail.'</td>
	                                                <td>'.$value->expence_date.'</td>
	                                                <td>'.$value->expence_amount.'</td>
	                                            </tr>';
	                                            $count++;
	                                            $totalexpenceamount = $totalexpenceamount + $value->expence_amount;
	                                        }
	                                        $bigdata.='</tbody>

	                                        <tfoot>
	                                        	<tr>
	                                                <th class="text-yellow text-center" colspan="4">Total Expence </th>
	                                                <th class="text-yellow">'.$totalexpenceamount.'</th>
	                                            </tr>
	                                        </tfoot>                  
	                                    </table>
	                                </div> 
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </section>';
        	}

            $result = array('bigdata'=>$bigdata);
			echo json_encode($result);
		}

		function Search_Income()
		{
			$bigdata="";
			$count = 1;
			$totalincomeamount=0;

			$from = $this->input->post('from');
			$to = $this->input->post('to');

			$q = "SELECT * FROM `tbl_fees` WHERE STR_TO_DATE(pay_date,'%m/%d/%Y') >= STR_TO_DATE('$from','%m/%d/%Y') and STR_TO_DATE(pay_date,'%m/%d/%Y') <= STR_TO_DATE('$to','%m/%d/%Y')";
			$result=$this->db->query($q)->result();

			if(count($result)==0)
			{
				$bigdata='<section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box">
                            <div class="box-header with-border text-center">
                                <h3 class="box-title">No Record Found</h3>
                            </div>
                        </div>
                    </div>
                </div>
                </section>';
			}
			else
			{
				$bigdata='<section class="content">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <div class="box">
	                            <div class="box-header with-border">
	                                <h3 class="box-title">Income List</h3>
	                            </div>
	                            <div class="box-body">
	                                <div class="table-responsive">
	                                    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
	                                        <thead>
	                                            <tr>
	                                                <th class="text-yellow text-center">No</th>
	                                                <th class="text-yellow">Enroll Number</th>
													<th class="text-yellow">Student Name</th>  
	                                                <th class="text-yellow">Payment Date</th>
	                                                <th class="text-yellow">Fees Amount</th>
	                                            </tr>
	                                        </thead>
	                                            
	                                        <tbody>';

	                                        foreach($result as $value)
	                                        {
	                                        	$studentdetail = $this->Model->model_select('tbl_enroll_student',array('enroll_id'=>$value->enroll_id));

	                                            $bigdata.='<tr>
	                                                <td class="text-center">'.$count.'</td>
	                                                <td>'.$studentdetail[0]->enroll_no.'</td>
	                                                <td>'.$studentdetail[0]->name.'</td>
	                                                <td>'.$value->pay_date.'</td>
	                                                <td>'.$value->amount.'</td>
	                                            </tr>';
	                                            $count++;
	                                            $totalincomeamount = $totalincomeamount + $value->amount;
	                                        }
	                                        $bigdata.='</tbody>

	                                        <tfoot>
	                                        	<tr>
	                                                <th class="text-yellow text-center" colspan="4">Total Income </th>
	                                                <th class="text-yellow">'.$totalincomeamount.'</th>
	                                            </tr>
	                                        </tfoot>                  
	                                    </table>
	                                </div> 
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </section>';
        	}

            $result = array('bigdata'=>$bigdata);
			echo json_encode($result);
		}

		function Search_summary()
		{
			$bigdata="";  // incomebigdata
			$bigdata1=""; // expencebigdata
			$count = 1;
			$totalincomeamount=0;
			$totalexpenceamount=0;

			$from = $this->input->post('from');
			$to = $this->input->post('to');

			$expence = "SELECT * FROM `tbl_expence` WHERE STR_TO_DATE(expence_date,'%m/%d/%Y') >= STR_TO_DATE('$from','%m/%d/%Y') and STR_TO_DATE(expence_date,'%m/%d/%Y') <= STR_TO_DATE('$to','%m/%d/%Y')";
			$resultexpence = $this->db->query($expence)->result();

			$income = "SELECT * FROM `tbl_fees` WHERE STR_TO_DATE(pay_date,'%m/%d/%Y') >= STR_TO_DATE('$from','%m/%d/%Y') and STR_TO_DATE(pay_date,'%m/%d/%Y') <= STR_TO_DATE('$to','%m/%d/%Y')";
			$resultincome=$this->db->query($income)->result();

			if(count($resultincome)==0)
			{
				$bigdata='<section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box">
                            <div class="box-header with-border text-center">
                                <h3 class="box-title">No Income Found</h3>
                            </div>
                        </div>
                    </div>
                </div>
                </section>';
			}
			else
			{
				$bigdata='<section class="content">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <div class="box">
	                            <div class="box-header with-border">
	                                <h3 class="box-title">Income List</h3>
	                            </div>
	                            <div class="box-body">
	                                <div class="table-responsive">
	                                    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
	                                        <thead>
	                                            <tr>
	                                                <th class="text-yellow text-center">No</th>
	                                                <th class="text-yellow">Enroll Number</th>
													<th class="text-yellow">Student Name</th>  
	                                                <th class="text-yellow">Payment Date</th>
	                                                <th class="text-yellow">Fees Amount</th>
	                                            </tr>
	                                        </thead>
	                                            
	                                        <tbody>';

	                                        foreach($resultincome as $value)
	                                        {
	                                        	$studentdetail = $this->Model->model_select('tbl_enroll_student',array('enroll_id'=>$value->enroll_id));

	                                            $bigdata.='<tr>
	                                                <td class="text-center">'.$count.'</td>
	                                                <td>'.$studentdetail[0]->enroll_no.'</td>
	                                                <td>'.$studentdetail[0]->name.'</td>
	                                                <td>'.$value->pay_date.'</td>
	                                                <td>'.$value->amount.'</td>
	                                            </tr>';
	                                            $count++;
	                                            $totalincomeamount = $totalincomeamount + $value->amount;
	                                        }
	                                        $bigdata.='</tbody>

	                                        <tfoot>
	                                        	<tr>
	                                                <th class="text-yellow text-center" colspan="4">Total Income </th>
	                                                <th class="text-yellow">'.$totalincomeamount.'</th>
	                                            </tr>
	                                        </tfoot>                  
	                                    </table>
	                                </div> 
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </section>';
        	}

        	if(count($resultexpence)==0)
			{
				$bigdata1='<section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box">
                            <div class="box-header with-border text-center">
                                <h3 class="box-title">No Expence Found</h3>
                            </div>
                        </div>
                    </div>
                </div>
                </section>';
			}
			else
			{
				$bigdata1='<section class="content">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <div class="box">
	                            <div class="box-header with-border">
	                                <h3 class="box-title">Expence List</h3>
	                            </div>
	                            <div class="box-body">
	                                <div class="table-responsive">
	                                    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
	                                        <thead>
	                                            <tr>
	                                                <th class="text-yellow text-center">No</th>
	                                                <th class="text-yellow">Expence Title</th>
	                                                <th class="text-yellow">Expence Detail</th>
	                                                <th class="text-yellow">Expence Date</th>
	                                                <th class="text-yellow">Expence Amount</th>
	                                            </tr>
	                                        </thead>
	                                            
	                                        <tbody>';

	                                        foreach($resultexpence as $value)
	                                        {
	                                        	$expencetitle = $this->Model->model_select('tbl_expence_category',array('expence_category_id'=>$value->expence_title));

	                                            $bigdata1.='<tr>
	                                                <td class="text-center">'.$count.'</td>
	                                                <td>'.$expencetitle[0]->expence_category.'</td>
	                                                <td>'.$value->expence_detail.'</td>
	                                                <td>'.$value->expence_date.'</td>
	                                                <td>'.$value->expence_amount.'</td>
	                                            </tr>';
	                                            $count++;
	                                            $totalexpenceamount = $totalexpenceamount + $value->expence_amount;
	                                        }
	                                        $bigdata1.='</tbody>

	                                        <tfoot>
	                                        	<tr>
	                                                <th class="text-yellow text-center" colspan="4">Total Expence </th>
	                                                <th class="text-yellow">'.$totalexpenceamount.'</th>
	                                            </tr>
	                                        </tfoot>                  
	                                    </table>
	                                </div> 
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </section>';
        	}

            $result = array('expence'=>$bigdata1,'income'=>$bigdata,'totalexpence'=>$totalexpenceamount,'totalincome'=>$totalincomeamount);
			echo json_encode($result);
		}
	}
?>