<?php 
   $genresult=$this->Model->model_select('tbl_general');
   //print_r($genresult);
?>
<footer class="footer footer-dark">
    <div class="footer-row">
      <div class="container">
         <div class="row">
            <div class="col-md-3 col-xs-6">
               <div class="widget widget_links">
                  <h2 class="widget-title">Other Links</h2>
                  <ul>
                     <?php 
                        $page=$this->Model->model_select('seo_page_list',array('page_url'=>'User_cnt/load_aboutus'));
                        $slug=$this->Model->model_select('seo_pages',array('page_list_id'=>$page[0]->page_list_id));
                     ?>
                     <li><a href="<?php echo base_url(); ?><?php echo $slug[0]->page_slug;?>">About Us</a></li>
                     <li><a href="<?php echo base_url(); ?>">Services</a></li>
                     <li><a href="<?php echo base_url(); ?>">Meet Our Team</a></li>
                     <li><a href="<?php echo base_url(); ?>">Privacy Policy</a></li>
                     <li><a href="<?php echo base_url(); ?>">Terms of Use</a></li>
                     <li><a href="<?php echo base_url(); ?>">Desclaimer</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-md-3 col-xs-6">
               <div class="widget widget_links">
                  <h2 class="widget-title">Free Membership</h2>
                  <ul>
                     <li><a href="<?php echo base_url(); ?>">Premium Membership</a></li>
                     <li><a href="<?php echo base_url(); ?>">Banner Advertisement</a></li>
                     <li><a href="<?php echo base_url(); ?>">Get your Own Website</a></li>
                     <li><a href="<?php echo base_url(); ?>">Promotion</a></li>
                     <li><a href="<?php echo base_url(); ?>">Download App(Only for Members)</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-md-3 col-xs-6">
               <div class="widget widget_links">
                  <h2 class="widget-title">Support</h2>
                  <ul>
                     <?php 
                        $page=$this->Model->model_select('seo_page_list',array('page_url'=>'User_cnt/load_contactus'));
                        $slug=$this->Model->model_select('seo_pages',array('page_list_id'=>$page[0]->page_list_id));
                     ?>
                     <li><a href="<?php echo base_url(); ?><?php echo $slug[0]->page_slug;?>">Contact Us</a></li>
                     <li><a href="<?php echo base_url(); ?>">FAQ</a></li>
                     <li><a href="<?php echo base_url(); ?>">Partners</a></li>
                     <?php
                         $page=$this->Model->model_select('seo_page_list',array('page_url'=>'User_cnt/load_login'));
                         $slug=$this->Model->model_select('seo_pages',array('page_list_id'=>$page[0]->page_list_id));
                     ?>
                     <li><a href="<?php echo base_url();?><?php echo $slug[0]->page_slug;?>">Login</a></li>
                     <li><a href="<?php echo base_url(); ?>">Feedback / Suggestion</a></li>
                     <li><a href="<?php echo base_url(); ?>">Sitemap</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-md-3 col-xs-6">
               <div class="widget widget_contact">
                  <h2 class="widget-title">Contact Us</h2>
                  <ul class="widget_contact_list">
                     <li>
                        <i class="fa fa-map-marker"></i>
                        <address>
                           <?php echo $genresult[0]->web_adr1; ?>
                        </address>
                     </li>
                     <li>
                        <i class="fa fa-phone"></i>
                        <address><span>Phone:</span><?php echo $genresult[0]->web_mono; ?><br/>
                           <span>Sales:</span><?php echo $genresult[0]->web_telno; ?></address>
                     </li>
                     <li>
                        <i class="fa fa-envelope"></i>
                        <address><span>Email: </span><strong><?php echo $genresult[0]->web_mail; ?></strong></address>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
    </div>
    <footer class="footer footer-dark">
        <div class="footer-extra">
            <div class="container">
               <p class="copyrights pull-left">
                  <?php echo $genresult[0]->web_footerline; ?>
               </p>
               <nav class="social-links pull-right">
                  <a href="<?php echo $genresult[0]->twitter_link; ?>"><i class="fa fa-twitter"></i> <span>Twitter</span></a> 
                  <a href="<?php echo $genresult[0]->fb_link; ?>"><i class="fa fa-facebook-square"></i> <span>Facebook</span></a> 
                  <a href="<?php echo $genresult[0]->linkedin_link; ?>"><i class="fa fa-linkedin"></i> <span>Linkedin</span></a> 
                  <a href="<?php echo $genresult[0]->insta_link; ?>"><i class="fa fa-instagram"></i> <span>Instagram</span></a> 
                  <a href="<?php echo $genresult[0]->google_link; ?>"><i class="fa fa-google"></i> <span>google</span></a>
                  <a href="<?php echo $genresult[0]->youtube_link; ?>"><i class="fa fa-youtube"></i> <span>Youtube</span></a>
                  <a href="<?php echo $genresult[0]->pintrest_link; ?>"><i class="fa fa-pinterest"></i> <span>Pinterest</span></a>
               </nav>
            </div>
        </div>
  </footer>
</footer>