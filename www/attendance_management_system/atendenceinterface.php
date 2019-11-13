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
			<!-- Bootstrap Default Buttons -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BOOTSTRAP DEFAULT BUTTONS
                                <small>Use any of the available button classes to quickly create a styled button</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
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
                            <div class="button-demo">
                                
                                <button type="button" class="btn btn-primary waves-effect" onclick="location.href='student_search.php';" >student atendence</button>
                                <button type="button" class="btn btn-success waves-effect"onclick="location.href='staff_search.php';">Staff atendence</button>
                                <button type="button" class="btn btn-info waves-effect"onclick="location.href='inqsearch.php';">INFO</button>
                                <button type="button" class="btn btn-warning waves-effect">WARNING</button>
                                <button type="button" class="btn btn-danger waves-effect">DANGER</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Bootstrap Default Buttons -->
       
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
		



		
</body>

</html>
