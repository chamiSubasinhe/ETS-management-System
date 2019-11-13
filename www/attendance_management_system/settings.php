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
	
	//Insert
	if(isset($_POST['insertSetting']))
	{
		$variableSetting = $_POST['variableNew'];
		$valueSetting = $_POST['valueNew'];
		$staticSetting = $_POST['staticNew'];
		$insertSetting="INSERT INTO settings(variable, value, static) values('".$variableSetting."','".$valueSetting."','".$staticSetting."')";
	
		// proceed to screw this database up 
		$exec = mysqli_query($conn,$insertSetting);
		if(!$exec){// always trust your users... :P 
			$flag = 0;
			$result =  'something went wrong executing'; 
		}else{ 
			$result = 'Succesfully executed:'; 
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
			$result =  'something went wrong updating'; 
		}else{ 
			$result = 'Succesfully updated:'; 
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
                <h2>Global Settings</h2>
            </div>
			This interface will show Global variables of the system. <small>[You are allowed to update only non-static variables. Static variables are default non-removeable] Any variable is accessible via settingsArr[index] array</small>
			
			<hr>
			<div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="2000" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php echo $result; ?>
                            </div>
							<?php

// current time
echo date('h:i:s') . "\n";
$loadingMSG = 'Executing...';
// sleep for 10 seconds
sleep(10);
$loadingMSG = 'wait Executing...';
// wake up !
echo date('h:i:s') . "\n";

?>
			<!-- Main page content  ----------------------------->
			<form name="updateForm" action="" method="POST" >
			<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
			<tr>
                                            <td><input type="text" class="form-control" name="variableNew" maxlength="100" minlength="3" required></td>
                                            <td><input type="text" class="form-control" name="valueNew" maxlength="200" minlength="1" required></td>
                                            <td><select required name="staticNew" class="form-control show-tick">
                                        <option value="0" >Non-Static</option>
                                        <option value="1" >Static</option>
                                    </select></td>
											<td><input type="text" name="created" value="<?php echo date("Y-m-d h:i:sa"); ?>" class="form-control" name="minmaxlength" maxlength="10" minlength="3" disabled></td>
											<td><input type="submit"  value="Add" name="insertSetting" class="btn btn-success"/></td>
             
									</tr>
									</table>
			</form>
			<div class="table-responsive">
			
			
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
											<th>Variable #</th>
                                            <th>Variable</th>
                                            <th>Value</th>
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
                                            <th>Type</th>
											<th>Assigned Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
									
									
									<?php
				
		$query2=mysqli_query($conn,"select * from settings group by created DESC");
		while($row2=mysqli_fetch_array($query2)){
			?>
					<form action="" name="update" method="POST" >
                                        <tr>
										<td> <?php echo $row2['varId']; ?><input id="varIdNew" style="display: none;" type="text" name="varId" value="<?php echo $row2['varId']; ?>" class="form-control"></td>
                                            <td> <?php if($row2['static']==1 || $row2['static']==2) echo $row2['variable']; ?><input id="variableNew" <?php if($row2['static']==1 || $row2['static']==2){ echo 'style="display: none;"';} ?> type="text" name="variableNew" value="<?php echo $row2['variable']; ?>" class="form-control"></td>
                                            <td><input  <?php if($row2['static']==2){ echo 'disabled';} ?> type="text" name="valueNew" value="<?php echo $row2['value']; ?>" class="form-control"></td>
											<td><?php if($row2['static']==1){ echo 'Static';}else if($row2['static']==0){ echo 'Non-Static';}else { echo 'Default';} ?></td>
                                            <td><?php echo date("Y-m-d h:i:sa",strtotime($row2['created'])); ?></td>
											<td><?php if($row2['static']==1){?><input type="submit"  value="Update" name="updateSetting" class="btn btn-alert"/><?php }else if($row2['static']==0){ ?><input type="submit"  value="Update" name="updateSetting" class="btn btn-alert"/><input type="submit"  value="Delete" name="deleteSetting" class="btn btn-danger"/><?php }else echo'Non-Removable'; ?></td>
                                        </tr>
					</form>

	<?php
		}
	?> 
									
									
                                    
                                    </tbody>
                                </table>
                            </div>
							
       
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
		



		
</body>

</html>
