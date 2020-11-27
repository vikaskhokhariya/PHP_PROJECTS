<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<head>
    <?php 
        include('linktop.php');
    ?>
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-color="bg-gradient-x-purple-red" data-col="2-columns">

    <?php 
        include('mobileviewheader.php');
        include('pcviewheader.php');
    ?>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">
                        ADD NEW SILDER
                    </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php echo base_url(); ?>Admin_cnt">
                                        Home
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
             <div class="content-body">
                <section id="drag-area">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-content collapse show">
                                            <div class="card-body">
                                                <form class="form">
                                                    <div class="form-body">
                                                        <h4 class="form-section">
                                                            <i class="ft-flag"></i> Homepage Slider
                                                        </h4>
                                                        <!-- <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Slider Status</label>
                                                                <div class="col-sm-5">
                                                                   <select class="select2-size-xs form-control" id="xsmall-select">
                                                                        <option value="" hidden="">Select</option>
                                                                        <option value="main">Main</option>
                                                                        <option value="sub">Sub</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-4 text-danger">
                                                                    <b><span id="cnameerror"></span></b>
                                                                </div>
                                                        </div> -->
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-3 col-form-label">Slider Image</label>
                                                            <div class="col-sm-5">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="sliderimage">
                                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4 text-danger">
                                                                <b><span id="sliderimgerr"></span></b>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-3 col-form-label"></label>
                                                            <div class="col-sm-5">
                                                                <img class="img-thumbnail img-fluid" src="<?php echo base_url(); ?>Upload/Admin/extra/noimage.jpg" height="150px" width="150px" id="sliderimg">
                                                            </div>
                                                        </div>


                                                        <div class="form-actions">
                                                            <input type="button" name="submit" value="Submit" class="btn btn-info" onclick="add_mainslider()"> 
                                                            <input type="button" name="cancel" value="Cancel" class="btn btn-danger mr-1" onclick="edit_cancel()">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>   
                </section>
            </div>
        </div>
    </div>

    <?php 
        include('footer.php');
    ?>

    <?php 
        include('linkbottom.php');
    ?>
      <script type="text/javascript">
        var mainpic="";
        $('#sliderimage').change(function()
        {
            mainpicsize=document.getElementById('sliderimage').files[0];
            if(mainpicsize.size > 2000000)
            {
                swal({
                    title:"Opps..",
                    text:"Size Should Be less than 2.5MB",
                    type:"error",
                    allowOutsideClick: false,
                    animation: false,
                    customClass: 'animated tada'
                });   
                $('#sliderimage').val('');
            }
            else
            {
                mainpic=$('#sliderimage')[0].files[0];
                readURL(this);
            }
        });
        function readURL(input)
        {
            if (input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#sliderimg').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        function add_mainslider()
        {
            $('#sliderimgerr').hide('fast');
            var f = new FormData();
            f.append('mainpic',mainpic);
            f.append('id',1);
            //alert(mainpic);
            $.ajax({
                url : "<?php echo site_url('Admin_cnt/add_slider');?>",
                data: f,
                dataType : "JSON",
                type: "POST",
                processData: false,
                contentType: false,
                success : function(response)
                {
                    console.log(response);
                    if(response.code===0)
                    {
                        if(response.msg.search('\n')>0)
                        {
                            d=response.msg.split('\n');
                        }
                        for(i=0;i<d.length;i++)
                        {
                            if(d[i].search('Image')>0)
                            {
                               $('#sliderimgerr').html(d[i]).slideDown('fast');
                            }
                        }
                        if(response.msg=='pic error')
                        {
                            alert("pic error");
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
                            window.location.href='<?php echo base_url(); ?>Admin_cnt/load_slidersetting';
                        });
                    }
                }
            });
        }
        
    </script>
  </body>
</html>