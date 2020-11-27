<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Customer List</title>
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
                $('#cnextdt').html(response[0].cnextduedate);
                $('#resproof').attr("src",'<?php echo base_url();?>assets/uploads/custresident/'+response[0].cresidentproof);
                $('#idproof').attr("src",'<?php echo base_url();?>assets/uploads/custidentity/'+response[0].cidentityproof);
                $('#profileproof').attr("src",'<?php echo base_url();?>assets/uploads/custprofile/'+response[0].profile);
            }
            });
        }

        function load_block_customer(cid)
        {
            swal({
                title:"Are you sure?",
                type:"warning",
                showCancelButton:!0,
                confirmButtonClass:"btn btn-success",
                cancelButtonClass:"btn btn-danger m-l-10",
                confirmButtonText:"Yes, Blocked it!"
            }).then(function(){
                custid=cid;
                final_block_customer();
                swal("Blocked!","<span style='font-size:20px;font-weight:bold;'>Customer has been Blocked...</span>","success")
            })
        }

        function final_block_customer()
        {
            $.ajax({
                url: "<?php echo site_url('Controller/block_customer/');?>"+custid,
                type:"POST",
                success:function(response)
                {
                    $('.swal2-confirm').click(function(){
                        location.reload();
                    });
                }
            });
        }

        function load_delete_customer(cid)
        {
            swal({
                title:"Are you sure?",
                type:"warning",
                showCancelButton:!0,
                confirmButtonClass:"btn btn-success",
                cancelButtonClass:"btn btn-danger m-l-10",
                confirmButtonText:"Yes, Deleted it!"
            }).then(function(){
                custid=cid;
                final_delete_customer();
                swal("Deleted!","<span style='font-size:20px;font-weight:bold;'>Customer has been Deleted...</span>","success")
            })
        }

        function final_delete_customer()
        {
            $.ajax({
                url: "<?php echo site_url('Controller/delete_customer/');?>"+custid,
                type:"POST",
                success:function(response)
                {
                    $('.swal2-confirm').click(function(){
                        location.reload();
                    });
                }
            });
        }

        function load_edit_customer(ccode)
        {
            window.location.href="load_admineditcustomer/"+ccode;
        }
    </script>
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
                    $array['j']='Customer List';
                    $this->load->view('admin/topheader',$array);
                ?>

                <div class="page-content-wrapper ">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-4">
                                <div class="page-title-box">
                                    <button type="button" name="addnewrecord" class="btn btn-success btn-block" onclick="addnewcustomer()">
                                        <span style="font-size:17px;"><i class='mdi mdi-plus'></i>&nbsp;Add New Customer</span>
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
                                                    <th>Code</th>
                                                    <th>Name</th>
                                                    <th>Booking Date</th>
                                                    <th>Total Amount</th>
                                                    <th>Down Payment</th>
                                                    <th>Plan Name</th>
                                                    <th>EMI Amount</th>
                                                    <th>Contact</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                  <?php 
                                                    $res=$this->Model->model_select('customertb',array('status'=>1,'allowed'=>1));

                                                    foreach($res as $value)
                                                    {
                                                        $cityid;
                                                        $cityname;
                                                        $planid;
                                                        $plannm;
                                                        $custpurid;
                                                        $planid=$value->cplan;
                                                        $cityid=$value->cityid;
                                                        $custpurid=$value->cust_code;
                                                        $resultcityname=$this->Model->model_select('city',array('city_id'=>$cityid));

                                                        foreach($resultcityname as $value1)
                                                        {
                                                            $cityname=$value1->city_name;
                                                        }
                                                        $resplan=$this->Model->model_select('plantb',array('plan_code'=>$planid));
                                                        foreach($resplan as $value2)
                                                        {
                                                            $plannm=$value2->pname;
                                                        }
                                                        $purres=$this->Model->model_select('purchasetb',array('cust_code'=>$custpurid));
                                                        foreach($purres as $value3)
                                                        {
                                                            $totamt=$value3->totalamount;
                                                            $downamt=$value3->downpayment;
                                                            $emival=$value3->EMIvalue;
                                                        }

                                                    ?>
                                                        <tr>
                                                            <td><?php echo $value->cust_code; ?></td>
                                                             <td><a href="javascript:load_modal(<?php echo $value->cust_code?>)"><?php echo $value->cust_name;?></a></td>
                                                             <td><?php echo $value->cjoiningdate; ?></td>
                                                            <td><?php echo $totamt;?></td>
                                                            <td><?php echo $downamt;?></td>
                                                            <td><?php echo $plannm;?></td>
                                                            <td><?php echo $emival;?></td>
                                                            <td><?php echo $value->cphno;?></td>
                                                            
                                                         <td>
                                                            <a href="javascript:load_edit_customer(<?php echo $value->cust_code; ?>)"><i class="mdi mdi-grease-pencil" style="font-size:12px;color:green;"></i></a>
                                                               &nbsp;
                                                            <a href="javascript:load_delete_customer(<?php echo $value->cust_code?>)"><i class="ion-trash-a" style="font-size:12px;color:red;"></i></a> 
                                                               &nbsp;
                                                            <a href="javascript:load_block_customer(<?php echo $value->cust_code?>)"><i class="mdi mdi-block-helper" style="font-size:12px;color:red;"></i></a> 
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

        function addnewcustomer()
        {
            window.location.href="load_addadmincustomer";
        }
    </script>
</body>

</html>