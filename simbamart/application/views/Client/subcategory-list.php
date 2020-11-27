<?php
    $page='';
    $page=$this->Model->model_select('seo_pages',array('page_id'=>$page_id));
    $res=$this->Model->model_select('tbl_category',array('parentid'=>$page[0]->cat_id));
    $catres=$this->Model->model_select('tbl_category',array('cat_id'=>$page[0]->cat_id));
    //print_r($res);
?>

<!DOCTYPE html>
<html>
<head>
    <?php include('linktop.php');?>
</head>

<body class="woocommerce-page">
<header class="header header-light">
    <?php 
        $linkactive['pagename']="home";
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
                <div class="col-md-9 col-sm-9 maincontent">
                    <ul class="row products text-center">
                        <?php
                        foreach ($res as $key) 
                        {
                            $slug=$this->Model->model_select('seo_pages',array('cat_id'=>$key->cat_id));
                        ?>
                            <li class="product col-md-3 col-xs-5">
                                <div class="main-cat">
                                    <a href="<?php echo base_url();?><?php echo $slug[0]->page_slug;?>">
                                        <img src="<?php echo base_url();?>Upload/Admin/Category/<?php echo $key->cat_name;?>/<?php echo $key->cat_image;?>" alt="<?php echo $key->cat_name;?>" height="230px">
                                    </a> 
                                </div>
                                <h3>
                                    <a href="<?php echo base_url();?><?php echo $slug[0]->page_slug;?>">
                                        <span class="categorytitle">
                                            <?php echo $key->cat_name;?>
                                        </span>
                                    </a>
                                </h3>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>

                    <div class="content">
                        <div class="container-fluid maincontent">
                            <?php echo $catres[0]->page_content;?>
                        </div>
                   </div>
                </div>

                <aside class="col-md-3 col-sm-3 sidebar">
                    <div class="widget widget_product_categories">
                        <h2 class="widget-title">Categories</h2>
                        <div class="panel-group panel-bottom-border">
                        <?php
                            $category=$this->Model->model_select('tbl_category',array('type'=>'main','cat_status'=>1));
                            foreach ($category as $key) 
                            {
                            ?>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" href="#<?php echo $key->cat_id;?>" class="collapsed">
                                            <?php echo $key->cat_name;?>
                                        </a>
                                    </div>

                                    <div id="<?php echo $key->cat_id;?>" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php
                                                $subcategory=$this->Model->model_select('tbl_category',array('type'=>'sub','parentid'=>$key->cat_id));
                                                foreach ($subcategory as $value) 
                                                {
                                                    $slug=$this->Model->model_select('seo_pages',array('cat_id'=>$value->cat_id));
                                                ?>
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <a href="<?php echo base_url();?><?php echo $slug[0]->page_slug;?>">    <?php echo $value->cat_name;?>
                                                            </a>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                            ?>
                                       </div>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
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

