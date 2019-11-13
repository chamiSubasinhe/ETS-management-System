         <?php

        

        if (isset($_POST['addsm']))
        {

	    	//db connection 
	        include_once 'dbh.php';

	        

	       // $position = $_POST['position'];
	        //$job_type = $_POST['job_type'];        
			//$job_status = $_POST['job_status'];
			$position = mysqli_real_escape_string($conn,$_POST['position']);
			$job_type = mysqli_real_escape_string($conn,$_POST['job_type']);
			$job_status = mysqli_real_escape_string($conn,$_POST['job_status']);
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


			//check for empty feilds || empty($job_type) || empty($job_status) || empty($position)
			if(empty($emp_id) || empty($full_name) || empty($gender) || empty($dob) || empty($nic)  || empty($date_join) || empty($managed_by)  || empty($email) || empty($phone) || empty($address) || empty($basic) || empty($allow) || empty($deduct) || empty($job_type) || empty($job_status) || empty($position))
			{
	    		header("Location: ../addSMemberForm.php?addsm=empty");
	    		exit();		
			}
			else
			{

				//checking input values are valid
				if(!preg_match("/^SF([a-zA-Z)]){4}\d{6}/", $emp_id))
				{
	    			header("Location: ../addSMemberForm.php?addsm=invalid");
	    			exit();	
				}
				else
				{

				
					//check if email is valid
					if(!filter_var($email, FILTER_VALIDATE_EMAIL))
					{
						header("Location: ../addSMemberForm.php?addsm=email");
	    				exit();
					}
					else
					{
						$sqlidcheck = "SELECT * FROM staff WHERE staffID='$emp_id'";
						$result = mysqli_query($conn, $sqlidcheck);
						$resultCheck = mysqli_num_rows($result);

						if($resultCheck > 0)
						{
							header("Location: ../addSMemberForm.php?addsm=idtaken");
	    					exit();		
						}
						else
						{
							//$sql = "INSERT INTO staff ('staffId', 'nameInFull', 'nameWithInit', 'managedBy', 'gender', 'post', 'dob') VALUES
							//('$emp_id', '$full_name', '$init_name', $managed_by', '$gender','$position', '$dob');";

							$sql1 = "INSERT INTO staff (staffID, nameInFull, managedBy, gender, post, dob, thumb, nic, datejoined, jobtype, jobstatus) VALUES
									('$emp_id', '$full_name','$managed_by', '$gender','$position', '$dob', '$fileDestination', '$nic', '$date_join' , '$job_type', '$job_status');";
					            

							/*$sql2 = "INSERT INTO dependents (staffID, name, relationship, bod, nic) VALUES
									('$emp_id', '$spouse_name', '$rel', '$depend_birth_date', '$depend_nic');";*/

							$sql3 = "INSERT INTO salary (staffID, basic, allowences, deduction) VALUES
									('$emp_id', '$basic', '$allow', '$deduct');";

							/*$sql4 = "INSERT INTO staffbankdetails (staffID, bank, accno) VALUES
									('$emp_id', '$Bank', '$acc_no');";*/

							
							$sql5 = "INSERT INTO staffcontact (staffID, email, officephone, address) VALUES
												('$emp_id', '$email', '$phone', '$address');";


				            mysqli_query($conn, $sql1);
				            //mysqli_query($conn, $sql2);
				            mysqli_query($conn, $sql3);
				            //mysqli_query($conn, $sql4);
				            mysqli_query($conn, $sql5);

				            header("Location: ../addSMemberForm.php?addsm=sucess");
	    					exit();
	   					}

					}

				}
			}
		}   
	    else
	    {
	    	header("Location: ../addSMemberForm.php?");
	    	exit();
	    }
?>