<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<head>
    <?php 
        $this->load->view('Admin/linktop');
    ?>
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-color="bg-gradient-x-purple-red" data-col="2-columns">

    <?php 
        $this->load->view('Admin/mobileviewheader');
        $this->load->view('Admin/pcviewheader');
    ?>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">
                        EDIT MAIN CATEGORY
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
                                                                <i class="ft-flag"></i> Main Category
                                                            </h4>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Category Name</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" placeholder="Enter Category Name" id="cnm" autocomplete="off" value="<?php echo $result[0]->cat_name; ?>">
                                                                </div>
                                                                <div class="col-sm-4 text-danger">
                                                                    <b><span id="cnameerror"></span></b>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Category Image</label>
                                                                <div class="col-sm-5">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="catimage">
                                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 text-danger">
                                                                    <b><span id="cimgerr"></span></b>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label"></label>
                                                                <div class="col-sm-5">
                                                                    <img class="img-thumbnail img-fluid" src="<?php echo base_url(); ?>Upload/Admin/Category/<?php echo $result[0]->cat_name; ?>/<?php echo $result[0]->cat_image; ?>" height="150px" width="150px" id="catimg">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Category Title</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" placeholder="Enter Category Name" id="ctitle" autocomplete="off" value="<?php echo $result[0]->cat_title; ?>">
                                                                </div>
                                                                <div class="col-sm-4 text-danger">
                                                                    <b><span id="ctitleerror"></span></b>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Page Content</label>
                                                                <div class="form-group col-sm-8">
                                                                    <textarea name="ckeditor" id="ckeditor" cols="30" rows="15" class="ckeditor"><?php echo $result[0]->page_content; ?></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label"></label>
                                                               <div class="form-group text-danger">
                                                                   <b><span id="cpagecontenterror"></span></b>
                                                                </div>
                                                            </div>

                                                            <div class="form-actions">
                                                                <input type="button" name="submit" value="Submit" class="btn btn-info" onclick="edit_maincategory(<?php echo $result[0]->cat_id ?>)"> 
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
        include('linkbottom.php');
    ?>

    <script type="text/javascript">
        var mainpic="";
        function readURL(input)
        {
            if (input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#catimg').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#catimage').change(function()
        {
            mainpicsize=document.getElementById('catimage').files[0];

            if(mainpicsize.size > 2000000)
            {
                swal({
                    title:"Opps..",
                    text:"Size Should Be less than 2.5MB",
                    type:"error",
                    allowOutsideClick: false
                });   
                $('#catimage').val('');
            }
            else
            {
                mainpic=$('#catimage')[0].files[0];
                readURL(this);
            }
        });
        
        function edit_maincategory(id)
        {
            $('#cnameerror').hide('fast');
            $('#cimgerr').hide('fast');
            $('#ctitleerror').hide('fast');
            $('#cpagecontenterror').hide('fast');

            categoryname=$('#cnm').val();
            categorytitle=$('#ctitle').val();
            var pgcontent = CKEDITOR.instances.ckeditor.getData();

            var f = new FormData();
            f.append('maincategory_name',categoryname);
            f.append('catimg',mainpic);
            f.append('cattitle',categorytitle);
            f.append('pgcontent',pgcontent);

            for(var i of f.values())
            {
                console.log(i);
            }

            $.ajax({
                url : "<?php echo site_url('Admin_cnt/edit_category/'); ?>"+id,
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
                            if(d[i].search('Category Name') > 0)
                            {
                                $('#cnameerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Category Title') > 0)
                            {
                                $('#ctitleerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Image') > 0)
                            {
                                $('#cimgerr').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Page Content')>0)
                            {
                                $('#cpagecontenterror').html(d[i]).slideDown('slow');
                            }
                        }    
                    }
                    else
                    {
                        swal({
                            title:"Good Job",
                            text:"Category has been Updated",
                            type:"success",
                            allowOutsideClick: false,
                            animation: false,
                            customClass: 'animated tada'
                        });
                        $('.swal2-confirm').click(function(){
                            window.location.href='<?php echo base_url(); ?>Admin_cnt/load_maincatlist';
                        });
                    }
                }
            });
        }

        function edit_cancel()
        {
            window.location.href="<?php echo base_url();?>Admin_cnt/load_maincatlist";
        }
    </script>
  </body>
</html>