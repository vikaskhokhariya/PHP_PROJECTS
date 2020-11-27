<?php 
    $sponsor=$this->Model->model_select('sponsortb',array('allowed'=>1,'status'=>1));
    $totalsponsor=sizeof($sponsor);

    $customers=$this->Model->model_select('customertb',array('allowed'=>1,'status'=>1));
    $totalcustomers=sizeof($customers);
?>

<!DOCTYPE html>
<html>
    
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Branch Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesdesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="<?php echo base_url()?>admin/assets/images/favicon.ico">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="<?php echo base_url()?>admin/assets/plugins/morris/morris.css">

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
                        $array['j']='Dashboard';
                        $this->load->view('branch/topheader',$array);
                    ?>

                    <div class="page-content-wrapper ">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-5">
                                    <a href="<?php echo base_url()?>index.php/Controller/load_branchsponsorlist">
                                    <div class="mini-stat clearfix bg-white">
                                        <span class="mini-stat-icon bg-light"><i class="ion-android-contact text-primary"></i></span>
                                        <div class="mini-stat-info text-right text-muted">
                                            <span class="counter text-primary">Sponsor</span>
                                        </div>
                                        <div class="mini-stat-info text-right text-light">
                                            <span class="counter text-primary">
                                                Total : <?php echo $totalsponsor; ?>
                                            </span>
                                        </div>
                                        <p class="mb-0 m-t-20 text-muted"><span class="pull-right"><i class="fa fa-caret-up m-r-5"></i></span></p>
                                    </div>
                                    </a>
                                </div>

                                <div class="col-sm-5">
                                    <a href="<?php echo base_url()?>index.php/Controller/load_branchcustomerlist">
                                    <div class="mini-stat clearfix bg-info">
                                        <span class="mini-stat-icon bg-light">
                                            <i class="ion-android-social-user"></i>
                                        </span>
                                        <div class="mini-stat-info text-right text-light">
                                            <span class="counter text-white">
                                                Customers 
                                            </span>
                                        </div>
                                        <div class="mini-stat-info text-right text-light">
                                            <span class="counter text-white">
                                                Total : <?php echo $totalcustomers; ?>
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

<!-- Mirrored from themesdesign.in/upcube/layouts/vertical/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 May 2018 17:08:15 GMT -->
</html>