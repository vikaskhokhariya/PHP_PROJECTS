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
                Student Enquiry
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
                            <h3 class="box-title">Enquiry List</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                    <thead>
                                        <tr>
                                            <th class="text-yellow">No</th>
                                            <th class="text-yellow">Student Name</th>
                                            <th class="text-yellow">Contact</th>
                                            <th class="text-yellow">Interested Course</th>
                                            <th class="text-yellow">Enq Date</th>
                                            <th class="text-yellow">Reference</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        $result=$this->Model->model_select('tbl_enquiry',array('status'=>0),'enq_id','desc');
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
                                                <td><?php echo $value->reference ?></td>
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
