<?php
    $scode=$this->session->userdata('sponsorid');
    // print_r($scode);
    // exit();
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
            url : "<?php echo site_url('Controller/load_customerladger');?>/"+id,
            type: "POST",
            success: function(response)
            {
                console.log(response);
                $('#mymodal').modal();
                $('#ladger').html(response);
            }
            });
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
                    $array['j']='Customer Ladger';
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
                                                    <th>Code</th>
                                                    <th>Name</th>
                                                    <th>Booking Date</th>
                                                    <th>Total Amount</th>
                                                    <th>Down Payment</th>
                                                    <th>Plan Name</th>
                                                    <th>EMI Amount</th>
                                                    <th>Contact</th>
                                                    <th>Ladger</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                  <?php 
                                                    $res=$this->Model->model_customer_sponsor_select($scode);

                                                    foreach($res as $value)
                                                    {
                                                        $cityid;
                                                        $cityname;
                                                        $planid;
                                                        $plannm;
                                                        $custpurid;
                                                        $planid=$value->cplan;
                                                        $cityid=$value->cityid;
                                                        $custpurid=$value->cust_code;
                                                        $resultcityname=$this->Model->model_select('city',array('city_id'=>$cityid));

                                                        foreach($resultcityname as $value1)
                                                        {
                                                            $cityname=$value1->city_name;
                                                        }
                                                        $resplan=$this->Model->model_select('plantb',array('plan_code'=>$planid));
                                                        foreach($resplan as $value2)
                                                        {
                                                            $plannm=$value2->pname;
                                                        }
                                                        $purres=$this->Model->model_select('purchasetb',array('cust_code'=>$custpurid));
                                                        foreach($purres as $value3)
                                                        {
                                                            $totamt=$value3->totalamount;
                                                            $downamt=$value3->downpayment;
                                                            $emival=$value3->EMIvalue;
                                                        }

                                                    ?>
                                                        <tr>
                                                            <td><?php echo $value->cust_code; ?></td>
                                                             <td><?php echo $value->cust_name;?></td>
                                                             <td><?php echo $value->cjoiningdate; ?></td>
                                                            <td><?php echo $totamt;?></td>
                                                            <td><?php echo $downamt;?></td>
                                                            <td><?php echo $plannm;?></td>
                                                            <td><?php echo $emival;?></td>
                                                            <td><?php echo $value->cphno;?></td>
                                                            <td><button type="button" class="btn btn-outline-info waves-effect waves-light btn-block" onclick="load_modal('<?php echo $value->cust_code; ?>')">Ladger</button></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                ?> 
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

    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="mymodal" style="width: 100%;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">
                        Customer Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                </div>
                
                    <div class="modal-body">
                        <section class="container py-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="tabsJustifiedContent" class="tab-content">
                                        <div id="ladger">
                                        </div>            
                            
                                    </div>
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