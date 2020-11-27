<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        .error
        {
            color:#A8413F;
            font-size:15px;
        }
    </style>
    <?php 
        $this->load->view("linktop.php");
    ?>  
</head>

<body class="hold-transition skin-yellow sidebar-mini">
    <div class="wrapper">  
        <?php 
            $this->load->view("topheader");
            $this->load->view("sidemenu");
        ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Edit Student Enquiry
                </h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url(); ?>Simba">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </a>
                    </li>
                </ol>
            </section>

            <section class="content">
                <div class="row">           
                    <div class="box box-solid bg-dark">
                        <div class="box-header with-border">
                            <h3 class="box-title">Remember Me</h3>
                        </div>

                        <div class="box-body">
                            <form action="#" class="">
                                <section class="bg-hexagons-dark">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Remember Date:</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control pull-right" id="datepicker" value="<?php echo date("m/d/Y"); ?>" autocomplete="off">
                                                </div>
                                                <div class="error" id="errorrememberdate"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Detail :</label>
                                                <textarea id="rememberdetail" class="form-control" rows="4" placeholder="Enter Detail of Remember"></textarea>
                                                <div class="error" id="errorrememberdetail"></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </section>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <button type="button" id="sbmt" class="btn btn-block btn-info pull-left btn-lg text-center">Submit</button>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-block btn-lg text-center btn-danger">Cancel</button>
                    </div>
                </div>
        	</section>
        </div>
      
        <?php 
            $this->load->view("footer");
        ?>
        <div class="control-sidebar-bg"></div>
    </div>
      		 
    <?php 
        $this->load->view("linkbottom");
    ?>

    <script type="text/javascript">
        $('#sbmt').click(function(){
            var rememberdate = $('#datepicker').val();
            var rememberdetail = $('#rememberdetail').val();

            var f = new FormData();
            f.append('rememberdate',rememberdate);
            f.append('rememberdetail',rememberdetail);

            for(var i of f.values())
            {
                console.log(i);
            }

            var reminderid = '<?php echo $reminderid['reminderid']; ?>';
            $.ajax({
                url:"<?php echo base_url(); ?>Reminder/Edit_reminder_enquiry/"+reminderid,
                data:f,
                dataType:"JSON",
                type:"POST",
                processData:false,
                contentType:false,
                success : function(response)
                {
                    console.log(response);
                    if(response.code==0)
                    {
                        swal({
                            title:"Opps..",
                            text:"Please Correct the Errors",
                            type:"error",
                            allowOutsideClick: false,
                            animation: false,
                            customClass: 'animated tada'
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
                            if(d[i].search('Reminder Date') > 0)
                            {
                                $('#errorrememberdate').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                            }
                            if(d[i].search('Reminder Detail') > 0)
                            {
                                $('#errorrememberdetail').html(d[i]).slideDown('slow').delay(4000).slideUp(1000);
                            }
                        }    
                    }
                    else
                    {
                        swal({
                            title:"Good Job",
                            text:"SuccessFully Inserted",
                            type:"success",
                            allowOutsideClick: false,
                            animation: false,
                            customClass: 'animated tada'
                        });
                        $('.swal2-confirm').click(function(){
                            window.location.href='<?php echo base_url(); ?>Reminder/Enquiry_reminder';
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>
