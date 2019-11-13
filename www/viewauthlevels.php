<?php 
/*
* Google Metirial Design Template designed Asiri Hewage
* asiriofficial@gmail.com
* All Rights Reserved C 2018
* http://asirihewage.business.site
*/

?>
<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->

<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->
	
		<!-- Load session variables ---------------------------------------->
	<?php include 'static/session.php';?>
	<!--# End Load session variables -->

<?php $loadingMSG = 'Loading system Global Variables'; ?>
	
	
	
<!DOCTYPE html>
<html>

	<!-- Page head --------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Loader -->
	
<body class="theme-red">


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
        <div class="container-fluid">
            <div class="block-header">
            </div>
			<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
						
                            <h2>
                               View Auth Levels 
                            </h2>
							This interface will show Authentication levels and their access levels in the system.
							
                        </div>
                        <div class="body">
                            <div class="table-responsive ">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
											<th>Administration</th>
                                            <th>Maintenance</th>
											<th>Library Management</th>
											<th>Inventory Management</th>
                                            <th>Course Management</th>
											<th>Financial Management</th>
											<th>Student Management</th>
											<th>Staff Management</th>
                                            <th>Attendance Management</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
											<th>Administration</th>
                                            <th>Maintenance</th>
											<th>Library Management</th>
											<th>Inventory Management</th>
                                            <th>Course Management</th>
											<th>Financial Management</th>
											<th>Student Management</th>
											<th>Staff Management</th>
                                            <th>Attendance Management</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
				
		$query2=mysqli_query($conn,"select * from authlevels");
		while($row2=mysqli_fetch_array($query2)){
			?>
					<!-- authId,name, created, description, studentManagement	, financialManagement	, inventoryManagemnt	, courseManagemnt, libraryManagement	, staffManagement	, 
administration	, studentBasic	, staffBasic	, 	InventoryBasic	, 	libraryBasic	,attendance			-->
                                        <tr>
										<form action="#" id="setLevels" name="setLevels" method="POST" >
                                            <th data-toggle="tooltip" data-placement="right" title="<?php echo $row2['description']; ?>"><?php echo $row2['name']; ?></th>
											<th>
                                        <div class="switch">
                                            <label><input  disabled id ="toggle" name="administration" type="checkbox" <?php if($row2['administration']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        </div>
										</th>
                                            <th><div class="switch">
                                            <label><input disabled id ="toggle" name="maintenance" type="checkbox" <?php if($row2['maintenance']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        </div></th>
											<th><div class="switch">
                                            <label><input disabled id ="toggle" name="libraryManagement" type="checkbox" <?php if($row2['libraryManagement']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        </div></th>
											<th><div class="switch">
                                            <label><input disabled id ="toggle" name="inventoryManagemnt" type="checkbox" <?php if($row2['inventoryManagemnt']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        </div></th>
                                            <th><div class="switch">
                                            <label><input disabled id ="toggle"  name="courseManagemnt" type="checkbox" <?php if($row2['courseManagemnt']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        </div></th>
											<th><div class="switch">
                                            <label><input disabled id ="toggle"  name="financialManagement" type="checkbox" <?php if($row2['financialManagement']=='1') echo 'checked value="1"'; else echo 'value="0"';?>><span class="lever switch-col-blue"></span></label>
                                        </div></th>
											<th><div class="switch">
                                            <label><input disabled id ="toggle"   name="studentManagement" type="checkbox" <?php if($row2['studentManagement']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        </div></th>
											<th><div class="switch">
                                            <label><input disabled id ="toggle"   name="staffManagement" type="checkbox" <?php if($row2['staffManagement']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        </div></th>
                                            <th><div class="switch">
                                            <label><input disabled id ="toggle" name="attendance" type="checkbox" <?php if($row2['attendance']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        </div></th>
										
										</form>
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
