<?php 
/*
* Google Metirial Design Template designed Asiri Hewage
* asiriofficial@gmail.com
* All Rights Reserved C 2018
* http://asirihewage.business.site
*/
	include 'static/dbconnection.php';
	include 'static/session.php';
	
	$active=''; 
	$authQuery=mysqli_query($conn,"select * from authlevels A, users U where U.authId=A.authId AND U.UID='".$user_check."'");
	$authArr = array();
	
	//auth array the back bone machan don't change
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


		
	
	function get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		   $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}

	$human = get_client_ip();

		$query22 = mysqli_query($conn, "SELECT ip FROM visitors WHERE ip='".$human."' LIMIT 1");
		
		if(mysqli_num_rows($query22) == 0){
			
            $text11 = '';
            if($_SERVER['HTTP_REFERER']){
                $text11 = $_SERVER['HTTP_REFERER'];
            }
            else{
                $text11 = 'Direct';
            }
             if ($human || $text11) {
            $text11 = $_SERVER['HTTP_REFERER'];
            $ip1 = get_client_ip();
            $queryvisitor="INSERT INTO visitors (ref,ip) VALUES ('$text11','$ip1')";
            mysqli_query($conn,$queryvisitor);
    		}
		}else if(mysqli_num_rows($query22) == 1 && $human!='112.135.47.233'){
		    $queryvisitor2="UPDATE visitors SET visits = visits+1 WHERE ip='".$human."'";
            mysqli_query($conn,$queryvisitor2);
		}
		
	
	
	
	 //for security
	 /*
	if($authArr['administration']=='1'){
		include 'home.php';
		
	}else if($authArr['studentManagement']=='1'){
		include 'student_management_system/';
		
	}else if($authArr['inventoryManagemnt']=='1'){
		include 'inventory_management_system/';
		
	}
	else if($authArr['courseManagemnt']=='1'){
		include 'course_management_system/';
		
	}else if($authArr['libraryManagement']=='1'){
		include 'library_management_system/';
		
	}else if($authArr['staffManagement']=='1'){
		include 'staff_management_system/';
		
	}else if($authArr['financialManagement']=='1'){
		include 'financial_management_system/';
		
	}else if($authArr['attendance']=='1'){
		include 'attendance_management_system/';
	}else{
		include 'home.php';
	}
	*/
	include 'home.php';
	
?>
