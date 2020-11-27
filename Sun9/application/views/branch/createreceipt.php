<?php $todate; ?>
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Create Receipt</title>
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
        .detail
        {
            border:2px solid black;
            padding:1px;
            border-radius:50px;
            background-color: #B6B0B0;
        }
    </style>
</head>

<body class="fixed-left" id="top">

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
                    $array['j']='Create Receipt';
                    $this->load->view('branch/topheader',$array);
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
                                                <?php 
                                                    $res=$this->Model->model_customer_receipt_no_select('paymenttb');
                                                ?>
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Receipt No</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" id="rec_no" name="rec_no" autocomplete="off" readonly="" value="<?php echo ((int)$res[0]->rec_no)+1;?>">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                
                                                </div>
                                            </div>

                                            <div class="row">
                                                <?php 
                                                    $todate=date("d/m/Y");
                                                ?>
                                                <label class="col-sm-2 col-form-label">Receipt Date</label>
                                                <div class="col-sm-6 form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="rec_date" name="rec_date" autocomplete="off" value="<?php echo $todate; ?>">
                                                        <div class="input-group-append bg-custom b-0">
                                                            <span class="input-group-text">
                                                                <i class="mdi mdi-calendar"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="recdaateerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer ID</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" placeholder="Enter Customer ID" id="cust_id" name="cust_id" autocomplete="off" required="">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="custiderror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Name</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" id="cust_name" name="cust_name" readonly="">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Installment No</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" id="inst_no" name="inst_no" readonly="">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Installment Amount</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" id="inst_amt" name="inst_amt" readonly="">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Due Date</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" id="due_date" name="due_date" readonly="">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Next Due Date</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" id="next_due_date" name="next_due_date" readonly="">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Other Amount</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" id="other_amt" name="other_amt">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Payment Mode</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" name="pmode" id="pmode">
                                                        <option hidden="" value="">Select</option>
                                                        <option value="Cash">Cash</option>
                                                        <option value="Cheque">Cheque</option>
                                                        <option value="Demand Draft">Demand Draft</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="pmodeerror"></span></b>
                                                </div>
                                            </div>


                                            <div class="row" id="cheque">
                                                <div class="col-12">
                                                    <div class="card m-b-30">
                                                        <div class="card-body">
                                                            <h5 class="card-header text-center">Cheque....</h5>
                                                            <div class="card-body">               
                                                                <div class="form-group row">
                                                                    <div class="col-sm-2"></div>
                                                                    <label class="col-sm-2 col-form-label">Cheque No</label>
                                                                    <div class="col-sm-6">
                                                                        <input class="form-control" type="text" id="chequeno" name="chequeno" autocomplete="off" placeholder="Enter Cheque No">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <div class="col-sm-2"></div>
                                                                    <label class="col-sm-2 col-form-label">Cheque Date</label>
                                                                        <div class="col-sm-6 form-group">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="chequedate" name="chequedate" autocomplete="off">
                                                                                <div class="input-group-append bg-custom b-0">
                                                                                    <span class="input-group-text">
                                                                                        <i class="mdi mdi-calendar"></i>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <div class="col-sm-2"></div>
                                                                    <label class="col-sm-2 col-form-label">Bank Name</label>
                                                                    <div class="col-sm-6">
                                                                        <input class="form-control" type="text" id="chequebankname" name="chequebankname" placeholder="Enter Bank Name" autocomplete="off">
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" id="demanddraft">
                                                <div class="col-12">
                                                    <div class="card m-b-30">
                                                        <div class="card-body">
                                                            <h5 class="card-header text-center">Demand Draft....</h5>
                                                            <div class="card-body">               
                                                                <div class="form-group row">
                                                                    <div class="col-sm-2"></div>
                                                                    <label class="col-sm-offset-2 col-sm-2 col-form-label">DD No</label>
                                                                        <div class="col-sm-6">
                                                                            <input class="form-control" type="text" id="ddno" name="ddno" autocomplete="off" placeholder="Enter Demand Draft No">
                                                                        </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-2"></div>
                                                                    <label class="col-sm-2 col-form-label">DD Date</label>
                                                                        <div class="col-sm-6 form-group">
                                                                            <div class="input-group">
                                                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="dddate" name="dddate" autocomplete="off">
                                                                                <div class="input-group-append bg-custom b-0">
                                                                                    <span class="input-group-text">
                                                                                        <i class="mdi mdi-calendar"></i>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-2"></div>
                                                                    <label class="col-sm-2 col-form-label">Bank Name</label>
                                                                        <div class="col-sm-6">
                                                                            <input class="form-control" type="text" id="ddbankname" name="ddbankname" placeholder="Enter Bank Name" autocomplete="off">
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Remark</label>
                                                <div class="col-sm-6">
                                                     <textarea class="form-control" rows="5" name="remark" id="remark" placeholder="" autocomplete="off"></textarea>
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                    <b><span id="remarkerror"></span></b>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Net Amount</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" type="text" id="net_amt" name="net_amt" readonly="">
                                                </div>
                                                <div class="col-sm-4 text-danger">
                                                
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-2"></div>
                                                <div class="col-sm-2">
                                                    <input type="button" name="submit" value="Submit" class="btn btn-info btn-block" onclick="create_receipt()"> 
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="button" name="cancel" value="Cancel" class="btn btn-info btn-block" onclick="edit_cancel()">
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

