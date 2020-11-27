<div class="ct-topBar">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="ct-panel--user ct-panel--right text-right">
                    <div class="ct-panel--item ct-email">
                        <ul class="nav navbar-nav ct-switcher--language ct-switcher--withDecoration">
                            <li class="dropdown">
                                <?php
                                    if($this->session->userdata('custname'))
                                    {
                                ?>
                                <a href="<?php echo base_url();?>index.php/Controller/logoutcust"><span style="font-size: 20px;"> <i class="ion-power" style="font-size: 20px;"></i> Log out</span></a>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                    <a href="<?php echo base_url();?>index.php/Controller/load_loginpage"><span style="font-size: 20px;"> <i class="fa fa-user" style="font-size: 20px;"></i> Log In</span></a>
                                    <?php
                                        }
                                    ?>
                               
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
