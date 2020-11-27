<?php 
    $marketdata=$this->Model->model_select('tbl_marketlist');
?>
<!DOCTYPE html>
<html>

<head>
    <?php 
        include('linktop.php');
    ?>
</head>

<body>
    <!-- Pre Loader -->
    <div class="preloader"></div>
    <!-- /Pre Loader -->

    <!-- Header -->
    <header class="header header-light">
        <?php 
            $linkactive['pagename']="markets";
            $this->load->view('Client/header',$linkactive);
        ?>
    </header>
    <!-- /Header -->

    <div class="content">
        <div class="container">
            <div class="row irow-sm text-center cards cards-inside">
                <?php 
                    foreach($marketdata as $value)
                    {
                    ?>
                        <div class="col-md-3 col-sm-6">
                            <a href="#" class="card-flip">
                                <div class="flipper">
                                   <div class="front card card-light card-lightest card-border-solid">
                                      <div class="icon icon-color icon-size-4"><i class="fa fa-hdd-o"></i></div>
                                      <h4><?php echo $value->market_name; ?></h4>
                                      <p></p>
                                      <div class="heading-divider"></div>
                                   </div>
                                   <div class="back card card-dark">
                                      <div class="icon icon-color icon-size-4"><i class="fa fa-hdd-o"></i></div>
                                      <h4><?php echo $value->market_name; ?></h4>
                                      <p></p>
                                      <div class="heading-divider"></div>
                                   </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <?php
            $this->load->view('Client/footer');
        ?>
    </footer>
    <!-- /Footer -->

    <?php 
        include('linkbottom.php'); 
    ?>
   </body>
</html>