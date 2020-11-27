<?php 
    $enq_result=$this->Model->model_select('tbl_enquiry');
    $total_enquiry=count($enq_result);

    $maincat_result=$this->Model->model_select('tbl_category',array('type'=>'main','cat_status'=>1));
    $total_maincat=count($maincat_result);

    $subcat_result=$this->Model->model_select('tbl_category',array('type'=>'main','cat_status'=>1));
    $total_subcat=count($subcat_result);

    $seller_result=$this->Model->model_select_seller();
    //print_r($seller_result);
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<head>
    <?php 
        include('linktop.php');
    ?>
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-color="bg-gradient-x-purple-red" data-col="2-columns">

    <?php 
        include('mobileviewheader.php');
        include('pcviewheader.php');
    ?>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">
                    DASHBOARD
                </h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo base_url(); ?>Admin_cnt">
                                    Home
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
          </div>

        <div class="content-body">
            <!-- Revenue, Hit Rate & Deals -->
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <div class="card pull-up border-top-info border-top-3 rounded-0">
                        <div class="card-header">
                            <h4 class="card-title">Enquiry <span class="badge badge-pill badge-info float-right m-0">5+</span></h4>
                        </div>
                        <div class="card-content collapse show">
                        <div class="card-body p-1">
                            <h4 class="font-large-1 text-bold-400"> <?php echo $total_enquiry; ?><i class="ft-users float-right"></i></h4>
                            <h6 class="text-bold-600 mt-2"> Total : <span class="info"><?php echo $total_enquiry; ?></span></h6>
                            <h6 class="text-bold-600 mt-1"> New : <span class="info">5</span></h6>
                        </div>
                        <div class="card-footer p-1">
                            <span class="text-muted"><i class="la la-arrow-circle-o-up info"></i> 23.67% increase</span>
                        </div>
                      </div>
                   </div>
                </div>

                <div class="col-sm-4 col-md-4">
                    <div class="card pull-up border-top-info border-top-3 rounded-0">
                        <div class="card-header">
                            <h4 class="card-title">Clients <span class="badge badge-pill badge-info float-right m-0">5+</span></h4>
                        </div>
                        <div class="card-content collapse show">
                        <div class="card-body p-1">
                            <h4 class="font-large-1 text-bold-400">18.5% <i class="ft-users float-right"></i></h4>
                            <h6 class="text-bold-600 mt-2"> Total Customers : <span class="info">15</span></h6>
                            <h6 class="text-bold-600 mt-1"> Total Sellers : <span class="info">5</span></h6>
                        </div>
                        <div class="card-footer p-1">
                            <span class="text-muted"><i class="la la-arrow-circle-o-up info"></i> 23.67% increase</span>
                        </div>
                      </div>
                   </div>
                </div>
            </div>
        </div>
            
        <!-- Emails Products & Avg Deals -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
               <div class="card">
                  <div class="card-header p-1">
                     <h4 class="card-title float-left">Category</h4>
                  </div>
                  <div class="card-content collapse show">
                     <div class="card-footer text-center p-1">
                        <div class="row">
                           <div class="col-md-3 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                            <a href="<?php echo base_url(); ?>Admin_cnt/load_maincatlist">
                              <p class="blue-grey lighten-2 mb-0">Main Category</p>
                              <p class="font-medium-5 text-bold-400"><?php echo $total_maincat; ?></p>
                            </a>
                           </div>
                           <div class="col-md-3 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                            <a href="<?php echo base_url(); ?>Admin_cnt/load_subcatlist">
                              <p class="blue-grey lighten-2 mb-0">Sub Category</p>
                              <p class="font-medium-5 text-bold-400"><?php echo $total_subcat; ?></p>
                            </a>
                           </div>
                           <div class="col-md-3 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                              <p class="blue-grey lighten-2 mb-0">Pending</p>
                              <p class="font-medium-5 text-bold-400">42%</p>
                           </div>
                           <div class="col-md-3 col-12 text-center">
                              <p class="blue-grey lighten-2 mb-0">Version</p>
                              <p class="font-medium-5 text-bold-400">4.5</p>
                           </div>
                        </div>
                        <hr>
                        <span class="text-muted info">Detail about Categories</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--/ Emails Products & Avg Deals -->
             <!-- Chat and Recent Projects -->
             <div class="row match-height">
                <div class="col-xl-12 col-lg-6 col-md-12">
                   <h5 class="card-title text-bold-700 my-2">Recent Sellers</h5>
                   <div class="card">
                      <div class="card-content">
                         <div id="recent-projects" class="media-list position-relative">
                            <div class="table-responsive">
                               <table class="table table-padded table-xl mb-0" id="recent-project-table">
                                  <thead>
                                     <tr>
                                        <th class="border-top-0">Seller Name</th>
                                        <th class="border-top-0">Business Name</th>
                                        <th class="border-top-0">Email Address</th>
                                        <th class="border-top-0">Contact</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                        foreach($seller_result as $value)
                                        {
                                    ?>
                                     <tr>
                                        <td class="text-truncate align-middle">
                                           <?php echo $value->seller_name; ?>
                                        </td>
                                        <td class="text-truncate">
                                           <?php echo $value->business_name; ?>
                                        </td>
                                        <td class="text-truncate pb-0">
                                           <?php echo $value->business_email; ?>
                                        </td>
                                        <td>
                                           <?php echo $value->business_contact; ?>
                                        </td>
                                     </tr>
                                     
                                     <?php 
                                        }
                                     ?>
                                  </tbody>
                               </table>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <!--/ Products sell and New Orders -->
          </div>
       </div>
    </div>

    <?php 
        include('footer.php');
    ?>

    <?php 
        include('linkbottom.php');
    ?>
  </body>
</html>