<?php
$scode=$this->session->userdata('sponsorid');
$count=1;
$totamt=0;
?>
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Customer List</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="<?php echo base_url()?>admin/assets/images/favicon.ico">

    <!-- Sweet Alert -->
    <link href="<?php echo base_url()?>admin/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables -->
    <link href="<?php echo base_url()?>admin/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>admin/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?php echo base_url()?>admin/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?php echo base_url()?>admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>admin/assets/css/style.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
        var custid;

        function load_modal(id)
        {
            $.ajax({
            url : "<?php echo site_url('Controller/load_customerdetails');?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(response)
            {
                console.log(response);
                $('#mymodal').modal();
                $('#cname').html(response[0].cust_name);
                $('#cfhnm').html(response[0].fhname);
                $('#cgender').html(response[0].cgender);
                $('#cdob').html(response[0].cdob);
                $('#cstate').html(response[2].StateName);
                $('#ccity').html(response[3].city_name);
                $('#caddress').html(response[0].caddress);
                $('#cpin').html(response[0].cpincode);
                $('#ccountry').html(response[0].ccountry);
                $('#cnation').html(response[0].cnationality);
                
                $('#ccontact').html(response[0].cphno);
                $('#ccontactalt').html(response[0].caltphno);
                $('#cemail').html(response[0].cemail);
                $('#cpan').html(response[0].cpancardno);
                $('#caadhar').html(response[0].caadharcardno);
                $('#cstatus').html(response[0].cmaritalstatus);
                $('#coccu').html(response[0].coccupation);
                $('#cnname').html(response[0].nname);
                $('#cnaddress').html(response[0].naddress);
                $('#cnrelation').html(response[0].nrelation);
                $('#cnbirthdate').html(response[0].ndob);
                
                $('#cabranch').html(response[1].bname);
                $('#cabranchcode').html(response[0].branch_code);
                $('#casponsor').html(response[4].sname);
                $('#casponsorcode').html(response[0].sponsor_code);

                $('#cplan').html(response[5].pname);
                $('#csqureprice').html(response[6].squarefeetprice);
                $('#csquare').html(response[6].squarefeet);
                $('#ctotalamt').html(response[6].totalamount);
                $('#cdownpay').html(response[6].downpayment);
                $('#cremain').html(response[6].remainingamount);
                $('#cEMI').html(response[6].totalEMI);
                $('#cEMIval').html(response[6].EMIvalue);
                $('#cnextdt').html(response[0].cnextduedate);
                $('#resproof').attr("src",'<?php echo base_url();?>assets/uploads/custresident/'+response[0].cresidentproof);
                $('#idproof').attr("src",'<?php echo base_url();?>assets/uploads/custidentity/'+response[0].cidentityproof);
            }
            });
        }

        function load_block_customer(cid)
        {
            swal({
                title:"Are you sure?",
                text:"You won't be able to revert this!",
                type:"warning",
                showCancelButton:!0,
                confirmButtonClass:"btn btn-success",
                cancelButtonClass:"btn btn-danger m-l-10",
                confirmButtonText:"Yes, Blocked it!"
            }).then(function(){
                custid=cid;
                final_block_customer();
                swal("Blocked!","Customer has been Blocked.","success")
            })
        }

       
       
    </script>
</head>

<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

    <!-- Begin page -->
    <div id="wrapper">
        <?php 
            $this->load->view('sponsor/sponsorheader');
        ?>

        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <?php 
                    $array['j']='Customer List';
                    $this->load->view('sponsor/topheader',$array);
                ?>

                <div class="page-content-wrapper ">
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <table id="datatable" class="table table-bordered text-center table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Sponsor_Code</th>
                                                    <th>Sponsor Name</th>
                                                    <th>Commission<br>Type</th>
                                                    <th>Commission<br>Rate</th>
                                                    <th>Pay<br>Frequancy</th>
                                                    <th>Total<br>Commission</th>
                                                    <th>Pay Date</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                  <?php 
                                                    $res=$this->Model->model_commission_sponsor_select($scode);

                                                    foreach($res as $value)
                                                    {
                                                        
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $count;?></td>
                                                            <td><?php echo $value->sponsor_code; ?></td>
                                                             <td><?php echo $value->sname; ?></td>
                                                             <td><?php echo $value->commissiontype; ?></td>
                                                            <td><?php echo $value->commissionrate;?></td>
                                                            <td><?php echo $value->payfrequency;?></td>
                                                            <td><?php echo $value->totalcommission;?></td>
                                                            <td><?php echo $value->paydate;?></td>
                                                        </tr>

                                                    <?php
                                                        $totamt=$totamt+$value->totalcommission;
                                                        $count++;
                                                    }
                                                ?> 
                                                <tr>
                                                    <td></td><td></td><td></td><td></td><td></td><td>Total <br>Amount</td><td><?php echo $totamt;?></td><td></td>
                                                </tr>
                                            </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
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

    <!-- Required datatable js -->
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Buttons examples -->
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>

    <!-- <script src="<?php //echo base_url()?>admin/assets/plugins/datatables/jszip.min.js"></script> -->
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/buttons.colVis.min.js"></script>

    <!-- Responsive examples -->
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="<?php echo base_url()?>admin/assets/pages/datatables.init.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url()?>admin/assets/js/app.js"></script>

    <script type="text/javascript">
        $(function(){
            $('#datatable').removeClass('table-responsive');
            wlength=$(window).width();
            $( window ).resize(function(){
               wlengthnew=$(window).width();
               seventwidth=wlength*70/100; 
               console.log(seventwidth );
               if(wlengthnew < seventwidth)
               {
                    $('#datatable').addClass('table-responsive');
               }
               else
               {
                    $('#datatable').removeClass('table-responsive');
               }
            });
        });

       
    </script>
</body>

</html>