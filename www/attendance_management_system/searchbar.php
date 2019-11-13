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
	
	<head>
		<title>searchbar</title>
			<link rel="stylesheet" href="css/style.css"/>
			<script type="text/javascript">
				function active(){
					var searchbar= document.getElementById('searchbar');
					if(searchbar.value == 'search...'){
						searchbar.value =''
						searchbar.placeholder = 'search...'
						
					}
				}
				function inactive(){
					var searchbar= document.getElementById('searchbar');
					if(searchbar.value == ''){
						searchbar.value ='search...'
						searchbar.placeholder = ''
						
					}
				}
			</script>
			<style>
				#searchbar{
						border:1px solid #000000;
						border-right:none;
						font-size:16px;
						padding:10px;
						outline:none;
						width:250px;
						-webkit-border-top-left-radius:10px;
						-webkit-border-bottom-left-radius:10px;
						-moz-border-radius-topleft:10px;
						-moz-border-radius-bottomleft:10px;
						border-top-left-radius:10px;
						border-bottom-left-radius:10px;
						
	
					}
				#searchBtn{
						border:1px solid #000000;
						font-size:16px;   
						padding:10px;
						background:#f1d829;
						font-weight:bold;
						cursor:pointer;
						outline:none;
						-webkit-border-top-right-radius:10px;
						-webkit-border-bottom-right-radius:10px;
						-moz-border-radius-topright:10px;
						-moz-border-radius-bottomright:10px;
						border-top-right-radius:10px;
						border-bottom-right-radius:10px;
						
						
						
					}
				#searchBtn:hover{
					background:#f6e049;
				}	
				
			</style>
		
	
	
	</head>
	
	
	
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
			
			<form action="searchbar.php" method="post"> 
			<input type="text" id="searchbar" placeholder="" value="search..." maxlength="25" autoComplete="off" onMouseDown="active();" onBlur="inactive();"/><input type="submit" id="searchBtn" value="go!"/>
		</form>
			
		<?php
			$query=mysqli_query("SELECT * FROM staffattendence");
			$num_rows=mysqli_num_rows($query);
			echo $num_rows;
		
		?>	
       
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
		



		
</body>

</html>
