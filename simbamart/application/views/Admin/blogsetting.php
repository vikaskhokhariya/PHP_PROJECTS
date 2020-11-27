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
                        BLOG SEO LIST
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
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <table class="table table-striped table-bordered base-style text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Blog Name</th>
                                                        <th>Title</th>
                                                        <th>Slug</th>
                                                        <th>Meta Keyword</th>
                                                        <th>Meta Description</th>
                                                        <th>Content</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $res=$this->Model->model_select('seo_pages',array('background'=>'blog'));

                                                        foreach($res as $value)
                                                        {
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $value->page_name;?></td>
                                                            <td><?php echo $value->page_title; ?></td>
                                                            <td><?php echo $value->page_slug; ?></td>
                                                            <td><?php echo $value->meta_keyword; ?></td>
                                                            <td><?php echo $value->page_desc; ?></td>
                                                            <td><?php echo $value->page_title; ?></td>
                                                            <td>
                                                                <a href="<?php echo base_url(); ?>Admin_cnt/edit_blogseosetting/<?php echo $value->page_id; ?>">
                                                                    <i class="fa fa-edit" style="font-size:15px;color:green;">
                                                                    </i>
                                                                </a>
                                                                &nbsp;
                                                                <!-- <a href="javascript:del_category('<?php?>')">
                                                                    <i class="fa fa-trash" style="font-size:15px;color:red;">
                                                                    </i>
                                                                </a>  -->
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
        include('footer.php');
        include('linkbottom.php');
    ?>
  </body>
</html>