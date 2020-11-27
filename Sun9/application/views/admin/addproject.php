<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Add Project</title>
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
        .button-8
        {
            width:140px;
            height:50px;
            border:2px solid #34495e;
            float:left;
            text-align:center;
            cursor:pointer;
            position:relative;
            box-sizing:border-box;
            overflow:hidden;
            margin:0 0 0px 0px;
            border-radius:10px;
        }
        .button-8 a
        {
            font-family:arial;
            font-size:16px;
            color:#fff;
            text-decoration:none;
            line-height:50px;
            transition:all .5s ease;
            z-index:2;
            position:relative;
        }
        .eff-8
        {
            width:140px;
            height:50px;
            border:70px solid #34495e;
            position:absolute;
            transition:all .5s ease;
            z-index:1;
            box-sizing:border-box;
        }
        .button-8:hover .eff-8
        {
            border:0px solid #34495e;
        }
        .button-8:hover a
        {
            color:#34495e;
        }
    </style>
</head>

<body class="fixed-left" id="top">

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
                    $array['j']='Add Project';
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
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">Project Title</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="projecttitle" class="form-control"><br>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Project Type</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="ptype" id="ptype">
                                                        <option hidden="" value="">Select</option>
                                                        <option value="outgoing">Outgoing Project</option>
                                                        <option value="upcoming">Upcoming Project</option>
                                                        <option value="completed">Completed Project</option>
                                                        <option value="slider">Slider</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <?php 
                                                $res=$this->Model->model_select_state('state');
                                            ?>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">State</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="state" id="state">
                                                        <option hidden="" value="">Select</option>
                                                            <?php 
                                                               foreach($res as $q)
                                                               {
                                                            ?>
                                                                <option value="<?php echo $q->StateID?>"><?php echo $q->StateName;?></option>
                                                            <?php
                                                               }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">
                                                    City
                                                </label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="city">
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">
                                                    Price
                                                </label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="price">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">
                                                    Description
                                                </label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" rows="5" placeholder="Enter Description" id="description"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Project Pic</label>
                                                <div class="col-sm-2">
                                                    <img src="<?php echo base_url();?>assets/uploads/news/noimg.png" height="150px" width="150px" id="projectpic" style="border-radius:20px;">
                                                </div>
                                                <div class="col-sm-2">
                                                    <div>
                                                        <input type="file" id="projectfile" class="form-control" style="display:none;">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-2" id="projectdiv">
                                                    <div class="button-8">
                                                        <div class="eff-8"></div>
                                                        <a><i class="typcn typcn-upload-outline" style="font-size:20px;padding-right:10px;"></i>Upload </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-2">
                                                   <button type="button" name="csubmit" value="csubmit" class="btn btn-info btn-block" id="submit" onclick="addproject()">Submit</button>
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
        var total_images;
        var ppic='';

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

            $('#projectdiv').click(function(){
                $('#projectfile').click();
            });

            $('#projectfile').change(function(){
                ppic = $('#projectfile')[0].files[0];
                previewimage();
            });
        });

        function previewimage()
        {
            total_images = $("body img").length;
            var preview = document.querySelectorAll('img')[total_images-1];
            var file    = ($("#projectfile"))[0].files[0];
            var reader  = new FileReader();
            reader.addEventListener("load", function ()
            {
                preview.src = reader.result;
            }, false);

            if(file){
                reader.readAsDataURL(file);
            }   
        }

        function addproject()
        {
            var status=1;
            ptitle = $('#projecttitle').val();
            ptype = $('#ptype').val();
            state = $('#state').val();
            city = $('#city').val();
            price = $('#price').val();
            description = $('#description').val();

            var fd=new FormData();

            fd.append('title',ptitle);
            fd.append('type',ptype);
            fd.append('state',state);
            fd.append('city',city);
            fd.append('price',price);
            fd.append('description',description);

            if(document.getElementById("projectfile").files.length != 0)
            {
                fd.append('projectpic',ppic);
            }
            else
            {   
                fd.append('projectpic','');
            }

            if(document.getElementById("projectfile").files.length == 0)
            {
                status=0;
            }
            else
            {
                status=1;
            }

            if(ptitle == '' || ptype == '' || state == '' || city == '' || price == '' || description =='' || status == 0)
            {
                swal({
                    title:"Opps..",
                    text:"<span style='font-size:20px;font-weight:bold;'>Please Enter Detail First...</span>",
                    type:"error"
                });
            }
            else
            {
                $.ajax({
                    url : "<?php echo site_url('Controller/addproject') ?>",
                    data : fd,
                    dataType : "JSON",
                    method : "POST",
                    processData:false,
                    contentType:false,
                    success : function(response)
                    {
                        console.log(response);
                        if(response.ans == 1)
                        {
                            swal({
                            title:"Good Job",
                            text:"<span style='font-size:20px;font-weight:bold;'>Successfully Inserted...</span>",
                            type:"success"
                            });

                            $('.swal2-confirm').click(function(){
                                window.location.href='load_projectlist';
                            });
                        }
                    }
                });
            }
        }
    </script>
</body>
</html>