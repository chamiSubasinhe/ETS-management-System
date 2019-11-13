<?php 
/*
* Google Metirial Design Template designed Asiri Hewage
* asiriofficial@gmail.com
* All Rights Reserved C 2018
* http://asirihewage.business.site
*/
?>

<?php $loadingMSG = 'Query compiler is initialing...'; ?>

<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	
<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->
	
		<!-- Load session variables ---------------------------------------->
	<?php include 'static/session.php';?>
	<!--# End Load session variables -->

	<?php 
		if(isset($_POST["send"])){
			
			if(isset($_POST["replyoption"])){
				$replyoption = mysqli_real_escape_string($conn,$_POST["send"]);
			}
			
			if(isset($_POST["priority"])){
				$priority = mysqli_real_escape_string($conn,$_POST["send"]);
			}
			
			if(isset($_POST["redirect"])){
				$redirect = mysqli_real_escape_string($conn,$_POST["send"]);
			}
			
			if(isset($_POST["uid"])){
				$uid = mysqli_real_escape_string($conn,$_POST["uid"]);
			}
			
			if(isset($_POST["message"])){
				$message = mysqli_real_escape_string($conn,$_POST["send"]);
			}
			
		$insertTicket="INSERT INTO users(authId,UID) values('".$authId."','".$UID."')";
		
		$exec = mysqli_query($conn,$insertTicket);
		if(!$exec){
			$flag = 0;
			$message =  'Can not create a support ticket. Please try again';
		}else{ 
			error_log("\n  ".$redirect." has recieved a support ticket through the system from user ".$uid." on ".date("l").": ".date("Y-m-d h:i:sa"), 3, "SystemLogs/Logger-Settings.log");
			$message = 'New support ticket genarated! '.$redirect.' will reply you as soon as possible.';
			$flag =1;
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
	<?php include 'static/preloader.php';?>
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
        <div class="container-fluid">
           
			<!-- Main page content  ----------------------------->
			
			
			
			
			 <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Open Support Ticket</h2>
                           
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
									<input type="text" style="visibility:hidden;" value="<?php echo $sessionArr['UID']; ?>" class="form-control" name="uid">
                                        
                                        <input type="text" value="<?php echo $sessionArr['name_with_init']; ?>" class="form-control" name="name" disabled>
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea cols="30" rows="5" name="message" class="form-control no-resize" required></textarea>
                                        <label class="form-label">Message</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    
                                </div>
								<div class="form-line">
										<div class="col-md-3">
										<select name="redirect" class="form-control show-tick">
											<option value="Redirect to" >Redirect to</option>
											<option value="Technical Division">Technical Division</option>
											<option value="Administation">Administation</option>
											<option value="Sales and Marketing">Sales and Marketing</option>
											<option value="Student Affairs">Student Affairs</option>
											<option value="HR Management">HR Manager</option>
											<option value="HR Management">Inventry Manager</option>
											<option value="HR Management">Library Manager</option>
											<option value="HR Management">Financial</option>
										</select>

										</div>
										<div class="col-md-3">
										<select name="priority" class="form-control show-tick">
											<option value="">Priority</option>
											<option value="High">High</option>
											<option value="Medium">Medium</option>
											<option value="Low">Low</option>
										</select>

										</div>
										<div class="col-md-3">
										<select name="replyoption" class="form-control show-tick">
											<option value="">Replay Back option</option>
											<option value="SMS">SMS</option>
											<option value="Email">Email</option>
											<option value="Notification">Notification</option>
										</select>

										</div>
                                    </div>
                                <button class="btn btn-primary waves-effect" name="send" type="submit">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
			
			
			
			
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
