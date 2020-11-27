<!-- Top Bar Start -->
<div class="topbar">
    <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false" onclick="openmessage()" id="messageclick">
                    <i class="mdi mdi-email-outline noti-icon"></i>
                    <span class="badge badge-danger noti-icon-badge" id="messagecount"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg" id="messagesdiv">
                </div>
            </li>

            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false" onclick="opennotification()" id="notificationclick">
                    <i class="mdi mdi-bell-outline noti-icon"></i>
                    <span class="badge badge-success noti-icon-badge" id="notificationcount"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg" id="notificationdiv">
                    
                </div>
            </li>

            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <!-- <img src="<?php echo base_url()?>admin/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> -->
                    <span style="color:white;font-size:35px;top:4px;position:relative;"><i class="mdi mdi-menu"></i></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/controller/logout_admin"><i class="mdi mdi-logout m-r-5 text-muted"></i>Logout</a>
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
                        <h3 class="page-title"><a href="<?php echo base_url();?>index.php/controller/load_admindashboard" style="color:white;">Home</a> / <span style="color:orange;"><?php echo $j; ?></span></h3>
                    <?php
                    }
                ?>
            </li>
        </ul>

        <div class="clearfix"></div>
    </nav>
</div>
<!-- Top Bar End -->

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="mymessagemodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Reply Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Name : </label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" id="nm" name="nm" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" id="notiemail" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Mobile</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" id="mobile" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Message</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" rows="3" id="message" style="resize: none;" readonly></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Message Date</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" id="messagedate" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Reply</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" rows="3" id="reply" style="resize: none;"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-6">
                        <span id="replymessageerror" style="color:red;font-weight:bold;"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-success btn-block" onclick="sendreply()">Reply</button>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-info btn-block" onclick="cancelreplymodal()">Cancel</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->