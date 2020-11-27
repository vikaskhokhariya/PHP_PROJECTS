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
                        Business Profile
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
                                                                <i class="ft-briefcase"></i>Business Details
                                                            </h4>
                                                            <div class="row">
                                                                <div class="col-sm-2">
                                                                    <div class="form-group text-center">
                                                                        <label for="contactinput5" class="profilepicturetext">Profile Picture</label>
                                                                        <?php 
                                                                            if($result[0]->business_logo == '')
                                                                            {
                                                                            ?>  
                                                                                <img class="img-thumbnail" src="<?php echo base_url(); ?>Upload/extra/noimage.jpg" height="250px" id="pimg">
                                                                                <div class="edittext" id="businesspicchange">Add Logo</div>
                                                                            <?php
                                                                            }
                                                                            else
                                                                            {
                                                                            ?>                                                     <img class="img-thumbnail" src="<?php echo base_url();?>Upload/Seller/<?php echo $this->session->userdata('sellerid'); ?>/Businessimage/<?php echo $result[0]->business_logo; ?>" height="250px" id="pimg">
                                                                                <div class="edittext" id="businesspicchange"><i class="ft-edit"></i> Change</div>
                                                                                <div class="removetext" id="businesslogoremove"><i class="ft-x"></i> Remove</div>
                                                                            <?php
                                                                            }
                                                                        ?>
                                                                        <input type="file" class="custom-file-input" id="profilelogo" hidden="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-10">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="contactinput5">Business Name</label>
                                                                                <input class="form-control border-primary" type="text" placeholder="Company Name" id="companyname" value="<?php echo $result[0]->business_name; ?>">
                                                                                <div class="classerror" id="errorbusinessname"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="contactinput5">Primary Email (Business)</label>
                                                                                <input class="form-control border-primary" type="text" placeholder="Business Primary Email" id="primaryemail" value="<?php echo $result[0]->p_email; ?>">
                                                                                <div class="classerror" id="errorpemail"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="contactinput5">Alternative Email (Business)</label>
                                                                                <input class="form-control border-primary" type="text" placeholder="Business Alternative Email" id="alternativeemail" value="<?php echo $result[0]->a_email; ?>">
                                                                                <div class="classerror" id="erroraemail"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="companyinput5">Business Type</label>
                                                                                <select id="businesstype" class="form-control border-primary">
                                                                                    <option hidden="">Select</option>
                                                                                    <option value="Manufaturer" <?php if($result[0]->business_type=="Manufaturer") echo "selected"?>>Manufaturer</option>
                                                                                    <option value="Wholesaler" <?php if($result[0]->business_type=="Wholesaler") echo "selected"?>>Wholesaler</option>
                                                                                    <option value="Distributer" <?php if($result[0]->business_type=="Distributer") echo "selected"?>>Distributer</option>
                                                                                    <option value="Retailer" <?php if($result[0]->business_type=="Retailer") echo "selected"?>>Retailer</option>
                                                                                    <option value="Retail Shop" <?php if($result[0]->business_type=="Retail Shop") echo "selected"?>>Retail Shop</option>
                                                                                    <option value="Supplier" <?php if($result[0]->business_type=="Supplier") echo "selected"?>>Supplier</option>
                                                                                    <option value="Online Business">Online Business</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Ownership Type</label>
                                                                                <select id="ownershiptype" class="form-control border-primary">
                                                                                    <option hidden="">Select</option>
                                                                                    <option value="Public Limited Company" <?php if($result[0]->ownership_type=="Public Limited Company") echo "selected"?>>Public Limited Company</option>
                                                                                    <option value="Private Limited Company" <?php if($result[0]->ownership_type=="Private Limited Company") echo "selected"?>>Private Limited Company</option>
                                                                                    <option value="Partnership" <?php if($result[0]->ownership_type=="Partnership") echo "selected"?>>Partnership</option>
                                                                                    <option value="Sole Proprietorship (Individual)" <?php if($result[0]->ownership_type=="Sole Proprietorship (Individual)") echo "selected"?>>Sole Proprietorship (Individual)</option>
                                                                                    <option value="Professional Association" <?php if($result[0]->ownership_type=="Professional Association") echo "selected"?>>Professional Association</option>
                                                                                    <option value="Limited Liability Partnership" <?php if($result[0]->ownership_type=="Limited Liability Partnership") echo "selected"?>>Limited Liability Partnership</option>
                                                                                    <option value="Not-For-Profit Companies" <?php if($result[0]->ownership_type=="Not-For-Profit Companies") echo "selected"?>>Not-For-Profit Companies</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="companyinput5">Number of Employees</label>
                                                                                <select id="noofemployee" class="form-control border-primary">
                                                                                    <option hidden="">Select</option>
                                                                                    <option value="Upto 10" <?php if($result[0]->no_of_employee=="Upto 10") echo "selected"?>>Upto 10</option>
                                                                                    <option value="11 to 50" <?php if($result[0]->no_of_employee=="11 to 50") echo "selected"?>>11 to 50</option>
                                                                                    <option value="51 to 100" <?php if($result[0]->no_of_employee=="51 to 100") echo "selected"?>>51 to 100</option>
                                                                                    <option value="101 to 200" <?php if($result[0]->no_of_employee=="101 to 200") echo "selected"?>>101 to 200</option>
                                                                                    <option value="201 to 500" <?php if($result[0]->no_of_employee=="201 to 500") echo "selected"?>>201 to 500</option>
                                                                                    <option value="501 to 1000" <?php if($result[0]->no_of_employee=="501 to 1000") echo "selected"?>>501 to 1000</option>
                                                                                    <option value="More than 1000" <?php if($result[0]->no_of_employee=="More than 1000") echo "selected"?>>More than 1000</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="contactinput5">
                                                                                    Year of Establishment
                                                                                </label>
                                                                                <input class="form-control border-primary" type="text" placeholder="Year of Establishment" id="yearofesta" value="<?php echo $result[0]->year_of_est; ?>">
                                                                                <div class="classerror" id="erroryearofest"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="contactinput5">Business Website</label>
                                                                                <input class="form-control border-primary" type="text" placeholder="Company Website URL" id="businesswebsite" value="<?php echo $result[0]->business_website; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-actions right">
                                                            <button type="button" class="btn btn-primary" id="businessprofilesubmit">
                                                                Submit
                                                            </button>
                                                            <button type="button" class="btn btn-danger mr-1" id="cancelbusinessprofile">
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