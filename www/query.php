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
	$result = '';
	$flag = '-1';
	
	if(isset($_POST['run']) && !empty($_POST['query'])){ 
        // 
        $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); 
		$query = $_POST['query'];
		
		
        if ($mysqli->connect_errno) { 
        $result =  'Failed to connect to MySQL: (' . $mysqli->connect_errno . ')' . $mysqli->connect_error;  
		$flag = 0;
    }
	
	$query = $_POST['query'];
	if (strpos($query, ' drop ') !== false || strpos($query, ' delete ') !== false || strpos($query, ' insert ') !== false || strpos($query, 'drop ') !== false || strpos($query, 'delete ') !== false || strpos($query, 'insert ') !== false) {
		$flag = 0;
        $result =  'something went wrong executing your query. It may contain some restricted commands!';
	}else{
		
		// proceed to screw this database up 
		$exec = $mysqli->query($_POST['query']);
		if(!$exec){// always trust your users... :P 
			$flag = 0;
			$result =  'something went wrong executing ('.$mysqli->errno.''.$mysqli->error.')'; 
		}else{ 
			$result = 'Succesfully executed: <b>'.$_POST['query'].'</b>'; 
			$flag = 1;
		} 
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
            <div class="block-header">
                <h2>SQL Query Runner</h2>
            </div>
			This interface will help you to run SQL Query.<small>[WARNING! This function will result unexpected system downtime. Please check the query before running. DROP, INSERT and DELETE commands are restricted]</small>
			
			<hr>
			<!-- Main page content  ----------------------------->
			<!-- Textarea -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>SQL Runner</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
									<form action="query.php" name = "query" method="POST">
                                        <div class="form-line">
                                            <textarea reqired rows="10" class="form-control no-resize" name="query" value="" placeholder="Input your SQL Query here and Run it on the server..."><?php if(isset($query))echo $query; ?></textarea>
                                        </div>
										 <div class="form-line">
										<input type="submit" class="btn btn-danger m-t-15 waves-effect" name="run" value="RUN SQL" />
										</div>
										</form>
                                    </div>
                                </div>
                            </div>
							<div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php echo $result; ?>
                            </div>
						
								<?php 
									function print_array($aArray) {
									  echo 'Response: <pre>';
									  print_r($aArray);
									  echo '</pre>';
									}
								if(isset($exec)){
								print_array($exec);
								}
								?> 
								
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Textarea -->
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
