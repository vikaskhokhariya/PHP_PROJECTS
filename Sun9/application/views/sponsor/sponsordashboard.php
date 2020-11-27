<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Admin Dashboard</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?php echo base_url()?>admin/assets/images/favicon.ico">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>admin/assets/plugins/morris/morris.css">

    <link href="<?php echo base_url()?>admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>admin/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>admin/assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

    <!-- Begin page -->
    <div id="wrapper">
        <?php 
            $this->load->view('sponsor/sponsorheader');
        ?>

        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <?php 
                    $array['j']='Dashboard';
                    $this->load->view('sponsor/topheader',$array);
                ?>

                <div class="page-content-wrapper ">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="<?php echo base_url()?>/index.php/Controller/load_totcustomer">
                                <div class="mini-stat clearfix bg-info">
                                    <span class="mini-stat-icon bg-light">
                                        <i class="mdi mdi-currency-btc text-info"></i>
                                    </span>
                                    <div class="mini-stat-info text-right text-light">
                                        <span class="counter text-white">
                                            Total Customer
                                        </span>
                                    </div>
                                    <p class="mb-0 m-t-20 text-light">
                                        <span class="pull-right">
                                            <i class="fa fa-caret-up m-r-5"></i>
                                        </span>
                                    </p>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- container -->
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
    <script src="<?php echo base_url()?>admin/assets/js/detect.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/fastclick.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/jquery.blockUI.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/waves.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/jquery.nicescroll.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/jquery.scrollTo.min.js"></script>

    <!--Morris Chart-->
    <script src="<?php echo base_url()?>admin/assets/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/raphael/raphael-min.js"></script>

    <script src="<?php echo base_url()?>admin/assets/pages/dashborad.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url()?>admin/assets/js/app.js"></script>  
</body>

</html>