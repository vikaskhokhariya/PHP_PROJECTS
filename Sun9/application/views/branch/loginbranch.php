<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Login Branch</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesdesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

        <!-- App Icons -->
        <link rel="shortcut icon" href="<?php echo base_url()?>admin/assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?php echo base_url()?>admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>admin/assets/css/style.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript">
            function preventback()
            {
                window.history.forward();
            }
            setTimeout("preventback()",0);
            window.onunload=function(){null};
        </script>
    </head>

    <body>
        
        <form>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mt-0 m-b-15">
                        <a href="index.html" class="logo logo-admin"><img src="<?php echo base_url()?>admin/assets/images/logo.png" height="30" alt="logo"></a>
                    </h3>

                    <h4 class="text-muted text-center font-18"><b>Sign In</b></h4>

                    <div class="p-3">
                        <form class="form-horizontal m-t-20">
                            <div class="alert alert-danger" role="alert" id="loginalert">
                                <strong>Email</strong> or <strong>Password</strong> are Wrong...
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="text" name="email" placeholder="Username" class="form-control" autocomplete="off" id="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="password" type="password" placeholder="Password" id="password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <input type="button" name="login" value="Log In" class="btn btn-primary btn-block" onclick="login_branch();">
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-sm-7 m-t-20">
                                    <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </form>

        <!-- jQuery  -->
        <script src="<?php echo base_url()?>admin/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url()?>admin/assets/js/popper.min.js"></script>
        <script src="<?php echo base_url()?>admin/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>admin/assets/js/modernizr.min.js"></script>
        <script src="<?php echo base_url()?>admin/assets/js/waves.js"></script>
        <script src="<?php echo base_url()?>admin/assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url()?>admin/assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url()?>admin/assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url()?>admin/assets/js/app.js"></script>

        <script type="text/javascript">
            $(function(){
                $('#loginalert').hide();
            });

            function login_branch()
            {
                email=$('#email').val();
                password=$('#password').val();

                formdata={
                    email:email,
                    password:password
                }

                 $.ajax({
                    url : "<?php echo site_url('Controller/loginbranch');?>",
                    data : formdata,
                    type : "POST",
                    dataType : "JSON",
                    success : function(response)
                    {
                        console.log(response);
                        if(response.code==1)
                        {
                            $('#loginalert').show();
                        }
                        else
                        {
                            window.location.href="load_branchdashboard";
                        }
                    }
                });
            }
        </script>
    </body>
</html>