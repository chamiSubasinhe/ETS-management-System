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
	

<?php
	$result = '';
	$flag = '-1';
	
	//Insert
	if(isset($_POST['insertSetting']))
	{
		$variableSetting = mysqli_real_escape_string($conn,str_replace(' ', '_', trim($_POST['variableNew'], " ")));
		$valueSetting = mysqli_real_escape_string($conn,$_POST['valueNew']);
		$staticSetting = mysqli_real_escape_string($conn,$_POST['staticNew']);
		$insertSetting="INSERT INTO settings(variable, value, static) values('".$variableSetting."','".$valueSetting."','".$staticSetting."')";
	
		// proceed to screw this database up 
		$exec = mysqli_query($conn,$insertSetting);
		if(!$exec){// always trust your users... :P 
			$flag = 0;
			$result =  'something went wrong adding variable'; 
			error_log("\n ".$sessionArr["name_with_init"]." could not add Variable ".$variableSetting." Value: ".$valueSettingon." on ".date("l").": ".date("Y-m-d h:i:sa"), 3, "SystemLogs/Logger-Settings.log");
		}else{ 
			if($staticSetting==1){ $type = 'Static';}else if($staticSetting==0){ $type = 'Non-Static';}else { $type = 'Default';}
			$result = 'Succesfully added '.$type.' variable:'.$variableSetting.' Value: '.$valueSetting; 
			$flag = 1;
			error_log("\n Succesfully added ".$type." variable:".$variableSetting." Value: ".$valueSettingon." on ".date("l").": ".date("Y-m-d h:i:sa"), 3, "SystemLogs/Logger-Settings.log");
		} 
	}

?>
<!--# End Load Settings CRUDE -->

	
<!DOCTYPE html>
<html>

	<!-- Page head   /// With bodY OPENNING TAG--------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Header  -->
	



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
			
			<!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                             <h2>
                                Add New Global Variable
                            </h2>
							This interface allows you to set Global variables of the system. <small>[You are allowed to update only non-static variables. Static variables are default non-removeable]</small>
			<div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
						<?php echo $result; ?>
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
                            <form action="newvariable.php" id="form_validation" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="variableNew" required>
                                        <label class="form-label">Variable Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control"name="valueNew" required>
                                        <label class="form-label">Value</label>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <input type="radio" name="staticNew" id="male" value="1" class="with-gap">
                                    <label for="male">Static</label>

                                    <input type="radio" name="staticNew" id="female" value="0" class="with-gap">
                                    <label for="female" class="m-l-20">Non Static</label>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit" value="Add" name="insertSetting">Set Variable</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
			
			
			<!-- Changelogs -->
            <div class="block-header">
                <h2>CHANGELOGS</h2>
            </div>
				<?php
				$i=0;
		$query2=mysqli_query($conn,"select * from settings Group by updated order by updated DESC LIMIT 3");
		while($row2=mysqli_fetch_array($query2)){
			$i++;
			?>

  <div class="col-12">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php echo $row2['variable']; ?>
                                <small>Last Update:<?php echo $row2['updated']; ?></small>
                            </h2><button class="btn waves-effect m-b-15" type="button" data-toggle="collapse" data-target="#collapseExample<?php echo $i;?>" aria-expanded="false"
                                    aria-controls="collapseExample<?php echo $i;?>">
                                View Details
                            </button>
                        </div>
						
                            <div class="collapse" id="collapseExample<?php echo $i;?>">
                                <div class="well">
                                   <p>- Variable <?php echo $row2['variable']; ?> was created on <?php echo $row2['created']; ?> and last update was on <?php echo $row2['updated']; ?></p>
                            <p>- Variable value updated to <?php echo $row2['value']; ?></p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

	<?php
		}
	?> 
	<center>
	<div class="center col-2">
                <a href="changelogs.php"><button type="button" class="btn btn-default waves-effect">View More... <img width="32" src="images/icons/settings.gif" /></button></a>
    </div>
	<center>
			
			
			
       
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
		



		
</body>

</html>
