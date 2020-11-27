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
                    Account Summary
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
                                <h3 class="box-title">Account Summary</h3>
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

            <div id="expencediv"></div>
            <div id="incomediv"></div>

            <section class="content" style="display: none;" id="summarydiv">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="box bg-deathstar-dark">
                            <div class="box-body box-profile">
                                <h2 class="profile-username text-center mb-0">
                                    <span class="text-yellow text-center">Final Summary</span>
                                </h2>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="profile-user-info">
                                            <p>
                                                <h3 class="text-yellow">Total Income : </h3>
                                                <i class="fa fa-rupee pr-15"></i>
                                                <span id="showtotalincome"></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="profile-user-info">
                                            <p>
                                                <h3 class="text-yellow">Total Expence : </h3>
                                                <i class="fa fa-frown-o pr-15"></i>
                                                <span id="showtotalexpence"></span>
                                            </p>
                                        </div>
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
        $('#search').click(function(){
            data = $('#reservation').val();
            var arr = data.split('-');
            
            formdata = {
                from : arr[0],
                to : arr[1]
            }

            $.ajax({
                url : "<?php echo base_url(); ?>Account/Search_summary",
                data : formdata,
                dataType : "JSON",
                type : "POST",
                success : function(response)
                {
                    console.log(response.totalexpence);
                    console.log(response.totalincome);
                    $('#expencediv').html(response.expence);
                    $('#incomediv').html(response.income);
                    $('#summarydiv').show();
                    $('#showtotalincome').html(response.totalincome);
                    $('#showtotalexpence').html(response.totalexpence);
                }
            });
        });
    </script>
</body>
</html>