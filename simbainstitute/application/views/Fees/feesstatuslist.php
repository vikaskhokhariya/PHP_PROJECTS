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
                    Fees
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
                    <div class="col-lg-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Remaining Fees</h3>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                        <thead>
                                            <tr>
                                                <th class="text-yellow">No</th>
                                                <th class="text-yellow">Enroll No</th>
                                                <th class="text-yellow">Student Name</th>
                                                <th class="text-yellow">Course Name</th>
                                                <th class="text-yellow">Total Fees</th>
                                                <th class="text-yellow">Remaining Fees</th>
                                                <th class="text-yellow">Action</th>
                                            </tr>
                                        </thead>

                                        <?php 
                                            $result=$this->db->query("select * from tbl_fees_status where remain_amount != 0 order by fees_status_id desc")->result();
                                            $count = 1;
                                        ?>

                                        <tbody>
                                            <?php 
                                                foreach($result as $value)
                                                {
                                                    ?>
                                                    <tr>
                                                        <?php 
                                                            $studentresult = $this->Model->model_select('tbl_enroll_student',array('enroll_id'=>$value->enroll_id));
                                                        ?>
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $studentresult[0]->enroll_no; ?></td>
                                                        <td><?php echo $studentresult[0]->name; ?></td>
                                                        <?php 
                                                            $courseresult = $this->Model->model_select('tbl_course',array('course_id'=>$studentresult[0]->course));
                                                        ?>
                                                        <td><?php echo $courseresult[0]->course_name; ?></td>
                                                        <td><?php echo $studentresult[0]->course_fees; ?></td>
                                                        <td><?php echo $value->remain_amount; ?></td>
                                                        <td>
                                                            <a class="btn btn-block btn-success btn-sm" href="<?php echo base_url(); ?>Enroll/Student_Profile/<?php echo $value->enroll_id; ?>">
                                                                <span style="color:white;">View<span>
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
