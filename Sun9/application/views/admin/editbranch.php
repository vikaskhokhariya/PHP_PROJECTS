<?php 
    $result=$this->Model->model_select('branchtb',array('bid'=>$i));
?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Edit Branch</title>
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
                    $array['j']='Edit Branch';
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
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Branch Name</label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="bnm" class="form-control" value="<?php echo $result[0]->bname?>" id="branchname" autocomplete="off">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <span id="bnameerror"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-6">
                                                     <textarea class="form-control" rows="5" name="address" id="address" name="address" placeholder="Enter The Address"><?php echo $result[0]->baddress?>
                                                    </textarea>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <span id="baddresserror"></span>
                                                </div>
                                            </div>
                                            <?php 
                                                $res=$this->Model->model_select_state('state');
                                            ?>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">State</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" name="state" id="state" value="">
                                                        <option hidden="" value="">Select</option>
                                                        <?php 
                                                           foreach($res as $q)
                                                           {
                                                        ?>
                                                            <option value="<?php echo $q->StateID?>">
                                                                <?php echo $q->StateName;?>
                                                            </option>
                                                        <?php
                                                           }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <span id="bstateerror"></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">City</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" name="city" id="city" value="">
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <span id="bcityerror"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-2">
                                                    <input type="button" name="edit" value="Edit" id="edit" class="btn btn-info btn-block" onclick="editFinal()"> 
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
        $(function()
        {
            $('#state').val(<?php echo $result[0]->bstate;?>);
            statename='<?php echo $result[0]->bstate; ?>';
            $.ajax({
                    url:"<?php echo site_url('Controller/load_city/')?>"+statename,
                    success : function(response)
                    {
                        document.getElementById('city').innerHTML=response;
                        $('#city').val(<?php echo $result[0]->bcity;?>);
                    } 
                });
        });

        $(function(){
            $('#state').change(function(){
                var stateid=$('#state').val();

                $.ajax({
                    url: "<?php echo site_url('Controller/load_city/');?>"+stateid,
                    success : function(response)
                    {
                        document.getElementById('city').innerHTML=response;
                    } 
                });
            });
        });

        function editFinal()
        {
            $('#bnameerror').hide();
            $('#baddresserror').hide();
            $('#bstateerror').hide();
            $('#bcityerror').hide();
            bname = $('#branchname').val();
            baddress = $('#address').val();
            bstate = $('#state').val();
            bcity = $('#city').val();

            formdata={
                bnm : bname,
                address : baddress,
                state : bstate,
                city : bcity
            }
            bcode='<?php echo $result[0]->branch_code; ?>';
            $.ajax({
                url : "<?php echo site_url('Controller/edit_branch/')?>"+bcode,
                data:formdata,
                dataType:"JSON",
                type:"POST",
                success : function(response)
                {
                    if(response.code===1)
                    {
                        swal({
                        title:"Opps..",
                        text:"<span style='font-size:20px;font-weight:bold;'>Please Correct the Errors...</span>",
                        type:"error"
                        });
                        $('.swal2-confirm').click(function(){
                            $('html,body').animate({
                                scrollTop:$('#top').offset().top-220
                            },2000);
                        });
                    if(response.msg)
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
                            if(d[i].search('Branch Name') > 0)
                            {
                                $('#bnameerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Address') > 0)
                            {
                                $('#baddresserror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('State') > 0)
                            {
                                $('#bstateerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('City') > 0)
                            {
                                $('#bcityerror').html(d[i]).slideDown('3500');
                            }
                        }
                    }
                    else
                    {
                        swal({
                            title:"Good Job",
                            text:"<span style='font-size:20px;font-weight:bold;'>Successfully Updated...</span>",
                            type:"success"
                            });
                            $('.swal2-confirm').click(function(){
                                window.location.href='../load_branchlist';
                            });
                    }
                }
            });
        }
        
        function edit_cancel()
        {
            window.location.href='../load_branchlist';
        }
    </script>
</body>
</html>