<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<head>
    <?php 
        $this->load->view('Seller/linktop');
    ?>
    <style type="text/css">
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
        .profilepicturetext
        {
            font-weight: bold;
            color: black;
        }
        .classerror
        {
            color:red;
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
                        Contact Profile
                    </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">
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
                                                                <i class="ft-briefcase"></i>Contact Details
                                                            </h4>
                                                            <div class="row">
                                                                <div class="col-sm-2">
                                                                    <div class="form-group text-center">
                                                                        <label for="contactinput5" class="profilepicturetext">Profile Picture</label>
                                                                        <?php 
                                                                            if($result[0]->profile == '')
                                                                            {
                                                                            ?>  
                                                                                <img class="img-thumbnail" src="<?php echo base_url(); ?>Upload/extra/noimage.jpg" height="250px" id="pimg">
                                                                                <div class="edittext" id="profilepicchange">Add Profile</div>
                                                                            <?php
                                                                            }
                                                                            else
                                                                            {
                                                                            ?>                                                                <img class="img-thumbnail" src="<?php echo base_url();?>Upload/Seller/<?php echo $this->session->userdata('sellerid'); ?>/Profileimage/<?php echo $result[0]->profile; ?>" height="250px" id="pimg">
                                                                                <div class="edittext" id="profilepicchange"><i class="ft-edit"></i> Change</div>
                                                                                <div class="removetext" id="profilepicremove"><i class="ft-x"></i> Remove</div>
                                                                            <?php
                                                                            }
                                                                        ?>
                                                                        <input type="file" class="custom-file-input" id="profileimage" hidden="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-10">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="contactinput5">Name</label>
                                                                                <input class="form-control border-primary" type="text" placeholder="Name" id="sellername" value="<?php echo $result[0]->seller_name; ?>">
                                                                                <input type="text" id="sessionid" value="<?php echo $this->session->userdata('sellerid'); ?>" hidden="">
                                                                                <div class="classerror" id="errorsellername"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="contactinput5">Primary Email (Personal)</label>
                                                                                <input class="form-control border-primary" type="email" placeholder="Primary Email" id="primaryemail" value="<?php echo $result[0]->p_email; ?>">
                                                                                <div class="classerror" id="errorpemail"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="contactinput5">Alternative Email (Personal)</label>
                                                                                <input class="form-control border-primary" type="email" placeholder="Alternative Email" id="alternativeemail" value="<?php echo $result[0]->a_email; ?>">
                                                                                <div class="classerror" id="erroraemail"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="contactinput5">Mobile Number</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">+91</span>
                                                                                    </div>
                                                                                    <input class="form-control border-primary" type="text" placeholder="Mobile Number" id="primarycontact" value="<?php echo $result[0]->p_contact; ?>">
                                                                                </div>
                                                                                <div class="classerror" id="errorpmobile"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="contactinput5">Alternative Mobile Number</label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text">+91</span>
                                                                                    </div>
                                                                                    <input class="form-control border-primary" type="text" placeholder="Alternative Mobile Number" id="alternativecontact" value="<?php echo $result[0]->a_contact; ?>">
                                                                                </div>
                                                                                <div class="classerror" id="erroramobile"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Address</label>
                                                                                <textarea rows="5" class="form-control border-primary" placeholder="Address" id="address"><?php echo $result[0]->address; ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Zip Code</label>
                                                                                <input class="form-control border-primary" type="tel" placeholder="Zip Code" id="zipcode" value="<?php echo $result[0]->zip_code; ?>">
                                                                                <div class="classerror" id="errorzipcode"></div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="contactinput5">City</label>
                                                                                <input class="form-control border-primary" type="text" placeholder="Name" id="city" value="<?php echo $result[0]->city ?>">
                                                                                <div class="classerror" id="errorcity"></div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="contactinput5">State</label>
                                                                                <input class="form-control border-primary" type="text" placeholder="Name" id="state" value="<?php echo $result[0]->state; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-actions right">
                                                            <button type="button" class="btn btn-primary" id="contactprofilesubmit">
                                                                Submit
                                                            </button>
                                                            <button type="button" class="btn btn-danger mr-1" id="cancelcontactprofile">
                                                                Cancel
                                                            </button>
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
    <script src="<?php echo base_url(); ?>assets/Seller/js/scripts/profilecustom.js" type="text/javascript"></script>
  </body>
</html>