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

<?php
//student payment -
$stID ='';
$installment_type ='';
$billno ='';
$total_fee ='';
$adv_fee = '';
$balence ='';
$message='';
$reg_fee='';


if (isset($_POST['stID'])){

    $stID = mysqli_real_escape_string($conn, $_POST['stID']);

}
if (isset($_POST['installment_type'])){

    $installment_type = mysqli_real_escape_string($conn, $_POST['installment_type']);


}
if (isset($_POST['billno'])){

    $billno = mysqli_real_escape_string($conn, $_POST['billno']);

}
if (isset($_POST['total_fee'])){

    $total_fee = mysqli_real_escape_string($conn, $_POST['total_fee']);

}
if (isset($_POST['adv_fee'])){

    $adv_fee = mysqli_real_escape_string($conn, $_POST['adv_fee']);


}
if (isset($_POST['balence'])){

    $balence = mysqli_real_escape_string($conn, $_POST['balence']);

}
if (isset($_POST['reg_fee'])){

    $reg_fee = mysqli_real_escape_string($conn, $_POST['reg_fee']);

}








$sql = "INSERT INTO studentpayment (paymentID,stuID,paidDate,billBookNo,paidAmount,pendingAmount,installmentType,totalAmount,transactionID,status,reg_fee)
VALUES ( '".$stID."', CURRENT_TIMESTAMP, '".$billno."', '".$adv_fee."', '".$balence."', '".$installment_type."', '".$total_fee."', '', '0' ,'".$reg_fee."')";


//INSERT INTO `studentpayment` (`paymentID`, `stuID`, `paidDate`, `billBookNo`, `paidAmount`, `pendingAmount`, `installmentType`, `totalAmount`, `transactionID`, `status`, `reg_fee`)
// VALUES ('4', 'STKGIT000088', CURRENT_TIMESTAMP, '01', '50000', '10000', 'new', '100000', '01', '1', '0', '01')



if(isset($_POST['stID'] ) == true)
{

    if(mysqli_query($conn,$sql))
    {
        $message = "Records inserted Successfully ";
        $flag = 1;
    }
    else{
        $flag = 0;
        $message = "Error cannot insert" ;

    }

}



?>




	
<!DOCTYPE html>
<html>


	<script type="text/javascript">
		function myfunction(){
			var total=0;
			var advance=0;
			var balance=0;
			var reg_fee=0;
			
			total = document.getElementById("total").value;
			advance = document.getElementById("advance").value;
			//reg_fee = document.getElementByName("reg_fee").value;
			balance = total - advance - reg_fee;
			document.getElementById("balance").value = balance;
		}
		
		function showRegFee(){
			document.getElementById("regform").style.display = 'block';
		}
		
		function hideRegFee(){
			document.getElementById("regform").style.display= 'none';
		}
		
		function fill(){
			document.getElementById("advance").value = '20000';
			document.getElementById("total").value = '100000';
			document.getElementById("balance").value = '80000';
			document.getElementById("reg_fee").value = '1000';
			document.getElementById("stID").value = 'STKGIT000099*';
			billNo
			document.getElementById("billNo").value = '099';
			
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
	<!-- Main page content  ----------------------------->
        <div class="container-fluid">
            <div class="block-header">
                <h2></h2>
            </div>
			
			
			<hr>

            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">

                            <!--Suceess or fail messages-->

                            <div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
                                <?php echo $message; ?>
                            </div>

                            <h3>Student payment</h3>
                           
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="stID" type="text" class="form-control" name="stID" required>
                                        <label class="form-label">Student ID :STKGITxxxxxx*</label>
                                    </div>
                                </div>
                                <h4>Transaction<h4>
                                <div class="form-group form-float">
                                    <div class="form-line">

                                        <label class="form-label">Installment type</label>
                                        <br/><br/>
                                        <div class="form-group">
                                            <input type="radio" name="installment_type" id="new" onchange="showRegFee()" value="1" class="with-gap" name="new">
                                            <label for="new">New</label>

                                            <input type="radio" name="installment_type" id="regular" value="0" onchange="hideRegFee()" class="with-gap" name="regular">
                                            <label for="regular" class="m-l-20">Regular</label>
                                        </div>
                                    </div>

                                </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input id="billNo" type="number" class="form-control" name="billno" required>
                                                <label class="form-label">Bill Number*</label>
                                            </div>
                                        </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="total" onchange="myfunction()" class="form-control" name="total_fee" required>
                                        <label class="form-label">Total fee*</label>
                                    </div>
                                </div>

								 <div id="regform" class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number"  onchange="myfunction()" id="reg_fee" value="" class="form-control" name="reg_fee">
                                        <label class="form-label">Registration fee*</label>
                                    </div>
                                </div>
								
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="advance" onchange="myfunction()" class="form-control" name="adv_fee" required>
                                        <label class="form-label">Advance</label>
                                    </div>
                                </div>

                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="number" id="balance" class="form-control" name="balence" >
                                                <label class="form-label">Balance</label>
                                            </div>
                                        </div>
                               
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
								<a class="btn btn-primary waves-effect" onclick="fill()" >Demo Data</a>

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
