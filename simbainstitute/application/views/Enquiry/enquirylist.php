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
                                            <th class="text-yellow">Cancel</th>
                                            <th class="text-yellow">Register</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        $result=$this->Model->model_select('tbl_enquiry',array('status'=>1),'enq_id','desc');
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
                                                <td>
                                                    <a class="btn btn-block btn-danger btn-xs" href="javascript:cancel_enquiry('<?php echo $value->enq_id; ?>')">
                                                        <span style="color:white;">Cancel<span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-block btn-success btn-xs" href="<?php echo base_url(); ?>Enroll/Enroll_Students/<?php echo $value->enq_id; ?>">
                                                        <span style="color:white;">Enroll<span>
                                                    </a>
                                                    <a class="btn btn-block btn-warning btn-xs" href="<?php echo base_url(); ?>Demo/Demo_Student/<?php echo $value->enq_id; ?>">
                                                        <span style="color:white;">Demo<span>
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

<script type="text/javascript">
    function cancel_enquiry(enq_id)
    {
        swal({
                title: 'Are you sure?',
                text: "You won't be able to Retrive this!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                closeOnConfirm: false
            }).then(function(result){
                if(result.value)
                {
                    $.ajax({
                        url:"<?php echo site_url('Student/Cancel_enquiry/') ?>"+enq_id,
                        type:"POST",
                        success:function(response)
                        {
                            window.location.href='<?php echo base_url(); ?>Student/Cancel_Enquiry_List';
                        }
                    });
                }
            });
        }    
</script>
</body>

</html>
