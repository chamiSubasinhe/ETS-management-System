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

	
	<?php 

if(isset($_GET["optimize"]) && $_GET["optimize"]=='1'){
    $alltables = mysql_query("SHOW TABLES;");
 
// record the output
$output = array();
 
while($table = mysql_fetch_assoc($alltables)){
 foreach($table as $db => $tablename){
  $sql = 'OPTIMIZE TABLE '.$tablename.';';
  $response = mysql_query($sql) or die(mysql_error());
  $output[] = mysql_fetch_assoc($response);
  $optimized = 1;
 }
}
}
    function folderSize ($dir)
{
    $size = 0;
    foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
        $size += is_file($each) ? filesize($each) : folderSize($each);
    }
    return $size;
}
?>


	
	
	
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
                <h2>SQL Query Runner</h2>
            </div>
			This interface will help you to run SQL Query.<small>[WARNING! This function will result unexpected system downtime. Please check the query before running. DROP, INSERT and DELETE commands are restricted]</small>
			
			<hr>
			<!-- Main page content  ----------------------------->
			 <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Table</th>
      <th scope="col">Data Size</th>
      <th scope="col">Index Size</th>
      <th scope="col">Total Size</th>
      <th scope="col">Total Rows</th>
      <th scope="col">Average Size Per Row</th>
    </tr>
  </thead>
  <tbody>
                  
<?php

$result22 = mysqli_query($conn,"SHOW TABLE STATUS FROM ets");
while($array22 = mysql_fetch_array($result22)) {
$total22 = $array22[Data_length]+$array22[Index_length];
?>  <tr>
      <td><?php echo  'WWM_'.$array22[Name];?></td>
      <td><?php echo $array22[Data_length]/8;?>(kb)</td>
      <td><?php echo  $array22[Index_length]/8;?>(kb)</td>
      <td><?php echo  $total22/8;?>(kb)</td>
      <td><?php echo  $array22[Rows];?></td>
      <td><?php echo  $array22[Avg_row_length]/8;?>(kb)</td>
    </tr>
    <?php
}
?>
    
  </tbody>
</table>
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
