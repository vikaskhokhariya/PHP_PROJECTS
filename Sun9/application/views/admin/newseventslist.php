<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>NewsEvents List</title>
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
        var newsid;
        function load_delete_news(nid)
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
                newsid = nid;
                final_delete_news();
                swal("Deleted!","News has been Deleted.","success")
            })
        }

        function final_delete_news()
        {
            $.ajax({
                url: "<?php echo site_url('Controller/delete_news/');?>"+newsid,
                type:"POST",
                success:function(response)
                {
                    $('.swal2-confirm').click(function(){
                        location.reload();
                    });
                }
            });
        }


        var eventid;
        function load_delete_events(eid)
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
                eventid = eid;
                final_delete_events();
                swal("Deleted!","Event has been Deleted.","success")
            })
        }

        function final_delete_events()
        {
            $.ajax({
                url: "<?php echo site_url('Controller/delete_events/');?>"+eventid,
                type:"POST",
                success:function(response)
                {
                    $('.swal2-confirm').click(function(){
                        location.reload();
                    });
                }
            });
        }

         var accid;
        function load_delete_acc(aid)
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
                accid = aid;
                final_delete_accs();
                swal("Deleted!","Announcement has been Deleted.","success")
            })
        }

        function final_delete_accs()
        {
            $.ajax({
                url: "<?php echo site_url('Controller/delete_anncounements/');?>"+accid,
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
                    $array['j']='News/Events List';
                    $this->load->view('admin/topheader',$array);
                ?>

                <div class="page-content-wrapper ">
                    <div class="container-fluid">
                <div class="row">
                            <div class="col-sm-9"></div>
                            <div class="col-sm-3">
                                <div class="page-title-box">
                                    <button type="button" name="addnewnews" class="btn btn-success btn-block" onclick="addnewnews()">
                                        <span style="font-size:17px;"><i class='mdi mdi-plus'></i>&nbsp;Add New News</span>
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
                                                    <th>News Title</th>
                                                    <th>News Description</th>
                                                    <th>News Picture</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <?php 
                                                $res=$this->Model->model_select('newstb',array('allowed'=>1));
                                                foreach($res as $value)
                                                {
                                            ?>
                                            <tbody>
                                                        <tr>
                                                            <td><?php echo $value->ntitle; ?></td>
                                                            <td><?php echo $value->ndescription; ?></td>
                                                            <td><img src="<?php echo base_url();?>assets/uploads/news/<?php echo $value->newspic?>" height="75px" width="75px" style="border-radius:20px;"></td>
                                                            <td>
                                                               <a href="javascript:load_delete_news('<?php echo $value->newsid?>')">
                                                               <i class="ion-trash-a"  style="font-size:20px;color:red;"></i> </a>
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

                                    <div class="row">
                            <div class="col-sm-9"></div>
                            <div class="col-sm-3">
                                <div class="page-title-box">
                                     <button type="button" name="addnewevents" class="btn btn-success btn-block" onclick="addnewevents()">
                                        <span style="font-size:17px;"><i class='mdi mdi-plus'></i>&nbsp;Add New Events</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <table id="datatable2" class="table table-bordered text-center table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Events Title</th>
                                                    <th>Events Description</th>
                                                    <th>Events Picture</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <?php 
                                                $res=$this->Model->model_select('eventstb',array('allowed'=>1));
                                                foreach($res as $value)
                                                {
                                            ?>
                                            <tbody>
                                                        <tr>
                                                            <td><?php echo $value->etitle; ?></td>
                                                            <td><?php echo $value->edescription; ?></td>
                                                            <td><img src="<?php echo base_url();?>assets/uploads/events/<?php echo $value->eventpic?>" height="75px" width="75px" style="border-radius:20px;"></td>
                                                            <td>
                                                               <a href="javascript:load_delete_events('<?php echo $value->eventid?>')">
                                                               <i class="ion-trash-a"  style="font-size:20px;color:red;"></i> </a>
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
                

                         <div class="row">
                            <div class="col-sm-9"></div>
                            <div class="col-sm-3">
                                <div class="page-title-box">
                                    <button type="button" name="addnewannoucement" class="btn btn-success btn-block" onclick="addnewannoucement()">
                                        <span style="font-size:17px;"><i class='mdi mdi-plus'></i>&nbsp;Add New Announcement</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <table id="datatable1" class="table table-bordered text-center table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Announcement Title</th>
                                                    <th>Announcement Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <?php 
                                                $res=$this->Model->model_select('announcementstb',array('allowed'=>1));
                                                foreach($res as $value)
                                                {
                                            ?>
                                            <tbody>
                                                        <tr>
                                                            <td><?php echo $value->atitle; ?></td>
                                                            <td><?php echo $value->adescription; ?></td>
                                                            <td>
                                                               <a href="javascript:load_delete_acc('<?php echo $value->Announcementsid?>')">
                                                               <i class="ion-trash-a"  style="font-size:20px;color:red;"></i> </a>
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
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/jszip.min.js"></script>
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
        $(document).ready(function(){$("#datatable1").DataTable();var a=$("#datatable-buttons").DataTable({lengthChange:!1,buttons:["copy","excel","pdf","colvis"]});a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")});
         $(document).ready(function(){$("#datatable2").DataTable();var a=$("#datatable-buttons").DataTable({lengthChange:!1,buttons:["copy","excel","pdf","colvis"]});a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")});

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

        $(function(){
            $('#datatable2').removeClass('table-responsive');
            wlength=$(window).width();
            $( window ).resize(function(){
               wlengthnew=$(window).width();
               seventwidth=wlength*70/100; 
               console.log(seventwidth );
               if(wlengthnew < seventwidth)
               {
                    $('#datatable2').addClass('table-responsive');
               }
               else
               {
                    $('#datatable2').removeClass('table-responsive');
               }
            });
        });

        $(function(){
            $('#datatable1').removeClass('table-responsive');
            wlength=$(window).width();
            $( window ).resize(function(){
               wlengthnew=$(window).width();
               seventwidth=wlength*70/100; 
               console.log(seventwidth );
               if(wlengthnew < seventwidth)
               {
                    $('#datatable1').addClass('table-responsive');
               }
               else
               {
                    $('#datatable1').removeClass('table-responsive');
               }
            });
        });

        function addnewnews()
        {
            window.location.href="load_news";
        }
        function addnewevents()
        {
            window.location.href="load_events";
        }
        function addnewannoucement()
        {
            window.location.href="load_Announcements";
        }
    </script>
</body>

</html>