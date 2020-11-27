<?php 
    $courselist = $this->Model->model_select('tbl_course');
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
                Enrolled Students
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
                            <h3 class="box-title">Personal Details</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Student Name :</label>
                                        <input type="text" class="form-control" id="studentname" placeholder="Enter Student Name" autocomplete="off" value="<?php echo $student[0]->name; ?>">
                                        <div class="error" id="errorstudentname"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Enrollment Date :</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker" value="<?php echo date("m/d/Y"); ?>" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Email Address :</label>
                                        <input type="text" class="form-control" id="emailaddress" placeholder="Enter Email Address" autocomplete="off" value="<?php echo $student[0]->email; ?>">
                                        <div class="error" id="erroremailaddress"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number :</label>
                                        <input type="text" class="form-control" id="phonenumber" placeholder="Enter Phone Number" autocomplete="off" value="<?php echo $student[0]->phone; ?>">
                                        <div class="error" id="errorphone"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Gender :</label>
                                        <div class="radio">
                                            <input name="gender" value="Male" type="radio" id="Option_1" <?php if($student[0]->gender=="Male"){echo "checked";} ?>>
                                            <label for="Option_1">Male</label>
                                            &nbsp;&nbsp;
                                            <input name="gender" value="Female" type="radio" id="Option_2" <?php if($student[0]->gender=="Female"){echo "checked";} ?>>
                                            <label for="Option_2">Female</label> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="phoneNumber1">Parents Phone Number :</label>
                                        <input type="text" class="form-control" id="pphonenumber" placeholder="Enter Parents Phone Number" autocomplete="off" value="<?php echo $student[0]->pphone; ?>">
                                        <div class="error" id="errorparentsphone"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>College/School Name :</label>
                                        <input type="text" class="form-control" id="collegename" placeholder="Enter School/College Name" autocomplete="off" value="<?php echo $student[0]->college; ?>">
                                        <div class="error" id="errorcollege"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address :</label>
                                        <textarea id="address" class="form-control" rows="4" placeholder="Enter Permanent Address"><?php echo $student[0]->address; ?></textarea>
                                        <div class="error" id="erroraddress"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Qualification :</label>
                                        <input type="text" class="form-control" id="qualification" placeholder="Enter Qualification" autocomplete="off" value="<?php echo $student[0]->qualification; ?>">
                                        <div class="error" id="errorqualification"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Birthdate :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask="" id="birthdate" value="<?php echo $student[0]->birthdate; ?>">
                                        </div>
                                        <div class="error" id="errorbirth"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Enrolled In</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Select Course : </label>
                                        <select class="form-control select2 w-p100" id="course">
                                            <option hidden="" value="">Select</option>
                                            <?php 
                                                foreach($courselist as $value)
                                                {
                                                ?>
                                                    <option value="<?php echo $value->course_id; ?>" style=""><?php echo $value->course_name; ?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                        <div class="error" id="errorcourse"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Course Fees : </label>
                                        <input type="text" class="form-control" id="coursefees" placeholder="Enter Course Fees" autocomplete="off">
                                        <div class="error" id="errorrfees"></div>
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
    $('#course').change(function(){
        var courseid = $('#course').val();

        $.ajax({
            url : "<?php echo base_url(); ?>Course/get_coursefees/"+courseid,
            success : function(response)
            {
                console.log(response);
                $('#coursefees').val(response);
            }
        });
    });

    $('#sbmt').click(function(){
        var date = $('#datepicker').datepicker({ dateFormat: 'dd-mm-yy' }).val();

        var studentname = $('#studentname').val();
        var emailaddress = $('#emailaddress').val();
        var gender = $('input[name=gender]:checked').val();
        var phonenumber = $('#phonenumber').val();
        var collegename = $('#collegename').val();
        var pphonenumber = $('#pphonenumber').val();
        var address = $('#address').val();
        var qualification = $('#qualification').val();
        var registration = $('#datepicker').val();
        var course = $('#course').val();
        var fees = $('#coursefees').val();
        var birthdate = $('#birthdate').val();
        
        var f = new FormData();
        f.append('studentname',studentname);
        f.append('emailaddress',emailaddress);
        f.append('gender',gender);
        f.append('phonenumber',phonenumber);
        f.append('collegename',collegename);
        f.append('pphonenumber',pphonenumber);
        f.append('qualification',qualification);
        f.append('address',address);
        f.append('registration',registration);
        f.append('course',course);
        f.append('fees',fees);
        f.append('birthdate',birthdate);

        for(var i of f.values())
        {
            console.log(i);
        }

        $.ajax({
            url : "<?php echo base_url(); ?>Enroll/register_student",
            data: f,
            dataType : "JSON",
            type: "POST",
            processData: false,
            contentType: false,
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
                        if(d[i].search('Student Name') > 0)
                        {
                            $('#errorstudentname').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                        if(d[i].search('Email Address') > 0)
                        {
                            $('#erroremailaddress').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                        if(d[i].search('Phone Number') > 0)
                        {
                            $('#errorphone').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                        if(d[i].search('College Name') > 0)
                        {
                            $('#errorcollege').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                        if(d[i].search('Parent Contact Number') > 0)
                        {
                            $('#errorparentsphone').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                        if(d[i].search('The Address field is required.') > 0)
                        {
                            $('#erroraddress').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                        if(d[i].search('Qualification') > 0)
                        {
                            $('#errorqualification').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                        if(d[i].search('Course') > 0)
                        {
                            $('#errorcourse').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                        if(d[i].search('Fees') > 0)
                        {
                            $('#errorrfees').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                        if(d[i].search('Birth Date') > 0)
                        {
                            $('#errorbirth').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                    }    
                }
                else
                {
                    swal({
                        title:"Good Job",
                        text:"SuccessFully Enrolled Student",
                        type:"success",
                        allowOutsideClick: false,
                        animation: false,
                        customClass: 'animated tada'
                    });
                    $('.swal2-confirm').click(function(){
                        window.location.href='<?php echo base_url(); ?>Enroll/Enroll_studentlist';
                    });
                }
            }
        });
    });
    
    $('#cancel').click(function(){
        window.location.href="<?php echo base_url(); ?>Enroll/Enroll_studentlist";
    });
</script>
</body>

</html>
