
<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->

<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->
	<?php
	
				$stuID='';
				 $courseID='';
				$message='';
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
                            <h2>	VIEW STUDENT PAYMENT DETAILS</h2>	
                        </div>
                        <div class="body">
                            <form id="form_validation"  action="" method="POST">
							
							<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="stuID"  value="<?php  echo $stuID;  ?>">
                                        <label class="form-label">student ID</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="courseID" value="<?php  echo $courseID;  ?>">
                                        <label class="form-label">Course ID</label>
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
                                Search Student Payment Details
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>stuID</th>
                                            <th>courseID</th>
											 <th>paymentID</th>
											  <th>paidDate</th>
											   <th>billBookNo</th>
											    <th>paidAmount</th>
                                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>stuID</th>
                                            <th>courseID</th>
											 <th>paymentID</th>
											  <th>paidDate</th>
											   <th>billBookNo</th>
											    <th>paidAmount</th>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
										<?php
										
														
				

				if (isset($_POST['search'])){
						if(isset($_POST['stuID'])){
							$stuID=mysqli_real_escape_string($conn, $_POST['stuID']);
						}
						if(isset($_POST['courseID'])){
							$courseID=mysqli_real_escape_string($conn, $_POST['courseID']);
						}
						
						$query2="SELECT * FROM studentpayment WHERE stuID LIKE '".$stuID."' AND E.courseID LIKE '".$courseID."' ";
						//$query2="SELECT E.ExamID as 'ExamID', E.staffID as 'staffID' , E.moduleID as 'moduleID' ,E.courseID as 'courseID' ,E.dateTime as 'dateTime' , E.duration as 'duration' FROM exam E, module M WHERE M.moduleID=E.moduleID AND E.moduleID LIKE '".$moduleID."' OR E.courseID LIKE '".$courseID."' LIMIT 10 ";
						$result=mysqli_query($conn,$query2);
						
		if($result){
			$message="Some exam details found";
			$flag=1;
								
								
			while($row2=mysqli_fetch_array($result)){
			?>
                                        <tr>
                                            <td><?php echo $row2['stuID']; ?></td>
                                            <td><?php echo $row2['courseID']; ?></td>
                                            <td><?php echo $row2['paymentID']; ?></td>
                                            <td><?php echo $row2['paidDate']; ?></td>
                                            <td><?php echo $row2['billBookNo']; ?></td>
                                            <td><?php echo $row2['paidAmount']; ?></td>
											<td><a class="btn btn-primary" href="Student_search_payment.php?delete=<?php echo $row2['ExamID']; ?>">Edit</a></td>
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
