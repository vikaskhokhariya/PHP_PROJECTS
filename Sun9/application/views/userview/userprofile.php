<?php
    $custcode=$this->session->userdata('custid');
    $res=$this->Model->model_select('customertb',array('cust_code'=>$custcode));
    $cityid=$res[0]->cityid;
    $res1=$this->Model->model_select('city',array('city_id'=>$cityid));
    $stateid=$res[0]->stateid;
    $res2=$this->Model->model_select('state',array('StateID'=>$stateid));
    $res3=$this->Model->model_select('feedbacktb',array('cust_code'=>$custcode));
    $setting=$this->Model->model_select('generalsettings');
    // echo $custcode;
    // exit();
?>
<!DOCTYPE html>

<html class="no-js" lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <meta name="description" content="Estato is HTML5 Template for houses, apartmanents and vacation rentals. If you have houses for rent - you need to check our template!">
    <meta name="author" content="CreateIT">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="keywords" content="real estate template, real estate agency, html5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">

    <title>Customer Profile</title>

    <script src="<?php echo base_url();?>user/cdn-cgi/apps/head/CZ3CFmKcMfCcupa_86mxMcuVsN8.js"></script>

    <link rel="icon" href="<?php echo base_url();?>user/assets/images/demo-content/estato-favicon.png">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>user/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>user/assets/css/style.css">
    <link href="<?php echo base_url();?>admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>admin/assets/plugins/bootstrap-rating/bootstrap-rating.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>admin/assets/plugins/bootstrap-rating/bootstrap-rating.min.js" rel="stylesheet" type="text/css">

    <!-- App css -->
       
        <link href="<?php echo base_url();?>admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>admin/assets/css/style.css" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert -->
    <link href="<?php echo base_url()?>admin/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <script src="<?php echo base_url();?>user/assets/js/modernizr.custom.js"></script>
</head>

<body class="ct-headroom--scrollUpBoth cssAnimate" id="top">

<div id="ct-js-wrapper" class="ct-pageWrapper"></div>

<div class="ct-navbarMobile">
    <a class="navbar-brand" href=""><img src="<?php echo base_url();?>user/assets/images/demo-content/logo.png" alt="Estato"></a>
    <a href="<?php echo base_url();?>index.php/Controller/logoutcust"><span style="font-size: 20px;"> <i class="ion-power" style="font-size: 20px;"></i> Log out</span></a>
</div>

<?php 
    include('topnav.php');
?>

<div class="ct-site--map">
    <div class="container">
        <a href="index.html">Home</a>
        <a href="index.html">My Profile</a>
    </div>
</div>

