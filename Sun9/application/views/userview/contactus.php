<?php 
    $ressetting=$this->Model->model_select('generalsettings');
    // print_r($ressetting);
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

    <title>Contact Us</title>

    <script src="<?php echo base_url();?>user/cdn-cgi/apps/head/CZ3CFmKcMfCcupa_86mxMcuVsN8.js"></script>
    <link rel="icon" href="<?php echo base_url();?>user/assets/images/demo-content/estato-favicon.png">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>user/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>user/assets/css/style.css">
    <link href="<?php echo base_url();?>admin/assets/css/icons.css" rel="stylesheet" type="text/css" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="<?php echo base_url();?>user/assets/images/favicon.ico">

    <script src="<?php echo base_url();?>user/assets/js/modernizr.custom.js"></script>
</head>

<body class="ct-headroom--hideMenu cssAnimate">

<?php
    include('hidenav.php');
    include('topnav.php');
    $array['i']='contactus';
    $this->load->view('userview/nav',$array); 
?>

<section class="ct-u-paddingBottom60 ct-u-paddingTop40 ct-blog--small">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="ct-heading ct-u-marginBottom20">
                            <h4 class="text-uppercase ct-fw-600">address details</h4>
                        </div>
                        <div>
                            <?php 
                                echo str_replace(",",",<br>",$ressetting[0]->address);
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ct-heading ct-u-marginBottom20">
                            <h4 class="text-uppercase ct-fw-600">direct contact</h4>
                        </div>
                        <ul class="list-unstyled ct-phoneNumbers ct-u-marginBottom30">
                            <li>
                                <i class="fa fa-phone"></i>
                                <span><?php echo $ressetting[0]->phno; ?></span>
                            </li>
                            <li>
                                <i class="fa fa-fax"></i>
                                <span><?php echo $ressetting[0]->altphno; ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="ct-heading ct-u-marginBottom20">
                            <h4 class="text-uppercase ct-fw-600">emails</h4>
                        </div>
                        <div class="ct-contactList ">
                            <a class="ct-u-marginBottom10" href="#">
                                <i class="fa fa-envelope-o"></i>
                                    <span class="__cf_email__">
                                        <?php
                                            echo $ressetting[0]->email;
                                        ?>
                                    </span>
                                </a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="ct-heading ct-u-marginBottom20">
                            <h4 class="text-uppercase ct-fw-600">social networks</h4>
                        </div>
                        <ul class="ct-panel--socials ct-panel--navbar list-unstyled ct-u-marginBottom30">
                            <li class="ct-u-marginBottom10">
                                <a href="<?php echo $ressetting[0]->facebook; ?>" target="_blank">
                                    <div class="ct-socials ct-socials--circle">
                                        <i class="fa fa-facebook"></i>
                                    </div>
                                    Facebook Profile
                                </a>
                            </li>
                            <li class="ct-u-marginBottom10">
                                <a href="<?php echo $ressetting[0]->twitter; ?>" target="_blank">
                                    <div class="ct-socials ct-socials--circle">
                                        <i class="fa fa-twitter"></i>
                                    </div>
                                    Twitter Profile
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $ressetting[0]->instagram; ?>" target="_blank">
                                    <div class="ct-socials ct-socials--circle">
                                        <i class="fa fa-instagram"></i>
                                    </div>
                                    Instagram Profile
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a class="btn btn-primary btn-transparent--border ct-u-text--motive ct-u-marginBottom10" id="readmoreaboutus">
                    Read More About Us
                </a>
            </div>

            <div class="col-md-4">
                <div class="ct-heading ct-u-marginBottom30">
                    <h3 class="text-uppercase">Questions ?</h3>
                </div>
                <form class="contactForm validateIt ct-contactForm--small" data-email-subject="Contact Form" data-show-errors="true" style="background-color:#333333;opacity: 0.95;z-index:7000;">
                    <div class="form-group">
                        <div class="ct-form--label--type2">
                            <div class="ct-u-displayTableVertical">
                                <div class="ct-u-displayTableCell">
                                    <div class="ct-input-group-btn">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-envelope-o"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="ct-u-displayTableCell text-center">
                                    <span class="text-uppercase">Send us a message</span>
                                </div>
                            </div>
                        </div>
                        <div class="ct-form--item ct-u-marginBottom20">
                            <label style="color:white;">Your Name</label>
                            <input id="contact_name" type="text" class="form-control input-lg" style="background-color:#333333;opacity: 0.95;z-index:7000;color:white;">
                            <span style="color:#ED3A06;font-weight:bold;" id="conatctnameerror"></span>
                        </div>
                        <div class="ct-form--item ct-u-marginBottom20">
                            <label style="color:white;">Email</label>
                            <input id="youremail" type="text" class="form-control input-lg" style="background-color:#333333;opacity: 0.95;z-index:7000;color:white;">
                            <span style="color:#ED3A06;font-weight:bold;" id="emailerror"></span>
                        </div>
                        <div class="ct-form--item ct-u-marginBottom20">
                            <label style="color:white;">Contact Number</label>
                            <input id="yournumber" type="text" class="form-control input-lg" style="background-color:#333333;opacity: 0.95;z-index:7000;color:white;">
                            <span style="color:#ED3A06;font-weight:bold;" id="contacterror"></span>
                        </div>
                        <div class="ct-form--item ct-u-marginBottom20">
                            <label style="color:white;">Message</label>
                            <textarea id="message" placeholder="How can we help you?" class="form-control input-lg" rows="4" style="background-color:#333333;opacity: 0.95;z-index:7000;color:white;" placeholder="How can we help you?"></textarea>
                            <span style="color:#ED3A06;font-weight:bold;" id="messageerror"></span>
                        </div>
                        <div class="ct-form--item">
                            <button type="button" class="btn btn-warning center-block" id="sendmessage">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<div class="ct-u-paddingBottom10">
    <iframe src="<?php echo $ressetting[0]->gmap; ?>" width="100%" height="450" frameborder="0"></iframe>
