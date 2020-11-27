<?php $generalsetting=$this->Model->model_select('generalsettings');?>
<nav class="ct-menuMobile">
    <ul class="ct-menuMobile-navbar">
        <li class="dropdown">
            <a href="<?php echo base_url();?>index.php/Controller/user">
                Home
            </a>
        </li>
        <li class="dropdown">
            <a href="<?php echo base_url();?>index.php/Controller/load_introduction">
                Introduction
            </a>
        </li>
        <li class="dropdown">
            <a href="<?php echo base_url();?>index.php/Controller/load_ourprojects">
                Our Projects
            </a>
        </li>
        <li class="dropdown">
            <a href="<?php echo base_url();?>index.php/Controller/load_contactus">
                Contact Us
            </a>
        </li>
         <li class="dropdown">
            <?php
                if($this->session->userdata('custname'))
                {
            ?>
            <a href="<?php echo base_url();?>index.php/Controller/logoutcust"><span style="font-size: 20px;"> <i class="ion-power" style="font-size: 20px;"></i> Log out</span></a>
            <?php
                }
                else
                {
            ?>
                <a href="<?php echo base_url();?>index.php/Controller/load_loginpage"><span style="font-size: 20px;"> <i class="fa fa-user" style="font-size: 20px;"></i> Log In</span></a>
                <?php
                    }
                ?>
        </li>
    </ul>
</nav>

<form class="ct-searchFormMobile ct-u-marginBottom50" role="form">
    <div class="form-group ">
        <div class="ct-form--label--type1">
            <div class="ct-u-displayTableVertical">
                <div class="ct-u-displayTableCell">
                    <div class="ct-input-group-btn">
                        <button class="btn btn-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="ct-u-displayTableCell text-center">
                    <span class="text-uppercase">Search for property</span>
                </div>
            </div>
        </div>
        <div class="ct-u-displayTableVertical ct-u-marginBottom20">
            <div class="alert alert-danger col-sm-6" role="alert" id="searchalert">
                <strong>Opps!!!</strong> Please fill at lease one field...
            </div>
            <div class="ct-u-displayTableVertical ct-u-marginBottom20">
                <div class="ct-u-displayTableCell">
                    <?php 
                        $res=$this->Model->model_select_state('state');
                    ?>
                    <div class="ct-form--item">
                        <label>State</label>
                        <input type="text" class="form-control input-lg" autocomplete="off" id="state">
                    </div>
                </div>
                <div class="ct-u-displayTableCell">
                    <div class="ct-form--item">
                        <label>City</label>
                        <input type="text" class="form-control input-lg" autocomplete="off" id="city">
                    </div>
                </div>
            </div>
            <div class="ct-u-displayTableVertical ct-slider--row ct-sliderAmount">
                <div class="ct-u-displayTableCell">
                    <div class="ct-form--item">
                        <label>Property Price (&#x20b9;)</label>
                        <input type="text" value="0" class="form-control input-lg ct-js-slider-min" id="minprice">
                    </div>
                </div>
                <div class="ct-u-displayTableCell">
                    <input type="text" class="slider ct-js-sliderAmount" value="" data-slider-tooltip="hide" data-slider-handle="square" data-slider-min="50000" data-slider-max="10000000" data-slider-step="1000" data-slider-value="[1000,100000]" style="">
                    <label>Min</label>
                    <label class="pull-right">Max</label>
                </div>
                <div class="ct-u-displayTableCell">
                    <div class="ct-form--item">
                        <input type="text" value="0" class="form-control input-lg ct-js-slider-max" id="maxprice">
                    </div>
                </div>
                <div class="ct-u-displayTableCell">
                    <button type="button" class="btn btn-warning text-capitalize pull-right" id="searchproperty">Search Property</button>
                </div>
            </div>
        </div>
    </div>
</form>


<div id="ct-js-wrapper" class="ct-pageWrapper">

<div class="ct-navbarMobile">
    <button type="button" class="navbar-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href=""><img src="<?php echo base_url();?>assets/uploads/logo/<?php echo $generalsetting[0]->logo; ?>" alt="Estato"> </a>
    <button type="button" class="searchForm-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span><i class="fa fa-search"></i></span>
    </button>
</div>
