<?php 

?>
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
	<!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />


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
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><font color="green" style="bold">
                                EXAM DETAILS
                            </h2></font>
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Module name</th>
                                            <th>Course name</th>
                                            <th>Exam Type</th>
											<th>Place</th>
                                            <th>Start Time</th>
                                            <th>Duration</th> 
											<th>Description</th>
                                        </tr>
                                    </thead>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                      
	<!--  Main page content ----------------------------->
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		 <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

		
</body>

</html>
