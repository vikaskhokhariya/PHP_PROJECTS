$('#changepassword').click(function(){
	$('#errorextpassword').hide('fast');
	$('#errornewpassword').hide('fast');
	$('#errorreenterpassword').hide('fast');

	var extpassword = $('#extpassword').val();
	var newpassword = $('#newpassword').val();
	var reenterpassword = $('#reenterpassword').val();

	if(extpassword=='')
    {
        $('#errorextpassword').html("Enter Old Password").slideDown('slow');
    }
    if(newpassword=='')
    {
        $('#errornewpassword').html("Enter New Password").slideDown('slow');
    }
    if(reenterpassword=='')
    {
        $('#errorreenterpassword').html("Enter Confirm Password").slideDown('slow');
    }

    if(extpassword!='' && newpassword!='' && reenterpassword!='')
    {
            $.ajax({
            url : "check_old_password/"+extpassword,
            type : "POST",
            dataType : "JSON",
            success : function(response)
            {
                console.log(response);

                if(response.code==1)
                {
                    var lang = newpassword.length;
                    if(lang < 6 || lang > 25)
                    {
                        $('#errornewpassword').html("Password Must Between 6 to 25 Character length").slideDown(1000);
                    }
                    else
                    {
                        if(newpassword == reenterpassword)
                        {
                        	formdata = {
                        		newpassword : newpassword
                        	}
                            $.ajax({
                                url : "change_password",
                                type : "POST",
                                data : formdata,
                                success : function(response)
                                {
                                    swal({
                                        title:"Good Job",
                                        text:"Password has been Changed",
                                        type:"success",
                                        allowOutsideClick: false
                                    });
                                    $('.swal2-confirm').click(function(){
                                        window.location.href='changepassword';
                                    });
                                }
                            });
                        }
                        else
                        {
                            $('#errorreenterpassword').html("Password Not Match").slideDown(1000);
                        }
                    }
                }
                else
                {
                    $('#errorextpassword').html("Old Password Does Not Match").slideDown(1000);
                }
            }
        });
    }
});