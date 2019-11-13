<?php
include_once 'dbh.php';
    
        if(isset($_POST['deletesm']))
        {


	
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
	

            
            $sql_insert = "INSERT INTO staffdumb (staffID, nameInFull,  managedBy, gender, post, dob, nic,  jobtype) VALUES
				('$emp_id', '$full_name',  '$managed_by', '$gender','$position', '$dob', '$nic', '$job_type');";

		      $result = mysqli_query($conn, $sql_insert);

              if($result == true)
              {

                $sql_delete = "DELETE FROM staff WHERE staffID = '$emp_id';";
                $sql_delete1 = "DELETE FROM salary WHERE staffID = '$emp_id';";
                $sql_delete2 = "DELETE FROM staffcontact WHERE staffID = '$emp_id';";
                    
		
		          $result = mysqli_query($conn, $sql_delete);
                  $result = mysqli_query($conn, $sql_delete1);
                  $result = mysqli_query($conn, $sql_delete2);
			
	           header("location: ../deleteSM.php?delete=success");
				
	           mysqli_close($conn);

           }

           

        }
        else
        {
            header("location: ../deleteSM.php?delete=fail");
            exit();
        }

	?>