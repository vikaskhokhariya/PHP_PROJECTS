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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">
                        <i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Dashboard
                    </li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">

                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php 
        $this->load->view("footer");
        ?>
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <?php 
    $this->load->view("linkbottom");
    ?>
</body>

</html>
