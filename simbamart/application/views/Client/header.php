<?php 
    $maincategoryresult=$this->Model->model_select('tbl_category',array('type'=>'main','cat_status'=>1));
    $marketlist=$this->Model->model_select('tbl_market',array('market_status'));
?>

<nav class="navbar container">
    <a class="navbar-brand pull-left" href="<?php echo base_url(); ?>">
        <img src="<?php echo base_url(); ?>logo.png" alt="simbamartlogo">
    </a>
    <form class="navbar-form pull-right">
        <div class="navbar-search collapse">
            <input type="text" placeholder="Type and hit enter...">
            <i class="fa fa-times" data-toggle="collapse" data-target=".navbar-search"></i>
        </div>
        <button type="button" class="fa fa-search" data-target=".navbar-search" data-toggle="collapse"></button>
   </form>

   <div class="navbar-account pull-right">
        <nav>
            <?php
                $page=$this->Model->model_select('seo_page_list',array('page_url'=>'User_cnt/load_login'));
                $slug=$this->Model->model_select('seo_pages',array('page_list_id'=>$page[0]->page_list_id));
            ?>
            <a href="<?php echo base_url();?><?php echo $slug[0]->page_slug;?>" data-toggle="modal">
                <i class="fa fa-lock"></i>Login
            </a> 
            <?php 
                $page=$this->Model->model_select('seo_page_list',array('page_url'=>'User_cnt/register_business'));
                $slug=$this->Model->model_select('seo_pages',array('page_list_id'=>$page[0]->page_list_id));
            ?>
            <a href="<?php echo base_url(); ?><?php echo $slug[0]->page_slug;?>" class="btn btn-primary btn-lg" data-toggle="modal"data-hover="tada">
                Sell on SimbaMart
            </a>
       </nav>
   </div>

    <div class="divider pull-right"></div>
    <button class="navbar-toggle pull-right" data-target="#navbar" data-toggle="collapse" type="button">
        <i class="fa fa-bars"></i>
    </button>

    <div id="navbar" class="navbar-collapse collapse pull-right">
        <ul class="nav navbar-nav">
            <li class="<?php if($pagename=="home"){echo 'active';}?>">
                <a href="<?php echo base_url(); ?>">
                    Home
                </a>
            </li>

            <li class="dropdown dropdown-static">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products</a>
                <div class="sf-mega container dropdown-menu">
                    <div class="divtable">
                        <?php 
                            for ($i=0; $i<4;$i++)
                            {
                                $mainslug=$this->Model->model_select('seo_pages',array('cat_id'=>$maincategoryresult[$i]->cat_id));
                            ?>
                                <div class="divcell col-sm-3">
                                    <h5>
                                        <a href="<?php echo base_url();?><?php echo $mainslug[0]->page_slug;?>">
                                            <?php echo $maincategoryresult[$i]->cat_name;?>
                                        </a>
                                    </h5>
                                    <?php 
                                        $maincatid=$maincategoryresult[$i]->cat_id;
                                        $allsubcat=$this->Model->model_select('tbl_category',array('cat_status'=>1,'parentid'=>$maincatid));
                                    ?>
                                    <ul>
                                        <?php
                                            $totalsubcat=count($allsubcat);
                                            if($totalsubcat==0){}
                                            else
                                            {
                                                for($j=0;$j<=1;$j++)
                                                {
                                                    $subslug=$this->Model->model_select('seo_pages',array('cat_id'=>$allsubcat[$j]->cat_id));
                                                ?>
                                                    <li>
                                                        <a href="<?php echo base_url();?><?php echo $subslug[0]->page_slug;?>" title="Clothing"><?php echo $allsubcat[$j]->cat_name; ?></a>
                                                    </li>
                                                <?php
                                                }
                                            }
                                        ?>
                                     </ul>
                                </div>
                        <?php
                            }
                        ?>
                    </div>

                    <div class="divtable">
                        <?php 
                            for ($i=4; $i<8;$i++)
                            {
                                $mainslug=$this->Model->model_select('seo_pages',array('cat_id'=>$maincategoryresult[$i]->cat_id));
                            ?>
                                <div class="divcell col-sm-3">
                                    <h5>
                                        <a href="<?php echo base_url();?><?php echo $mainslug[0]->page_slug;?>">
                                            <?php echo $maincategoryresult[$i]->cat_name;?>
                                        </a>
                                    </h5>
                                    <?php 
                                        $maincatid=$maincategoryresult[$i]->cat_id;
                                        $allsubcat=$this->Model->model_select('tbl_category',array('cat_status'=>1,'parentid'=>$maincatid));
                                    ?>
                                    <ul>
                                        <?php
                                            $totalsubcat=count($allsubcat);
                                            if($totalsubcat==0){}
                                            else
                                            {
                                                for($j=0;$j<=1;$j++)
                                                {
                                                    $subslug=$this->Model->model_select('seo_pages',array('cat_id'=>$allsubcat[$j]->cat_id));
                                                ?>
                                                    <li>
                                                        <a href="<?php echo base_url();?><?php echo $subslug[0]->page_slug;?>" title="Clothing"><?php echo $allsubcat[$j]->cat_name; ?></a>
                                                    </li>
                                                <?php
                                                }
                                            }
                                        ?>
                                     </ul>
                                </div>
                        <?php
                            }
                        ?>
                    </div>

                    <!-- <div class="divtable">
                        <?php 
                            for ($i=8; $i<11;$i++)
                            {
                                $mainslug=$this->Model->model_select('seo_pages',array('cat_id'=>$maincategoryresult[$i]->cat_id));
                            ?>
                                <div class="divcell col-sm-3">
                                    <h5>
                                        <a href="<?php echo base_url();?><?php echo $mainslug[0]->page_slug;?>">
                                            <?php echo $maincategoryresult[$i]->cat_name;?>
                                        </a>
                                    </h5>
                                    <?php 
                                        $maincatid=$maincategoryresult[$i]->cat_id;
                                        $allsubcat=$this->Model->model_select('tbl_category',array('cat_status'=>1,'parentid'=>$maincatid));
                                    ?>
                                    <ul>
                                        <?php
                                            $totalsubcat=count($allsubcat);
                                            if($totalsubcat==0){}
                                            else
                                            {
                                                for($j=0;$j<=1;$j++)
                                                {
                                                    $subslug=$this->Model->model_select('seo_pages',array('cat_id'=>$allsubcat[$j]->cat_id));
                                                ?>
                                                    <li>
                                                        <a href="<?php echo base_url();?><?php echo $subslug[0]->page_slug;?>" title="Clothing"><?php echo $allsubcat[$j]->cat_name; ?></a>
                                                    </li>
                                                <?php
                                                }
                                            }
                                        ?>
                                     </ul>
                                </div>
                        <?php
                            }
                        ?>
                    </div> -->
                
                    <div class="divtable">
                        <div class="col-sm-3">
                            <ul>
                                <li>
                                  <?php 
                                     $page=$this->Model->model_select('seo_page_list',array('page_url'=>'User_cnt/load_allmaincategorylist'));
                                     $slug=$this->Model->model_select('seo_pages',array('page_list_id'=>$page[0]->page_list_id));
                                  ?>
                                  <a href="<?php echo base_url();?><?php echo $slug[0]->page_slug;?>" style="font-size:15px;font-family:arial;color:#CF2626">SEE ALL</a></li>
                            </ul>
                        </div>
                   </div>
                </div>
            </li>
         
            <li class="dropdown <?php if($pagename=="markets"){echo 'active';} ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Markets</a>
                <ul class="dropdown-menu">
                    <?php 
                        foreach($marketlist as $marketvalue)
                        {
                        ?>
                            <li class="">
                                <?php 
                                   $page=$this->Model->model_select('seo_page_list',array('page_url'=>'User_cnt/load_marketlist'));
                                   $slug=$this->Model->model_select('seo_pages',array('page_list_id'=>$page[0]->page_list_id));
                                ?>
                               <a href="<?php echo base_url(); ?><?php echo $slug[0]->page_slug;?>"><?php echo $marketvalue->market_name; ?></a>
                            </li>
                        <?php
                        }
                    ?>
                </ul>
            </li>

            <li class="<?php if($pagename=="contactus"){echo 'active';} ?>">
                <?php 
                   $page=$this->Model->model_select('seo_page_list',array('page_url'=>'User_cnt/load_contactus'));
                   $slug=$this->Model->model_select('seo_pages',array('page_list_id'=>$page[0]->page_list_id));
                ?>
                <a href="<?php echo base_url(); ?><?php echo $slug[0]->page_slug;?>">Contact Us</a>
            </li>

            <li class="<?php if($pagename=="aboutus"){echo 'active';} ?>">
                <?php 
                   $page=$this->Model->model_select('seo_page_list',array('page_url'=>'User_cnt/load_aboutus'));
                   $slug=$this->Model->model_select('seo_pages',array('page_list_id'=>$page[0]->page_list_id));
                ?>
                <a href="<?php echo base_url(); ?><?php echo $slug[0]->page_slug;?>">About Us</a>
            </li>
      </ul>
   </div>
</nav>