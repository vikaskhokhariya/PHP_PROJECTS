<?php 
    $news=$this->Model->model_select_news('newstb',array('allowed'=>1));
    $events=$this->Model->model_select_events('eventstb',array('allowed'=>1));
    $annoucement=$this->Model->model_annocement();
    $annoucementstring=str_replace('<p>',' ',$annoucement[0]->adescription);
?>

<!DOCTYPE html>

<html class="no-js" lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <meta name="description" content="Estato is HTML5 Template for houses, apartmanents and vacation rentals. If you have houses for rent - you need to check our template!">
    <meta name="author" content="CreateIT">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="keywords" content="real estate template, real estate agency, html5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">

    <title>Introduction</title>

    <script src="<?php echo base_url();?>user/cdn-cgi/apps/head/CZ3CFmKcMfCcupa_86mxMcuVsN8.js"></script>
    <link rel="icon" href="<?php echo base_url();?>user/assets/images/demo-content/estato-favicon.png">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>user/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>user/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Kavivanar|Roboto+Mono|Josefin+Sans|Acme">

    <link href="<?php echo base_url();?>admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
    
    <!-- App Icons -->
    <link rel="shortcut icon" href="<?php echo base_url();?>user/assets/images/favicon.ico">

    <script src="<?php echo base_url();?>user/assets/js/modernizr.custom.js"></script>

    <style type="text/css">
        .mystyle1
        {
            padding-top:1%;
        }
        .mystyle2{
            padding-bottom:7.7%;
            padding-top:4%;
            box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            transform:scale(1);
        }
        .mystyle3{
            padding-bottom:10.5%;
            padding-top:1%;
        }
    </style>
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
        <a href="index.html">Home</a>
        <a href="properties.html">Introduction</a>
    </div>
</div>

<marquee width="100%" style="background-color:#333333;color:white;height:50px;font-size:20px;">
    Annoucement : <?php echo $annoucementstring; ?>
</marquee>
<section class="ct-u-paddingBoth10">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 mystyle1" id="div1">
                <div class="ct-heading ct-u-marginBottom10 text-center">
                   <h3 class="text-uppercase" style="text-shadow: 0px 1px 1px #4d4d4d;color: #222;font: 30px 'Acme';">
                        Introduction
                    </h3>
                </div>
                <p class="ct-u-marginBottom20" style="font-size:15px;font-family:Josefin Sans;text-justify:auto;text-align:justify;">
                    We grow seed of the company with aim to fulfil Needs, Dreams and make higher life standard of our Customers, Shareholders, Associates and everyone who engage with us. Now, Our roots become stronger, deeper and spreading branches to reach at destination. We shall always commit to give fruitful benefits from our wide range of business and products.
               </p>
            </div>
            <div class="col-sm-4 mystyle2" id="div2">
                <div class="ct-heading ct-u-marginBottom10 text-center">
                   <h3 class="text-uppercase" style="text-shadow: 0px 1px 1px #4d4d4d;color: #222;font: 30px 'Acme';text-justify:auto;text-align:justify;">
                        Mission
                    </h3>
                </div>
                <p class="ct-u-marginBottom20" style="font-size:15px;font-family:Josefin Sans">
                    Empowering thousands of individuals and families to create and grow wealth through a variety of best-in-class products and services.
                </p>
            </div>
            <div class="col-sm-4 mystyle3"  id="div3">
                <div class="ct-heading ct-u-marginBottom10 text-center">
                   <h3 class="text-uppercase" style="text-shadow: 0px 1px 1px #4d4d4d;color: #222;font: 30px 'Acme';text-justify:auto;text-align:justify;">
                        Vision
                    </h3>
                </div>
                <p class="ct-u-marginBottom20" style="font-size:15px;font-family:Josefin Sans">
                   Helping people from all walks of life to reach their ambitious goals
                </p>
            </div>
        </div><br><br>
    </div>
</section>
<br>
<section class="ct-u-paddingBottom10">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3 class="text-uppercase ct-heading ct-u-marginBottom20" style="text-shadow: 0px 1px 1px #4d4d4d;color: #222;font: 50px 'Acme';">
                    News
                </h3>
            </div>
        </div>
    </div>
</section>

