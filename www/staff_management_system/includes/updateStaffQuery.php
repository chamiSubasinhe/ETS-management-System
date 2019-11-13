        <?php

        

        if (isset($_POST['updatesm']))
        {

	    	//db connection 
	        include_once 'dbh.php';



	       	$position = $_POST['position'];
	       	$job_type = $_POST['job_type'];        
			$job_status = $_POST['job_status'];
			//$position = mysqli_real_escape_string($conn,$_POST['position']);
			//$job_type = mysqli_real_escape_string($conn,$_POST['job_type']);
			//$job_status = mysqli_real_escape_string($conn,$_POST['job_status']);
			$emp_id = mysqli_real_escape_string($conn, $_POST['emp_id']);        
			$full_name = mysqli_real_escape_string($conn, $_POST['full_name']);       
			$gender = mysqli_real_escape_string($conn, $_POST['gender']);
			$dob = mysqli_real_escape_string($conn, $_POST['dob']);
			$nic = mysqli_real_escape_string($conn, $_POST['nic']);             
			$date_join = mysqli_real_escape_string($conn, $_POST['date_join']);
			$managed_by = mysqli_real_escape_string($conn, $_POST['managed_by']);      
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$phone = mysqli_real_escape_string($conn, $_POST['phone']);
			$address = mysqli_real_escape_string($conn, $_POST['address']);
			$basic = mysqli_real_escape_string($conn, $_POST['basic']);
			$allow = mysqli_real_escape_string($conn, $_POST['allow']);
			$deduct = mysqli_real_escape_string($conn, $_POST['deduct']); 
			$rawIdentifier = mysqli_real_escape_string($conn,$_POST['hiddenvalue']); 
			//$Bank = $_POST['Bank'];        
			//$acc_no = $_POST['acc_no'];
			//$marital_stat = $_POST['marital_stat'];
			//$spouse_name = $_POST['spouse_name'];
			//$rel = $_POST['rel'];
			//$depend_birth_date = $_POST['depend_birth_date'];
			//$depend_nic = $_POST['depend_nic'];
			//$depend_nic = $_POST['depend_nic'];


			$file = $_FILES['file'];
	        $fileName = $_FILES['file']['name'];
	        $fileTmpName = $_FILES['file']['tmp_name'];
	        $fileSize = $_FILES['file']['size'];
	        $fileError = $_FILES['file']['error'];
	        $fileType = $_FILES['file']['type'];

	        $fileExt = explode('.', $fileName);
	        $fileActualExt = strtolower(end($fileExt));

	        $allowed = array('jpeg', 'jpg', 'png');

	        if(in_array($fileActualExt, $allowed))
	        {
	        	if($fileError === 0)
	        	{
	        		if($fileSize < 10000000)
	        		{
	        			$fileNameNew = $emp_id.".".$fileActualExt;

	        			$fileDestination = 'uploads/'.$fileNameNew;

	        			move_uploaded_file($fileTmpName, $fileDestination);
	        		}
	        		else
	        		{
	        			echo "file is too big";
	        		}
	        	}
	        	else
	        	{
	        		echo "Ther was an error uploading your file!";
	        	}

	        }else
	        {
	        	echo "you cannot upload files of this type!";
	        }




			//error handlers
			//empty($emp_id) || empty($full_name) || empty($gender) || empty($dob) || empty($nic)  || empty($date_join) ||  || empty($position))  || empty($job_status)   empty($job_type)

			//check for empty feilds || empty($job_type) || empty($job_status) || empty($position)
			if(empty($managed_by)  || empty($email) || empty($phone) || empty($address) || empty($basic) || empty($allow) || empty($deduct) || empty($full_name) || empty($gender) || empty($dob) || empty($nic)  || empty($date_join))
			{
	    		header("Location: ../updateSM.php?updatesm=empty");
	    		exit();		
			}
			else
			{

				//checking input values are valid
				if(!preg_match("/^SF([a-zA-Z)]){4}\d{6}/", $emp_id))
				{
	    			header("Location: ../updateSM.php?updatesm=invalid");
	    			exit();	
				}
				else
				{

				
					//check if email is valid
					if(!filter_var($email, FILTER_VALIDATE_EMAIL))
					{
						header("Location: ../updateSM.php?updatesm=email");
	    				exit();
					}
					else
					{
						
						
			

					$sql1 = "UPDATE staff SET nameInFull = '$full_name', managedBy = '$managed_by',  gender = '$gender',  dob = '$dob', nic =  '$nic', datejoined = '$date_join'  WHERE staffID = '$emp_id';";
            /*
					$sql2 = "UPDATE dependents SET staffID = '$emp_id', name = '$spouse_name', relationship = '$rel', bod = '$depend_birth_date', nic = '$depend_nic' , jobtype = '$job_type' post = '$position', WHERE staffID = '$emp_id';";
*/
        			$sql3 = "UPDATE salary SET basic = '$basic', allowances='$allow', deduction='$deduct' WHERE staffID = '$emp_id';";

/*
        			$sql4 = "UPDATE staffbankdetails SET staffID = '$emp_id', bank = '$Bank', accno = '$acc_no' WHERE staffID = '$emp_id';";
*/

        			$sql5 = "UPDATE staffcontact SET email = '$email', officephone = '$phone', address = '$address', city = '$city' WHERE staffID = '$emp_id';";



				            mysqli_query($conn, $sql1);
				            //mysqli_query($conn, $sql2);
				            mysqli_query($conn, $sql3);
				            //mysqli_query($conn, $sql4);
				            mysqli_query($conn, $sql5);

				            header("Location: ../updateSM.php?updatesm=sucess");
	    					exit();
	   					

					}

				}
			}
		}   
	    else
	    {
	    	header("Location: ../updateSM.php?updatesm=btnnotset");
	    	exit();
	    }
?>