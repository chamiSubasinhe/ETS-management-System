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
    <?php //include 'static/searchbar.php';?>
    <!-- #END# Search Bar -->
	
    <!-- Top Bar ---------------------------------------->
    <?php //include 'static/topnav.php';?>
    <!-- #Top Bar -->
   
	
	
	
    <section class="content">
	<!-- Main page content  ----------------------------->
        <div class="container-fluid">
            <div class="block-header">
                <h2>Warning!</h2>
            </div>
			Initial System Installation | <small>This installation will result serious damages unless you do not follow the instuction carefully. Please read the user mannual befor the installation</small>
			
			<hr>
			<!-- Basic Example | Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Institute Management System - Installation</h2>
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
                            <div id="wizard_horizontal">
                                <h2>Syetem Check</h2>
                                <section>
                                    <p>
                                        PHP Version:
										<br>
										Connectivity Speed:
										<br>
										
                                    </p>
                                </section>

                                <h2>Install Database</h2>
                                <section>
                                    <p>
                                       credentials:
									   <br>
									   check databse:
									   <br>
									   create databse
                                    </p>

                                </section>

                                <h2>Install System</h2>
                                <section>
                                    <p>
                                        directory:
										<br>
										check date
										<br>
										Install
                                    </p>
                                </section>

                                <h2>Finalize</h2>
                                <section>
                                    <p>
                                        Check list:
										<br>
										delete install file
										<br>
										finalize
                                    </p>
									<li>
                        <a href="index.php">
                            <i class="material-icons"></i>
                            <span>Go to the system</span>
                        </a>
                    </li>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Example | Horizontal Layout -->
			
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
