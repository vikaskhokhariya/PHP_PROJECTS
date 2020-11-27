<?php 
    /*Enquiry*/
    $Enquiry = $this->Model->model_select('tbl_enquiry');
    $totalenquiry = count($Enquiry);

    /*Enrolled Student*/
    $enrolledstudent = $this->Model->model_select('tbl_enroll_student');
    $totalenrolledstudent = count($enrolledstudent);

    /*Fees List*/
    $fees = $this->Model->model_select('tbl_fees');
    $totalfees = count($fees);

    /*Enquiry Reminder*/
    $reminder = $this->db->query("SELECT * FROM `tbl_enquiry_reminder` WHERE STR_TO_DATE(reminder_date,'%m/%d/%Y') <= current_date and status = 1")->result();
    $totalreminder = count($reminder);

    /*Birthday*/
    $birthday=$this->db->query("SELECT * FROM tbl_enroll_student WHERE DATE_FORMAT(STR_TO_DATE(birthdate,'%m/%d'),'%m/%d') = DATE_FORMAT(CURRENT_DATE,'%m/%d')")->result();
    $totalbirthday = count($birthday);
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    <?php 
        $this->load->view("linktop.php");
    ?>  
</head>

<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">  
    <?php 
        $this->load->view("topheader");
        $this->load->view("sidemenu");
    ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dashboard
                <small>Student Portal</small>
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">
                    <i class="fa fa-dashboard"></i> Home</a>
                </li>
                <li class="breadcrumb-item active">
                    Dashboard
                </li>
            </ol>
        </section>

        <section class="content">
    		<div class="row">	
                <div class="col-lg-3">
                    <div class="box box-body pull-up bg-hexagons-white">
                        <h6>
                            <span class="text-uppercase">
                                Total Enquiry
                            </span>
                            <span class="float-right">
                                <a class="btn btn-xs btn-danger" href="<?php echo base_url(); ?>Student/Enquiry_List">
                                    View
                                </a>
                            </span>
                        </h6>
                        <br>
                        <p class="font-size-26"><?php echo $totalenquiry; ?></p>
                        <div class="progress progress-xxs mt-0 mb-10">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 35%;height:4px;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="font-size-12">
                            <i class="fa fa-arrow-down text-danger mr-1"></i>
                            Student Enquiry
                        </div>
                    </div>
                </div>	

                <div class="col-lg-3">
                    <div class="box box-body pull-up bg-deathstar-white">
                        <h6>
                            <span class="text-uppercase">
                                Enrolled Student
                            </span>
                            <span class="float-right">
                                <a class="btn btn-xs btn-info" href="<?php echo base_url(); ?>Enroll/Enroll_studentlist">
                                    View
                                </a>
                            </span>
                        </h6>
                        <br>
                        <p class="font-size-26"><?php echo $totalenrolledstudent; ?></p>
                        <div class="progress progress-xxs mt-0 mb-10">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 35%;height:4px;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="font-size-12">
                            <i class="fa fa-arrow-down text-info mr-1"></i>
                            Total Registered Student
                        </div>
                    </div>
                </div> 

                <div class="col-lg-3">
                    <div class="box box-body pull-up bg-banknote-white">
                        <h6>
                            <span class="text-uppercase">
                                Fees List
                            </span>
                            <span class="float-right">
                                <a class="btn btn-xs btn-primary" href="<?php echo base_url(); ?>Fees/Fees_List">
                                    View
                                </a>
                            </span>
                        </h6>
                        <br>
                        <p class="font-size-26"><?php echo $totalfees; ?></p>
                        <div class="progress progress-xxs mt-0 mb-10">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 35%;height:4px;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="font-size-12">
                            <i class="fa fa-arrow-down text-primary mr-1"></i>
                            Student Fees List
                        </div>
                    </div>
                </div>    

                <div class="col-lg-3">
                    <div class="box box-body pull-up bg-hexagons-white">
                        <h6>
                            <span class="text-uppercase">
                                Reminder List
                            </span>
                            <span class="float-right">
                                <a class="btn btn-xs btn-success" href="<?php echo base_url(); ?>Reminder/Enquiry_reminder">
                                    View
                                </a>
                            </span>
                        </h6>
                        <br>
                        <p class="font-size-26"><?php echo $totalreminder; ?></p>
                        <div class="progress progress-xxs mt-0 mb-10">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 35%;height:4px;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="font-size-12">
                            <i class="fa fa-arrow-down text-success mr-1"></i>
                            Enquiry Reminder List
                        </div>
                    </div>
                </div>  

                <div class="col-lg-3">
                    <div class="box box-body pull-up bg-banknote-white">
                        <h6>
                            <span class="text-uppercase">
                                Today's Birthday
                            </span>
                            <span class="float-right">
                                <a class="btn btn-xs btn-primary" href="<?php echo base_url(); ?>Birthday/Birthday_List">
                                    View
                                </a>
                            </span>
                        </h6>
                        <br>
                        <p class="font-size-26"><?php echo $totalbirthday; ?></p>
                        <div class="progress progress-xxs mt-0 mb-10">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 35%;height:4px;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="font-size-12">
                            <i class="fa fa-arrow-down text-primary mr-1"></i>
                            Student Fees List
                        </div>
                    </div>
                </div>    
    		</div>	

            <div class="row">
                <div class="col-lg-12 col-12">         
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Recent Enquiry</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                    <thead>
                                        <tr>
                                            <th class="text-yellow">No</th>
                                            <th class="text-yellow">Student Name</th>
                                            <th class="text-yellow">Contact</th>
                                            <th class="text-yellow">Interested Course</th>
                                            <th class="text-yellow">Enq Date</th>
                                            <th class="text-yellow">Register</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        $branchid = $this->session->userdata('branch');
                                        $q="select * from tbl_enquiry order by enq_id desc limit 5";
                                        $result = $this->db->query($q)->result();
                                        $count = 1;
                                    ?>
                                    <tbody>
                                        <?php 
                                            foreach($result as $value)
                                            {
                                            ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $value->name; ?></td>
                                                <td><?php echo $value->phone; ?></td>
                                                <td><?php echo $value->interest; ?></td>
                                                <td><?php echo $value->reg_date; ?></td>
                                                <td>
                                                    <a class="btn btn-block btn-success btn-sm" href="<?php echo base_url(); ?>Enroll/Enroll_Students/<?php echo $value->enq_id; ?>">
                                                        <span style="color:white;">Register<span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                            $count++;
                                            }
                                        ?>
                                    </tbody>                  
                                </table>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
    	</section>
    </div>  
    <?php 
        $this->load->view("footer");
    ?>
    <div class="control-sidebar-bg"></div>
</div>
<?php 
    $this->load->view("linkbottom");
?>
</body>

</html>
