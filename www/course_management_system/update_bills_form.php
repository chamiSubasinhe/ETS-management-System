<?php 
/*
* 
* All Rights Reserved C 2018
* 
*/
?>
<?php $loadingMSG = 'Query compiler is initialing...'; ?>

<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	
<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->

	
<?php

    //record update function
	
	$transactionID='';
	$billNo='';
	$category='';
	$amount='';
	
	
	
	
	if(isset($POST["transactionID"]) )
	{
		$transactionID=$_POST["transactionID"];
	}
	
	else{
		
		$transactionID='3';
	}

		$query2=mysqli_query($conn,"select * from bills where transactionID='".$transactionID."' " );
		while($row2=mysqli_fetch_array($query2))
		{

			$transactionID=$row2['transactionID'];
			$billNo=$row2['billNo'];
			$category=$row2['category'];
			$amount=$row2['amount'];
		}
		
	?>
	
	<?php
	 

	if(isset($_POST["update"]))
	{
		
		if(isset($_POST["transactionID"])){
			$transactionID=$_POST["transactionID"];
		}
		if(isset($_POST["billNo"])){
			$billNo=$_POST["billNo"];
		}
		if(isset($_POST["category"])){
			$category=$_POST["category"];
		}
		if(isset($_POST["amount"])){
			$amount=$_POST["amount"];
		}
		
		
		$updateString="UPDATE bills SET billNo='".$billNo."',category='".$category."',amount='".$amount."' WHERE transactionID='".$transactionID."'";
		                    
	
		if(!mysqli_query($conn,$updateString)){
			echo 'error';
		}
		else
		{
			echo'<br>';
			echo 'I record updated!';
		}
	}
	
	else
	{
		$error = "One or more fields are not filled";
		echo $error;
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
                <h2>Update Bills/h2>
            
			
                   <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                        <div class="header">
                            <h2>
                                 UPDATE Bills
                            </h2>
                            
                        </div>
                    <div class="body">
						
						<form method="POST" action="update_bills_form.php" >
						<div class="row clearfix">
						
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
										<input type="text" name="transactionID" value= "<?php echo $transactionID; ?>" style="visibility:hidden;" class="form-control" placeholder="Transaction ID" />
                                            <input type="text" value= "transactionID:<?php echo $transactionID; ?>" class="form-control" placeholder="Transaction ID" disabled/>
                                        </div>
                                    </div>
                                </div>
							    <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text"  name="billNo" class="form-control"  value="<?php  echo $billNo;?>" placeholder="Bill NO" />
                                        </div>
                                    </div> 
                                </div>
								<div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text"  name="category" class="form-control"  value="<?php  echo $category;?>" placeholder="Category" />
                                        </div>
                                    </div>
                                </div>
								<div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number"  name="amount" class="form-control"  value="<?php  echo $amount;?>" placeholder="Amount" />
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
