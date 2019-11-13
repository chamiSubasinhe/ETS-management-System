<?php
		
?>
<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	<?php
		if(isset($_POST['submit']{	
		$nameWithInit=mysql_real_escape_string($_POST['fname']);
		$nameDenoted=mysql_real_escape_string($_POST['lname']);
		$gender=mysql_real_escape_string($_POST['gender']);
		
			$insertstudent="INSERT INTO student(nameWithInit,nameDenoted,gender) VALUES ('{$Namewithinitial}'],'{$Namedenotedbyinitial}',{$gender})";
			$result=mysqli_query($conn,$insertstudent);
			if($result){
				echo"1 Record  added";
			}
			else{
				echo"";
			}
			
		}
	
	?>

<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->

<!DOCTYPE html>
<html>

	<!-- Page head --------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Loader -->
	
	<body class="theme-red">
	<!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />


    <!-- Page Loader ------------------------------------>
	<?php include 'static/preloader.php';?>
    <!-- #END# Page Loader -->
	
    <!-- Overlay For Sidebars --------------------------->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
	
    <!-- Search Bar ------------------------------------->
    <?php include 'static/searchbar.php';?>
    <!-- #END# Search Bar -->
	
    <!-- Top Bar ---------------------------------------->
    <?php include 'static/topnav.php';?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -------------------------------->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info ---------------------->
			<?php include 'static/userinfo.php';?>
            <!-- #User Info -->
			
            <!-- Menu --------------------------->
			<?php include 'static/menu.php';?>
            <!-- #Menu -->
			
            <!-- Footer ------------------------->
            <?php include 'static/footer.php';?>
            <!-- #Footer -->
			
        </aside>
        <!-- #END# Left Sidebar -->
		
        <!-- Right Sidebar ----------------------------->
        <?php include 'static/rightsidebar.php';?>
        <!-- #END# Right Sidebar -->
		
    </section>

	
	
	
    <section class="content">
	<!-- Main page content  ----------------------------->
        
                      <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><font color="green" style="bold">
							STUDENT REGISTATION INFORMATION</h2></font>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form id="wizard_with_validation" action="addstudent.php" method="POST">
                                <h3>
								Student Basic Information</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="fname" id="fname" required>
                                            <label class="form-label">Name with initials</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="lname" id="lname" required>
                                            <label class="form-label">Name denoted by initials</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="Date" class="form-control" name="DOB" required>
                                            <label class="form-label">Date of Birth</label>
                                        </div>
                                    </div>
									
									<div class="form-group form-float">
									<div class="form-line">
                                    <input type="radio" name="gender" id="male" class="with-gap">
                                    <label for="male">Male</label>

                                    <input type="radio" name="gender" id="female" class="with-gap">
                                    <label for="female" class="m-l-20">Female</label>
                                </div>
								</div>
                                </fieldset>

                                <h3>Contact Information</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="NIC" class="form-control" required>
                                            <label class="form-label">NIC</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                       <div class="form-line">
                                      <input type="text" class="form-control mobile-phone-number"  name="ph" placeholder="Ex: +00 (000) 000-00-00">
                                        <label class="form-label">Mobile phone number</label>
                                            </div>
                                        </div>
                                 <div class="form-group form-float">
                                       <div class="form-line">
                                      <input type="text" class="form-control mobile-phone-number" nmae="rph" placeholder="Ex: +00 (000) 000-00-00">
                                        <label class="form-label">Residence</label>
                                            </div>
                                        </div>
                                        
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" name="email" class="form-control" required>
                                            <label class="form-label">Email</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea name="address" cols="30" rows="3" name="add" class="form-control no-resize" required></textarea>
                                            <label class="form-label">Address</label>
                                        </div>
                                    </div>
									<div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="Date" class="form-control" name="date" required>
                                            <label class="form-label">Register Date</label>
                                        </div>
                                    </div>
                                    
                                </fieldset>

                                <h3>Terms & Conditions - Finish</h3>
                                <fieldset>
								<div class="form-group form-float">
                                        <div class="form-line">
										<input type="text" class="form-control" name="scl" required>
                                        <label class="form-label">School</label>
                                        </div>
                                    </div>
									<div class="form-group form-float">
									<div class="form-line">
									<div class="form-group">
								<div class="demo-checkbox">
                                <input type="checkbox" id="ch1" checked />
                                <label for="basic_checkbox_1">A/L</label>
								</div>
                                    <input type="checkbox" id="ch2" name="checkbox1">
                                    <label for="checkbox">O/L</label>
                                </div>
								</div>
								</div>
								<div class="form-group form-float">
                                        <div class="form-line">
										<input type="text" class="form-control" name="gname" required>
                                        <label class="form-label">Guardian name</label>
                                        </div>
                                    </div>
									<div class="form-group form-float">
                                       <div class="form-line">
                                      <input type="text" class="form-control mobile-phone-number" name="gmp" placeholder="Ex: +00 (000) 000-00-00">
                                        <label class="form-label">Guardian Mobile phone number</label>
                                            </div>
                                        </div>
										<div class="form-group form-float">
                                        <div class="form-line">
										<input type="text" class="form-control" name="know" required>
                                        <label class="form-label">How do you know ETS</label>
                                        </div>
                                    </div>
										
                                    <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                                    <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
	<!--  Main page content ----------------------------->
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		 <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

		
</body>

</html>
