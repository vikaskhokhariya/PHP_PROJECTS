<!-- Top Bar Start -->
                    <div class="topbar">

                        <nav class="navbar-custom">

                            <ul class="list-inline float-right mb-0">
                                
                                
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <!-- <img src="<?php echo base_url()?>admin/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> -->
                                        <span style="color:white;font-size:35px;top:4px;position:relative;"><i class="mdi mdi-menu"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/controller/logout_sponsor"><i class="mdi mdi-logout m-r-5 text-muted"></i>Logout</a>
                                    </div>
                                </li>

                            </ul>

                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                                <li class="hide-phone list-inline-item app-search">
                                    <?php
                                        if($j=='Dashboard')
                                        {
                                        ?>
                                            <h3 class="page-title"><span><?php echo $j; ?></span></h3>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                            <h3 class="page-title"><a href="<?php echo base_url();?>index.php/controller/load_sponsordashboard" style="color:white;">Home</a> / <span style="color:orange;"><?php echo $j; ?></span></h3>
                                        <?php
                                        }
                                    ?>
                                </li>
                            </ul>

                            <div class="clearfix"></div>
                        </nav>
                    </div>
                    <!-- Top Bar End -->