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
	
		<!-- Load session variables ---------------------------------------->
	<?php include 'static/session.php';?>
	<!--# End Load session variables -->

	<!-- Select the most appropiate search query ---------------------------------------->
	<?php 
	
	$message = NULL;
	$searchQuery = '';
	
	if(isset($_POST["search"])){
		$search = $_POST["search"];
		
		//Query 01
		$searchQuery1= "SELECT * FROM settings WHERE CONCAT(varId, description, variable) LIKE '%".$search."%'";
		$num_rows1 = mysqli_num_rows(mysqli_query($conn,$searchQuery1));
		
		//Query 02
		$searchQuery2= "SELECT * FROM settings WHERE CONCAT(varId, description, variable) LIKE '%".$search."%'";
		$num_rows2 = mysqli_num_rows(mysqli_query($conn,$searchQuery2));
		
		//Query 03
		$searchQuery3= "SELECT * FROM settings WHERE CONCAT(varId, description, variable) LIKE '%".$search."%'";
		$num_rows3 = mysqli_num_rows(mysqli_query($conn,$searchQuery3));
		
		//Query 04
		$searchQuery4= "SELECT * FROM settings WHERE CONCAT(varId, description, variable) LIKE '%".$search."%'";
		$num_rows4 = mysqli_num_rows(mysqli_query($conn,$searchQuery4));
		
		//Query 05
		$searchQuery5= "SELECT * FROM settings WHERE CONCAT(varId, description, variable) LIKE '%".$search."%'";
		$num_rows5 = mysqli_num_rows(mysqli_query($conn,$searchQuery5));
		
		//Query 06
		$searchQuery6= "SELECT * FROM settings WHERE CONCAT(varId, description, variable) LIKE '%".$search."%'";
		$num_rows6 = mysqli_num_rows(mysqli_query($conn,$searchQuery6));
		
		//Query 07
		$searchQuery7= "SELECT * FROM settings WHERE CONCAT(varId, description, variable) LIKE '%".$search."%'";
		$num_rows7 = mysqli_num_rows(mysqli_query($conn,$searchQuery7));
		
			//select the most appropiate search query 
			if($num_rows1>=0){
				$searchQuery=mysqli_query($conn,$searchQuery1);
			}else if($num_rows2>0){
				$searchQuery=mysqli_query($conn,$searchQuery2);
			}else if(($num_rows3>0)){
				$searchQuery=mysqli_query($conn,$searchQuery3);
			}else if(($num_rows4>0)){
				$searchQuery=mysqli_query($conn,$searchQuery4);
			}else if(($num_rows5>0)){
				$searchQuery=mysqli_query($conn,$searchQuery5);
			}else if(($num_rows6>0)){
				$searchQuery=mysqli_query($conn,$searchQuery6);
			}else if(($num_rows7>0)){
				$searchQuery=mysqli_query($conn,$searchQuery7);
			}else{
				$message = 'No search result found ';
			}

	}else{
		$message = 'Please insert something to search...';
	}
	?>
	<!--# End select search query -->
	
	
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
			
			 <!-- Contextual Classes With Linked Items -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Full System Search
                             </h2>
                        </div>
                        <div class="body">
                            <div class="list-group">
                                
	<?php
	$i =0;
	if($message==NULL){
		while($row2=mysqli_fetch_array($searchQuery)){
			$i++;
			?>
			
				<a href="javascript:void(0);" class="list-group-item">
                        <h4 class="list-group-item-heading">Search Result <?php echo $i; ?></h4>
						<p class="list-group-item-text"><?php echo $row2['variable']; ?>
						</p>
                </a>

	<?php
		}
	}else{
		echo '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				'.$message.'
				</div>';
	}
	?> 
				
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Contextual Classes With Linked Items -->
			
			
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
