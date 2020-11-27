var primaryimage = "";
var updateprimaryimage = "";

$('#btnaddproduct').click(function()
{
	$('#productnameeroor').hide('fast');
	$('#productpriceerror').hide('fast');
	$('#unittypeerror').hide('fast');
	$('#minqtyerror').hide('fast');
	$('#descriptionerror').hide('fast');
	$('#maincategoryerror').hide('fast');
	$('#subcategoryerror').hide('fast');
	$('#primaryimageerror').hide('fast');

    var productname = $('#productname').val();
    var productprice = $('#productprice').val();
    var unittype = $('#unittype').val();
    var minqty = $('#minqty').val();
    var description = CKEDITOR.instances.ckeditor.getData();
    var maincategory = $('#maincategory').val();
    var subcategory = $('#subcategory').val();

    var f = new FormData();
    f.append('productname',productname);
    f.append('productprice',productprice);
    f.append('unittype',unittype);
    f.append('minqty',minqty);
    f.append('description',description);
    f.append('maincategory',maincategory);
    f.append('subcategory',subcategory);
    f.append('primaryimage',primaryimage);

    for(var i of f.values())
    {
        console.log(i);
    }

    $.ajax({
        url : "add_product",
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
                    text:"Please Correct the Errors",
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
                    if(d[i].search('Product Name') > 0)
                    {
                        $('#productnameeroor').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Product Price') > 0)
                    {
                        $('#productpriceerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Unit Type') > 0)
                    {
                        $('#unittypeerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Minimum Order Quantity') > 0)
                    {
                        $('#minqtyerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Description') > 0)
                    {
                        $('#descriptionerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Main Category') > 0)
                    {
                        $('#maincategoryerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Sub Category') > 0)
                    {
                        $('#subcategoryerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Primary Image') > 0)
                    {
                        $('#primaryimageerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                }    
            }
            else
            {
                swal({
                    title:"Good Job",
                    text:"SuccessFully Inserted",
                    type:"success",
                    allowOutsideClick: false,
                    animation: false,
                    customClass: 'animated tada'
                });
                $('.swal2-confirm').click(function(){
                    window.location.href='manageproduct';
                });
            }
        }
    });
});

function update_product(productid)
{
    $('#productnameeroor').hide('fast');
    $('#productpriceerror').hide('fast');
    $('#unittypeerror').hide('fast');
    $('#minqtyerror').hide('fast');
    $('#descriptionerror').hide('fast');
    $('#maincategoryerror').hide('fast');
    $('#subcategoryerror').hide('fast');
    $('#primaryimageerror').hide('fast');

    var productname = $('#productname').val();
    var productprice = $('#productprice').val();
    var unittype = $('#unittype').val();
    var minqty = $('#minqty').val();
    var description = CKEDITOR.instances.ckeditor.getData();
    var maincategory = $('#maincategory').val();
    var subcategory = $('#subcategory').val();

    var f = new FormData();
    f.append('productname',productname);
    f.append('productprice',productprice);
    f.append('unittype',unittype);
    f.append('minqty',minqty);
    f.append('description',description);
    f.append('maincategory',maincategory);
    f.append('subcategory',subcategory);
    f.append('primaryimage',updateprimaryimage);

    for(var i of f.values())
    {
        console.log(i);
    }

    $.ajax({
        url : "../edit__product/"+productid,
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
                    text:"Please Correct the Errors",
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
                    if(d[i].search('Product Name') > 0)
                    {
                        $('#productnameeroor').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Product Price') > 0)
                    {
                        $('#productpriceerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Unit Type') > 0)
                    {
                        $('#unittypeerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Minimum Order Quantity') > 0)
                    {
                        $('#minqtyerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Description') > 0)
                    {
                        $('#descriptionerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Main Category') > 0)
                    {
                        $('#maincategoryerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Sub Category') > 0)
                    {
                        $('#subcategoryerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Primary Image') > 0)
                    {
                        $('#primaryimageerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                }    
            }
            else
            {
                swal({
                    title:"Good Job",
                    text:"SuccessFully Updated Product",
                    type:"success",
                    allowOutsideClick: false,
                    animation: false,
                    customClass: 'animated tada'
                });
                $('.swal2-confirm').click(function(){
                    window.location.href='../manageproduct';
                });
            }
        }
    });
}

function delete_product(productid)
{
    swal({
      title: 'Are you sure?',
      text: "It will permanently deleted !",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then(function(result){
        if(result.value)
        {
            $.ajax({
                url : "../Product/delete_product/"+productid,
                type : "POST",
                dataType : "JSON",
                success:function(response)
                {
                    console.log(response);
                    if(response.code == 0)
                    {
                        swal({
                            title:"Good Job",
                            text:"Product has been Deleted",
                            type:"success",
                            allowOutsideClick: false,
                            animation: false,
                            customClass: 'animated tada'
                        });
                        $('.swal2-confirm').click(function(){
                            window.location.href='manageproduct';
                        });
                    }
                }
            });
        }
    });
}

$('#btnupdateproduct').click(function()
{
    $('#productnameeroor').hide('fast');
    $('#productpriceerror').hide('fast');
    $('#unittypeerror').hide('fast');
    $('#minqtyerror').hide('fast');
    $('#descriptionerror').hide('fast');
    $('#maincategoryerror').hide('fast');
    $('#subcategoryerror').hide('fast');
    $('#primaryimageerror').hide('fast');

    var productname = $('#productname').val();
    var productprice = $('#productprice').val();
    var unittype = $('#unittype').val();
    var minqty = $('#minqty').val();
    var description = CKEDITOR.instances.ckeditor.getData();
    var maincategory = $('#maincategory').val();
    var subcategory = $('#subcategory').val();

    var f = new FormData();
    f.append('productname',productname);
    f.append('productprice',productprice);
    f.append('unittype',unittype);
    f.append('minqty',minqty);
    f.append('description',description);
    f.append('maincategory',maincategory);
    f.append('subcategory',subcategory);
    f.append('primaryimage',updateprimaryimage);

    for(var i of f.values())
    {
        console.log(i);
    }

    $.ajax({
        url : "../edit__product/<?php echo $productresult[0]->product_id; ?>",
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
                    text:"Please Correct the Errors",
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
                    if(d[i].search('Product Name') > 0)
                    {
                        $('#productnameeroor').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Product Price') > 0)
                    {
                        $('#productpriceerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Unit Type') > 0)
                    {
                        $('#unittypeerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Minimum Order Quantity') > 0)
                    {
                        $('#minqtyerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Description') > 0)
                    {
                        $('#descriptionerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Main Category') > 0)
                    {
                        $('#maincategoryerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Sub Category') > 0)
                    {
                        $('#subcategoryerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                    if(d[i].search('Primary Image') > 0)
                    {
                        $('#primaryimageerror').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                    }
                }    
            }
            else
            {
                swal({
                    title:"Good Job",
                    text:"SuccessFully Updated Product",
                    type:"success",
                    allowOutsideClick: false,
                    animation: false,
                    customClass: 'animated tada'
                });
                $('.swal2-confirm').click(function(){
                    window.location.href='../manageproduct';
                });
            }
        }
    });
});



