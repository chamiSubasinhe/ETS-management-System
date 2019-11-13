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

<!-- Load Settings CRUDE ---------------------------------------->	
<?php
	$result = '';
	$flag = '-1';

	//update
	if(isset($_POST['updateLevel']))
	{
		$authId = $_POST['authId'];
		$name = $_POST['name'];
		$created = $_POST['created'];
		$description = $_POST['description'];
		$studentManagement= $_POST['studentManagement'];
		$financialManagement= $_POST['financialManagement'];
		$inventoryManagemnt= $_POST['inventoryManagemnt'];
		$inventoryManagemnt= $_POST['inventoryManagemnt'];
		$courseManagemnt= $_POST['courseManagemnt'];
		$libraryManagement=$_POST['libraryManagement'] ;
		$staffManagement = $_POST['staffManagement'];
		$administration=$_POST['administration'];
		$studentBasic= $_POST['studentBasic'];
		$staffBasic= $_POST['staffBasic'];
		$InventoryBasic= $_POST['InventoryBasic'];
		$InventoryBasic= $_POST['InventoryBasic'];
		$attendance	= $_POST['attendance'];

		//$staticSetting = $_POST['staticNew'];
		$updateSetting="Update settings SET variable='".$variableSetting."', value='".$valueSetting."' WHERE varId='".$varId."'";
	
		// proceed to screw this database up 
		$loadingMSG = 'Executing...';
		$exec = mysqli_query($conn,$updateSetting);
		if(!$exec){// always trust your users... :P 
			$flag = 0;
			$result =  'something went wrong updating'; 
		}else{ 
			$result = 'Succesfully updated variable: '.$variableSetting; 
			$flag = 1;
		} 
	}
	
	
	
	//Delete 
	if(isset($_POST['deleteLevel']))
	{
		$varId = $_POST['varId'];
		$variableSetting = $_POST['variableNew'];
		$updateSetting="DELETE FROM settings WHERE varId='".$varId."'";
	
		// proceed to screw this database up 
		$loadingMSG = 'Executing...';
		$exec = mysqli_query($conn,$updateSetting);
		if(!$exec){// always trust your users... :P 
			$flag = 0;
			$result =  'something went wrong updating'; 
		}else{ 
			$result = 'Succesfully Deleted variable:'.$variableSetting; 
			$flag = 1;
		} 
	}

?>
<!--# End Load Settings CRUDE -->


	<?php $loadingMSG = 'Loading system Global Variables'; ?>
	
	
	
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
        <div class="container-fluid">
            <div class="block-header">
            </div>
			<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
						
                            <h2>
                                Auth Levels 
                            </h2>
							This interface will show Authentication levels and their access levels in the system.
							
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
						<div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
						<?php echo $result; ?>
                            </div>
                            <div class="table-responsive ">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable ">
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
										<form action="" name="update" method="POST" >
                                          <th><?php echo $row2['authId']; ?><input id="varIdNew" style="display: none;" type="text" name="authId" value="<?php echo $row2['authId']; ?>" class="form-control"></td></th>
                                            <th data-toggle="tooltip" data-placement="right" title="<?php echo $row2['description']; ?>"><?php echo $row2['name']; ?></th>
                                            
											<th>
                                        <div class="switch">
                                            <label><input id ="toggle"  name="<?php echo $row2['administration']; ?>" type="checkbox" <?php if($row2['administration']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-green"></span></label>
                                        </div>
										</th>
                                            <th><div class="switch">
                                            <label><input id ="toggle"  name="<?php echo $row2['maintenance']; ?>" type="checkbox" <?php if($row2['maintenance']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-green"></span></label>
                                        </div></th>
											<th><div class="switch">
                                            <label><input id ="toggle"  name="<?php echo $row2['libraryManagement']; ?>" type="checkbox" <?php if($row2['libraryManagement']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-green"></span></label>
                                        </div></th>
											<th><div class="switch">
                                            <label><input id ="toggle"  name="<?php echo $row2['inventoryManagemnt']; ?>" type="checkbox" <?php if($row2['inventoryManagemnt']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-green"></span></label>
                                        </div></th>
                                            <th><div class="switch">
                                            <label><input id ="toggle"  name="<?php echo $row2['courseManagemnt']; ?>" type="checkbox" <?php if($row2['courseManagemnt']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-green"></span></label>
                                        </div></th>
											<th><div class="switch">
                                            <label><input id ="toggle"  name="<?php echo $row2['financialManagement']; ?>" type="checkbox" <?php if($row2['financialManagement']=='1') echo 'checked value="1"'; else echo 'value="0"';?>><span class="lever switch-col-green"></span></label>
                                        </div></th>
											<th><div class="switch">
                                            <label><input id ="toggle"  name="<?php echo $row2['staffManagement']; ?>" type="checkbox" <?php if($row2['studentManagement']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-green"></span></label>
                                        </div></th>
											<th><div class="switch">
                                            <label><input id ="toggle"  name="<?php echo $row2['staffManagement']; ?>" type="checkbox" <?php if($row2['staffManagement']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-green"></span></label>
                                        </div></th>
                                            <th><div class="switch">
                                            <label><input id ="toggle"  name="<?php echo $row2['attendance']; ?>" type="checkbox" <?php if($row2['attendance']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-green"></span></label>
                                        </div></th>
										<th><button value="updateLevel" name="update" class="btn btn-primary waves-effect" type="submit">UPDATE</button><button class="btn btn-danger waves-effect" type="submit">DELETE</button></th>
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
							
						<div id = "stage" style = "background-color:cc0;">
         STAGE
      </div>	
							
       
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
		



		
</body>

</html>
