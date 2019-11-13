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
	
<!-- Check logger files ---------------------------------------->
	<?php
	
	if(isset($_GET["unlink"])){
		unlink('SystemLogs/Logger-'.$_GET["unlink"].'.log');
	}
	
	$LoggerLogin = 'SystemLogs/Logger-Login.log';
	$LoggerRegister = 'SystemLogs/Logger-Register.log';
	$LoggerSettings = 'SystemLogs/Logger-Settings.log';
	$LoggerCourseManagement = 'SystemLogs/Logger-CourseManagement.log';
	$LoggerLibraryManagement = 'SystemLogs/Logger-LibraryManagement.log';
	$LoggerStaffManagement = 'SystemLogs/Logger-StaffManagement.log';
	$LoggerStudentManagement = 'SystemLogs/Logger-StudentManagement.log';
	$LoggerFinancialManagement = 'SystemLogs/Logger-FinancialManagement.log';
	$LoggerInventoryManagement = 'SystemLogs/Logger-InventoryManagement.log';
    $contents = 'Logger Started on '.date("l").': '.date("Y-m-d h:i:sa");
	
	if(!is_file($LoggerLogin)){
    file_put_contents($LoggerLogin, $contents);
	}
	else if(!is_file($LoggerRegister)){
    file_put_contents($LoggerRegister, $contents);
	}
	else if(!is_file($LoggerSettings)){
    file_put_contents($LoggerSettings, $contents);
	}
	else if(!is_file($LoggerCourseManagement)){
    file_put_contents($LoggerCourseManagement, $contents);
	}
	else if(!is_file($LoggerLibraryManagement)){
    file_put_contents($LoggerLibraryManagement, $contents);
	}
	else if(!is_file($LoggerStaffManagement)){
    file_put_contents($LoggerStaffManagement, $contents);
	}
	else if(!is_file($LoggerStudentManagement)){
    file_put_contents($LoggerStudentManagement, $contents);
	}
	else if(!is_file($LoggerFinancialManagement)){
    file_put_contents($LoggerFinancialManagement, $contents);
	}
	else if(!is_file($LoggerInventoryManagement)){
    file_put_contents($LoggerInventoryManagement, $contents);
	}
	
	?>
<!-- end Check logger files ---------------------------------------->	
	
	
	
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
			

			<!-- Change log - login -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ChangeLog : Login
                                <small><?php echo 'Change log contains '.filesize('SystemLogs/Logger-Login.log').' bytes of data'; ?></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="Logger.php?unlink=Login">Clear Data</a></li>
                                        <li><a href="javascript:void(0);">Refresh</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ul class="list-group">
									<?php
			
			$file = file("SystemLogs/Logger-Login.log");
			$x=0;
if ($file) {
	
for ($i = max(0, count($file)-5); $i < count($file); $i++) {
	echo '<li class="list-group-item">'.$file[$i].'</li>';
}

} 
?>
                            </ul>
							
                        </div>
                    </div>
                </div>
                <!-- #END# Change log - login -->
				
				
				
				
				
				 <!-- Change log - register -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ChangeLog : Registration
                                <small><?php echo 'Change log contains '.filesize('SystemLogs/Logger-Register.log').' bytes of data'; ?></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="Logger.php?unlink=Register">Clear Data</a></li>
                                        <li><a href="javascript:void(0);">Refresh</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ul class="list-group">
									<?php
			
			$file = file("SystemLogs/Logger-Register.log");
			$x=0;
if ($file) {
	
for ($i = max(0, count($file)-5); $i < count($file); $i++) {
	echo '<li class="list-group-item">'.$file[$i].'</li>';
}

} 
?>
                            </ul>
							
                        </div>
                    </div>
                </div>
                <!-- #END# Change log - register -->
				
				
				
				
				
				 <!-- Change log - settings -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ChangeLog : Settings
                                <small><?php echo 'Change log contains '.filesize('SystemLogs/Logger-Settings.log').' bytes of data'; ?></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="Logger.php?unlink=Settings">Clear Data</a></li>
                                        <li><a href="javascript:void(0);">Refresh</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ul class="list-group">
									<?php
			
			$file = file("SystemLogs/Logger-Settings.log");
			$x=0;
if ($file) {
	
for ($i = max(0, count($file)-5); $i < count($file); $i++) {
	echo '<li class="list-group-item">'.$file[$i].'</li>';
}

} 
?>
                            </ul>
							
                        </div>
                    </div>
                </div>
                <!-- #END# Change log - settings -->
				
				
				
				
				
				
				 <!-- Change log - course management -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ChangeLog : Course Managment
                                <small><?php echo 'Change log contains '.filesize('SystemLogs/Logger-CourseManagement.log').' bytes of data'; ?></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="Logger.php?unlink=CourseManagement">Clear Data</a></li>
                                        <li><a href="javascript:void(0);">Refresh</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ul class="list-group">
									<?php
			
			$file = file("SystemLogs/Logger-CourseManagement.log");
			$x=0;
