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
                        BLOG LIST
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
                <div class="content-header-right col-md-4 col-12">
                    <a class="btn btn-warning btn-min-width float-md-right box-shadow-4 mr-1 mb-1" href="<?php echo base_url(); ?>Admin_cnt/load_addblog">
                        <i class="ft-plus"></i>&nbsp;Add New Blog
                    </a>
                </div>
            </div>

            <div class="content-body">
                <section id="drag-area">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <table class="table table-striped table-bordered base-style text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Blog Title</th>
                                                        <th>Blog Image</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $res=$this->Model->model_select('tbl_blog',array('blog_status'=>1));

                                                        foreach($res as $value)
                                                        {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $value->blog_title;?></td>
                                                            <td><img src="<?php echo base_url();?>Upload/Admin/Blog/<?php echo $value->blog_image;?>" height="100px" width="100px"></td>
                                                            <td>
                                                                <a href="<?php echo base_url(); ?>Admin_cnt/edit_blog/<?php echo $value->blog_id;?>">
                                                                    <i class="fa fa-edit" style="font-size:15px;color:green;">
                                                                    </i>
                                                                </a>
                                                                &nbsp;
                                                                <a href="javascript:del_blog('<?php echo $value->blog_id;?>')">
                                                                    <i class="fa fa-trash" style="font-size:15px;color:red;">
                                                                    </i>
                                                                </a> 
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>                
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
        $this->load->view('Admin/footer');
        $this->load->view('Admin/linkbottom');
    ?>

    <script type="text/javascript">
        
        function del_blog(blogid)
        {
            $.ajax({
                url:'<?php echo base_url();?>Admin_cnt/delete_blog/'+blogid,
                type:'POST',
                success:function(response)
                {
                    if(response=="sucess")
                    {
                        swal({
                            title:"Good Job",
                            text:"SuccessFully Deleted",
                            type:"success",
                            allowOutsideClick: false
                        });
                        $('.swal2-confirm').click(function(){
                            window.location.href='load_bloglist';
                        });
                    }
                }
            });
        }
    </script>
  </body>
</html>