<?php 

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
    <?php// include 'static/topnav.php';?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -------------------------------->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info ---------------------->
			<?php include 'static/userinfo.php';?>
            <!-- #User Info -->
			
            <!-- Menu --------------------------->
			<?php// include 'static/menu.php';?>
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
                               Student's Result Average for Each Course 2018
                            </h2>
							<?php 
	$arr = array();
              	$i=0;
				$j=0;
				while($j<25){
					$arr[$j]=0;
					$j++;
				}
		$query1=mysqli_query($conn," SELECT avg(marks) as marks FROM result GROUP BY courseID");
		while($row1=mysqli_fetch_array($query1)){
		  $arr[$i]= $row1['marks'];
		  $i++;
		}
		
		

?>
<canvas class="container" id="myChart3" width="100%" height="30"></canvas>
<script>
var ctx2 = document.getElementById("myChart3").getContext('2d');
var myChart3 = new Chart(ctx2, {
    type: 'bar', //doughnut line doughnut bar
    data: {
        labels: ['IT', 'QS', 'Civil', 'English','Graphic','Office','CIIT'],
        datasets: [{
            label: 'Average Mark',
            data: ["<?php echo $arr[1]; ?>","<?php echo $arr[2]; ?>","<?php echo $arr[3]; ?>","<?php echo $arr[4]; ?>","<?php echo $arr[5]; ?>","<?php echo $arr[6]; ?>"],
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



					<h1><button type="button" class= "btn bg-light-blue waves-effect" onClick="window.print()">print</button><h1>

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
