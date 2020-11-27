<?php
    $setting=$this->Model->model_select('generalsettings');
    $review=$this->Model->model_select_customer_review_limit5();
    $upcoming=$this->Model->model_select_upcomingprojectlist_limit5();
    $resultant=$this->Model->model_select_all_projectlist_limit12();
    $slider=$this->Model->model_select_silder_list_limit4();
    //print_r($slider);
    //exit();
?>
<!DOCTYPE html>

<html class="no-js" lang="en"> 

<head lang="en">
    <meta charset="UTF-8">
    <meta name="description" content="Estato is HTML5 Template for houses, apartmanents and vacation rentals. If you have houses for rent - you need to check our template!">
    <meta name="author" content="CreateIT">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="keywords" content="real estate template, real estate agency, html5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">

    <title>Index</title>

    <script src="<?php echo base_url();?>user/cdn-cgi/apps/head/CZ3CFmKcMfCcupa_86mxMcuVsN8.js"></script>
    <link rel="icon" href="<?php echo base_url();?>user/assets/images/demo-content/estato-favicon.png">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>user/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>user/assets/css/style.css">
    <link href="<?php echo base_url();?>admin/assets/css/icons.css" rel="stylesheet" type="text/css" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="<?php echo base_url();?>user/assets/images/favicon.ico">
    <script src="<?php echo base_url();?>user/assets/js/modernizr.custom.js"></script>

    <style type="text/css">
        .ui-menu-item
        {
            list-style-type:none;
            z-index: 1000;
            background-color:white;
            width:310px;
            border-radius:25px;
            cursor: pointer;
            border-bottom:1px solid black;
        }
        .ui-menu-item:hover .ui-menu-item-wrapper
        {
            background-color:#60a7d4;
            color:white;
            font-weight:bold;
        }
        .ui-menu-item-wrapper
        {
            background-color: white;
            line-height:50px;
            padding-left: 10px;
            border-radius:5px;
            z-index: 1000;
        }
    </style>
</head>

