<?php 
/*
* Google Metirial Design Template designed Asiri Hewage
* asiriofficial@gmail.com
* All Rights Reserved C 2018
* http://asirihewage.business.site
*/
?>

<?php $loadingMSG = 'System is Loading...'; ?>

<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	
<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->
	
		<!-- Load session variables ---------------------------------------->
	<?php include 'static/session.php';?>
	<!--# End Load session variables -->
	
	
		<!-- fetching home page data---------------------------------------->
	<?php
	
	//new student count
	$newStudentCountQ = mysqli_query($conn, "SELECT stuID FROM student WHERE dateAdded >=  DATE_FORMAT(NOW(), '%Y-%m-01 00:00:00')");
	$newStudentCount = mysqli_num_rows($newStudentCountQ);
	
	//new staff count
	$newStaffCountQ = mysqli_query($conn, "SELECT staffId FROM staff WHERE dateCreated >=  DATE_FORMAT(NOW(), '%Y-%m-01 00:00:00')");
	$newStaffCount = mysqli_num_rows($newStaffCountQ);
	
	
	//new support ticket count
	$newSupportTicketsCountQ = mysqli_query($conn, "SELECT messageId FROM support_tickets WHERE timestamp >=  DATE_FORMAT(NOW(), '%Y-%m-01 00:00:00')");
	$newSupportTicketsCount = mysqli_num_rows($newSupportTicketsCountQ);
	
	//new pending support ticket count
	$newPendingSupportTicketsCountQ = mysqli_query($conn, "SELECT messageId FROM support_tickets WHERE timestamp >=  DATE_FORMAT(NOW(), '%Y-%m-01 00:00:00') AND status='1'");
	$newPendingSupportTicketsCount = mysqli_num_rows($newPendingSupportTicketsCountQ);
	
	
	
	
	?>
	
<!DOCTYPE html>
<html>

	<!-- Page head --------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Loader -->
	


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

