<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Plan List</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/admin/images/favicon.ico">

    <!-- Sweet Alert -->
    <link href="<?php echo base_url()?>assets/admin/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables -->
    <link href="<?php echo base_url()?>assets/admin/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/admin/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?php echo base_url()?>assets/admin/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?php echo base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/admin/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/admin/css/style.css" rel="stylesheet" type="text/css" />

   <!--  <script type="text/javascript">
        var planid
        function load_delete_plan(pid)
        {
            swal({
                title:"Are you sure?",
                type:"warning",
                showCancelButton:!0,
                confirmButtonClass:"btn btn-success",
                cancelButtonClass:"btn btn-danger m-l-10",
                confirmButtonText:"Yes, Deleted it!"
            }).then(function(){
                planid = pid;
                final_delete_plan();
                swal("Deleted!","<span style='font-size:20px;font-weight:bold;'>Admin has been Deleted...</span>","success")
            })
        }

        function final_delete_plan()
        {
            $.ajax({
                url: "<?php echo site_url('Controller/delete_plan/');?>"+planid,
                type:"POST",
                success:function(response)
                {
                   $('.swal2-confirm').click(function(){
                        location.reload();
                    });
                }
            });
        }

        function load_edit_plan(pcode)
        {
            window.location.href="load_editplan/"+pcode;
        }
    </script> -->
</head>

<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

    <!-- Begin page -->
    <div id="wrapper">
        <?php 
            $this->load->view('admin/adminheader');
        ?>
        
        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <?php 
                    $array['j']='Plan List';
                    $this->load->view('admin/topheader',$array);
                ?>

                <div class="page-content-wrapper ">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-9"></div>
                            <div class="col-sm-3">
                                <div class="page-title-box">
                                    <button type="button" name="addnewrecord" class="btn btn-success btn-block" onclick="addnewplan()">
                                        <span style="font-size:17px;"><i class='mdi mdi-plus'></i>&nbsp;Add New Plan</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <table id="datatable" class="table table-bordered text-center table-hover">
                                            <thead>
                                                <tr>
                                                    <th>State Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php 
                                                    $res=$this->Model->model_select('state_tb',array('state_status'=>1));

                                                    foreach($res as $value)
                                                    {
                                                        ?>
                                                    <tr>
                                                        <td><?php echo $value->state_name;?></td>
                                                        <td>
                                                            <a>
                                                                <i class="mdi mdi-grease-pencil" style="font-size:15px;color:green;">
                                                                </i>
                                                            </a>
                                                            &nbsp;
                                                            <a>
                                                                <i class="ion-trash-a" style="font-size:15px;color:red;">
                                                                </i>
                                                            </a> 
                                                        </td>
                                                    </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div><!-- container -->
                </div> <!-- Page content Wrapper -->
            </div> <!-- content -->

            <footer class="footer">
                
            </footer>

        </div>
        <!-- End Right content here -->
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="<?php echo base_url()?>assets/admin/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/js/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/js/modernizr.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/js/waves.js"></script>
    <script src="<?php echo base_url()?>assets/admin/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url()?>assets/admin/js/jquery.nicescroll.js"></script>
    <script src="<?php echo base_url()?>assets/admin/js/jquery.scrollTo.min.js"></script>

    <!-- Sweet-Alert  -->
    <script src="<?php echo base_url()?>assets/admin/plugins/sweet-alert2/sweetalert2.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/pages/sweet-alert.init.js"></script>

    <!-- Required datatable js -->
    <script src="<?php echo base_url()?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="<?php echo base_url()?>assets/admin/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/plugins/datatables/jszip.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/plugins/datatables/pdfmake.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/plugins/datatables/vfs_fonts.js"></script>
    <script src="<?php echo base_url()?>assets/admin/plugins/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/plugins/datatables/buttons.print.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/plugins/datatables/buttons.colVis.min.js"></script>
    
    <!-- Responsive examples -->
    <script src="<?php echo base_url()?>assets/admin/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="<?php echo base_url()?>assets/admin/pages/datatables.init.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url()?>assets/admin/js/app.js"></script>

    </body>
</html>