<?php 
/*
* 
* All Rights Reserved C 2018
* 
*/


$message='';
$flag = 1;
?>
<?php // $loadingMSG = 'Query compiler is initialing...'; ?>

<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	
<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->

	
<?php

    
	
	
	
		$studentID='';
		$total_fee='';
		$balence='';
		$date='';
		$paid ='';
		
	if(isset($_GET["studentID"]) )
	{
		$message='You can Add student fees here.';
		//record update function
	
		$studentID=$_GET["studentID"];
		
		$query2=mysqli_query($conn,"select * from studentpayment where stuID='".$studentID."' LIMIT 1" );
		while($row2=mysqli_fetch_array($query2))
		{

			$studentID=$row2['stuID'];
			$total_fee=$row2['totalAmount'];
			$balence=$row2['pendingAmount'];
			$date=$row2['paidDate'];
		}
	
	}
	


		
		
		
	?>
	
	<?php
	 

	if(isset($_POST["update"]))
	{
		
		if(isset($_POST["studentID"])){
			$studentID=$_POST["studentID"];
		}
		if(isset($_POST["total_fee"])){
			$total_fee = floatval($_POST["total_fee"]);
		}
		
		if(isset($_POST["paid"])){
			$paid= floatval($_POST["paid"]);
		}
		if(isset($_POST["balence"])){
			$balence= floatval($_POST["balence"]);
			if($balence >= $paid){
				$balence = $balence - $paid;
				
						$updateString="UPDATE studentpayment SET pendingAmount='".$balence."' WHERE stuID='".$studentID."'";
						error_log("\n Fees for  ".$studentID." was updated on ".date("l").": ".date("Y-m-d h:i:sa"), 3, "../SystemLogs/Logger-FinancialManagement.log");
						$message ='';
											
					
						if(!mysqli_query($conn,$updateString)){
							$message =  "Somthing went wrong. Please try again.";
							$flag = 0;
							
						}
						else
						{
							
							$message =  "suceessfull ! New installment : LKR:".$paid." added.";
							$flag = 1;
						}
				
			}
			else{
				$balence = $balence;
				$message =  "Invalid amount LKR:".$paid." !";
				$flag = 0;
			}
			
		}
		
		
		
	}
	
	
    //End update record
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
	<!-- Main page content  ----------------------------->
        <div class="container-fluid">
            <div class="block-header">
               
            
			
                   <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                        <div class="header">
                            
                             <h2>New Installment</h2>
                            
                        </div>
                    <div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
						<?php echo $message; ?>
                            </div>
                    <div class="body">
						
						<form method="POST" action="" >
						<div class="row clearfix">
						
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
											<input type="text" style ="visibility:hidden;" value= "<?php echo $studentID; ?>" class="form-control" placeholder="Student ID" />
                                            Student ID: <input type="text" value= "<?php echo $studentID; ?>" class="form-control" placeholder="Student ID" disabled/>
                                        </div>
                                    </div>
                                </div>
							    <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
										<input type="number"  style ="visibility:hidden;" name="total_fee" class="form-control"  value="<?php  echo $total_fee;?>" placeholder="Total Amount" />
                                            Total Fee: <input type="number"  name="total_fee" class="form-control"  value="<?php  echo $total_fee;?>" placeholder="Total Amount" disabled/>
                                        </div>
                                    </div> 
                                </div>
								<div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
										<input type="number"  style ="visibility:hidden;" name="balence" class="form-control"  value="<?php  echo $balence;?>" placeholder="Balence" />
                                            Current Balance: <input type="number"  name="balence" class="form-control"  value="<?php  echo $balence;?>" placeholder="Balence" disabled/>
                                        </div>
                                    </div>
                                </div>
							
									
									<div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
										Date:  <input type="text"  name="date" class="form-control"  value="<?php  echo $date;?>" placeholder="Date joined" disabled/>
                                        </div>
                                    </div>
                                </div>
								
									<div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            New Installment: <input type="paid_amount" type="number" name="paid" class="form-control"  value="<?php  echo $paid;?>" placeholder="Payment amount" />
                                        </div>
                                    </div>
                                </div>
								
								
								<div class="col-sm-3">
								<div class="form-group">
									<button class="btn btn-alert" input type="submit" name="update" value="update" id="update">Update</button>
                                    </div>
                                    
                                
                                    
								</div>
								</div>
						 						
						 </form>
                    </div>
                    </div>
                </div>
 
            </div>
			
            <!-- #END# Input -->
			
			<hr>
			
			
	<!--  Main page content ----------------------------->
	</div>
    </section>

    
	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
