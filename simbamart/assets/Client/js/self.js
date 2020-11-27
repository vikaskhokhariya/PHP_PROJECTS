// $('#registeryourbusinessbutton').click(function(){
//     var username = $('#username').val();
//     var businessname = $('#businessname').val();
//     var businessemail = $('#businessemail').val();
//     var mobileno = $('#mobileno').val();
//     var password = $('#psw').val();

//     formdata = {
//         username : username,
//         businessname : businessname,
//         businessemail : businessemail,
//         mobileno : mobileno,
//         password : password
//     }

//     console.log(formdata);

//     $.ajax({
//         url : "<?php echo base_url(); ?>User_cnt/seller_registration; ?>",
//         data : formdata,
//         dataType : "JSON",
//         type : "POST",
//         success : function(response)
//         {
//             console.log(response);
//         }
//     });
// });