<?php
include 'static/dbconnection.php';

	$isbn = test_input($_POST['isbn']);
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
}

		
		$sql_find_book = "SELECT isbn FROM book WHERE isbn = '$isbn'";
		$sql_delete_book = "DELETE FROM book WHERE isbn = '$isbn'";
		$sql_delete_copy = "DELETE FROM copy WHERE isbn = '$isbn'";; 
		$sql_delete_author = "DELETE FROM author WHERE isbn = '$isbn'";
		
		$result = mysqli_query($conn, $sql_find_book);
			
			if(mysqli_num_rows($result) > 0){
				if (mysqli_query($conn, $sql_delete_book)) {
					if (mysqli_query($conn, $sql_delete_copy)) {
						if (mysqli_query($conn, $sql_delete_author)) {
							echo "<script type='text/javascript'>alert('$isbn DELETED');
								window.location.href = 'librarydeletebookform.php';
							</script>";
						}
						else{
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}
					}
					else{
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
				}
				else{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
			else{
				echo "<script type='text/javascript'>alert('$isbn DOES NOT EXIST');
								window.location.href = 'librarydeletebookform.php';
							</script>";
			}
				
				mysqli_close($conn);

	?>