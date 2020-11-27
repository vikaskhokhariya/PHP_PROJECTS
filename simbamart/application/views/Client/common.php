<!DOCTYPE html>
<html>
   <head>
      <?php include('linktop.php') ;?>
   </head>
   <body>
      <div class="preloader"></div>
      <header class="header header-light">
         <?php 
            $this->load->view('Client/header');
         ?>
      </header>
      <div class="wrapper">
         
      </div>

      <footer>
         <?php
            $this->load->view('Client/footer');
         ?>
      </footer>
      <?php include('linkbottom.php'); ?>
   </body>
</html>