<?php 
    $res=$this->Model->model_select('generalsettings');
    // print_r($res);
    // exit();
?>
<nav class="navbar yamm" role="navigation" data-heighttopbar="40px" data-startnavbar="0">
    <div class="container">
        <div class="navbar-header ct-panel--navbar">
            <a href="<?php echo base_url();?>index.php/Controller/user">
                <img src="<?php echo base_url();?>assets/uploads/logo/<?php echo $res[0]->logo; ?>" alt="logo" height="75" width="130">
            </a>
        </div>
        <div class="ct-panelBox">
            <div class="ct-panel--text ct-panel--navbar ct-fw-600"><a href="#"><?php echo $res[0]->phno; ?></a></div>
            <ul class="ct-panel--socials ct-panel--navbar list-inline list-unstyled">
                <li><a href="<?php echo $res[0]->facebook; ?>" target="_blank"><div class="ct-socials ct-socials--circle"><i class="fa fa-facebook"></i></div></a></li>
                <li><a href="<?php echo $res[0]->twitter; ?>" target="_blank"><div class="ct-socials ct-socials--circle"><i class="fa fa-twitter"></i></div></a></li>
                <li><a href="<?php echo $res[0]->instagram; ?>" target="_blank"><div class="ct-socials ct-socials--circle"><i class="fa fa-instagram"></i></div></a></li>
            </ul>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav ct-navbar--fadeInUp">
                <li class="dropdown <?php if($i=='home'){echo 'active';} ?>">
                    <a href="<?php echo base_url();?>index.php/Controller/user">
                        Home
                    </a>
                </li>
                <li class="dropdown <?php if($i=='introduction'){echo 'active';}?>">
                    <a href="<?php echo base_url();?>index.php/Controller/load_introduction">
                        Introduction
                    </a>
                </li>
                <!-- <li class="dropdown <?php if($i=='gallary'){echo 'active';}?>">
                    <a href="<?php echo base_url();?>index.php/Controller/load_gallary">
                        Gallary
                    </a>
                </li> -->
                <li class="dropdown <?php if($i=='ourprojects'){echo 'active';}?>">
                    <a href="<?php echo base_url();?>index.php/Controller/load_ourprojects">
                        Our Projects
                    </a>
                </li>
                <li class="dropdown <?php if($i=='contactus'){echo 'active';}?>">
                    <a href="<?php echo base_url();?>index.php/Controller/load_contactus">
                        Contact Us
                    </a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <div class="ct-shapeBottom"></div>
    </div>
</nav>