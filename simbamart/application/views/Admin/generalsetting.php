<?php 
    $res=$this->Model->model_select('tbl_general');
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<head>
    <?php 
        include('linktop.php');
    ?>
    <style type="text/css">
        .uploadpic
        {
            text-decoration: underline;
            font-weight: bold;
            font-size: 20px;
        }
        .uploadpic:hover
        {
            cursor: pointer;
        }
    </style>
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-color="bg-gradient-x-purple-red" data-col="2-columns" id="top">

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
                        GENERAL SETTING
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
                                                                <i class="ft-flag"></i> Main Category
                                                            </h4>
                                                            <form>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card m-b-30">
                                                                            <div class="card-body">
                                                                                <div class="form-group row">
                                                                                    <label for="example-text-input" class="col-sm-2 col-form-label">
                                                                                        Website Title
                                                                                    </label>
                                                                                    <div class="col-sm-6">
                                                                                        <input class="form-control" type="text" id="webtitle" name="bnm" autocomplete="off" value="<?php echo $res[0]->web_title; ?>">
                                                                                    </div>
                                                                                    <div class="col-sm-4 text-danger">
                                                                                        <b><span id="webtitleerror"></span></b>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2 col-form-label">Website Logo</label>
                                                                                    <div class="col-sm-2">
                                                                                        <img src="<?php echo base_url(); ?>/<?php echo $res[0]->web_logo; ?>" class="imglogo" id="weblogo" >
                                                                                    </div>
                                                                                    <div class="col-sm-2">
                                                                                        <div>
                                                                                            <input type="file" id="logo" name="profile" class="form-control" style="display:none;">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-2"></div>
                                                                                    <div class="col-sm-2" id="logodiv">
                                                                                        <h4 class="uploadpic">Upload</h4>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="example-text-input" class="col-sm-2 col-form-label">
                                                                                        Website Tagline
                                                                                    </label>
                                                                                    <div class="col-sm-6">
                                                                                        <input class="form-control" type="text" id="webtagline" name="webtagline" autocomplete="off" value="<?php echo $res[0]->web_tagline; ?>">
                                                                                    </div>
                                                                                    <div class="col-sm-4 text-danger">
                                                                                        <b><span id="webtaglineerror"></span></b>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Facebook Link</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text" class="form-control" autocomplete="off" id="facebooklink" value="<?php echo $res[0]->fb_link; ?>">
                                                                                    </div>
                                                                                    <div class="col-sm-4 text-danger">
                                                                                        <b><span id="facebooklinkerror"></span></b>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2 col-form-label">Twitter Link</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input class="form-control" type="text" id="twitterink" value="<?php echo $res[0]->twitter_link; ?>">
                                                                                    </div>
                                                                                    <div class="col-sm-4 text-danger">
                                                                                        <b><span id="twitterlinkerror"></span></b>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2 col-form-label">Instagram Link</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input class="form-control" type="text" id="instagramlink" value="<?php echo $res[0]->insta_link; ?>">
                                                                                    </div>
                                                                                    <div class="col-sm-4 text-danger">
                                                                                        <b><span id="instagramlinkerror"></span></b>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2 col-form-label">Google+ Link</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input class="form-control" type="text" id="googlelink" value="<?php echo $res[0]->google_link; ?>">
                                                                                    </div>
                                                                                    <div class="col-sm-4 text-danger">
                                                                                        <b><span id="googlelinkerror"></span></b>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2 col-form-label">Youtube Link</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input class="form-control" type="text" id="youtubelink" value="<?php echo $res[0]->youtube_link; ?>">
                                                                                    </div>
                                                                                    <div class="col-sm-4 text-danger">
                                                                                        <b><span id="youtubelinkerror"></span></b>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2 col-form-label">LinkedIn Link</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input class="form-control" type="text" id="Linkedinlink" value="<?php echo $res[0]->linkedin_link; ?>">
                                                                                    </div>
                                                                                    <div class="col-sm-4 text-danger">
                                                                                        <b><span id="Linkedinlinkerror"></span></b>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2 col-form-label">Pinterest Link</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input class="form-control" type="text" id="pinterestlink" value="<?php echo $res[0]->pintrest_link; ?>">
                                                                                    </div>
                                                                                    <div class="col-sm-4 text-danger">
                                                                                        <b><span id="pintrestlinkerror"></span></b>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2 col-form-label">
                                                                                        Email Address
                                                                                    </label>
                                                                                    <div class="col-sm-6" name="city">
                                                                                        <input class="form-control" type="text" id="emailaddress" autocomplete="off" value="<?php echo $res[0]->web_mail; ?>">
                                                                                    </div>
                                                                                    <div class="col-sm-4 text-danger">
                                                                                        <b><span id="emailaddresserror"></span></b>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2 col-form-label">
                                                                                        Phone Number
                                                                                    </label>
                                                                                    <div class="col-sm-6" name="city">
                                                                                        <input class="form-control" type="text" id="phone" autocomplete="off" value="<?php echo $res[0]->web_mono; ?>">
                                                                                    </div>
                                                                                    <div class="col-sm-4 text-danger">
                                                                                        <b><span id="phoneerror"></span></b>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2 col-form-label">
                                                                                        Telephone Number
                                                                                    </label>
                                                                                    <div class="col-sm-6" name="city">
                                                                                        <input class="form-control" type="text" id="altphone" autocomplete="off" value="<?php echo $res[0]->web_telno; ?>">
                                                                                    </div>
                                                                                    <div class="col-sm-4 text-danger">
                                                                                        <b><span id="telephoneerror"></span></b>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2 col-form-label">GMAP Location</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input class="form-control" type="text" id="gmaplocation" value="<?php echo $res[0]->web_gmap; ?>">
                                                                                    </div>
                                                                                    <div class="col-sm-4 text-danger">
                                                                                        <b><span id="gmaperror"></span></b>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2 col-form-label">Address 1 </label>
                                                                                    <div class="col-sm-6">
                                                                                        <textarea id="address1" autocomplete="off" class="form-control"><?php echo $res[0]->web_adr1; ?></textarea>
                                                                                    </div>
                                                                                    <div class="col-sm-4 text-danger">
                                                                                        <b><span id="address1error"></span></b>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2 col-form-label">Address 2 </label>
                                                                                    <div class="col-sm-6">
                                                                                        <textarea id="address2" autocomplete="off" class="form-control"><?php echo $res[0]->web_adr2; ?></textarea>
                                                                                    </div>
                                                                                    <div class="col-sm-4 text-danger">
                                                                                        <b><span id="address2error"></span></b>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2 col-form-label">Footer Line</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input class="form-control" type="text" id="footerline" value="<?php echo $res[0]->web_footerline; ?>">
                                                                                    </div>
                                                                                    <div class="col-sm-4 text-danger">
                                                                                        <b><span id="footerlineerror"></span></b>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group row">
                                                                                    <div class="col-sm-2"></div>
                                                                                    <div class="col-sm-2">
                                                                                        <input type="button" value="Edit" class="btn btn-info btn-block" onclick="edit_settings()">
                                                                                    </div>
                                                                                    <div class="col-sm-2">
                                                                                        <input type="button" name="cancel" value="Cancel" class="btn btn-info btn-block" onclick="edit_cancel()">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> <!-- end col -->
                                                                </div> <!-- end row -->
                                                            </form>
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
        include('footer.php');
    ?>

    <?php 
        include('linkbottom.php');
    ?>

    <script type="text/javascript">
        var logo='';

        $('#logodiv').click(function(){
            $('#logo').click();
        });

        $('#logo').change(function(){
            mainpicsize=document.getElementById('logo').files[0];
            if(mainpicsize.size > 2572000)
            {
                swal({
                    title:"Opps..",
                    text:"<span style='font-size:20px;font-weight:bold;'>Size Should Be less than 2.5MB</span>",
                    type:"error",
                    allowOutsideClick: false
                });  
                $('logo').val(''); 
            }
            else
            {
                readURL(this);
                logo=$('#logo')[0].files[0];
            }
        });

        function readURL(input)
        {
            if (input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#weblogo').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function edit_cancel()
        {
            window.location.href='<?php echo base_url();?>Controller/load_dashboard';
        }

        function edit_settings()
        {
            $('#webtitleerror').hide();
            $('#webtaglineerror').hide();
            $('#facebooklinkerror').hide();
            $('#twitterlinkerror').hide();
            $('#instagramlinkerror').hide();
            $('#googlelinkerror').hide();
            $('#youtubelinkerror').hide();
            $('#Linkedinlinkerror').hide();
            $('#pintrestlinkerror').hide();
            $('#emailaddresserror').hide();
            $('#phoneerror').hide();
            $('#telephoneerror').hide();
            $('#gmaperror').hide();
            $('#address1error').hide();
            $('#address2error').hide();
            $('#footerlineerror').hide();

            title=$('#webtitle').val();
            tagline=$('#webtagline').val();
            facebook=$('#facebooklink').val();
            instagram=$('#instagramlink').val();
            twitter=$('#twitterink').val();
            google=$('#googlelink').val();
            youtube=$('#youtubelink').val();
            linkedin=$('#Linkedinlink').val();
            pinterest=$('#pinterestlink').val();
            email=$('#emailaddress').val();
            phone=$('#phone').val();
            telphone=$('#altphone').val();
            gmap=$('#gmaplocation').val();
            address1=$('#address1').val();
            address2=$('#address2').val();
            footerline=$('#footerline').val();

            fd = new FormData();

            fd.append('webtitle',title);
            fd.append('tagline', tagline);
            fd.append('facebook',facebook);
            fd.append('instagram',instagram);
            fd.append('twitter',twitter);
            fd.append('google',google);
            fd.append('youtube',youtube);
            fd.append('linkedin',linkedin);
            fd.append('pinterest',pinterest);
            fd.append('email',email);
            fd.append('phone',phone);
            fd.append('telphone',telphone);
            fd.append('gmap',gmap);
            fd.append('address1',address1);
            fd.append('address2',address2);
            fd.append('footer',footerline);

            if(document.getElementById("logo").files.length != 0)
            {
                fd.append('logo', logo);
            }
            else
            {
                fd.append('logo','');
            }

            for(var i of fd.values())
            {
                console.log(i);
            }

            $.ajax({
                url : "<?php echo site_url('Admin_cnt/edit_general_settings'); ?>",
                data: fd,
                dataType : "JSON",
                type: "POST",
                processData:false,
                contentType:false,
                success : function(response)
                {
                    console.log(response);
                    if(response.code===0)
                    {
                        swal({
                            title:"Opps..",
                            text:"Please Correct the Errors",
                            type:"error",
                            allowOutsideClick: false,
                            animation: false,
                            customClass: 'animated tada'
                        });
                        $('.swal2-confirm').click(function(){
                            $('html,body').animate({
                                scrollTop:$('#top').offset().top-220
                            },2000);
                        });
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
                            if(d[i].search('Website Title') > 0)
                            {
                                $('#webtitleerror').html(d[i]).slideDown('slow');
                            }
                            if(d[i].search('Tag Line') > 0)
                            {
                                $('#webtaglineerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Facebook Link') > 0)
                            {
                                $('#facebooklinkerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Instagram Link') > 0)
                            {
                                $('#instagramlinkerror').html(d[i]).slideDown('3500');
                            }
                             if(d[i].search('Google Link') > 0)
                            {
                                $('#googlelinkerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Twitter Link') > 0)
                            {
                                $('#twitterlinkerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Youtube Link') > 0)
                            {
                                $('#youtubelinkerror').html(d[i]).slideDown('3500');
                            }
                             if(d[i].search('Linkedin Link') > 0)
                            {
                                $('#Linkedinlinkerror').html(d[i]).slideDown('3500');
                            }
                              if(d[i].search('Pinterest Link') > 0)
                            {
                                $('#pintrestlinkerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Email Address') > 0)
                            {
                                $('#emailaddresserror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Phone Number') > 0)
                            {
                                $('#phoneerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Alternative phone Number') > 0)
                            {
                                $('#telephoneerror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('GMAP Location') > 0)
                            {
                                $('#gmaperror').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Address1') > 0)
                            {
                                $('#address1error').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Address2') > 0)
                            {
                                $('#address2error').html(d[i]).slideDown('3500');
                            }
                            if(d[i].search('Footer Line') > 0)
                            {
                                $('#footerlineerror').html(d[i]).slideDown('3500');
                            }
                        }
                    }
                    else if(response.code===1)
                    {
                        swal({
                            title:"Good Job",
                            text:"Successfully Updated",
                            type:"success",
                            allowOutsideClick: false,
                            animation: false,
                            customClass: 'animated tada'
                        });
                        $('.swal2-confirm').click(function(){
                            window.location.href="load_dashboard";
                        });
                    }
                }
            });
        }
    </script>
  </body>
</html>