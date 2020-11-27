<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Add Sponsor</title>
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
            $this->load->view('admin/adminheader');
        ?>

        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <?php 
                    $array['j']='Add Sponsor';
                    $this->load->view('admin/topheader',$array);
                ?>

                <div class="page-content-wrapper ">
                    <div class="container-fluid">
                        <!-- form -->
                        <form method="post" action="<?php echo base_url();?>index.php/Controller/add_sponsor" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" placeholder="Enter Full Name" id="snm" name="snm" value="<?php echo set_value('snm')?>" autocomplete="off">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="snameerror"></span></b>
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
                                                        <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="dob" name="dob" value="<?php echo set_value('dob')?>" autocomplete="off">
                                                        <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="mdi mdi-calendar"></i></span></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                   <b><span id="doberror"></span></b>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Phone Number</label>
                                                <div class="col-sm-5 form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-append bg-custom b-0"><span class="input-group-text"><label style="font-size:15px;padding-top:5px;">+91</label></span></div>
                                                        <input type="text" class="form-control" placeholder="Enter Mobile Number" id="mno" name="mno" value="<?php echo set_value('mno')?>" maxlength="10" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                   <b><span id="phoneerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Alternative Number</label>
                                                <div class="col-sm-5 form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-append bg-custom b-0"><span class="input-group-text"><label style="font-size:15px;padding-top:5px;">+91</label></span></div>
                                                        <input type="text" class="form-control" placeholder="Enter Mobile Number" id="amno" name="amno" value="<?php echo set_value('amno')?>" maxlength="10" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="altphoneerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Email Id</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" placeholder="Enter Emai Id" id="email" name="email" value="<?php echo set_value('email')?>" autocomplete="off">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="emailerror"></span></b>
                                                </div>
                                            </div>
                                           
                                            <?php 
                                                $res=$this->Model->model_select('state');
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
                                                <label class="col-sm-3 col-form-label">Profile</label>
                                                <div class="col-sm-5">
                                                    <div>
                                                        <input type="file" name="profilepic" id="profilepic" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="profileerror"></span></b>
                                                </div>
                                            </div>

                                            <?php 
                                                $res=$this->Model->model_select('branchtb');
                                            ?>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Branch Associated</label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" name="bassoc" id="bassoc">
                                                        <option hidden="" value="">Select</option>
                                                         <?php 
                                                           foreach($res as $q)
                                                           {
                                                        ?>
                                                            <option value="<?php echo $q->bid; ?>" <?php echo set_select('bassoc',$q->branch_code,FALSE)?>><?php echo $q->bname;?></option>
                                                        <?php
                                                           }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="bassocerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Payment Type</label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" name="ptype" id="ptype" value="<?php echo set_value('ptype')?>">
                                                        <option hidden="" value="">Select</option>
                                                        <option value="Cash" <?php echo set_select('ptype','Cash',FALSE)?>>Cash</option>
                                                        <option value="Cheque" <?php echo set_select('ptype','Cheque',FALSE)?>>Cheque</option>
                                                        <option value="Bank Transfer" <?php echo set_select('ptype','Bank Transfer',FALSE)?>>Bank Transfer</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="ptypeerror"></span></b>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Pan Card Number</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" placeholder="Enter Pan Card Number" id="pno" name="pno" value="<?php echo set_value('pno')?>" autocomplete="off" maxlength=10>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="pcarderror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Aadhar Card Number</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" placeholder="Enter Adhar Card Number" id="ano" name="ano" value="<?php echo set_value('ano')?>" autocomplete="off" maxlength="12">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="acarderror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Resident Proof</label>
                                                <div class="col-sm-5">
                                                    <div>
                                                        <input type="file" name="rproof" id="rproof" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="rprooferror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Nominee Name</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" placeholder="Enter Nominee Name" id="nnm" name="nnm" value="<?php echo set_value('nnm')?>" autocomplete="off">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="nnameerror"></span></b>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nominee Address</label>
                                                <div class="col-sm-5" name="naddress">
                                                     <textarea class="form-control" rows="5" id="address" name="naddress" placeholder="Enter Nominee Address" autocomplete="off"><?php set_value('address')?></textarea>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="naddresserror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Nominee Relation</label>
                                                <div class="col-sm-5">
                                                    <input class="form-control" type="text" placeholder="Enter Nominee Relation" id="nrel" name="nrel" value="<?php echo set_value('nrel')?>" autocomplete="off">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="nrelationerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-3 col-form-label">Nominee BirthDate</label>
                                                <div class="col-sm-5 form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="ndob" value="<?php echo set_value('ndob')?>" name="ndob" autocomplete="off">
                                                        <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="mdi mdi-calendar"></i></span></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="ndoberror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Commission Type</label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" name="ctype" id="ctype" value="<?php echo set_value('ctype')?>">
                                                        <option hidden="" value="">Select</option>
                                                        <option value="Fixed" <?php echo set_select('ctype','Fixed',FALSE)?>>Fixed</option>
                                                        <option value="Rate" <?php echo set_select('ctype','Rate',FALSE)?>>Rate(%)</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="ctypeerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Pay Frequancy</label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" name="payf" id="payf">
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="payerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Commission Rate</label>
                                                <div class="col-sm-5">
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" placeholder="Enter Commision Rate" id="crate" name="crate" value="<?php echo set_value('crate')?>" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="craterateerror"></span></b>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-2">
                                                    <input type="button" name="submit" value="submit" class="btn btn-info btn-block" id="submit" onclick="add_final()"> 
                                                </div>
                                                &nbsp;
                                                <div class="col-sm-2">
                                                    <input type="button" name="cancel" value="Cancel" class="btn btn-info btn-block" onclick="add_cancel()">
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
        var ppic='';
        var rpic='';

        $(function(){
            $("#dob").datepicker({autoclose:!0,todayHighlight:!0,format: 'dd/mm/yyyy',endDate:'+0d'});
            $("#ndob").datepicker({autoclose:!0,todayHighlight:!0,format: 'dd/mm/yyyy',endDate:'+0d'});

            $('#loading-image').hide();

            $('#profilepic').change(function(){
                ppic = $('#profilepic')[0].files[0];
            });

            $('#rproof').change(function(){
                rpic = $('#rproof')[0].files[0];
            });

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
        
            $('#ctype').change(function(){
                var ctype=$('#ctype').val();
                if(ctype==='Fixed')
                {
                    $('#payf').html('<option hidden="" value="">Select</option><option value="Monthly">Monthly</option><option value="Quarterly">Quarterly</option>');
                }
                else
                {
                   $('#payf').html('<option hidden="" value="">Select</option><option value=" Per EMI"> Per EMI</option>'); 
                }
            });
        });

        function add_final()
        {
            $('#snameerror').hide();
            $('#doberror').hide();
            $('#phoneerror').hide();
            $('#altphoneerror').hide();
            $('#emailerror').hide();
            $('#stateerror').hide();
            $('#cityerror').hide();
            $('#bassocerror').hide();
            $('#ptypeerror').hide();
            $('#crateerror').hide();
            $('#pcarderror').hide();
            $('#acarderror').hide();
            $('#nnameerror').hide();
            $('#naddresserror').hide();
            $('#nrelationerror').hide();
            $('#ndoberror').hide();
            $('#profileerror').hide();
            $('#rprooferror').hide();
            $('#craterateerror').hide();
            $('#payerror').hide();
            $('#ctypeerror').hide();

            snm=$('#snm').val();
            gender=$("input[name='gender']:checked").val();
            dob=$('#dob').val();
            mno=$('#mno').val();
            altmno=$('#amno').val();    
            email=$('#email').val();
            state=$('#state').val();
            city=$('#city').val();
            bassoc=$('#bassoc').val();
            ptype=$('#ptype').val();
            crate=$('#crate').val();
            pancard=$('#pno').val();
            ano=$('#ano').val();
            nnm=$('#nnm').val();
            address=$('#address').val();
            nrel=$('#nrel').val();
            ndob=$('#ndob').val();
            ctype=$('#ctype').val();
            crate=$('#crate').val();
            payf=$('#payf').val();

            fd = new FormData();

            if(document.getElementById("profilepic").files.length != 0)
            {
                fd.append('profilepic', ppic);
            }
            else
            {
                fd.append('profilepic','');
            }

            if(document.getElementById("rproof").files.length != 0)
            {
                fd.append('rproof', rpic);
            }
            else
            {
                fd.append('rproof','');
            }

            fd.append('snm', snm);
            fd.append('gender', gender);
            fd.append('dob', dob);
            fd.append('mno', mno);
            fd.append('amno', altmno);
            fd.append('email', email);
            fd.append('state', state);
            fd.append('city', city);
            fd.append('bassoc', bassoc);
            fd.append('ptype', ptype);
            fd.append('crate', crate);
            fd.append('pno', pancard);
            fd.append('ano', ano);
            fd.append('nnm', nnm);
            fd.append('address', address);
            fd.append('nrel', nrel);
            fd.append('ndob', ndob);
            fd.append('ctype',ctype);
            fd.append('crate',crate);
            fd.append('payf',payf);       
                    
            $.ajax({
                url : "<?php echo site_url('Controller/add_sponsor')?>",
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
                            if(d[i].search('Sponsor Name') > 0)
                            {
                                $('#snameerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Date Of Birth') > 0)
                            {
                                $('#doberror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Mobile Number') > 0)
                            {
                                $('#phoneerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Alternative Phone Number') > 0)
                            {
                                $('#altphoneerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Email') > 0)
                            {
                                $('#emailerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('State') > 0)
                            {
                                $('#stateerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('City') > 0)
                            {
                                $('#cityerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Branch Associate') > 0)
                            {
                                $('#bassocerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Payment Type') > 0)
                            {
                                $('#ptypeerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Pan Card') > 0)
                            {
                                $('#pcarderror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Aadhar Card') > 0)
                            {
                                $('#acarderror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Nominee Name') > 0)
                            {
                                $('#nnameerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Nominee Address') > 0)
                            {
                                $('#naddresserror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Nominee Relation') > 0)
                            {
                                $('#nrelationerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Nominee Date Of Birth') > 0)
                            {
                                $('#ndoberror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Profile') > 0)
                            {
                                $('#profileerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Resident Proof') > 0)
                            {
                                $('#rprooferror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Commission Rate') > 0)
                            {
                                $('#craterateerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Pay Frecuency') > 0)
                            {
                                $('#payerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Commission Type') > 0)
                            {
                                $('#ctypeerror').html(d[i]).slideDown('slow');
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
                            window.location.href="load_adminsponsorlist";
                        });
                    }
                }
            });
        }

        function add_cancel()
        {
            window.location.href='load_adminsponsorlist';

        }
    </script>
</body>
<div id="loading-image">
    <img src="<?php echo base_url(); ?>assets/uploads/otherimages/loading-4.gif" height="10%" width="auto" >
</div>
</html>