<div id="profilediv">
<header class="ct-mediaSection ct-u-paddingBoth50" data-stellar-background-ratio="0.3" data-height="470" data-type="parallax">
    <div class="container">
        <div class="ct-personBox ct-personBox--extended ct-personBox--extendedLight text-left row">
            <div class="col-sm-4">
                <img src="<?php echo base_url();?>assets/uploads/custprofile/<?php echo $res[0]->profile; ?>" alt="" class="img-thumbnail" height="250px" width="250px">
            </div>
            <div class="ct-personContent col-sm-8">
                <div class="ct-personName ct-u-paddingBoth10 text-uppercase">
                    <h3><?php echo $res[0]->cust_name;?> (Id : <?php echo $custcode; ?>)</h3>
                </div>
                <div class="ct-personDescription pull-right ct-u-paddingBoth20">
                    <ul class="list-unstyled ct-contactPerson pull-right">
                        <li>
                            <i class="fa fa-phone"></i>
                            <span class="text-uppercase"><?php echo $res[0]->cphno;?></span>
                        </li>
                        <li>
                            <i class="fa fa-briefcase"></i><span class="text-uppercase"><?php echo $res[0]->coccupation;?></span>
                        </li>
                        <li>
                            <i class="fa fa-mobile"></i>
                            <span class="text-uppercase"><?php echo $res[0]->caltphno;?></span>
                        </li>
                        <li>
                            <a href="https://www.gmail.com" target="_blank" onMouseOver="this.style.color='orange'" onMouseOut="this.style.color='white'"><i class="fa fa-envelope-o"></i> <span class="__cf_email__"><?php echo $res[0]->cemail;?></span></a>
                        </li>
                    </ul>
                </div>
                 <div class="ct-personDescription pull-right ct-u-paddingBoth20">
                    <ul class="list-unstyled ct-contactPerson pull-right">
                      <li>
                            <i class="fa fa-address-book"></i> <span class="text-uppercase"><?php echo $res[0]->caddress.", ".$res1[0]->city_name.", ".$res2[0]->StateName;?></span></a>
                        </li>
                        <li>
                            <i class="mdi mdi-pin"></i> <span class="text-uppercase"><?php echo $res[0]->cpincode;?></span></a>
                        </li>
                    </ul>
                </div>
                <div class="ct-buttonPanel text-capitalize ct-u-paddingBoth20 pull-right">
                    <div class="row">
                        <div class="col-sm-12">
                            <a class="btn btn-default btn-transparent--border ct-u-text--white btn-hoverWhite btn-block" id="btnchangepassword">Change Password</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="<?php echo base_url();?>index.php/Controller/load_myproperty" class="btn btn-default btn-transparent--border ct-u-text--white btn-hoverWhite btn-block">My Properties</a>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?php echo base_url();?>index.php/Controller/load_myduelist" class="btn btn-default btn-transparent--border ct-u-text--white btn-hoverWhite btn-block">my Due List</a>
                        </div>    
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
</div>
<div id="changepassworddiv">
<header class="ct-mediaSection ct-u-paddingBoth50" data-stellar-background-ratio="0.3" data-height="470" data-type="parallax">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <span style="color:white;font-size:35px;">Change Password</span>  
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-3">
                <span style="color:white;font-size:22px;">Old Password :</span>  
            </div>
            <div class="col-sm-4 text-center">
                <input type="password" class="form-control ct-input--border ct-u-text--dark" style="color: white;" id="oldpassword" tabindex="0" autofocus>
                <span id="oldpassworderror" style="color:white;"></span>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-3">
                <span style="color:white;font-size:22px;">New Password :</span>  
            </div>
            <div class="col-sm-4 text-center">
                <input type="password" class="form-control ct-input--border ct-u-text--dark" style="color: white;" id="newpassword">
                <span id="newpassworderror" style="color:white;"></span>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-3">
                <span style="color:white;font-size:22px;">Confirm Password :</span>  
            </div>
            <div class="col-sm-4 text-center">
                <input type="password" class="form-control ct-input--border ct-u-text--dark" style="color: white;" id="confirmpassword">
                <span id="confirmpassworderror" style="color:white;"></span>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <a class="btn btn-default btn-transparent--border ct-u-text--white btn-hoverWhite btn-block" id="changepassword">Change Password</a>
            </div>&nbsp;
            <div class="col-sm-3">
                <a class="btn btn-default btn-transparent--border ct-u-text--white btn-hoverWhite btn-block" id="btncancelchangepassword">Cancel</a>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</header>
</div>

<section class="ct-u-paddingBoth30 ct-js-section ct-section--inline" data-bg-color="#60a7d4">
    <div class="container">
        <div class="ct-u-displayTableVertical">
            <div class="ct-u-displayTableCell">
                <div class="ct-u-displayTableCell">
                    <img src="<?php echo base_url();?>assets/uploads/logo/<?php echo $setting[0]->logo; ?>" alt="logo" height="60" width="160" style="border:2px solid black;border-radius:5px;padding-left:5px;padding-right:5px; ">
                </div>
                <div class="ct-u-displayTableCell">
                    <h4 class="text-uppercase">This is real-estate-driven economy from top to bottom.</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ct-u-paddingBottom0">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-lg-3">
                <div class="p-4 text-center">
                    <h1 class="font-16 m-b-15">Rating</h1>
                    <input type="hidden" class="rating-tooltip-manual" data-fractions="3" data-filled="mdi mdi-star font-32 text-primary" data-empty="mdi mdi-star-outline font-32 text-muted" value=0 id="rate" name="rate"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group has-success ct-u-marginTop40">
                    <label class="ct-u-marginBottom10" for="inputSuccess1">Wht do you think about our website?</label>

                    <textarea  rows="10" class="form-control ct-input--border ct-u-text--dark ct-u-marginBottom10" id="description" name="description" required></textarea>
                   <div class="col-sm-4">
                    <div class="p-4 text-center text-danger">
                        <b><span id="deserror" style="font-weight:bold;"></span></b>
                    </div>
                 </div>
        
                </div>

            </div>
            </div>
         <div class="row">
            <div class="col-sm-12">
                <div class="ct-u-marginBottom60 ct-buttons--right20">
                         <button class="btn btn-primary" onclick="add_feedback()" >Submit </button>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="p-4" style="margin-left: 180px;">
    <h3>Reviews</h3>
