<?php 
    $plans=$this->Model->model_select('plantb',array('allowed'=>1));
    $totalplans=sizeof($plans);

    $branch=$this->Model->model_select('branchtb',array('allowed'=>1,'status'=>1));
    $totalbranch=sizeof($branch);

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
    <title>Sub Admin Dashboard</title>
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
            if($this->session->userdata('admintype')=="master")
            {
                $this->load->view('admin/adminheader');
            }
            else
            {
                $this->load->view('admin/subadminheader');
            }
        ?>

        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <?php 
                    $array['j']='Dashboard';
                    $this->load->view('admin/topheader',$array);
                ?>

                <div class="page-content-wrapper ">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-4">
                                <a href="<?php echo base_url()?>index.php/Controller/load_planlist">
                                    <div class="mini-stat clearfix bg-success">
                                        <span class="mini-stat-icon bg-light"><i class="ion-android-lightbulb text-success"></i></span>
                                        <div class="mini-stat-info text-right text-white">
                                            <span class="counter text-white">Plan</span>
                                        </div>
                                        <div class="mini-stat-info text-right text-light">
                                            <span class="counter text-white">
                                                Total : <?php echo $totalplans; ?>
                                            </span>
                                        </div>
                                        <p class="mb-0 m-t-20 text-light"><span class="pull-right"><i class="fa fa-caret-up m-r-5"></i></span></p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-sm-4">
                                <a href="<?php echo base_url()?>index.php/Controller/load_branchlist">
                                <div class="mini-stat clearfix bg-white">
                                    <span class="mini-stat-icon bg-light"><i class="mdi mdi-source-branch text-warning"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter text-warning">Branch</span>
                                    </div>
                                    <div class="mini-stat-info text-right text-light">
                                        <span class="counter text-warning">
                                            Total : <?php echo $totalbranch; ?>
                                        </span>
                                    </div>
                                    <p class="mb-0 m-t-20 text-muted"><span class="pull-right"><i class="fa fa-caret-up m-r-5"></i></span></p>
                                </div>
                                </a>
                            </div>

                            <div class="col-sm-4">
                                <a href="<?php echo base_url()?>index.php/Controller/load_admincustomerlist">
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
                            
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="<?php echo base_url()?>index.php/Controller/load_adminsponsorlist">
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
    <!-- <script src="<?php echo base_url()?>admin/assets/plugins/morris/morris.min.js"></script> -->
    <script src="<?php echo base_url()?>admin/assets/plugins/raphael/raphael-min.js"></script>
    <!-- <script src="<?php echo base_url()?>admin/assets/pages/dashborad.js"></script> -->

    <!-- App js -->
    <script src="<?php echo base_url()?>admin/assets/js/app.js"></script>  

    <?php 
        include('message.php');
    ?>

    <script type="text/javascript">
        $(function(){
            msg_count();
            noti_msg_count();
        });
        setInterval(function()
        {
            if(!$('#messageclick').hasClass('openornot'))
            {
                msg_count();
            }
            else
            {
                $('#messagecount').html('');
            }
            load_message_data();
            if(!$('#notificationclick').hasClass('openornot'))
            {
                noti_msg_count();
            }
            else
            {
                $('#notificationcount').html('');
            }
            load_notification_data();
        },1000);
    </script>
</body>

</html>