<?php
    $res=$this->Model->model_select('sponsortb');
?>
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Add commission</title>
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
</head>

<body class="fixed-left" id="top">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

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
                    $array['j']='Pay Commision';
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
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Sponser Code</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" name="scode" id="scode">
                                                        <option hidden="" value="">Select</option>
                                                        <?php 
                                                           foreach($res as $q)
                                                           {
                                                        ?>
                                                            <option value="<?php echo $q->sponsor_code?>"><?php echo $q->sponsor_code;?></option>
                                                        <?php
                                                           }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="scodeerror"></span></b>
                                                </div>
                                            </div> 

                                           
                                           <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                                    Sponser Name
                                                </label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" placeholder="Enter Sponser Name" id="snm" name="snm" autocomplete="off">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="snmerror"></span>
                                                </div>
                                            </div>

                                            
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Commission Type</label>
                                                <div class="col-sm-6">
                                                    <input type="text" id="ctype" class="form-control" readonly="">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <span id="ctypeerror"></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Pay Frequancy</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text"  id="payf" name="payf" autocomplete="off" readonly="">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <span id="payerror"></span>
                                                </div>
                                            </div>

                                         
                                        <div id="monqur">
                                         <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Payable Commission</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text"  id="mon" name="mon" autocomplete="off" readonly="">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <span id="payerror"></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                             
                                            
                                        <div id="detail">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Commission Rate</label>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" placeholder="Enter Commision Rate" id="crate" name="crate" value="<?php echo set_value('crate')?>" autocomplete="off" maxlength="3" readonly="">
                                                        <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="mdi mdi-percent"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="payerror"></span></b>
                                                </div>
                                            </div>
                                        </div>

                                            <div id="fixed">
                                                <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">
                                                    Total Commision
                                                </label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" placeholder="Enter Total Commision" id="totcom" name="totcom" autocomplete="off">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="totcomerror"></span></b>
                                                </div>
                                            </div>
                                        
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-2">
                                                   <button type="button" name="csubmit" value="csubmit" class="btn btn-info btn-block" id="submit" onclick="add_final()">Submit</button>
                                                </div>
                                                &nbsp;
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

    <!-- jQuery  -->
    <script src="<?php echo base_url()?>admin/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/popper.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/modernizr.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/waves.js"></script>
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
        $(function(){
            $('#detail').hide();
            $('#fixed').hide();
            $('#monqur').hide();
        });
        $('#scode').change(function(){
                var sponsorcode=$('#scode').val();
                 $('#detail').hide();
                $('#fixed').hide();
                $('#monqur').hide();
                 $('#totcom').val('');

                $.ajax({
                    url: "<?php echo site_url('Controller/load_commission_data/');?>"+sponsorcode,
                    type:"POST",
                    dataType:"JSON",
                    success : function(response)
                    {
                        if(response[1]==null)
                        {
                             swal({
                                title:"Opps..",
                                text:"<span style='font-size:20px;font-weight:bold;'>Payment is Done...</span>",
                                type:"error"
                             });

                        }
                        else
                        {
                            $('#snm').val(response[0].sname);
                               $('#mon').val(response[0].commissionrate);
                            $('#payf').val(response[0].payfrequancy);
                            $('#ctype').val(response[0].scommissiontype);
                            var type=response[0].payfrequancy;
                            console.log(type);
                            if(type=='Monthly' || type=='Quarterly')
                            {
                                $('#fixed').show();
                                $('#monqur').show();
                            }
                            else
                            {
                                
                                $('#detail').show();
                                $('#fixed').show();
                                $('#crate').val(response[0].commissionrate);
                                var totamt=response[1].totamt1;
                                console.log(totamt);
                                var rate=response[0].commissionrate;
                                var totpay=Number(totamt*(rate/100));
                                console.log(totamt,rate,totpay);
                                $('#totcom').val(totpay);
                                
                            }
                        }
                    } 
                });
            });

            function add_final()
            {
                $('#scodeerror').hide();
                
                scode=$('#scode').val();
                snm=$('#snm').val();
                ctype=$('#ctype').val();
                crate=$('#crate').val();
                payf=$('#payf').val();
                totcom=$('#totcom').val();
                alert(snm);
                fd = new FormData();

                fd.append('scode',scode);
                fd.append('snm', snm);
                fd.append('ctype',ctype);
                fd.append('crate',crate);
                fd.append('payf',payf);       
                fd.append('totcom',totcom);    
                $.ajax({
                    url : "<?php echo site_url('Controller/add_commission')?>",
                    data:fd,
                    dataType:"JSON",
                    type:"POST",
                    processData:false,
                    contentType:false,
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
                            if(d[i].search('Sponsor Code') > 0)
                            {
                                $('#scodeerror').html(d[i]).slideDown('slow');
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
                            window.location.href="load_promoter";
                        });
                    }
                }

                });
            }
        function edit_cancel()
        {
            window.location.href="load_promoter";
        }
    </script>
</body>
</html>