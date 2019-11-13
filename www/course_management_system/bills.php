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
	
	
	<?php
	
	
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "ets1");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

echo "Connection sucessful ...:D";





$billno = '';
$amount = '';
$category = '';




if (isset($_POST['billno'])){
	
	$billNo = mysqli_real_escape_string($mysqli, $_REQUEST['billno']);
	
}
if (isset($_POST['amount'])){

	$amount = mysqli_real_escape_string($mysqli, $_REQUEST['amount']);

	
}
if (isset($_POST['category'])){
	
	$category = mysqli_real_escape_string($mysqli, $_POST['category']);
	
}



 
// Attempt insert query execution


$sql = "INSERT INTO `bills` 
(`billNo`, `category`, `dateAdded`, `transactionID`, `amount`)
 VALUES ('$billNo', '$category', CURRENT_TIMESTAMP, NULL, '$amount')";

if($mysqli->query($sql) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();

	
	
	
	
	
	?>
	
	

	
<!DOCTYPE html>
<html>

	<!-- Page head --------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Loader -->
	
		<head>
	<title>Bills</title>
	</head>
	
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
                <h2></h2>
            </div>
			
			
			
			<!-- Page Loader -->
		<div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
	
	<div class="container-fluid">
            <div class="block-header">
                <h2></h2>
            </div>
	
            <!-- Advanced Form Example With Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Billing System</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons"></i>
                                    </a>
                                    
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form id="wizard_with_validation" method="POST" action="">
                                <h3>Billing</h3>
                              
								<fieldset>
								
								<div class="form-group form-float" >
                                        <div class="form-line">
                                            
                                            <label class="form-label">Category*</label>
											
											
									<select name="category" class="form-control">
                                       
											<?php
				
											
											$query2=mysqli_query($conn,"select category from bills");
											while($row2=mysqli_fetch_array($query2)){
			?>
                                        <option value="<?php echo $row2["category"]; ?>"> <?php echo $row2["category"]; ?> </option>
										
										
		<?php } ?>
                                    </select>
										
										</div>
                                    </div>
									
									
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" class="form-control" name="billno" required>
                                            <label class="form-label">Bill no*</label>
                                        </div>
                                    </div>
									
						
                                    


                                </fieldset>

                                <h3>Transaction</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" min = "1" name="amount" class="form-control" placeholder="RS." required>
                                            <label class="form-label">Amount*</label>
                                        </div>
                                    </div>
                                    
								<button type="submit" value="submit" class="btn btn-success waves-effect">confirm</button>
  


                                    
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Form Example With Validation -->
								
								<?php
								
								//<button type="button" class="btn btn-danger waves-effect">clear</button>
								
								?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
	
			
			
			<hr>
			
			
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
