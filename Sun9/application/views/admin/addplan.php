<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Add Plan</title>
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
            z-index: 100000;
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

<body class="fixed-left" id="top">

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
                    $array['j']='Add Plan';
                    $this->load->view('admin/topheader',$array);
                ?>

                <div class="page-content-wrapper ">
                    <div class="container-fluid">

                        <!-- form -->
                        <form>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Plan Name</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" placeholder="Enter Plan Name" id="pnm" name="pnm" autocomplete="off" value="<?php echo set_value('pnm')?>">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="pnameerror"></span></b>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Plan Month</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" placeholder="Enter Plan Month" autocomplete="off" id="pmon" name="pmon" value="<?php echo set_value('pmon')?>">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="pmontherror"></span></b>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Plan Interest</label>
                                                <div class="col-sm-5">
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" placeholder="Enter Plan Interest" autocomplete="off" id="inm" name="inm" value="<?php echo set_value('inm')?>">
                                                        <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="mdi mdi-percent"></i></span></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="pinteresterror"></span></b>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Price Per Square feet</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" placeholder="Enter Square Feet Price" id="srate" autocomplete="off" name="srate" value="<?php echo set_value('srate')?>">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="ppriceerror"></span></b>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Plan Validity</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" placeholder="Enter Plan Validity" autocomplete="off" id="vnm" name="vnm" value="<?php echo set_value('vnm')?>">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="pvalidityerror"></span></b>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-2">
                                                    <input type="button" name="submit" value="Submit" class="btn btn-info btn-block" onclick="add_palnajax()"> 
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="button" name="cancel" value="Cancel" class="btn btn-info btn-block" onclick="edit_cancel()">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </form>
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
            $('#loading-image').hide();
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
        function add_palnajax()
        {
            $('#pnameerror').hide();
            $('#pmontherror').hide();
            $('#pinteresterror').hide();
            $('#ppriceerror').hide();
            $('#pvalidityerror').hide();

            var pnm=$('#pnm').val();
            var pmon=$('#pmon').val();
            var inm=$('#inm').val();
            var srate=$('#srate').val();
            var vnm=$('#vnm').val();

            formdata={
                pnm:pnm,
                pmon:pmon,
                inm:inm,
                srate:srate,
                vnm:vnm
            }
            
            $.ajax({
                url : "<?php echo site_url('Controller/add_plan'); ?>",
                data: formdata,
                dataType : "JSON",
                type: "POST",
                /*beforeSend:function()
                {
                    $('#loading-image').show();
                },
                complete:function()
                {
                    $('#loading-image').hide();
                },*/
                success : function(response)
                {
                    console.log(response);
                    if(response.code===1)
                    {
                        swal({
                            title:"Opps..",
                            text:"<span style='font-size:20px;font-weight:bold;'>Please Correct the Errors...</span>",
                            type:"error",
                            allowOutsideClick: false
                        });
                        $('.swal2-confirm').click(function(){
                            $('html,body').animate({
                                scrollTop:$('#top').offset().top-220
                            },2000);
                        });

                        if(response.msg.search('\n') > 0)
                        {
                            d=response.msg.split("\n");
                        }
                        else
                        {
                            d=response.msg;
                        }

                        for(var i=0;i<d.length;i++)
                        {
                            if(d[i].search('Plan Name') > 0)
                            {
                                $('#pnameerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Plan Month') > 0)
                            {
                                $('#pmontherror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Plan Interest') > 0)
                            {
                                $('#pinteresterror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Price Per Square feet') > 0)
                            {
                                $('#ppriceerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Plan Validity') > 0)
                            {
                                $('#pvalidityerror').html(d[i]).slideDown('3500');
                            }
                        }
                    }
                    else
                    {
                        swal({
                            title:"Good Job",
                            text:"<span style='font-size:20px;font-weight:bold;'>SuccessFully Inserted...</span>",
                            type:"success",
                            allowOutsideClick: false
                        });
                        $('.swal2-confirm').click(function(){
                            window.location.href='load_planlist';
                        });
                    }
                }
            });
        }

        function edit_cancel()
        {
            window.location.href='load_planlist';
        }
    </script>
</body>
<div id="loading-image">
    <img src="<?php echo base_url(); ?>assets/uploads/otherimages/loading-4.gif" height="10%" width="auto" >
</div>
</html>