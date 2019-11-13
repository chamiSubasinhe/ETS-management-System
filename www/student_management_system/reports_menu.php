<?php 


?>
<?php// $loadingMSG = 'Query compiler is initialing...'; ?>

<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	
<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->

	
	<!-- Load system variables ---------------------------------------->
	<?php include 'static/session.php';?>
	<!--# End Load system variables -->

	
<!DOCTYPE html>
<html>

	<!-- Page head --------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Loader -->
	
<body class="theme-red">

    <!-- Page Loader ------------------------------------>
	<?php// include 'static/preloader.php';?>
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
	<!-- Main page content  ----------------------------->
        <div class="container-fluid">
            <div class="block-header">
                <h2>REPORT MENU IN STUDENT MANAGEMENT SYSTEM</h2>
            </div>
			
			
			<hr>


            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                <div class="demo-color-box bg-cyan" >
                    <a href="studentReport.php" style = "text-decoration:none; color :floralwhite;">
                        <div class="color-name">STUDENT DETAILS REPORT</div>

                        <div class="color-code"></div>
                        <div class="color-class-name"></div>
                </div>
            </div>
			
			
			
			
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3"> 
			 <div class="demo-color-box bg-purple">
			
              
                    <a href="resultReport.php" style = "text-decoration:none; color :floralwhite;">
                        <div class="color-name">EXAM RESULT DETILS REPORT</div>

                        <div class="color-code"></div>
                        <div class="color-class-name"></div>
                </div>
            </div>



            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
			<div class="demo-color-box bg-light-green">
                    <a href="CertificateReport.php" style = "text-decoration:none; color :floralwhite;">
                        <div class="color-name">CERTIFICATE DETAILS REPORT</div>
                        <div class="color-code"></div>
                        <div class="color-class-name"></div>
                </div>
            </div>
			
			
	<!--  Main page content ----------------------------->
	</div>
    </section>
	

	
	
	
	
	

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
