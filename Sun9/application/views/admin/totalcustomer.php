<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Total customers</title>
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
    var custid;

    function load_modal(id)
    {
        $.ajax({
        url : "<?php echo site_url('Controller/load_customerdetails');?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(response)
        {
            console.log(response);
            $('#mymodal').modal();
            $('#cname').html(response[0].cust_name);
            $('#cfhnm').html(response[0].fhname);
            $('#cgender').html(response[0].cgender);
            $('#cdob').html(response[0].cdob);
            $('#cstate').html(response[2].StateName);
            $('#ccity').html(response[3].city_name);
            $('#caddress').html(response[0].caddress);
            $('#cpin').html(response[0].cpincode);
            $('#ccountry').html(response[0].ccountry);
            $('#cnation').html(response[0].cnationality);
            
            $('#ccontact').html(response[0].cphno);
            $('#ccontactalt').html(response[0].caltphno);
            $('#cemail').html(response[0].cemail);
            $('#cpan').html(response[0].cpancardno);
            $('#caadhar').html(response[0].caadharcardno);
            $('#cstatus').html(response[0].cmaritalstatus);
            $('#coccu').html(response[0].coccupation);
            $('#cnname').html(response[0].nname);
            $('#cnaddress').html(response[0].naddress);
            $('#cnrelation').html(response[0].nrelation);
            $('#cnbirthdate').html(response[0].ndob);
            
            $('#cabranch').html(response[1].bname);
            $('#cabranchcode').html(response[0].branch_code);
            $('#casponsor').html(response[4].sname);
            $('#casponsorcode').html(response[0].sponsor_code);

            $('#cplan').html(response[5].pname);
            $('#csqureprice').html(response[6].squarefeetprice);
            $('#csquare').html(response[6].squarefeet);
            $('#ctotalamt').html(response[6].totalamount);
            $('#cdownpay').html(response[6].downpayment);
            $('#cremain').html(response[6].remainingamount);
            $('#cEMI').html(response[6].totalEMI);
            $('#cEMIval').html(response[6].EMIvalue);
            $('#cnextdt').html(response[0].reg_date);
            $('#resproof').attr("src",'<?php echo base_url();?>assets/uploads/custresident/'+response[0].cresidentproof);
            $('#idproof').attr("src",'<?php echo base_url();?>assets/uploads/custidentity/'+response[0].cidentityproof);
            $('#profileproof').attr("src",'<?php echo base_url();?>assets/uploads/custprofile/'+response[0].profile);
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
                    $array['j']='Total customer';
                    $this->load->view('admin/topheader',$array);
                ?>

                <div class="page-content-wrapper ">
                    <div class="container-fluid"> 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title" style="color:black;">Search Customer</h4>
                                </div>
                            </div>
                        </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row form-group text-center">
                                
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="example-text-input" class="col-form-label">Branch Code</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="text" name="bcode" class="form-control" id="bcode">
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="example-text-input" class="col-form-label">Promotor Code</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="text" name="pcode" id="pcode" class="form-control">
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
                        <h4 class="page-title" style="color:black;">Total customers</h4>
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

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="mymodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">
                    Customer Details
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
                                <li class="nav-item"><a href="" data-target="#address" data-toggle="tab" class="nav-link small text-uppercase">Address</a></li>
                                <li class="nav-item"><a href="" data-target="#nominee" data-toggle="tab" class="nav-link small text-uppercase">Nominee</a></li>
                                <li class="nav-item"><a href="" data-target="#business" data-toggle="tab" class="nav-link small text-uppercase">Business</a></li>
                                <li class="nav-item"><a href="" data-target="#plan" data-toggle="tab" class="nav-link small text-uppercase">Plan</a></li>
                                <li class="nav-item"><a href="" data-target="#proof" data-toggle="tab" class="nav-link small text-uppercase">Proof</a></li>
                            </ul>
                            <br>

                            <div id="tabsJustifiedContent" class="tab-content">
                                <div id="profile" class="tab-pane fade active show">
                                    <div class="row pb-2">
                                        <div class="col-12">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td><b>Customer Name</b></td>
                                                        <td id="cname"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>F/H Name</b></td>
                                                        <td id="cfhnm"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Gender</b></td>
                                                        <td id="cgender"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Birth Date</b></td>
                                                        <td id="cdob"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                                                        <td id="ccontact"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Contact(Alt)</b></td>
                                                        <td id="ccontactalt"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Email</b></td>
                                                        <td id="cemail"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Pan Card No</b></td>
                                                        <td id="cpan"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Aadhar Card No</b></td>
                                                        <td id="caadhar"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Matrial Status</b></td>
                                                        <td id="cstatus"></td>
                                                    </tr>

                                                    <tr>
                                                        <td><b>Occuption</b></td>
                                                        <td id="coccu"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div id="address" class="tab-pane fade">
                                    <div class="row pb-2">
                                        <div class="col-12">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td><b>State</b></td>
                                                        <td id="cstate"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>City</b></td>
                                                        <td id="ccity"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Address</b></td>
                                                        <td id="caddress"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Pin Code</b></td>
                                                        <td id="cpin"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Country</b></td>
                                                        <td id="ccountry"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Nationality
                                                        </b></td>
                                                        <td id="cnation"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div id="nominee" class="tab-pane fade">
                                    <div class="row pb-2">
                                        <div class="col-12">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <td><b>Name</b></td>
                                                    <td id="cnname"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Address</b></td>
                                                    <td id="cnaddress"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Relation</b></td>
                                                    <td id="cnrelation"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Birth Date</b></td>
                                                    <td id="cnbirthdate"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>

                                <div id="business" class="tab-pane fade">
                                    <div class="row pb-2">
                                        <div class="col-12">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <td><b>Associated Branch Name</b></td>
                                                    <td id="cabranch"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Associated Branch Code</b></td>
                                                    <td id="cabranchcode"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Associated Sponsor Name</b></td>
                                                    <td id="casponsor"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Associated Sponsor Code</b></td>
                                                    <td id="casponsorcode"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>

                                <div id="plan" class="tab-pane fade">
                                    <div class="row pb-2">
                                        <div class="col-12">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td><b>Plan Name</b></td>
                                                        <td id="cplan"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Squre Feet Price</b></td>
                                                        <td id="csqureprice"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Square Feet</b></td>
                                                        <td id="csquare"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Total Amount</b></td>
                                                        <td id="ctotalamt"></td>
                                                    </tr>
                                                     <tr>
                                                        <td><b>Down Payment</b></td>
                                                        <td id="cdownpay"></td>
                                                    </tr>
                                                     <tr>
                                                        <td><b>Remaining Amount</b></td>
                                                        <td id="cremain"></td>
                                                    </tr>
                                                     <tr>
                                                        <td><b>Total EMI</b></td>
                                                        <td id="cEMI"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>EMI Value</b></td>
                                                        <td id="cEMIval"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Registration Date</b></td>
                                                        <td id="cnextdt"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div id="proof" class="tab-pane fade">
                                    <div class="row pb-2">
                                        <div class="col-sm-4">
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img id="profileproof" width="80%" height="150px">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <label>Profile</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img id="resproof" width="80%" height="150px">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <label>Resident Proof</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <img id="idproof" width="80%" height="150px">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <label>Identity Proof</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div><!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->


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
                url : "<?php echo site_url('Controller/totalcustomer');?>",
                type : "POST",
                success : function(response)
                {
                    document.getElementById("division").innerHTML=response;
                }
            });
        }

        var pcode=bcode='';
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
            if($('#pcode').val()!='')
            {
                pcode=$('#pcode').val();
            }
            else
            {
                pcode='undefined';
            }
            
            

            if((pcode=='undefined') && (bcode=='undefined'))
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
                        url: "<?php echo site_url('Controller/load_search_data_cust/');?>"+bcode+"/"+pcode,
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
                $('#pcode').val('');
                $('#bcode').val('');
                show();
            }); 
        });

    </script>
        
    <script src="<?php echo base_url()?>admin/assets/pages/animate-init.js"></script>
    <!-- App js -->
    <script src="<?php echo base_url()?>admin/assets/js/app.js"></script>
</body>

</html>