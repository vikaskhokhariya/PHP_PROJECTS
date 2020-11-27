<?php 
    //print_r($result);
 ?>
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
                        SEO SETTING
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
                                                                <i class="ft-flag"></i>SEO Information
                                                            </h4>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Page Name</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" placeholder="Enter Page Name" id="pagename" autocomplete="off" value="<?php echo $result[0]->page_name; ?>" readonly="">
                                                                </div>
                                                            </div>

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
                                                                            <option value="<?php echo $q->page_list_id;?>" <?php if($q->page_list_id==$result[0]->page_list_id) echo "selected"; ?>><?php echo $q->name;?></option>
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
                                                                    <input class="form-control" type="text" placeholder="Enter Page Title" id="pagetitle" autocomplete="off" value="<?php echo $result[0]->page_title; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Page Slug</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" placeholder="Enter Slug Name" id="pageslug" autocomplete="off" value="<?php echo $result[0]->page_slug; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Meta Keyword</label>
                                                                <div class="col-sm-5">
                                                                    <textarea class="form-control" placeholder="Enter Meta Keywords" id="pagemeta"><?php echo $result[0]->meta_keyword; ?></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Description</label>
                                                                <div class="col-sm-5">
                                                                    <textarea class="form-control" placeholder="Enter Descriptions" id="pagedescription"><?php echo $result[0]->page_desc; ?></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Content</label>
                                                                <div class="col-sm-5">
                                                                    <textarea class="form-control" placeholder="Enter Content" id="pagecontent"><?php echo $result[0]->content; ?></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-actions">
                                                                <input type="button" name="submit" value="Submit" class="btn btn-info" onclick="edit_seosetting(<?php echo $result[0]->page_id; ?>)"> 
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
        function edit_seosetting(pageid)
        {
            pagename=$('#pagename').val();
            clonepage=$('#clonepage').val();
            title=$('#pagetitle').val();
            slug=$('#pageslug').val();
            meta=$('#pagemeta').val();
            description=$('#pagedescription').val();
            content=$('#pagecontent').val();

            var f = new FormData();
            f.append('pagename',pagename);
            f.append('clonepage',clonepage);
            f.append('title',title);
            f.append('slug',slug);
            f.append('meta',meta);
            f.append('description',description);
            f.append('content',content);

            for(var i of f.values())
            {
                console.log(i);
            }

            $.ajax({
                url : "<?php echo site_url('Admin_cnt/edit__seosetting/'); ?>"+pageid,
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
                                if(d[i].search('clone page') > 0)
                                {
                                    $('#cloneerror').html(d[i]).slideDown('slow');
                                }
                                if(d[i].search('Image') > 0)
                                {
                                    $('#cimgerr').html(d[i]).slideDown('slow');
                                }
                            }    
                    }
                    else
                    {
                        swal({
                            title:"Good Job",
                            text:"SuccessFully Updated",
                            type:"success",
                            allowOutsideClick: false,
                            animation: false,
                            customClass: 'animated tada'
                        });
                        $('.swal2-confirm').click(function(){
                            window.location.href='<?php echo base_url();?>Admin_cnt/load_seosetting';
                        });
                    }
                }
            });
        }

        function edit_cancel()
        {
            window.location.href="<?php echo base_url();?>Admin_cnt/load_seosetting";
        }
    </script>
  </body>
</html>