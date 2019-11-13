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
	

<!-- Load Settings CRUDE ---------------------------------------->	
<?php
	$result = '';
	$flag = '-1';
	
	//Insert
	if(isset($_POST['insertSetting']))
	{
		$variableSetting = mysqli_real_escape_string($conn, str_replace(' ', '_', trim($_POST['variableNew'], " ")));
		$valueSetting = mysqli_real_escape_string($conn,$_POST['valueNew']);
		$staticSetting = mysqli_real_escape_string($conn, $_POST['staticNew']);
		$insertSetting="INSERT INTO settings(variable, value, static) values('".$variableSetting."','".$valueSetting."','".$staticSetting."')";
		
		// proceed to screw this database up 
		$exec = mysqli_query($conn,$insertSetting);
		if(!$exec){// always trust your users... :P 
			$flag = 0;
			$result =  'something went wrong executing'; 
		}else{ 
			$result = 'Succesfully executed:'; 
			error_log("\n Variable ".$variableSetting." inserted with the value ".$valueSetting." on ".date("l").": ".date("Y-m-d h:i:sa"), 3, "SystemLogs/Logger-Settings.log");
			$flag = 1;
		} 
	}
	
	//Update 
	if(isset($_POST['updateSetting']))
	{
		$varId = $_POST['varId'];
		$variableSetting = $_POST['variableNew'];
		$valueSetting = $_POST['valueNew'];
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
			error_log("\n Variable ".$variableSetting." was changed to ".$valueSetting." on ".date("l").": ".date("Y-m-d h:i:sa"), 3, "SystemLogs/Logger-Settings.log");
			$flag = 1;
		} 
	}
	
	
	
	//Delete 
	if(isset($_POST['deleteSetting']))
	{
		$varId = $_POST['varId'];
		$variableSetting = $_POST['variableNew'];
		$updateSetting="DELETE FROM settings WHERE varId='".$varId."'";
		
		// proceed to screw this database up 
		$loadingMSG = 'Executing...';
		$exec = mysqli_query($conn,$updateSetting);
		if(!$exec){// always trust your users... :P 
			$flag = 0;
			$result =  'something went wrong deleting'; 
		}else{ 
			error_log("\n Variable ".$varId." was deleted on ".date("l").": ".date("Y-m-d h:i:sa"), 3, "SystemLogs/Logger-Register.log");
			$result = 'Succesfully Deleted variable:'.$variableSetting; 
			$notification = 'Succesfully Deleted variable:'.$variableSetting; 
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
	<?php // include 'static/preloader.php';?>
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
                                Global Variable
                            </h2>
							This interface will show Global variables of the system. Any variable is accessible via <b>$settingsArr[index]</b> array
							
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
											<th>Variable #</th>
                                            <th>Variable</th>
                                            <th>Value</th>
                                            <th>Usability</th>
											<th>Type</th>
											<th>Assigned Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>Variable #</th>
                                            <th>Variable</th>
                                            <th>Value</th>
                                            <th>Usability</th>
											<th>Type</th>
											<th>Assigned Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
				
		$query2=mysqli_query($conn,"select * from settings");
		while($row2=mysqli_fetch_array($query2)){
			?>
					
                                        <tr>
										<form action="" name="update" method="POST" >
										<td> <?php echo $row2['varId']; ?><input id="varIdNew" style="display: none;" type="text" name="varId" value="<?php echo $row2['varId']; ?>" class="form-control"></td>
                                            <td> <?php if($row2['static']==1 || $row2['static']==2) echo $row2['variable']; ?><input id="variableNew" <?php if($row2['static']==1 || $row2['static']==2){ echo 'style="display: none;"';} ?> type="text" name="variableNew" value="<?php echo $row2['variable']; ?>" class="form-control"></td>
                                            <td><input  <?php if($row2['static']==2){ echo 'disabled';} ?> type="text" name="valueNew" value="<?php echo $row2['value']; ?>" class="form-control"></td>
											<td><?php if($row2['static']==1){ echo 'Static';}else if($row2['static']==0){ echo 'Non-Static';}else { echo 'Default';} ?></td>
                                            <td><?php if($row2['type']=='number'){ echo 'number';}else if($row2['type']=='text'){ echo 'text';}else if($row2['color']=='color') { echo 'color';} ?></td><td><?php echo date("Y-m-d h:i:sa",strtotime($row2['created'])); ?></td>
											<td><?php if($row2['static']==1){?><input data-toggle="tooltip" data-placement="right" title="Click to update" type="submit"  value="Update" name="updateSetting" class="btn btn-alert"/><?php }else if($row2['static']==0){ ?><input type="submit"  data-toggle="tooltip" data-placement="right" title="Click to update" value="Update" name="updateSetting" class="btn btn-alert"/><input type="submit"  value="Delete" name="deleteSetting" data-toggle="tooltip" data-placement="right" title="Click to delete" class="btn btn-danger"/><?php }else echo'Non-Removable'; ?></td>
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
