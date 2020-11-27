<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<head>
    <?php 
        include('linktop.php');
    ?>
    <script type="text/javascript">
        /*function preventback()
        {
            window.history.forward();
        }
        setTimeout("preventback()",0);
        window.onunload=function(){null};*/
    </script>
</head>
  
<body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-color="bg-gradient-x-purple-red" data-col="1-column">

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                            <div class="card-header border-0">
                                <div class="text-center mb-1">
                                    <img src="<?php echo base_url(); ?><?php echo $result[0]->web_logo; ?>" alt="branding logo">
                                </div>
                                <div class="font-large-1  text-center">                       
                                    Admin Login
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div id="alert"></div>
                                    
                                    <form class="form-horizontal" action="https://themeselection.com/demo/chameleon-admin-template/html/ltr/vertical-modern-menu-template/index.html" novalidate>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control round" id="email" placeholder="Your Username" autocomplete="off" autofocus="">
                                            <div class="form-control-position">
                                                <i class="ft-user"></i>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control round" id="password" placeholder="Enter Password" autocomplete="off">
                                            <div class="form-control-position">
                                                <i class="ft-lock"></i>
                                            </div>
                                        </fieldset>
                                        <div class="form-group text-center">
                                            <input type="button" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1" value="Login" id="sellerlogin">    
                                        </div>
                                       
                                    </form>
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
        include('linkbottom.php');
    ?>
</body>

</html>