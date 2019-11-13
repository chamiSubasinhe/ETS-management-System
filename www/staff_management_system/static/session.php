<?php
  session_start();
    if(!isset($_COOKIE['UID'])){
      header("location:login.php?message=your session timed out");
   }
   
	$user_check = $_SESSION['UID'];
   
	$sessionArr = array();// settings 2d array // echo $sessionArr['email']
   
   //get data for staff -----------------------------------------------------------------------
   $ses_sql = mysqli_query($conn,"select * from staff S, emails E, phones P where S.staffId = E.userId AND P.userId=S.staffId AND S.staffId = '".$user_check."'" );
	
	if(mysqli_num_rows($ses_sql)){
		$userdata = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
	   
		$sessionArr['UID']  = $_SESSION['UID'];
		$sessionArr['authId']  = $_SESSION['authLevel'];
		$sessionArr['gender']  = $userdata['gender'];
		$sessionArr['name_with_init']  = $userdata['nameWithInit'];
		$sessionArr['full_name']  = $userdata['nameInFull'];
		$sessionArr['thumb']  = $userdata['thumb'];
		$sessionArr['favicon_path']  = $userdata['thumb'];
		$sessionArr['email']  = $userdata['email'];
		$sessionArr['phone']  = $userdata['phone'];
   }else{
   //get data for student -----------------------------------------------------------------------
	   $ses_sql = mysqli_query($conn,"select * from student S, emails E, phones P where S.stuID = E.userId AND P.userId=S.stuID AND stuID = '".$user_check."'" );
	   $userdata = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
	   
		$sessionArr['UID']  = $_SESSION['UID'];
		$sessionArr['authId'] = $_SESSION['authLevel'];
		$sessionArr['gender']  = $userdata['gender'];
		$sessionArr['name_with_init']  = $userdata['nameWithInit'];
		$sessionArr['full_name']  = $userdata['nameInFull'];
		$sessionArr['favicon_path']  = $userdata['thumb'];
		$sessionArr['email']  = $userdata['email'];
		$sessionArr['phone']  = $userdata['phone'];
   }
   
	
?>