<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    $this->load->view("linktop.php");
    ?>  
</head>

<body class="hold-transition skin-yellow sidebar-mini">
    <div class="wrapper">  
        <?php 
            $this->load->view("topheader");
            $this->load->view("sidemenu");
        ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Expence
                </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url(); ?>Simba">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </a>
                    </li>
                </ol>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Expence Category List</h3>
                            </div>
                            <div class="box-body">
                                <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                    <thead>
                                        <tr>
                                            <th class="text-yellow text-center">No</th>
                                            <th class="text-yellow">Expence Category</th>
                                            <th class="text-yellow text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    $result=$this->Model->model_select('tbl_expence_category','','expence_category_id','desc');
                                    $count = 1;
                                    ?>
                                    <tbody>
                                        <?php 
                                        foreach($result as $value)
                                        {
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $count; ?></td>
                                                <td><?php echo $value->expence_category; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url(); ?>Expence/Edit_expencecategory/<?php echo $value->expence_category_id; ?>"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" style="color:#00c292;"></i>
                                                   </a>
                                                   &nbsp;&nbsp;

                                                   <a href="javascript:delete_record('<?php echo $value->expence_category_id; ?>')"><i class="fa fa-trash fa-lg" aria-hidden="true" style="color:#EF5350;"></i>
                                                   </a>
                                                    <!-- <a href="<?php //echo base_url(); ?>Course/Edit_Course/<?php //echo $value->course_id; ?>"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true" style="color:#00c292;"></i>
                                                    </a>

                                                    &nbsp;&nbsp;

                                                    <a href="javascript:delete_record('<?php //echo $value->course_id; ?>')"><i class="fa fa-trash fa-lg" aria-hidden="true" style="color:#EF5350;"></i>
                                                    </a> -->
                                                </td>
                                            </tr>
                                            <?php
                                            $count++;
                                        }
                                        ?>
                                    </tbody>                  
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php 
        $this->load->view("footer");
        ?>
        <div class="control-sidebar-bg"></div>
    </div>

    <?php 
    $this->load->view("linkbottom");
    ?>

</body>
<script type="text/javascript">
    function delete_record(expence_category_id)
    {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to retrive this!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            closeOnConfirm: false
        }).then(function(result){
            if(result.value)
            {
                $.ajax({
                    url:"<?php echo site_url('Expence/delete_expence_category/') ?>"+expence_category_id,
                    type:'POST',
                    success:function(response)
                    {
                        console.log(response);

                        if(response=="success")
                        {
                            swal({
                                title : "Good Job",
                                text : "Expense category has been Deleted",
                                type : "success",
                                allowOutsideClick : false,
                                animation : false,
                                customClass : 'animated tada'
                            });
                            $('.swal2-confirm').click(function(){
                                window.location.href='<?php echo base_url(); ?>Expence/Expence_Category_List'
                            })
                        }
                    }
                });
            }
        });
    }    
</script>
</html>