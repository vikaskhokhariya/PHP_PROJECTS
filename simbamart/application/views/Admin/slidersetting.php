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
                        SLIDER SETTING
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
                    <a class="btn btn-warning btn-min-width float-md-right box-shadow-4 mr-1 mb-1" href="<?php echo base_url(); ?>Admin_cnt/load_addslidersetting">
                        <i class="ft-plus"></i>&nbsp;Add New Slider
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
                                                        <th>Slider Priority</th>
                                                        <th>Slider Image</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $res=$this->Model->model_select('tbl_slider');

                                                        foreach($res as $value)
                                                        {
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $value->slider_image;?></td>
                                                            <td><img src="<?php echo base_url();?>Upload/Admin/slider/<?php echo $value->slider_image;?>" height="150px" width="250px"></td>
                                                            <td><a href="javascript:del_slider('<?php echo $value->slider_id;?>')"><i class="fa fa-trash" style="font-size:15px;color:red;"></i></a></td>
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
    <script type="text/javascript">
        function del_slider(sliderid)
        {
            $.ajax({
                url:'<?php echo base_url();?>Admin_cnt/delete_slider/'+sliderid,
                type:'POST',
                success:function(response)
                {
                    if(response===1)
                    {
                         swal({
                            title:"Error",
                            text:"Something Wrongs",
                            type:"error",
                            allowOutsideClick: false
                        });
                        $('.swal2-confirm').click(function(){
                            window.location.href='<?php echo base_url();?>Admin_cnt/load_slidersetting';
                        });
                    }
                    else
                    {
                       swal({
                            title:"Good Job",
                            text:"SuccessFully Deleted",
                            type:"success",
                            allowOutsideClick: false
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