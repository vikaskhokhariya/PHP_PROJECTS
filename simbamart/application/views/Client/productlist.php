<?php
    $page='';
    $page=$this->Model->model_select('seo_pages',array('page_id'=>$page_id));
    $catres=$this->Model->model_select('tbl_category',array('cat_id'=>$page[0]->cat_id));
    
    $res=$this->Model->model_select('tbl_category',array('type'=>'sub','cat_status'=>1));
    $maincategoryresult=$this->Model->model_select('tbl_category',array('cat_id'=>$catres[0]->parentid));

    $productdetail = $this->Model->model_select('sellersimbamart.tbl_product',array('subcatid'=>$catres[0]->cat_id));
?>
  
<!DOCTYPE html>
<html>
    <head>
        <?php 
            include('linktop.php');
        ?>
        <style type="text/css">
            .productimage
            {
                height : 150px;
                width : 120px;
                border: 1px solid black;
                border-radius : 5px;
                padding: 1px; 
            }
            .productlist
            {
                border : 1px solid gray;
                margin : 1px; 
                padding : 5px !important; 
                border-radius : 5px;
                /*background-color : #E9EAEA;*/
            }
        </style>
    </head>

    <body class="woocommerce-page">
        <div class="preloader"></div>
        <header class="header header-light">
            <?php 
                $linkactive['pagename']="aboutus";
                $this->load->view('Client/header',$linkactive);
            ?>
        </header>
        <div class="wrapper">
            <div class="container">
                <div class="divtable irow">
                    <div class="divcell text-left">
                        <ul id="breadcrumb">
                            <li>
                                <a href="<?php echo base_url();?>">
                                    <i class="fa fa-home" style="font-size:25px;color:white;font-weight:600;"></i>
                                </a>
                            </li>
                            <?php 
                                $mainslug=$this->Model->model_select('seo_pages',array('cat_id'=>$maincategoryresult[0]->cat_id));
                            ?>
                            <li><a href="<?php echo base_url();?><?php echo $mainslug[0]->page_slug;?>"><?php echo $maincategoryresult[0]->cat_name; ?></a></li>
                            <li><a href="#"><?php echo $catres[0]->cat_name;?></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="content no-pb">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4><?php echo $catres[0]->cat_title;?></h4>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-9 col-sm-8 maincontent">
                         <ul class="products products-list">
                            <?php 
                                foreach($productdetail as $value)
                                {
                            ?>
                            <li class="product row irow-xs productlist">
                               <div class="col-lg-4 col-sm-5">
                                    <div class="product-img">
                                        <a href="#">
                                            <img src="http://localhost/sellersimbamart/Upload/Seller/<?php echo $value->seller_id; ?>/Product/<?php echo $value->primary_image; ?>" alt="" height="200px">
                                        </a>
                                    </div>
                               </div>

                               <div class="col-lg-8 col-sm-7">
                                  <h3><a href="#"><?php echo $value->product_name; ?></a></h3>
                                  <span class="price"><ins><span class="amount"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $value->price; ?></span></ins></span>
                                  <p><?php echo $value->description; ?></p>
                                  <a href="#" class="btn btn-primary btn-md btn-rounded-8" data-hover="pulse"><i class="fa fa-phone" aria-hidden="true"></i> Contact Supplier</a>
                               </div>
                            </li>
                            <?php 
                                }
                            ?>
                         </ul>
                      </div>
                      <aside class="col-md-3 col-sm-4 sidebar">
                         <div class="widget widget_product_categories">
                            <h2 class="widget-title">Categories</h2>
                            <ul>
                               <li><a href="#">Armchair</a> (15)</li>
                               <li><a href="#">Bar Stool</a> (15)</li>
                               <li><a href="#">Complete Table</a> (10)</li>
                               <li><a href="#">Featured</a> (6)</li>
                               <li><a href="#">Sidechair</a> (15)</li>
                               <li><a href="#">Special</a> (6)</li>
                               <li><a href="#">Stacking Chair</a> (12)</li>
                            </ul>
                         </div>
                      </aside>
                   </div>
                </div>
            </div>
        </div>
        <br>

        <footer>
            <?php
                $this->load->view('Client/footer');
            ?>
        </footer>

        <?php 
            include('linkbottom.php'); 
        ?>
   </body>
</html>