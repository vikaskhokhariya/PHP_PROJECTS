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
                businessemail : businessemail,
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