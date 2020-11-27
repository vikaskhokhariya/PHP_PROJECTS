<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<head>
    <?php 
        $this->load->view('Seller/linktop');
    ?>

    <style type="text/css">
        .classerror
        {
            color: red;
            font-weight: bold;
        }
        .edittext
        {
            font-weight: bold;
            font-size: 17px;
            margin-top: 5px;
            color: #006400;
            text-decoration: underline;
            cursor: pointer;
        }
        .removetext
        {
            font-weight: bold;
            font-size: 17px;
            margin-top: 5px;
            color: red;
            text-decoration: underline;
            cursor: pointer;
        }
        .classaddmoreimages
        {
            color : #014C7D;
            font-size: 17px;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-color="bg-gradient-x-purple-red" data-col="2-columns">

    <?php 
        $this->load->view('Seller/mobileviewheader');
        $this->load->view('Seller/pcviewheader');
    ?>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">
                        Change Password
                    </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php echo base_url(); ?>Admin_cnt">
                                        Home
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <section id="drag-area">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-content collapse show">
                                                <div class="card-body">
                                                    <form class="form">
                                                        <div class="form-body">
                                                            <h4 class="form-section">
                                                                <i class="ft-flag"></i> Password Detail
                                                            </h4>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-2 col-form-label">Existing Password</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" placeholder="Enter Existing Password" id="extpassword" autocomplete="off">
                                                                    <span id="errorextpassword" class="classerror"></span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" placeholder="Enter New Password" id="newpassword" autocomplete="off">
                                                                    <span id="errornewpassword" class="classerror"></span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-2 col-form-label">Re-enter New Password</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" placeholder="Re-Enter New Password" id="reenterpassword" autocomplete="off">
                                                                    <span id="errorreenterpassword" class="classerror"></span>
                                                                </div>
                                                            </div>

                                                            <div class="form-actions">
                                                                <input type="button" value="Change Password" class="btn btn-info" id="changepassword"> 
                                                                <input type="button" value="Cancel" class="btn btn-danger mr-1" id="clickcancel">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>   
                </section>
            </div>
        </div>
    </div>

    <?php 
        $this->load->view('Seller/linkbottom');
    ?>

    <script src="<?php echo base_url(); ?>assets/Seller/js/scripts/settingcustom.js" type="text/javascript"></script>

    <script type="text/javascript">
        $('#clickcancel').click(function()
        {
            window.location.href='<?php echo base_url(); ?>';
        });
    </script>
  </body>
</html>