<?php 


?>
<!DOCTYPE html>
<html>

	<!-- Page head --------------------------------------->
	<?php include 'head.php';?>
	<!--# end Page Loader -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">


    <style type="text/css">
.liveserchlist{
    background-color: #eee;
    cursor: pointer;
}

.liveserchlist li{
    padding:12px;
}

</style>
	
<body class="theme-blue">

    <!-- Page Loader ------------------------------------>
	<?php include 'preloader.php';?>
    <!-- #END# Page Loader -->
	
    <!-- Overlay For Sidebars --------------------------->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
	
    <!-- Search Bar ------------------------------------->
    <?php include 'searchbar.php';?>
    <!-- #END# Search Bar -->
	
    <!-- Top Bar ---------------------------------------->
    <?php include 'topnav.php';?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -------------------------------->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info ---------------------->
			<?php include 'userinfo.php';?>
            <!-- #User Info -->
			
            <!-- Menu --------------------------->
			<?php include 'menu.php';?>
            <!-- #Menu -->
			
            <!-- Footer ------------------------->
            <?php include 'footer.php';?>
            <!-- #Footer -->

            <?php include 'includes/dbh.php';?>

            
			
        </aside>
        <!-- #END# Left Sidebar -->
		
        <!-- Right Sidebar ----------------------------->
        <?php include 'rightsidebar.php';?>
        <!-- #END# Right Sidebar -->
		
    </section>


    <section class="content">
    <!-- Main page content  ----------------------------->

        <div class="container-fluid">
            <div class="row clearfix js-sweetalert">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 align="center"><b>SEARCH STAFF MEMBER</h2></b>
                        <div class = "col-sm-9"></div>
                    </div>
                            
                    <div class = "body">
                        <form method = "post">
                    <h2 class="card-inside-title">SEARCH</h2>
                            
                            
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class = "form-control">SERACH BY ID*</div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="search" name="search" plcaeholder="SMXXXX123456" class="form-control" required>
                                </div>
                                <p id="searchList"></p>
                            </div>
                        </div>
                    </div>
                     <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>                

                    <div class = "col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input type = "submit" class="btn bg-blue btn-block waves-effect" name="submit_search" value = "SEARCH STAFF MEMBER"/>
                    </div>

                    <br><br>
                    </form> 
                </div>
            </div>
        </div>
    </section>

            <?php

             if(isset($_POST['submit_search']))
             {

                $search = mysqli_real_escape_string($conn, $_POST['search']);

                $sql = "SELECT * FROM staff  LEFT JOIN salary ON (staff.staffID = salary.staffID) LEFT JOIN staffbankdetails ON (staff.staffID = staffbankdetails.staffID) LEFT JOIN staffcontact ON (staff.staffID = staffcontact.staffID)  WHERE staff.staffID LIKE ? OR nameInFull LIKE ?";

                //LEFT JOIN dependents ON (staff.staffID = dependents.staffID)

                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    echo "SQL satement failed";
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "ss", $search, $search);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);


                 while($rows = mysqli_fetch_assoc($result))
                    {

                    
                            $emp_id = $rows['staffID'];        
                          

                ?>
    
    <section class="content">
    <!-- Main page content  ----------------------------->
        <div class="container-fluid">
                <div class="row clearfix js-sweetalert">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 align="center"><b>ADD A NEW STAFF MEMBER</h2></b>
                            <div class = "col-sm-9"></div>
                        </div>
                            
                        <div class = "body">
                            <form >
                            <h2 class="card-inside-title">Personal Details</h2>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class = "form-control">ID*</div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                           <input type="text" class="form-control" name="emp_id" value="<?php echo $rows['staffID']; ?>" title="This field should contain 12 chracters. eg:SFXXXXXX123456" minlength="12" maxlength="12"pattern="([S][F][A-Z][A-Z][A-Z][A-Z][0-9][0-9][0-9][0-9][0-9][0-9])" placeholder="SFXXXXXX123456" required>
                                        <div class="help-info">Ex: SFXXXXXX123456</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class = "form-control">
                                        Full name*
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="name" class="form-control" name="full_name" minlength="10"  value="<?php echo $rows['nameInFull']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                        
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class = "form-control">
                                        Gender
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                           <div class="demo-radio-button" >
                                                <input name="gender" type="radio" class="with-gap" id="radio_3" value="M" checked>
                                                <label for="radio_3">Male</label>
                                                <input name="gender" type="radio" id="radio_4" class="with-gap" value="F">
                                                <label for="radio_4">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class = "form-control">
                                        National ID*
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nic" minlength="10" maxlength="10" placeholder="123456789V" value="<?php echo $rows['nic'];?>"required>
                                            <div class="help-info">Ex: 123456789V</div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <div class = "form-control">
                                            Date of birth*
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <input type="date" class="form-control" name="dob" value="<?php echo $rows['dob'];?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>                      
                              
                    </div>
                </div>
            <hr>
            


    </div>
    <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">

                            <h2 class="card-inside-title">
                                Employment Details
                          
                            </h2>
                                                        <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class = "form-control">
                                    Position*
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">

                                            <?php
                                                $p =  $rows['post'];
                                                if($p == 'accountant'){
                                            ?>
                                            <select class="form-control show-tick" name="position" form="myform" required>
                                                <option value="accountant" name="accountant" selected="selected" >Accountant</option>
                                                <option value="branchAdmin" name="branchAdmin">Branch Admin</option>
                                                <option value="lecturer" name="lecturer">Lecturer</option>
                                                <option value="receptionst" name="receptionst">Receptionst</option>
                                            </select>
                                            <?php
                                                }elseif($p == 'branchAdmin'){

                                            ?>
                                            <select class="form-control show-tick" name="position" form="myform" required>
                                                <option value="accountant" name="accountant"  >Accountant</option>
                                                <option value="branchAdmin" name="branchAdmin" selected="selected">Branch Admin</option>
                                                <option value="lecturer" name="lecturer">Lecturer</option>
                                                <option value="receptionst" name="receptionst">Receptionst</option>
                                            </select>
                                            <?php
                                                  }elseif($p == 'lecturer'){

                                            ?>
                                            <select class="form-control show-tick" name="position" form="myform" required>
                                                <option value="accountant" name="accountant" selected="selected" >Accountant</option>
                                                <option value="branchAdmin" name="branchAdmin">Branch Admin</option>
                                                <option value="lecturer" name="lecturer" selected="selected">Lecturer</option>
                                                <option value="receptionst" name="receptionst">Receptionst</option>
                                            </select>
                                                              <?php
                                             }elseif($p == 'receptionst'){

                                            ?>

                                            <select class="form-control show-tick" name="position" form="myform" required>
                                                <option value="accountant" name="accountant" selected="selected" >Accountant</option>
                                                <option value="branchAdmin" name="branchAdmin">Branch Admin</option>
                                                <option value="lecturer" name="lecturer">Lecturer</option>
                                                <option value="receptionst" name="receptionst" selected="selected">Receptionst</option>
                                            </select>

                                            <?php
                                                }else
                                                {

                                            ?>
                                                <select class="form-control show-tick" name="position" form="myform" required>
                                                    <option value="accountant" name="accountant" selected="selected" >Accountant</option>
                                                    <option value="branchAdmin" name="branchAdmin">Branch Admin</option>
                                                    <option value="lecturer" name="lecturer">Lecturer</option>
                                                    <option value="receptionst" name="receptionst">Receptionst</option>
                                                </select>

                                            <?php
                                                }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class = "form-control">
                                    Date joined*
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control" name="date_join" value="<?php echo $rows['datejoined'];?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class = "form-control">
                                    managed_by*
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="managed_by" value="<?php echo $rows['managedBy']; ?>" title="This field should contain 12 chracters. eg:SFXXXXXX123456" minlength="12" maxlength="12" required>
                                            <div class="help-info">Ex: SFXXXXXX123456</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                        <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class = "form-control">
                                    Job Type*
                               
                                </div>
                            </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">

                                            <?php
                                                $jt = $rows['jobtype'];
                                                if($jt == 'permenent'){

                                            ?>

                                            <select class="form-control show-tick" name="job_type" form="myform" required>
                                                <option value="permenent" selected="selected">permenent</option>
                                                <option value="contract">contract</option>
                                                <option value="partTime">Part time</option>
                                                <option value="internship">Internship</option>
                                            </select>

                                            <?php
                                        }elseif($jt == 'contract'){

                                            ?>

                                            <select class="form-control show-tick" name="job_type" form="myform" required>
                                                <option value="permenent" >permenent</option>
                                                <option value="contract" selected="selected">contract</option>
                                                <option value="partTime">Part time</option>
                                                <option value="internship">Internship</option>
                                            </select>

                                            <?php 

                                        }elseif($jt == 'partTime'){

                                            ?>

                                             <select class="form-control show-tick" name="job_type" form="myform" required>
                                                <option value="permenent" >permenent</option>
                                                <option value="contract">contract</option>
                                                <option value="partTime" selected="selected">Part time</option>
                                                <option value="internship">Internship</option>
                                            </select>

                                            <?php

                                                }elseif($jt == 'internship'){

                                                    ?>

                                            <select class="form-control show-tick" name="job_type" form="myform" required>
                                                <option value="permenent" >permenent</option>
                                                <option value="contract">contract</option>
                                                <option value="partTime">Part time</option>
                                                <option value="internship" selected="selected">Internship</option>
                                            </select>

                                            <?php
                                                
                                            }else{
                                                
                                                ?>

                                            <select class="form-control show-tick" name="job_type" form="myform" required>
                                                <option value="<?php echo $jt; ?>" selected="selected" ><?php echo $jt; ?></option>
                                                <option value="permenent" >permenent</option>
                                                <option value="contract">contract</option>
                                                <option value="partTime">Part time</option>
                                                <option value="internship" >Internship</option>
                                            </select>
                                            <?php


                                            }

                                            ?>



                                        </div>
                                    </div>
                                </div>
                            </div>
                      
                                                        <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class = "form-control">
                                    Job Status*
                                    </div>
                                </div>
                               <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">

                                            <?php 

                                                $jobstat =  $rows['jobstatus'];

                                                if($jobstat == 'confirmed'){
                                            ?>
                                            <select class="form-control show-tick" name="job_status" form="myform" required>
                                                <option value="confirmed" selected="selected">Confirmed</option>
                                                <option value="probation">Probation</option>
                                                <option value="resigned">Resigned</option>
                                                <option value="dismissed">Dismissed</option>
                                                <option value="retired">Retired</option>
                                            </select>
                                            <?php
                                                }elseif($jobstat == 'probation'){
                                            ?>

                                            <select class="form-control show-tick" name="job_status" form="myform" required>
                                                <option value="confirmed" >Confirmed</option>
                                                <option value="probation" selected="selected">Probation</option>
                                                <option value="resigned">Resigned</option>
                                                <option value="dismissed">Dismissed</option>
                                                <option value="retired">Retired</option>
                                            </select>

                                            <?php

                                        }elseif($jobstat == 'resigned'){

                                            ?>

                                            <select class="form-control show-tick" name="job_status" form="myform" required>
                                                <option value="confirmed" >Confirmed</option>
                                                <option value="probation">Probation</option>
                                                <option value="resigned" selected="selected">Resigned</option>
                                                <option value="dismissed">Dismissed</option>
                                                <option value="retired">Retired</option>
                                            </select>


                                            <?php

                                        }elseif($jobstat == 'dismissed'){

                                            ?>

                                             <select class="form-control show-tick" name="job_status" form="myform" required>
                                                <option value="confirmed" >Confirmed</option>
                                                <option value="probation">Probation</option>
                                                <option value="resigned">Resigned</option>
                                                <option value="dismissed" selected="selected">Dismissed</option>
                                                <option value="retired">Retired</option>
                                            </select>

                                            <?php

                                            }elseif($jobstat == 'retired'){

                                                ?>

                                            <select class="form-control show-tick" name="job_status" form="myform" required>
                                                <option value="confirmed" >Confirmed</option>
                                                <option value="probation">Probation</option>
                                                <option value="resigned">Resigned</option>
                                                <option value="dismissed">Dismissed</option>
                                                <option value="retired" selected="selected">Retired</option>
                                            </select>

                                            <?php

                                            }else{
                                                //do nothing
                                            }



                                            ?>


                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
    

    <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">

                            <h2 class="card-inside-title">
                                Contact
                          
                            </h2>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class = "form-control">
                                    Web
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" class="form-control" name="email"  value="<?php echo $rows['email']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class = "form-control">
                                    Phone
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="phone" minlength="10" maxlength="10" value="<?php echo $rows['officephone']; ?> "required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class = "form-control">
                                    Address
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="address" value="<?php echo $rows['address']; ?> "required>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                        <br/><br/>
                    </div>
                                
                    <?php 

                        }
                    }

                    }
                    ?>

                      </form>              

                </div>
                </div>
        
            </div>
        </div>
    </div>

        
    </section>


	<script>
        
        $(document).ready(function(){
            $("#search").keyup(function(){
                var name = $("#search").val();
                if( this.value.length < 4 ) return;
                    $.post("liveserachdata.php",{
                        suggestion: name
                        }, function(data,status){
                            $("#searchList").fadeIn();
                            $("#searchList").html(data);
                        });
                });
        });

        $(document).on('click', 'li', function(){
            $("#search").val($(this).text());
            $("#searchList").fadeOut();
        });

    </script>
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
