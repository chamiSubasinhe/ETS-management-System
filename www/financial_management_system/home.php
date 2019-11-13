<?php 
/*
* 
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
                <h2></h2>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                FINANCIAL MANAGEMENT
                                <small>
                                   
                                    <a href="https://material.google.com/style/color.html#color-color-palette" target="_blank" title="Google's Material Design Color"></a>
                                </small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons"></i>
                                    </a>
                           
                                </li>
                            </ul>
                        </div>
                        <div class="body">
						
                            <div class="clearfix row">
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-red">
									
									
                       
			
									
                                        <a  href="student_fees.php" style = "text-decoration:none ; color :floralwhite; " >
                                        <div class="color-name" >STUDENT PAYMENT</div> 
										
                                        <div class="color-code"></div>
                                        <div class="color-class-name"></div>
                                    </div>
                                </div>
								
								    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-amber">
                                        <a  href="student_takeFees.php" style = "text-decoration:none ; color :floralwhite; " >
                                        <div class="color-name" >TAKE FEES</div>
										
                                        <div class="color-code"></div>
                                        <div class="color-class-name"></div>
                                    </div>
                                </div>
								
								


                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-indigo">
                                        <a href="pettycash.php" style = "text-decoration:none;color :floralwhite;">
                                        <div class="color-name">PETTY CASH</div>
                                        <div class="color-code"></div>
                                        <div class="color-class-name"></div>
                                    </div>
                                </div>
       
                                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-light-blue">
                                        <a href="bills.php" style = "text-decoration:none; color :floralwhite;">

                                            <div class="color-name">ADD BILLS</div>
                                        <div class="color-code"></div>
                                        <div class="color-class-name"></div>
                                    </div>
                                </div>
								
								 <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-light-green">
                                        <a href="view_bills.php" style = "text-decoration:none; color :floralwhite;">

                                            <div class="color-name">VIEW BILLS</div>
                                        <div class="color-code"></div>
                                        <div class="color-class-name"></div>
                                    </div>
                                </div>
								
								
								
								<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-deep-orange">
                                        <a href="reports.php" style = "text-decoration:none; color :floralwhite;">
										<div class="color-name">REPORTS</div>
                                        <div class="color-code"></div>
                                        <div class="color-class-name"></div>
                                    </div>
                                </div>
								
								<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-green">
                                        <a href="student_search.php" style = "text-decoration:none; color :floralwhite;">
										<div class="color-name">SEARCH</div>
                                        <div class="color-code"></div>
                                        <div class="color-class-name"></div>
                                    </div>
                                </div>
								
								<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                    <div class="demo-color-box bg-deep-orange">
                                        <a href="../library_management_system/librarymembersmain.php" style = "text-decoration:none; color :floralwhite;">
										<div class="color-name">REGISTER LIBRARY </div>
                                        <div class="color-code"></div>
                                        <div class="color-class-name"></div>
                                    </div>
                                </div>
								
								
  
  
  
               
                       
           
        
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

	
	
	
	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
