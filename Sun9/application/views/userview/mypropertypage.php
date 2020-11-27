<?php
    $custcode=$this->session->userdata('custid');
    $res=$this->Model->model_select('customertb',array('cust_code'=>$custcode));
    $cityid=$res[0]->cityid;
    $res1=$this->Model->model_select('city',array('city_id'=>$cityid));
    $stateid=$res[0]->stateid;
    $res2=$this->Model->model_select('state',array('StateID'=>$stateid));

    $planid=$res[0]->cplan;
    $res3=$this->Model->model_select('plantb',array('plan_code'=>$planid));

    $res4=$this->Model->model_select('purchasetb',array('cust_code'=>$custcode));
            
    // echo $custcode;
    // exit();
     //print_r($res6);
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

    <title> My Property </title>

    <!-- Sweet Alert -->
    <link href="<?php echo base_url()?>admin/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

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
    <a class="navbar-brand" href=""><img src="<?php echo base_url();?>user/assets/images/demo-content/logo.png" alt="Estato"></a>
    <a href="<?php echo base_url();?>index.php/Controller/logoutcust"><span style="font-size: 20px;"> <i class="ion-power" style="font-size: 20px;"></i> Log out</span></a>
</div>

<?php 
    include('topnav.php');
?>

<div class="ct-site--map">
    <div class="container">
        <a href="index.html">Home</a>
        <a href="properties.html">My Properties</a>
    </div>
</div>
<header class="ct-mediaSection" data-stellar-background-ratio="0.3" data-height="140" data-type="parallax" data-bg-image="<?php echo base_url();?>user/assets/images/demo-content/agency-parallax.jpg" data-bg-image-mobile="<?php echo base_url();?>user/assets/images/demo-content/agency-parallax.jpg">
    <div class="ct-mediaSection-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="ct-textBox ct-u-text--white ct-u-displayTableCell">
                        <h2 class="text-uppercase">My Properties</h2>
                        <br>
                        <select class="form-control text-uppercase input-sm ct-input--border ct-u-text--white" required="" id="propertyid" name="propertyid">
                        </select>
                    </div>
                </div>
                <div class="col-sm-5 text-right" id="beforelinkpropertydiv">
                    <br>
                    <a id="btnlinkproperty" class="btn btn-sm btn-default btn-transparent--border btn-hoverWhite ct-u-text--white">Link Property</a>
                    <div class="ct-buttonBox">
                        <a href="<?php echo base_url();?>index.php/Controller/load_afterlogin" class="btn btn-default btn-transparent--border ct-u-text--white btn-hoverWhite">My Profile</a>
                        <a href="<?php echo base_url();?>index.php/Controller/load_myduelist" class="btn btn-default btn-transparent--border ct-u-text--white btn-hoverWhite">My Due List</a>
                    </div>
                </div>
                <div class="col-sm-5 text-right" id="progressbardiv">
                    <br><br><br>
                    <div class="ct-progressBar">
                    <div class="ct-progressBar-title text-uppercase" style="color: white;">Loading...</div>
                    <div class="ct-progressBar-container">
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="progress">
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                
                <div class="col-sm-5 text-right" id="linkpropertydiv">
                     <br><br>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" id="customerid" class="form-control ct-input--border ct-u-text--dark" style="color: white;">
                        </div>
                        <div class="col-sm-6">
                            <a id="linksubmit" class="btn btn-default btn-transparent--border ct-u-text--white btn-hoverWhite">Submit</a>&nbsp;
                            <a id="linkcancel" class="btn btn-default btn-transparent--border ct-u-text--white btn-hoverWhite">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<header class="ct-mediaSection">
    <div class="ct-mediaSection-inner">
        <div class="container">

            <div class="text-center">
                <h3 class="text-uppercase ct-u-text--white"><div id="propertyname"><i class="fa fa-leaf"></i>&nbsp;<?php echo $res3[0]->pname; ?> &nbsp;<i class="fa fa-leaf"></i></div></h3>
                <br>
            </div>
        </div>
    </div>
</header>
<section class="ct-u-paddingBoth60">
    <div class="container" id="propertydetailsdiv">
        <div class="row">
            <div class="col-sm-1"></div>
                <div class="col-sm-10 col-lg-10">
                    <div class="ct-js-sidebar">
                        <div class="ct-heading ct-u-marginBottom20">
                            <h3 class="text-uppercase">Summary</h3>
                        </div>
                        <div class="ct-u-displayTableVertical ct-productDetails">
                            <div class="ct-u-displayTableRow">
                                <div class="ct-u-displayTableCell">
                                    <span class="ct-fw-600">Price</span>
                                </div>
                                <div class="ct-u-displayTableCell text-right">
                                    <span class="ct-price">&#x20B9 <?php echo $res4[0]->totalamount; ?></span>
                                </div>
                            </div>
                            <div class="ct-u-displayTableRow">
                                <div class="ct-u-displayTableCell">
                                    <span class="ct-fw-600">Area</span>
                                </div>
                                <div class="ct-u-displayTableCell text-right">
                                    <span><?php echo $res4[0]->squarefeet; ?> <b>sq ft</b></span>
                                </div>
                            </div>
                            <div class="ct-u-displayTableRow">
                                <div class="ct-u-displayTableCell">
                                    <span class="ct-fw-600">Price per sq ft</span>
                                </div>
                                <div class="ct-u-displayTableCell text-right">
                                    <span><?php echo $res4[0]->squarefeetprice; ?></span>
                                </div>
                            </div>
                            <div class="ct-u-displayTableRow">
                                <div class="ct-u-displayTableCell">
                                    <span class="ct-fw-600">Plan Duration</span>
                                </div>
                                <div class="ct-u-displayTableCell text-right">
                                    <span><?php echo $res3[0]->pmonth; ?></span>
                                </div>
                            </div>
                            <div class="ct-u-displayTableRow">
                                <div class="ct-u-displayTableCell">
                                    <span class="ct-fw-600">Total EMI</span>
                                </div>
                                <div class="ct-u-displayTableCell text-right">
                                    <span><?php echo $res4[0]->totalEMI; ?></span>
                                </div>
                            </div>
                            <div class="ct-u-displayTableRow">
                                <div class="ct-u-displayTableCell">
                                    <span class="ct-fw-600">EMI Value</span>
                                </div>
                                <div class="ct-u-displayTableCell text-right">
                                    <span><?php echo $res4[0]->EMIvalue; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-sm-1"></div>
        </div>
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

