<!DOCTYPE html>
<html lang="en">
  
<head>
    <?php 
        $this->load->view("linktop.php");
    ?>  
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
                            <h3 class="box-title">Fees List</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                <thead>
                                    <tr>
                                        <th class="text-yellow">No</th>
                                        <th class="text-yellow">Print</th>
                                        <th class="text-yellow">Enroll No</th>
                                        <th class="text-yellow">Student Name</th>
                                        <th class="text-yellow">Contact</th>
                                        <th class="text-yellow">Paid Fees</th>
                                        <th class="text-yellow">Remaining Fees</th>
                                        <th class="text-yellow">Payment Date</th>
                                        <th class="text-yellow">Payment Method</th>
                                        <th class="text-yellow">Action</th>
                                    </tr>
                                </thead>
                                <?php 
                                    $result=$this->Model->model_select('tbl_fees','','fees_id','desc');
                                    $count = 1;
                                ?>
                                <tbody>
                                    <?php 
                                    foreach($result as $value)
                                    {
                                        ?>
                                        <tr>
                                            <?php 
                                            $studentresult = $this->Model->model_select('tbl_enroll_student',array('enroll_id'=>$value->enroll_id));
                                            ?>
                                            <td class="text-center"><?php echo $count; ?></td>
                                            <td>
                                                <a href="javascript:print_receipt(<?php echo $value->fees_id; ?>)">
                                                    <i class="fa fa-print fa-2x" aria-hidden="true" style="color:#238AE6"></i>
                                                </a>
                                            </td>
                                            <td><?php echo $studentresult[0]->enroll_no; ?></td>
                                            <td><?php echo $studentresult[0]->name; ?></td>
                                            <td><?php echo $studentresult[0]->phone; ?></td>
                                            <td><?php echo $value->amount; ?></td>
                                            <td><?php echo $value->remain_amount; ?></td>
                                            <td><?php echo $value->pay_date; ?></td>
                                            <td><?php echo $value->pay_type; ?></td>
                                            <td>
                                                <a class="btn btn-block btn-success btn-sm" href="<?php echo base_url(); ?>Enroll/Student_Profile/<?php echo $value->enroll_id; ?>">
                                                    <span style="color:white;">View<span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        $count++;
                                    }
                                    ?>
                                </tbody>                  
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="content-wrapper modal">
        <section class="invoice printableArea">
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header text-center">
                        INVOICE 
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2">
                                    <img src="<?php echo base_url(); ?>logo.png" style="height:120px;width:350px;">
                                </th>
                                <th colspan="2" class="text-right">
                                    <address>
                                        <h4><strong class="text-info">Simba Institute</strong></h4>
                                        3rd Floor, Mangilal Shopping Center,<br>
                                        Vallabhacharya Road,<br>
                                        A.K Road,<br>
                                        Surat, Gujarat. - 395008
                                    </address>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3">
                                    <span class="lead">
                                        <b>NAME : </b>
                                    </span>
                                    <span id="studentname">
                                        
                                    </span>
                                </td>
                                <td class="text-right">
                                    <span class="lead"><b>DATE : </b></span>
                                    <span id="feesdate">
                                        
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    Installment No :
                                    <span id="installmentno"></span> 
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">Course</td>
                                <td class="text-right">Fees</td>
                            </tr>
                            <tr>
                                <td colspan="3" rowspan="2">
                                    <span id="coursename"></span>
                                </td>
                                <td class="text-right">
                                    <i class="fa fa-inr" aria-hidden="true"></i>
                                    <span id="coursefees"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right">
                                    <span id="amountinwords"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <span class="lead"><b>TERMS & CONDITION : </b></span>
                                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                        1. All Subject to Surat Jurisdiction.<br>
                                        2. Service Tax and Other tax liabilities will be additional.<br>
                                        3. Payment will not Pay Return to you for any Condition.<br>
                                        4. The Company will able to decide the last descision.
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row no-print">
                <div class="col-12">
                    <button id="print" class="btn btn-warning" type="button">
                        <span>
                            <i class="fa fa-print"></i> Print
                        </span> 
                    </button>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
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

    function print_receipt(id)
    {
        $.ajax({
            url : "<?php echo base_url(); ?>Fees/get_fees_receipt/"+id,
            type : "POST",
            dataType : "JSON",
            success : function(response)
            {
                console.log(response);
                $('#studentname').html(response[1].name);
                $('#feesdate').html(response[0].pay_date);
                $('#installmentno').html(response[0].fees_term);
                $('#coursename').html(response[2].course_name);
                $('#coursefees').html(response[0].amount);
                $('#amountinwords').html(convertNumberToWords(response[0].amount));
                $('#print').click();
            }
        });
    }

    $(function ()
    {
      'use strict';
        $(document).ready(function() {
            $("#print").click(function() {
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close
                };
                $("section.printableArea").printArea(options);
            });
        });
    }); // End of use strict
</script>
</body>

</html>
