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
                    Income List
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
                                <h3 class="box-title">Income</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Select Date Range :</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="reservation">
                                        <a class="btn btn-sm btn-danger input-group-addon" id="search">
                                            Search
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div id="resultdiv">
                
            </div>
            
            <!-- <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Expence List</h3>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                        <thead>
                                            <tr>
                                                <th class="text-yellow text-center">No</th>
                                                <th class="text-yellow">Expence Title</th>
                                                <th class="text-yellow">Expence Detail</th>
                                                <th class="text-yellow">Expence Amount</th>
                                                <th class="text-yellow">Expence Date</th>
                                            </tr>
                                        </thead>
                                        <?php 
                                            $result=$this->Model->model_select('tbl_expence');
                                            $count = 1;
                                        ?>
                                        <tbody>
                                            <?php 
                                            foreach($result as $value)
                                            {
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $count; ?></td>
                                                    <td><?php echo $value->expence_title; ?></td>
                                                    <td><?php echo $value->expence_detail; ?></td>
                                                    <td><?php echo $value->expence_amount; ?></td>
                                                    <td><?php echo $value->expence_date; ?></td>
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
            </section> -->
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
        $('#search').click(function(){
            data = $('#reservation').val();
            var arr = data.split('-');
            
            formdata = {
                from : arr[0],
                to : arr[1]
            }

            $.ajax({
                url : "<?php echo base_url(); ?>Account/Search_Income",
                data : formdata,
                dataType : "JSON",
                type : "POST",
                success : function(response)
                {
                    console.log(response);
                    $('#resultdiv').html(response.bigdata);
                }
            });
        });
    </script>
</body>
</html>