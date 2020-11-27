<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Add Admin</title>
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
                    $array['j']='Add Admin';
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
                                                    First Name
                                                </label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" placeholder="Enter First Name" id="fnm" name="fnm" autocomplete="off">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="fnmerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                                    Middle Name
                                                </label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" placeholder="Enter Middle Name" id="mnm" name="mnm" autocomplete="off">
                                                </div>
                                               <div class="col-sm-4 text-danger">
                                                    <b><span id="mnmerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                                    Last Name
                                                </label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" placeholder="Enter Last Name" id="lnm" name="lnm" autocomplete="off">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="lnmerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                                    Gender
                                                </label>
                                                <div class="col-sm-6">
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-light active" >
                                                            <input type="radio" name="gender" id="male" checked="" value="male"><i class="mdi mdi-human-male" style="font-size:25px;"></i>
                                                        </label>&nbsp;
                                                        <label class="btn btn-light">
                                                            <input type="radio" name="gender" id="female" value="female"><i class="mdi mdi-human-female" style="font-size:25px;"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="gendererror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">
                                                    Address
                                                </label>
                                                <div class="col-sm-6">
                                                    <textarea class="form-control" rows="5" name="address" placeholder="Enter Resident Address" id="address"></textarea>
                                                </div>
                                                 <div class="col-sm-4 text-danger">
                                                    <b><span id="adderror"></span></b>
                                                </div>
                                            </div>

                                            <?php 
                                                $res=$this->Model->model_select_state('state');
                                            ?>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">State</label>
                                                <div class="col-sm-6">
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
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="stateerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">
                                                    City
                                                </label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" name="city" id="city">
                                                    </select>
                                                </div>
                                               <div class="col-sm-4 text-danger">
                                                    <b><span id="cityerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">BirthDate</label>
                                                <div class="col-sm-6 form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="dob" name="dob" autocomplete="off">
                                                        <div class="input-group-append bg-custom b-0">
                                                            <span class="input-group-text">
                                                                <i class="mdi mdi-calendar"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="doberror"></span></b>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                                    Phone Number
                                                </label>
                                                <div class="col-sm-6 form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-append bg-custom b-0">
                                                            <span class="input-group-text">
                                                                <label style="font-size:15px;padding-top:5px;">
                                                                    +91
                                                                </label>
                                                            </span>
                                                        </div>
                                                        <input class="form-control" type="text" placeholder="Enter Phone Number" id="phno" name="phno" maxlength="10" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="phnoerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">
                                                    Profile
                                                </label>
                                                <div class="col-sm-6">
                                                    <div>
                                                        <input type="file" name="profile" class="form-control" id="profile">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="profileerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                                    Email
                                                </label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" placeholder="Enter Email Address" id="email" name="email" autocomplete="off">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="emailerror"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                                    User Name
                                                </label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" placeholder="Enter User Name" id="user" name="user" autocomplete="off">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="unmerror"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Password
                                                </label>
                                                 <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <input class="form-control" type="password" placeholder="Enter Password" id="password" name="password" autocomplete="off">
                                                        <div class="input-group-append bg-custom b-0">
                                                            <span class="input-group-text">
                                                                <i class="mdi mdi-eye" id="showhide" style="cursor:pointer;"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="passerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-2">
                                                   <button type="button" name="csubmit" value="csubmit" class="btn btn-info btn-block" id="submit" onclick="add_admin()">Submit</button>
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
        var ppic='';
       
        $(function(){
            $("#dob").datepicker({autoclose:!0,todayHighlight:!0,format:'dd/mm/yyyy',endDate:'+0d'});

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

            $('#profile').change(function(){
                ppic = $('#profile')[0].files[0];
            });
        });

        $('#showhide').hover(function()
        {
            $('#password').attr('type','text');
            $(this).removeClass('mdi mdi-eye').addClass('mdi mdi-eye-off');
        },
        function()
        {
            $('#password').attr('type', 'password');
            $(this).removeClass('mdi mdi-eye-off').addClass('mdi mdi-eye');
        });

        function add_admin()
        {
            $('#fnmerror').hide();
            $('#mnmerror').hide();
            $('#lnmerror').hide();
            $('#adderror').hide();
            $('#doberror').hide();
            $('#phnoerror').hide();
            $('#unmerror').hide();
            $('#passerror').hide();
            $('#stateerror').hide();
            $('#cityerror').hide();
            $('#emailerror').hide();
            $('#profileerror').hide();

            fnm=$('#fnm').val();
            mnm=$('#mnm').val();
            lnm=$('#lnm').val();
            gender=$("input[name='gender']:checked").val();
            address=$('#address').val();
            state=$('#state').val();
            city=$('#city').val();
            dob=$('#dob').val();
            phno=$('#phno').val();
            email=$('#email').val();
            user=$('#user').val();
            password=$('#password').val();

            fd = new FormData();

            if(document.getElementById("profile").files.length != 0)
            {
                fd.append('profile', ppic);
            }
            else
            {
                fd.append('profile','');
            }

            fd.append('fnm', fnm);
            fd.append('mnm', mnm);
            fd.append('lnm', lnm);
            fd.append('gender', gender);
            fd.append('address', address);
            fd.append('state', state);
            fd.append('city', city);
            fd.append('dob', dob);
            fd.append('phno', phno);
            fd.append('email', email);
            fd.append('user', user);
            fd.append('pass', password);
            
            $.ajax({
                url : "<?php echo site_url('Controller/add_admin');?>",
                data: fd,
                dataType : "JSON",
                type: "POST",
                processData:false,
                contentType:false,
                
                success : function(response)
                {
                    console.log(response);
                    if(response.code==1)
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
                            if(d[i].search('First Name') > 0)
                            {
                                $('#fnmerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Profile') > 0)
                            {
                                $('#profileerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Middle Name') > 0)
                            {
                                $('#mnmerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Last Name') > 0)
                            {
                                $('#lnmerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Address') > 0)
                            {
                                $('#adderror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Date Of Birth') > 0)
                            {
                                $('#doberror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Phone Number') > 0)
                            {
                                $('#phnoerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Email field') > 0)
                            {
                                $('#emailerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('User Name') > 0)
                            {
                                $('#unmerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Password') > 0)
                            {
                                $('#passerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('State') > 0)
                            {
                                $('#stateerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('City') > 0)
                            {
                                $('#cityerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Gender') > 0)
                            {
                                $('#gendererror').html(d[i]).slideDown('3500');
                            }
                        }                           
                    }
                    else
                    {
                        swal({
                                title:"Good Job",
                                text:"<span style='font-size:20px;font-weight:bold;'>Successfully Inserted...</span>",
                                type:"success"
                            });
                            $('.swal2-confirm').click(function(){
                                window.location.href='load_adminlist';
                            });
                    }
                }
            });
        }

        function edit_cancel()
        {
            window.location.href="load_adminlist";
        }
    </script>
</body>
</html>