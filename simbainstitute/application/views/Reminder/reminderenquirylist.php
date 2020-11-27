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
                    Enquiry
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
                                <h3 class="box-title">Enquiry Remember</h3>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                    <thead>
                                        <tr>
                                            <th class="text-yellow">No</th>
                                            <th class="text-yellow">Student Name</th>
                                            <th class="text-yellow">Email</th>
                                            <th class="text-yellow">Contact</th>
                                            <th class="text-yellow">Interest</th>
                                            <th class="text-yellow">Reminder Date</th>
                                            <th class="text-yellow">Reminder</th>
                                            <th class="text-yellow">Action</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        $branchid = $this->session->userdata('branch');
                                        $q = "SELECT * FROM `tbl_enquiry_reminder` WHERE STR_TO_DATE(reminder_date,'%m/%d/%Y') <= current_date and status = 1";
                                        $result=$this->db->query($q)->result();
                                        $count = 1;
                                    ?>

                                    <tbody>
                                        <?php 
                                        foreach($result as $value)
                                        {
                                            ?>
                                            <tr>
                                                <?php 
                                                $enquiryresult = $this->Model->model_select('tbl_enquiry',array('enq_id'=>$value->enquiry_id));
                                                ?>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo $enquiryresult[0]->name; ?></td>
                                                <td><?php echo $enquiryresult[0]->email; ?></td>
                                                <td><?php echo $enquiryresult[0]->phone; ?></td>
                                                <td><?php echo $enquiryresult[0]->interest; ?></td>
                                                <td><?php echo $value->reminder_date; ?></td>
                                                <td><?php echo $value->reminder; ?></td>
                                                <td>
                                                    <a class="btn btn-block btn-default btn-xs" href="<?php echo base_url(); ?>Reminder/Edit_reminder/<?php echo $value->reminder_id; ?>">
                                                        <span style="color:white;">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                                        <span>
                                                    </a>
                                                    <a class="btn btn-block btn-success btn-xs" href="javascript:confirm_enquiry('<?php echo $value->reminder_id; ?>')">
                                                        <span style="color:white;">
                                                            <i class="fa fa-check" aria-hidden="true"></i> Cancel
                                                        <span>
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
        function confirm_enquiry(enq_id)
        {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to retrive this!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                closeOnConfirm: false
            }).then(function(result){
                if(result.value)
                {
                    $.ajax({
                        url:"<?php echo site_url('Reminder/Confirm_enquiry/') ?>"+enq_id,
                        type:"POST",
                        success:function(response)
                        {
                            window.location.href='<?php echo base_url(); ?>Reminder/Enquiry_reminder'
                        }
                    });
                }
            });
        }    
    </script>
</body>
</html>
