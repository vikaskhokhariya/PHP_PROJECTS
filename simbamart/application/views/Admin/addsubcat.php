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
                        ADD SUB CATEGORY
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
                                                                <i class="ft-flag"></i> Sub Category
                                                            </h4>
                                                            
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Main Category Name</label>
                                                                <?php
                                                                    $maincatresult=$this->Model->model_select('tbl_category',array('type'=>'main','cat_status'=>1));
                                                                ?>
                                                                <div class="col-sm-5">
                                                                    <select class="form-control" id="maincat">
                                                                        <option hidden="" value="">Select</option>
                                                                        <?php 
                                                                           foreach($maincatresult as $q)
                                                                           {
                                                                        ?>
                                                                            <option value="<?php echo $q->cat_id;?>"><?php echo $q->cat_name;?></option>
                                                                        <?php
                                                                           }
                                                                        ?>
                                                                    </select> 
                                                                </div>
                                                                <div class="col-sm-4 text-danger">
                                                                    <b><span id="cnameerror"></span></b>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Category Name</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" placeholder="Enter Sub Category Name" id="subcat" autocomplete="off">
                                                                </div>
                                                                <div class="col-sm-4 text-danger">
                                                                    <b><span id="subcaterr"></span></b>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Category Image</label>
                                                                <div class="col-sm-5">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="subcatimage">
                                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 text-danger">
                                                                    <b><span id="cimageerror"></span></b>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label"></label>
                                                                <div class="col-sm-5">
                                                                    <img class="img-thumbnail img-fluid" src="<?php echo base_url(); ?>Upload/Admin/extra/noimage.jpg" height="150px" width="150px" id="catimg">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Category Title</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" placeholder="Enter Category Title" id="ctitle" autocomplete="off">
                                                                </div>
                                                                <div class="col-sm-4 text-danger">
                                                                    <b><span id="ctitleerror"></span></b>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Page Content</label>
                                                               <div class="form-group col-sm-8">
                                                                    <textarea name="ckeditor" id="ckeditor" cols="30" rows="15" class="ckeditor"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label"></label>
                                                               <div class="form-group text-danger">
                                                                   <b><span id="cpagecontenterror"></span></b>
                                                                </div>
                                                            </div>

                                                            <h4 class="form-section">
                                                                <i class="ft-flag"></i> SEO Information
                                                            </h4>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Select Clone page</label>
                                                                <?php
                                                                    $pageresult=$this->Model->model_select('seo_page_list');
                                                                ?>
                                                                <div class="col-sm-5">
                                                                    <select class="form-control" id="clonepage">
                                                                        <option hidden="" value="">Select</option>
                                                                        <?php 
                                                                           foreach($pageresult as $q)
                                                                           {
                                                                        ?>
                                                                            <option value="<?php echo $q->page_list_id;?>"><?php echo $q->name;?></option>
                                                                        <?php
                                                                           }
                                                                        ?>
                                                                    </select> 
                                                                </div>
                                                                <div class="col-sm-4 text-danger">
                                                                    <b><span id="cloneerror"></span></b>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Page Title</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" placeholder="Enter Category Name" id="pagetitle" autocomplete="off">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Page Slug</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" placeholder="Enter Slug Name" id="pageslug" autocomplete="off">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Meta Keyword</label>
                                                                <div class="col-sm-5">
                                                                    <textarea class="form-control" placeholder="Enter Meta Keywords" id="pagemeta"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Description</label>
                                                                <div class="col-sm-5">
                                                                    <textarea class="form-control" placeholder="Enter Descriptions" id="pagedescription"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Content</label>
                                                                <div class="col-sm-5">
                                                                    <textarea class="form-control" placeholder="Enter Content" id="pagecontent"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-actions">
                                                                <input type="button" name="submit" value="Submit" class="btn btn-info" onclick="add_subcategory()"> 
                                                                <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="edit_cancel()">
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
        pic='';
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
        CKEDITOR.replace( 'ckeditor');
        $('#subcatimage').change(function()
        {
            subpicsize=document.getElementById('subcatimage').files[0];

            if(subpicsize.size > 2000000)
            {
                swal({
                    title:"Opps..",
                    text:"<span style='font-size:20px;font-weight:bold;'>Size Should Be less than 2.5MB</span>",
                    type:"error",
                    allowOutsideClick: false
                 });   
                $('#subcatimage').val('');
            }
            else
            {
                pic=$('#subcatimage')[0].files[0];
                readURL(this);
            }
        });

        function add_subcategory()
        {
            $('#maincaterr ').hide('fast');
            $('#subcaterr').hide('fast');
            $('#cimageerror').hide('fast');
            $('#ctitleerror').hide('fast');
            $('#cpagecontenterror').hide('fast');

            maincatid=$('#maincat').val();
            subcatnm=$('#subcat').val();
            cattitle=$('#ctitle').val();

            clonepage=$('#clonepage').val();
            title=$('#pagetitle').val();
            var pgcontent = CKEDITOR.instances.ckeditor.getData();
            slug=$('#pageslug').val();
            meta=$('#pagemeta').val();
            description=$('#pagedescription').val();
            content=$('#pagecontent').val();

            var f = new FormData();
            f.append('maincatid',maincatid);
            f.append('subcatnm',subcatnm);
            f.append('pic',pic);
            f.append('cattitle',cattitle);
            f.append('pgcontent',pgcontent);
            f.append('clonepage',clonepage);
            f.append('title',title);
            f.append('slug',slug);
            f.append('meta',meta);
            f.append('description',description);
            f.append('content',content);

            $.ajax({
                url:"<?php echo site_url('Admin_cnt/add_subcategory');?>",
                data:f,
                type:'POST',
                dataType:'JSON',
                processData:false,
                contentType:false,
                success:function(response)
                {
                    console.log(response);
                    if(response.code===0)
                    {
                        if(response.msg=="subcategory is already present")
                        {
                             $('#subcaterr').html('Subcategory is Already Present').slideDown('slow');
                             $('#subcat').val('');
                             $('#subcatimage').val('');
                        }
                        else
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
                                if(d[i].search('Main Category') > 0)
                                {
                                    $('#maincaterr').html(d[i]).slideDown('slow');
                                }
                                if(d[i].search('Subcategory Name') > 0)
                                {
                                    $('#subcaterr').html(d[i]).slideDown('slow');
                                }
                                if(d[i].search('Image') > 0)
                                {
                                    $('#cimageerror').html(d[i]).slideDown('slow');
                                }
                                if(d[i].search('Category Title') > 0)
                                {
                                    $('#ctitleerror').html(d[i]).slideDown('slow');
                                }
                                 if(d[i].search('Page Content')>0)
                                {
                                    $('#cpagecontenterror').html(d[i]).slideDown('slow');
                                }
                                if(d[i].search('clone page') > 0)
                                {
                                    $('#cloneerror').html(d[i]).slideDown('slow');
                                }
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
                            window.location.href='<?php echo base_url();?>Admin_cnt/load_subcatlist';
                        });
                    }
                }
            });
        }
        function edit_cancel()
        {
            window.location.href="<?php echo base_url();?>Admin_cnt/load_subcatlist";
        }
    </script>
  </body>
</html>