<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="ct-js-owl" data-items="1" data-navigation="true" data-autoPlay="true" data-lazyLoad="true" data-animations="true">
                    <?php
                        foreach($news as $value)
                        {
                    ?>
                    <div class="item">
                        <div class="ct-owl--background">
                            <img src="<?php echo base_url();?>assets/uploads/news/<?php echo $value->newspic; ?>" alt="" height="500px" width="100%">
                        </div>
                        <div class="ct-owl--description">
                            <div class="ct-owl--description--inner">
                                <div class="ct-owl--descriptionItem">
                                    <div class="container">
                                        <div class="ct-itemProducts ct-u-marginBottom30 ct-hover ct-itemProducts--slider animated" data-fx="fadeInRight" data-time="300">
                                            <a href="product-single.html">
                                                <div class="ct-main-content">
                                                    <div class="ct-main-text">
                                                        <div class="ct-product--tilte">
                                                            <?php echo $value->ntitle; ?>
                                                        </div>
                                                        <div class="ct-product--description">
                                                            <?php echo $value->ndescription; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ct-product--meta">
                                                    <div class="ct-icons">
                                                        <span>
                                                            
                                                        </span>
                                                        <span>
                                                            
                                                        </span>
                                                    </div>
                                                    <div class="ct-text">
                                                        <span> Sun9 </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                </div>      
            </div>
        </div>
    </div>
</header>
<br>

<section class="ct-u-paddingBottom10">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3 class="text-uppercase ct-heading ct-u-marginBottom20" style="text-shadow: 0px 1px 1px #4d4d4d;color: #222;font: 50px 'Acme';">
                    Events
                </h3>
            </div>
        </div>
    </div>
</section>

<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="ct-js-owl" data-items="1" data-navigation="true" data-autoPlay="true" data-lazyLoad="true" data-animations="true">
                    <?php
                        foreach($events as $value)
                        {
                    ?>
                    <div class="item">
                        <div class="ct-owl--background">
                            <img src="<?php echo base_url();?>assets/uploads/events/<?php echo $value->eventpic; ?>" alt="" height="500px" width="100%">
                        </div>
                        <div class="ct-owl--description">
                            <div class="ct-owl--description--inner">
                                <div class="ct-owl--descriptionItem">
                                    <div class="container">
                                        <div class="ct-itemProducts ct-u-marginBottom30 ct-hover ct-itemProducts--slider animated" data-fx="fadeInRight" data-time="300">
                                            <a href="product-single.html">
                                                <div class="ct-main-content">
                                                    <div class="ct-main-text">
                                                        <div class="ct-product--tilte">
                                                            <?php echo $value->etitle; ?>
                                                        </div>
                                                        <div class="ct-product--description">
                                                            <?php echo $value->edescription; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ct-product--meta">
                                                    <div class="ct-icons">
                                                        <span>
                                                            
                                                        </span>
                                                        <span>
                                                            
                                                        </span>
                                                    </div>
                                                    <div class="ct-text">
                                                        <span> Sun9 </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                </div>      
            </div>
        </div>
    </div>
</header>
<br>

<footer>
    <?php include('footer.php'); ?>
</footer>
</div>
<!-- JavaScripts -->

<script data-cfasync="false" src="<?php echo base_url();?>user/cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script><script src="<?php echo base_url();?>user/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>user/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>user/assets/js/dependencies.js"></script>

<script src="<?php echo base_url();?>user/assets/js/select2/select2.min.js"></script>

<script src="<?php echo base_url();?>user/assets/js/slider-bootstrap/bootstrap-slider.js"></script>

<script src="<?php echo base_url();?>user/assets/js/ct-mediaSection/jquery.stellar.min.js"></script>

<script src="<?php echo base_url();?>user/assets/js/owl/owl.carousel.min.js"></script>

<script src="<?php echo base_url();?>user/assets/form/js/contact-form.js"></script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIjilmMEnfn4h1qOfm3eubSf6PuvGAZzs"></script>
<script src="<?php echo base_url();?>user/assets/js/gmaps/gmap3.min.js"></script>

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

<script src="../apis.google.com/js/platform.js" async defer></script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "../connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script src="<?php echo base_url();?>user/assets/js/main.js"></script>

</body>

</html>
