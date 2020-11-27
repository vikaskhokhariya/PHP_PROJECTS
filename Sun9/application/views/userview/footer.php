<?php 
    $res=$this->Model->model_select('generalsettings');
?>

<footer>
    <section class="ct-mediaSection text-center ct-u-paddingBoth100" data-stellar-background-ratio="0.3" data-type="parallax" data-bg-image="<?php echo base_url();?>user/assets/images/demo-content/iconBox-parallax.jpg" data-bg-image-mobile="<?php echo base_url();?>user/assets/images/demo-content/iconBox-parallax.jpg">
    <div class="ct-mediaSection-inner">
        <div class="container">
            <div class="ct-heading ct-u-marginBottom60">
                <h3 class="text-uppercase ct-u-text--white"><i class="fa fa-leaf"></i> SUN 9 <i class="fa fa-leaf"></i></h3>
            </div>
            <div class="ct-decoration center-block ct-u-marginBottom60">
                <div class="ct-decoration--inner center-block"></div>
            </div>
            <div class="row ct-u-text--white">
                <div class="col-sm-6 col-md-3" id="footergallary">
                    <div class="ct-iconBox">
                        <div class="ct-icon ct-iconContainer--circle ct-iconContainer--circleHoverLight center-block ct-u-marginBottom30">
                            <i class="fa fa-picture-o"></i>
                        </div>
                        <div class="ct-iconBox--description">
                            <span class="ct-title ct-u-marginBottom20 ct-fw-600">Gallery</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3" id="footeraddress">
                    <div class="ct-iconBox">
                        <div class="ct-icon ct-iconContainer--circle ct-iconContainer--circleHoverLight center-block ct-u-marginBottom30">
                            <i class="fa fa-home"></i>
                        </div>
                        <div class="ct-iconBox--description">
                            <span class="ct-title ct-u-marginBottom20 ct-fw-600">Address</span>
                        </div>
                    </div>
                </div><div class="col-sm-6 col-md-3" id="footerourprojects">
                    <div class="ct-iconBox">
                        <div class="ct-icon ct-iconContainer--circle ct-iconContainer--circleHoverLight center-block ct-u-marginBottom30">
                            <i class="fa fa-life-ring"></i>
                        </div>
                        <div class="ct-iconBox--description">
                            <span class="ct-title ct-u-marginBottom20 ct-fw-600">Our Projects</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3" id="footercontactus">
                    <div class="ct-iconBox">
                        <div class="ct-icon ct-iconContainer--circle ct-iconContainer--circleHoverLight center-block ct-u-marginBottom30">
                            <i class="fa fa-qrcode"></i>
                        </div>
                        <div class="ct-iconBox--description">
                            <span class="ct-title ct-u-marginBottom20 ct-fw-600">Contact Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="ct-footer--extended ct-u-paddingBoth30">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <h4 class="text-uppercase ct-u-marginBottom30">About Us</h4>
                    <div class="ct-u-marginBottom30" style="text-justify:auto;text-align:justify;">
                        <span>
                            We grow seed of the company with aim to fulfil Needs, Dreams and make higher life standard of our Customers, Shareholders, Associates and everyone who engage with us. Now, Our roots become stronger, deeper and spreading branches to reach at destination. We shall always commit to give fruitful benefits from our wide range of business and products.
                        </span>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <h4 class="text-uppercase ct-u-marginBottom30">Address</h4>
                    <ul class="list-unstyled">
                        <li class="ct-u-marginBottom10">
                            <i class="fa fa-home"></i>
                            <span class="ct-fw-600">
                                Address : 
                            </span>
                            <span>
                                <?php echo $res[0]->address; ?>
                            </span>
                        </li>
                        <li class="ct-u-marginBottom10">
                            <i class="fa fa-envelope-o"></i>
                            <span class="ct-fw-600">
                                Email : 
                            </span>
                            <span>
                                <?php echo $res[0]->email; ?>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <h4 class="text-uppercase ct-u-marginBottom30">Contact Us</h4>
                    <ul class="list-unstyled ct-phoneNumbers ct-u-marginBottom30">
                        <li>
                            <i class="fa fa-phone"></i>
                            <span class="ct-fw-600"><?php echo $res[0]->phno; ?></span>
                        </li>
                        <li>
                            <i class="fa fa-fax"></i>
                            <span class="ct-fw-600"><?php echo $res[0]->altphno; ?></span>
                        </li>
                    </ul>
                    <ul class="ct-panel--socials ct-panel--navbar list-inline list-unstyled ct-u-marginBottom30">
                        <li>
                            <a href="<?php echo $res[0]->facebook; ?>" target="_blank">
                                <div class="ct-socials ct-socials--circle">
                                    <i class="fa fa-facebook"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $res[0]->twitter; ?>" target="_blank">
                                <div class="ct-socials ct-socials--circle">
                                    <i class="fa fa-twitter"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $res[0]->instagram; ?>" target="_blank">
                                <div class="ct-socials ct-socials--circle">
                                    <i class="fa fa-instagram"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <h4 class="text-uppercase ct-u-marginBottom30">Quick links</h4>
                    <div class="row">
                        <div class="ct-links">
                            <div class="col-md-6">
                                <a class="text-capitalize" href="<?php echo base_url();?>index.php/Controller/user"">Home</a>
                                <a class="text-capitalize" href="<?php echo base_url();?>index.php/Controller/load_introduction">Introduction</a>
                                <a class="text-capitalize" href="<?php echo base_url();?>index.php/Controller/load_gallary">Gallary</a>
                                <a class="text-capitalize" href="<?php echo base_url();?>index.php/Controller/load_ourprojects">Our Projects</a>
                                <a class="text-capitalize" href="<?php echo base_url();?>index.php/Controller/load_contactus">Contact Us</a>
                            </div>
                            <div class="col-md-6">
                                <a class="text-capitalize" href="<?php echo base_url();?>index.php/Controller/load_loginpage">Login</a>
                                <a class="text-capitalize" href="<?php echo base_url();?>index.php/Controller/load_contactus">Quick Questions</a>
                                <a class="text-capitalize" href="<?php echo base_url();?>index.php/Controller/load_introduction">News</a>
                                <a class="text-capitalize" href="<?php echo base_url();?>index.php/Controller/load_introduction">Events</a>
                                <a class="text-capitalize" href="<?php echo base_url();?>index.php/Controller/load_introduction">Annoucements</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<div class="ct-postFooter ct-u-paddingBoth20">
    <a href="#" class="ct-scrollUpButton ct-js-btnScrollUp">
       <span class="ct-sectioButton--square">
           <i class="fa fa-angle-double-up"></i>
       </span>
    </a>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <span class="ct-copyright"><?php echo $res[0]->footerline; ?></span>
                <ul class="icons list-unstyled list-inline">
                    <li>
                        <i class="fa fa-facebook" data-toggle="tooltip" data-placement="top" title="Facebook"></i>
                    </li>
                    <li>
                        <i class="fa fa-twitter" data-toggle="tooltip" data-placement="top" title="Twitter"></i>
                    </li>
                    <li>
                        <i class="fa fa-instagram" data-toggle="tooltip" data-placement="top" title="Instgram"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