<body class="ct-headroom--hideMenu cssAnimate">

    <?php
        include('hidenav.php');
        include('topnav.php');
        $array['i']='home';
        $this->load->view('userview/nav',$array); 
    ?>

    <header>
        <div class="ct-js-owl" data-items="1" data-navigation="true" data-autoPlay="true" data-lazyLoad="true" data-animations="true">
            <?php 
                foreach($slider as $value)
                {
                    $statedata=$this->Model->model_select('state',array('StateID'=>$value->stateid));
                    $statename=$statedata[0]->StateName;
            ?>
            <div class="item">
                <div class="ct-owl--background">
                    <img src="<?php echo base_url();?>assets/uploads/project/<?php echo $value->projectpic; ?>" alt="" width="100%" height="450px">
                </div>
                <div class="ct-owl--description">
                    <div class="ct-owl--description--inner">
                        <div class="ct-owl--descriptionItem">
                            <div class="container">
                                
                                <div class="ct-itemProducts ct-u-marginBottom30 ct-hover ct-itemProducts--slider animated" data-fx="fadeInRight" data-time="300">
                                    <a>
                                        <div class="ct-main-content">
                                            <div class="ct-main-text">
                                                <div class="ct-product--tilte">
                                                    <?php echo $value->ptitle; ?>
                                                </div>
                                                <div class="ct-product--price">
                                                    <span><?php echo $value->price; ?></span>
                                                </div>
                                                <div class="ct-product--description">
                                                    <?php echo $value->pdescription; ?>
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
                                                <span><?php echo $statename; ?></span>
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
    </header>
<section>
    <div class="container">
    <form class="ct-formSearch--extended ct-u-marginBottom50" role="form">
        <div class="form-group ">
            <div class="ct-form--label--type1">
                <div class="ct-u-displayTableVertical">
                    <div class="ct-u-displayTableCell">
                        <div class="ct-input-group-btn">
                            <button class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="ct-u-displayTableCell text-center">
                        <span class="text-uppercase">Search for property</span>
                    </div>
                </div>
            </div>
            <div class="alert alert-danger col-sm-6" role="alert" id="searchalert1">
                <strong>Opps!!!</strong> Please fill at lease one field...
            </div>
            <div class="ct-u-displayTableVertical ct-u-marginBottom20">
                <div class="ct-u-displayTableCell">
                    <?php 
                        $res=$this->Model->model_select_state('state');
                    ?>
                    <div class="ct-form--item">
                        <label>State</label>
                        <input type="text" class="form-control input-lg" autocomplete="off" id="state1">
                    </div>
                </div>
                <div class="ct-u-displayTableCell">
                    <div class="ct-form--item">
                        <label>City</label>
                        <input type="text" class="form-control input-lg" autocomplete="off" id="city1">
                    </div>
                </div>
            </div>
            <div class="ct-u-displayTableVertical ct-slider--row ct-sliderAmount">
                <div class="ct-u-displayTableCell">
                    <div class="ct-form--item">
                        <label>Property Price (&#x20b9;)</label>
                        <input type="text" value="0" class="form-control input-lg ct-js-slider-min" id="minprice1">
                    </div>
                </div>
                <div class="ct-u-displayTableCell">
                    <input type="text" class="slider ct-js-sliderAmount" value="" data-slider-tooltip="hide" data-slider-handle="square" data-slider-min="50000" data-slider-max="10000000" data-slider-step="1000" data-slider-value="[1000,100000]" style="">
                    <label>Min</label>
                    <label class="pull-right">Max</label>
                </div>
                <div class="ct-u-displayTableCell">
                    <div class="ct-form--item">
                        <input type="text" value="0" class="form-control input-lg ct-js-slider-max" id="maxprice1">
                    </div>
                </div>
                <div class="ct-u-displayTableCell">
                    <button type="button" class="btn btn-warning text-capitalize pull-right" id="searchproperty1">Search Property</button>
                </div>
            </div>
        </div>
    </form>

        <div class="ct-section--products" id="searchtargetdiv">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <div class="ct-heading ct-u-marginBottom30">
                        <h3 class="text-uppercase">Resultant Listing</h3>
                    </div>
                    <div class="row" id="searchresultdiv">
                        <?php 
                            foreach($resultant as $value)
                            {
                        ?>
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="ct-itemProducts ct-u-marginBottom30 ct-hover">
                                <label class="control-label sale">
                                    <?php echo $value->ptype; ?>
                                </label>
                                <a>
                                    <div class="ct-main-content">
                                        <div class="ct-imageBox">
                                            <img src="<?php echo base_url();?>assets/uploads/project/<?php echo $value->projectpic; ?>" alt="" height="205px"><i class="fa fa-eye"></i>
                                        </div>
                                        <div class="ct-main-text">
                                            <div class="ct-product--tilte">
                                                <?php echo $value->ptitle; ?>
                                            </div>
                                            <div class="ct-product--price">
                                                <span>RS : <?php echo $value->price; ?></span>
                                            </div>
                                            <div class="ct-product--description">
                                                <?php echo $value->pdescription; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ct-product--meta">
                                        <div class="ct-icons">
                                            <span>
                                                <!-- <i class="fa fa-bed"></i> 3 -->
                                            </span>
                                            <span>
                                                <!-- <i class="fa fa-cutlery"></i> 2 -->
                                            </span>
                                        </div>
                                        <div class="ct-text">
                                            <!-- <span> Area: <span>105 m2</span></span> -->
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3">
                    <div class="ct-js-sidebar">
                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <div class="widget ct-widget--recentlyReduced">
                                    
                                    <div class="widget-inner">
                                        <h4 class="text-uppercase">Upcoming project</h4>
                                        <?php
                                        foreach($upcoming as $value)
                                            {
                                        ?>
                                        <div class="ct-itemProducts--small ct-itemProducts--small-type1">
                                            <a>
                                                <div class="ct-main-content">
                                                    <div class="ct-imageBox">
                                                        <img src="<?php echo base_url();?>assets/uploads/project/<?php echo $value->projectpic; ?>" alt="" height="65px">
                                                    </div>
                                                    <div class="ct-main-text">
                                                        <div class="ct-product--tilte">
                                                            <?php echo $value->ptitle; ?>
                                                        </div>
                                                        <div class="ct-product--price">
                                                            <span>RS : <?php echo $value->price; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="ct-product--tilte">
                                                        <?php echo $value->pdescription; ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <?php 
                                            } 
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
                    <a class="btn btn-default btn-transparent--border ct-u-text--white btn-hoverWhite" id="readmoreaboutus">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ct-u-paddingBoth60 ct-js-section" data-bg-color="#f3f3f3">
    <div class="container">
        <div class="ct-heading ct-u-marginBottom30">
            <h3 class="text-uppercase">latest listings</h3>
        </div>
        <div class="ct-js-owl ct-owl-controls--type2" data-single="false" data-items="4" data-pagination="false">
            <?php 
                foreach($resultant as $value)
                {
            ?>
            <div class="item">
                <div class="ct-itemProducts ct-u-marginBottom30 ct-hover">
                    <label class="control-label sale">
                        <?php echo $value->ptype; ?>
                    </label>
                    <a>
                        <div class="ct-main-content">
                            <div class="ct-imageBox">
                                <img src="<?php echo base_url();?>assets/uploads/project/<?php echo $value->projectpic; ?>" alt="" height="205px"><i class="fa fa-eye"></i>
                            </div>
                            <div class="ct-main-text">
                                <div class="ct-product--tilte">
                                    <?php echo $value->ptitle; ?>
                                </div>
                                <div class="ct-product--price">
                                    <span>RS : <?php echo $value->price; ?></span>
                                </div>
                                <div class="ct-product--description">
                                    <?php echo $value->pdescription; ?>
                                </div>
                            </div>
                        </div>
                        <div class="ct-product--meta">
                            <div class="ct-icons">
                                <span>
                                    <!-- <i class="fa fa-bed"></i> 3 -->
                                </span>
                                <span>
                                    <!-- <i class="fa fa-cutlery"></i> 2 -->
                                </span>
                            </div>
                            <div class="ct-text">
                                <!-- <span> Area: <span>105 m2</span></span> -->
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<section class="ct-u-paddingBoth60 ct-blog--small">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="ct-heading ct-u-marginBottom30">
                    <h3 class="text-uppercase">Customer Reviews</h3>
                </div>
                <?php 
                    foreach($review as $value)
                    {
                        $customerdetails=$this->Model->model_select('customertb',array('cust_code'=>$value->cust_code));

                        $date = $value->datetime;
                        $day=substr($date, 0,2);
                        $month=substr($date, 3,2);
                        $year=substr($date, 6,4);
                        $time=substr($date, 11);

                        $dateObj   = DateTime::createFromFormat('!m', $month);
                        $monthName = $dateObj->format('F');
                ?>
                <div class="ct-u-marginBottom30">
                    <div class="ct-articleBox ct-articleBox--list">
                        <div class="ct-calendar--day text-center" style="width:120px;">
                            <div class="ct-day">
                                <span><?php echo $day; ?></span>
                            </div>
                            <div class="ct-month">
                                <span class="text-uppercase"><?php echo $monthName; ?></span>
                            </div>
                        </div>
                        <div class="ct-articleBox-media">
                            <img src="<?php echo base_url();?>assets/uploads/custprofile/<?php echo $customerdetails[0]->profile; ?>" alt="">
                        </div>
                        <div class="ct-articleBox-titleBox text-uppercase">

                            <a href="blog-single.html"><?php echo $customerdetails[0]->cust_name; ?></a>
                            <div class="ct-articleBox-meta">
                                <span><?php echo $value->description; ?></span>
                            </div>
                            <div class="ct-articleComments">
                                <span>
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
                                            
                                            <span class="fa fa-star" style="color:rgb(96, 167, 212);"></span>
                                    <?php   }
                                        for($j=1;$j<=$empty_star;$j++)
                                        { ?>
                                            <span class="fa fa-star-o" style="color:rgb(96, 167, 212);"></span>
                                    <?php   }
                                    }
                                ?>
                                
                            </span> 
                            <?php   }
                            ?>
                                </span>
                                <div class="ct-articleComments" style="margin-top:5px;">
                                    <span><?php echo $year; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $time; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            <?php } ?>
                <a class="btn btn-primary btn-transparent--border ct-u-text--motive ct-u-marginBottom30" id="readmoreaboutus1">Read More About us</a>
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

<?php 
    include('footer.php');
?>

</div>

<div id="bottom"></div>

<!-- JavaScripts -->
<script data-cfasync="false" src="<?php echo base_url();?>user/cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script><script src="<?php echo base_url();?>user/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>user/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>user/assets/js/dependencies.js"></script>

<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>

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

<script type="text/javascript">
    var statedata=[];
    var citydata=[];

    function load_statedata()
    {
        $.ajax({
            url : "<?php echo site_url('Controller/load_state_data_for_property_search'); ?>",
            method : "POST",
            dataType : "JSON",
            success:function(response)
            {
                for(i=0;i<response.length;i++)
                {
                    statedata[i]=response[i].StateName;
                }
            }
        });
    }

    function load_citydata()
    {
        $.ajax({
            url : "<?php echo site_url('Controller/load_city_data_for_property_search'); ?>",
            method : "POST",
            dataType : "JSON",

            success:function(response)
            {
                for(i=0;i<response.length;i++)
                {
                    citydata[i]=response[i].city_name;
                }
            }
        });
    }

    function viewmoreproperty()
    {
        location.reload();
    }

    $(function(){
        load_statedata();
        load_citydata();
        $('#searchalert').hide();
        $('#searchalert1').hide();

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

        $('#searchproperty').click(function(){
            var state=$('#state').val();
            var city=$('#city').val();
            var minsqrprice=$('#minprice').val();
            var maxsqrprice=$('#maxprice').val();

            if(minsqrprice==0)
            {
                minsqrprice='';
            }
            if(maxsqrprice==0)
            {
                maxsqrprice='';
            }

            formdata = {
                state:state,
                city:city,
                minprice:minsqrprice,
                maxprice:maxsqrprice
            }

            if(state=='' && city=='' && minsqrprice==0 && maxsqrprice==0)
            {
                $('#searchalert').slideDown(1000).delay(2000).slideUp(1000);
            }
            else
            {
                $.ajax({
                    url : "<?php echo site_url('Controller/search_properties'); ?>",
                    method : "POST",
                    data : formdata,

                    success:function(response)
                    {
                        console.log(response);
                        $('#searchresultdiv').html(response);
                        $('html,body').animate({
                            scrollTop:$('#searchtargetdiv').offset().top-100
                        },2000);
                    }
                });
            }
        });

        $('#searchproperty1').click(function(){
            var state=$('#state1').val();
            var city=$('#city1').val();
            var minsqrprice=$('#minprice1').val();
            var maxsqrprice=$('#maxprice1').val();

            if(minsqrprice==0)
            {
                minsqrprice='';
            }
            if(maxsqrprice==0)
            {
                maxsqrprice='';
            }

            formdata = {
                state:state,
                city:city,
                minprice:minsqrprice,
                maxprice:maxsqrprice
            }

            if(state=='' && city=='' && minsqrprice==0 && maxsqrprice==0)
            {
                $('#searchalert1').slideDown(1000).delay(2000).slideUp(1000);
            }
            else
            {
                $.ajax({
                    url : "<?php echo site_url('Controller/search_properties'); ?>",
                    method : "POST",
                    data : formdata,

                    success:function(response)
                    {
                        console.log(response);
                        $('#searchresultdiv').html(response);
                        $('html,body').animate({
                            scrollTop:$('#searchtargetdiv').offset().top-100
                        },2000);
                    }
                });
            }
        });

        $( "#state" ).autocomplete({
            source:function(request,response)
            {
                var result=$.ui.autocomplete.filter(statedata,request.term);
                response(result.slice(0,5))
            }
        });

        $( "#city" ).autocomplete({
            source:function(request,response)
            {
                var result1=$.ui.autocomplete.filter(citydata,request.term);
                response(result1.slice(0,5))
            }
        });

        $( "#state1" ).autocomplete({
            source:function(request,response)
            {
                var result=$.ui.autocomplete.filter(statedata,request.term);
                response(result.slice(0,5))
            }
        });

        $( "#city1" ).autocomplete({
            source:function(request,response)
            {
                var result1=$.ui.autocomplete.filter(citydata,request.term);
                response(result1.slice(0,5))
            }
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
                        window.location.href="user";
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
