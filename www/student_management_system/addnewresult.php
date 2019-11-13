<?php 

?>
<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	<?php
	
	$message =' ';
	$examID =' ';
	$stuID = '';
	$courseID='';
	$mark = '';
	$enableForm = '0';
	$searchResult =0;
	$search = 0;
	$flag=3;
	if(isset($_POST["search"])){
		$examID=mysqli_real_escape_string($conn, $_POST["examID"]);
			$stuID=mysqli_real_escape_string($conn, $_POST["stuID"]);
			$courseID=mysqli_real_escape_string($conn, $_POST["courseID"]);
			$search=mysqli_query($conn,"select * from result where examID=' ".$examID."' and stuID = ' ".$stuID. " ' and courseID = ' ".$courseID. " ' ");
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
			$courseID=mysqli_real_escape_string($conn, $_POST["courseID"]);

		$sql="UPDATE result SET marks =  ' ".$marks." ' where examID =  '" .$examID."' AND stuID='".$stuID."' AND courseID='".$courseID."'  ";
			$result=mysqli_query($conn,$sql);
			if($result){
				$message =  "1 record added";
				$flag=1;
			}
			else{
								$message =  "error";
								$flag=0;
			}
		}
		if (isset($_POST["delete"])){
			$enableForm = '1';
			$examID=mysqli_real_escape_string($conn, $_POST["examID"]);
			$stuID=mysqli_real_escape_string($conn, $_POST["stuID"]);
			$marks=mysqli_real_escape_string($conn, $_POST["marks"]);
			$courseID=mysqli_real_escape_string($conn, $_POST["courseID"]);

		$sql="DELETE result where examID =  '" .$examID."' AND stuID='".$stuID."' AND courseID='".$courseID."' ";
			$result=mysqli_query($conn,$sql);
			if($result){
				$message =  "successful deleted";
				$flag=1;
			}
			else{
								$message =  "error";
								$flag=0;
			}
		}
		
		
	?>

<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->
	
			
<!-- Load system variables ---------------------------------------->
	<?php include 'static/session.php';?>
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
    <?php  include 'static/topnav.php';?>
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
							 <div class="alert alert-<?php if($flag2==0){echo 'danger';}else if($flag2==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
						<?php echo $message2; ?>
                           
                        </div>
                        <div class="body">
                            <form id="form_validation"  action="" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  class="form-control"  value="<?php echo $stuID; ?>" name="stuID" required>
                                        <label class="form-label">Enter Student Id:</label>
                                    </div>
                                </div>
                               <div class="form-group form-float">
                                    <div class="form-line">
										 <select name="examID" class="form-control show-tick">
                                        <option value="">-- Please select --</option>
											<?php
				
		$query2=mysqli_query($conn,"select * from exam");
		while($row2=mysqli_fetch_array($query2)){
			?>
                                        <option value="<?php echo $row2["ExamID"]; ?>"><?php echo $row2["ExamID"]; ?></option>
										
		<?php } ?>
                                    </select>
                                        <label class="form-label">Select Exam ID</label>
                                    </div>
                                </div>
								 <div class="form-group form-float">
                                    <div class="form-line">
										 <select name="courseID" class="form-control show-tick">
                                        <option value="">-- Please select --</option>
											<?php
				
		$query2=mysqli_query($conn,"select * from exam");
		while($row2=mysqli_fetch_array($query2)){
			?>
                                        <option value="<?php echo $row2["courseID"]; ?>"><?php echo $row2["courseID"]; ?></option>
										
		<?php } ?>
                                    </select>
                                        <label class="form-label">Select courseID</label>
                                    </div>
                                </div>
                               
                                <button class="btn btn-primary waves-effect" type="submit" name="search">Search</button>
                            </form
							v class="alert alert-success">
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
                            <h2>ADD RESULT DETAILS</h2>
                          
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
                                        <input type="text"  class="form-control" style="visibility:hidden;"  value="<?php echo $examID; ?>" name="examID" required>
                                        <label class="form-label">Exam  Id: <?php echo $examID; ?></label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  class="form-control" style="visibility:hidden;"  value="<?php echo $courseID; ?>" name="courseID" required>
                                        <label class="form-label">Course  Id: <?php echo $courseID; ?></label>
                                    </div>
                                </div>
								<?php
									//$m=($conn,"SELECT marks from studentexam where examID=' ".$examID."' and stuID = ' ".$stuID. " ' ");
								?>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="marks" value="<?php //echo $m; ?> " required>
                                        <label class="form-label">Marks<label>
                                    </div>
                                </div>   
                               
                                <button class="btn btn-primary waves-effect" type="submit" name="submit">SUBMIT</button>
								<button class="btn btn-primary waves-effect" type="delete" name="delete">DELETE</button>
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
