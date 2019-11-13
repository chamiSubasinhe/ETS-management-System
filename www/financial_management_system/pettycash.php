<?php 
/*
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

<!---->

<?php


$RID='';    //reciptid
$Cbalence ='';
$Category='';
$aNeed='';
$amount_received='';
$message = '';

if(isset($_POST['reciptID'])){
    $RID = mysqli_real_escape_string( $conn,$_POST['reciptID']);
}

if(isset($_POST['cBalence'])){
    $Cbalence = mysqli_real_escape_string( $conn,$_POST['cBalence']);
}
if(isset($_POST['category'])){
    $Category = mysqli_real_escape_string( $conn,$_POST['category']);
}
if(isset($_POST['amount_need'])){
    $aNeed = mysqli_real_escape_string($conn, $_POST['amount_need']);
}
if(isset($_POST['amount_received'])){
    $amount_received = mysqli_real_escape_string($conn, $_POST['amount_received']);
}






// Attempt insert query execution


if(isset($_POST['amount_need']))
{
    $sql = "INSERT INTO `pettycash` 
(`category`, `reciptID`, `currentBalance`, `amountNeeded`, `amountRecieved`, `date`, `transactionID`) 
VALUES ('$Category', '$RID', '$Cbalence', '$aNeed', '$amount_received', CURRENT_TIMESTAMP, NULL)";


    $insert_petycash = mysqli_query($conn,$sql);


    if( $insert_petycash){
        $message = "Records inserted successfully.";
		error_log("\n Petty cash updated on ".date("l").": ".date("Y-m-d h:i:sa"), 3, "../SystemLogs/Logger-FinancialManagement.log");
        $flag = 1;
    } else{
        $flag = 0;
        $message= "ERROR: Could not able to execute $sql. " .mysqli_error($conn);
    }

    // Close connection



}


?>

<!---->

	
<!DOCTYPE html>
<html>

<script type = "text/javascript" >

	


	function Autofill(){
		
		document.getElementById("reciptID").value = '0099';
		document.getElementById("amount_received").value = '5000';
		document.getElementById("cBalence").value = '5000';
		document.getElementById("amount_need").value = '2500';
		
		
		
		
		
	}
	</script>





	<!-- Page head --------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Loader -->
	
<body class="theme-red">

    <!-- Page Loader ------------------------------------>
	<?php// include 'static/preloader.php';?>
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
            <div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
                <?php echo $message; ?>
            </div>
			
			<hr>

            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h3>Petty - cash</h3>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">

                                        <label class="form-label">Category*</label>
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <tr>

                                                <td><select required name="category" class="form-control show-tick">
                                                        <p>please select a category</p>
                                                        <option value="Office materials">Office materials</option>
                                                        <option value="Maintainance">Maintainance</option>
                                                        <option value="Traveling">Traveling</option>
                                                        <option value="Other">Other</option>
                                                    </select></td>

                                            </tr>
                                        </table>
                                    </div>
                                    <br/><br/>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" id = "reciptID"  class="form-control" name="reciptID" required>
                                            <label class="form-label">Receipt ID*</label>
                                        </div>
                                    </div>

                                </div>
                                <h4>Transaction</h4>

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="number" id="amount_received" class="form-control" name="amount_received" required>
                                                <label class="form-label">Amount recieved*</label>
                                            </div>
                                        </div>


                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="number" id="cBalence" class="form-control" name="cBalence" required>
                                                <label class="form-label">Current balance*</label>
                                            </div>
                                        </div>

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="number" id="amount_need" class="form-control" name="amount_need" required>
                                                <label class="form-label">Amount</label>
                                            </div>
                                        </div>


                                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
										<a class="btn btn-primary waves-effect" onclick="Autofill()" >Demo Data</a>
                                 
                            </form>
			
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