</div>
      <?php 
      $num=0;
    foreach($res3 as $value)
    {
            $num=$num+1;
           // echo $value->rate;

?>
<section class="" style="margin-left: 180px;">
<div class="row">
    <div class="col-sm-8">

        <div class="ct-articleBox ct-articleBox--list">
            <div class="ct-calendar--day text-center">
                            <div class="ct-day">
                                <span>
                                <?php
                                if($num<10)
                                {
                                  echo "0".$num;  
                                } 
                                else
                                {
                                    echo $num;
                                }
                                ?>
                                </span>
                            </div>
                            <div class="ct-month">
                               <br>
                            </div>
                        </div>
      
                 <div class="ct-articleBox-titleBox text-uppercase">
                    <div class="row text-left" style="margin-right: 350px">
                    <div class="col-sm-12">
                        <div class="p-2">
                            <?php 
                        if(empty($value->rate))
                        { ?>
                            <span style="font-weight: bold">No any review</span>
                    <?php   }
                            else
                        { ?>
                            
                        <?php
                            $str = strpos($value->rate, '.');
                            if($str==true)
                            {
                                $stars=$value->rate;
                                $star=substr($stars,0,1);
                                $empty_star=5-($star+1);
                                for($i=1;$i<=$star;$i++)
                                { ?>
                                    
                                    <span class="fa fa-star" style="color:rgb(96, 167, 212);"></span>
                            <?php   } ?>
                                    <span class="fa fa-star-half-o" style="color:rgb(96, 167, 212);"></span>

                            <?php   for($j=1;$j<=$empty_star;$j++)
                                { ?>
                                    <span class="fa fa-star-o" style="color:rgb(96, 167, 212);"></span>
                            <?php   }
                            }   
                            else
                            {
                                //echo "not";
                                $star=$value->rate;
                                $empty_star=5-$star;
                                //echo $empty_star;
                                for($i=1;$i<=$star;$i++)
                                { ?>
                                    
                                    <span class="fa fa-star" style="color:orange"></span>
                            <?php   }
                                for($j=1;$j<=$empty_star;$j++)
                                { ?>
                                    <span class="fa fa-star-o" style="color:orange"></span>
                            <?php   }
                            }
                        ?>
                        
                    </span> 
                    <?php   }
                    ?>
                         </div>
                    </div>
                </div>

                    <div class="ct-articleBox-meta">
                        <span style="font-size: 15px;color: black;"><?php echo $value->description?></span>
                    </div>
                    <div class="ct-articleComments">
                        <span><?php 
                        $dt1=$value->datetime;

                        echo $value->datetime?></span>
                    </div>

                </div>
                
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>
<?php } ?> 

<footer>
    <?php include('userfooter.php'); ?>
</footer>
</div>
<!-- JavaScripts -->

<script data-cfasync="false" src="<?php echo base_url();?>user/cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script>
<script src="<?php echo base_url();?>user/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>user/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>user/assets/js/dependencies.js"></script>

<script src="<?php echo base_url();?>user/assets/js/select2/select2.min.js"></script>

<script src="<?php echo base_url();?>user/assets/js/slider-bootstrap/bootstrap-slider.js"></script>

<script src="<?php echo base_url();?>user/assets/form/js/contact-form.js"></script>

<script src="<?php echo base_url();?>user/assets/js/ct-mediaSection/jquery.stellar.min.js"></script>

<script src="<?php echo base_url();?>user/assets/js/owl/owl.carousel.min.js"></script>

<script src="<?php echo base_url();?>user/assets/js/main.js"></script>

<!-- Sweet-Alert  -->
<script src="<?php echo base_url()?>admin/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url()?>admin/assets/pages/sweet-alert.init.js"></script>

<script src="<?php echo base_url();?>admin/assets/plugins/bootstrap-rating/bootstrap-rating.min.js"></script>

<script src="<?php echo base_url();?>admin/assets/pages/rating-init.js"></script>

