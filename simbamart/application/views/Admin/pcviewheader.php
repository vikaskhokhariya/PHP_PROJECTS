<?php 
    $generalsetting=$this->Model->model_select('tbl_general');
?>
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true" data-img="<?php echo base_url(); ?>assets/Admin/images/backgrounds/04.jpg">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row position-relative">       
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="<?php echo base_url(); ?>Admin_cnt">
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
                <a href="<?php echo base_url(); ?>Admin_cnt/load_dashboard">
                    <i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a>
                    <i class="ft-layers"></i><span class="menu-title" data-i18n="">Category</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="<?php echo base_url(); ?>Admin_cnt/load_maincatlist">Main Category</a>
                    </li>
                    <li>
                        <a class="menu-item" href="<?php echo base_url(); ?>Admin_cnt/load_subcatlist">Sub Category</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="<?php echo base_url(); ?>Admin_cnt/load_seosetting">
                    <i class="ft-layers"></i><span class="menu-title" data-i18n="">SEO Settings</span>
                </a>
            </li>

            <li class="nav-item">
                <a>
                    <i class="ft-layers"></i><span class="menu-title" data-i18n="">Blog Setting</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="<?php echo base_url(); ?>Admin_cnt/load_bloglist">Blog List</a>
                    </li>
                    <li>
                        <a class="menu-item" href="<?php echo base_url(); ?>Admin_cnt/load_blogsetting">Blog SEO Setting</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#">
                    <i class="ft-layers"></i><span class="menu-title" data-i18n="">Site Settings</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="<?php echo base_url(); ?>Admin_cnt/load_slidersetting">Slider</a>
                    </li>
                    <li>
                        <a class="menu-item" href="<?php echo base_url(); ?>Admin_cnt/load_generalsetting">General</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="navigation-background"></div>
</div>