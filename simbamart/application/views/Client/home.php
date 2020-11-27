<?php 
    $maincategoryresult=$this->Model->model_select('tbl_category',array('type'=>'main','cat_status'=>1));
    $sliderresult=$this->Model->model_select('tbl_slider');
    $i1=0;
    $blogresult=$this->Model->model_select('tbl_blog',array('blog_status'=>1));
?>

<!DOCTYPE html>
<html>
    <head>
        <?php 
            include('linktop.php');
        ?>
    </head>
   
    <body>
        <!--<div class="preloader"></div>-->
        <header class="header header-light">
            <?php 
                $linkactive['pagename']="home";
                $this->load->view('Client/header',$linkactive);
            ?>
        </header>

        <div class="wrapper ">
            <div class="margin-header"></div>
            <div class="bannercontainer">
                <div class="banner" data-fullscreen="on" data-auto="true" data-hidetimerbar="off" data-fullscreenoffsetcontainer=".header">
                    <ul>
                        <?php 
                            for($i=0;$i<3;$i++)
                            {
                        ?>
                                <li data-transition="fade" data-slotamount="7" data-saveperformance="on" class="background overlay-light" style="background-image: url(<?php echo base_url(); ?>Upload/Admin/slider/<?php echo $sliderresult[$i]->slider_image; ?>)">
                                </li>
                        <?php
                            } 
                        ?>
                    </ul>
                </div>
            </div>

            <br>
            <div class="page-header text-center">
                <h2>Categories</h2>
                <div class="heading-divider"></div>
            </div>

            <br>
            <div class="container-fluid slider">
                <div class="container">
                    <div class="row text-center cards">
                        <ul data-max-items="4">
                            <?php 
                               for($i=0; $i<count($maincategoryresult);$i++)
                                {
                                  $slug=$this->Model->model_select('seo_pages',array('cat_id'=>$maincategoryresult[$i]->cat_id));
                                ?>
                                    <li class="col-md-3 col-sm-6 card card-image">
                                        <figure class="figure">
                                            <a href="<?php echo base_url();?><?php echo $slug[0]->page_slug;?>">
                                                <img src="<?php echo base_url(); ?>Upload/Admin/Category/<?php echo $maincategoryresult[$i]->cat_name; ?>/<?php echo $maincategoryresult[$i]->cat_image; ?>" alt="" height="300px">
                                            </a>
                                            <div class="mask mask-dark">
                                                <nav>
                                                    <a class="icon icon-gray-1 icon-size-2 icon-bg-7 icon-rounded" href="<?php echo $slug[0]->page_slug;?>">
                                                        <i class="fa fa-link"></i>
                                                    </a>
                                                </nav>
                                            </div>
                                        </figure>
                                        <div class="figure-info">
                                            <h4>
                                                <a href="<?php echo $slug[0]->page_slug;?>"><?php echo $maincategoryresult[$i]->cat_name; ?></a>
                                            </h4>
                                            <?php 
                                                $maincatid=$maincategoryresult[$i]->cat_id;
                                                $allsubcat=$this->Model->model_select('tbl_category',array('cat_status'=>1,'parentid'=>$maincatid));
                                            ?>
                                          <div class="heading-divider"></div>
                                            <?php
                                                $totalsubcat=count($allsubcat);
                                                if($totalsubcat==0){}
                                                else
                                                {
                                                    for($j=0;$j<=1;$j++)
                                                    {
                                                        $slug=$this->Model->model_select('seo_pages',array('cat_id'=>$allsubcat[$j]->cat_id));
                                                    ?>
                                                    <h6><a href="<?php echo base_url();?><?php echo $slug[0]->page_slug;?>" title="Clothing"><?php echo $allsubcat[$j]->cat_name; ?></a></h6>
                                                <?php
                                                    }
                                                }
                                            ?>
                                       </div>
                                    </li>
                            <?php 
                            }
                        ?>
                        </ul>
                    </div>
                    <a href="#" class="slider-arrow arrow-margin slider-arrow-prev"></a> <a href="#" class="slider-arrow arrow-margin slider-arrow-next"></a>
                </div>
               <nav class="slider-pagination"></nav>
            </div>
            <br>

            <hr class="hr-nobg"/>
            <div class="highlight highlight-dark inverse">
                <div class="container">
                    <div class="row irow-xs text-center divtable divtable-negative">
                        <div class="col-sm-4 divcell">
                            <div class="icon icon-color icon-size-4"><i class="fa fa-lightbulb-o"></i></div>
                            <h3>Our Mission</h3>
                            <p>SimbaMart is leading Indian B2B Platform that provides effective customer satisfaction.</p>
                        </div>
                        <div class="col-sm-4 highlight-md divcell">
                            <div class="icon icon-color icon-size-4"><i class="fa fa-hdd-o"></i></div>
                            <h3>Our Vision</h3>
                            <p>To Provide effective design cloths and change the lifestyle and status of people.</p>
                         </div>
                         <div class="col-sm-4 divcell">
                            <div class="icon icon-color icon-size-4"><i class="fa fa-heart-o"></i></div>
                            <h3>Our Targets</h3>
                            <p>To become leading B2B Company in the world.</p>
                         </div>
                    </div>
                </div>
                <div class="bg bg-third bg-right overlay" style="background-image: url(../../../media.aisconverse.com/images/bg/bg-hood.jpg)"></div>
            </div>

            <!-- <hr class="hr-nobg"/>
            <div class="container-wrap">
                <div class="page-header text-center">
                    <h2>Our best Articles</h2>
                    <div class="heading-divider"></div>
                </div>
                <div class="container">
                    <div class="row isotope-wrap portfolio-wrap magnific-wrap inside-wrap text-center">
                    <?php 
                        for($i=0;$i<2;$i++)
                        {
                        ?>
                            <div class="col-sm-3 col-xs-6 mix logos" data-name="Mug black and white" data-date="November 25, 2012" data-category="Logos">
                                <figure class="figure">
                                   <img src="<?php echo base_url(); ?>Upload/Admin/Blog/<?php echo $blogresult[$i]->blog_image; ?>" alt="" style="height:250px;margin: 5px;">
                                   <div class="mask mask-dark">
                                        <nav>
                                            <a class="icon icon-inverse icon-size-2 icon-theme icon-rounded magnific" href=""><i class="fa fa-search"></i>
                                            </a>
                                            <a class="icon icon-inverse icon-size-2 icon-theme icon-rounded" href="#"><i class="fa fa-link"></i>
                                            </a>
                                        </nav>
                                   </div>
                                   <div class="mask mask-inline">
                                        <h5>
                                            <a href="#">
                                                <?php 
                                                    $len=strlen($blogresult[$i]->blog_title);

                                                    if($len > 20)
                                                    {
                                                        echo substr($blogresult[$i]->blog_title,0,20)."...";
                                                    }
                                                    else
                                                    {
                                                        echo $blogresult[$i]->blog_title;
                                                    }
                                                ?>
                                            </a>
                                        </h5>
                                        <div class="category">
                                            <a>Read Blog</a>
                                        </div>
                                   </div>
                                </figure>
                            </div>
                            <?php
                            }
                        ?>
                        <div class="col-sm-12 text-center">
                            <br>
                            <?php 
                                $page=$this->Model->model_select('seo_page_list',array('page_url'=>'User_cnt/load_allblogs'));
                                $slug=$this->Model->model_select('seo_pages',array('page_list_id'=>$page[0]->page_list_id));
                            ?>
                            <a href="<?php echo base_url();?><?php echo $slug[0]->page_slug;?>" class="btn btn-primary btn-lg" data-hover="rubberBand">Show More</a>
                        </div>
                    </div>
               </div>
            </div> -->
        </div>
    <br>
    <footer>
        <?php
           $this->load->view('Client/footer');
        ?>
    </footer>
      
    <div class="modal map-modal" id="map-modal">
        <a href="#" class="map-close" data-dismiss="modal"><i class="fa fa-close"></i></a>
        <div class="google-map-popup"></div>
    </div>
      
      <?php include('linkbottom.php'); ?>
   </body>
</html>