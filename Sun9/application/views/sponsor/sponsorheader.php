<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <?php 
                $res=$this->Model->model_select('generalsettings');
            ?>
            <a href="index-2.html" class="logo"><img src="<?php echo base_url()?>assets/uploads/logo/<?php echo $res[0]->logo; ?>" height="130" alt="logo" width="200px"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div class="user-details">
            <div class="text-center">
                <img src="<?php echo base_url();?>assets/uploads/sponsorprofile/<?php echo $this->session->userdata('sponsorprofile'); ?>" alt="" class="rounded-circle">
            </div>
            <div class="user-info">
                <h4 class="font-16"><?php echo $this->session->userdata('sponsorname'); ?></h4>
                <span class="text-muted user-status"><i class="fa fa-dot-circle-o text-success"></i> Sponsor</span>
            </div>
        </div>

        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>index.php/controller/load_sponsordashboard" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="has_sub">
                    <a class="waves-effect">
                        <i class="ti-light-bulb"></i>
                        <span>Customer</span>
                            <span class="pull-right">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                    </a>
                        <ul class="list-unstyled">
                        <li><a href="<?php echo base_url();?>index.php/controller/load_totcustomer">Total Customer</a></li>
                        <li><a href="<?php echo base_url();?>index.php/controller/load_custladger">Customer Ladger</a></li>
                    </ul>
                </li>

                <li>
                    <a class="waves-effect" href="<?php echo base_url();?>index.php/controller/load_sponsorcommission">
                        <i class="mdi mdi-source-branch"></i>
                        <span>Commission</span>
                            
                    </a>
                       
                </li>

                
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->