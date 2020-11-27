<!DOCTYPE html>
<html>
<head>
	<?php include('linktop.php') ;?>
	<title></title>
</head>
<body>
	<header class="header header-light">
         <?php 
            $linkactive['pagename']="home";
            $this->load->view('Client/header',$linkactive);
         ?>
    </header>
    <body>
    	<div class="container">
    		<img src="<?php echo base_url();?>underconstruction.jpg" alt="underconstruction" class="img-responsive"> 
    	</div>
    </body>
    <footer>
         <?php
            $this->load->view('Client/footer');
         ?>
      </footer>
      <?php include('linkbottom.php'); ?>
</body>
</html>