<!DOCTYPE html>
<html>
   <head>
      <?php include('linktop.php') ;?>
   </head>
   <body>
      <div class="preloader"></div>
      <header class="header header-light">
         <?php 
            $linkactive['pagename']="";
            $this->load->view('Client/header',$linkactive);
         ?>
      </header>
      
      <div class="wrapper">
         <div class="content" style="background-image: url('<?php echo base_url(); ?>Upload/Client/extra/sellonsimbamart.jpg'); background-repeat: no-repeat;background-size: 100%;">
            <div class="container">
               <div>
               <div class="row">
                  <div class="col-lg-4 col-md-6 col-sm-8 col-lg-offset-4 col-md-offset-3 col-sm-offset-2 pull-right">
                     <!-- <h2>Login to account <small>Enter to account or <a href="<?php echo base_url(); ?>User_cnt/load_signup">Register Now</a></small></h2> -->
                     <!-- <hr class="hr-sm hr-stroke"/> -->
                     <form>
                        <div class="form-group">
                           <label for="username"><span class="formlbl">Username</span></label>
                           <input type="text" name="name" id="username">
                        </div>
                        <div class="form-group">
                           <label for="password"><span class="formlbl">Password</span></label>
                           <input type="password" name="name" id="password">
                        </div>
                        <!-- <div class="form-group"><a href="#">Forgot password?</a></div> -->
                        <hr class="hr-sm hr-stroke"/>
                        <div class="form-group"><input type="submit" class="btn btn-primary btn-wide" value="Send"><label class="checkbox-inline"><input type="checkbox" id="inlineCheckbox1" value="option1"> Remember me</label></div>
                        <hr class="hr-sm hr-stroke"/>
                        <div class="form-group">
                           <nav class="share-links share-links-sm"><a href="#" class="fa fa-facebook"></a> <a href="#" class="fa fa-twitter"></a> <a href="#" class="fa fa-google-plus"></a> <span class="hidden-xxs">— Login with accounts</span></nav>
                        </div>
                     </form>
                  </div>
               </div>
               </div>
            </div>
         </div>
      </div>

      <div class="modal map-modal" id="map-modal">
         <a href="#" class="map-close" data-dismiss="modal"><i class="fa fa-close"></i></a>
         <div class="google-map-popup"></div>
      </div>
      
      <?php include('linkbottom.php'); ?>
   </body>
</html>