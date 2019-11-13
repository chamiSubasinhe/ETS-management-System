<?php $loadingMSG = 'Query compiler is initialing...'; ?>

<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php'; ?>
	<!--# end DB connection -->
	
<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php'; ?>
	<!--# End Load system variables -->
	
<?php
	function execute(){
		$currentDate = date("Y-m-d");
		$query2 = "INSERT INTO libraryborrow(dateReturned) VALUES('$currentDate') WHERE isbn = '$isbn'";
		$result2 = mysqli_query($conn,$query2);
		
	}
	
	execute();
?>