<?php 

?>
<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	
	<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->

	
	<!-- Load system variables ---------------------------------------->
	<?php include 'static/session.php';?>
	<!--# End Load system variables -->

	
	
	<?php
	
	$message =' ';
	$examID =' ';
	$stuID = '';
	$mark = '';
	$enableForm = '0';
	$searchResult =0;
	$search = 0;
	if(isset($_POST["search"])){
		$examID=mysqli_real_escape_string($conn, $_POST["examID"]);
			$stuID=mysqli_real_escape_string($conn, $_POST["stuID"]);
			$search=mysqli_query($conn,"select * from studentexam where examID='".$examID."' and stuID = '".$stuID. "' ");
									$searchResult = mysqli_num_rows($search);
		
			if($searchResult==1){
				$enableForm = '1';
				$search = 'search success' ;
				$flag1 = 1;
			}else{
				$enableForm = '0';
				$flag1 = 0;
				$search = 'search not success. No any student found or the student may have a result' ;
			}
		   	
		
	}else{
		$message = 'No result';
	}
		if (isset($_POST["submit"])){
			$enableForm = '1';
			$examID=mysqli_real_escape_string($conn, $_POST["examID"]);
			$stuID=mysqli_real_escape_string($conn, $_POST["stuID"]);
			$marks=mysqli_real_escape_string($conn, $_POST["marks"]);

		$sql="UPDATE studentexam SET marks ='".$marks."' where examID =  '".$examID."' AND stuID='".$stuID."' ";
			$result=mysqli_query($conn,$sql);
			if($result){
				$flag = 1;
				$message =  "1 result added".'ExamID: '.$examID.' StudentID: '.$stuID.' Mrks: '.$marks;
			}
			else{
				$flag = 0;
								$message =  "error updating student results";
			}
		}
		
		
		
	?>


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
                               
                                <button class="btn btn-primary waves-effect" type="submit" name="search">Search</button>
                            </form>
							
							<div class="alert alert-<?php if($flag1==0){echo 'danger';}else if($flag1==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
						<?php echo $search; ?>
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
                                        <input type="text" class="form-control" name="marks" required>
                                        <label class="form-label">Marks<label>
                                    </div>
                                </div>   
                               
                                <button class="btn btn-primary waves-effect" type="submit" name="submit">SUBMIT</button>
                            </form>
							
							<div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
						<?php echo $message; ?>
                            </div>
							
                        </div>
                    </div>
                </div>
            </div>  <?php }else{
				 ;
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
