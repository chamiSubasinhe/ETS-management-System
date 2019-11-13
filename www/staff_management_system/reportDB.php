<?php 
//created by H M Y L W BANDARA

?>
<!DOCTYPE html>
<html>

	<!-- Page head --------------------------------------->
	<?php include 'head.php';?>
	<!--# end Page Loader -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">
	
<body class="theme-blue">

    <!-- Page Loader ------------------------------------>
	<?php include 'preloader.php';?>
    <!-- #END# Page Loader -->
	
    <!-- Overlay For Sidebars --------------------------->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
	
    <!-- Search Bar ------------------------------------->
    <?php include 'searchbar.php';?>
    <!-- #END# Search Bar -->
	
    <!-- Top Bar ---------------------------------------->
    <?php include 'topnav.php';?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -------------------------------->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info ---------------------->
			<?php include 'userinfo.php';?>
            <!-- #User Info -->
			
            <!-- Menu --------------------------->
			<?php include 'menu.php';?>
            <!-- #Menu -->
			
            <!-- Footer ------------------------->
            <?php include 'footer.php';?>
            <!-- #Footer -->
			
        </aside>
        <!-- #END# Left Sidebar -->
		
        <!-- Right Sidebar ----------------------------->
        <?php include 'rightsidebar.php';?>
        <!-- #END# Right Sidebar -->
		
    </section>



    <section class="content">
        
        <!-- Main page content  ----------------------------->
        <div class="container-fluid">
            <div class="block-header"><h2> Reports Dashboard</h2></div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header"><h2><b>Reports Dashboard</b></h2></div>
                        <div class="body">
                            <div class="row clearfix demo-button-sizes">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <button type="button" class="btn bg-deep-purple btn-block btn-lg waves-effect" onclick="location.href='SalaryExpenseReport.php';" value="Go to Books"><i class = "material-icons">person_add</i>&nbsp&nbsp&nbsp TOTAL SALARY EXPENSES</button>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <button type="button" class="btn bg-deep-purple btn-block btn-lg waves-effect" onclick="location.href='payslips.php';" value="Go to Books"><i class = "material-icons">person_add</i>&nbsp&nbsp&nbsp EMPLOYEE PAYSLIPS</button>
                                </div>

                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <button type="button" class="btn bg-indigo btn-block btn-lg waves-effect" onclick="location.href='performanceReport.php';"><i class = "material-icons">insert_chart</i>&nbsp&nbsp&nbsp PERFORMANCE REPORT</button>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <button type="button" class="btn bg-indigo btn-block btn-lg waves-effect" onclick="location.href='totalexp.php';"><i class = "material-icons">insert_chart</i>&nbsp&nbsp&nbsp FULL EMPLOYEE LIST</button>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <button type="button" class="btn bg-light-blue btn-block btn-lg waves-effect" onclick="location.href='customReports.php';"><i class = "material-icons">assessment</i>    &nbsp&nbsp&nbsp CUSTOMIZED REPORTS</button>
                                </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
    <hr>



	<!--  Main page content ----------------------------->
    </section>

	<!-- Javascript --------------------------------->
	<?php include 'scripts.php';?>
	<!-- #END# Javascript  -->
		
</body>

</html>
