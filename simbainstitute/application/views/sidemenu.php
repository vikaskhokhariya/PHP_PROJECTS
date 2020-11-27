<?php 
    /*Reminder*/
    $reminder = $this->db->query("SELECT * FROM `tbl_enquiry_reminder` WHERE STR_TO_DATE(reminder_date,'%m/%d/%Y') <= current_date and status = 1")->result();
    $totalreminder = count($reminder);

    /*Birthday*/
    $birthday=$this->db->query("SELECT * FROM tbl_enroll_student WHERE DATE_FORMAT(STR_TO_DATE(birthdate,'%m/%d'),'%m/%d') = DATE_FORMAT(CURRENT_DATE,'%m/%d')")->result();
    $totalbirthday = count($birthday);
?>

<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="text-center">
                <img src="<?php echo base_url(); ?>logo.png" alt="Simba Logo" style="height:50px;width:150px;">
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="nav-devider"></li>
            <li class="header nav-small-cap">PERSONAL</li>
            <li class="<?php if($active['main']=="dashboard"){echo "active";} ?>">
                <a href="<?php echo base_url(); ?>Simba">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview <?php if($active['main']=="studentenquiry"){echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-graduation-cap"></i>
                    <span>Student Enquiry</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($active['whichactive']=="enquiry"){echo 'active';} ?>">
                        <a href="<?php echo base_url(); ?>Student/Student_Enquiry">Enquiry</a>
                    </li>
                    <li class="<?php if($active['whichactive']=="enquirylist"){echo 'active';} ?>">
                        <a href="<?php echo base_url(); ?>Student/Enquiry_List">Enquiry List</a>
                    </li>
                    <li class="<?php if($active['whichactive']=="cancelenquirylist"){echo 'active';} ?>">
                        <a href="<?php echo base_url(); ?>Student/Cancel_Enquiry_List">Cancel Enquiry List</a>
                    </li>
                </ul>
            </li>

            <li class="treeview <?php if($active['main']=="demo"){echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                    <span>Demo Students</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($active['whichactive']=="demolist"){echo 'active';} ?>">
                        <a href="<?php echo base_url(); ?>Demo/Demo_List">Demo Students List</a>
                    </li>
                    <li class="<?php if($active['whichactive']=="canceldemolist"){echo 'active';} ?>">
                        <a href="<?php echo base_url(); ?>Demo/Cancel_Demo_List">Cancel Demo Students</a>
                    </li>
                </ul>
            </li>

            <li class="treeview <?php if($active['main']=="enrollstudent"){echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Enroll Student</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($active['whichactive']=="enroll"){echo 'active';} ?>">
                        <a href="<?php echo base_url(); ?>Enroll/Enroll_Student">Enroll Student</a>
                    </li>
                    <li class="<?php if($active['whichactive']=="enrolllist"){echo 'active';} ?>">
                        <a href="<?php echo base_url(); ?>Enroll/Enroll_studentlist">Enroll Student List</a>
                    </li>
                </ul>
            </li> 

            <li class="treeview <?php if($active['main']=="fees"){echo "active";} ?>">
                <a href="#">
                    <i class="fa fa-inr"></i>
                    <span>Fees</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($active['whichactive']=="payfees"){echo 'active';} ?>">
                        <a href="<?php echo base_url(); ?>Fees/Fees_Pay">Fees Pay</a>
                    </li>
                    <li class="<?php if($active['whichactive']=="feeslist"){echo 'active';} ?>">
                        <a href="<?php echo base_url(); ?>Fees/Fees_List">Fees List</a>
                    </li>
                    <li class="<?php if($active['whichactive']=="feesstatus"){echo 'active';} ?>">
                        <a href="<?php echo base_url(); ?>Fees/Fees_status_List">Fees Status</a>
                    </li>
                </ul>
            </li> 

            <li class="<?php if($active['main']=="remember"){echo "active";} ?>">
                <a href="<?php echo base_url(); ?>Reminder/Enquiry_reminder">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    <span>Enquiry Remember</span>
                    <?php 
                        if($totalreminder != 0)
                        {
                            ?>
                            <span class="pull-right-container" style="margin-top:-12px;">
                                <span class="badge badge-pill badge-danger">
                                    <?php echo $totalreminder; ?>
                                </span>
                            </span>
                            <?php
                        }
                    ?>
                </a>
            </li>

            <li class="<?php if($active['main']=="birthday"){echo "active";} ?>">
                <a href="<?php echo base_url(); ?>Birthday/Birthday_List">
                    <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                    <span>Birthday</span>
                    <?php 
                    if($totalbirthday != 0)
                    {
                        ?>
                        <span class="pull-right-container" style="margin-top:-12px;">
                            <span class="badge badge-pill badge-info">
                                <?php echo $totalbirthday; ?>
                            </span>
                        </span>
                        <?php
                    }
                    ?>
                </a>
            </li>

            <?php 
            if($this->session->userdata('role')=='Admin')
            {
                ?>
                <li class="treeview <?php if($active['main']=="course"){echo "active";} ?>">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Course</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($active['whichactive']=="addcourse"){echo 'active';} ?>">
                            <a href="<?php echo base_url(); ?>Course/New_course">Add Course</a>
                        </li>
                        <li class="<?php if($active['whichactive']=="courselist"){echo 'active';} ?>">
                            <a href="<?php echo base_url(); ?>Course/Course_List">Course List</a>
                        </li>
                    </ul>
                </li> 

                <li class="treeview <?php if($active['main']=="expence"){echo "active";} ?>">
                    <a href="#">
                        <i class="fa fa-frown-o" aria-hidden="true"></i>
                        <span>Expence</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($active['whichactive']=="newexpence"){echo 'active';} ?>">
                            <a href="<?php echo base_url(); ?>Expence/New_Expence">New Expence</a>
                        </li>
                        <li class="<?php if($active['whichactive']=="expencelist"){echo 'active';} ?>">
                            <a href="<?php echo base_url(); ?>Expence/Expence_List">Expence List</a>
                        </li>
                        <li class="<?php if($active['whichactive']=="expencecategory"){echo 'active';} ?>">
                            <a href="<?php echo base_url(); ?>Expence/New_Expence_Category">New Expence Category</a>
                        </li>
                        <li class="<?php if($active['whichactive']=="expencecategorylist"){echo 'active';} ?>">
                            <a href="<?php echo base_url(); ?>Expence/Expence_Category_List">Expence Category List</a>
                        </li>
                    </ul>
                </li> 

                <li class="treeview <?php if($active['main']=="account"){echo "active";} ?>">
                    <a href="#">
                        <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
                        <span>Account</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($active['whichactive']=="totalexpence"){echo 'active';} ?>">
                            <a href="<?php echo base_url(); ?>Account/Total_Expence">Expence</a>
                        </li>
                        <li class="<?php if($active['whichactive']=="totalincome"){echo 'active';} ?>">
                            <a href="<?php echo base_url(); ?>Account/Total_Income">Income</a>
                        </li>
                        <li class="<?php if($active['whichactive']=="summary"){echo 'active';} ?>">
                            <a href="<?php echo base_url(); ?>Account/Account_Summary">Summary</a>
                        </li>
                    </ul>
                </li> 
                <?php 
            }
            ?>        
        </ul>
    </section>
</aside>