<!DOCTYPE html>
<html>
<head>
    <?php 
        include('linktop.php');
    ?>
</head>

<body>
    <div class="preloader"></div>
    <header class="header header-light">
        <?php 
            $linkactive['pagename']="";
            $this->load->view('Client/header',$linkactive);
        ?>
    </header>
    <div class="wrapper">
        <div class="content" style="background-image: url('<?php echo base_url(); ?>Upload/Client/extra/sellonsimbamart.jpg'); background-repeat: no-repeat;background-size: 100%;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8 col-lg-offset-4 col-md-offset-3 col-sm-offset-2 pull-right">
                        <h2>Register Your Business</h2>
                        <hr class="hr-sm hr-stroke"/>
                        <form>
                            <div class="form-group">
                               <label for="username"><span class="formlbl">Your Name</span></label>
                               <span><input type="text" id="username" autocomplete="off" autofocus="" placeholder="Your Name"></span>
                               <span id="usernameerror" class="error"></span>
                            </div>
                            <div class="form-group">
                                <label for="businessname"><span class="formlbl">Business Name</span></label>
                                <input type="email" id="businessname" autocomplete="off" placeholder="Your Business Name">
                                <span id="businessnameerror" class="error"></span>
                            </div>
                            <div class="form-group">
                                <label for="businessemail"><span class="formlbl">Email Address</span></label>
                                <input type="text" id="businessemail" autocomplete="off" placeholder="Your business Email">
                                <span id="businessemailerror" class="error"></span>
                            </div>
                            <div class="form-group">
                                <label for="mobileno"><span class="formlbl">Mobile No</span></label>
                                <input type="text" id="mobileno" autocomplete="off" placeholder="Your Mobile Number">
                                <span id="mobilenoerror" class="error"></span>
                            </div>
                            <div class="form-group">
                                <label for="password"><span class="formlbl">Password</span></label>
                                <input type="password" id="psw" autocomplete="off" placeholder="Create Your Password">
                                <span id="passworderror" class="error"></span>
                            </div>
                            <hr class="hr-sm hr-stroke"/>
                            <div class="form-group">
                                <input type="button" class="btn btn-primary" value="Register Now" id="registeryourbusinessbutton">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal map-modal" id="map-modal">
        <a href="#" class="map-close" data-dismiss="modal"><i class="fa fa-close"></i></a>
        <div class="google-map-popup"></div>
    </div>

    <?php 
        $this->load->view('Client/footer'); 
        include('linkbottom.php');
    ?>

    <script type="text/javascript">
        $('#registeryourbusinessbutton').click(function(){
            $('#usernameerror').hide('fast');
            $('#businessnameerror').hide('fast');
            $('#businessemailerror').hide('fast');
            $('#mobilenoerror').hide('fast');
            $('#passworderror').hide('fast');

            var username = $('#username').val();
            var businessname = $('#businessname').val();
            var businessemail = $('#businessemail').val();
            var mobileno = $('#mobileno').val();
            var password = $('#psw').val();

            formdata = {
                username : username,
                businessname : businessname,
                email : businessemail,
                mobileno : mobileno,
                password : password
            }

            console.log(formdata);

            $.ajax({
                url : '<?php echo site_url('User_cnt/seller_registration'); ?>',
                data : formdata,
                dataType : "JSON",
                type : "POST",
                success : function(response)
                {
                    console.log(response);
                    if(response.code===0)
                    {
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
                            if(d[i].search('User Name') > 0)
                            {
                                $('#usernameerror').html(d[i]).slideDown('slow').delay(1500).slideUp(1000);
                            }
                            if(d[i].search('Business Name') > 0)
                            {
                                $('#businessnameerror').html(d[i]).slideDown('slow').delay(1500).slideUp(1000);
                            }
                            if(d[i].search('Business Email') > 0)
                            {
                                $('#businessemailerror').html(d[i]).slideDown('slow').delay(1500).slideUp(1000);
                            }
                            if(d[i].search('Mobile Number') > 0)
                            {
                                $('#mobilenoerror').html(d[i]).slideDown('slow').delay(1500).slideUp(1000);
                            }
                            if(d[i].search('Password') > 0)
                            {
                                $('#passworderror').html(d[i]).slideDown('slow').delay(1500).slideUp(1000);
                            }
                        }    
                    }
                    else
                    {
                        swal({
                            title:"Good Job",
                            text:"SuccessFully Registered at SimbaMart",
                            type:"success",
                            allowOutsideClick: false,
                            animation: false,
                            customClass: 'animated tada'
                        });
                        $('.swal2-confirm').click(function(){
                            window.location.href='<?php echo base_url();?>';
                        });
                    }
                }
            });
        });
    </script>
</body>
</html>