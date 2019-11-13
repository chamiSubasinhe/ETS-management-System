<?php

	
	if(isset($_POST['addperform']))
	{

		//db connection 
	    include_once 'dbh.php';


		$emp_id = mysqli_real_escape_string($conn, $_POST['emp_id']);
		$period = mysqli_real_escape_string($conn,$_POST['period']);
		$accuracy = mysqli_real_escape_string($conn,$_POST['accuracy']);
		$accuracycom = mysqli_real_escape_string($conn,$_POST['accuracycom']);
		$speed = mysqli_real_escape_string($conn,$_POST['speed']);
		$speedcom = mysqli_real_escape_string($conn,$_POST['speedcom']);
		$jobknowledge = mysqli_real_escape_string($conn,$_POST['jobknowledge']);
		$jobknowledgecom = mysqli_real_escape_string($conn,$_POST['jobknowledgecom']);
		$init = mysqli_real_escape_string($conn,$_POST['init']);
		$initcom = mysqli_real_escape_string($conn,$_POST['initcom']);
		$qow = mysqli_real_escape_string($conn,$_POST['qow']);
		$qowcom = mysqli_real_escape_string($conn,$_POST['qowcom']);
		//$commit = mysqli_real_escape_string($conn,$_POST['commit']);
		//$commitcom = mysqli_real_escape_string($conn,$_POST['commitcom']);
		$communication = mysqli_real_escape_string($conn,$_POST['communication']);
		$communicationcom = mysqli_real_escape_string($conn,$_POST['communicationcom']);
		$commonsense = mysqli_real_escape_string($conn,$_POST['commonsense']);
		$commonsensecom = mysqli_real_escape_string($conn,$_POST['commonsensecom']);
		$appe = mysqli_real_escape_string($conn,$_POST['appe']);
		$appecom = mysqli_real_escape_string($conn,$_POST['appecom']);
		$cooperation = mysqli_real_escape_string($conn,$_POST['cooperation']);
		$cooperationcom = mysqli_real_escape_string($conn,$_POST['cooperationcom']);
		$cs = mysqli_real_escape_string($conn,$_POST['cs']);
		$cscom = mysqli_real_escape_string($conn,$_POST['cscom']);
		$conduct = mysqli_real_escape_string($conn,$_POST['conduct']);
		$conductcom = mysqli_real_escape_string($conn,$_POST['conductcom']);
		$total = mysqli_real_escape_string($conn,$_POST['total']);
		$asper = mysqli_real_escape_string($conn,$_POST['asper']);
		$emp_id_enter = mysqli_real_escape_string($conn,$_POST['emp_id_enter']);
		$emp_id_review = mysqli_real_escape_string($conn,$_POST['emp_id_review']);





		//used to check whether data transfering properly
		/* $emp_id."<br> 2: ".$period."<br> 3: ".$accuracy."<br> 4: ".$accuracycom."<br> 5: ".$speed."<br> 6: ".$speedcom."<br> 7: ".$jobknowledge."<br> 8: ".$jobknowledgecom."<br> 9: ".$init."<br> 10: ".$initcom."<br> 11: ".$qow."<br> 12: ".$qowcom."<br> 13: ".$communication."<br> 14: ".$communicationcom."<br> 15: ".$commonsense."<br> 16: ".$commonsensecom."<br> 17: ".$appe."<br> 18: ".$appecom."<br> 19: ".$cooperation."<br> 20: ".$cooperationcom."<br> 21: ".$cs."<br> 22: ".$cscom."<br> 23: ".$conduct."<br> 24: ".$conductcom."<br> 25: ".$total."<br> 26: ".$asper."<br> 27: ".$emp_id_enter."<br> 28: ".$emp_id_review;

		
		if(empty($perform) || empty($full_name) || empty($gender) || empty($dob) || empty($nic)  || empty($date_join) || empty($managed_by)  || empty($email) || empty($phone) || empty($address) || empty($basic) || empty($allow) || empty($deduct) || empty($job_type) || empty($job_status) || empty($position))
			{
	    		header("Location: ../addSMemberForm.php?addsm=empty");
	    		exit();		
			}
		*/
			
			$sql = "INSERT INTO perform(staffID, month, accuracy, accuracycom, speed, speedcom, jobknow, jobknowcom, qow, qowcom, inititive, inititivecom, communication, communicationcom, commensense, commenSensecom, app, appcom, corp, corpcom, cs, cscom, conduct, othercom, entered, review, total, percent) VALUES ('$emp_id', '$period', '$accuracy', '$accuracycom', '$speed', '$speedcom', '$jobknowledge', '$jobknowledgecom', '$qow', '$qowcom', '$init', '$initcom', '$communication', '$communicationcom', '$commonsense', '$commonsensecom', '$appe', '$appecom', '$cooperation', '$cooperationcom', '$cs', '$cscom', '$conduct', '$conductcom' , '$emp_id_enter', '$emp_id_review', '$total', '$asper');";

			
			mysqli_query($conn, $sql);

			header("Location: ../performanceform.php?insert=sucess");
	    	exit();




	
	}
	else
	{
			header("Location: ../performanceform.php?insert=formnotsubmitted");
	    	exit();
	}


?>