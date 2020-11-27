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
                <img src="<?php echo base_url()?>assets/uploads/logo/<?php echo $res[0]->logo; ?>" height="130" width="200" alt="logo">
            </a>
        </div>
    </div>
    <!-- END LOGO -->

    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="user-info">
                <h4 class="font-16"><?php echo $this->session->userdata('branchname'); ?></h4>
                <h4 class="font-16"><?php echo $this->session->userdata('branchemail'); ?></h4>
                <span class="text-muted user-status"><i class="fa fa-dot-circle-o text-success"></i> Online</span>
            </div>
        </div>

        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>index.php/controller/load_branchdashboard" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="has_sub">
                    <a class="waves-effect">
                        <i class="ion-android-contact"></i>
                        <span>Sponsor</span>
                            <span class="pull-right">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                    </a>
                        <ul class="list-unstyled">
                        <li><a href="<?php echo base_url();?>index.php/controller/load_addbranchsponsor">Add Sponsor</a></li>
                        <li><a href="<?php echo base_url();?>index.php/controller/load_branchsponsorlist">Sponsor List</a></li>
                        <li><a href="<?php echo base_url();?>index.php/controller/load_branchblockedsponsorlist">Blocked Sponsor List</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a class="waves-effect">
                        <i class="ion-android-social-user"></i>
                        <span>Customer</span>
                            <span class="pull-right">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                    </a>
                        <ul class="list-unstyled">
                        <li><a href="<?php echo base_url();?>index.php/controller/load_addbranchcustomer">Add Customer</a></li>
                        <li><a href="<?php echo base_url();?>index.php/controller/load_branchcustomerlist">Customer List</a></li>
                        <li><a href="<?php echo base_url();?>index.php/controller/load_branchblockcustomerlist">Blocked Customer List</a></li>
                        <li><a href="<?php echo base_url();?>index.php/Controller/load_custreceipt">Create Receipt</a></li>
                        <li><a href="<?php echo base_url();?>index.php/Controller/load_receiptlist">Receipt List</a></li>
                        <li><a href="<?php echo base_url();?>index.php/Controller/load_customer_ledger">Customer Ledger</a></li>
                        <li><a href="<?php echo base_url();?>index.php/Controller/load_overduelist">OverDue List</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->