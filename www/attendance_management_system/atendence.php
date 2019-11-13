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




<?php
	
if(isset($_post['submit'])){
	
	$search =$_post['search'];
	$search = preg_replace("#[^0-9a-z]#i",$searchq);
	
	$query = mysql_Query("select* from staffattendence where staffID like '%$searchq%' or arrivalTime like '%searchq%' ")or die("cod not serch ");
	
	$count=mysql_num_rows($query);
	
	if($count == 0){
		
		$output='there no result';
		
	}
	else{
		
		while($row =mysql_fetch_array($query)){
			$staffID=$row['staffID'];
			$arrivalTime=$row['arrivalTime'];
			
			$output .='<div>'.$staffID.''.$arrivalTime.'</div>';
			 
		}
	}
	
}




?>

 <?phpprint("$output"); ?>





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
	<?php include '../static/head.php';?>
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
							




			<!-- Main page content  ----------------------------->
			
       
	   <form action="atendence.php" method="post">
	    <input type="text" name ="search" placeholder="sarch for atendence"/>
		<input type="submit" name="submit" value ="click"/>
	   
		 
	   </form>
	   
	   
	   <?phpprint("$output"); ?>
	   
	   
	   
	   
	   
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include '../static/scripts.php';?>
		<!-- #END# Javascript  -->
		
		



		
</body>

</html>
