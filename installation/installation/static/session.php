<?php
  session_start();
    if(!isset($_SESSION['username'])){
      header("location:login.php");
   }
   
   $user_check = $_SESSION['username'];
   
   $ses_sql = mysqli_query($conn,"select * from users where username = '$user_check' ");
   
   $userdata = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

	$sessionArr = array();// settings 2d array // echo $sessionArr['email']
	
	$sessionArr['UID']  = $userdata['UID'];
	$sessionArr['username']  = $userdata['username'];
	$sessionArr['email']  = $userdata['email'];
	$sessionArr['authId']  = $userdata['authId'];
	$sessionArr['gender']  = $userdata['gender'];
	$sessionArr['name_with_init']  = $userdata['name_with_init'];
	$sessionArr['full_name']  = $userdata['full_name'];
	$sessionArr['thumb']  = $userdata['thumb'];
	
?>