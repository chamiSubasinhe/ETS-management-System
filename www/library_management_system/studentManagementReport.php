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
                                Overall System Report - Student Management
                            </h2>
							<center>
							<h3>
                                New Registrations <?php echo date("Y");?>
                            </h3>
							</center>
							
							<?php 
	preloader("Fetching Student Management data...");
	flush();
		$arr = array();
              	$i=0;
				
				$j=1;
				while($j<25){
					$arr[$j] = 0;
					$j++;
				}
				
				
		$query1=mysqli_query($conn,"select count(stuID) as 'id' from student WHERE MONTH(dateAdded) BETWEEN 1 AND 12 AND YEAR(dateAdded) = YEAR(CURRENT_DATE) GROUP BY MONTH(dateAdded) ORDER BY MONTH(dateAdded)");
		while($row1=mysqli_fetch_array($query1)){
		  $arr[$i]= $row1['id'];
		  $i++;
		}
		
	
	
  
?>
   
<canvas class="container" id="myChart3" width="100%" height="30"></canvas>
<script>
var ctx2 = document.getElementById("myChart3").getContext('2d');
var myChart3 = new Chart(ctx2, {
    type: 'bar', //doughnut line doughnut bar
    data: {
        labels: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"],
        datasets: [{
            label: 'New Registrations',
            data: ["<?php echo $arr[0]; ?>","<?php echo $arr[1]; ?>","<?php echo $arr[2];?>","<?php echo $arr[3];?>","<?php echo $arr[4];?>","<?php echo $arr[5];?>","<?php echo $arr[6];?>","<?php echo $arr[7];?>","<?php echo $arr[8];?>","<?php echo $arr[9];?>","<?php echo $arr[10];?>","<?php echo $arr[11];?>"],
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


                            
                        </div>
                    </div>
					
                </div>
            </div>
            <!-- #END# Exportable Table -->


			
			
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
							<center>
							<h3>
                                New Registrations <?php echo date("Y");?>
                            </h3>
							</center>
							
							<?php 
	preloader("Fetching Student Management data...");
	flush();
		$arr2 = array();
              	$i=0;
		$query2=mysqli_query($conn,"select count(stuID) as 'id' from student WHERE MONTH(dateAdded) BETWEEN 1 AND 12 AND YEAR(dateAdded) = YEAR(CURRENT_DATE) GROUP BY MONTH(dateAdded) ORDER BY MONTH(dateAdded)");
		while($row2=mysqli_fetch_array($query2)){
		  $arr2[$i]= $row2['id'];
		  $i++;
		}
		
	
	
  
?>
   
<canvas class="container" id="myChart2" width="100%" height="30"></canvas>
<script>
var ctx2 = document.getElementById("myChart2").getContext('2d');
var myChart3 = new Chart(ctx2, {
    type: 'doughnut', //doughnut line doughnut bar
    data: {
        labels: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"],
        datasets: [{
            label: 'New Registrations',
            data: ["<?php echo $arr2[0]; ?>","<?php echo $arr2[1]; ?>","<?php echo $arr2[2];?>","<?php echo $arr2[3];?>","<?php echo $arr2[4];?>","<?php echo $arr2[5];?>","<?php echo $arr2[6];?>","<?php echo $arr2[7];?>","<?php echo $arr2[8];?>","<?php echo $arr2[9];?>","<?php echo $arr2[10];?>","<?php echo $arr2[11];?>"],
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
   $('#myChart2').load();
}, 10000) /* time in milliseconds (ie 2 seconds)*/
setInterval3();
</script>

<hr>


                            
                        </div>
                    </div>
					
                </div>
            <!-- #END# Exportable Table -->
			
			
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
							<center>
							<h3>
                                New Registrations <?php echo date("Y");?>
                            </h3>
							</center>
							
							<?php 
	preloader("Fetching Student Management data...");
	flush();
		$arr3 = array();
              	$i=0;
		$query3=mysqli_query($conn,"select count(stuID) as 'id' from student WHERE MONTH(dateAdded) BETWEEN 1 AND 12 AND YEAR(dateAdded) = YEAR(CURRENT_DATE) GROUP BY MONTH(dateAdded) ORDER BY MONTH(dateAdded)");
		while($row3=mysqli_fetch_array($query3)){
		  $arr3[$i]= $row3['id'];
		  $i++;
		}
		
	
	
  
?>
   
<canvas class="container" id="myChart5" width="100%" height="30"></canvas>
<script>
var ctx2 = document.getElementById("myChart5").getContext('2d');
var myChart3 = new Chart(ctx2, {
    type: 'doughnut', //doughnut line doughnut bar
    data: {
        labels: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"],
        datasets: [{
            label: 'New Registrations',
            data: ["<?php echo $arr3[0]; ?>","<?php echo $arr3[1]; ?>","<?php echo $arr3[2];?>","<?php echo $arr3[3];?>","<?php echo $arr3[4];?>","<?php echo $arr3[5];?>","<?php echo $arr3[6];?>","<?php echo $arr3[7];?>","<?php echo $arr3[8];?>","<?php echo $arr3[9];?>","<?php echo $arr3[10];?>","<?php echo $arr3[11];?>"],
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
   $('#myChart5').load();
}, 10000) /* time in milliseconds (ie 2 seconds)*/
setInterval3();
</script>

<hr>


                            
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
