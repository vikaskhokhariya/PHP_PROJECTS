/*Global Variables*/
	var contactprofilepic="";
	var businessprofilepic="";
/*/Global Variables*/

/*Contact Profile Setting*/
	function readURLcontact(input)
    {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();
            reader.onload = function(e)
            {
                $('#pimg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#profileimage').change(function()
    {
        picsize=document.getElementById('profileimage').files[0];

        if(picsize.size > 2000000)
        {
            swal({
                title:"Opps..",
                text:"Size Should Be less than 2.5MB",
                type:"error",
                allowOutsideClick: false
            });   
        }
        else
        {
            contactprofilepic=$('#profileimage')[0].files[0];
            readURLcontact(this);
        }
    });

    $('#profilepicchange').click(function()
    {
        $('#profileimage').click();
    });

    $('#cancelcontactprofile').click(function()
    {
        window.location.href="contactprofile";
    });

	$('#contactprofilesubmit').click(function()
	{
		$('#errorsellername').hide('fast');
		$('#errorpemail').hide('fast');
		$('#erroraemail').hide('fast');
		$('#errorpmobile').hide('fast');
		$('#erroramobile').hide('fast');
		$('#errorzipcode').hide('fast');
		$('#errorcity').hide('fast');

	    var sellername = $('#sellername').val();
	    var primaryemail = $('#primaryemail').val();
	    var alternativeemail = $('#alternativeemail').val();
	    var primarycontact = $('#primarycontact').val();
	    var alternativecontact = $('#alternativecontact').val();
	    var address = $('#address').val();
	    var zipcode = $('#zipcode').val();
	    var city = $('#city').val();
	    var state = $('#state').val();

	    var f = new FormData();
	    f.append('sellername',sellername);
	    f.append('primaryemail',primaryemail);
	    f.append('alternativeemail',alternativeemail);
	    f.append('primarycontact',primarycontact);
	    f.append('alternativecontact',alternativecontact);
	    f.append('address',address);
	    f.append('zipcode',zipcode);
	    f.append('city',city);
	    f.append('state',state);
	    f.append('profilepic',contactprofilepic);

	    for(var i of f.values())
	    {
	        console.log(i);
	    }

	    $.ajax({
	        url : "contact_details",
	        data: f,
	        dataType : "JSON",
	        type: "POST",
	        processData: false,
	        contentType: false,
	        success : function(response)
	        {
	            console.log(response);
	            if(response.code==0)
	            {
	                swal({
	                    title:"Opps..",
	                    text:"Please fill Correct Details",
	                    type:"error",
	                    allowOutsideClick: false,
	                    animation: false,
	                    customClass: 'animated tada'
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
	                    if(d[i].search('Seller Name') > 0)
	                    {
	                        $('#errorsellername').html(d[i]).slideDown('slow');
	                    }
	                    if(d[i].search('Primary Email') > 0)
	                    {
	                        $('#errorpemail').html(d[i]).slideDown('slow');
	                    }
	                    if(d[i].search('Alternative Email')>0)
	                    {
	                        $('#erroraemail').html(d[i]).slideDown('slow');
	                    }
	                    if(d[i].search('Primary Contact') > 0)
	                    {
	                        $('#errorpmobile').html(d[i]).slideDown('slow');
	                    }
	                    if(d[i].search('Alternative Contact') > 0)
	                    {
	                        $('#erroramobile').html(d[i]).slideDown('slow');
	                    }
	                    if(d[i].search('Zip Code') > 0)
	                    {
	                        $('#errorzipcode').html(d[i]).slideDown('slow');
	                    }
	                    if(d[i].search('City') > 0)
	                    {
	                        $('#errorcity').html(d[i]).slideDown('slow');
	                    }
	                }    
	            }
	            else
	            {
	                swal({
	                    title:"Good Job",
	                    text:"SuccessFully Updated Profile",
	                    type:"success",
	                    allowOutsideClick: false,
	                    animation: false,
	                    customClass: 'animated tada'
	                });
	                $('.swal2-confirm').click(function(){
	                    window.location.href='contactprofile';
	                });
	            }
	        }
	    });
	});

	$('#profilepicremove').click(function()
	{
		var sellerid=$('#sessionid').val();
	    var txt;
	    var r = confirm("Are You sure to remove profilepic");
	    if (r == true)
	    {
	        $.ajax({
		        url : "removecontactprofilepic/"+sellerid,
		        dataType : "JSON",
		        type: "POST",
		        success : function(response)
		        {
		            console.log(response);
		            if(response.code==1)
		            {
		                window.location.href='load_contactprofile';
		            }
		        }
		    });
	    }
	});
/*Contact Profile Setting*/








/*Business Profile Setting*/
	function readURL(input)
	{
	    if (input.files && input.files[0])
	    {
	        var reader = new FileReader();
	        reader.onload = function(e)
	        {
	            $('#pimg').attr('src', e.target.result);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$('#profilelogo').change(function()
	{
	    picsize=document.getElementById('profilelogo').files[0];

	    if(picsize.size > 2000000)
	    {
	        swal({
	            title:"Opps..",
	            text:"Size Should Be less than 2.5MB",
	            type:"error",
	            allowOutsideClick: false
	        });   
	    }
	    else
	    {
	        businessprofilepic=$('#profilelogo')[0].files[0];
	        readURL(this);
	    }
	});

	$('#businesspicchange').click(function()
	{
	    $('#profilelogo').click();
	});

	$('#cancelbusinessprofile').click(function()
    {
        window.location.href="businessprofile";
    });

	$('#businessprofilesubmit').click(function()
	{
		$('#errorbusinessname').hide('fast');
		$('#errorpemail').hide('fast');
		$('#erroraemail').hide('fast');
		$('#erroryearofest').hide('fast');

	    var companyname = $('#companyname').val();
	    var primaryemail = $('#primaryemail').val();
	    var alternativeemail = $('#alternativeemail').val();
	    var businesstype = $('#businesstype').val();
	    var ownershiptype = $('#ownershiptype').val();
	    var noofemployee = $('#noofemployee').val();
	    var yearofest = $('#yearofesta').val();
	    var website = $('#businesswebsite').val();

	    var f = new FormData();
	    f.append('companyname',companyname);
	    f.append('primaryemail',primaryemail);
	    f.append('alternativeemail',alternativeemail);
	    f.append('businesstype',businesstype);
	    f.append('ownershiptype',ownershiptype);
	    f.append('noofemployee',noofemployee);
	    f.append('yearofest',yearofest);
	    f.append('website',website);
	    f.append('businesslogo',businessprofilepic);

	    for(var i of f.values())
	    {
	        console.log(i);
	    }

	    $.ajax({
	        url : "business_details",
	        data: f,
	        dataType : "JSON",
	        type: "POST",
	        processData: false,
	        contentType: false,
	        success : function(response)
	        {
	            console.log(response);
	            if(response.code==0)
	            {
	                swal({
	                    title:"Opps..",
	                    text:"Please fill Correct Details",
	                    type:"error",
	                    allowOutsideClick: false,
	                    animation: false,
	                    customClass: 'animated tada'
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
	                    if(d[i].search('Company Name') > 0)
	                    {
	                        $('#errorbusinessname').html(d[i]).slideDown('slow');
	                    }
	                    if(d[i].search('Primary Email') > 0)
	                    {
	                        $('#errorpemail').html(d[i]).slideDown('slow');
	                    }
	                    if(d[i].search('Alternative Email') > 0)
	                    {
	                        $('#erroraemail').html(d[i]).slideDown('slow');
	                    }
	                    if(d[i].search('Establishment Year') > 0)
	                    {
	                        $('#erroryearofest').html(d[i]).slideDown('slow');
	                    }
	                }    
	            }
	            else
	            {
	                swal({
	                    title:"Good Job",
	                    text:"SuccessFully Updated Business Profile",
	                    type:"success",
	                    allowOutsideClick: false,
	                    animation: false,
	                    customClass: 'animated tada'
	                });
	                $('.swal2-confirm').click(function(){
	                    window.location.href='businessprofile';
	                });
	            }
	        }
	    });
	});

	$('#businesslogoremove').click(function()
	{
		var sellerid=$('#sessionid').val();
	    var txt;
	    var r = confirm("Are You sure to remove profilepic");
	    if (r == true)
	    {
	        $.ajax({
		        url : "removebusinesslogo/"+sellerid,
		        dataType : "JSON",
		        type: "POST",
		        success : function(response)
		        {
		            console.log(response);
		            if(response.code==1)
		            {
		                window.location.href='load_businessprofile';
		            }
		        }
		    });
	    }
	});
/*Business Profile Setting*/