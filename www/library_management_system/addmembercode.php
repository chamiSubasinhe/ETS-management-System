<?php
include 'static/dbconnection.php';

	$id = test_input($_POST['id']);
	$receiptnumber = test_input($_POST['receiptnumber']);
	$membertype = test_input($_POST['membertype']);
	$date = test_input($_POST['date']);

	
	$idERROR = "ID should be in the format STKGIT001122";
	$receiptnumberERROR = "Receipt Number should be in format LIB4556";

	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	$sql_find_staff_member = "SELECT staffID FROM stafflibrarymember WHERE staffID = '$id'";	
	$result1 = mysqli_query($conn,$sql_find_staff_member);
	
	$sql_find_student_member = "SELECT studentID FROM studentlibrarymember WHERE studentID = '$id'";	
	$result2 = mysqli_query($conn, $sql_find_student_member);
	
	if(!preg_match('/^[A-Z]{6}[0-9]{6}$/',$id)){
		echo "<script type='text/javascript'>alert('$idERROR');
			window.location.href = 'libraryaddmemberform.php';
		</script>";
	}
	
	else if(!preg_match('/^[A-Z]{3}[0-9]{4}$/',$receiptnumber)){
		echo "<script type='text/javascript'>alert('$receiptnumberERROR');
			window.location.href = 'libraryaddmemberform.php';
		</script>";
	}
	
	else if(mysqli_num_rows($result1) > 0){
		echo "<script type='text/javascript'>alert('Member already exists in database');
								window.location.href =  'libraryaddmemberform.php';
							</script>";
	}
	
	else if(mysqli_num_rows($result2) > 0){
		echo "<script type='text/javascript'>alert('Member already exists in database');
								window.location.href =  'libraryaddmemberform.php';
							</script>";
	}
	
	
	else{
		
		if($membertype == 'Staff'){
			$sql_member = "INSERT INTO stafflibrarymember(staffID,receiptNo,dateRegistered) VALUES('$id','$receiptnumber','$date')";
		}
		else{
			$sql_member = "INSERT INTO studentlibrarymember(studentID,receiptNo,dateRegistered) VALUES('$id','$receiptnumber','$date')";
		}
		
		if (mysqli_query($conn, $sql_member)) {

					echo "<script type='text/javascript'>alert('Member added successfully');
						window.location.href = 'libraryviewmembers.php';
						</script>";
				}
				else{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				mysqli_close($conn);
		}
	
	

?>