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
                Student Enquiry
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
                                        <input type="text" class="form-control" id="studentname" placeholder="Enter Student Name" autocomplete="off">
                                        <div class="error" id="errorstudentname"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Email Address :</label>
                                        <input type="text" class="form-control" id="emailaddress" placeholder="Enter Email Address" autocomplete="off">
                                        <div class="error" id="erroremailaddress"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number :</label>
                                        <input type="text" class="form-control" id="phonenumber" placeholder="Enter Phone Number" autocomplete="off">
                                        <div class="error" id="errorphone"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Gender :</label>
                                        <div class="radio">
                                            <input name="gender" value="Male" type="radio" id="Option_1" checked>
                                            <label for="Option_1">Male</label>
                                            &nbsp;&nbsp;
                                            <input name="gender" value="Female" type="radio" id="Option_2" >
                                            <label for="Option_2">Female</label> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="phoneNumber1">Parents Phone Number :</label>
                                        <input type="text" class="form-control" id="pphonenumber" placeholder="Enter Parents Phone Number" autocomplete="off">
                                        <div class="error" id="errorparentsphone"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>College/School Name :</label>
                                        <input type="text" class="form-control" id="collegename" placeholder="Enter School/College Name" autocomplete="off">
                                        <div class="error" id="errorcollege"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address :</label>
                                        <textarea id="address" class="form-control" rows="4" placeholder="Enter Permanent Address"></textarea>
                                        <div class="error" id="erroraddress"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Qualification :</label>
                                        <input type="text" class="form-control" id="qualification" placeholder="Enter Qualification" autocomplete="off">
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
                                            <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask="" id="birthdate">
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
                            <h3 class="box-title">I Am Interested IN</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                    <div class="col-sm-3 col-md-3 col-xs-3">
                                        <div class="form-group">
                                            <div class="c-inputs-stacked">
                                                <input type="checkbox" name="interest" id="android" value="Android">
                                                <label for="android" class="block">Android</label>
                                                <input type="checkbox" name="interest" id="iOS" value="iOS">
                                                <label for="iOS" class="block">iOS</label>
                                                <input type="checkbox" name="interest" id="webdesigning" value="Web Designing"> 
                                                <label for="webdesigning" class="block">Web Designing</label>
                                                <input type="checkbox" name="interest" id="webdevelopment" value="Web Development">
                                                <label for="webdevelopment" class="block">Web Development</label>
                                                <input type="checkbox" name="interest" id="spokenenglish" value="Spoken English">
                                                <label for="spokenenglish" class="block">Spoken English</label>
                                            </div>
                                            <div class="error" id="errorinterest"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-xs-3">
                                        <div class="form-group">
                                            <div class="c-inputs-stacked">
                                                <input type="checkbox" name="interest" value="Python" id="python">
                                                <label for="python" class="block">Python</label>
                                                <input type="checkbox" name="interest" value="Node JS" id="nodejs">
                                                <label for="nodejs" class="block">Node JS</label>
                                                <input type="checkbox" name="interest" value="React JS" id="reactjs">
                                                <label for="reactjs" class="block">React JS</label>
                                                <input type="checkbox" name="interest" value="Angular JS" id="angularjs">
                                                <label for="angularjs" class="block">Angular JS</label>
                                                <input type="checkbox" name="interest" value="Fashion Design" id="fashiondesign">
                                                <label for="fashiondesign" class="block">Fashion Design</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-xs-3">
                                        <div class="form-group">
                                            <div class="c-inputs-stacked">
                                                <input type="checkbox" name="interest" value="ionic" id="ionic">
                                                <label for="ionic" class="block">ionic</label>
                                                <input type="checkbox" name="interest" value="Video Editing" id="videoediting">
                                                <label for="videoediting" class="block">Video Editing</label>
                                                <input type="checkbox" name="interest" value="C Programming" id="cprogramming">
                                                <label for="cprogramming" class="block">C Programming</label>
                                                <input type="checkbox" name="interest" value="Java" id="java">
                                                <label for="java" class="block">Java</label>
                                                <input type="checkbox" name="interest" value="Photoshop" id="photoshop">
                                                <label for="photoshop" class="block">Photoshop</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 col-xs-3">
                                        <div class="form-group">
                                            <div class="c-inputs-stacked">
                                                <input type="checkbox" name="interest" value="Graphic Designing" id="graphicdesign">
                                                <label for="graphicdesign" class="block">Graphic Designing</label>
                                                <input type="checkbox" name="interest" value="Digital Marketing" id="digitalmarketing">
                                                <label for="digitalmarketing" class="block">Digital Marketing</label>
                                                <input type="checkbox" name="interest" value="Game Development" id="gamedevelpment">
                                                <label for="gamedevelpment" class="block">Game Development</label>
                                                <input type="checkbox" name="interest" value="PHP" id="php">
                                                <label for="php" class="block">PHP</label>
                                                <input type="checkbox" name="interest" value="Ethical Hacking" id="ethicalhacking">
                                                <label for="ethicalhacking" class="block">Ethical Hacking</label>
                                            </div>
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
                            <h3 class="box-title">I Come to Know Simba Institute From</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                    <div class="col-sm-6 col-md-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="c-inputs-stacked">
                                                <input type="checkbox" id="Google Search" value="Google Search" name="reference">
                                                <label for="Google Search" class="block">Google Search</label>
                                                <input type="checkbox" id="School/College Seminar" value="School/College Seminar" name="reference">
                                                <label for="School/College Seminar" class="block">School/College Seminar</label>
                                                <input type="checkbox" id="Hoardings" value="Hoardings" name="reference">
                                                <label for="Hoardings" class="block">Hoardings</label>
                                            </div>
                                        </div>
                                        <div class="error" id="errorreference"></div>
                                    </div>
                                    <div class="col-sm-6 col-md-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="c-inputs-stacked">
                                                <input type="checkbox" id="Social Media" value="Social Media" name="reference">
                                                <label for="Social Media" class="block">Social Media</label>
                                                <input type="checkbox" id="FriendsParents/Relatives" value="Friends/Parents/Relatives" name="reference">
                                                <label for="FriendsParents/Relatives" class="block">Friends / Parents / Relatives</label>
                                                <input type="checkbox" id="Sulekha" value="Sulekha" name="reference">
                                                <label for="Sulekha" class="block">Sulekha</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="c-inputs-stacked">
                                                <input type="checkbox" id="Classboat" value="Classboat" name="reference">
                                                <label for="Classboat" class="block">Classboat</label>
                                                <input type="checkbox" id="Others" value="Others" name="reference">
                                                <label for="Others" class="block">Others</label>
                                            </div>
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
                            <h3 class="box-title">Remember Me</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Remember Date:</label>
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
                                        <label>Detail :</label>
                                        <textarea id="rememberdetail" class="form-control" rows="4" placeholder="Enter Detail of Remember"></textarea>
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
        var favorite1 = [];
        var favorite2 = [];

        var studentname = $('#studentname').val();
        var emailaddress = $('#emailaddress').val();
        var gender = $('input[name=gender]:checked').val();
        var phonenumber = $('#phonenumber').val();
        var collegename = $('#collegename').val();
        var pphonenumber = $('#pphonenumber').val();
        var address = $('#address').val();
        var qualification = $('#qualification').val();
        var rememberdate = $('#datepicker').val();
        var rememberdetail = $('#rememberdetail').val();
        var birthdate = $('#birthdate').val();
            
        $.each($("input[name='interest']:checked"), function(){            
            favorite1.push($(this).val());
        });
        var interest = favorite1.join(",");

        $.each($("input[name='reference']:checked"), function(){            
            favorite2.push($(this).val());
        });
        var reference = favorite2.join(",");

        var f = new FormData();
        f.append('studentname',studentname);
        f.append('emailaddress',emailaddress);
        f.append('gender',gender);
        f.append('phonenumber',phonenumber);
        f.append('collegename',collegename);
        f.append('pphonenumber',pphonenumber);
        f.append('qualification',qualification);
        f.append('address',address);
        f.append('interest',interest);
        f.append('reference',reference);
        f.append('rememberdate',rememberdate);
        f.append('rememberdetail',rememberdetail);
        f.append('birthdate',birthdate);

        for(var i of f.values())
        {
            console.log(i);
        }

        $.ajax({
            url : "<?php echo base_url(); ?>Student/register_student",
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
                        if(d[i].search('Interest') > 0)
                        {
                            $('#errorinterest').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                        if(d[i].search('Reference') > 0)
                        {
                            $('#errorreference').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
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
                        text:"Enquiry Registered SuccessFully",
                        type:"success",
                        allowOutsideClick: false,
                        animation: false,
                        customClass: 'animated tada'
                    });
                    $('.swal2-confirm').click(function(){
                        window.location.href='<?php echo base_url(); ?>Student/Enquiry_List';
                    });
                }
            }
        });
    });

    $('#cancel').click(function(){
        window.location.href="<?php echo base_url(); ?>Student/Enquiry_List";
    });
</script>

</body>

</html>
