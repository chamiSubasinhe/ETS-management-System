<?php 

?>
<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	<?php
	
	$message =' ';
	$examID =' ';
	$stuID = '';
	
	$enableForm = '0';
	$searchResult =0;
	$search = 0;
	if(isset($_POST["search"])){
			$stuID=mysqli_real_escape_string($conn, $_POST["stuID"]);
			$search=mysqli_query($conn,"select * from student where  stuID = ' ".$stuID. " ' ");
									$searchResult = mysqli_num_rows($search);
		
			if($searchResult=='0'){
				$enableForm = '1';
				$message = 'search success' ;
			}else{
				$enableForm = '0';
				$message = 'search not success' ;
			}
		   	
		
	}else{
		$message = 'No result';
	}
		if (isset($_POST["submit"])){
			$enableForm = '1';
			$examID=mysqli_real_escape_string($conn, $_POST["examID"]);
			$stuID=mysqli_real_escape_string($conn, $_POST["stuID"]);
			$marks=mysqli_real_escape_string($conn, $_POST["marks"]);

		$sql="UPDATE studentexam SET marks =  ' ".$marks." ' where examID =  '" .$examID."' AND stuID='".$stuID."'  ";
			$result=mysqli_query($conn,$sql);
			if($result){
				$message =  "1 record added";
			}
			else{
								$message =  "error";
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
                            <h2>ADD RESULT DETAILS</h2>
                           
                        </div>
                        <div class="body">
                            <form id="form_validation"  action="" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  class="form-control"  value="<?php echo $stuID; ?>" name="stuID" required>
                                        <label class="form-label">Enter Student Id:</label>
                                    </div>
                                </div>                         
                                <button class="btn btn-primary waves-effect" type="submit" name="search">Search</button>
                            </form
							<div class="alert alert-success">
                                <strong></strong> <p><?php echo $message; ?></p>
                            </div>		
                        </div>
                    </div>
                </div>
            </div>
			
			
			
			
			
			<?php if($enableForm == '1'){ ?>
			
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>ADD STUDENT DETAILS</h2>
                          
                        </div>
                        <div class="body">
                            <form id="form_validation"  action="" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  class="form-control" style="visibility:hidden;"  value="<?php echo $stuID; ?>" name="stuID" required>
                                        <label class="form-label">Student Id: <?php echo $stuID; ?></label>
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
                                        <input type="Date" class="form-control" name="dob" required>
                                        <label class="form-label">Date of Birth<label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nic" required>
                                        <label class="form-label">nic</label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="mobile" required>
                                        <label class="form-label">Mobile phone number<label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="residence" required>
                                        <label class="form-label">Residence<label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" required>
                                        <label class="form-label">Email</label>
                                    </div>
                                </div>
                               
                                <button class="btn btn-primary waves-effect" type="submit" name="submit">SUBMIT</button>
                            </form
							<p><?php echo $message; ?></p>
                        </div>
                    </div>
                </div>
            </div>  <?php }else{
				echo '<p>form is disabled </p>' ;
			} ?>
	<!--  Main page content ----------------------------->
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		 <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

		
</body>

</html>
