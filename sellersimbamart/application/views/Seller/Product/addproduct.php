<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<head>
    <?php 
        $this->load->view('Seller/linktop');
    ?>

    <style type="text/css">
        .classerror
        {
            color: red;
            font-weight: bold;
        }
        .edittext
        {
            font-weight: bold;
            font-size: 17px;
            margin-top: 5px;
            color: #006400;
            text-decoration: underline;
            cursor: pointer;
        }
        .removetext
        {
            font-weight: bold;
            font-size: 17px;
            margin-top: 5px;
            color: red;
            text-decoration: underline;
            cursor: pointer;
        }
        .classaddmoreimages
        {
            color : #014C7D;
            font-size: 17px;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-color="bg-gradient-x-purple-red" data-col="2-columns">

    <?php 
        $this->load->view('Seller/mobileviewheader');
        $this->load->view('Seller/pcviewheader');
    ?>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">
                        ADD PRODUCT
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
                <section id="drag-area">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-content collapse show">
                                                <div class="card-body">
                                                    <form class="form">
                                                        <div class="form-body">
                                                            <h4 class="form-section">
                                                                <i class="ft-flag"></i> Product Details
                                                            </h4>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-2 col-form-label">Product Name</label>
                                                                <div class="col-sm-5">
                                                                    <input class="form-control" type="text" placeholder="Enter Product Name" id="productname" autocomplete="off">
                                                                    <span id="productnameeroor" class="classerror"></span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-2 col-form-label">Product Image</label>
                                                                <div class="col-sm-2">
                                                                    <img class="img-thumbnail img-fluid" src="<?php echo base_url(); ?>Upload/extra/noimage.jpg" height="150px" width="150px" id="productimage">
                                                                    <input type="file" class="custom-file-input" id="productimageselect" hidden="">
                                                                    <span id="primaryimageerror" class="classerror"></span>
                                                                    <div class="edittext" id="uploadprimaryimage">Upload</div>
                                                                </div>
                                                                <div class="col-sm-3 align-self-center">
                                                                    <div class="classaddmoreimages" id="addmoreimages">
                                                                        <i class="fa fa-plus text-bold-700" aria-hidden="true"></i> Add More images
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-2 col-form-label">Price</label>
                                                                <div class="col-sm-3">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"><i class="fa fa-inr" aria-hidden="true"></i></span>
                                                                        </div>
                                                                        <input class="form-control border-primary" type="text" placeholder="EX - 1000" id="productprice">
                                                                    </div>
                                                                    <span id="productpriceerror" class="classerror"></span>
                                                                </div>
                                                                <div class="col-sm-1"></div>
                                                                <label for="example-text-input" class="col-sm-1.5 col-form-label">Unit Type</label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-control" type="text" placeholder="EX - Piece / Pair" id="unittype" autocomplete="off">
                                                                    <span id="unittypeerror" class="classerror"></span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-2 col-form-label">Minimum Order Quantity</label>
                                                                <div class="col-sm-3">
                                                                    <input class="form-control" type="text" placeholder="Ex - 50" id="minqty" autocomplete="off">
                                                                    <span id="minqtyerror" class="classerror"></span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                                               <div class="form-group col-sm-8">
                                                                    <textarea name="ckeditor" id="ckeditor" cols="30" rows="15" class="ckeditor"></textarea>
                                                                    <span id="descriptionerror" class="classerror"></span>
                                                                </div>
                                                            </div>

                                                             <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label"></label>
                                                               <div class="form-group text-danger">
                                                                   <span id="cpagecontenterror" class="classerror"></span>
                                                                </div>
                                                            </div>

                                                            <h4 class="form-section">
                                                                <i class="ft-flag"></i> Choose a Category
                                                            </h4>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-sm-3 col-form-label">Choose Main Category</label>
                                                                <?php
                                                                    $pageresult=$this->Model->model_select('simbamart.tbl_category',array('parentid'=>0));
                                                                ?>
                                                                <div class="col-sm-5">
                                                                    <select class="form-control" id="maincategory">
                                                                        <option hidden="" value="">Select</option>
                                                                        <?php 
                                                                           foreach($pageresult as $q)
                                                                           {
                                                                        ?>
                                                                            <option value="<?php echo $q->cat_id;?>"><?php echo $q->cat_name;?></option>
                                                                        <?php
                                                                           }
                                                                        ?>
                                                                    </select> 
                                                                    <span id="maincategoryerror" class="classerror"></span>
                                                                </div>
                                                            </div>

                                                            <div id="choosesubcategory" hidden="">
                                                                <div class="form-group row">
                                                                    <label for="example-text-input" class="col-sm-3 col-form-label">Choose Sub Category</label>
                                                                    <div class="col-sm-5">
                                                                        <select class="form-control" id="subcategory">
                                                                            
                                                                        </select> 
                                                                        <span id="subcategoryerror" class="classerror"></span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-actions">
                                                                <input type="button" name="submit" value="Submit" class="btn btn-info" id="btnaddproduct"> 
                                                                <input type="button" name="cancel" value="Cancel" class="btn btn-danger mr-1" id="canceladdproduct">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>   
                </section>
            </div>
        </div>
    </div>

    <?php 
        $this->load->view('Seller/linkbottom');
    ?>
    <script src="<?php echo base_url(); ?>assets/Seller/js/scripts/productcustom.js" type="text/javascript"></script>
    
    <script type="text/javascript">
        CKEDITOR.replace('ckeditor');

        $('#uploadprimaryimage').click(function()
        {
            $('#productimageselect').click();
        });

        function readURL(input)
        {
            if (input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#productimage').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#productimageselect').change(function()
        {
            mainpicsize=document.getElementById('productimageselect').files[0];

            if(mainpicsize.size > 2000000)
            {
                swal({
                    title:"Opps..",
                    text:"Size Should Be less than 2.5MB",
                    type:"error",
                    allowOutsideClick: false
                });   
            }
            else
            {
                primaryimage = $('#productimageselect')[0].files[0];
                readURL(this);
            }
        });

        $('#maincategory').change(function()
        {
            var maincatid = $('#maincategory').val();

            $.ajax({
                url : "find_subcategorylist/"+maincatid,
                type: "POST",
                success : function(response)
                {
                    document.getElementById('subcategory').innerHTML=response
                }
            });
            $('#choosesubcategory').removeAttr('hidden');
        });

        $('#canceladdproduct').click(function()
        {
            window.location.href="<?php echo base_url(); ?>Product/manageproduct";
        });
    </script>
  </body>
</html>