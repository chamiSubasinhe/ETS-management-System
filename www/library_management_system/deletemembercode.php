<?php
include 'static/dbconnection.php';

	$id = test_input($_POST['id']);
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
}

	$sql_find_staff = "SELECT staffID FROM stafflibrarymember WHERE staffID = '$id'";
	$sql_find_student = "SELECT studentID FROM studentlibrarymember WHERE studentID = '$id'";
	
	
	$sql_delete_staff = "DELETE FROM stafflibrarymember WHERE staffID = '$id'";
	$sql_delete_student = "DELETE FROM studentlibrarymember WHERE studentID = '$id'";
	
	$result1 = mysqli_query($conn, $sql_find_staff);
	$result2 = mysqli_query($conn, $sql_find_student);
			
			if(mysqli_num_rows($result1) > 0){
				if (mysqli_query($conn, $sql_delete_staff)) {
					echo "<script type='text/javascript'>alert('$id DELETED');
								window.location.href = 'librarydeletememberform.php';
							</script>";
						}
						else{
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}
			}
			else if(mysqli_num_rows($result2) > 0){
				if (mysqli_query($conn, $sql_delete_student)) {
					echo "<script type='text/javascript'>alert('$id DELETED');
								window.location.href = 'librarydeletememberform.php';
							</script>";
						}
						else{
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}
			}
			else{
				echo "<script type='text/javascript'>alert('$id DOES NOT EXIST');
								window.location.href = 'librarydeletememberform.php';
							</script>";
			}
			
			mysqli_close($conn);
