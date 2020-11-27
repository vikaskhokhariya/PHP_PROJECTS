<!DOCTYPE html>
<html>
    
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Receipt List</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesdesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>admin/assets/images/favicon.ico">

        <!-- Sweet Alert -->
        <link href="<?php echo base_url()?>admin/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

        <!-- Plugins css -->
        <link href="<?php echo base_url()?>admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>admin/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

        <!-- Table css -->
        <link href="<?php echo base_url()?>admin/assets/plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css" rel="stylesheet" type="text/css" media="screen">

        <!-- App css -->
        <link href="<?php echo base_url()?>admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>admin/assets/css/style.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">
            <?php 
                $this->load->view('branch/branchheader');
            ?>

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <?php 
                        $array['j']='Receipt List';
                        $this->load->view('branch/topheader',$array);
                    ?>

                    <div class="page-content-wrapper ">
                        <div class="container-fluid">
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <h4 class="page-title" style="color:black;">Search Receipt</h4>
                                    </div>
                                </div>
                            </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row form-group text-center">
                                    <div class="col-sm-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="example-text-input" class="col-form-label">Receipt No</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="text" name="recno" id="recno" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="example-text-input" class="col-form-label">Customer Code</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="text" name="custid" class="form-control" id="custid">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="example-text-input" class="col-form-label">Customer Name</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="text" name="custnm" id="custnm" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="example-text-input" class="col-form-label">Promotor Code</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="text" name="scode" id="scode" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="example-text-input" class="col-form-label">From Date</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="fromdate" name="fromdate" autocomplete="off">
                                                    <div class="input-group-append bg-custom b-0">
                                                        <span class="input-group-text">
                                                            <i class="mdi mdi-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="example-text-input" class="col-form-label">To Date</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="todate" name="todate" autocomplete="off">
                                                    <div class="input-group-append bg-custom b-0">
                                                        <span class="input-group-text">
                                                            <i class="mdi mdi-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        
                                    </div>
                                    <div class="col-3">
                                        <input type="button" value="Search" name="serbtn" id="serbtn" class="btn btn-success btn-block">
                                    </div>
                                    <div class="col-3">
                                        <input type="button" value="Reset" name="serbtn" class="btn btn-success btn-block" id="reset">
                                    </div>
                                    <div class="col-3">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title" style="color:black;">Receipt List</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div id="division">
                     
                </div>

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
        <div class="modal fade bs-example-modal-lg" tabindex="-1" id="printreceipt">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <section class="container py-4" id="printreceipt1">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <b>Payment Receipt</b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <span style="font-size:20px;">Customer Details</span>
                                    <hr style="margin-top: 0px;margin-bottom: 0px;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <b>Booking No:</b>&nbsp;<span id="bookingno"></span>
                                </div>
                                <div class="col-sm-4">
                                    <b>Booking Date:</b>&nbsp;<span id="bookingdate"></span>
                                </div>
                                <div class="col-sm-4">
                                    <b>Branch:</b>&nbsp;<span id="branchnm"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <b>Customer Name:</b>
                                </div>
                                <div class="col-sm-3">
                                    <span id="customernm"></span>
                                </div>
                                <div class="col-sm-3">
                                    <b>Address:</b>
                                </div>
                                <div class="col-sm-2">
                                    <span id="address"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <b>Promotor Code:</b>
                                </div>
                                <div class="col-sm-3">
                                    <span id="pcode"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <hr style="margin-top: 0px;margin-bottom: 0px;">
                                    <span style="font-size:20px;">Receipt Details</span>
                                    <hr style="margin-top: 0px;margin-bottom: 0px;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <b>Date Of Receipt:</b>
                                </div>
                                <div class="col-sm-3">
                                    <span id="recdate"></span>
                                </div>
                                <div class="col-sm-3">
                                    <b>Receipt No:</b>
                                </div>
                                <div class="col-sm-2">
                                    <span id="recnum"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <b>Plan & Term:</b>
                                </div>
                                <div class="col-sm-3">
                                    <span id="planterm"></span>
                                </div>
                                <div class="col-sm-3">
                                    <b>Amount of Inst.:</b>
                                </div>
                                <div class="col-sm-2">
                                    <span id="amtinst"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <b>Installment Date:</b>
                                </div>
                                <div class="col-sm-3">
                                    <span id="instdate"></span>
                                </div>
                                <div class="col-sm-3">
                                    <b>Other Charges:</b>
                                </div>
                                <div class="col-sm-2">
                                    <span id="otheramt"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <b>Next Due Date:</b>
                                </div>
                                <div class="col-sm-3">
                                    <span id="nextduedate"></span>
                                </div>
                                <div class="col-sm-3">
                                    <b>Total Amount:</b>
                                </div>
                                <div class="col-sm-2">
                                    <span id="totamt"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <b>Remaining Installment:</b>
                                </div>
                                <div class="col-sm-3">
                                    <span id="remamt"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <b>Installment No:</b>
                                </div>
                                <div class="col-sm-3">
                                    <span id="instno"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <b>Payment Mode:</b>
                                </div>
                                <div class="col-sm-3">
                                    <span id="pmode"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7"></div>
                                <div class="col-sm-5 text-center">
                                    <b>Amount in words:</b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <span id="wordamt"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7"></div>
                                <div class="col-sm-5 text-right">
                                     <b>For, SUN-9</b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7"></div>
                                <div class="col-sm-5 text-right">
                                     <b>Authorized Signature</b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7"></div>
                                <div class="col-sm-5 text-right">
                                    
                                </div>
                            </div>
                        </section>
                    </div>
                </div><!-- /.modal-content -->
            </div> <!-- /.modal-dialog -->
        </div> <!-- /.modal -->


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

        <!-- Responsive-table-->
        <script src="<?php echo base_url()?>admin/assets/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js" type="text/javascript"></script>

        <script>
            $(function()
            {
                $("#fromdate").datepicker({autoclose:!0,todayHighlight:!0,endDate:'+0d',format:'dd-mm-yyyy',orientation: "bottom"});
            });
            $(function(){
                $("#todate").datepicker({autoclose:!0,todayHighlight:!0,endDate:'+0d',format:'dd-mm-yyyy',orientation: "bottom"});
            });
            $(function() {
                 $('.table-responsive').responsiveTable({
                    addDisplayAllBtn: 'btn btn-secondary'
                });
            });
        </script>
        <script type="text/javascript">
            function printDiv(divName)
            {
                 var printContents = document.getElementById(divName).innerHTML;
                 var originalContents = document.body.innerHTML;
                 document.body.innerHTML = printContents;
                 window.print();
                 document.body.innerHTML = originalContents;
            }

            function show()
             {
                $.ajax({
                    url : "<?php echo site_url('Controller/receipt_data');?>",
                    type : "POST",
                    success : function(response)
                    {
                        document.getElementById("division").innerHTML=response;
                    }
                });
            }

            var recno=custid=cnm=scode=fdate=tdate='';
             $(function(){
                show();
                
                $('#serbtn').click(function(){

                if($('#recno').val()!='')
                {
                    recno=$('#recno').val();
                }
                else
                {
                    recno='undefined';
                }
                if($('#custid').val()!='')
                {
                    custid=$('#custid').val();
                }
                else
                {
                    custid='undefined';
                }
                if($('#custnm').val()!='')
                {
                    cnm=$('#custnm').val();    
                }
                else
                {
                    cnm='undefined';
                }
                if($('#scode').val()!='')
                {
                    scode=$('#scode').val();    
                }
                else
                {
                    scode='undefined';
                }
                if($('#fromdate').val()!='')
                {
                    fdate=$('#fromdate').val();    
                }
                else
                {
                    fdate='undefined';
                }
                if($('#todate').val()!='')
                {
                    tdate=$('#todate').val();    
                }
                else
                {
                    tdate='undefined';
                }

                if((recno=='undefined') && (custid=='undefined') && (cnm=='undefined') && (scode=='undefined') && (fdate=='undefined') && (tdate='undefined'))
                {
                    swal({
                            width:"35%",
                            title:"Opps..",
                            text:"<span style='font-size:20px;color:#67605F;font-weight:bold;'>Please Enter Data to be search...</span>",
                            type:"error",
                            });
                }
                else
                {

                        $.ajax({
                            url: "<?php echo site_url('Controller/load_search_data/');?>"+recno+"/"+custid+"/"+cnm+"/"+scode+"/"+fdate+"/"+tdate,
                            type:"POST",
                            //dataType : "JSON",
                            success : function(response)
                            {
                                $('html,body').animate({
                                    scrollTop:$('#division').offset().top-180
                                },1200);
                                console.log(response);
                                document.getElementById('division').innerHTML=response;
                            } 
                        });
                } 
                });  

                $('#reset').click(function(){
                    $('#recno').val('');
                    $('#custid').val('');
                    $('#custnm').val('');
                    $('#scode').val('');
                    $('#fromdate').val('');
                    $('#todate').val('');
                    $('#recno').focus();
                    show();
                });
            });

            function printreceipt(cust_code)
            {
                $.ajax({
                        url: "<?php echo site_url('Controller/find_receiptdata/');?>"+cust_code,
                        type:"POST",
                        dataType : "JSON",
                        success : function(response)
                        {
                            console.log(response);
                            $('#bookingno').html(response[0].bookingno);
                            $('#bookingdate').html(response[0].reg_date);
                            $('#branchnm').html(response[4].bname);
                            $('#customernm').html(response[0].cust_name);
                            $('#address').html(response[0].caddress);
                            var scode=response[0].sponsor_code;
                            var snm=response[5].sname;
                            var format='('+scode+')'+' '+snm;
                            $('#pcode').html(format);
                            $('#recdate').html(response[1].rec_date);
                            $('#recno').html(response[1].rec_no);
                            $('#planterm').html(response[3].pmonth);
                            $('#instdate').html(response[1].due_date);
                            $('#nextduedate').html(response[1].next_due_date);
                            $('#instno').html(response[1].installment_no);
                            $('#remamt').html(Number(response[3].pmonth) - Number(response[1].installment_no));
                            $('#pmode').html(response[1].pay_mode);
                            $('#recnum').html(response[1].rec_no);
                            $('#amtinst').html(response[1].installment_amt);
                            $('#totamt').html(response[1].net_amt);
                            $('#wordamt').html(convertNumberToWords(response[1].net_amt));
                            var oamt=response[1].other_amt;
                            if(oamt==null)
                            {
                                $('#otheramt').html('0');
                            }
                            else
                            {
                                $('#otheramt').html(response[1].other_amt);    
                            }
                            printDiv('printreceipt1');
                        } 
                    });
                
            }

            function convertNumberToWords(amount)
            {
                var words = new Array();
                words[0] = '';
                words[1] = 'One';
                words[2] = 'Two';
                words[3] = 'Three';
                words[4] = 'Four';
                words[5] = 'Five';
                words[6] = 'Six';
                words[7] = 'Seven';
                words[8] = 'Eight';
                words[9] = 'Nine';
                words[10] = 'Ten';
                words[11] = 'Eleven';
                words[12] = 'Twelve';
                words[13] = 'Thirteen';
                words[14] = 'Fourteen';
                words[15] = 'Fifteen';
                words[16] = 'Sixteen';
                words[17] = 'Seventeen';
                words[18] = 'Eighteen';
                words[19] = 'Nineteen';
                words[20] = 'Twenty';
                words[30] = 'Thirty';
                words[40] = 'Forty';
                words[50] = 'Fifty';
                words[60] = 'Sixty';
                words[70] = 'Seventy';
                words[80] = 'Eighty';
                words[90] = 'Ninety';
                amount = amount.toString();
                var atemp = amount.split(".");
                var number = atemp[0].split(",").join("");
                var n_length = number.length;
                var words_string = "";
                if (n_length <= 9) {
                var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
                var received_n_array = new Array();
                for (var i = 0; i < n_length; i++) {
                    received_n_array[i] = number.substr(i, 1);
                }
                for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
                    n_array[i] = received_n_array[j];
                }
                for (var i = 0, j = 1; i < 9; i++, j++) {
                    if (i == 0 || i == 2 || i == 4 || i == 7) {
                        if (n_array[i] == 1) {
                            n_array[j] = 10 + parseInt(n_array[j]);
                            n_array[i] = 0;
                        }
                    }
                }
                value = "";
                for (var i = 0; i < 9; i++) {
                    if (i == 0 || i == 2 || i == 4 || i == 7) {
                        value = n_array[i] * 10;
                    } else {
                        value = n_array[i];
                    }
                    if (value != 0) {
                        words_string += words[value] + " ";
                    }
                    if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                        words_string += "Crores ";
                    }
                    if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                        words_string += "Lakhs ";
                    }
                    if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                        words_string += "Thousand ";
                    }
                    if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                        words_string += "Hundred and ";
                    } else if (i == 6 && value != 0) {
                        words_string += "Hundred ";
                    }
                }
                words_string = words_string.split("  ").join(" ");
                }
                return words_string;
            }
        </script>

        <script src="<?php echo base_url()?>admin/assets/pages/animate-init.js"></script>
        <!-- App js -->
        <script src="<?php echo base_url()?>admin/assets/js/app.js"></script>

    </body>

</html>