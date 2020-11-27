<?php
    $res=$this->Model->model_select_messagedata_all();
?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>All Messages</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="<?php echo base_url()?>admin/assets/images/favicon.ico">

    <!-- Sweet Alert -->
    <link href="<?php echo base_url()?>admin/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <!-- Plugins css -->
    <link href="<?php echo base_url()?>admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>admin/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

    <!-- App css -->
    <link href="<?php echo base_url()?>admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>admin/assets/css/style.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
        #loading-image
        {
            position:fixed;
            z-index: 10000;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: transparent;
        }
        #loading-image img
        {
            position: absolute;
            margin: auto;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
    </style>
  
</head>

<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

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
                    $array['j']='Messages';
                    $this->load->view('admin/topheader',$array);
                ?>

                <div class="page-content-wrapper ">
                    <div class="container-fluid">
                        <?php 
                            foreach($res as $value)
                            {
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-5 text-white" style="background-color: #333; border-color: #333;padding: 0px;">
                                    <div class="card-body">
                                        <h3 class="card-title mt-0">
                                            <?php echo $value->name;?>
                                        </h3>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <span>Email :</span>
                                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $value->email;?></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <span>Contact :</span>
                                                        <span>&nbsp;<?php echo $value->mobile;?></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <span>Date :</span>
                                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $value->date;?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            &nbsp;
                                            <div class="col-sm-4">
                                                <textarea class="form-control text-left" rows="2" name="address" id="address" autocomplete="off" style="resize: none;border:solid white 1px;" readonly=""><?php echo $value->message;?></textarea>
                                            </div>
                                            &nbsp;
                                            <div class="col-sm-3 text-center">
                                                <span style="font-size:30px;border:1px solid black;border-radius:50%;background-color:white;padding:5px 10px 5px 10px;"><a href="javascript:openreplymodal(<?php echo $value->id; ?>)"><i class="ion-reply-all"></i></a></span>
                                                <span style="font-size:25px;border:1px solid black;border-radius:50%;background-color:white;padding:7px 14px 7px 14px;"><a href="javascript:delete_message(<?php echo $value->id; ?>)"><i class="ion-trash-a" style="color:red;"></i></a></span>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                       <?php 
                            } 
                        ?>


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

    <!-- Plugins js -->
    <script src="<?php echo base_url()?>admin/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>

    <!-- Plugins Init js -->
    <script src="<?php echo base_url()?>admin/assets/pages/form-advanced.js"></script>

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
            $('#loading-image').hide();
        });

       function openreplymodal(id)
        {
            $.ajax({
                url : "<?php echo site_url("Controller/user_message_details/");?>"+id,
                method : "POST",
                dataType : "JSON",
                success : function(response)
                {
                    console.log(response);
                    $('#nm').val(response[0].name);
                    $('#notiemail').val(response[0].email);
                    $('#mobile').val(response[0].mobile);
                    $('#message').val(response[0].message);
                    $('#messagedate').val(response[0].date);
                    $('#mymessagemodal').modal();
                }
            });
        }

        function sendreply()
        {
            $('#replymessageerror').hide();
            var email=$('#notiemail').val();
            var replymessage=$('#reply').val();
            var name=$('#nm').val();

            var lang = replymessage.length;
            if(replymessage=='')
            {
                $('#replymessageerror').html("Reply Message Required").slideDown(1000);
            }
            else if(lang < 5)
            {
                $('#replymessageerror').html("Reply Message should atleast 5 character Long...").slideDown(1000);
            }
            else
            {
                // alert(email);
                // alert(replymessage);
                formdata = {nm:name,email:email,replymessage:replymessage}
                console.log(formdata);
                $.ajax({
                    url : "<?php echo site_url("Controller/sendmessage"); ?>",
                    method : "POST",
                    data : formdata,
                    dataType : "JSON",
                    beforeSend:function()
                    {
                        $('#loading-image').show();
                    },
                    complete:function()
                    {
                        $('#loading-image').hide();
                    },
                    success : function(response)
                    {
                        console.log(response);
                        if(response.msg=='success')
                        {
                            swal({
                            title:"Good Job",
                            text:"<span style='font-size:20px;font-weight:bold;'>successFully...</span>",
                            type:"success"
                        });

                        $('.swal2-confirm').click(function(){
                            window.location.href="load_allmessages";
                        });
                        }
                    }
                });
            }
        }

        function cancelreplymodal()
        {
            $('#mymessagemodal').modal('hide');
        }

        function final_delete_message(id)
        {
            $.ajax({
                url : "<?php echo site_url("Controller/delete_message/");?>"+id,
                method : "POST",
                success : function(response)
                {
                    console.log(response);
                    $('.swal2-confirm').click(function(){
                        location.reload();
                    });
                }
            });
        }

        function delete_message(id)
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
                final_delete_message(id);
                swal("Deleted!","Message has been Deleted.","success")
            })
        }
   </script>
</body>
<div id="loading-image">
    <img src="<?php echo base_url(); ?>assets/uploads/otherimages/loading-4.gif" height="10%" width="auto" >
</div>
</html>