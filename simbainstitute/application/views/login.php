<!DOCTYPE html>
<html lang="en">
  
<head>
    <?php 
        $this->load->view("linktop.php");
    ?>  
</head>

<body class="hold-transition login-page" style="background-color: #252525;">
    <div class="login-box">
        <div class="login-logo">
            <b>Simba</b> Institute
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">
                LogIn
            </p>
            <div id="alert"></div>
            <form class="form-element">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Enter Email Address" id="email">
                    <span class="fa fa-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Enter Password" id="password">
                    <span class="fa fa-key form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-info btn-block margin-top-10" id="login">
                            SIGN IN
                        </button>
                    </div>
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                    <a href="#" class="btn btn-social-icon btn-circle btn-facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="btn btn-social-icon btn-circle btn-google"><i class="fa fa-google-plus"></i></a>
            </div>
        </div>
    </div>

    <?php 
        $this->load->view("linkbottom");
    ?>

    <script type="text/javascript">
        $('#login').click(function(){
            var email=$('#email').val();
            var pass=$('#password').val();

            formdata={
                email : email,
                password : pass
            }

            console.log(formdata);

            $.ajax({
                url:"<?php echo site_url('Simba/login'); ?>",
                data:formdata,
                dataType:"JSON",
                type:"POST",
                success:function(response)
                {
                    console.log(response);
                    if(response.code==0)
                    {
                        $('#alert').html("<div class='alert alert-danger mb-2' role='alert' id='alert'><strong>Opps..</strong>Invalid Email or Password.</div>").slideDown(1000).delay(1500).slideUp(1000);
                        $('#email').val('');
                        $('#password').val('');
                        $('#email').focus();
                    }
                    else
                    {
                        window.location.href='<?php echo base_url();?>Simba';
                    }
                }
            });
        });
    </script>
</body>
</html>
