<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Sponsor List</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="<?php echo base_url()?>/assets/images/favicon.ico">

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
        var spid;

        function load_modal(id)
        {
            $.ajax({
            url : "<?php echo site_url('Controller/load_sponsordetails');?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(response)
            {
                console.log(response);
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
                $('#abranchcode').html(response[1].branch_code);
                $('#ptype').html(response[0].spaymenttype);
                $('#crate').html(response[0].commissionrate);
                $('#ctype').html(response[0].scommissiontype);
                $('#payf').html(response[0].payfrequancy);
                $('#profilepic').attr("src","<?php echo base_url();?>assets/uploads/sponsorprofile/"+response[0].sprofile);
            }
            });
        }

        function load_block_sponsor(sid)
        {
            swal({
                title:"Are you sure?",
                type:"warning",
                showCancelButton:!0,
                confirmButtonClass:"btn btn-success",
                cancelButtonClass:"btn btn-danger m-l-10",
                confirmButtonText:"Yes, Blocked it!"
            }).then(function(){
                spid = sid;
                final_block_sponsor();
                swal("Blocked!","<span style='font-size:20px;font-weight:bold;'>Sponsor has been Blocked...</span>","success")
            })
        }

        function final_block_sponsor()
        {
            $.ajax({
                url: "<?php echo site_url('Controller/block_sponsor/');?>"+spid,
                type:"POST",
                success:function(response)
                {
                    $('.swal2-confirm').click(function(){
                        location.reload();
                    });
                }
            });
        }

        function load_delete_sponsor(sid)
        {
            swal({
                title:"Are you sure?",
                type:"warning",
                showCancelButton:!0,
                confirmButtonClass:"btn btn-success",
                cancelButtonClass:"btn btn-danger m-l-10",
                confirmButtonText:"Yes, Deleted it!"
            }).then(function(){
                spid = sid;
                final_delete_sponsor();
                swal("Deleted!","<span style='font-size:20px;font-weight:bold;'>Sponsor has been Deleted...</span>","success")
            })
        }

        function final_delete_sponsor()
        {
            $.ajax({
                url: "<?php echo site_url('Controller/delete_sponsor/');?>"+spid,
                type:"POST",
                success:function(response)
                {
                   $('.swal2-confirm').click(function(){
                        location.reload();
                    });
                }
            });
        }

        function load_edit_sponsor(scode)
        {
            window.location.href="load_admineditsponsor/"+scode;
        }

        function addnewsponsor()
        {
            window.location.href="load_adminaddsponsor";
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
                    $array['j']='Sponsor List';
                    $this->load->view('admin/topheader',$array);
                ?>
                <div class="page-content-wrapper ">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-4">
                                <div class="page-title-box">
                                    <button type="button" name="addnewrecord" class="btn btn-success btn-block" onclick="addnewsponsor()">
                                        <span style="font-size:17px;"><i class='mdi mdi-plus'></i>&nbsp;Add New Sponsor</span>
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
                                                    <th>Creation Date</th>
                                                    <th>Code</th>
                                                    <th>Name</th>
                                                    <th>Contact</th>
                                                    <th>Email</th>
                                                    <th>City</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php 
                                                    $res=$this->Model->model_select('sponsortb',array('status'=>1,'allowed'=>1));

                                                    foreach($res as $value)
                                                    {
                                                        $cityid;
                                                        $cityname;

                                                        $cityid=$value->scity;

                                                        $resultcityname=$this->Model->model_select('city',array('city_id'=>$cityid));

                                                        foreach($resultcityname as $value1)
                                                        {
                                                            $cityname=$value1->city_name;
                                                        }
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $value->screationdate ?></td>
                                                            <td><?php echo $value->sponsor_code; ?></td>
                                                            <td><a href="javascript:load_modal(<?php echo $value->sponsor_code?>)"><?php echo $value->sname;?></a></td>
                                                            <td><?php echo $value->sphno; ?></td>
                                                            <td><?php echo $value->semail; ?></td>
                                                            <td><?php echo $cityname;?></td>
                                                            
                                                            <td>
                                                               <a href="javascript:load_edit_sponsor('<?php echo $value->sponsor_code; ?>')"><i class="mdi mdi-grease-pencil" style="font-size:15px;color:green;"></i></a>
                                                               &nbsp;
                                                               <a href="javascript:load_delete_sponsor(<?php echo $value->sponsor_code?>)">
                                                               <i class="ion-trash-a" style="font-size:15px;color:red;"></i> 
                                                               &nbsp;
                                                               <a href="javascript:load_block_sponsor(<?php echo $value->sponsor_code ?>)"><i class="mdi mdi-block-helper" style="font-size:15px;color:red;"></i></a> 
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
                                                <img id="profilepic" class="float-right img-rounded" height="250px" width="250px" style="border-radius:50px;">
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
    </script>

    </body>
</html>