<script type="text/javascript">
    $(function(){
        $('#footercontactus').click(function(){
            window.location.href="load_contactus";
        });

        $('#footergallary').click(function(){
            window.location.href="load_gallary";
        });

        $('#footerourprojects').click(function(){
            window.location.href="load_ourprojects";
        });

        $('#footeraddress').click(function(){
            $('html, body').animate({
                scrollTop: $("#bottom").offset().top
            }, 2000);
        });
    });
</script>


<script type="text/javascript">
    $(function(){
        $('#changepassworddiv').hide();

        $('#btnchangepassword').click(function(){
            $('#oldpassworderror').hide();
            $('#newpassworderror').hide();
            $('#confirmpassworderror').hide();

            $('#oldpassword').val('');
            $('#newpassword').val('');
            $('#confirmpassword').val('');
            $('#oldpassword').focus();

            $('html,body').animate({
                scrollTop:$('#top').offset().top
            },2000);
            $('#profilediv').hide();
            $('#changepassworddiv').slideDown(1000);
        });

        $('#btncancelchangepassword').click(function(){
            $('#oldpassworderror').hide();
            $('#newpassworderror').hide();
            $('#confirmpassworderror').hide();

            $('html,body').animate({
                scrollTop:$('#top').offset().top
            },2000);
            $('#changepassworddiv').hide();
            $('#profilediv').slideDown(1000);
        });

        $('#changepassword').click(function(){
            $('#oldpassworderror').hide();
            $('#newpassworderror').hide();
            $('#confirmpassworderror').hide();

            var oldpassword=$('#oldpassword').val();
            var newpassword=$('#newpassword').val();
            var confirmpassword=$('#confirmpassword').val();

            if(oldpassword=='')
            {
                $('#oldpassworderror').html("Enter Old Password").slideDown(1000);
            }
            if(newpassword=='')
            {
                $('#newpassworderror').html("Enter New Password").slideDown(1000);
            }
            if(confirmpassword=='')
            {
                $('#confirmpassworderror').html("Enter Confirm Password").slideDown(1000);
            }

            if(oldpassword!='' && newpassword!='' && confirmpassword!='')
            {
                $.ajax({
                    url : "<?php echo site_url('Controller/check_old_password/');?>"+oldpassword+"/"+<?php echo $custcode?>,
                    type : "POST",
                    dataType : "JSON",
                    success : function(response)
                    {
                        console.log(response);

                        if(response.code==1)
                        {
                            var lang = newpassword.length;
                            if(lang < 5 || lang > 25)
                            {
                                $('#newpassworderror').html("Password Must Between 5 to 25 Character length").slideDown(1000);
                            }
                            else
                            {
                                if(newpassword == confirmpassword)
                                {
                                    $.ajax({
                                        url : "<?php echo site_url("Controller/change_password/"); ?>"+newpassword+"/"+confirmpassword+"/"+<?php echo $custcode?>,
                                        type : "POST",
                                        //dataType : "JSON",
                                        success : function(response)
                                        {
                                            swal({
                                                title:"Good Job",
                                                text:"<span style='font-size:20px;font-weight:bold;'>Password Successfully Changed...</span>",
                                                type:"success",
                                                allowOutsideClick: false
                                            });
                                            $('.swal2-confirm').click(function(){
                                                $('#changepassworddiv').hide();
                                                $('#profilediv').slideDown(1000);
                                            });
                                        }
                                    });
                                }
                                else
                                {
                                    $('#confirmpassworderror').html("Password Not Match").slideDown(1000);
                                }
                            }
                        }
                        else
                        {
                            $('#oldpassworderror').show();
                            $('#oldpassworderror').html("Old Password Does Not Match");
                        }
                    }
                });
            }
        });
    });

    function add_feedback()
    {
        rate=$('#rate').val();
        description=$('#description').val();

        formdata={
            rate:rate,
            description:description
        }

        $.ajax({
            url : "<?php echo site_url('Controller/feedback/');?>"+<?php echo $custcode;?>,
            data : formdata,
            type : "POST",
            dataType : "JSON",

            success : function(response)
            {
                console.log(response);
                 if(response.code===1)
                {
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
                        if(d[i].search('Rate field') > 0)
                        {
                            $('#rateerror').html(d[i]).slideDown('slow');
                        }
                         if(d[i].search('Description field') > 0)
                        {
                            $('#deserror').html(d[i]).slideDown('slow');
                        }
                    }
                }
                else
                {
                    window.location.href="load_afterlogin";
                }
            }
            });
        }
</script>

</body>

</html>
