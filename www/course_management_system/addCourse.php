<?php 
/*
* Google Metirial Design 
*/
?>
	<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	
<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->
	
	<?php

$CourseIDnew='';

if(isset($_POST["courseID"])){
			$CourseIDnew = $_POST["courseID"];
		}


	$getCourseID=mysqli_query($conn,"select courseID from course order by courseID DESC LIMIT 1 ");
		
		while($rowgetCourseID=mysqli_fetch_array($getCourseID)){
			$courseID = $rowgetCourseID['courseID'];
		}
		
		$part1 = substr($courseID, 0, 2);
		$part2 = intval(substr($courseID, 2))+1;
		$part2 = str_pad($part2, 2, '0', STR_PAD_LEFT);
		$newcourseID= $CourseIDnew.$part2;
		
?>
	
	<?php
	
	
	$cName='';
	$description='';
	$preQualification='';
	$postQualification ='';
	$duration='';
	$commencingDate='';
	$feePerSemester='';
	$category='';
	$message='';
	if(isset($_POST["insertCourse"]) && isset($_POST["cName"]))
	{
		
		if(isset($_POST["cName"])){
			$cName = $_POST["cName"];
		}
		if(isset($_POST["description"])){
			$description = $_POST["description"];
		}
		if(isset($_POST["preQualification"])){
			$preQualification = $_POST["preQualification"];
		}
		if(isset($_POST["postQualification"])){
			$postQualification = $_POST["postQualification"];
		}
		if(isset($_POST["duration"])){
			$duration = $_POST["duration"];
		}
		if(isset($_POST["commencingDate"])){
			$commencingDate = $_POST["commencingDate"];
		}
		if(isset($_POST["feePerSemester"])){
			$feePerSemester = $_POST["feePerSemester"];
		}
		if(isset($_POST["category"])){
			$category = $_POST["category"];
		}
		
		$insertString = "INSERT INTO course(courseID,cName ,description, preQualification, postQualification,duration,commencingDate,feePerSemester,category) VALUES ('".$newcourseID."','".$cName."','".$description."','".$preQualification."','".$postQualification."','".$duration."','".$commencingDate."','".$feePerSemester."','".$category."')";										
		if(!mysqli_query($conn, $insertString)){
			echo 'error';
		}
		else
		{
			$message='  1 record added!';
			$flag=1;
		}
	}

	else
	{
		$message = "  One or more fields are not filled";
	}

	
	?>
	
	
<!DOCTYPE html>
<html>

	<!-- Page head --------------------------------------->
	<?php include '../static/head.php';?>
	<!--# end Page Loader -->
	
	
	

	<head>
	<meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"></title>

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
            <div class="block-header">
			
			
			<div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
                                <?php echo $message; ?>
                            </div>
							
							
                <h2>ADD COURSES</h2>
            </div>
            <!-- Input -->
        <div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add Course **<?php echo $part2; ?></h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
						

                        <div class="body">
							<form id="form_validation"  action="" method="POST">
								<div class="body">
								 <div class="body">
							<form id="form_validation"  action="" method="POST">
								<div class="body">
								<h6>select course type</h6>
									<div class="form-group">			
										<div class="col-sm-3">
										<div class="demo-radio-button">
											<input name="courseID" type="radio" id="IT" value="IT" class="with-gap radio-col-blue" />
											<label for="IT">Info Tech.</label>
										</div> </div> 
								
										<div class="col-sm-3">
										<div class="demo-radio-button">
											<input name="courseID" type="radio" id="BM" value="BM" class="with-gap radio-col-blue" />
											<label for="BM">Business Mgt</label>
										</div> </div> 
									
										<div class="col-sm-3">
										<div class="demo-radio-button">
											<input name="courseID" type="radio" id="ET" value="ET" class="with-gap radio-col-blue" />
											<label for="ET">Engineering</label>
										</div></div>
										<div class="col-sm-3">
										<div class="demo-radio-button">
											<input name="courseID" type="radio" id="CT" value="CT" class="with-gap radio-col-blue" />
											<label for="CT">Construt Tech.</label>
										</div></div>
									</div>
									
								 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="cName" required>
                                        <label class="form-label">Course Name :</label>
                                    </div>
                                </div>
								 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="description" required>
                                        <label class="form-label">Description :</label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="preQualification" required>
                                        <label class="form-label">Pre Qualification :</label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="postQualification" required>
                                        <label class="form-label">Post Qualifictions :</label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="duration" required>
                                        <label class="form-label">Duration in Months:</label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="commencingDate" required>
                                        <label class="form-label">Commencing Date :</label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="feePerSemester" required>
                                        <label class="form-label">Fee Per Semester :</label>
                                    </div>
                                </div>
							
						<div class="form-group">			
								
								<div class="col-sm-3">
									<div class="demo-radio-button">
										<input name="category" type="radio" id="degree" value=1 class="with-gap radio-col-blue" />
										<label for="degree">Degree</label>
									</div> 
									</div> 
								
								<div class="col-sm-3">
									<div class="demo-radio-button">
										<input name="category" type="radio" id="diploma" value=2 class="with-gap radio-col-blue" />
										<label for="diploma">Diploma</label>
									</div> </div> 
									
								<div class="col-sm-3">
									<div class="demo-radio-button">
										<input name="category" type="radio" id="shortCourse" value=3 class="with-gap radio-col-blue" />
										<label for="shortCourse">Short Course</label>
									</div>
									</div>

						</div>
                               
                                <button class="btn btn-primary waves-effect" type="submit" name="insertCourse">Add Course</button>
								
                            </form>
							
								</div>
								
						</div>
                </div>
            </div>  
 
		</div>


                        </div>
	<!--  Main page content ----------------------------->
    </section>
	
	
	<!-- JQuery Steps Plugin Js -->
    <script src="plugins/jquery-steps/jquery.steps.js"></script>
	
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
	<!-- Sweet Alert Plugin Js -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>

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
