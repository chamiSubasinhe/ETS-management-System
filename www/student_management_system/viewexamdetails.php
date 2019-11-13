
<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->

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
                            <h2>	VIEW CERTIFICATE DETAILS</h2>	
                        </div>
                        <div class="body">
                            <form id="form_validation"  action="" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="courseID">
                                        <label class="form-label">Course ID</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="moduleID" >
                                        <label class="form-label">Module ID</label>
                                    </div>
                                </div>
                                
                               
                                <button class="btn btn-primary waves-effect" type="submit" name="search">Search</button>
                            </form>
							<p></p>
                        </div>
                    </div>
                </div>
            </div>
			
			
			
			
			
			
			
			
			 <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Exam Details
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ExamID</th>
                                            <th>Staff Member in charge</th>
                                            <th>Module</th>
                                            <th>Course</th>
                                            <th>Start date</th>
                                            <th>Duration</th>
											<th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ExamID</th>
                                            <th>Staff Member in charge</th>
                                            <th>Module</th>
                                            <th>Course</th>
                                            <th>Start date</th>
                                            <th>Duration</th>
											<th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
										<?php
										
														
				 $moduleID='';
				 $courseID='';
				$message='';

				if (isset($_POST['search'])){
						if(isset($_POST['moduleID'])){
							$moduleID=mysqli_real_escape_string($conn, $_POST['moduleID']);
						}
						if(isset($_POST['courseID'])){
							$courseID=mysqli_real_escape_string($conn, $_POST['courseID']);
						}
						
						$query2="SELECT E.ExamID as 'ExamID', E.staffID as 'staffID' , E.moduleID as 'moduleID' ,E.courseID as 'courseID' ,E.dateTime as 'dateTime' , E.duration as 'duration' FROM exam E, module M WHERE M.moduleID=E.moduleID AND E.moduleID LIKE '".$moduleID."' OR E.courseID LIKE '".$courseID."' LIMIT 10 ";
						$result=mysqli_query($conn,$query2);
						
		if($result){
			$message="Some exam details found";
			$flag=1;
								
								
			while($row2=mysqli_fetch_array($result)){
			?>
                                        <tr>
                                            <td><?php echo $row2['ExamID']; ?></td>
                                            <td><?php echo $row2['staffID']; ?></td>
                                            <td><?php echo $row2['moduleID']; ?></td>
                                            <td><?php echo $row2['courseID']; ?></td>
                                            <td><?php echo $row2['dateTime']; ?></td>
                                            <td><?php echo $row2['duration']; ?></td>
											<td><a class="btn btn-primary" href="viewexamdetails.php?delete=<?php echo $row2['ExamID']; ?>">Edit</a></td>
                                        </tr>
                                        	<?php
							}
								
							}else{
								$message="No result found";
								$flag=0;
                                          ?>
										  <tr>
										  <div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
						<?php echo $message; ?>
                            </div>
							</tr>
										  
										  
										  <?php
							}
				}
	?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
			
			
			
			
			
			
			
	<!--  Main page content ----------------------------->
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		 <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

		
</body>

</html>
