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
            <a href="index-2.html" class="logo">
                <img src="<?php echo base_url()?>assets/uploads/logo/<?php echo $res[0]->logo; ?>" height="130" alt="logo" width="200px">
            </a>
        </div>
    </div>
    <!-- END LOGO -->

    <div class="sidebar-inner slimscrollleft">

        <!-- ADMIN IMAGE -->
        <div class="user-details">
            <div class="text-center">
                <img src="<?php echo base_url();?>assets/uploads/admin/<?php echo $this->session->userdata('adminprofile'); ?>" alt="admin image" class="rounded-circle" style="border:2px solid black;height:80px;width:80px;">
            </div>
            <div class="user-info">
                <h4 class="font-16"><?php echo $this->session->userdata('adminname'); ?></h4>
                <span class="text-muted user-status" style="font-weight:bold;text-transform:uppercase;"><i class="fa fa-dot-circle-o text-success"></i>&nbsp;<?php echo $this->session->userdata('admintype');?> Admin</span>
            </div>
        </div>
        <!-- END ADMIN IMAGE -->

        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>index.php/controller/load_masteradmindashboard" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="has_sub">
                    <a class="waves-effect">
                        <i class="ion-ios7-person" style="font-size:25px;"></i>
                        <span>
                            Sub Admin
                        </span>
                        <span class="pull-right">
                            <i class="mdi mdi-chevron-right"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?php echo base_url();?>index.php/controller/load_addnewadmin">
                                Add Sub Admin
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/controller/load_adminlist">
                                Sub Admin List
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/controller/load_blockadminlist">
                                Blocked Sub Admin List
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a class="waves-effect">
                        <i class="ion-android-lightbulb"></i>
                        <span>
                            Plans
                        </span>
                        <span class="pull-right">
                            <i class="mdi mdi-chevron-right"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?php echo base_url();?>index.php/controller/load_addplan">
                                Add Plan
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/controller/load_planlist">
                                Plan List
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a class="waves-effect">
                        <i class="mdi mdi-source-branch"></i>
                        <span>
                            Branch
                        </span>
                        <span class="pull-right">
                            <i class="mdi mdi-chevron-right"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?php echo base_url();?>index.php/controller/load_addbranch">
                                Add Branch
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/controller/load_branchlist">
                                Branch List
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a class="waves-effect">
                        <i class="ion-android-social-user"></i>
                        <span>
                            Customer
                        </span>
                        <span class="pull-right">
                            <i class="mdi mdi-chevron-right"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?php echo base_url();?>index.php/controller/load_addadmincustomer">
                                Add Customer
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/controller/load_admincustomerlist">
                                Customer List
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/controller/load_adminblockcustomerlist">
                                Blocked Customer List
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a class="waves-effect">
                        <i class="ion-android-contact"></i>
                        <span>
                            Sponsor
                        </span>
                        <span class="pull-right">
                            <i class="mdi mdi-chevron-right"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?php echo base_url();?>index.php/controller/load_adminaddsponsor">
                                Add Sponsor
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/controller/load_adminsponsorlist">
                                Sponsor List
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/controller/load_addcommissionpay">
                                Sponsor Commission
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/controller/load_adminblockedsponsorlist">Blocked Sponsor List
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a class="waves-effect">
                        <i class="ion-android-settings"></i>
                        <span>
                            Site Settings
                        </span>
                        <span class="pull-right">
                            <i class="mdi mdi-chevron-right"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?php echo base_url();?>index.php/controller/load_generalsettings">
                                General Settings
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/controller/load_newseventslist">
                                News & Events
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/controller/load_projectlist">
                                Projects
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/controller/load_customer_review">
                                Customer Review
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a class="waves-effect">
                        <i class="ti-files"></i>
                        <span>Reports</span>
                        <span class="pull-right">
                            <i class="mdi mdi-chevron-right"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo base_url();?>index.php/controller/load_totalcustomer">Total Customer</a></li>
                        <li><a href="<?php echo base_url();?>index.php/controller/load_promoter">Promoter Commission</a></li>
                        <li><a href="<?php echo base_url();?>index.php/controller/load_branchsales">Branch Sales</a></li>
                        <li><a href="<?php echo base_url();?>index.php/controller/load_promotersales">Promoter Sales</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End