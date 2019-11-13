<?php
 $courseID	='';
 $email='';
 $resident='';
 $home='';
 $subject='';
 
 	


if(!empty($courseID	)||!empty($email)||!empty($resident)||!empty($home)||!empty($subject)){
	
	 $db_host = 'localhost'; // Server Name
	 $db_user = 'root'; // Username
	 $db_pass = ''; // Password
	 $db_name = 'ets'; // Database Name
	
	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	
	$courseID	= mysqli_real_escape_string($conn,$_post['courseID	']);
 $email=mysqli_real_escape_string($conn,$_post['email']);
 $resident=mysqli_real_escape_string($conn,$_post['resident']);
 $home=mysqli_real_escape_string($conn,$_post['home']);
 $subject=mysqli_real_escape_string($conn,$_post['subject']);

	

	if(mysqli_connect_error()){
		die('connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
	}else{
		$select="select emial from register where email=? limit 1";
		$insert="insert into inquiry(courseID,email,resident,home,subject)values(?,?,?,?,?)";
		
		$stmt=$conn->prepare($selecct);
		$stmt->blind_param("s",$email);
		$stmt->execute();
		$stmt->blind_result();
		$stmt->store_result();
		$rnum=$stmt->num_rows;
		
	}
		if($rnum==0){
			$stmt->close();
			
			$stmt=$conn->prepare($insert);
			$stmt->blind_param("ssssii",$courseID,$email,$resident,$home,$subject);
			$stmt->execute();
			echo"sccessfully";
		}
		else{
			echo"someone already register using this email";


		}
		$stmt->close();
		$conn->close();
	
}
else{
	echo"all field are required";
	die()
}

?>