<script>
    var netamt=0;
    var extm=0;
    var pint=0;
    var netamtmonth=0;
    var netamtday=0; 
    var extamtmonth=0;
    var extamtday=0;
    var duetime='';

    $(function()
    {
        $("#rec_date").datepicker({autoclose:!0,todayHighlight:!0,format:'dd/mm/yyyy',endDate:'+0d'});
        $("#chequedate").datepicker({autoclose:!0,todayHighlight:!0,format:'dd/mm/yyyy',endDate:'+0d'});
        $("#dddate").datepicker({autoclose:!0,todayHighlight:!0,format:'dd/mm/yyyy',endDate:'+0d'});
        $("#receipt-date").datepicker({autoclose:!0,todayHighlight:!0,endDate:'+0d'});

        $('#cheque').hide()
        $('#demanddraft').hide();

        $('#pmode').change(function(){
            $('#cheque').slideUp(250);
            $('#demanddraft').slideUp(250);

            var paymode=$('#pmode').val();

            if(paymode=="Cheque")
            {
                $('#chequeno').val('');
                $('#chequedate').val('');
                $('#chequebankname').val('');
                $('#cheque').slideDown(1000);
            }
            else if(paymode=="Demand Draft")
            {
                $('#ddno').val('');
                $('#dddate').val('');
                $('#ddbankname').val('');
                $('#demanddraft').slideDown(1000);
            }
        });

        $('#other_amt').keyup(function(){
            instamt=$('#inst_amt').val();
            otheramt=$('#other_amt').val();

            totalamt = Number(instamt) + Number(otheramt);
            $('#net_amt').val(totalamt);
        });

        var input = document.getElementById("cust_id");
        input.addEventListener("keyup", function(event)
        {
            event.preventDefault();
            if (event.keyCode === 13) {
                custid=$('#cust_id').val();
                $.ajax({
                    url:"<?php echo site_url('Controller/load_receipt_data/')?>"+custid,
                    type:"POST",
                    dataType:"JSON",
                    success:function(response)
                    {
                        console.log(response);
                        if((Object.keys(response).length)==1)
                        {
                            swal({
                            title:"Opps..",
                            text:"Customer Not Found..",
                            type:"error"
                            });
                            $('#cust_id').val('');
                        }
                        else
                        {
                            $('#cust_name').val(response[0].cust_name);
                            $('#due_date').val(response[0].cnextduedate);
                            
                            if(response[3]==null)
                            {
                                $('#inst_no').val(1);
                            }
                            else
                            {
                                $('#inst_no').val(Number(response[3].installment_no)+1);
                            }
                            
                            var insno=$('#inst_no').val();
                            if(insno==1)
                            {
                                $('#due_date').val(response[0].cnextduedate);
                            }
                            else
                            {
                                $('#due_date').val(response[3].next_due_date);
                            }

                            var d= $('#due_date').val();
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

                            $('#next_due_date').val(ndate);
                            $('#inst_amt').val(response[1].EMIvalue); 
                        
                            var d= $('#due_date').val();
                            var dateParts2 = d.split("/");
                            var today = new Date();
                            var dd = today.getDate();
                            var mm = today.getMonth()+1; //January is 0!

                            var yyyy = today.getFullYear();
                            if(dd<10)
                            {
                                dd='0'+dd;
                            } 
                            if(mm<10)
                            {
                                mm='0'+mm;
                            } 
                            var d1 = dd+'/'+mm+'/'+yyyy;
                            var dateParts1 = d1.split("/");
                            var diffd=dateParts1[0]-dateParts2[0];
                            var diffm=dateParts1[1]-dateParts2[1];
                            var diffy=dateParts1[2]-dateParts2[2];
                            
                            if(diffm>0)
                            {
                                extm=diffm;
                                pint=response[2].pinterest;
                                intamt=$('#inst_amt').val(); 
                                extamtmonth=(intamt*pint*extm)/100;
                                netamtmonth=extamtmonth;
                                extm=extm+"month"; 
                            }
                            if(diffd<-15)
                            {
                                extd=diffd;
                                pint=response[2].pinterest;
                                intamt=$('#inst_amt').val(); 
                                extamtday=(intamt*pint*1)/100;
                                netamtday=extamtday;
                                extd=","+extd+"days";
                            }                                                         

                            if(extamtday==0 && extamtmonth==0)
                            {
                                $('#other_amt').val('');
                                duetime='';
                                $('#net_amt').val(response[1].EMIvalue);
                            }
                            else if($('#inst_no').val()==1)
                            {
                                $('#other_amt').val('');
                                duetime='';
                                $('#net_amt').val(response[1].EMIvalue);
                            }   
                            else
                            {
                                if(extamtday==0)
                                {
                                    $('#other_amt').val(Math.round(Number(extamtmonth)));
                                    duetime=extm;
                                }
                                else
                                {
                                    $('#other_amt').val(Math.round(Number(extamtmonth)+Number(extamtday)));
                                    duetime=extm+extd;
                                }
                                $('#net_amt').val(Number(netamtmonth)+Number(netamtday)+Number($('#inst_amt').val()));
                            }
                        }
                    }
                });
            }
        });
    });           

    // $('#cust_id').blur(function(){
        
    // });

   
    function edit_cancel()
    {
        window.location.href='load_admindeshbord';
    }

    function create_receipt()
    {
        rec_no=$('#rec_no').val();
        rec_date=$('#rec_date').val();
        cust_id=$('#cust_id').val();
        installment_no=$('#inst_no').val();
        installment_amt=$('#inst_amt').val();
        due_date=$('#due_date').val();
        next_due_date=$('#next_due_date').val();
        other_amt=$('#other_amt').val();
        paymode=$('#pmode').val();
        chequeno=$('#chequeno').val();
        chequedate=$('#chequedate').val();
        chequebankname=$('#chequebankname').val();
        ddno=$('#ddno').val();
        dddate=$('#dddate').val();
        ddbankname=$('#ddbankname').val();
        remark=$('#remark').val();
        netamt=$('#net_amt').val();
        duetime=duetime;
        formdata={
            rec_no : rec_no,
            rec_date : rec_date,
            cust_id : cust_id,
            inst_no : installment_no,
            inst_amt : installment_amt,
            due_date : due_date,
            next_due_date : next_due_date,
            other_amt : other_amt,
            pmode : paymode,
            chequeno : chequeno,
            chequedate : chequedate,
            chequebankname : chequebankname,
            ddno : ddno,
            dddate : dddate,
            ddbankname : ddbankname,
            remark : remark,
            netamt : netamt,
            duetime : duetime
        }

        $.ajax({
            url : "<?php echo site_url('Controller/create_receipt'); ?>",
            data: formdata,
            dataType : "JSON",
            type: "POST",
            success : function(response)
            {
                console.log(response);
                if(response.code==0)
                {
                    window.location.href="load_receiptlist";
                }
                else
                {
                    swal({
                        title:"Opps..",
                        text:"<span style='font-size:20px;font-weight:bold;'>Please Correct the errors.....",
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
                        if(d[i].search('Customer ID') > 0)
                        {
                            $('#custiderror').html(d[i]).slideDown('3500');
                        }
                        if(d[i].search('Payment Mode') > 0)
                        {
                            $('#pmodeerror').html(d[i]).slideDown('3500');
                        }
                        if(d[i].search('Remark field') > 0)
                        {
                            $('#remarkerror').html(d[i]).slideDown('3500');
                        }
                    }                           
                }
            }
        });
    }

    function edit_cancel()
    {
        window.location.href='<?php echo base_url(); ?>index.php/Controller/load_receiptlist';
    }
</script>
</body>
</html>