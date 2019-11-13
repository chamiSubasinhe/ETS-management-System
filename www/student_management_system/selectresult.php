<?php require_once 'static/dbconnection.php';?>
<?php
	$query="SELECT * FROM studentexam";
	$result_set=mysqli_query($conn,$query);
	if($result_set){
		$table='<table>';
		$table .='<tr><th> EXAM ID</th><th>STUDENT ID</th><th>marks</th></tr>';
		while($record=mysqli_fetch_assoc($result_set)) {
			$table .='<tr>';
			$table .='<td>' .$record['examID'] . '</td>';
			$table .='<td>' .$record['stuID'] . '</td>';
			$table .='<td>' .$record['marks'] . '</td>';
			$table .='</tr>';
			
		
		}
		
		$table .='</table>';
		
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<title>Select Query</tittle
		<style>
			table{border-collapse:collapse;}
			td,th{border:1px solid black;}
			</style>
			</head>
			<body>
			    <?php echo $table; ?>
			</body>
			</html>
			
			