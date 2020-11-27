<!DOCTYPE html>
<html>
   <head>
     <?php include('linktop.php');?>
   </head>
   <body>
      <header class="header">
        <?php 
            $linkactive['pagename']="home";
            $this->load->view('Client/header',$linkactive);
         ?>
      </header>
      <div class="wrapper">
         <div class="content">
            <hr class="hr-nobg hr-sm hidden-xs"/>
            <div class="container">
               <section class="row page-header text-center">
                  <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                     <div class="icon icon-color icon-size-7"><i class="fa fa-search"></i></div>
                     <h1>Page Not Found</h1>
                     <a href="<?php echo base_url();?>" class="btn btn-primary btn-wide">Home</a>
                  </div>
               </section>
            </div>
            <hr class="hr-nobg hidden-xs"/>
         </div>
      </div>
    <?php include('footer.php');?>
    <?php include('linkbottom.php');?>
   </body>
</html>