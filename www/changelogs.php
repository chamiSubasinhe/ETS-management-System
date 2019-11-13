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


	<?php $loadingMSG = 'Loading system Global Variables'; ?>
	
	

	
<!DOCTYPE html>
<html>

	<!-- Page head   /// With bodY OPENNING TAG--------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Header  -->
	



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
            </div>

			
			<!-- Changelogs -->
            <div class="block-header">
                <h2>CHANGELOGS</h2>
            </div>
				<?php
				$i=0;
		$query2=mysqli_query($conn,"select * from settings Group by updated order by updated DESC LIMIT 9");
		while($row2=mysqli_fetch_array($query2)){
			$i++;
			?>
  <div class="col-12">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php echo $row2['variable']; ?>
                                <small>Last Update:<?php echo $row2['updated']; ?></small>
                            </h2>
                        </div>
						
                                <div class="well">
                                   <p>- Variable <?php echo $row2['variable']; ?> was created on <?php echo $row2['created']; ?> and last update was on <?php echo $row2['updated']; ?></p>
                            <p>- Variable value updated to <?php echo $row2['value']; ?></p>
                                </div>
                    </div>
                </div>
            </div>

	<?php
		}
	?> 
			
			
			
       
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
		



		
</body>

</html>
