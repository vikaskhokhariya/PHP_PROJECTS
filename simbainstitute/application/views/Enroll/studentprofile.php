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
                Student Profile
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?php echo base_url(); ?>Simba">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>
                </li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="box bg-deathstar-dark">
                        <div class="box-body box-profile">
                            <h2 class="profile-username text-center mb-0">
                                <?php 
                                    echo $student[0]->name;
                                ?>
                            </h2>
                            <h2 class="profile-username text-center mb-0">
                                <span class="text-yellow text-center">Enroll No :</span>
                                <?php 
                                    echo $student[0]->enroll_no;
                                ?>
                            </h2>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="profile-user-info">
                                        <p>
                                            <h3 class="text-yellow">Email Address : </h3>
                                            <i class="fa fa-envelope pr-15"></i><?php echo $student[0]->email; ?>
                                        </p>
                                        <p>
                                            <h3 class="text-yellow">Contact Number : </h3>
                                            <i class="fa fa-phone pr-15"></i> <?php echo $student[0]->phone; ?> &nbsp;&nbsp;
                                            <i class="fa fa-phone pr-15"></i>
                                            <?php echo $student[0]->pphone; ?>
                                        </p>
                                        <p>
                                            <h3 class="text-yellow">Parmenent Address : </h3>
                                            <i class="fa fa-map-marker pr-15"></i>
                                            <?php echo $student[0]->address; ?>
                                        </p>
                                        <p>
                                            <h3 class="text-yellow">School / College : </h3>
                                            <i class="fa fa-graduation-cap pr-15"></i>
                                            <?php echo $student[0]->college; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="profile-user-info">
                                        <p>
                                            <h3 class="text-yellow">Qualification : </h3>
                                            <i class="fa fa-envelope pr-15"></i><?php echo $student[0]->qualification; ?>
                                        </p>
                                        <p>
                                            <h3 class="text-yellow">Course : </h3>
                                            <?php 
                                                $coursedata = $this->Model->model_select('tbl_course',array('course_id'=>$student[0]->course));
                                            ?>
                                            <i class="fa fa-phone pr-15"></i> <?php echo $coursedata[0]->course_name; ?> &nbsp;&nbsp;
                                        </p>
                                        <p>
                                            <h3 class="text-yellow">Course Fees : </h3>
                                            <i class="fa fa-inr pr-15"></i>
                                            <?php echo $student[0]->course_fees; ?>
                                        </p>
                                        <p>
                                            <h3 class="text-yellow">Registration Date : </h3>
                                            <i class="fa fa-calendar pr-15"></i>
                                            <?php echo $student[0]->reg_date; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <h2 class="title w-p100 mt-10 mb-0 p-20">Fees Payment</h2>

                                <div class="col-12">
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
                                            </tr>
                                            <?php 
                                                $feesresult = $this->Model->model_select('tbl_fees',array('enroll_id'=>$student[0]->enroll_id));
                                                $count = 1;
                                                $totalamount=0;
                                                $remainamount=0;
                                            ?>
                                            <?php 
                                                foreach($feesresult as $value)
                                                {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php 
                                                        echo $count;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        echo $value->pay_date;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        echo $value->amount;
                                                        $totalamount = $totalamount + $value->amount;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        echo $value->pay_type;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        echo $value->bank_name;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        echo $value->cheque_number;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        echo $value->cheque_date;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        echo $value->method_name;
                                                    ?>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <?php
                                                $count++;
                                                $remainamount=$value->remain_amount;
                                                }
                                            ?>
                                        </table>
                                    </div>

                                    <div class="col-12">
                                        <div class="media-list media-list-hover w-p100 mt-0">
                                            <h5 class="media media-single py-10 px-0 w-p100 justify-content-between">
                                                <p>
                                                    <h3 class="text-yellow">Total Course Fees </h3>
                                                    <span class="text-red">
                                                        <i class="fa fa-inr"></i>
                                                        <?php 
                                                            echo $student[0]->course_fees;
                                                        ?>
                                                    </span>
                                                </p>
                                                <p>
                                                    <h3 class="text-yellow">Total Paid Fees </h3>
                                                    <span class="text-red">
                                                        <i class="fa fa-inr"></i>
                                                        <?php 
                                                            echo $totalamount;
                                                        ?>
                                                    </span>
                                                </p>
                                                <p>
                                                    <h3 class="text-yellow">Total Remaining Fees </h3>
                                                    <span class="text-red">
                                                        <i class="fa fa-inr"></i>
                                                        <?php 
                                                            if($remainamount==0)
                                                            {
                                                                echo $student[0]->course_fees;
                                                            }
                                                            else
                                                            {
                                                                echo $remainamount;
                                                            }
                                                        ?>
                                                    </span>
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