<script src="<?php echo base_url();?>user/assets/js/progressbars/init.js"></script>

<!-- Sweet-Alert  -->
<script src="<?php echo base_url()?>admin/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url()?>admin/assets/pages/sweet-alert.init.js"></script>

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
    function load_propertydropdown()
    {
        $.ajax({
            url : "<?php echo site_url('Controller/load_propertydropdown');?>",
            type : "POST",
            success : function(response)
            {
                document.getElementById('propertyid').innerHTML=response;
                $('#propertyid').val(<?php echo $custcode; ?>);
            }
        });
    }

    function linkproperty()
    {
        var customerid1=$('#customerid').val();
        var customerid2='<?php echo $custcode; ?>';

        formdata={
            customerid1 : customerid1,
            customerid2 : customerid2
        }

        $.ajax({
            url : "<?php echo site_url('Controller/link_property'); ?>",
            data : formdata,
            method : 'POST',
            dataType : 'JSON',
            success : function(response)
            {
                console.log(response);
                if(response.code==1)
                {
                    var i=0;
                    
                    while(i<=100)
                    {
                        setTimeout(function(){
                            $('#progress').css('width',i+'%');
                        },500);   
                        i++;   
                    }

                    if(i > 99)
                    {
                        setTimeout(function(){
                            swal({
                                title:"Good Job",
                                text:"<span style='font-size:20px;font-weight:bold;'>successFully Linked...</span>",
                                type:"success",
                                allowOutsideClick: false
                            });
                            $('.swal2-confirm').click(function(){
                                $('#progressbardiv').hide(); 
                                $('#beforelinkpropertydiv').slideDown(1000);
                                location.reload();
                            });
                            $('#progressbardiv').hide();
                            $('#beforelinkpropertydiv').slideDown(1000); 
                        },2000);  
                    }
                    $('.swal2-confirm').click(function(){
                        $('#progressbardiv').hide(); 
                        $('#beforelinkpropertydiv').slideDown(1000);
                    });
                }
                else if(response.msg=='notmatch')
                {
                    $('#progressbardiv').slideUp('fast');
                    $('#beforelinkpropertydiv').slideDown(1000);
                    swal({
                        title:"Opps..",
                        text:"<span style='font-size:20px;font-weight:bold;'>you are going wrong...</span>",
                        type:"error"
                    });

                    $('.swal2-confirm').click(function(){
                        $('html,body').animate({
                            scrollTop:$('#top').offset().top-220
                        },2000);
                    });
                }
            }
        });
    }  

    $(function(){
        load_propertydropdown();
        $('#linkpropertydiv').hide();
        $('#progressbardiv').hide();

        $('#btnlinkproperty').click(function(){
            $('#progress').css('width','0%');
            $('#beforelinkpropertydiv').slideUp(1000);
            $('#linkpropertydiv').slideDown(1000);
            $('#customerid').val('');
            $('#customerid').focus();
        });

        $('#propertyid').change(function(){
            var pval=$('#propertyid').val();

            $.ajax({
                url : "<?php echo site_url('Controller/customer_property_details/');?>"+pval,
                type : "POST",
                dataType : "JSON",
                success : function(response)
                {
                    console.log(response);
                    $('#propertydetailsdiv').html(response.data1);
                    $('#propertyname').html(response.data2);
                }
            });
        });

        $('#linkcancel').click(function(){
            $('#linkpropertydiv').slideUp(1000);
            $('#beforelinkpropertydiv').slideDown(1000);
        });

        $('#linksubmit').click(function(){
            $('#linkpropertydiv').slideUp(1000);
            //$('#progressbardiv').slideDown('fast');
            
            var customerid1=$('#customerid').val();

            if(customerid1 != '')
            {

            $.ajax({
                url : "<?php echo site_url('Controller/customer_existornot/'); ?>"+customerid1,
                method : 'POST',
                dataType : 'JSON',
                success : function(response)
                {
                    console.log(response);
                    if(response.code==1)
                    {
                        $('#progressbardiv').slideDown('fast');
                        linkproperty();
                    }
                    else
                    {
                        $('#linkpropertydiv').slideUp(1000);
                        $('#beforelinkpropertydiv').slideDown(1000);

                        swal({
                            title:"Opps..",
                            text:"<span style='font-size:20px;font-weight:bold;'>Customer Not Found...</span>",
                            type:"error"
                        });
                    }
                }
            }); 
            }
            else
            {
                $('#linkpropertydiv').slideUp(1000);
                $('#beforelinkpropertydiv').slideDown(1000);

                swal({
                        title:"Opps..",
                        text:"<span style='font-size:20px;font-weight:bold;'>Please Enter CustomerId...</span>",
                        type:"error"
                    });
            }  
        });
    });

</script>

</body>

</html>
