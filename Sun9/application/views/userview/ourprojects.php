<?php
    $resultant=$this->Model->model_select_all_projectlist_limit12();
    $slider=$this->Model->model_select_silder_list_limit4();
?>

<!DOCTYPE html>

<html class="no-js" lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <meta name="description" content="Estato is HTML5 Template for houses, apartmanents and vacation rentals. If you have houses for rent - you need to check our template!">
    <meta name="author" content="CreateIT">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="keywords" content="real estate template, real estate agency, html5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">

    <title>Our Projects</title>

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
    $array['i']='ourprojects';
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
<div class="container ct-u-marginBoth30">
    <div class="row">
        <div class="col-sm-4"> 
            <button class="btn btn-danger btn-block" type="button" value="outgoing" id="opro" onclick="oshow()">Outgoing</button>
        </div>
        <div class="col-sm-4">
            <button class="btn btn-dark btn-block" type="button" value="upcoming" id="uppro" onclick="upshow()">Upcoming</button>
        </div>
        <div class="col-sm-4">
            <button class="btn btn-danger btn-block" type="button" value="completed" id="cpro" onclick="cshow()">Completed</button>
        </div>
    </div>
    <div id="division" class="ct-u-marginBoth30">
    <div class="ct-section--products">
            <div class="row">
                <div class="col-md-8 col-lg-12">
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
                                    <div class="ct-main-content">
                                        <div class="ct-imageBox">
                                            <img src="<?php echo base_url();?>assets/uploads/project/<?php echo $value->projectpic; ?>" alt="" height="205px"><i class="fa fa-eye"></i>
                                        </div>
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
</div>
</div>
<?php 
    include('footer.php');
?>


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

<script type="text/javascript">
    
    function upshow()
    {
        var uppro=$('#uppro').val();
        $.ajax({
                        url : "<?php echo site_url('Controller/projectdisplay/');?>"+uppro,
                        type : "POST",
                        success : function(response)
                        {
                            console.log(response);
                            document.getElementById("division").innerHTML=response;
                        }
                    });
    }
    function cshow()
    {
        var cpro=$('#cpro').val();
        $.ajax({
                        url : "<?php echo site_url('Controller/projectdisplay/');?>"+cpro,
                        type : "POST",
                        success : function(response)
                        {
                            console.log(response);
                            document.getElementById("division").innerHTML=response;
                        }
                    });
        
    }
    function oshow()
    {
        var opro=$('#opro').val();
        
        
            $.ajax({
                        url : "<?php echo site_url('Controller/projectdisplay/');?>"+opro,
                        type : "POST",
                        success : function(response)
                        {
                            console.log(response);
                            document.getElementById("division").innerHTML=response;
                        }
                    });
        
        
            
    }

</script>


</body>

</html>
