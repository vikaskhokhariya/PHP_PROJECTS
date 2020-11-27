<?php 
    $generalsetting=$this->Model->model_select('simbamart.tbl_general');
?>
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true" data-img="<?php echo base_url(); ?>assets/Seller/images/backgrounds/04.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row position-relative">       
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="<?php echo base_url(); ?>Seller">
                    <img class="" alt="Chameleon admin logo" src="<?php echo base_url(); ?><?php echo $generalsetting[0]->web_logo ?>"/>
                </a>
            </li>
            <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
    </div>
    <br>

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item">
                <a href="<?php echo base_url(); ?>">
                    <i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a>
                    <i class="ft-layers"></i><span class="menu-title" data-i18n="">Company Profile</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="<?php echo base_url(); ?>Profile/contactprofile">Contact Profile</a>
                    </li>
                    <li>
                        <a class="menu-item" href="<?php echo base_url(); ?>Profile/businessprofile">Business Profile</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a>
                    <i class="ft-layers"></i><span class="menu-title" data-i18n="">Manage Products</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="<?php echo base_url(); ?>Product/newproduct">Add Product</a>
                    </li>
                    <li>
                        <a class="menu-item" href="<?php echo base_url(); ?>Product/manageproduct">Manage Product</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a>
                    <i class="ft-layers"></i><span class="menu-title" data-i18n="">Settings</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="<?php echo base_url(); ?>Setting/changepassword">Change Password</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="navigation-background"></div>
</div>