<?php 
   $gen=$this->Model->model_select('tbl_general');
   //print_r($gen);
?>
<!DOCTYPE html>
<html>
   <head>
      <?php include('linktop.php') ;?>
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
      <div class="wrapper">
         <div class="content no-pt">
            <div class="contact contact-light map-wrap">
               <div class="container">
                  <div class="row irow-sm text-center cols-border contact-wrap">
                     <div class="col-md-3 col-xs-6">
                        <div class="icon icon-size-4 icon-color"><i class="fa fa-clock-o"></i></div>
                        <h4>Contact Us</h4>
                        <address>Our team usually working 24*7</address>
                        <div class="heading-divider"></div>
                     </div>
                     <div class="col-md-3 col-xs-6">
                        <div class="icon icon-size-4 icon-color"><i class="fa fa-map-marker"></i></div>
                        <h4>Address</h4>
                        <address><?php echo $gen[0]->web_adr1; ?></address>
                        <div class="heading-divider"></div>
                     </div>
                     <div class="col-md-3 col-xs-6">
                        <div class="icon icon-size-4 icon-color"><i class="fa fa-phone"></i></div>
                        <h4>Phones</h4>
                        <address><?php echo $gen[0]->web_mono; ?><br/><?php echo $gen[0]->web_telno; ?></address>
                        <div class="heading-divider"></div>
                     </div>
                     <div class="col-md-3 col-xs-6">
                        <div class="icon icon-size-4 icon-color"><i class="fa fa-envelope-o"></i></div>
                        <h4>Emails</h4>
                        <address><?php echo $gen[0]->web_mail; ?></address>
                        <div class="heading-divider"></div>
                     </div>
                  </div>
               </div>
               <!-- <div>
                  <iframe class="google-map-container" src="<?php echo $gen[0]->web_gmap; ?>"></iframe>
               </div> -->
               
              <!--  <div class="google-map google-map-sm">
                  <iframe class="map google-map-container" src="<?php echo $gen[0]->web_gmap; ?>"></iframe>
               </div> -->
            </div>
            
            <hr class="hr-nobg"/>
            <div class="container">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="tabs tabs-vertical-left tabs-icons-square">
                        <ul class="nav nav-tabs pull-left">
                           <li class="active"><a href="#mus-5" data-toggle="tab"><i class="fa fa-search"></i></a></li>
                           <li><a href="#time-5" data-toggle="tab"><i class="fa fa-clock-o"></i></a></li>
                           <li><a href="#photo-5" data-toggle="tab"><i class="fa fa-car"></i></a></li>
                        </ul>
                        <div class="tab-content no-border">
                           <div class="tab-pane fade in active" id="mus-5">
                              <h4>Simba Mart</h4>
                              <p>SimbaMart is a stupendous Textile Business Directory. It is a soup to nuts solution for all trading community. It is a unique B2B Textile Market Place that allows all textile suppliers and businesses to stimulate their business through their listings. This trade-off directory is giving room for the people to showcase and trade their business online. Textile Infomedia is dedicated in engrossing the people of textile industries to minimize their problems and maximize their fortuity to grow businesses world-wide. It turns out to be a backbone and important force in modern textile and garment industry.</p>
                           </div>
                           <div class="tab-pane fade" id="time-5">
                              <h4>Invention</h4>
                              <p>SimbaMart is a new approach in the world of textile commerce. It comprehends the customer’s contentment and novelty from its very inception. We give spearheading solutions to meet the aggressive and changing face of the textile industry. We give precise solutions of the website in accordance with market and industry classifications. We advocate the necessities of manufacturer, suppliers, exporters, buyers, wholesalers. We are recognized as the unsurpassed and most trusted B2B website based in India. We give daily updates and suggestions to our customers. Our web portal offers online registrations to the industries to enter Internet Market Place.</p>
                           </div>
                           <div class="tab-pane fade" id="photo-5">
                              <h4>What More..??</h4>
                              <p>It is a grooming Indian B2B Portal of Textile Industry. We serve all textiles business category like Sarees, Dress Materials, Ethnic Wear, Kurtis, Apparel, Garments, Fabrics, Textile Job Work, Commission Agents, Textile Machinery companies, Machine Parts and services, Grey Fabric weavers, Yarn, Textile Mill, Tax Consultants, Transporter, and others who are primarily and secondarily connected to textile Productiveness. Through our website the industries can showcase their strength, image, products, technology and innovations. It not only benefits the existing players of textile domain, but also serves as an informative guide for the new users who are willing to enter this industry.</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6" id="top">
                     <h3>Contact Form</h3>
                     <form>
                        <div class="form-group">
                           <input type="text" placeholder="Your Name *" id="nm">
                           <span id="errorname" class="errorcolor"></span>
                        </div>
                        
                        <div class="form-group">
                           <input type="text" placeholder="Email Address *" id="email">
                           <span id="erroremail" class="errorcolor"></span>
                        </div>
                        
                        <div class="form-group">
                           <input type="text" placeholder="Enquiry *" id="enq">
                           <span id="errorenq" class="errorcolor"></span>
                        </div>
                        
                        <input type="button" value="Send" class="btn btn-primary btn-wide" id="submitenq">
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <footer>
         <?php
            $this->load->view('Client/footer');
         ?>
      </footer>
      <?php include('linkbottom.php'); ?>

      <script>
          $("#submitenq").click(function(){
              $('#errorname').html('');
              $('#erroremail').html('');
              $('#errorenq').html('');

              name=$('#nm').val();
              email=$('#email').val();
              enq=$('#enq').val();

              formdata={
                  nm : name,
                  email : email,
                  enq : enq
              }

              $.ajax({
                  url:"<?php echo base_url();?>User_cnt/add_enquiry",
                  data:formdata,
                  type:"POST",
                  dataType:"JSON",
                  success:function(response)
                  {
                      console.log(response);
                      if(response.code==0)
                      {
                              $('html,body').animate({
                                  scrollTop:$('#top').offset().top-220
                              },2000);

                              if(response.msg.search('\n') > 0)
                              {
                                  d=response.msg.split("\n");
                              }
                              else
                              {
                                  d=response.msg;
                              }

                              for(var i=0;i<d.length;i++)
                              {
                                  if(d[i].search('Name') > 0)
                                  {
                                      $('#errorname').html(d[i]).slideDown('slow');
                                  }
                                  if(d[i].search('Email') > 0)
                                  {
                                      $('#erroremail').html(d[i]).slideDown('3500');
                                  }
                                  if(d[i].search('Enquiry') > 0)
                                  {
                                      $('#errorenq').html(d[i]).slideDown('3500');
                                  }
                              }         
                      }
                      else
                      {
                        swal({
                            title:"Good Job",
                            text:"Enquiry has been sent",
                            type:"success",
                            allowOutsideClick: false,
                            animation: false,
                            customClass: 'animated tada'
                        });
                        $('.swal2-confirm').click(function(){
                            window.location.href="<?php echo base_url(); ?>User_cnt/load_contactus";
                        });
                      }
                  }
              });
          });
      </script>
   </body>
</html>