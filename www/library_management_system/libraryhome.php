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
            <div class="block-header">
                <h2>Library Dashboard</h2>
            </div>

			            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                Library System Management Home
                            </h2></b>
                        </div>
                        <div class="body">
							<div class="row clearfix demo-button-sizes">
                                <div class="col-sm-4">
                                    <button type="button" class="btn bg-deep-purple btn-block btn-lg waves-effect" onclick="location.href='librarybooksmain.php';" value="Go to Books"><i class = "material-icons">book</i>&nbsp&nbsp&nbsp BOOKS</button>
                                </div>

								<div class="col-sm-4">
                                    <button type="button" class="btn bg-indigo btn-block btn-lg waves-effect" onclick="location.href='librarymembersmain.php';"><i class = "material-icons">people</i>&nbsp&nbsp&nbsp MEMBERS</button>
                                </div>
								<div class="col-sm-4">
                                    <button type="button" class="btn bg-blue btn-block btn-lg waves-effect" onclick="location.href='libraryborrowreturnmain.php';"><i class = "material-icons">cached</i>&nbsp&nbsp&nbsp BORROW/RETURN</button>
                                </div>
								<div class="col-sm-4">
                                    <button type="button" class="btn bg-light-blue btn-block btn-lg waves-effect" onclick="location.href='libraryreport.php';"><i class = "material-icons">assessment</i>	&nbsp&nbsp&nbsp REPORTS</button>
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
