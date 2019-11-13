<?php 
/*
* Google Metirial Design Template designed Asiri Hewage
* asiriofficial@gmail.com
* All Rights Reserved C 2018
* http://asirihewage.business.site
*/

//error_reporting(0);
?>
<?php
  session_start();
    if(!isset($_COOKIE['UID'])){
      header("location:login.php?message=your session timed out");
   }else{
   
	$user_check = $_SESSION['UID'];
   
	$sessionArr = array();// settings 2d array // echo $sessionArr['email']
   
   //get data for staff -----------------------------------------------------------------------
   $ses_sql = mysqli_query($conn,"select * from staff S, emails E, phones P where S.staffId = E.userId AND P.userId=S.staffId AND S.staffId = '".$user_check."'" );
	
	if(mysqli_num_rows($ses_sql)){
		$userdata = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
	   
		$sessionArr['UID']  = $_SESSION['UID'];
		$sessionArr['authId']  = $_SESSION['UID'];
		$sessionArr['gender']  = $userdata['gender'];
		$sessionArr['name_with_init']  = $userdata['nameWithInit'];
		$sessionArr['full_name']  = $userdata['nameInFull'];
		$sessionArr['thumb']  = $userdata['thumb'];
		$sessionArr['favicon_path']  = $userdata['thumb'];
		$sessionArr['email']  = $userdata['email'];
		$sessionArr['phone']  = $userdata['phone'];
		
		
		
	//get access levels -----------------------------------------------------------------------------------
	$authQuery=mysqli_query($conn,"select * from authlevels A, users U where U.authId=A.authId AND U.UID='".$user_check."'");
	$authArr = array();
	
	while($rowAuth=mysqli_fetch_array($authQuery)){
		$authArr['studentManagement']  = $rowAuth['studentManagement'];// auth levels 2d array for staff users
		$authArr['financialManagement']  = $rowAuth['financialManagement'];
		$authArr['inventoryManagemnt']  = $rowAuth['inventoryManagemnt'];
		$authArr['courseManagemnt']  = $rowAuth['courseManagemnt'];
		$authArr['libraryManagement']  = $rowAuth['libraryManagement'];
		$authArr['staffManagement']  = $rowAuth['staffManagement'];
		$authArr['administration']  = $rowAuth['administration'];
		$authArr['attendance']  = $rowAuth['attendance'];
	}
	
	

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
   
	
   }
	
	set_time_limit(100);
	
	
	
?>