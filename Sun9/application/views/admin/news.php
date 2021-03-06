<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>News</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App Icons -->
    <link rel="shortcut icon" href="<?php echo base_url()?>admin/assets/images/favicon.ico">

    <!-- Sweet Alert -->
    <link href="<?php echo base_url()?>admin/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <!-- Summernote css -->
    <link href="<?php echo base_url()?>admin/assets/plugins/summernote/summernote-bs4.css" rel="stylesheet" />

    <!-- Plugins css -->
    <link href="<?php echo base_url()?>admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>admin/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>admin/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

    <!-- App css -->
    <link href="<?php echo base_url()?>admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>admin/assets/css/style.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
        .button-8
        {
            width:140px;
            height:50px;
            border:2px solid #34495e;
            float:left;
            text-align:center;
            cursor:pointer;
            position:relative;
            box-sizing:border-box;
            overflow:hidden;
            margin:0 0 0px 0px;
            border-radius:10px;
        }
        .button-8 a
        {
            font-family:arial;
            font-size:16px;
            color:#fff;
            text-decoration:none;
            line-height:50px;
            transition:all .5s ease;
            z-index:2;
            position:relative;
        }
        .eff-8
        {
            width:140px;
            height:50px;
            border:70px solid #34495e;
            position:absolute;
            transition:all .5s ease;
            z-index:1;
            box-sizing:border-box;
        }
        .button-8:hover .eff-8
        {
            border:0px solid #34495e;
        }
        .button-8:hover a
        {
            color:#34495e;
        }
    </style>
</head>

