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
                Edit Course
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">
                    <i class="fa fa-dashboard"></i> Home</a>
                </li>
                <li class="breadcrumb-item active">
                    Dashboard
                </li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Course</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Course Name :</label>
                                        <input type="text" class="form-control" id="coursename" placeholder="Enter Course Name" autocomplete="off" value="<?php echo $result[0]->course_name;?>">
                                        <div class="error" id="errorcoursename"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Course Fees :</label>
                                        <input type="text" class="form-control" id="coursefees" placeholder="Enter Course Fees" autocomplete="off" value="<?php echo $result[0]->course_fees;?>">
                                        <div class="error" id="errorcoursefees"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="button" id="sbmtedit" class="btn btn-block btn-info pull-left btn-lg text-center" onClick="edit_record(<?php echo $result[0]->course_id;  ?>) ">Update</button>
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
    function edit_record(course_id)
    {
        coursename=$("#coursename").val();
        coursefees=$("#coursefees").val();

        formdata=
        {
            coursename : coursename,
            coursefees : coursefees
        }

        $.ajax({
            url:"<?php echo site_url('Course/update_record/')?>"+course_id,
            data:formdata,
            type:"POST",
            dataType:"JSON",
            success:function(response)
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
                        if(d[i].search('Course Name') > 0)
                        {
                            $('#errorcoursename').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                        if(d[i].search('Course Fees') > 0)
                        {
                            $('#errorcoursefees').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                    }    
                }
                else
                {
                    swal({
                        title:"Good Job",
                        text:"Course Update SuccessFully",
                        type:"success",
                        allowOutsideClick: false,
                        animation: false,
                        customClass: 'animated tada'
                    });
                    $('.swal2-confirm').click(function(){
                        window.location.href='<?php echo base_url(); ?>Course/Course_List'
                    })
                }
            }
        }); 
    }

    $('#cancel').click(function(){
        window.location.href="<?php echo base_url(); ?>Course/Course_List";
    });
</script>
</body>
</html>
