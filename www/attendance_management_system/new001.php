<?php 
/*
* Google Metirial Design Template designed Asiri Hewage
* asiriofficial@gmail.com
* All Rights Reserved C 2018
* http://asirihewage.business.site
*/
?>
<!-- Page head --------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end Page Loader -->
<?php
	
if(isset($_post['search'])){
	
	$search =$_post['search'];
	$search = preg_replace("#[^0-9a-z]#i",$searchq);
	
	$query = mysql_Query("select* from staffattendence where staffID like '%$searchq%' or arrivet like '%searchq%' ")or die("cod not serch ");
	
	$count=mysql_num_rows($query);
	
	if($count == 0){
		
		$output='there no result';
		
	}
	else{
		
		while($row =mysql_fetch_array($query)){
			$staffID=$row['staffID'];
			$arrivalTime=$row['arrivet'];
			
			$output .='<div>'.$staffID.''.$arrivalTime.'</div>';
			 
		}
	}
	
}




?>


<!DOCTYPE html>
<html>

	<!-- Page head --------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Loader -->
	
<body class="theme-red">

    <!-- Page Loader ------------------------------------>
	<?php //include 'static/preloader.php';?>
    <!-- #END# Page Loader -->
	
    <!-- Overlay For Sidebars --------------------------->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
	
    <!-- Search Bar ------------------------------------->
    <?php include 'static/searchbar.php';?>
    <!-- #END# Search Bar -->
	
    <!-- Top Bar ---------------------------------------->
    <?php //include 'static/topnav.php';?>
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
       <form action="new001.php" method="post">
	    <input type="text" name ="search" placeholder="sarch for `mr"/>
		<input type="submit" value ="click"/>
	   
		 
	   </form>
	   
	   
	   <?phpprint("$output"); ?>
	   
	<!--  Main page content ----------------------------->
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