<body class="fixed-left" id="top">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="wrapper">
        <?php 
            if($this->session->userdata('admintype')=="master")
            {
                $this->load->view('admin/adminheader');
            }
            else
            {
                $this->load->view('admin/subadminheader');
            }
        ?>

        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <?php 
                    $array['j']='Add News';
                    $this->load->view('admin/topheader',$array);
                ?>

                <div class="page-content-wrapper ">
                    <div class="container-fluid">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <form>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">News Title</label>
                                        <div class="col-sm-10">
                                            <div>
                                                <input type="text" name="newstitle" id="newstitle" class="form-control">
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">News</label>
                                        <div class="col-sm-10">
                                            <div>
                                                <div class="summernote" id="summer_note" name="summer_note"></div>
                                            </div>  
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <b><span id="maxContentPost" class="text-danger"></span></b>
                                        </div>
                                    </div> 

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">News</label>
                                        <div class="col-sm-2">
                                            <img src="<?php echo base_url();?>assets/uploads/news/noimg.png" height="150px" width="150px" id="npic" name="npic" style="border-radius:20px;">
                                        </div>
                                        <div class="col-sm-2">
                                            <div>
                                                <input type="file" name="newspic" id="newspic" class="form-control" style="display:none;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-2" id="newsdiv">
                                            <div class="button-8">
                                                <div class="eff-8"></div>
                                                <a href="#"> <i class="typcn typcn-upload-outline" style="font-size:20px;padding-right:10px;"></i>Upload </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-2">
                                            <button type="button" name="csubmit" value="csubmit" class="btn btn-info btn-block" id="submit" onclick="add_news()">Submit</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="button" name="cancel" value="Cancel" class="btn btn-info btn-block" onclick="edit_cancel()">
                                        </div>
                                    </div>
                      
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <footer class="footer">
                
            </footer>
        </div>
        <!-- End Right content here -->
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="<?php echo base_url()?>admin/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/popper.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/modernizr.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/waves.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/jquery.nicescroll.js"></script>
    <script src="<?php echo base_url()?>admin/assets/js/jquery.scrollTo.min.js"></script>

    <!-- Sweet-Alert  -->
    <script src="<?php echo base_url()?>admin/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/pages/sweet-alert.init.js"></script>

    <!-- Plugins js -->
    <script src="<?php echo base_url()?>admin/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>admin/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>

    <!-- Plugins Init js -->
    <script src="<?php echo base_url()?>admin/assets/pages/form-advanced.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url()?>admin/assets/js/app.js"></script>

    <?php 
        include('message.php');
    ?>

    <script type="text/javascript">
        $(function(){
            msg_count();
            noti_msg_count();
        });
        setInterval(function()
        {
            if(!$('#messageclick').hasClass('openornot'))
            {
                msg_count();
            }
            else
            {
                $('#messagecount').html('');
            }
            load_message_data();
            if(!$('#notificationclick').hasClass('openornot'))
            {
                noti_msg_count();
            }
            else
            {
                $('#notificationcount').html('');
            }
            load_notification_data();
        },1000);
    </script>
        
    <script type="text/javascript">
        var npic='';
        var total_images;

        $(document).ready(function() {
            $("#newstitle").focus();
        });

        function registerSummernote(element, placeholder, max, callbackMax) {
            $(element).summernote({
                height: 300,
               toolbar: [
                            [ 'style', [ 'style' ] ],
                            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
                            [ 'fontname', [ 'fontname' ] ],
                            [ 'fontsize', [ 'fontsize' ] ],
                            [ 'color', [ 'color' ] ],
                        ],


              callbacks: {
                onKeydown: function(e) {
                  var t = e.currentTarget.innerText;
                  if (t.trim().length >= max) {
                    //delete key
                    if (e.keyCode != 8)
                      e.preventDefault();
                    // add other keys ...
                  }
                },
                onKeyup: function(e) {
                  var t = e.currentTarget.innerText;
                  if (typeof callbackMax == 'function') {
                    callbackMax(max - t.trim().length);
                  }
                },
                onPaste: function(e) {
                  var t = e.currentTarget.innerText;
                  var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                  e.preventDefault();
                  var all = t + bufferText;
                  document.execCommand('insertText', false, all.trim().substring(0, 400));
                  if (typeof callbackMax == 'function') {
                    callbackMax(max - t.length);
                  }
                }
              }
            });
          }

        $(function(){
          registerSummernote('.summernote', 'Leave a comment', 400, function(max) {
            $('#maxContentPost').text('Remaining:'+max)
          });
            
            $('#newspic').change(function(){
                npic = $('#newspic')[0].files[0];
                previewnews();
            });

            $('#newsdiv').click(function()
            {   
                $('#newspic').click();
            });
        });
        function previewnews()
        {
            total_images = $("body img").length;
            var preview = document.querySelectorAll('img')[total_images-1];
            var file    = ($("#newspic"))[0].files[0];
            var reader  = new FileReader();
            reader.addEventListener("load", function ()
            {
                preview.src = reader.result;
            }, false);

            if(file){
                reader.readAsDataURL(file);
            }   
        }

        function add_news()
        {
            var summernote=$('#summer_note').summernote('code');
            var newstitle=$('#newstitle').val();
            var fd=new FormData();

            fd.append('summernote',summernote);
            fd.append('newstitle',newstitle);

            if(document.getElementById("newspic").files.length != 0)
            {
                fd.append('npic',npic);
            }
            else
            {   
                fd.append('npic','');
            }
            if(summernote!=='<p><br></p>' && npic!=='')
            {
             $.ajax({
                    url : "<?php echo site_url('Controller/addnews'); ?>",
                    data : fd,
                    dataType : "JSON",
                    type : "POST",
                    processData:false,
                    contentType:false,

                    success : function(response)
                    {
                        console.log(response);
                        if(response.msg=='The News picture field is required')
                        {
                            swal({
                            title:"Opps..",
                            text:"<span style='font-size:20px;font-weight:bold;'>Please select Picture According News...</span>",
                            type:"error"
                            });
                        }
                        else
                        {
                            swal({
                            title:"Good Job",
                            text:"<span style='font-size:20px;font-weight:bold;'>Successfully Inserted...</span>",
                            type:"success"
                            });
                            $('.swal2-confirm').click(function(){
                                window.location.href='load_newseventslist';
                            });
                        }
                    
                    }
                
                });
                }
                else if(summernote=='<p><br></p>' && npic=='' && newstitle=='')
                {
                    swal({
                        title:"Opps..",
                        text:"<span style='font-size:20px;font-weight:bold;'>Please Enter the News Title...<br>Please Enter the News...<br>Please Select the Picture...</span>",
                        type:"error"
                        });
                    
                }
                else if(summernote=='<p><br></p>' && npic=='')
                {
                    swal({
                        title:"Opps..",
                        text:"<span style='font-size:20px;font-weight:bold;'>Please Enter the News...<br>Please Select the Picture...</span>",
                        type:"error"
                        });
                    
                }
                else if(summernote=='<p><br></p>' && newstitle=='')
                {
                    swal({
                        title:"Opps..",
                        text:"<span style='font-size:20px;font-weight:bold;'>Please Enter the News Title...<br>Please Enter the News...</span>",
                        type:"error"
                        });
                    
                }
                else if(npic=='' && newstitle=='')
                {
                    swal({
                        title:"Opps..",
                        text:"<span style='font-size:20px;font-weight:bold;'>Please Enter the News Title...<br>Please Select the Picture...</span>",
                        type:"error"
                        });
                    
                }
                else if(npic=='')
                {
                    swal({
                    title:"Opps..",
                    text:"<span style='font-size:20px;font-weight:bold;'>Please Select the Picture...</span>",
                    type:"error"
                    });
                }
                else if(newstitle=='')
                {
                    swal({
                    title:"Opps..",
                    text:"<span style='font-size:20px;font-weight:bold;'>Please Enter the News Title...</span>",
                    type:"error"
                    });
                }
                else
                {
                      swal({
                    title:"Opps..",
                    text:"<span style='font-size:20px;font-weight:bold;'>Please Enter the News...</span>",
                    type:"error"
                    });   
                }
        }

        function edit_cancel()
        {
            window.location.href="load_newseventslist";
        }
    </script>
    <!--Summernote js-->
    <script src="<?php echo base_url()?>admin/assets/js/summernote.js"></script>
</body>
</html>