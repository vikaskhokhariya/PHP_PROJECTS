<!DOCTYPE html>

<html class="no-js" lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <meta name="description" content="Estato is HTML5 Template for houses, apartmanents and vacation rentals. If you have houses for rent - you need to check our template!">
    <meta name="author" content="CreateIT">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="keywords" content="real estate template, real estate agency, html5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">
    <title> Login Customer </title>
    <script src="cdn-cgi/apps/head/CZ3CFmKcMfCcupa_86mxMcuVsN8.js"></script><link rel="icon" href="<?php echo base_url();?>user/assets/images/demo-content/estato-favicon.png">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>user/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>user/assets/css/style.css">
    <script src="<?php echo base_url();?>user/assets/js/modernizr.custom.js"></script>
</head>

<body class="ct-headroom--scrollUpBoth cssAnimate">

<?php
    include('hidenav.php');
    include('topnav.php');
    $array['i']='introduction';
    $this->load->view('userview/nav',$array); 
?>

<div class="ct-site--map">
    <div class="container">
        <a href="<?php echo base_url()?>index.php/Controller/user">Home</a>  
        <a href="">Login</a>      
    </div>
</div>

<header class="ct-mediaSection" data-stellar-background-ratio="0.3" data-height="630" data-type="parallax" data-bg-image="<?php echo base_url();?>user/assets/images/demo-content/registration-parallax.jpg" data-bg-image-mobile="<?php echo base_url();?>user/assets/images/demo-content/registration-parallax.jpg">
    <div class="ct-mediaSection-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="ct-headerText--normal">
                        <h2 class="text-uppercase ct-fw-600 ct-u-marginBottom70">
                            Customer
                            <span class="ct-u-text--motive">LOG IN</span>
                        </h2>
                    </div>
                    <div class="ct-iconBox ct-u-marginBottom40 ct-iconBox--2col">
                        <div class="ct-icon text-center ct-iconContainer--circle ct-iconContainer--circleHoverLight">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="ct-iconBox--description">
                            <span class="ct-title text-uppercase ct-fw-600">Great Experiance</span>
                            <span class="ct-text">Thanks to our content optimization you will get more visits to your property.</span>
                        </div>
                    </div>
                    <div class="ct-iconBox ct-u-marginBottom40 ct-iconBox--2col">
                        <div class="ct-icon text-center ct-iconContainer--circle ct-iconContainer--circleHoverLight">
                            <i class="fa fa-bolt"></i>
                        </div>
                        <div class="ct-iconBox--description">
                            <span class="ct-title text-uppercase ct-fw-600">Convert visitors</span>
                            <span class="ct-text">Property is surely a right of mankind as real as liberty.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form role="form" class="ct-formRegister pull-right">
                        <div class="form-group">
                            <div class="ct-form--label--type2">
                                <div class="ct-u-displayTableVertical">
                                    <div class="ct-u-displayTableCell">
                                        <div class="ct-input-group-btn">
                                            <button class="btn btn-primary">
                                                <i class="fa fa-user"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="ct-u-displayTableCell text-center">
                                        <span class="text-uppercase">LOGIN TO ACCOUNT</span>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-danger" role="alert" id="loginalert">
                                <strong>Email</strong> or <strong>Password</strong> are Wrong...
                            </div>

                            <div class="ct-form--item ct-u-marginBottom20">
                                <label>Your Email</label>
                                <input type="text" required class="form-control input-lg" placeholder="" id="email" name="email" autocomplete="off">
                            </div>
                            <div class="ct-form--item ct-u-marginBottom20">
                                <label>Password</label>
                                <input type="password" required class="form-control input-lg" placeholder="" id="password" autocomplete="off">
                            </div>
                            <div class="ct-form--item ct-u-marginBottom20">
                                <a href="#">Forgot Username / Password ?</a>
                            </div>
                            <div class="ct-form--item">
                                <button type="button" class="btn btn-warning center-block" onclick="login_customer()">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="ct-u-paddingBoth30 ct-js-section ct-section--inline" data-bg-color="#60a7d4">
    <div class="container">
        <div class="ct-u-displayTableVertical">
            <div class="ct-u-displayTableCell">
                <div class="ct-u-displayTableCell">
                    <img src="<?php echo base_url();?>user/assets/images/demo-content/logo-cta.png" alt="">
                </div>
                <div class="ct-u-displayTableCell">
                    <h4 class="text-uppercase">PURCHASE ESTATO WORDPRESS THEME NOW!</h4>
                </div>
            </div>
            <div class="ct-u-displayTableCell">
                <div class="ct-u-displayTableCell pull-right">
                    <a class="btn btn-default btn-transparent--border ct-u-text--white btn-hoverWhite" href="blog-single.html">Read More</a>
                    <a class="btn btn-dark btn-hoverWhite" href="http://themeforest.net/item/orlando-creative-infographics-html-template/9566814?ref=createit-pl">Purchase Estato</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ct-u-paddingBottom60 text-center">
    <div class="container">
        <div class="ct-heading ct-u-marginBoth60">
            <h3 class="text-uppercase">our partners</h3>
        </div>
        <div class="ct-js-owl" data-items="6" data-navigation="false" data-autoPlay="true" data-single="false" data-pagination="false">
            <div class="item"><img src="<?php echo base_url();?>user/assets/images/demo-content/content-partners-1.png" alt=""></div>
            <div class="item"><img src="<?php echo base_url();?>user/assets/images/demo-content/content-partners-2.png" alt=""></div>
            <div class="item"><img src="<?php echo base_url();?>user/assets/images/demo-content/content-partners-3.png" alt=""></div>
            <div class="item"><img src="<?php echo base_url();?>user/assets/images/demo-content/content-partners-4.png" alt=""></div>
            <div class="item"><img src="<?php echo base_url();?>user/assets/images/demo-content/content-partners-5.png" alt=""></div>
            <div class="item"><img src="<?php echo base_url();?>user/assets/images/demo-content/content-partners-6.png" alt=""></div>
            <div class="item"><img src="<?php echo base_url();?>user/assets/images/demo-content/content-partners-1.png" alt=""></div>
            <div class="item"><img src="<?php echo base_url();?>user/assets/images/demo-content/content-partners-2.png" alt=""></div>
        </div>
    </div>
</section>
<?php
include('footer.php');
?>
</div>
<!-- JavaScripts -->

<script data-cfasync="false" src="cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script><script src="<?php echo base_url();?>user/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>user/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>user/assets/js/dependencies.js"></script>

<script src="<?php echo base_url();?>user/assets/js/select2/select2.min.js"></script>

<script src="<?php echo base_url();?>user/assets/js/slider-bootstrap/bootstrap-slider.js"></script>



<script src="<?php echo base_url();?>user/assets/js/ct-mediaSection/jquery.stellar.min.js"></script>

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
                $('#loginalert').hide();
                $('#email').focus();
            });

            function login_customer()
            {
                email=$('#email').val();
                password=$('#password').val();

                formdata={
                    email:email,
                    password:password
                }

                 $.ajax({
                    url : "<?php echo site_url('Controller/loginuser');?>",
                    data : formdata,
                    type : "POST",
                    dataType : "JSON",
                    success : function(response)
                    {
                        console.log(response);
                        if(response.code==1)
                        {
                            $('#loginalert').show();
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

<!-- Mirrored from estato.html.themeforest.createit.pl/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Mar 2018 11:33:19 GMT -->
</html>
