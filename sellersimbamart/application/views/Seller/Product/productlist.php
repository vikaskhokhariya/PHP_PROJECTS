<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<head>
    <?php 
        $this->load->view('Seller/linktop');
    ?>
    <style type="text/css">
        .product-heading
        {
            color : black;
            font-size: 22px;
        }
        .categoryheadingtext
        {
            color : black; 
        }
        .productimage
        {
            height : 150px;
            width : 150px;
            border : 1px solid black;
            padding-left: 1px;
        }
    </style>
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-color="bg-gradient-x-purple-red" data-col="2-columns">

    <?php 
        $this->load->view('Seller/mobileviewheader');
        $this->load->view('Seller/pcviewheader');
    ?>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">
                        PRODUCT LIST
                    </h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?php echo base_url(); ?>Admin_cnt">
                                        Home
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <section id="drag-area">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        foreach($product as $value)
                        {
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <img src="<?php echo base_url(); ?>Upload/Seller/<?php echo $this->session->userdata("sellerid"); ?>/Product/<?php echo $value->primary_image; ?>" id="productimage" class="productimage">
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="row">
                                                        <div class="col-sm-7 text-left">
                                                            <h4 class="text-bold-700 product-heading"><?php echo $value->product_name; ?></h4>
                                                        </div>
                                                        <div class="col-sm-5 text-right">
                                                            <button type="button" class="btn btn-outline-danger btn-min-width box-shadow-2 mr-1 mb-1" onclick="delete_product(<?php echo $value->product_id; ?>)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                                            <a class="btn btn-info btn-min-width box-shadow-2 mr-1 mb-1" href="<?php echo base_url(); ?>Product/edit_product/<?php echo $value->product_id;?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="card-header">
                                                                <h4 class="text-bold-600 categoryheadingtext">Price</h4>
                                                                <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $value->price; ?> / <?php echo $value->unit_type; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="card-header">
                                                                <h4 class="text-bold-600 categoryheadingtext">Minimum Qty</h4>
                                                                <?php echo $value->min_qty; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="card-header">
                                                                <h4 class="text-bold-600 categoryheadingtext">Updated On</h4>
                                                                <?php echo $value->update_time; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <?php 
                        }
                    ?>
                </section>
            </div>
      </div>
    </div>

    <?php 
        $this->load->view('Seller/linkbottom');
    ?>
    <script src="<?php echo base_url(); ?>assets/Seller/js/scripts/productcustom.js" type="text/javascript"></script>
  </body>
</html>