<?php 
/*
* Google Metirial Design Template designed Asiri Hewage
* asiriofficial@gmail.com
* All Rights Reserved C 2018
* http://asirihewage.business.site
*/
?>

<?php $loadingMSG = 'Query compiler is initialing...'; ?>

<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	
<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->
	
		<!-- Load session variables ---------------------------------------->
	<?php include 'static/session.php';?>
	<!--# End Load session variables -->
	
<?php
$message ='';
$flag = '';
	//Insert
	if(isset($_POST['assign']))
	{
		$authId = mysqli_real_escape_string($conn, $_POST['authId']);
		$UID = mysqli_real_escape_string($conn,$_POST['UID']);
		$insertAuth="INSERT INTO users(authId,UID) values('".$authId."','".$UID."')";
		
		// proceed to screw this database up 
		$exec = mysqli_query($conn,$insertAuth);
		if(!$exec){// always trust your users... :P 
			$flag = 0;
			$message =  'Can not assign. User already have priviladges for user level '.$authId; 
		}else{ 
			error_log("\n User ".$UID." has recieved the access level ".$authId." on ".date("l").": ".date("Y-m-d h:i:sa"), 3, "SystemLogs/Logger-Settings.log");
			$message =$UID." has now access level ".$authId;
			$flag =1;
		} 
	}
	

?>

	
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
            
			<!-- Main page content  ----------------------------->
		 <!-- Checkbox -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add New Role
                            </h2>
                        </div>
                        <div class="body">
						<form action="" method="POST" >
                            <h2 class="card-inside-title">Assign Privilages</h2>
                           <div class="row clearfix">
                                <div class="col-sm-6">
                                    <select name="UID" class="form-control show-tick">
                                        <option value="">-- Please select user --</option>
                                        <?php
		$query2=mysqli_query($conn,"select staffId,nameWithInit from staff");
		while($row2=mysqli_fetch_array($query2)){
			?>
                                        <option value="<?php echo $row2['staffId']; ?>"><?php echo $row2['nameWithInit']; ?></option>
										<?php
		}
	?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <select name="authId" class="form-control">
									<option value="">Auth Level</option>
										<?php
		$query3=mysqli_query($conn,"select authId, name from authlevels");
		while($row3=mysqli_fetch_array($query3)){
			?>
                                        <option value="<?php echo $row3['authId']; ?>"><?php echo $row3['name']; ?></option>
										<?php
		}
	?>
                                    </select>
                                </div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <button type="submit" value="submit" name="assign" class="btn btn-primary btn-lg m-l-15 waves-effect">Assign Privilages</button>
                                    </div>
                            </div>
							</form>
							<div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
						<?php echo $message; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Checkbox -->
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
