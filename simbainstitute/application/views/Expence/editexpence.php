<?php 
    $expenceresult = $this->Model->model_select('tbl_expence_category');
    //print_r($expenceresult);
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <style type="text/css">
        .error
        {
            color:#A8413F;
            font-size:15px;
        }
    </style>
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
                            <h3 class="box-title">New Expence</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Expence Date :</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker" value="<?php echo date("m/d/Y"); ?>" autocomplete="off" value="<?php echo $result[0]->expence_date;?>">
                                        </div>
                                        <div class="error" id="errorexpencedate"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Expence Title :</label>
                                        <select class="form-control select2 w-p100" id="expencetitle">
                                            <option value="">Select</option>
                                            <?php 
                                                foreach($expenceresult as $value)
                                                {
                                                ?>
                                                    <option value="<?php echo $value->expence_category_id; ?>" <?php if($result[0]->expence_title == $value->expence_category_id){echo "selected";} ?>>
                                                        <?php echo $value->expence_category; ?>
                                                    </option>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                        <div class="error" id="errorexpencetitle"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Expence Detail :</label>
                                        <textarea id="expencedetail" class="form-control" rows="4" placeholder="Enter Expence Detail"><?php echo $result[0]->expence_detail;?></textarea>
                                        <div class="error" id="errorrexpencedetail"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Expence Amount :</label>
                                        <input type="text" class="form-control" id="expenceamount" placeholder="Enter Expence Amount" autocomplete="off" value="<?php echo $result[0]->expence_amount;?>">
                                        <div class="error" id="errorexpenceamount"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="button" id="sbmt" class="btn btn-block btn-info pull-left btn-lg text-center" onClick="edit_record(<?php echo $result[0]->expence_id; ?>)">Update</button>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-block btn-lg text-center btn-danger">Cancel</button>
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
   
    function edit_record(expence_id)
    {
        var expencedate = $('#datepicker').val();
        var expencetitle = $('#expencetitle').val();
        var expencedetail = $('#expencedetail').val();
        var expenceamount = $('#expenceamount').val();

        var f = new FormData();
        f.append('expencedate',expencedate);
        f.append('expencetitle',expencetitle);
        f.append('expencedetail',expencedetail);
        f.append('expenceamount',expenceamount);

        for(var i of f.values())
        {
            console.log(i);
        }

        $.ajax({
            url:"<?php echo site_url('Expence/editRecord/'); ?>"+expence_id,
            data:f,
            dataType:"JSON",
            type:"POST",
            processData:false,
            contentType:false,
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
                        if(d[i].search('Expence Date') > 0)
                        {
                            $('#errorexpencedate').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                        if(d[i].search('Expence Detail') > 0)
                        {
                            $('#errorrexpencedetail').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                        if(d[i].search('Expence Amount') > 0)
                        {
                            $('#errorexpenceamount').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                        if(d[i].search('Expence Title') > 0)
                        {
                            $('#errorexpencetitle').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                    }    
                }
                else
                {
                    swal({
                        title:"Good Job",
                        text:"Expence SuccessFully updated.....",
                        type:"success",
                        allowOutsideClick: false,
                        animation: false,
                        customClass: 'animated tada hello'
                    });
                    $('.swal2-confirm').click(function(){
                        window.location.href='<?php echo base_url(); ?>Expence/Expence_List';
                    });
                }
            }
        });
    }
</script>
</body>
</html>
