<!DOCTYPE html>
<html>
 
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Customer Review List</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="<?php echo base_url()?>admin/assets/images/favicon.ico">

    <!-- Sweet Alert -->
    <link href="<?php echo base_url()?>admin/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables -->
    <link href="<?php echo base_url()?>admin/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>admin/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?php echo base_url()?>admin/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
                    $array['j']='Customer Review List';
                    $this->load->view('admin/topheader',$array);
                ?>
                <div class="page-content-wrapper ">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <section class="container py-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <ul id="tabsJustified" class="nav nav-tabs">
                                                        <li class="nav-item"><a href="" data-target="#profile" data-toggle="tab" class="nav-link small text-uppercase active">Recent Review</a></li>
                                                        <li class="nav-item"><a href="" data-target="#personal" data-toggle="tab" class="nav-link small text-uppercase">Approved Review</a></li>
                                                        <li class="nav-item"><a href="" data-target="#nominee" data-toggle="tab" class="nav-link small text-uppercase">Rejected Review</a></li>
                                                    </ul>
                                                    <br>
                                                    <div id="tabsJustifiedContent" class="tab-content">
                                                        <div id="profile" class="tab-pane fade active show">
                                                            <div class="row pb-2">
                                                                <div class="col-12">
                                                                    <span id="recentreview"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="personal" class="tab-pane fade">
                                                            <div class="row pb-2">
                                                                <div class="col-12">
                                                                   <span id="approvedreview"></span> 
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="nominee" class="tab-pane fade">
                                                            <div class="row pb-2">
                                                                <div class="col-12">
                                                                    <span id="rejectedreview"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
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

    <!-- Required datatable js -->
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Buttons examples -->
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    
    <!-- <script src="<?php //echo base_url()?>admin/assets/plugins/datatables/jszip.min.js"></script> -->
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/buttons.colVis.min.js"></script>

    <!-- Responsive examples -->
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="<?php echo base_url()?>admin/assets/pages/datatables.init.js"></script>

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

    <script type="text/javascript">
        $(function(){
            recentreview();
            approvedreview();
            rejectedreview();

            $('#datatable').removeClass('table-responsive');
            wlength=$(window).width();
            $( window ).resize(function(){
               wlengthnew=$(window).width();
               seventwidth=wlength*70/100; 
               console.log(seventwidth );
               if(wlengthnew < seventwidth)
               {
                    $('#datatable').addClass('table-responsive');
               }
               else
               {
                    $('#datatable').removeClass('table-responsive');
               }
            });
        });

        function approved(id)
        {
            //alert(id);
            $.ajax({
                url : "<?php echo site_url('Controller/change_review_status/approve/'); ?>"+id,
                type:"POST",
                success : function(response)
                {
                    console.log(response);
                    recentreview();
                    approvedreview();
                    rejectedreview();
                }
            });
        }

        function disapproved(id)
        {
            $.ajax({
                url : "<?php echo site_url('Controller/change_review_status/reject/'); ?>"+id,
                type:"POST",
                success : function(response)
                {
                    console.log(response);
                    recentreview();
                    approvedreview();
                    rejectedreview();
                }
            });
        }

        function recentreview()
        {
            $.ajax({
                url : "<?php echo site_url('Controller/load_recentreview/panding'); ?>",
                type:"POST",
                success : function(response)
                {
                    //console.log(response);
                    $('#recentreview').html(response);
                }
            });
        }

        function approvedreview()
        {
            $.ajax({
                url : "<?php echo site_url('Controller/load_recentreview/approve'); ?>",
                type:"POST",
                success : function(response)
                {
                    console.log(response);
                    $('#approvedreview').html(response);
                }
            });
        }

        function rejectedreview()
        {
            $.ajax({
                url : "<?php echo site_url('Controller/load_recentreview/reject');?>",
                type:"POST",
                success : function(response)
                {
                    //console.log(response);
                    $('#rejectedreview').html(response);
                }
            });
        }
    </script>
</body>
</html>