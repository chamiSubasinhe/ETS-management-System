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
<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
						
                            <h2>
                               Monthly Student Registration
                            </h2>
							<?php 
    function folderSize ($dir)
	{
		$size = 0;
		foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
			$size += is_file($each) ? filesize($each) : folderSize($each);
		}
		return $size;
	}


	$total = 0;
    $course_management_system = (folderSize('course_management_system/')/1024)/1024;
    $financial_management_system = (folderSize('financial_management_system/')/1024)/1024; 
    $attendance_management_system = (folderSize('attendance_management_system/')/1024)/1024;
    $student_management_system = (folderSize('student_management_system/')/1024)/1024;
    $inventory_management_system = (folderSize('inventory_management_system/')/1024)/1024;
	$staff_management_system = (folderSize('staff_management_system/')/1024)/1024;
	$library_management_system = (folderSize('library_management_system/')/1024)/1024;
	
	
	
	
	$total = $student_management_system + $attendance_management_system + $financial_management_system + $course_management_system + $SystemLogs; 
	

?>
<p>Directory Sizes | Total <?php echo $total; ?> Mb | <?php echo 500-$total; ?>Mb <b>Remaining(<?php echo intval((500-$total)/5); ?>%)</b></p>
    
<canvas class="container" id="myChart3" width="100%" height="30"></canvas>
<script>
var ctx2 = document.getElementById("myChart3").getContext('2d');
var myChart3 = new Chart(ctx2, {
    type: 'bar', //doughnut line doughnut bar
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','June','August','September','Óctober','November','December'],
        datasets: [{
            label: 'Mb',
            data: ["<?php echo $staff_management_system; ?>","<?php echo $inventory_management_system; ?>","<?php echo $course_management_system; ?>","<?php echo $financial_management_system; ?>","<?php echo $attendance_management_system; ?>","<?php echo $student_management_system; ?>","<?php echo $library_management_system; ?>"],
            backgroundColor: ["#3e95cd", "#3e95cd","#3e95cd","#3e95cd","#3e95cd", "#3e95cd", "#3e95cd","#3e95cd","#e8c3b9","#c45850", , "#8e5ea2","#3cba9f", "#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", , "#8e5ea2","#3cba9f"],
            borderWidth: .4
        }]
    },
    
    options: {
        animation: {
            duration: 10, // general animation time
        },
        responsiveAnimationDuration: 1,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
setInterval3(function(){
   $('#myChart3').load();
}, 10000) /* time in milliseconds (ie 2 seconds)*/
setInterval3();
</script>

<hr>





							<table class="table">
  <tbody>                
<?php
$q = mysqli_query($conn, "SHOW TABLE STATUS");  
$size = 0;  
while($row = mysqli_fetch_array($q)) {  
    $size += $row["Data_length"] + $row["Index_length"];  
}
$decimals = 2;  
$mbytes = number_format($size/(1024*1024),$decimals);


$status = explode('  ', mysqli_stat($conn));
?>  <tr>
      <td><?php  print_r($status[0])?></td>
      <td><?php print_r($status[1]);?></td>
      <td><?php  print_r($status[2]);?></td>
      <td><?php  print_r($status[4]);?></td>
	  <td><?php  print_r($status[6]);?></td>
	  <td><?php  print_r($status[7]);?></td>
    </tr>

    
  </tbody>
</table>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive ">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable ">
                                    <thead>
                                        <tr>
											<th>Variable #</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>Variable</th>
                                            <th>Value</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
				$result = mysqli_query($conn, 'SHOW STATUS');
while ($row = mysqli_fetch_assoc($result)) {
			?>
					
                                        <tr>
										<td><?php echo $row['Variable_name'];?></td>
										<td><?php echo $row['Value']; ?></td>
										</tr>
					

	<?php
		}
	?> 
									
									
                                    
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
					
                </div>
            </div>
            <!-- #END# Exportable Table -->




	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
			  
 
 
 
		<!-- #END# Javascript  -->
		
</body>

</html>
