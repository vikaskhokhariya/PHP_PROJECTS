<?php 
    $res=$this->Model->model_select('generalsettings');
    // print_r($res);
    // exit();
?>
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>General Settings</title>
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
                    $array['j']='General Settings';
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
                                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                                    Site Title
                                                </label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" id="sitetitle" name="bnm" autocomplete="off" value="<?php echo $res[0]->sitetitle; ?>">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="sitetitleerror"></span></b>
                                                </div>
                                            </div>

                                            <!-- <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">
                                                    Site Address
                                                </label>
                                                <div class="col-sm-6" name="city">
                                                    <input class="form-control" type="text" id="siteaddress" autocomplete="off">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="siteaddresserror"></span></b>
                                                </div>
                                            </div> -->

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">
                                                    Email Address
                                                </label>
                                                <div class="col-sm-6" name="city">
                                                    <input class="form-control" type="text" id="emailaddress" autocomplete="off" value="<?php echo $res[0]->email; ?>">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="emailaddresserror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Facebook Link</label>
                                                <div class="col-6">
                                                    <input type="text" name="email" class="form-control" autocomplete="off" id="facebooklink" value="<?php echo $res[0]->facebook; ?>">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="facebooklinkerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Instagram Link</label>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" id="instagramlink" value="<?php echo $res[0]->instagram; ?>">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="instagramlinkerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Twitter Link</label>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" id="twitterink" value="<?php echo $res[0]->twitter; ?>">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="twitterlinkerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Phone Number</label>
                                                <div class="col-sm-6 form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-append bg-custom b-0"><span class="input-group-text"><label style="font-size:15px;padding-top:5px;">+91</label></span></div>
                                                        <input type="text" class="form-control" id="mno" name="mno" autocomplete="off" maxlength="10" value="<?php echo $res[0]->phno; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="phnoerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Phone Number(Alt)</label>
                                                <div class="col-sm-6 form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-append bg-custom b-0"><span class="input-group-text"><label style="font-size:15px;padding-top:5px;">+91</label></span></div>
                                                        <input type="text" class="form-control" id="altmno" name="altmno" autocomplete="off" maxlength="10" value="<?php echo $res[0]->altphno; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="altphnoerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Logo</label>
                                                <div class="col-sm-2">
                                                    <img src="<?php echo base_url()?>assets/uploads/logo/<?php echo $res[0]->logo; ?> ?>" height="150px" width="150px" id="residentproof" style="border-radius:20px;">
                                                </div>
                                                <div class="col-sm-2">
                                                    <div>
                                                        <input type="file" id="logo" name="profile" class="form-control" style="display:none;">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-2" id="logodiv">
                                                    <div class="button-8">
                                                        <div class="eff-8"></div>
                                                        <a href="#">
                                                            <i class="typcn typcn-upload-outline" style="font-size:20px;padding-right:10px;"></i>
                                                            Upload
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">GMAP Location</label>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" id="gmaplocation" value="<?php echo $res[0]->gmap; ?>">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="gmaperror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Address : </label>
                                                <div class="col-6">
                                                    <textarea id="address" autocomplete="off" class="form-control"><?php echo $res[0]->address; ?></textarea>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="addresserror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Footer Line</label>
                                                <div class="col-6">
                                                    <input class="form-control" type="text" id="footerline" value="<?php echo $res[0]->footerline; ?>">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="footerlineerror"></span></b>
                                                </div>
                                            </div>

                                            <!-- <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-6">
                                                    <input class="form-control" type="password" id="">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id=""></span></b>
                                                </div>
                                            </div> -->

                                            <div class="form-group row">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-2">
                                                    <input type="button" value="Edit" class="btn btn-info btn-block" onclick="edit_settings()"> 
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
        var logo='';

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

            $('#logodiv').click(function(){
                $('#logo').click();
            });

            $('#logo').change(function(){
                logo = $('#logo')[0].files[0];
                previewlogo();
            });
        });

        function previewlogo()
        {
            var preview = document.querySelectorAll('img')[5];
            var file    = document.querySelectorAll('input[type=file]')[0].files[0];

            var reader  = new FileReader();

            reader.addEventListener("load", function () {
                preview.src = reader.result;
            }, false);

            if(file){
                reader.readAsDataURL(file);
            }   
        }

        function edit_cancel()
        {
            window.location.href='load_admindashboard';
        }

        function edit_settings()
        {
            $('#sitetitleerror').hide();
            $('#emailaddresserror').hide();
            $('#facebooklinkerror').hide();
            $('#instagramlinkerror').hide();
            $('#twitterlinkerror').hide();
            $('#phnoerror').hide();
            $('#altphnoerror').hide();
            $('#gmaperror').hide();
            $('#addresserror').hide();
            $('#footerlineerror').hide();

            title=$('#sitetitle').val();
            email=$('#emailaddress').val();
            facebook=$('#facebooklink').val();
            instagram=$('#instagramlink').val();
            twitter=$('#twitterink').val();
            phno=$('#mno').val();
            altphno=$('#altmno').val();
            gmap=$('#gmaplocation').val();
            address=$('#address').val();
            footerline=$('#footerline').val();

            fd = new FormData();

            fd.append('sitetitle',title);
            fd.append('email', email);
            fd.append('facebook',facebook);
            fd.append('instagram',instagram);
            fd.append('twitter',twitter);
            fd.append('phno',phno);
            fd.append('altphno',altphno);
            fd.append('gmap',gmap);
            fd.append('address',address);
            fd.append('footerline',footerline);

            if(document.getElementById("logo").files.length != 0)
            {
                fd.append('logo', logo);
            }
            else
            {
                fd.append('logo','');
            }

            console.log(title,email,facebook,instagram,twitter,phno,gmap);

            $.ajax({
                url : "<?php echo site_url('Controller/edit_general_settings'); ?>",
                data: fd,
                dataType : "JSON",
                type: "POST",
                processData:false,
                contentType:false,
                success : function(response)
                {
                    console.log(response);
                    if(response.code===0)
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
                            if(d[i].search('Site Title') > 0)
                            {
                                $('#sitetitleerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Email field') > 0)
                            {
                                $('#emailaddresserror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Facebook Link') > 0)
                            {
                                $('#facebooklinkerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Instagram Link') > 0)
                            {
                                $('#instagramlinkerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('twitter Link') > 0)
                            {
                                $('#twitterlinkerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Phone Number field is required') > 0)
                            {
                                $('#phnoerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('The Alternative phone Number field is required.') > 0)
                            {
                                $('#altphnoerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('GMAP Location') > 0)
                            {
                                $('#gmaperror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Address') > 0)
                            {
                                $('#addresserror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Footer Line') > 0)
                            {
                                $('#footerlineerror').html(d[i]).slideDown('3500');
                            }
                        }
                    }
                    else if(response.code===1)
                    {
                        swal({
                            title:"Good Job",
                            text:"<span style='font-size:20px;font-weight:bold;'>Successfully Updated...</span>",
                            type:"success",
                            allowOutsideClick: false
                        });
                        $('.swal2-confirm').click(function(){
                            alert("yes");
                            window.location.href="load_generalsettings";
                        });
                    }
                }
            });
        }
    </script>
</body>

</html>