<canvas class="container" id="myChart2" width="100%" height="30"></canvas>
              	<?php
              	$arr2 = array();
              	$arr3 = array();
              	$i=0;
				$j=1;
				$tot =0;
				while($j<25){
					$arr2[$j] = rand(1,10);
					$tot += $arr2[$j];
					$arr3[$j] = $j.'h';
					$j++;
					
				}
		$query3=mysqli_query($conn,"select SUM(visits) as 'id', HOUR(lastVisit) as 'hour' from visitors WHERE HOUR(lastVisit) >= HOUR(DATE_SUB(CURDATE(), INTERVAL 1 DAY))
AND MONTH(lastVisit) = MONTH(CURRENT_DATE) GROUP BY HOUR(lastVisit) ORDER BY HOUR(lastVisit) ASC LIMIT 24");
		while($row3=mysqli_fetch_array($query3)){
			
			$tot += $row3['id'];
		  $arr2[$i]= $row3['id'];
		  $arr3[$i]= $row3['hour'].'h';
		  $i++;
		}
	?> 
	
<script>
var ctx2 = document.getElementById("myChart2").getContext('2d');
var myChart2 = new Chart(ctx2, {
    
    type: 'line', //doughnut line doughnut bar
    data: {
        labels: ["<?php echo $arr3[0]; ?>", "<?php echo $arr3[1]; ?>", "<?php echo $arr3[2]; ?>", "<?php echo $arr3[3]; ?>", "<?php echo $arr3[4]; ?>", "<?php echo $arr3[5]; ?>" , "<?php echo $arr3[6]; ?>", "<?php echo $arr3[7]; ?>" ,"<?php echo $arr3[8]; ?>", "<?php echo $arr3[9]; ?>", "<?php echo $arr3[10]; ?>", "<?php echo $arr3[11]; ?>", "<?php echo $arr3[12]; ?>", "<?php echo $arr3[13]; ?>", "<?php echo $arr3[14]; ?>", "<?php echo $arr3[15]; ?>", "<?php echo $arr3[16]; ?>", "<?php echo $arr3[17]; ?>" , "<?php echo $arr3[18]; ?>", "<?php echo $arr3[19]; ?>" ,"<?php echo $arr3[20]; ?>", "<?php echo $arr3[21]; ?>","<?php echo $arr3[22]; ?>", "<?php echo $arr3[23]; ?>", ],
        datasets: [{
            label: '# of connections',
            data: [<?php echo $arr2[0]; ?>, <?php echo $arr2[1]; ?>, <?php echo $arr2[2]; ?>, <?php echo $arr2[3]; ?>, <?php echo $arr2[4]; ?>, <?php echo $arr2[5]; ?>, <?php echo $arr2[6]; ?>, <?php echo $arr2[7]; ?>, <?php echo $arr2[8]; ?>, <?php echo $arr2[9]; ?>, <?php echo $arr2[10]; ?>, <?php echo $arr2[11]; ?>, <?php echo $arr2[12]; ?>, <?php echo $arr2[13]; ?>, <?php echo $arr2[14]; ?>, <?php echo $arr2[15]; ?>, <?php echo $arr2[16]; ?>, <?php echo $arr2[17]; ?>, <?php echo $arr2[18]; ?>, <?php echo $arr2[19]; ?>, <?php echo $arr2[20]; ?>, <?php echo $arr2[21]; ?>, <?php echo $arr2[22]; ?>, <?php echo $arr2[23]; ?>],
            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", , "#8e5ea2","#3cba9f", "#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", , "#8e5ea2","#3cba9f"],
            borderWidth: .4
        }]
    },
    options: {
        animation: {
            duration: 100, // general animation time
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

setInterval(function(){
   $('#myChart2').load();
}, 10000) /* time in milliseconds (ie 2 seconds)*/
setInterval();

</script>

       
 <!-- Widgets -->
            <div onmouseover="changeText('These are some sample overviews of the current system status.')" onmouseout="changeback('Show me! I will help you...')" class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Usage Today</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?php echo $tot; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue hover-expand-effect">
                        <div class="icon">
						<?php
						$thread=0;
						$count2=0;
						$query23=mysqli_query($conn,"select * from support_tickets where status='0'");
						while($row23=mysqli_fetch_array($query23)){
							$count2++;
						}?>
						<script>
						document.getElementById("supportCount").innerHTML = "<?php echo $count2; ?>";
						</script>
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">Pending Support Tickets</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $count2; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
						<?php
						$thread=0;
						$count=0;
						$query2=mysqli_query($conn,"select * from support_tickets where threadId != '". $thread. "' AND status='1'");
						while($row2=mysqli_fetch_array($query2)){
							$count++;
						}?>
						
                            <div class="text">Opened Support Tickets</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?php echo $count ;?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
						<?php 
						     	$i=0;
								$newStudents=0;
								$query22=mysqli_query($conn,"select count(stuID) as 'id' from student WHERE MONTH(dateAdded) BETWEEN 1 AND 12 AND YEAR(dateAdded) = YEAR(CURRENT_DATE) GROUP BY MONTH(dateAdded) ORDER BY MONTH(dateAdded)");
								while($row22=mysqli_fetch_array($query22)){
								  $newStudents+= $row22['id'];
								  $i++;
								}
								?>
                            <div class="text">New Student Registrations</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?php echo $newStudents; ?></div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <div class="content">
                            <div class="text">New Expenditures</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">New Staff Registrations</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?php echo $newStaffCount; ;?></div>
                        </div>
                    </div>
                </div>
				
				
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">access_alarms</i>
                        </div>
                        <div class="content">
                            <div class="text">New schedules</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				
				
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">unarchive</i>
                        </div>
                        <div class="content">
                            <div class="text">New uploads</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				
				
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">textsms</i>
                        </div>
                        <div class="content">
                            <div class="text">New SMS Messages</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				
				
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">monetization_on</i>
                        </div>
                        <div class="content">
                            <div class="text">New Income</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">security</i>
                        </div>
                        <div class="content">
                            <div class="text">Current Auth ID</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?php echo $_SESSION['authId']; ?></div>
                        </div>
                    </div>
                </div>
				
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">sync</i>
                        </div>
                        <div class="content">
                            <div class="text">Backup schedule</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				
				
				
			
			
		
				
			
				
				
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="info-box bg-light-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">insert_chart</i>
                        </div>
                        <div class="content">
                            <div class="text"><?php
			
			$file = file("SystemLogs/Logger-Settings.log");
			$x=0;
if ($file) {
	
for ($i = max(0, count($file)-2); $i < count($file); $i++) {
	echo $file[$i].'<br>';
}

} 
?></div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				
				
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="info-box bg-light-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">insert_chart</i>
                        </div>
                        <div class="content">
                            <div class="text"><?php
			
			$file = file("SystemLogs/Logger-Login.log");
			$x=0;
if ($file) {
	
for ($i = max(0, count($file)-3); $i < count($file); $i++) {
	echo $file[$i].'<br>';
}

} 
?></div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				
				
				
            </div>
            <!-- #END# Widgets -->
		

			<!-- Main page content  ----------------------------->
		
	<!--  Main page content ----------------------------->
	</div>
    </section>
	
	
	
	
	
	
	
	
		
		 <div class="floating-chat">
    <i class="fa fa-comments" aria-hidden="true"></i>
    <div class="chat">
        <div class="header">
            <span class="title">
                Hello <?php echo $sessionArr['name_with_init'];?>
            </span>
            <button>
                <i class="fa fa-times" aria-hidden="true"></i>
            </button>
                         
        </div>
        <ul class="messages">
            <li class="self" id="text-display">Hello there...</li>
			<audio id="myAudio">
  <source src="tts/settings.ogg" type="audio/ogg">
  <source src="tts/settings.mp3" type="audio/mpeg">
</audio>

<script>
var x = document.getElementById("myAudio"); 

function playAudio() { 
    x.play(); 
} 

function pauseAudio() { 
    x.pause(); 
} 
</script>

<button onclick="playAudio()" type="button">Narrate</button>
<button onclick="pauseAudio()" type="button">Stop Narration</button> 
        </ul>
        <div class="footer">
            <div class="text-box" contenteditable="true" disabled="true"></div>
            <button id="sendMessage">Ask</button>
        </div>
    </div>
</div>
		
		








	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
		<?php include 'static/chat.php';?>
		
		
</body>

</html>
