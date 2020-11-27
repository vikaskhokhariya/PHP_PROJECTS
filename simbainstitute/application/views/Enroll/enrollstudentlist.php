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
                    Enrolled Students
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
                                <h3 class="box-title">Enrolled Students List</h3>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                    <thead>
                                        <tr>
                                            <th class="text-yellow">No</th>
                                            <th class="text-yellow">Enroll NO</th>
                                            <th class="text-yellow">Student Name</th>
                                            <th class="text-yellow">Email</th>
                                            <th class="text-yellow">Contact</th>
                                            <th class="text-yellow">Reg_Date</th>
                                            <th class="text-yellow">Course</th>
                                            <th class="text-yellow">Course Fees</th>
                                            <th class="text-yellow">Action</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        $result=$this->Model->model_select('tbl_enroll_student','','enroll_id','desc');
                                        $count = 1;
                                    ?>
                                    <tbody>
                                        <?php 
                                        foreach($result as $value)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $value->enroll_no; ?></td>
                                                <td><?php echo $value->name; ?></td>
                                                <td><?php echo $value->email; ?></td>
                                                <td><?php echo $value->phone; ?></td>
                                                <td><?php echo $value->reg_date; ?></td>
                                                <?php 
                                                $coursedata = $this->Model->model_select('tbl_course',array('course_id'=>$value->course));
                                                ?>
                                                <td><?php echo $coursedata[0]->course_name; ?></td>
                                                <td><?php echo $value->course_fees; ?></td>
                                                <td>
                                                    <a class="btn btn-block btn-success btn-sm" href="<?php echo base_url(); ?>Enroll/Student_Profile/<?php echo $value->enroll_id; ?>">
                                                        <span style="color:white;">View<span>
                                                        </a>
                                                    </td>
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
