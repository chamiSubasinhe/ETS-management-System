d<?php 
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
	
<?php
$result = '';
	$flag = '-1';
	
	//Insert
	if(isset($_POST['replyMessage']))
	{
		$reply = mysql_real_escape_string($_POST['reply']);
		$threadId = mysql_real_escape_string($_POST['threadId']);
		$insertSetting="INSERT INTO support_tickets(message, threadId) values('".$reply."','".$threadId."')";
	
		// proceed to screw this database up 
		$exec = mysqli_query($conn,$insertSetting);
		if(!$exec){// always trust your users... :P 
			$flag = 0;
			$result =  'something went wrong executing'; 
		}else{ 
			if($staticSetting==1){ $type = 'Static';}else if($staticSetting==0){ $type = 'Non-Static';}else { $type = 'Default';}
			$result = 'Succesfully added '.$type.' variable:'.$variableSetting.' Value: '.$valueSetting; 
			$flag = 1;
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

<!-- Media Alignment -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Opened Support Tickets
                                <small>All Active support Tickets will be desplayed here</small>
                            </h2>
                         
                        </div>
                        <div class="body">
						<?php
						$thread=0;
						$count = 0;
						
						preloader("selecting support tickets");
						
		$query2=mysqli_query($conn,"select * from support_tickets where threadId != '". $thread. "' AND status='1'");
		while($row2=mysqli_fetch_array($query2)){
			$thread= $row2['threadId'];
			$count++;
			
			?>

			
			<div class="media">
                                <div class="media-left">
                                    <i class="material-icons">message</i>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo $row2['subject']; ?>
                                    <?php if($row2['priority']=='1'){echo '<span class="badge bg-pink">High Priority Ticket</span>';}else if($row2['priority']=='2'){echo '<span class="badge bg-orange">Medium Priority Ticket</span>';}else{echo '<span class="badge bg-teal">Low Priority Ticket</span>';}?>
									</h4> 
									<?php echo $row2['message']; ?>
                            <button class="btn btn-xs bg-cyan waves-effect media-left" type="button" data-toggle="collapse" data-target="#collapseExample<?php echo $thread;?>" aria-expanded="false"
                                    aria-controls="collapseExample<?php echo $thread;?>">
                                Expand
                            </button>
                            <div class="collapse" id="collapseExample<?php echo $thread;?>">
                                <div class="well">
											<?php
				$query3=mysqli_query($conn,"select * from support_tickets where threadId='".$thread."' AND status='1'");
				while($row3=mysqli_fetch_array($query3)){
					?>
									
									
                                    <div class="media">
                                        <div class="media-left">
                                           <i class="material-icons">person</i>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"></h4><?php echo $row3['message']; ?>
                                        </div>
                                    </div>
									
									
									
												<?php
				}
				
			?> 
			
			
			<script>
			document.getElementById("supportCount").innerHTML = "<?php echo $count; ?>";
			</script>
			<form action="" method="POST">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                                        <div class="form-group form-float">
										<input style="visibility:hidden;" name="threadId" value="<?php echo $row2['threadId']; ?>" type="number" class="form-control">
								
                                            <div class="form-line">
                                                <input name="reply" type="text" class="form-control">
                                                <label class="form-label">Message</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <button type="submit" value="submit" name="relpyMessage" class="btn btn-primary btn-lg m-l-15 waves-effect"><i class="material-icons">send</i></button>
                                    </div>
                                </div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <button type="submit" value="submit" name="relpyMessage" class="btn btn-alart btn-sm waves-effect"><i class="material-icons">close</i>Close</button>
                                    <button type="submit" value="submit" name="relpyMessage" class="btn btn-alart btn-sm waves-effect"><i class="material-icons">flag</i>Flag</button>
                                    </div>
                            </form>
			</div>
                            </div>
                                </div>
                            </div>
			
	<?php
		}
	?> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Media Alignment -->
			
			
			
			<!-- Media Alignment -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Closed Support Tickets
                                <small>All closed support Tickets will be desplayed here</small>
                            </h2>
                         
                        </div>
                        <div class="body">
						<?php
						$thread2=0;
						
	
						preloader("selecting closed support tickets");
		$query4=mysqli_query($conn,"select * from support_tickets where threadId != '". $thread2. "' AND status='0'");
		while($row4=mysqli_fetch_array($query4)){
			$thread2= $row4['threadId'];
			?>

			<div class="media">
                                <div class="media-left">
                                    <i class="material-icons">email</i>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo $row4['subject']; ?></h4> <?php echo $row4['message']; ?>
                            <button class="btn bg-cyan waves-effect m-b-15" type="button" data-toggle="collapse" data-target="#collapseExample<?php echo $thread2.'x';?>" aria-expanded="false"
                                    aria-controls="collapseExample<?php echo $thread2.'x';?>">
                                Expand
                            </button>
                            <div class="collapse" id="collapseExample<?php echo $thread2.'x';?>">
                                <div class="well">
											<?php
											
				$query5=mysqli_query($conn,"select * from support_tickets where threadId='".$thread2."' AND status='0'");
				while($row5=mysqli_fetch_array($query5)){
					?>
									
									
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="material-icons">person</i>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"></h4><?php echo $row5['message']; ?>
                                        </div>
                                    </div>
									
									
									
												<?php
				}
			?> 
			</div>
                            </div>
                                </div>
                            </div>
			
	<?php
		}
	?> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Media Alignment -->
			
			
			
			
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
