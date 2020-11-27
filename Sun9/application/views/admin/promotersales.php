<!DOCTYPE html>
<html>
    
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Promoter Sales</title>
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

           <script type="text/javascript">
        function load_modal(id)
        {
            $.ajax({
            url : "<?php echo site_url('Controller/load_sponsordetails');?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(response)
            {
                $('#mymodal').modal();
                $('#name').html(response[0].sname);
                $('#gender').html(response[0].sgender);
                $('#dob').html(response[0].sdob);
                $('#state').html(response[2].StateName);
                $('#city').html(response[3].city_name);
                $('#contact').html(response[0].sphno);
                $('#contact-alt').html(response[0].saltphno);
                $('#email').html(response[0].semail);
                $('#pan').html(response[0].spancardno);
                $('#aadhar').html(response[0].saadharno);
                $('#nname').html(response[0].snomineename);
                $('#naddress').html(response[0].snomineeaddress);
                $('#nrelation').html(response[0].snomineerelation);
                $('#nbirthdate').html(response[0].snomineedob);
                $('#abranch').html(response[1].bname);
                $('#abranchcode').html(response[0].bassociated);
                $('#ptype').html(response[0].spaymenttype);
                $('#crate').html(response[0].commissionrate);
                $('#ctype').html(response[0].scommissiontype);
                $('#payf').html(response[0].payfrequancy);
                $('#profile1').attr("src",'<?php echo base_url();?>assets/uploads/sponsorprofile/'+response[0].sprofile);

            }
            });
        }

      
    </script>
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
                        $array['j']='PromoterSale';
                        $this->load->view('admin/topheader',$array);
                    ?>

                    <div class="page-content-wrapper ">
                        <div class="container-fluid"> 
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <h4 class="page-title" style="color:black;">Search PromoterSales</h4>
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
                                                <label for="example-text-input" class="col-form-label">Promoter Code</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="text" name="pcode" id="pcode" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="example-text-input" class="col-form-label">Promoter Name</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="text" name="pname" class="form-control" id="pname">
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
                            <h4 class="page-title" style="color:black;">Promoter Sales</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div id="psaledivision">
                     
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
        
             <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="mymodal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">
                        Sponsor Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <section class="container py-4">
                        <div class="row">
                            <div class="col-md-12">
                                <ul id="tabsJustified" class="nav nav-tabs">
                                    <li class="nav-item"><a href="" data-target="#profile" data-toggle="tab" class="nav-link small text-uppercase active">Profile</a></li>
                                    <li class="nav-item"><a href="" data-target="#personal" data-toggle="tab" class="nav-link small text-uppercase">Personal</a></li>
                                    <li class="nav-item"><a href="" data-target="#nominee" data-toggle="tab" class="nav-link small text-uppercase">Nominee</a></li>
                                    <li class="nav-item"><a href="" data-target="#business" data-toggle="tab" class="nav-link small text-uppercase">Business</a></li>
                                </ul>
                                <br>

                                <div id="tabsJustifiedContent" class="tab-content">
                                    <div id="profile" class="tab-pane fade active show">
                                        <div class="row pb-2">
                                            <div class="col-md-8">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td><b>Name</b></td>
                                                            <td id="name"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Gender</b></td>
                                                            <td id="gender"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Birth Date</b></td>
                                                            <td id="dob"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>State</b></td>
                                                            <td id="state"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>City</b></td>
                                                            <td id="city"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="col-md-4">
                                                <img src="" id="profile1" class="float-right img-rounded" height="250px" width="250px" style="border-radius:50px;">
                                            </div>
                                        </div>
                                    </div>

                                    <div id="personal" class="tab-pane fade">
                                        <div class="row pb-2">
                                            <div class="col-12">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td><b>Contact</b></td>
                                                            <td id="contact"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Contact(Alt)</b></td>
                                                            <td id="contact-alt"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Email</b></td>
                                                            <td id="email"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Pan Card No</b></td>
                                                            <td id="pan"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Aadhar Card No</b></td>
                                                            <td id="aadhar"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="nominee" class="tab-pane fade">
                                        <div class="row pb-2">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td><b>Name</b></td>
                                                        <td id="nname"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Address</b></td>
                                                        <td id="naddress"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Relation</b></td>
                                                        <td id="nrelation"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Birth Date</b></td>
                                                        <td id="nbirthdate"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div id="business" class="tab-pane fade">
                                        <div class="row pb-2">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td><b>Associated Branch Name</b></td>
                                                        <td id="abranch"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Associated Branch Code</b></td>
                                                        <td id="abranchcode"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Payment Receive Type</b></td>
                                                        <td id="ptype"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Comission Type</b></td>
                                                        <td id="ctype"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Pay Frequancy</b></td>
                                                        <td id="payf"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Comission Rate</b></td>
                                                        <td id="crate"></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


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
                    
                 $('.table-responsive').responsiveTable({
                    addDisplayAllBtn: 'btn btn-secondary'
                });
            });
        </script>
        <script type="text/javascript">
            function show()
             {
                $.ajax({
                    url : "<?php echo site_url('Controller/psaleview');?>",
                    type : "POST",
                    success : function(response)
                    {
                        document.getElementById("psaledivision").innerHTML=response;
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

            var pname=pcode=fdate=tdate='';
             $(function(){
                show();
                
                $('#serbtn').click(function(){

                if($('#pcode').val()!='')
                {
                    pcode=$('#pcode').val();
                }
                else
                {
                    pcode='undefined';
                }
                if($('#pname').val()!='')
                {
                    pname=$('#pname').val();
                }
                else
                {
                    pname='undefined';
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

                if((pcode=='undefined') && (pname=='undefined') && (fdate=='undefined') && (tdate='undefined'))
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
                            url: "<?php echo site_url('Controller/load_search_data_psale/');?>"+pcode+"/"+pname+"/"+fdate+"/"+tdate,
                            type:"POST",
                            //dataType : "JSON",
                            success : function(response)
                            {
                                // $('html,body').animate({
                                //     scrollTop:$('#psaledivision').offset().top-180
                                // },1200);
                                console.log(response);
                                document.getElementById('psaledivision').innerHTML=response;
                            } 
                        });
                } 
                }); 

                $('#reset').click(function(){
                    $('#pname').val('');
                    $('#pcode').val('');
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