</div>

<section class="ct-u-paddingBoth30 ct-js-section ct-section--inline" data-bg-color="#60a7d4">
    <div class="container">
        <div class="ct-u-displayTableVertical">
            <div class="ct-u-displayTableCell">
                <div class="ct-u-displayTableCell">
                    <h4 class="text-uppercase">This is real-estate-driven economy from top to bottom.</h4>
                </div>
            </div>
            <div class="ct-u-displayTableCell">
                <div class="ct-u-displayTableCell pull-right">
                    <a class="btn btn-default btn-transparent--border ct-u-text--white btn-hoverWhite" id="readmoreaboutus1">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="ct-u-paddingTop10">
    <?php include('footer.php'); ?>
</footer>
<div id="bottom"></div>


<!-- JavaScripts -->
<script data-cfasync="false" src="<?php echo base_url();?>user/cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script>
<script src="<?php echo base_url();?>user/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>user/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>user/assets/js/dependencies.js"></script>

<script src="<?php echo base_url();?>user/assets/js/select2/select2.min.js"></script>

<script src="<?php echo base_url();?>user/assets/js/slider-bootstrap/bootstrap-slider.js"></script>

<script src="<?php echo base_url();?>user/assets/js/ct-mediaSection/jquery.stellar.min.js"></script>
<script src="<?php echo base_url();?>user/assets/form/js/contact-form.js"></script>

<script src="<?php echo base_url();?>user/assets/js/gmaps/gmap3.min.js"></script>

<script src="<?php echo base_url();?>user/assets/js/owl/owl.carousel.min.js"></script>

<script src="<?php echo base_url();?>user/assets/js/main.js"></script>

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
        $('#readmoreaboutus').click(function(){
            $('html, body').animate({
                scrollTop: $("#bottom").offset().top
            }, 2000);
        });
        $('#readmoreaboutus1').click(function(){
            $('html, body').animate({
                scrollTop: $("#bottom").offset().top
            }, 2000);
        });
        $('#sendmessage').click(function(){
            $('#conatctnameerror').hide();
            $('#emailerror').hide();
            $('#contacterror').hide();
            $('#messageerror').hide();

            name=$('#contact_name').val();
            email=$('#youremail').val();
            contact=$('#yournumber').val();
            message=$('#message').val();

            formdata={
                name : name,
                email : email,
                contact : contact,
                message : message
            }

            $.ajax({
                url : "<?php echo site_url('Controller/add_question'); ?>",
                method : "POST",
                data : formdata,
                dataType : "JSON",

                success : function(response)
                {
                    console.log(response);
                    if(response.code==0)
                    {

                        window.location.href="load_contactus";
                    }
                    else
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
                            if(d[i].search('Name') > 0)
                            {
                                $('#conatctnameerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Email') > 0)
                            {
                                $('#emailerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Contact') > 0)
                            {
                                $('#contacterror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Message') > 0)
                            {
                                $('#messageerror').html(d[i]).slideDown('3500');
                            }
                        }                
                    }
                }
            });
        });
    });
</script>

</body>

</html>
