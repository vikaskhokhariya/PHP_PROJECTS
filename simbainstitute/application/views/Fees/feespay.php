<!DOCTYPE html>
<html lang="en">
  
<head>
    <?php 
        $this->load->view("linktop.php");
    ?>  
    <style type="text/css">
        .error
        {
            color:#A8413F;
            font-size:15px;
        }
        .payfeescss
        {
            pointer-events: none;
            opacity: 0.5;
        }
    </style>
</head>

<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">  
    <?php 
        $this->load->view("topheader");
        $this->load->view("sidemenu");
    ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Fees
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?php echo base_url(); ?>Simba">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>
                </li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pay Fees</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Student Enrollment Number :</label>
                                        <input type="text" class="form-control" id="enrollno" placeholder="Enter Student Enrollment Number" autocomplete="off">
                                        <div class="error" id="errorenrollno"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="button" id="search" class="btn btn-block btn-info pull-left btn-lg text-center">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="showstudentdetails" style="display:none;"></div>

        <section class="content payfeescss" id="payfeesdiv">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pay Fees</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Select Payment Type : </label>
                                        <select class="form-control select2 w-p100" id="paymenttype">
                                            <option hidden="" value="">Select</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <div class="error" id="errorpaymenttype"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="chequediv" style="display:none;">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Bank Name :</label>
                                        <input type="text" class="form-control" id="chequebankname" placeholder="Enter Bank Name" autocomplete="off">
                                        <div class="error" id="errorbankname"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Cheque Number :</label>
                                        <input type="text" class="form-control" id="chequenumber" placeholder="Enter Cheque Number" autocomplete="off">
                                        <div class="error" id="errorchequenumber"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Cheque Date :</label>
                                        <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask="" id="chequedate" placeholder="Enter Cheque Date" autocomplete="off">
                                        <div class="error" id="errorchequedate"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="otherdiv" style="display:none;">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Method Name :</label>
                                        <input type="text" class="form-control" id="methodname" placeholder="Enter Other Method" autocomplete="off">
                                        <div class="error" id="errormethodname"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Enter Amount :</label>
                                        <input type="text" class="form-control" id="feesamount" placeholder="Enter Amount" autocomplete="off">
                                        <div class="error" id="errorfeesamount"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="button" id="sbmt" class="btn btn-block btn-info pull-left btn-lg text-center">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php 
        $this->load->view("footer");
    ?>
    <div class="control-sidebar-bg"></div>
</div>
<?php 
    $this->load->view("linkbottom");
?>

<script type="text/javascript">
    $('#enrollno').keyup(function(){
        $('#showstudentdetails').hide();
        $('#payfeesdiv').hide();
    });

    $('#paymenttype').change(function(){
        var type = $('#paymenttype').val();

        if(type=="Cheque")
        {
            $('#otherdiv').hide();
            $('#chequediv').slideDown(500);
        }
        else if(type=="Other")
        {
            $('#chequediv').hide();
            $('#otherdiv').slideDown(500);
        }
        else
        {
            $('#chequediv').hide();
            $('#otherdiv').hide();
        }
    });

    $('#search').click(function(){
        $('#showstudentdetails').slideUp('500');

        var enrollno = $('#enrollno').val();

        if(enrollno == "")
        {
            $('#errorenrollno').html("Enter Enrollment Number First").slideDown(2000).delay(3000).slideUp(1000);
        }
        else
        {
            $.ajax({
                url : "<?php echo base_url(); ?>Fees/get_student_details/"+enrollno,
                success : function(response)
                {
                    if(response=="notfound")
                    {
                        swal({
                            title:"Opps..",
                            text:"Student Not Found",
                            type:"error",
                            allowOutsideClick: false,
                            animation: false,
                            customClass: 'animated tada'
                        });
                        $('#enrollno').val('').focus();
                    }
                    else
                    {
                        $('#showstudentdetails').html(response);
                        $('#showstudentdetails').slideDown(1000);
                        $('#payfeesdiv').removeClass("payfeescss");
                        $('#payfeesdiv').show();
                    }
                }
            });
        }
    });

    $('#sbmt').click(function(){
        var amount = $('#feesamount').val();
        var enrollno = $('#enrollno').val();
        var paymentmethod  = $('#paymenttype').val();
        var bankname = $('#chequebankname').val();
        var chequenumber = $('#chequenumber').val();
        var chequedate = $('#chequedate').val();
        var methodname = $('#methodname').val();

        formdata = {
            amount : amount,
            enrollno : enrollno,
            paymentmethod : paymentmethod,
            bankname : bankname,
            chequenumber : chequenumber,
            chequedate : chequedate,
            methodname : methodname
        }

        $.ajax({
            url : "<?php echo base_url(); ?>Fees/Pay_fees",
            data : formdata,
            dataType : "JSON",
            type: "POST",
            success : function(response)
            {
                console.log(response);
                if(response.code==0)
                {
                    // swal({
                    //     title:"Opps..",
                    //     text:"Please Correct the Errors",
                    //     type:"error",
                    //     allowOutsideClick: false,
                    //     animation: false,
                    //     customClass: 'animated tada'
                    // });

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
                        if(d[i].search('Fees Amount') > 0)
                        {
                            $('#errorfeesamount').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                        if(d[i].search('Bank Name') > 0)
                        {
                            $('#errorbankname').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                        if(d[i].search('Cheque Number') > 0)
                        {
                            $('#errorchequenumber').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                        if(d[i].search('Cheque Date') > 0)
                        {
                            $('#errorchequedate').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                        if(d[i].search('Method Name') > 0)
                        {
                            $('#errormethodname').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                        }
                    }    
                }
                else
                {
                    swal({
                        title:"Good Job",
                        text:"Fees Paid SuccessFully",
                        type:"success",
                        allowOutsideClick: false,
                        animation: false,
                        customClass: 'animated tada'
                    });
                    $('.swal2-confirm').click(function(){
                        window.location.href='<?php echo base_url(); ?>Fees/Fees_List';
                    });
                }
            }
        });
    });
</script>
</body>

</html>
