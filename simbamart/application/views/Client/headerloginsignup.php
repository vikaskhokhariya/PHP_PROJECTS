<?php $generalresult=$this->Model->model_select('tbl_general'); ?>
<nav class="navbar container">
   <center>
      <a class="navbar-brand" href="#">
         <img src="<?php echo base_url(); ?><?php echo $generalresult[0]->web_logo; ?>" alt="simbamartlogo">
      </a>
   </center>
</nav>