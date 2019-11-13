<?php 
/*

*/
?>
<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	
<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->

	<!-- Load session variables ---------------------------------------->
	<//?php include 'static/session.php';?>
	<!--# End Load session variables -->
	


	
	
	
<!DOCTYPE html>
<html>

	<!-- Page head --------------------------------------->
	<?php include '../static/head.php';?>
	<!--# end Page Loader -->
	
<body class="theme-red">


    <!-- Page Loader ------------------------------------>
	<?//php include 'static/preloader.php';?>
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
        <div class="container-fluid">
			<!-- Main page content  ----------------------------->
			 <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Students enrolled in evey year
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ModuleID</th>
                                            <th>Module Name</th>
                                            <th>Description</th>
											<th>credits</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
									
									<?php
		$query2=mysqli_query($conn,"select studentregister.courseID,student.dateAdded from studentregister Inner Join courseID on student.dateAdded  where status=1");
		while($row2=mysqli_fetch_array($query)){
			?>
									<tr>
                                            <td><?php echo $row2['moduleID']; ?></td>
                                            <td><?php echo $row2['mName']; ?></td>
                                            <td><?php echo $row2['description']; ?></td>
											<td><?php echo $row2['credits']; ?></td>
                                            <td><a href="updateExpireModule.php?moduleID=<?php echo $row2['moduleID'];?>" class="btn btn-primary">Edit</a></td>
                                    </tr>

	<?php
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
	</div>
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
			  
 
 
 
		<!-- #END# Javascript  -->
		
</body>

</html>
