<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Add Customer</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="<?php echo base_url()?>admin/assets/images/favicon.ico">

    <!-- Sweet Alert -->
    <link href="<?php echo base_url()?>admin/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <!-- Plugins css -->
    <link href="<?php echo base_url()?>admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>admin/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

    <!-- App css -->
    <link href="<?php echo base_url()?>admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>admin/assets/css/style.css" rel="stylesheet" type="text/css" />
    
    <style type="text/css">
        .plandetail
        {
            border:2px solid black;
            padding:1px;
            border-radius:50px;
            background-color: #B6B0B0;
        }
        #scrollToTop
        {
            cursor:pointer;
            background-color:#0090CB;
            display:inline-block;
            height:00px;
            width:40px;
            color:#fff;
            font-size:16pt;
            text-align:center;
            text-decoration:none;
            line-height:40px;
        }
        #loading-image
        {
            position:fixed;
            z-index: 100000;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: transparent;
        }
        #loading-image img
        {
            position: absolute;
            margin: auto;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
    </style>
</head>

<body class="fixed-left" id="top">

    <!-- Loader -->
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

    <!-- Begin page -->
    <div id="wrapper">
        <?php 
            if($this->session->userdata('admintype')=="master")
            {
                $this->load->view('admin/adminheader');
            }
            else
            {
                $this->load->view('admin/subadminheader');
            }
        ?>        

        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <?php 
                    $array['j']='Add Customer';
                    $this->load->view('admin/topheader',$array);
                ?>

                <div class="page-content-wrapper ">
                    <div class="container-fluid">

                        <!-- form -->
                        <form>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">                                           
                                            <?php 
                                                $res=$this->Model->model_select('branchtb');
                                            ?>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Branch Code</label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" id="bcode">
                                                        <option hidden="" value="">Select</option>
                                                        <?php 
                                                           foreach($res as $q)
                                                           {
                                                        ?>
                                                            <option value="<?php echo $q->bid; ?>">
                                                                <?php echo $q->branch_code;?>
                                                            </option>
                                                        <?php
                                                           }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="bcodeerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Branch Name</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" id="bnm" name="bnm" readonly="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">
                                                    Sponsor Code
                                                </label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" id="scode">
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="scodeerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Sponsor Name</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" id="snm" name="snm" readonly="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Customer Name</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" id="cnm" name="cnm" autocomplete="off" placeholder="Enter The Customer Name">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="cnmerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Father/Husband Name</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" id="fnm" name="fnm" placeholder="Enter Father Or Husband Name" autocomplete="off">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="fhnmerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Gender</label>
                                                <div class="col-sm-5">
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-light active">
                                                            <input type="radio" name="gender" id="male" value="male" checked=""> <i class="mdi mdi-human-male" style="font-size:30px;"></i>
                                                        </label>&nbsp;
                                                        <label class="btn btn-light">
                                                            <input type="radio" name="gender" id="female" value="female"><i class="mdi mdi-human-female" style="font-size:30px;"></i>
                                                        </label>&nbsp;
                                                        <label class="btn btn-light">
                                                            <input type="radio" name="gender" id="other" value="other"> <img src="<?php echo base_url()?>admin/assets/fonts/other.png" style="height:30px;width:30px;">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="gendererror"></span></b>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">BirthDate</label>
                                                <div class="col-sm-5 form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="dob" name="dob" autocomplete="off">
                                                        <div class="input-group-append bg-custom b-0">
                                                            <span class="input-group-text">
                                                                <i class="mdi mdi-calendar"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="birtherror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Address</label>
                                                <div class="col-sm-5" name="city">
                                                     <textarea class="form-control" rows="5" name="address" id="address" placeholder="Enter Resident Address" autocomplete="off" style="resize: none;"></textarea>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="adderror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Country</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" id="country" name="country" value="India" readonly="">
                                                </div>
                                            </div>

                                            <?php 
                                                $res=$this->Model->model_select_state('state');
                                            ?>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">State</label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" name="state" id="state">
                                                        <option hidden="" value="">Select</option>
                                                       <?php 
                                                           foreach($res as $q)
                                                           {
                                                        ?>
                                                            <option value="<?php echo $q->StateID?>"><?php echo $q->StateName;?></option>
                                                        <?php
                                                           }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="stateerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">City</label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" name="city" id="city">
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="cityerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Pin Code</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" id="pcode" name="pcode" placeholder="Enter Pin Code" autocomplete="off" maxlength="6">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="pinerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Phone Number</label>
                                                <div class="col-sm-5 form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-append bg-custom b-0"><span class="input-group-text"><label style="font-size:15px;padding-top:5px;">+91</label></span></div>
                                                        <input type="text" class="form-control" placeholder="Enter Mobile Number" id="mno" name="mno" autocomplete="off" maxlength="10">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="phnoerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Alternative Number</label>
                                                <div class="col-sm-5 form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-append bg-custom b-0"><span class="input-group-text"><label style="font-size:15px;padding-top:5px;">+91</label></span></div>
                                                        <input type="text" class="form-control" placeholder="Enter Mobile Number" id="amno" name="amno" autocomplete="off" maxlength="10">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="altphnoerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Pan Card Number</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" placeholder="Enter Pan Card Number" id="pno" name="pno" autocomplete="off" maxlength="10">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="panerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Aadhar Card Number</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" placeholder="Enter Aadhar Card Number" id="ano" name="ano" autocomplete="off" maxlength="12">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="adharerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Email Id</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" placeholder="Enter Email Id" id="email" name="email" autocomplete="off">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="emailerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Profile</label>
                                                <div class="col-sm-5">
                                                    <div>
                                                        <input type="file" id="profile" name="profile" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="profileerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Resident Proof</label>
                                                <div class="col-sm-5">
                                                    <div>
                                                        <input type="file" id="rproof" name="rproof" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="residentprooferror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Nominee Name</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" placeholder="Enter Nominee Name" id="nnm" name="nnm" autocomplete="off">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="nnmerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Nominee Relation</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" placeholder="Enter Nominee Relation" id="nrel" name="nrel" autocomplete="off">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="nrelerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Nominee BirthDate</label>
                                                <div class="col-sm-5 form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="ndob" name="ndob" autocomplete="off">
                                                        <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="mdi mdi-calendar"></i></span></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="nbirtherror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nominee Address</label>
                                                <div class="col-sm-5" name="city">
                                                     <textarea class="form-control" rows="5" id="naddress" name="naddress" placeholder="Enter Nominee Address" autocomplete="off"></textarea>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="nadderror"></span></b>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Joining Date</label>
                                                <div class="col-sm-5 form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="jdate" name="jdate">
                                                        <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="mdi mdi-calendar"></i></span></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="jdateerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3">
                                                        Next Due Date
                                                </label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" id="ndate" name="ndate" readonly="">
                                                </div>      
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Marital Status</label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" name="mstatus" id="mstatus">
                                                        <option hidden="" value="">Select</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Unmarried">Unmarried</option>
                                                        <option value="Separeted">Separeted</option>
                                                        <option value="Widow">Widow</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="mstatuserror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Occupation</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" id="occu" name="occu" autocomplete="off" placeholder="Enter Occupation">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="occuerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Nationality</label>
                                                <div class="col-sm-5">
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-light active">
                                                            <input type="radio" name="nationality" id="indian" value="indian" checked=""> <label style="font-size:17px;padding-top:4px;">Indian</label>
                                                        </label>&nbsp;
                                                        <label class="btn btn-light">
                                                            <input type="radio" name="nationality" id="nri" value="nri"> <label style="font-size:17px;padding-left:12px;padding-right:10px;padding-top:4px;">NRI</label>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Identity Proof</label>
                                                <div class="col-sm-5">
                                                    <div>
                                                        <input type="file" id="iproof" name="iproof" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="identityprooferror"></span></b>
                                                </div>
                                            </div>

                                            <?php 
                                                $res=$this->Model->model_select('plantb');
                                            ?>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Select Plan</label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" name="splan" id="splan">
                                                        <option hidden="" value="">Select</option>
                                                        <?php 
                                                           foreach($res as $q)
                                                           {
                                                        ?>
                                                            <option value="<?php echo $q->plan_code?>"><?php echo $q->pname;?></option>
                                                        <?php
                                                           }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="splanerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="row" id="plandetail">
                                                <div class="col-12">
                                                    <div class="card m-b-30">
                                                        <div class="card-body">
                                                            <h5 class="card-header text-center">Plan Details</h5>
                                                            <div class="card-body">               
                                                            <div class="form-group row">
                                                                <div class="col-sm-2"></div>
                                                                <label class="col-sm-3 col-form-label">Square Feet Price</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" id="sfeetp" readonly="" name="sfeetp" autocomplete="off" tabindex="-1">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-2"></div>
                                                                <label class="col-sm-3 col-form-label">Square Feet</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" id="sfeet" placeholder="Enter the Total Square Feet" name="sfeet" autocomplete="off">
                                                                </div>                  
                                                            </div>

                                                            <div class="form-group row" id="Squarefeeterrordiv">
                                                                <div class="col-sm-2"></div>
                                                                <label class="col-sm-3 col-form-label"></label>
                                                                <div class="col-sm-5">
                                                                    <b><span id="sfeetserror" class="text-danger"></span></b>
                                                                </div>                  
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-2"></div>
                                                                <label class="col-sm-3 col-form-label">Down Payment</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" id="damt" name="damt" placeholder="Enter the Down Peyment" autocomplete="off">
                                                                </div>            
                                                            </div>

                                                            <div class="form-group row" id="downpaymenterrordiv">
                                                                <div class="col-sm-2"></div>
                                                                <label class="col-sm-3 col-form-label"></label>
                                                                <div class="col-sm-5">
                                                                    <b><span id="dpayerror" class="text-danger"></span></b>
                                                                </div>                  
                                                            </div>
                                                             
                                                            <div class="form-group row">
                                                                <div class="col-sm-2"></div>
                                                                <label class="col-sm-3 col-form-label">Total Amount</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" id="tamt" readonly="" name="tamt" autocomplete="off" tabindex="-1">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-2"></div>
                                                                <label class="col-sm-3 col-form-label">Remaining Amount</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" id="ramt" name="ramt" readonly="" autocomplete="off">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-2"></div>
                                                                <label class="col-sm-3 col-form-label">Total EMI</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" id="temi" name="temi" readonly="" autocomplete="off" tabindex="-1">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-2"></div>
                                                                <label class="col-sm-3 col-form-label">EMI Value</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" id="eval" name="eval" readonly="" autocomplete="off" tabindex="-1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-2">
                                                    <input type="button" name="preview" value="preview" class="btn btn-info btn-block" onclick="open_preview()"> 
                                                </div>
                                                <div class="col-sm-2">
                                                    <button type="button" name="csubmit" value="csubmit" class="btn btn-info btn-block" id="csubmit" onclick="insertFinal()">Submit</button>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="button" name="cancel" value="Cancel" class="btn btn-info btn-block" onclick="edit_cancel()">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </form>
                    </div><!-- container -->
                </div> <!-- Page content Wrapper -->
            </div> <!-- content -->

            <footer class="footer">
                
            </footer>

        </div>
        <!-- End Right content here -->
    </div>
    <!-- END wrapper -->

    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="mymodal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Sponsor Code</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="sponsorcodeerror"></span>
                                </div>
                            </div></b>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Sponsor Name</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="sponsornameerror"></span>
                                </div>
                            </div></b>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Branch Code</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="branchcodeerror"></span>
                                </div>
                            </div></b>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Branch Name</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="branchnameerror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Customer Name</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="customernameerror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Father/Husband Name</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="fhnameerror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Gender</b>
                                </div>
                                <div class="col-sm-6">
                                    </b><span id="genderserror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Birthdate</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="doberror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Address</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="addresserror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>State</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="stateserror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>City</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="cityserror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Pin Code</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="pincodeerror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Email Id</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="emailserror"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Phone Number</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="phoneerror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Phone Number(Alt)</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="aphoneerror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Pan Card Number</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="pancarderror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Aadhar Card Number</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="aadharcarderror"></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Nominee Name</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="nnameerror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Nominee Relation</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="nrelationerror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Nominee Birthdate</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="ndoberror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Nominee Address</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="naddresserror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Joining Date</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="jdateserror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Next Due Date</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="nduedateerror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Maritial Status</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="mstatusserror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Occupation</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="occuserror"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Nationality</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="nationalityerror"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 5px;margin-bottom: 5px;">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <b>Resident Proof</b>
                        </div>
                        <div class="col-sm-4 text-center">
                            <b>Profile</b>
                        </div>
                        <div class="col-sm-4 text-center">
                            <b>Identity Proof</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <img src="" height="80px" width="80px">
                        </div>
                        <div class="col-sm-4 text-center">
                            <img src="" height="80px" width="80px">
                        </div>
                        <div class="col-sm-4 text-center">
                            <img src="" height="80px" width="80px">
                        </div>
                    </div>
                    <hr style="margin-top: 10px;margin-bottom: 5px;">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Plan Name</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="plannameerror"></span>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Square Feet Price</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="spriceerror"></span> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Square Feet</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="sfeeterror"></span> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Down Payment</b>
                                </div>
                                <div class="col-sm-6">
                                     <span id="dpaymenterror"></span>   
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Total Amount</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="tamterror"></span>   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Remaining Amount</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="ramterror"></span>    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>Total EMI</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="emierror"></span>    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <b>EMI Value</b>
                                </div>
                                <div class="col-sm-6">
                                    <span id="emivalueerror"></span>    
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="row">              
                        <div class="col-sm-3">
                            <input type="button" name="edit" value="Edit" class="btn btn-block btn-primary" data-dismiss="modal" aria-hidden="true">
                        </div>      
                        <div class="col-sm-3">
                            <input type="button" id="modalsubmit" name="submitmodal" value="Submit" class="btn btn-block btn-primary">
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- jQuery  -->
    <script src="<?php echo base_url()?>admin/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/popper.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/modernizr.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/waves.js"></script> -->
    <script src="<?php echo base_url()?>admin/assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/jquery.nicescroll.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/jquery.scrollTo.min.js"></script>

    <!-- Sweet-Alert  -->
    <script src="<?php echo base_url()?>admin/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/pages/sweet-alert.init.js"></script>

    <!-- Plugins js -->
    <script src="<?php echo base_url()?>admin/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>

    <!-- Plugins Init js -->
    <script src="<?php echo base_url()?>admin/assets/pages/form-advanced.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url()?>admin/assets/js/app.js"></script>

    <?php 
        include('message.php');
    ?>

    <script type="text/javascript">
        $(function(){
            msg_count();
            noti_msg_count();
        });
        setInterval(function()
        {
            if(!$('#messageclick').hasClass('openornot'))
            {
                msg_count();
            }
            else
            {
                $('#messagecount').html('');
            }
            load_message_data();
            if(!$('#notificationclick').hasClass('openornot'))
            {
                noti_msg_count();
            }
            else
            {
                $('#notificationcount').html('');
            }
            load_notification_data();
        },1000);
    </script>

    <script type="text/javascript">
        var rpic='';
        var ipic='';
        var ppic='';

        function previewresident()
        {
            total_images = $("body img").length;
            var preview = document.querySelectorAll('img')[total_images-4];
            var file    = document.querySelectorAll('input[type=file]')[1].files[0];
            var reader  = new FileReader();

            reader.addEventListener("load", function () {
                preview.src = reader.result;
            }, false);

            if(file){
                reader.readAsDataURL(file);
            }   
        }

        function previewprofile()
        {
            total_images = $("body img").length;
            var preview = document.querySelectorAll('img')[total_images-3];
            var file    = document.querySelectorAll('input[type=file]')[0].files[0];

            var reader  = new FileReader();

            reader.addEventListener("load", function () {
                preview.src = reader.result;
            }, false);

            if(file){
                reader.readAsDataURL(file);
            }   
        }

        function previewidentityproof()
        {
            total_images = $("body img").length;
            var preview = document.querySelectorAll('img')[total_images-2];
            var file    = document.querySelectorAll('input[type=file]')[2].files[0];

            var reader  = new FileReader();

            reader.addEventListener("load", function () {
                preview.src = reader.result;
            }, false);

            if(file){
                reader.readAsDataURL(file);
            }   
        }

        $(function(){
            $("#dob").datepicker({autoclose:!0,todayHighlight:!0,format: 'dd/mm/yyyy',endDate:'+0d'});
            $("#ndob").datepicker({autoclose:!0,todayHighlight:!0,format: 'dd/mm/yyyy',endDate:'+0d'});
            $("#jdate").datepicker({autoclose:!0,todayHighlight:!0,format: 'dd/mm/yyyy',endDate:'+0d'});

            $('#loading-image').hide();

            $('#Squarefeeterrordiv').css({
                display: 'none'
            });
            $('#downpaymenterrordiv').css({
                display: 'none'
            });

            $('#rproof').change(function()
            {
                previewresident();
            });

            $('#iproof').change(function()
            {
                previewidentityproof();
            });

            $('#profile').change(function()
            {
                previewprofile();
            });

            /*Hide Plan Detail*/
            $('#plandetail').hide();

            /*Fill Sponsor Name*/
            $('#scode').change(function(){
                var sponsorcode=$('#scode').val();

                $.ajax({
                    url: "<?php echo site_url('Controller/load_sponsorname/');?>"+sponsorcode,
                    success : function(response)
                    {
                        document.getElementById('snm').value=response;
                    } 
                });
            });

            /*Fill Branch Name*/
            $('#bcode').change(function(){
                var branchcode=$('#bcode').val();
                $.ajax({
                    url: "<?php echo site_url('Controller/load_branchname/');?>"+branchcode,
                    success : function(response)
                    {
                        document.getElementById('bnm').value=response;
                    } 
                });
            });

            /*Fill City Combo*/
            $('#state').change(function(){
                var stateid=$('#state').val();

                $.ajax({
                    url: "<?php echo site_url('Controller/load_city/');?>"+stateid,
                    success : function(response)
                    {
                        document.getElementById('city').innerHTML=response;
                    } 
                });
            });

             /*Fill sponsor Combo*/
            $('#bcode').change(function(){
                var bid=$('#bcode').val();

                $.ajax({
                    url: "<?php echo site_url('Controller/load_sponsor/');?>"+bid,
                    success : function(response)
                    {
                        document.getElementById('scode').innerHTML=response;
                    } 
                });
            });

            /*Fill Next Due Date*/
            $('#jdate').change(function()
            {   
                var d=$('#jdate').val();
                var dateParts = d.split("/");
                var dateObject = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]);
                var date=new Date(dateObject);
                var newdate=new Date(date);
                newdate.setMonth(newdate.getMonth()+1);
                var dd=newdate.getDate();
                if((dd.toString().length)<=1)
                {
                    day="0"+dd.toString();
                }
                else
                {
                    day=dd;
                }
                var mm=newdate.getMonth()+1;
                if((mm.toString().length)<=1)
                {
                    month="0"+mm.toString();
                }
                else
                {
                    month=mm;
                }
                var yr=newdate.getFullYear();
                var ndate=day + '/' + month + '/' +yr;
                $('#ndate').val(ndate);   
            });

            /*Open Plan Detail Division*/
            $('#splan').change(function()
            {
                $("#plandetail").slideUp(1);
                $("#plandetail").slideDown(1000);
                var planid=$('#splan').val();
                $('#sfeet').val('');
                $('#damt').val('');
                $('#tamt').val('');
                $('#ramt').val('');
                $('#eval').val('');
                abc(planid);
                $('html,body').animate({
                  scrollTop:$('#plandetail').offset().top -100
                },1000);
            });

            /*Fill Plan Details*/
            $('#damt').keyup(function()
            {
                var sfet=$('#sfeet').val();
                var sfetp=$('#sfeetp').val();
                var totamt=sfet*sfetp;
                $('#tamt').val(totamt);
                var downamt=$('#damt').val();
                var toamt=$('#tamt').val();
                var remamt=toamt-downamt;                
                $('#ramt').val(remamt);
                var emival=$('#temi').val();
                var totemaival=Math.round(remamt/emival);
                $('#eval').val(totemaival); 
            });

            /*clear value*/
            $('#sfeet').keyup(function()
            {
                $('#damt').val('');
                $('#tamt').val('');
                $('#ramt').val('');
                $('#eval').val('');
                $('html,body').animate({
                  scrollTop:$('#plandetail').offset().top -100
                },1000);
            });

            $('#rproof').change(function(){
                rpic = $('#rproof')[0].files[0];
            });
            $('#iproof').change(function(){
                ipic = $('#iproof')[0].files[0];
            });
            $('#profile').change(function(){
                ppic = $('#profile')[0].files[0];
            });

            $('#modalsubmit').click(function()
            {
                $('#csubmit').click();
            });
        });

        function abc(planid)
        {
            $.ajax({
                url : "<?php echo site_url('Controller/load_plandetails/');?>"+planid,
                type : "GET",
                dataType : "JSON",
                success : function(response)
                {
                    $('#sfeetp').val(response[0].pricepersfeet);
                    $('#temi').val(response[0].pmonth);
                }
            });
        }

        function insertFinal()
        {
            $('#Squarefeeterrordiv').css({
                display: 'none'
            });

            $('#downpaymenterrordiv').css({
                display: 'none'
            });
            
            $('#scodeerror').hide();
            $('#bcodeerror').hide();
            $('#cnmerror').hide();
            $('#fhnmerror').hide();
            $('#gendererror').hide();
            $('#birtherror').hide();
            $('#adderror').hide();
            $('#stateerror').hide();
            $('#cityerror').hide();
            $('#pinerror').hide();
            $('#phnoerror').hide();
            $('#altphnoerror').hide();
            $('#panerror').hide();
            $('#adharerror').hide();
            $('#emailerror').hide();
            $('#nnmerror').hide();
            $('#nrelerror').hide();
            $('#nbirtherror').hide();
            $('#nadderror').hide();
            $('#jdateerror').hide();
            $('#mstatuserror').hide();
            $('#occuerror').hide();
            $('#naterror').hide();
            $('#splanerror').hide();
            $('#sfeetserror').hide();
            $('#dpayerror').hide();
            $('#residentprooferror').hide();
            $('#identityprooferror').hide();
            $('#profileerror').hide();

            scode=$('#scode').val();
            sname=$('#snm').val();
            bcode=$('#bcode').val();
            bname=$('#bnm').val();
            cnm=$('#cnm').val();
            fnm=$('#fnm').val();
            gender=$("input[name='gender']:checked").val();
            dob=$('#dob').val();
            address=$('#address').val();
            country=$('#country').val();
            state=$('#state').val();
            city=$('#city').val();
            pcode=$('#pcode').val();
            phno=$('#mno').val();
            aphno=$('#amno').val();
            panno=$('#pno').val();
            aadharno=$('#ano').val();
            email=$('#email').val();
            nnm=$('#nnm').val();
            nrel=$('#nrel').val();
            ndob=$('#ndob').val();
            naddress=$('#naddress').val();
            jdate=$('#jdate').val();
            nddate=$('#ndate').val();
            mstat=$('#mstatus').val();
            occ=$('#occu').val();
            nationality=$("input[name='nationality']:checked").val();
            plancode=$('#splan').val();
            sprice=$('#sfeetp').val();
            sfeet=$('#sfeet').val();
            dpay=$('#damt').val();
            tamt=$('#tamt').val();
            ramt=$('#ramt').val();
            temi=$('#temi').val();
            eval=$('#eval').val();
            
            fd = new FormData();

            if(document.getElementById("rproof").files.length != 0)
            {
                fd.append('rproof', rpic);
            }
            else
            {
                fd.append('rproof','');
            }

            if(document.getElementById("iproof").files.length != 0)
            {
                fd.append('iproof', ipic);
            }
            else
            {
                fd.append('iproof','');
            }

            if(document.getElementById("profile").files.length != 0)
            {
                fd.append('profile', ppic);
            }
            else
            {
                fd.append('profile','');
            }
            
            fd.append('scode', scode);
            fd.append('bcode', bcode);
            fd.append('cnm',cnm);
            fd.append('fnm',fnm);
            fd.append('dob',dob);
            fd.append('address',address);
            fd.append('state',state);
            fd.append('gender',gender);
            fd.append('country',country);
            fd.append('city',city);
            fd.append('pcode',pcode);
            fd.append('mno',phno);
            fd.append('amno',aphno);
            fd.append('pno',panno);
            fd.append('ano',aadharno);
            fd.append('email',email);
            fd.append('nnm',nnm);
            fd.append('nrel',nrel);
            fd.append('ndob',ndob);
            fd.append('naddress',naddress);
            fd.append('jdate',jdate);
            fd.append('ndate',nddate);
            fd.append('mstatus',mstat);
            fd.append('occu',occ);
            fd.append('nationality',nationality);
            fd.append('splan',plancode);
            fd.append('sfeet',sfeet);
            fd.append('damt',dpay);
            fd.append('tamt',tamt);
            fd.append('ramt',ramt);
            fd.append('temi',temi);
            fd.append('eval',eval);
            fd.append('sfeetp',sprice);


            $.ajax({
                url : "<?php echo site_url('Controller/add_customer');?>",
                data:fd,
                dataType:"JSON",
                type:"POST",
                processData:false,
                contentType:false,
                beforeSend:function()
                {
                    $('#loading-image').show();
                },
                complete:function()
                {
                    $('#loading-image').hide();
                },
                success:function(response)
                {
                    console.log(response);
                    if(response.code==1)
                    {
                        swal({
                            title:"Opps..",
                            text:"<span style='font-size:20px;font-weight:bold;'>Please Correct the Errors...</span>",
                            type:"error"
                        });

                        $('.swal2-confirm').click(function(){
                            $('html,body').animate({
                                scrollTop:$('#top').offset().top-220
                            },2000);
                        });

                        if(response.msg.search('\n') > 0)
                        {
                            d=response.msg.split("\n");
                        }
                        else
                        {
                            d=response.msg;
                        }

                        for(var i=0;i<d.length;i++)
                        {
                            if(d[i].search('Sponsor code') > 0)
                            {
                                $('#scodeerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Branch code') > 0)
                            {
                                $('#bcodeerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Customer Name') > 0)
                            {
                                $('#cnmerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Father/Husband Name') > 0)
                            {
                                $('#fhnmerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('The Date Of Birth field is required.') > 0)
                            {
                                $('#birtherror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('The Address field is required.') > 0)
                            {
                                $('#adderror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('State') > 0)
                            {
                                $('#stateerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('City') > 0)
                            {
                                $('#cityerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('pin code') > 0)
                            {
                                $('#pinerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('The Phone Number field is required.') > 0)
                            {
                                $('#phnoerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Alternative') > 0)
                            {
                                $('#altphnoerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Pan Card') > 0)
                            {
                                $('#panerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Aadhar Card') > 0)
                            {
                                $('#adharerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Email') > 0)
                            {
                                $('#emailerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Profile Pic') > 0)
                            {
                                $('#profileerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Resident Proof') > 0)
                            {
                                $('#residentprooferror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Nominee Name') > 0)
                            {
                                $('#nnmerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Nominee Relation') > 0)
                            {
                                $('#nrelerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('The Nominee Date Of Birth field is required.') > 0)
                            {
                                $('#nbirtherror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('The Nominee Address field is required.') > 0)
                            {
                                $('#nadderror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Joining Date') > 0)
                            {
                                $('#jdateerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Marital Status') > 0)
                            {
                                $('#mstatuserror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Occupation') > 0)
                            {
                                $('#occuerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Identity Proof') > 0)
                            {
                                $('#identityprooferror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Plan') > 0)
                            {
                                $('#splanerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Square Feet') > 0)
                            {
                                $('#Squarefeeterrordiv').css({
                                    display: ''
                                });
                                $('#sfeetserror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Down Payment') > 0)
                            {
                                $('#downpaymenterrordiv').css({
                                    display: ''
                                });
                                $('#dpayerror').html(d[i]).slideDown('slow');
                            }
                       }
                    }
                    else
                    {
                        swal({
                            title:"Good Job",
                            text:"<span style='font-size:20px;font-weight:bold;'>successFully Inserted...</span>",
                            type:"success"
                        });

                        $('.swal2-confirm').click(function(){
                            window.location.href="load_admincustomerlist";
                        });
                    }
                }
            });
        }

        function open_preview()
        {   
            $('#Squarefeeterrordiv').css({
                display: 'none'
            });

            $('#downpaymenterrordiv').css({
                display: 'none'
            });

            $('#scodeerror').hide();
            $('#bcodeerror').hide();
            $('#cnmerror').hide();
            $('#fhnmerror').hide();
            $('#gendererror').hide();
            $('#birtherror').hide();
            $('#adderror').hide();
            $('#stateerror').hide();
            $('#cityerror').hide();
            $('#pinerror').hide();
            $('#phnoerror').hide();
            $('#altphnoerror').hide();
            $('#panerror').hide();
            $('#adharerror').hide();
            $('#emailerror').hide();
            $('#nnmerror').hide();
            $('#nrelerror').hide();
            $('#nbirtherror').hide();
            $('#nadderror').hide();
            $('#jdateerror').hide();
            $('#mstatuserror').hide();
            $('#occuerror').hide();
            $('#naterror').hide();
            $('#splanerror').hide();
            $('#sfeetserror').hide();
            $('#dpayerror').hide();
            $('#residentprooferror').hide();
            $('#identityprooferror').hide();

            scode=$('#scode').val();
            sname=$('#snm').val();
            bcode=$('#bcode').val();
            bname=$('#bnm').val();
            cnm=$('#cnm').val();
            fnm=$('#fnm').val();
            gender=$("input[name='gender']:checked").val();
            dob=$('#dob').val();
            address=$('#address').val();
            country=$('#country').val();
            state=$('#state').val();
            city=$('#city').val();
            pcode=$('#pcode').val();
            phno=$('#mno').val();
            aphno=$('#amno').val();
            panno=$('#pno').val();
            aadharno=$('#ano').val();
            email=$('#email').val();
            nnm=$('#nnm').val();
            nrel=$('#nrel').val();
            ndob=$('#ndob').val();
            naddress=$('#naddress').val();
            jdate=$('#jdate').val();
            nddate=$('#ndate').val();
            mstat=$('#mstatus').val();
            occ=$('#occu').val();
            nationality=$("input[name='nationality']:checked").val();
            plancode=$('#splan').val();
            sprice=$('#sfeetp').val();
            sfeet=$('#sfeet').val();
            dpay=$('#damt').val();
            tamt=$('#tamt').val();
            ramt=$('#ramt').val();
            temi=$('#temi').val();
            eval=$('#eval').val();

            fd = new FormData();

            if(document.getElementById("rproof").files.length != 0)
            {
                fd.append('rpic', rpic);
            }
            else
            {
                fd.append('rpic','');
            }

            if(document.getElementById("iproof").files.length != 0)
            {
                fd.append('ipic', ipic);
            }
            else
            {
                fd.append('ipic','');
            }
            
            fd.append('scode', scode);
            fd.append('bcode', bcode);
            fd.append('cnm',cnm);
            fd.append('fnm',fnm);
            fd.append('dob',dob);
            fd.append('address',address);
            fd.append('state',state);
            fd.append('gender',gender);
            fd.append('country',country);
            fd.append('city',city);
            fd.append('pcode',pcode);
            fd.append('mno',phno);
            fd.append('amno',aphno);
            fd.append('pno',panno);
            fd.append('ano',aadharno);
            fd.append('email',email);
            fd.append('nnm',nnm);
            fd.append('nrel',nrel);
            fd.append('ndob',ndob);
            fd.append('naddress',naddress);
            fd.append('jdate',jdate);
            fd.append('ndate',nddate);
            fd.append('mstatus',mstat);
            fd.append('occu',occ);
            fd.append('nationality',nationality);
            fd.append('splan',plancode);
            fd.append('sfeet',sfeet);
            fd.append('damt',dpay);
            fd.append('tamt',tamt);
            fd.append('ramt',ramt);
            fd.append('temi',temi);
            fd.append('eval',eval);
            fd.append('sfeetp',sprice);

            $.ajax({
                url : "<?php echo site_url('Controller/preview_customer/add');?>",
                data:fd,
                dataType:"JSON",
                type:"POST",
                processData:false,
                contentType:false,

                success:function(response)
                {
                    console.log(response);
                    if(response.code==0)
                    {
                        $('#sponsorcodeerror').html(scode);
                        $('#sponsornameerror').html(sname);
                        $('#branchcodeerror').html(bcode);
                        $('#branchnameerror').html(bname);
                        $('#customernameerror').html(cnm);
                        $('#fhnameerror').html(fnm);
                        $('#genderserror').html(gender);
                        $('#doberror').html(dob);
                        $('#addresserror').html(address);
                        $('#stateserror').html(response.state);
                        $('#cityserror').html(response.city);
                        $('#pincodeerror').html(pcode);
                        $('#phoneerror').html(phno);
                        $('#aphoneerror').html(aphno);
                        $('#pancarderror').html(panno);
                        $('#aadharcarderror').html(aadharno);
                        $('#emailserror').html(email);
                        $('#nnameerror').html(nnm);
                        $('#nrelationerror').html(nrel);
                        $('#ndoberror').html(ndob);
                        $('#naddresserror').html(naddress);
                        $('#jdateserror').html(jdate);
                        $('#nduedateerror').html(nddate);
                        $('#mstatusserror').html(mstat);
                        $('#occuserror').html(occ);
                        $('#nationalityerror').html(nationality);
                        $('#plannameerror').html(plancode);
                        $('#spriceerror').html(sprice);
                        $('#sfeeterror').html(sfeet);
                        $('#dpaymenterror').html(dpay);
                        $('#tamterror').html(tamt);
                        $('#ramterror').html(ramt);
                        $('#emierror').html(temi);
                        $('#emivalueerror').html(eval);
                        $('#mymodal').modal();
                    }
                    else
                    {
                        //$('#mymodal').modal();
                        swal({
                            title:"Opps..",
                            text:"<span style='font-size:20px;font-weight:bold;'>Please Correct the Errors...</span>",
                            type:"error"
                        });

                        $('.swal2-confirm').click(function(){
                            $('html,body').animate({
                                scrollTop:$('#top').offset().top-220
                            },2000);
                        });
                        
                        if(response.msg.search('\n') > 0)
                        {
                            d=response.msg.split("\n");
                        }
                        else
                        {
                            d=response.msg;
                        }
                        
                        for(var i=0;i<d.length;i++)
                        {
                            if(d[i].search('Sponsor code') > 0)
                            {
                                $('#scodeerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Branch code') > 0)
                            {
                                $('#bcodeerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Customer Name') > 0)
                            {
                                $('#cnmerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Father/Husband Name') > 0)
                            {
                                $('#fhnmerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('The Date Of Birth field is required.') > 0)
                            {
                                $('#birtherror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('The Address field is required.') > 0)
                            {
                                $('#adderror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('State') > 0)
                            {
                                $('#stateerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('City') > 0)
                            {
                                $('#cityerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('pin code') > 0)
                            {
                                $('#pinerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('The Phone Number field is required.') > 0)
                            {
                                $('#phnoerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Alternative') > 0)
                            {
                                $('#altphnoerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Pan Card') > 0)
                            {
                                $('#panerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Aadhar Card') > 0)
                            {
                                $('#adharerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Email') > 0)
                            {
                                $('#emailerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Resident Proof') > 0)
                            {
                                $('#residentprooferror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Nominee Name') > 0)
                            {
                                $('#nnmerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Nominee Relation') > 0)
                            {
                                $('#nrelerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('The Nominee Date Of Birth field is required.') > 0)
                            {
                                $('#nbirtherror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('The Nominee Address field is required.') > 0)
                            {
                                $('#nadderror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Joining Date') > 0)
                            {
                                $('#jdateerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Marital Status') > 0)
                            {
                                $('#mstatuserror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Occupation') > 0)
                            {
                                $('#occuerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Identity Proof') > 0)
                            {
                                $('#identityprooferror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Plan') > 0)
                            {
                                $('#splanerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Square Feet') > 0)
                            {
                                $('#Squarefeeterrordiv').css({
                                    display: ''
                                });
                                $('#sfeetserror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Down Payment') > 0)
                            {
                                $('#downpaymenterrordiv').css({
                                    display: ''
                                });
                                $('#dpayerror').html(d[i]).slideDown('slow');
                            }
                       }
                    }
                }
            });
        }

        function edit_cancel()
        {
            window.location.href="load_admincustomerlist";
        }
    </script>
</body>
<div id="loading-image">
    <img src="<?php echo base_url(); ?>assets/uploads/otherimages/loading-4.gif" height="10%" width="auto" >
</div>
</html>