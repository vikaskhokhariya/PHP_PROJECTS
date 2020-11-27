<!DOCTYPE html>
<html lang="en">
  
<head>
    <?php 
        $this->load->view("linktop.php");
    ?>  
    <style type="text/css">
        .error
        {
            color:#A8413F;
            font-size:15px;
        }
    </style>
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
                            <h3 class="box-title">New Expence</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Expence Category :</label>
                                        <input type="text" class="form-control" id="categoryname" placeholder="Enter Expence Category" autocomplete="off">
                                        <div class="error" id="errorexpencecategory"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="button" id="sbmt" class="btn btn-block btn-info pull-left btn-lg text-center">Submit</button>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-block btn-lg text-center btn-danger" id="cancel">Cancel</button>
                                </div>
                            </div>
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

<script type="text/javascript">
    $('#sbmt').click(function(){
        var categoryname = $('#categoryname').val();

        formdata={
            categoryname : categoryname,
        }

        $.ajax({
            url : "<?php echo base_url(); ?>Expence/add_expence_category",
            data : formdata,
            dataType : "JSON",
            type: "POST",
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
                        if(d[i].search('Expence Category Name') > 0)
                        {
                            $('#errorexpencecategory').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                    }    
                }
                else
                {
                    swal({
                        title:"Good Job",
                        text:"Expence Category Inserted SuccessFully",
                        type:"success",
                        allowOutsideClick: false,
                        animation: false,
                        customClass: 'animated tada'
                    });
                    $('.swal2-confirm').click(function(){
                        window.location.href='<?php echo base_url(); ?>Expence/Expence_Category_List';
                    });
                }
            }
        });
    });


    $('#cancel').click(function(){
        window.location.href="<?php echo base_url(); ?>Expence/Expence_Category_List";
    });
</script>
</body>

</html>
