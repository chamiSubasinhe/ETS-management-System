<?php 
//page by S.L.Weldeniya
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

	
<!DOCTYPE html>
<html>

	<!-- Page head --------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Loader -->
	
	    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	
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
	<!-- Main page content  ----------------------------->
        <div class="container-fluid">

			    <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                Borrow/Return
                            </h2></b>
                        </div>
              
                        <div class="body">
							<div class="row clearfix demo-button-sizes">
                                <div class="col-sm-6">
                                    <button type="button" class="btn bg-deep-purple btn-block btn-lg waves-effect" onclick="location.href='libraryborrowform.php';" value="Go to add members"><i class = "material-icons">check</i>	BORROW</button>
                                </div>

								<div class="col-sm-6">
                                    <button type="button" class="btn bg-red btn-block btn-lg waves-effect" onclick="location.href='libraryreturnbook.php';" ><i class = "material-icons">close</i>	RETURN</button>
                                </div>
								<div class="col-sm-6">
                                    <button type="button" class="btn bg-teal btn-block btn-lg waves-effect" onclick="location.href='libraryviewreturntables.php';" ><i class = "material-icons">remove_red_eye</i>	BORROW/RETURN TABLES
								</button>
                                </div>
								<div class="col-sm-6">
                                    <button type="button" class="btn bg-green btn-block btn-lg waves-effect" onclick="location.href='pending.php';" ><i class = "material-icons">close</i>	PENDING BOOKS
								</button>
                                </div>


		

                        </div>
                    </div>
                </div>
            </div>
			
			<hr>
			
			
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>