if ($file) {
	
for ($i = max(0, count($file)-5); $i < count($file); $i++) {
	echo '<li class="list-group-item">'.$file[$i].'</li>';
}

} 
?>
                            </ul>
							
                        </div>
                    </div>
                </div>
                <!-- #END# Change log - CourseManagement management -->
		
				
				
				
				 <!-- Change log - course management -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ChangeLog : Inventory Managment
                                <small><?php echo 'Change log contains '.filesize('SystemLogs/Logger-CourseManagement.log').' bytes of data'; ?></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="Logger.php?unlink=CourseManagement">Clear Data</a></li>
                                        <li><a href="javascript:void(0);">Refresh</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ul class="list-group">
									<?php
			
			$file = file("SystemLogs/Logger-InventoryManagement.log");
			$x=0;
if ($file) {
	
for ($i = max(0, count($file)-5); $i < count($file); $i++) {
	echo '<li class="list-group-item">'.$file[$i].'</li>';
}

} 
?>
                            </ul>
							
                        </div>
                    </div>
                </div>
                <!-- #END# Change log - CourseManagement management -->
				
				
				
				 <!-- Change log - course management -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ChangeLog : Library Managment
                                <small><?php echo 'Change log contains '.filesize('SystemLogs/Logger-CourseManagement.log').' bytes of data'; ?></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="Logger.php?unlink=CourseManagement">Clear Data</a></li>
                                        <li><a href="javascript:void(0);">Refresh</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ul class="list-group">
									<?php
			
			$file = file("SystemLogs/Logger-LibraryManagement.log");
			$x=0;
if ($file) {
	
for ($i = max(0, count($file)-5); $i < count($file); $i++) {
	echo '<li class="list-group-item">'.$file[$i].'</li>';
}

} 
?>
                            </ul>
							
                        </div>
                    </div>
                </div>
                <!-- #END# Change log - CourseManagement management -->
				
				
				
				 <!-- Change log - course management -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ChangeLog : Staff Managment
                                <small><?php echo 'Change log contains '.filesize('SystemLogs/Logger-CourseManagement.log').' bytes of data'; ?></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="Logger.php?unlink=CourseManagement">Clear Data</a></li>
                                        <li><a href="javascript:void(0);">Refresh</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ul class="list-group">
									<?php
			
			$file = file("SystemLogs/Logger-StaffManagement.log");
			$x=0;
if ($file) {
	
for ($i = max(0, count($file)-5); $i < count($file); $i++) {
	echo '<li class="list-group-item">'.$file[$i].'</li>';
}

} 
?>
                            </ul>
							
                        </div>
                    </div>
                </div>
                <!-- #END# Change log - CourseManagement management -->
				
				
				 <!-- Change log - course management -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ChangeLog : Student Managment
                                <small><?php echo 'Change log contains '.filesize('SystemLogs/Logger-CourseManagement.log').' bytes of data'; ?></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="Logger.php?unlink=CourseManagement">Clear Data</a></li>
                                        <li><a href="javascript:void(0);">Refresh</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ul class="list-group">
									<?php
			
			$file = file("SystemLogs/Logger-StudentManagement.log");
			$x=0;
if ($file) {
	
for ($i = max(0, count($file)-5); $i < count($file); $i++) {
	echo '<li class="list-group-item">'.$file[$i].'</li>';
}

} 
?>
                            </ul>
							
                        </div>
                    </div>
                </div>
                <!-- #END# Change log - CourseManagement management -->
			
			
			 <!-- Change log - course management -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ChangeLog : Financial Managment
                                <small><?php echo 'Change log contains '.filesize('SystemLogs/Logger-CourseManagement.log').' bytes of data'; ?></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="Logger.php?unlink=CourseManagement">Clear Data</a></li>
                                        <li><a href="javascript:void(0);">Refresh</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ul class="list-group">
									<?php
			
			$file = file("SystemLogs/Logger-FinancialManagement.log");
			$x=0;
if ($file) {
	
for ($i = max(0, count($file)-5); $i < count($file); $i++) {
	echo '<li class="list-group-item">'.$file[$i].'</li>';
}

} 
?>
                            </ul>
							
                        </div>
                    </div>
                </div>
                <!-- #END# Change log - CourseManagement management -->
				
				
				
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
