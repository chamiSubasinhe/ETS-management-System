<?php 
?>
<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	<?php
		$message=' ';
		$dob='';
		$address='';
		$ol='';
		$al='';
		$gender='';
		$moblile='';
	if (isset($_POST['submit'])){
		
			$stuID=mysqli_real_escape_string($conn, $_POST['stuID']);
			$nameWithInit=mysqli_real_escape_string($conn,$_POST['nameWithInit']);
			$nameInFull=mysqli_real_escape_string($conn,$_POST['nameInFull']);
			$dob= date('y-m-d',strtotime($_REQUEST['dob']));
			$address=mysqli_real_escape_string($conn,$_POST['address']);
			$al=mysqli_real_escape_string($conn,$_POST['al']);
			$ol=mysqli_real_escape_string($conn,$_POST['ol']);
			$gender=mysqli_real_escape_string($conn,$_POST['gender']);
			$mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
			
		//
		$sql1="INSERT INTO student (userId,phone) VALUES('{$stuID}','{$mobile}')";
		$sql="INSERT INTO student (stuID,nameWithInit,nameInFull, dob,address,al,ol,gender) VALUES('{$stuID}','{$nameWithInit}','{$nameInFull}','{$dob}','{$address}','{$al}','{$ol}','{$gender}')";
			$result=mysqli_query($conn,$sql);
			if($result){
				$message= "1 record added";
			}
			else{
				$message="Record 1 not added ";
			}
			
			/*$result2=mysqli_query($conn,$sql1);
			if($result2){
				$message= "1 record added";
			}
			else{
				$message="Record 2 not added ";
			}
			
		}*/
		
		
		
		
		
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
    <?php // include 'static/topnav.php';?>
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
                            <h2>ADD STUDENT DETAILS</h2>
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
                            <form id="form_validation"  action="addstu.php" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="stuID" required>
                                        <label class="form-label">Student Id</label>
                                    </div>
                                </div>
								      <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nameWithInit" required>
                                        <label class="form-label">Name with initial</label>
                                    </div>
                                </div>
                                 
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nameInFull" required>
                                        <label class="form-label">Initial denoted by<label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="dob" required>
                                        <label class="form-label">Date of Birth<label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="address" required>
                                        <label class="form-label">Address<label>
                                    </div>
                                </div>
								<div class="form-group">
                                    <input type="radio" name="gender" value="1" id="male" class="with-gap">
                                    <label for="male">Male</label>

                                    <input type="radio" name="gender" value="0" id="female" class="with-gap">
                                    <label for="female" class="m-l-20">Female</label>
                                </div>
								<div class="form-group form-float">
								
                                    <div class="form-line">
									<input type="checkbox" id="md_checkbox_1" name="al" value="1"class="chk-col-red" checked />
                                <label for="md_checkbox_1">A/L</label>
                                <input type="checkbox" id="md_checkbox_2" name="ol" value="1"class="chk-col-pink" checked />
                                <label for="md_checkbox_2">O/L</label>    
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="mobile" required>
                                        <label class="form-label">Mobile number<label>
                                    </div>
                                </div>
								
                               
                                <button class="btn btn-primary waves-effect" type="submit" name="submit">SUBMIT</button>
                            </form>
							<p><?php echo $message; ?></p>
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
