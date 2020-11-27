<?php
    $custcode=$this->session->userdata('custid');
    //$generalsetting=$this->Model->model_select('generalsettings');
?>
<!DOCTYPE html>

<html class="no-js" lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <meta name="description" content="Estato is HTML5 Template for houses, apartmanents and vacation rentals. If you have houses for rent - you need to check our template!">
    <meta name="author" content="CreateIT">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="keywords" content="real estate template, real estate agency, html5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">

    <title> Due List </title>

    <script src="<?php echo base_url();?>user/cdn-cgi/apps/head/CZ3CFmKcMfCcupa_86mxMcuVsN8.js">
        
    </script><link rel="icon" href="<?php echo base_url();?>user/assets/images/demo-content/estato-favicon.png">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>user/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>user/assets/css/style.css">
    <link href="<?php echo base_url();?>admin/assets/css/icons.css" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url();?>user/assets/js/modernizr.custom.js"></script>
</head>
<body class="ct-headroom--scrollUpBoth cssAnimate">
<div id="ct-js-wrapper" class="ct-pageWrapper"></div>

<div class="ct-navbarMobile">
    <a class="navbar-brand" href="">
        <!-- <img src="<?php echo base_url();?>assets/uploads/logo/<?php $generalsetting[0]->logo; ?>" alt="Estato"></a> -->
    <a href="<?php echo base_url();?>index.php/Controller/logoutcust"><span style="font-size: 20px;"> <i class="ion-power" style="font-size: 20px;"></i> Log out</span></a>
</div>

<?php 
    include('topnav.php');
?>

<div class="ct-site--map">
    <div class="container">
        <a href="index.html">Home</a>
        <a href="agency.html">My Due List</a>
    </div>
</div>

<header class="ct-mediaSection" data-stellar-background-ratio="0.3" data-height="140" data-type="parallax" data-bg-image="<?php echo base_url();?>user/assets/images/demo-content/agency-parallax.jpg" data-bg-image-mobile="<?php echo base_url();?>user/assets/images/demo-content/agency-parallax.jpg">
    <div class="ct-mediaSection-inner">
        <div class="container">
            <div class="ct-u-displayTableVertical">
                 <div class="col-sm-7">
                    <div class="ct-textBox ct-u-text--white ct-u-displayTableCell">
                        <h2 class="text-uppercase">My Due List</h2>
                        <br>
                        <select class="form-control text-uppercase input-sm ct-input--border ct-u-text--white" required="" id="custdrop" name="custdrop">
                        </select>
                    </div>
                </div>
               <div class="col-sm-5 text-right" id="divbutton">
                    <br>
                    <div class="ct-buttonBox">
                        <a href="<?php echo base_url();?>index.php/Controller/load_afterlogin" class="btn btn-default btn-transparent--border ct-u-text--white btn-hoverWhite">My Profile</a>
                        <a href="<?php echo base_url();?>index.php/Controller/load_myproperty" class="btn btn-default btn-transparent--border ct-u-text--white btn-hoverWhite">My Property</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<header class="ct-mediaSection">
    <div class="ct-mediaSection-inner">
        <div class="container">
            <div class="row">
                <div class="text-center col align-self-center">
                    <h3 class="text-uppercase ct-u-text--white">Over Due List</h3>
                    <br><br>
                </div>
           </div>
        </div>
    </div>
</header>

<section class="ct-u-paddingBoth60">
    <div class="table-responsive" id="division">
        </div>
</section>

<footer>
    <?php include('userfooter.php'); ?>
</footer>


<!-- JavaScripts -->

<script data-cfasync="false" src="<?php echo base_url();?>user/cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script><script src="<?php echo base_url();?>user/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>user/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>user/assets/js/dependencies.js"></script>

<script src="<?php echo base_url();?>user/assets/js/select2/select2.min.js"></script>

<script src="<?php echo base_url();?>user/assets/js/slider-bootstrap/bootstrap-slider.js"></script>

<script src="<?php echo base_url();?>user/assets/form/js/contact-form.js"></script>

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
<script>
            function load_custdropdown()
            {
                $.ajax({
                    url : "<?php echo site_url('Controller/load_customerdropdown');?>",
                    type : "POST",
                    success : function(response)
                    {
                        document.getElementById('custdrop').innerHTML=response;
                        $('#custdrop').val(<?php echo $custcode; ?>);
                    }
                });
            }
            function show(custcode)
             {
                $.ajax({
                    url : "<?php echo site_url('Controller/custoverduelist/');?>"+custcode,
                    type : "POST",
                    success : function(response)
                    {
                        console.log(response);
                        document.getElementById("division").innerHTML=response;
                    }
                });
            }
            $(function(){
                load_custdropdown();
                 show(<?php echo $custcode;?>);
            });
            $('#custdrop').change(function(){
                show(<?php echo $custcode;?>);
            });
        </script>
</body>

<!-- Mirrored from estato.html.themeforest.createit.pl/agent.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Mar 2018 11:31:55 GMT -->
</html>
