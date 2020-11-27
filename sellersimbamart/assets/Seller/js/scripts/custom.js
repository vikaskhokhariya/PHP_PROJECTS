$('#sellerlogin').click(function(){
    var email=$('#email').val();
    var pass=$('#password').val();

    formdata={
        email : email,
        password : pass
    }

    console.log(formdata);
    $.ajax({
        url : "Seller/login",
        data: formdata,
        dataType : "JSON",
        type: "POST",
        success : function(response)
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
                window.location.href='';
            }
        }
    });
});








