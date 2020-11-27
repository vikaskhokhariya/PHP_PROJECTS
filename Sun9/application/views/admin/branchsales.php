<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Branch Sales</title>
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
            $this->load->view('admin/adminheader');
        ?>

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <?php 
                    $array['j']='BranchSale';
                    $this->load->view('admin/topheader',$array);
                ?>

                <div class="page-content-wrapper ">
                    <div class="container-fluid"> 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title" style="color:black;">Search BranchSales</h4>
                                </div>
                            </div>
                        </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row form-group text-center"> 
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="example-text-input" class="col-form-label">Branch Code</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="text" name="bcode" id="bcode" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="example-text-input" class="col-form-label">Branch Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="text" name="bname" class="form-control" id="bname">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="example-text-input" class="col-form-label">From Date</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="fromdate" name="fromdate" autocomplete="off">
                                                <div class="input-group-append bg-custom b-0">
                                                    <span class="input-group-text">
                                                        <i class="mdi mdi-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="example-text-input" class="col-form-label">To Date</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="todate" name="todate" autocomplete="off">
                                                <div class="input-group-append bg-custom b-0">
                                                    <span class="input-group-text">
                                                        <i class="mdi mdi-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-3">
                                    
                                </div>
                                <div class="col-3">
                                    <input type="button" value="Search" name="serbtn" id="serbtn" class="btn btn-success btn-block" id="search">
                                </div>
                                <div class="col-3">
                                    <input type="button" value="Reset" name="serbtn" class="btn btn-success btn-block" id="reset">
                                </div>
                                <div class="col-3">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title" style="color:black;">Branch Sales</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

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

    <!--  Modal content for the above example -->
    
   

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

    <script>
            $(function() {
                show();
             $('.table-responsive').responsiveTable({
                addDisplayAllBtn: 'btn btn-secondary'
            });
        });
    </script>
    <script type="text/javascript">
        function show()
         {
            $.ajax({
                url : "<?php echo site_url('Controller/branchview');?>",
                type : "POST",
                success : function(response)
                {
                    document.getElementById("division").innerHTML=response;
                }
            });
        }

          $(function()
        {
            $("#fromdate").datepicker({autoclose:!0,todayHighlight:!0,endDate:'+0d',format:'dd-mm-yyyy',orientation: "bottom"});
        });
        $(function(){
            $("#todate").datepicker({autoclose:!0,todayHighlight:!0,endDate:'+0d',format:'dd-mm-yyyy',orientation: "bottom"});
        });

        var bname=bcode=fdate=tdate='';
         $(function(){
            show();
            
            $('#serbtn').click(function(){

            if($('#bcode').val()!='')
            {
                bcode=$('#bcode').val();
            }
            else
            {
                bcode='undefined';
            }
            if($('#bname').val()!='')
            {
                bname=$('#bname').val();
            }
            else
            {
                bname='undefined';
            }
            if($('#fromdate').val()!='')
            {
                fdate=$('#fromdate').val();    
            }
            else
            {
                fdate='undefined';
            }
            if($('#todate').val()!='')
            {
                tdate=$('#todate').val();    
            }
            else
            {
                tdate='undefined';
            }
            if((bcode=='undefined') && (bname=='undefined') && (fdate=='undefined') && (tdate='undefined'))
            {
                swal({
                        width:"35%",
                        title:"Opps..",
                        text:"<span style='font-size:20px;color:#67605F;font-weight:bold;'>Please Enter Data to be search...</span>",
                        type:"error",
                        });
            }
            else
            {
                $.ajax({
                    url: "<?php echo site_url('Controller/load_search_data_bsale/');?>"+bcode+"/"+bname+"/"+fdate+"/"+tdate,
                    type:"POST",
                    //dataType : "JSON",
                    success : function(response)
                    {
                        // $('html,body').animate({
                        //     scrollTop:$('#psaledivision').offset().top-180
                        // },1200);
                        console.log(response);
                        document.getElementById('division').innerHTML=response;
                    } 
                });
            } 
        }); 

            $('#reset').click(function(){
                $('#bname').val('');
                $('#bcode').val('');
                $('#fromdate').val('');
                $('#todate').val('');
                show();
            }); 
        });

    </script>
        
    <script src="<?php echo base_url()?>admin/assets/pages/animate-init.js"></script>
    <!-- App js -->
    <script src="<?php echo base_url()?>admin/assets/js/app.js"></script>

</body>

</html>