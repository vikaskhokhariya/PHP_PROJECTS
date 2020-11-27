<?php 
   $gen=$this->Model->model_select('tbl_general');
   $blogresult=$this->Model->model_select('tbl_blog',array('blog_status'=>1));
?>

<!DOCTYPE html>
<html>
<head>
    <?php 
        include('linktop.php');
    ?>
    <style type="text/css">
        .errorcolor
        {
            color:#DA3636;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="preloader"></div>
    <header class="header header-light">
        <?php 
            $linkactive['pagename']="contactus";
            $this->load->view('Client/header',$linkactive);
        ?>
    </header>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8 maincontent">
                    <?php 
                        for($i=0;$i<count($blogresult);$i++)
                        {
                        ?>
                            <div class="container post format-standart">
                                <div class="entry">
                                    <header class="entry-header">
                                        <h2><a href="#"><?php echo $blogresult[$i]->blog_title; ?></a></h2>
                                        <div class="meta">
                                            <a href="#" class="author"><i class="fa fa-user"></i>Robert Plant</a> 
                                            <small><i class="fa fa-calendar"></i>12 December, 2015</small> 
                                            <a href="#"><i class="fa fa-comment"></i>No Comments</a> 
                                            <small><i class="fa fa-folder"></i> <a href="#">Design</a>, 
                                            <a href="#">Music</a></small></div>
                                    </header>
                                    <div class="entry-content">
                                        <img src="<?php echo base_url(); ?>Upload/Admin/Blog/<?php echo $blogresult[$i]->blog_image; ?>" >
                                        <?php echo $blogresult[$i]->blog_content; ?>
                                        <a href="#" class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                            </div>
                        <?php 
                        }
                     ?>
                    <hr/>
                </div>

                <aside class="col-md-3 col-sm-4 sidebar">
                    <div class="widget widget_search">
                        <h2 class="widget-title">Our Mission</h2>
                        <p>SimbaMart is leading Indian B2B Platform that provides effective customer satisfaction.</p>
                    </div>
                    <hr/>

                    <div class="widget widget_search">
                        <h2 class="widget-title">Our Vision</h2>
                        <p>To Provide effective designing cloths and change the lifestyle and status of people.</p>
                    </div>
                    <hr/>

                    <div class="widget widget_recent_entries">
                        <h2 class="widget-title">Recent Blogs</h2>
                        <ul>
                            <?php 
                                for($i=0;$i<5;$i++)
                                {
                                ?>
                                    <li>
                                        <a href="#">
                                            <?php 
                                                $len=strlen($blogresult[$i]->blog_title);

                                                if($len > 30)
                                                {
                                                    echo substr($blogresult[$i]->blog_title,0,30)."...";
                                                }
                                                else
                                                {
                                                    echo $blogresult[$i]->blog_title;
                                                }
                                            ?>
                                        </a>
                                    </li>
                                <?php
                                }
                            ?>
                        </ul>
                    </div>
                </aside>
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