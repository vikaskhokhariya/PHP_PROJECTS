<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Blocked Admin List</title>
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
        var adminid;
        function load_modal(id)
        {
            $.ajax({
                url : "<?php echo site_url('Controller/load_admindetails');?>/"+id,
                type: "GET",
                dataType: "JSON",
                success: function(response)
                {
                    console.log(response);
                    $('#mymodal').modal();
                    $('#name').html(response[0].fname);
                    $('#gender').html(response[0].gender);
                    $('#dob').html(response[0].dob);
                    $('#state').html(response[1].StateName);
                    $('#city').html(response[2].city_name);
                    $('#contact').html(response[0].phno);
                    $('#email').html(response[0].email);
                    $('#unm').html(response[0].username);
                    $('#profile1').attr("src",'<?php echo base_url();?>assets/uploads/admin/'+response[0].profile);
                }
            });
        }

        function load_unblock_admin(aid)
        {
            swal({
                title:"Are you sure?",
                text:"You won't be able to revert this!",
                type:"warning",
                showCancelButton:!0,
                confirmButtonClass:"btn btn-success",
                cancelButtonClass:"btn btn-danger m-l-10",
                confirmButtonText:"Yes, Unblocked it!"
            }).then(function(){
                adminid=aid;
                final_unblock_admin();
                swal("Unblocked!","<span style='font-size:20px;font-weight:bold;'>Admin has been Unblocked...</span>","success")
            })
        }

        function final_unblock_admin()
        {
            $.ajax({
                url: "<?php echo site_url('Controller/unblock_admin/');?>"+adminid,
                type:"POST",
                success:function(response)
                {
                    $('.swal2-confirm').click(function(){
                        location.reload();
                    });
                }
            });
        }

        function load_delete_admin(aid)
        {
            swal({
                title:"Are you sure?",
                text:"You won't be able to revert this!",
                type:"warning",
                showCancelButton:!0,
                confirmButtonClass:"btn btn-success",
                cancelButtonClass:"btn btn-danger m-l-10",
                confirmButtonText:"Yes, Deleted it!"
            }).then(function(){
                adminid=aid;
                final_delete_admin();
                swal("Deleted!","<span style='font-size:20px;font-weight:bold;'>Admin has been Deleted...</span>","success")
            })
        }

        function final_delete_admin()
        {
            $.ajax({
                url: "<?php echo site_url('Controller/delete_admin/');?>"+adminid,
                type:"POST",
                success:function(response)
                {
                    $('.swal2-confirm').click(function(){
                        location.reload();
                    });
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
                        $array['j']='Blocked Sub Admin List';
                        $this->load->view('admin/topheader',$array);
                    ?>

                    <div class="page-content-wrapper ">
                        <div class="container-fluid">
                            <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered text-center table-hover">
                                    <thead>
                                        <tr>
                                            <th>Admin Code</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                            $res=$this->Model->model_select('admintb',array('status'=>0,'allowed'=>1));

                                            foreach($res as $value)
                                            {
                                                $cityid;
                                                $cityname;

                                                $cityid=$value->city;
                                                $stateid;
                                                $statenm;
                                                $stateid=$value->state;
                                                $resultcityname=$this->Model->model_select('city',array('city_id'=>$cityid));
                                                $resultstatename=$this->Model->model_select('state',array('StateId'=>$stateid));

                                                foreach($resultcityname as $value1)
                                                {
                                                    $cityname=$value1->city_name;
                                                }
                                                foreach($resultstatename as $value2)
                                                {
                                                    $statenm=$value2->StateName;
                                                }
                                            ?>
                                                <tr>
                                                    <td><?php echo $value->admin_code ?></td>
                                                    
                                                    <td><a href="javascript:load_modal(<?php echo $value->admin_code?>)"><?php echo $value->fname." ".$value->mname." ".$value->lname ?></a></td>
                                                    <td><?php echo $value->gender; ?></td>
                                                    <td><?php echo $value->address;?></a></td>
                                                    <td><?php echo $statenm;?></td>
                                                    <td><?php echo $cityname;?></td>
                                                    
                                                    <td>
                                                       <a href="javascript:load_delete_admin(<?php echo $value->admin_code ?>)">
                                                       <i class="ion-trash-a" style="font-size:25px;color:red;"></i></a> 
                                                       &nbsp;
                                                       <a href="javascript:load_unblock_admin(<?php echo $value->admin_code ?>)"><span class="btn btn-warning">Unblock</span></a> 
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
                        Admin Details
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
                                                <img src="" id="profile1" class="float-right img-rounded" height="250px" width="250px" style="border-radius:10px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="personal" class="tab-pane fade">
                                        <div class="row pb-2">
                                            <div class="col-12">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td><b>Birth Date</b></td>
                                                            <td id="dob"></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td><b>Contact</b></td>
                                                            <td id="contact"></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td><b>Email</b></td>
                                                            <td id="email"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>User Name</b></td>
                                                            <td id="unm"></td>
                                                        </tr>  
                                                    </tbody>
                                                </table>
                                            </div>
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