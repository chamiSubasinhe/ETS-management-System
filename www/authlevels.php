<?php 
/*
* Google Metirial Design Template designed Asiri Hewage
* asiriofficial@gmail.com
* All Rights Reserved C 2018
* http://asirihewage.business.site
*/

error_reporting(0);
ini_set('display_errors', 0);

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
	

<!-- Load Settings CRUDE ---------------------------------------->	
<?php

	//temp vars
	$result = '';
	$flag = '-1';

	$authId = '';
	//initalize variables
	$name = $maintenance = $description = 	$studentManagement = $financialManagement = $inventoryManagemnt = $courseManagemnt = $libraryManagement = $staffManagement = $administration = $studentBasic = $staffBasic = $InventoryBasic = $attendance = '0';
	
	//update
	if(isset($_POST['updateLevel']) || isset($_POST["setLevels"]))
	{
		$authId = $_POST['authId'];
		$studentManagement= $_POST['studentManagement'];
		$financialManagement= $_POST['financialManagement'];
		$inventoryManagemnt= $_POST['inventoryManagemnt'];
		$courseManagemnt= $_POST['courseManagemnt'];
		$libraryManagement=$_POST['libraryManagement'] ;
		$staffManagement = $_POST['staffManagement'];
		$administration=$_POST['administration'];
		$attendance	= $_POST['attendance'];
		$maintenance	= $_POST['maintenance'];

		//$staticSetting = $_POST['staticNew'];
		$updateLevel="Update authlevels 
						SET studentManagement='".$studentManagement."', 
							financialManagement='".$financialManagement."', 
							inventoryManagemnt='".$inventoryManagemnt."', 
							courseManagemnt='".$courseManagemnt."', 
							libraryManagement='".$libraryManagement."', 
							staffManagement='".$staffManagement."', 
							administration='".$administration."', 
							maintenance='".$maintenance."', 
							attendance='".$attendance."' 
						WHERE authId='".$authId."'";
	
		// proceed to screw this database up 
		$loadingMSG = 'Executing...';
		$exec = mysqli_query($conn,$updateLevel);
		if(!$exec){// always trust your users... :P 
			$flag = 0;
			$result =  'something went wrong updating'; 
		}else{ 
			$result = 'Succesfully updated auth levels for '.$_POST["name"]; 
			$flag = 1;
		} 
	}
	
	
	
	//Delete 
	if(isset($_POST['deleteLevel']))
	{
		$authId = $_POST['authId'];
		$variableSetting = $_POST['variableNew'];
		$updateSetting="DELETE FROM authlevels WHERE authId='".$authId."'";
	
		// proceed to screw this database up 
		$loadingMSG = 'Executing...';
		$exec = mysqli_query($conn,$updateSetting);
		if(!$exec){// always trust your users... :P 
			$flag = 0;
			$result =  'something went wrong updating'; 
		}else{ 
			$result = 'Succesfully Deleted auth level:'.$_POST["name"]; 
			$flag = 1;
		} 
	}

?>
<!--# End Load Settings CRUDE -->

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
                                Update Auth Levels 
                            </h2>
							This interface will allow you to customize Authentication levels and their access levels in the system.
							
                        </div>
                        <div class="body">
						<div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
						<?php echo $result; ?>
                            </div>
                            <div class="table-responsive ">
                                <table class="table table-bordered table-striped table-hover dataTable">
                                    <thead>
                                        <tr>
											<th>AuthId #</th>
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
											<th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>AuthId #</th>
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
											<th>Actions</th>
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
										<form action="authlevels.php" id="setLevels" name="setLevels" method="POST" >
                                          <th><?php echo $row2['authId']; ?><input style="display: none;" type="text" name="name" value="<?php echo $row2['name']; ?>" class="form-control"> <input style="display: none;" type="text" name="authId" value="<?php echo $row2['authId']; ?>" class="form-control"></td></th>
                                            <th data-toggle="tooltip" data-placement="right" title="<?php echo $row2['description']; ?>"><?php echo $row2['name']; ?></th>
                                            
											<th>
                                        <div class="switch">
                                            <label><input  id ="toggle"  onclick="$(this).attr('value', this.checked ? 1 : 0)" name="administration" type="checkbox" <?php if($row2['administration']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        </div>
										</th>
                                            <th><div class="switch">
                                            <label><input id ="toggle" onclick="$(this).attr('value', this.checked ? 1 : 0)" name="maintenance" type="checkbox" <?php if($row2['maintenance']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        </div></th>
											<th><div class="switch">
                                            <label><input id ="toggle" onclick="$(this).attr('value', this.checked ? 1 : 0)" name="libraryManagement" type="checkbox" <?php if($row2['libraryManagement']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        </div></th>
											<th><div class="switch">
                                            <label><input id ="toggle"  onclick="$(this).attr('value', this.checked ? 1 : 0)" name="inventoryManagemnt" type="checkbox" <?php if($row2['inventoryManagemnt']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        </div></th>
                                            <th><div class="switch">
                                            <label><input id ="toggle"  onclick="$(this).attr('value', this.checked ? 1 : 0)" name="courseManagemnt" type="checkbox" <?php if($row2['courseManagemnt']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        </div></th>
											<th><div class="switch">
                                            <label><input id ="toggle"  onclick="$(this).attr('value', this.checked ? 1 : 0)" name="financialManagement" type="checkbox" <?php if($row2['financialManagement']=='1') echo 'checked value="1"'; else echo 'value="0"';?>><span class="lever switch-col-blue"></span></label>
                                        </div></th>
											<th><div class="switch">
                                            <label><input id ="toggle"  onclick="$(this).attr('value', this.checked ? 1 : 0)" name="studentManagement" type="checkbox" <?php if($row2['studentManagement']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        </div></th>
											<th><div class="switch">
                                            <label><input id ="toggle"  onclick="$(this).attr('value', this.checked ? 1 : 0)" name="staffManagement" type="checkbox" <?php if($row2['staffManagement']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        </div></th>
                                            <th><div class="switch">
                                            <label><input id ="toggle"  onclick="$(this).attr('value', this.checked ? 1 : 0)" name="attendance" type="checkbox" <?php if($row2['attendance']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        </div></th>
										<th><button value="updateLevel" name="updateLevel" class="btn btn-primary waves-effect" type="submit">UPDATE</button><button class="btn btn-danger waves-effect" name="deleteLevel" type="submit">DELETE</button></th>
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
