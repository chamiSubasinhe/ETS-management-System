<?php
// Start the session
session_start();
?>

<?php
include 'static/dbconnection.php';

	$isbn = test_input($_POST['isbn']);
	$_SESSION["isbn"] = $isbn;
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
}

	$sql_find_book = "SELECT isbn FROM book WHERE isbn = '$isbn'";
	
	$result = mysqli_query($conn, $sql_find_book);
	
	if(mysqli_num_rows($result) > 0){
		echo "<script type='text/javascript'>alert('$isbn FOUND');
								window.location.href = 'librarybookupdateform2.php';
							</script>";
	}
	
		else{
				echo "<script type='text/javascript'>alert('$isbn NOT FOUND');
								window.location.href = 'librarybookupdateform.php';
							</script>";
			}
				
				mysqli_close($conn);

?>