<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	
		
		<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->
	
	
		
		<!-- Load system variables ---------------------------------------->
	<?php include 'static/session.php';?>
	<!--# End Load system variables -->
	
	
	<script>
	function fill(){
		document.getElementById("stuID")value='KGSTIT008888';
		document.getElementById("certificateNo")value='008';
		document.getElementById("courseID")value='008';
		document.getElementById("collectorName")value='student';
		//document.getElementById("certificateIssueDate")value='-08/08/2018';
	}
	
	function fill2(){
		document.getElementById("stuID")value='KGSTIT008888';
		document.getElementById("courseID")value='008';
		
	}
	</script>
	<!--# end DB connection -->
	<?php
	$message=' ';
	$message2='';
	$flage=3;
	if (isset($_POST['submit'])){
			
			$stuID=mysqli_real_escape_string($conn, $_POST['stuID']);
			$certificateNo=mysqli_real_escape_string($conn, $_POST['certificateNo']);
			$courseID=mysqli_real_escape_string($conn,$_POST['courseID']);
			$collectorName=mysqli_real_escape_string($conn,$_POST['collectorName']);
			$certificateIssueDate= date('y-m-d',strtotime($_REQUEST['certificateIssueDate']));
			

		$sql="INSERT INTO studcompletecourse (stuID,certificateNo,courseID,collectorName,certificateIssueDate) VALUES('{$stuID}','{$certificateNo}','{$courseID}','{$collectorName}','{$certificateIssueDate}')";
			$result=mysqli_query($conn,$sql);
			
			if($result){
				$message= "1 record added";
				$flag=1;
			}
			else{
				$message="Record not added ";
				$flag=0;
			}
		}
	?>
	<?php
	if (isset($_POST['search'])){
		
		
		$stuID=mysqli_real_escape_string($conn, $_POST['stuID']);
		$courseID=mysqli_real_escape_string($conn,$_POST['courseID']);
		
		$sql_find_certificate = "SELECT stuID,courseID,collectorName FROM studcompletecourse WHERE stuID = '".$stuID."' AND courseID='".$courseID."' ";
	
		$result = mysqli_query($conn, $sql_find_certificate);
	
	if(mysqli_num_rows($result) > 0){
		$message2= "successfuly Search";
		$flag=1;
	}
	
		else{
				$message2="Error in Search "; 
				$flag=0;
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
                            <h2>ADD CERTIFICATE DETAILS</h2>	
								 <div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
							<?php echo $message; ?>
						 
						</div>
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
                            <form id="form_validation"  action="addcer.php" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="stuID"  pattern="([A-Z][A-Z][A-Z][A-Z][A-Z][A-Z][0-9][0-9][0-9][0-9][0-9][0-9])required>
                                        <label class="form-label">Student Id</label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="certificateNo" required>
                                        <label class="form-label">Certificate Number</label>
                                    </div>
                                </div>
                                                               <div class="form-group form-float">
                                    <div class="form-line">
										 <select name="courseID" class="form-control show-tick">
                                        <option value="">-- Please select  courseID--</option>
											<?php
				
											$query2=mysqli_query($conn,"select * from course");
											while($row2=mysqli_fetch_array($query2)){
			?>
                                        <option value="<?php echo $row2["courseID"]; ?>"><?php echo $row2["courseID"]; ?></option>
										
		<?php } ?>
                                    </select>
                                        <label class="form-label">Select Exam ID</label>
                                    </div>
                                </div>
								
						
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="collectorName" required>
                                        <label class="form-label">Collector name<label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="certificateIssueDate" required>
                                        <label class="form-label">Issued Date<label>
                                    </div>
                                </div>
								
                                
                                
                               
                                <button class="btn btn-primary waves-effect" type="submit" name="submit">SUBMIT</button>
								<a class="btn btn-primary waves-effect" onclick="fill()" >Demo Data</a>
								
                            </form>
							<p></p>
                        </div>
                    </div>
                </div>
            </div>  
		
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>SEARCH CERTIFICATE DETAILS</h2>
							
						
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
                            <form id="form_validation"  action="updatecer.php" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="stuID" pattern="([A-Z][A-Z][A-Z][A-Z][A-Z][A-Z][0-9][0-9][0-9][0-9][0-9][0-9])"required>
                                        <label class="form-label">Student Id</label>
                                    </div>
                                </div>
								<div class="body">
                            
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="courseID" pattern="([A-Z][A-Z][0-9][0-9])" required>
                                        <label class="form-label">Course Id</label>
                                    </div>
                                </div>
                               
                                <button class="btn btn-primary waves-effect" type="submit" name="search">Search</button>
								<a class="btn btn-primary waves-effect" onclick="fill2()" >Demo Data</a>
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
