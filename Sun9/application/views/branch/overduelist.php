<!DOCTYPE html>
<html>
    
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Receipt List</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesdesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>admin/assets/images/favicon.ico">

        <!-- Sweet Alert -->
        <link href="<?php echo base_url()?>admin/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

        <!-- Plugins css -->
        <link href="<?php echo base_url()?>admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>admin/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

        <!-- Table css -->
        <link href="<?php echo base_url()?>admin/assets/plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css" rel="stylesheet" type="text/css" media="screen">

        <!-- App css -->
        <link href="<?php echo base_url()?>admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>admin/assets/css/style.css" rel="stylesheet" type="text/css" />
    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">
            <?php 
                $this->load->view('branch/branchheader');
            ?>

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <?php 
                        $array['j']='Over Due List';
                        $this->load->view('branch/topheader',$array);
                    ?>

                    <div class="page-content-wrapper ">
                        <div class="container-fluid">
                            <div id="division">
                                 
                            </div>
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
        <script src="<?php echo base_url()?>admin/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url()?>admin/assets/js/popper.min.js"></script>
        <script src="<?php echo base_url()?>admin/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>admin/assets/js/modernizr.min.js"></script>
        <script src="<?php echo base_url()?>admin/assets/js/waves.js"></script>
        <script src="<?php echo base_url()?>admin/assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url()?>admin/assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url()?>admin/assets/js/jquery.scrollTo.min.js"></script>

        <!-- Sweet-Alert  -->
        <script src="<?php echo base_url()?>admin/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
        <script src="<?php echo base_url()?>admin/assets/pages/sweet-alert.init.js"></script>

        <!-- Plugins js -->
        <script src="<?php echo base_url()?>admin/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url()?>admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url()?>admin/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>admin/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>

        <!-- Plugins Init js -->
        <script src="<?php echo base_url()?>admin/assets/pages/form-advanced.js"></script>

        <!-- Responsive-table-->
        <script src="<?php echo base_url()?>admin/assets/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js" type="text/javascript"></script>

        <script>
            $(function(){
                show();
            });
            function show()
             {
                $.ajax({
                    url : "<?php echo site_url('Controller/overduelist');?>",
                    type : "POST",
                    success : function(response)
                    {
                        document.getElementById("division").innerHTML=response;
                    }
                });
            }
            
        </script>

        <script src="<?php echo base_url()?>admin/assets/pages/animate-init.js"></script>
        <!-- App js -->
        <script src="<?php echo base_url()?>admin/assets/js/app.js"></script>
    </body>

</html>