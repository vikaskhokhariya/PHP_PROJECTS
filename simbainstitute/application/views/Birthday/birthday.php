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
                    Birthday
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
                                <h3 class="box-title">Today's Birthday</h3>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                        <thead>
                                            <tr>
                                                <th class="text-yellow text-center">No</th>
                                                <th class="text-yellow">Student Name</th>
                                                <th class="text-yellow">Email</th>
                                                <th class="text-yellow">Contact</th>
                                                <th class="text-yellow">Birthdate</th>
                                            </tr>
                                        </thead>     

                                        <?php 
                                            $q = "SELECT * FROM tbl_enroll_student WHERE DATE_FORMAT(STR_TO_DATE(birthdate,'%m/%d'),'%m/%d') = DATE_FORMAT(CURRENT_DATE,'%m/%d')";
                                            $result=$this->db->query($q)->result();
                                            $count = 1;
                                        ?>

                                        <tbody>
                                            <?php 
                                            foreach($result as $value)
                                            {
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $count; ?></td>
                                                    <td><?php echo $value->name; ?></td>
                                                    <td><?php echo $value->email; ?></td>
                                                    <td><?php echo $value->phone; ?></td>
                                                    <td><?php echo $value->birthdate; ?></td>
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
        <?php 
            $this->load->view("footer");
        ?>
        <div class="control-sidebar-bg"></div>
    </div>

    <?php 
        $this->load->view("linkbottom");
    ?>
</body>
</html>