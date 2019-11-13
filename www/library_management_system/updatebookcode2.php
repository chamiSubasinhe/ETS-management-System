<?php
// Start the session
session_start();
?>

<?php
include 'static/dbconnection.php';

	$isbn = $_SESSION["isbn"] ;

	$yearpublished = test_input($_POST['yearpublished']);
	$edition = test_input($_POST['edition']);
	$pages = test_input($_POST['pages']);
	$author = test_input($_POST['author']);
	$description = test_input($_POST['description']);
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	$sql_book_update = "UPDATE book SET yearPublished = '$yearpublished', edition = '$edition', pages = '$pages', author = '$author', description = '$description' WHERE isbn = '$isbn'";
	
	if (mysqli_query($conn, $sql_book_update)) {
		echo "<script type='text/javascript'>alert('$isbn UPDATED SUCCESSFULLY');
								window.location.href = 'librarybookupdateform.php';
							</script>";
	}
	else{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	
	
	mysqli_close($conn);







?>

<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
?>