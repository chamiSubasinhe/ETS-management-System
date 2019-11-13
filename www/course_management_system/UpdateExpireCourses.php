<?php 
/*
* All Rights Reserved C 2018
*/

?>
	<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	
<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->
	
	
<?php
	
	$courseID='';
	$cName='';
	$description='';
	$preQualification='';
	$postQualification='';
	$duration='';
	$commencingDate='';
	$feePerSemester='';
	$insertString ='';
	$message='';
	$message1='';
	$flag=0-1;
	
	
	if(isset($_GET["courseID"]) )
	{
		$courseID=$_GET["courseID"];
		echo $courseID;
	}
	else
		{
		$courseID='IT01'; //setting a default value
			}
		

		$query2=mysqli_query($conn,"select * from course where courseID='".$courseID."' " );
		while($row2=mysqli_fetch_array($query2))
		{

			$courseID=$row2['courseID'];
			$cName=$row2['cName'];
			$description=$row2['description'];
			$preQualification=$row2['preQualification'];
			$postQualification=$row2['postQualification'];
			$duration=$row2['duration'];
			$commencingDate=$row2['commencingDate'];
			$feePerSemester=$row2['feePerSemester'];
		}
		
	?>
	
	<?php

	if(isset($_POST["updateModule"]))
	{
		
		if(isset($_POST["courseID"])){
			$courseID=$_POST["courseID"];
		}
		if(isset($_POST["cName"])){
			$cName=$_POST["cName"];
		}
		if(isset($_POST["description"])){
			$description=$_POST["description"];
		}
		if(isset($_POST["preQualification"])){
			$preQualification=$_POST["preQualification"];
		}
		if(isset($_POST["postQualification"])){
			$postQualification=$_POST["postQualification"];
		}
		if(isset($_POST["duration"])){
			$duration=$_POST["duration"];
		}
		if(isset($_POST["commencingDate"])){
			$commencingDate=$_POST["commencingDate"];
		}
		if(isset($_POST["feePerSemester"])){
			$feePerSemester=$_POST["feePerSemester"];
		}
		
		
		
		$updateString="UPDATE course SET cName='".$cName."',description='".$description."',preQualification='".$preQualification."' WHERE courseID='".$courseID."'";
		                    
	
		if(!mysqli_query($conn,$updateString)){
			$message='error';
		}
		else
		{
			$message="   1 record Updated!";
			$flag = 1;
		
		}
	}
	
	?>

	
	<?php
	
	
	if(isset($_POST["expireModule"]))
	{
		
		if(isset($_POST["courseID"])){
			$courseID=$_POST["courseID"];
		}
		if(isset($_POST["cName"])){
			$cName=$_POST["cName"];
		}
		if(isset($_POST["description"])){
			$description=$_POST["description"];
		}
		if(isset($_POST["preQualification"])){
			$preQualification=$_POST["preQualification"];
		}
		if(isset($_POST["postQualification"])){
			$postQualification=$_POST["postQualification"];
		}
		if(isset($_POST["duration"])){
			$duration=$_POST["duration"];
		}
		if(isset($_POST["commencingDate"])){
			$commencingDate=$_POST["commencingDate"];
		}
		if(isset($_POST["feePerSemester"])){
			$feePerSemester=$_POST["feePerSemester"];
		}
		
		
		$updateString="UPDATE course SET status='0' WHERE courseID='".$courseID."'";
		                    
	
		if(!mysqli_query($conn,$updateString)){
			$message='error';
		}
		else
		{
			
			$message="   1 record marked Expired!";
			$flag=1;
		
		}
	}
	
	?>
	
	
	
	
<!DOCTYPE html>
<html>

	<!-- Page head --------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Loader -->
	
	
	

	<head>
	 <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

     <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
	
	<!--DB connection -->
	
	</head>
	
<body class="theme-red">

    <!-- Page Loader ------------------------------------>
	<?php //include 'static/preloader.php';?>
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
        <div class="container-fluid">
            
        <div class="container-fluid">
            <div class="block-header">
			 <!--Suceess or fail messages-->

                            <div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
                                <?php echo $message; ?>
                            </div>
                <h2></h2>
            </div>
            <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                        <div class="header">
                            <h2>
                                EXPIRE OR UPDATE COURSES
                            </h2>
		
                        </div>
                    <div class="body">
						<form method="POST" id="form_validation" action="UpdateExpireCourses.php" >
						<div class="row clearfix">
						
								<div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
										<input type="text" name="courseID" value= "<?php echo $courseID; ?>" style="visibility:hidden;" class="form-control"/>
                                            <input type="text" value= "Module:<?php echo $courseID; ?>" class="form-control"  disabled/>
											<label class="form-label">Module ID :</label>
                                        </div>
                                    </div>
                                </div>
							    <div class="col-sm-12">
                                   <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text"  name="cName" class="form-control"  value="<?php  echo $cName;  ?>" />
											<label class="form-label">Module Name :</label>
                                        </div>
                                    </div> 
                                </div>
								<div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text"  name="description" class="form-control"  value="<?php  echo $description;  ?>"  />
											<label class="form-label">Description :</label>
                                        </div>
                                    </div>
                                </div>
								<div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text"  name="preQualification" class="form-control" value="<?php  echo $preQualification;  ?>"  />
											<label class="form-label">Pre Qualification</label>
                                        </div>
                                    </div>
                                </div>
								<div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text"  name="postQualification" class="form-control" value="<?php  echo $postQualification;  ?>" />
											<label class="form-label">Post Qualification</label>
                                        </div>
                                    </div>
                                </div>
								<div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number"  name="duration" class="form-control" value="<?php  echo $duration;  ?>"  />
											<label class="form-label">Duration :</label>
                                        </div>
                                    </div>
                                </div>
								<div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="date"  name="commencingDate" class="form-control" value="<?php  echo $commencingDate;  ?>"  />
											<label class="form-label">commencingDate :</label>
                                        </div>
                                    </div>
                                </div>
								<div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text"  name="feePerSemester" class="form-control" value="<?php  echo $feePerSemester;  ?>"  />
											<label class="form-label">Fee Per Semester :</label>
                                        </div>
                                    </div>
                                </div>
								<div class="col-sm-3">
								<div class="form-group">
									<button class="btn btn-alert" input type="submit" name="updateModule" value="updateModule" id="updateModule">Update Module</button>
                                    <button class="btn btn-danger waves-effect" data-type="cancel" name="expireModule" id="expireModule" value="expireModule">Expire</button></td>
								</div>
								</div>
								
								
						 						
						 </form>
						 
						 <?php
									echo $message;
								?>
                    </div>
                    </div>
                </div>
 
            </div>
            <!-- #END# Input -->
		</div>	
        </div>
	<!--  Main page content ----------------------------->
    </section>

  <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="plugins/momentjs/moment.js"></script>

   <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/basic-form-elements.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
	 <!-- Input Mask Plugin Js -->
    <script src="plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
	
	  <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

  
    
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
