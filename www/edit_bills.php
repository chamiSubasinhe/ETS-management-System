<?php 
/*

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
	
	
	
	<!--edit php-->

			
			<?php

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







		// check if the form has been submitted. If it has, process the form and save it to the database

		if (isset($_POST['submit']))

		{

		// confirm that the 'id' value is a valid integer before getting the form data

		if (is_numeric($_POST['transactionID']))

		{

		// get form data, making sure it is valid

		$transactionID = $_POST['transactionID'];

		$billno = mysql_real_escape_string(htmlspecialchars($_POST['billno']));

		$category = mysql_real_escape_string(htmlspecialchars($_POST['category']));

		$amount = mysql_real_escape_string(htmlspecialchars($_POST['amount']));



		// check that firstname/lastname fields are both filled in

		if ($billno == '' || $category == '' || $amount=='')

		{

		// generate error message

		$error = 'ERROR: Please fill in all required fields!';



		//error, display form

		renderForm($transactionID, $billno, $category, $amount, $error);

		}

		else

		{

		// save the data to the database

		mysql_query("UPDATE bills SET billno='$billno', category='$category' ,amount= WHERE transactionID='$transactionID'")

		or die(mysql_error());



		// once saved, redirect back to the view page

		header("Location: view.php");

		}

		}

		else

		{

		// if the 'id' isn't valid, display an error

		echo 'Error!';

		}

		}

		else

		// if the form hasn't been submitted, get the data from the db and display the form

		{



		// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

		if (isset($_GET['transactionID']) && is_numeric($_GET['transactionID']) && $_GET['transactionID'] > 0)

		{

		// query db

		$transactionID = $_GET['transactionID'];

		$result = mysql_query("SELECT * FROM bills WHERE transactionID='".$transactionID."'")

		or die(mysql_error());

		$row = mysql_fetch_array($result);



		// check that the 'id' matches up with a row in the databse

		if($row)

		{



		// get data from db

		$billno = $row['billno'];

		$category = $row['category'];



		// show form

		renderForm($transactionID,$billno ,$category, $amount, '');

		}

		else

		// if no match, display result

		{

		echo "No results!";

		}

		}

		else

		// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

		{

		echo 'Error!';

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
	<!-- Main page content  ----------------------------->
        <div class="container-fluid">
            <div class="block-header">
                <h2>Edit Bills</h2>
            </div>
			
			
			<hr>
			            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
           
    
                        </div>
                        <div class="body">
						
	<!--Edit records -------------------------------------------->
						
						<form action="" method="post">

	<input type="hidden" name="id" class="form-control" value="<?php echo $transactionID; ?>"/>

	<div>

	<p><strong>Transaction ID:</strong> <?php echo $transactionID; ?></p>

	<strong>Bill NO: *</strong> <input type="number" class="form-control" name="billno" value="<?php echo $billno; ?>"/><br/>

	<strong>Category: *</strong> <input type="text" class="form-control"name="category" value="<?php echo $category; ?>"/><br/>
	
	<strong>Amount: *</strong> <input type="number" class="form-control" name="amount" value="<?php echo $amount; ?>"/><br/>
	
	

	<p>* Required</p>

	<input  class="form-control btn btn-primary" type="submit" name="submit" value="Submit">

	</div>
	


</form>
						

                        </div>
                    </div>
                </div>
            </div>
			
			
			
			
			
			
			
			
			
			
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
