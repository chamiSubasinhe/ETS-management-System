<?php 
/*
* All Rights Reserved C 2018
*/

?>
<?php
session_start();
?>
	<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	
<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->
	
	
<?php
	
	$stuID='';
	$courseID='';
	$collectorName='';
	$insertString ='';
	$flag=3;
	$message='';
	$message2='';
	
	
	if(isset($_POST["stuID"]) && isset($_POST["courseID"]) )
	{
		$stuID=$_POST["stuID"];
		$courseID=$_POST["courseID"];
	}
	else
		{
		$stuID='STKGIT001452';
		$courseID='001';
		
		}
		

		$query2=mysqli_query($conn,"select * from studcompletecourse where stuID='".$stuID."' AND  courseID='".$courseID."'  " );
		while($row2=mysqli_fetch_array($query2))
		{

			$stuID=$row2['stuID'];
			$courseID=$row2['courseID'];
			$collectorName=$row2['collectorName'];
		}

	
		
		?>
		<?php
		
		if(isset($_POST["update"]))
	{
		
		if(isset($_POST["stuID"])){
			$stuID=$_POST["stuID"];
		}
		if(isset($_POST["courseID"])){
			$courseID=$_POST["courseID"];
		}
		if(isset($_POST["collectorName"])){
			$collectorName=$_POST["collectorName"];
		}
		
		
		$updateString="UPDATE studcompletecourse SET  collectorName='".$collectorName."' WHERE stuID='".$stuID."' AND courseID='".$courseID."' ";
		                    
	
		if(!mysqli_query($conn,$updateString)){
			echo 'error';
			
		}
		else
		{
			echo'<br>';
			$message='1 record Successfuly updated...';
			$flage=1;
		}
	}

	else
	{
		$message = "No any updated";
		$flag=0;
	
	} 
	
	?>
	
	<?php
	//delete
	
		if(isset($_POST["expire"]))
	{
		
		if(isset($_POST["stuID"])){
			$stuID=$_POST["stuID"];
		}
		if(isset($_POST["courseID"])){
			$courseID=$_POST["courseID"];
		}
		if(isset($_POST["collectorName"])){
			$collectorName=$_POST["collectorName"];
		}
		
		
		$deleteString="UPDATE  studcompletecourse SET status='0'  WHERE stuID='".$stuID."' AND courseID='".$courseID."'  "; 
		   //$deleteString="DELETE studcompletecourse WHERE stuID='".$stuID."' AND courseID='".$courseID."'  ";                  
	
		if(!mysqli_query($conn,$deleteString)){
			echo 'error';
		}
		else
		{
			echo'<br>';
			$message2= '1 record successfuly Expired...';
			$flag=1;
		}
	}

	else
	{
		$message2= "No any Expired";
		$flag=0;
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
                <h2></h2>
            </div>
            <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                        <div class="header">
                            <h2>
                                 UPDATE CERTIFICATE
                            </h2>
							      <div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
						<?php echo $message; ?>
							
						
						
						
                            
                        </div>
                    <div class="body">
						
						<form method="POST" action="updatecer.php" >
						<div class="row clearfix">
						
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
										<input type="text" name="stuID" value= "<?php echo $stuID; ?>" style="visibility:hidden;" class="form-control" placeholder="" />
                                           Student ID: <input type="text" value= "<?php echo $stuID; ?>" class="form-control" placeholder="Student ID" disabled/>
                                        </div>
                                    </div>
                                </div>
							    <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text"  name="courseID" class="form-control"  value="<?php  echo $courseID;  ?>" style="visibility:hidden;" class="form-control"  placeholder="" />
											Course ID:<input type="text" value= "<?php echo $courseID; ?>" class="form-control" placeholder="Course ID" disabled/>
                                        </div>
                                    </div> 
                                </div>
								<div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                           Collector name: <input type="text"  name="collectorName" class="form-control"  value="<?php  echo $collectorName;  ?>" placeholder="Collector Name" />
                                        </div>
                                    </div>
                                </div>
								<div class="col-sm-12">
								<div class="form-group">
									<button class="btn btn-alert" input type="submit" name="update" value="" id="updatecertificate">Update</button>
                                    <button class="btn btn-danger waves-effect" data-type="cancel" name="expire" id="expireModule" value="expireModule">Expire</button></td>
								</div>
								</div>
						 						
						 </form>
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
<?php 

// destroy the session 
session_destroy(); 
?>