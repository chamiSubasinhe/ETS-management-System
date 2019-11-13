<?php 
/*
* Google Metirial Design Template designed Asiri Hewage
* asiriofficial@gmail.com
* All Rights Reserved C 2018
* http://asirihewage.business.site
*/
?>

<?php $loadingMSG = 'Query compiler is initialing...'; ?>

<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	
<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->
	
		<!-- Load session variables ---------------------------------------->
	<?php //include 'static/session.php';?>
	<!--# End Load session variables -->

	<?php
$link = $conn;
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

$regerror ='';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
		$regerror = "Please enter a username.";
    } 
    else if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
		$regerror  = "Please enter an email.";
    } else{
		
		$email = $_POST["email"];
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = mysqli_real_escape_string($link, trim($_POST["username"]));
            
			
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                    $regerror = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                $regerror = "Oops! Something went wrong. Please try again later.";
				error_log("\n Somthing went wrong on ".date("l").": ".date("Y-m-d h:i:sa"), 3, "SystemLogs/Logger-Register.log");
            }
        }
         
       //mysqli_stmt_close($stmt);
    }
    
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";    
        $regerror = "Please enter a password.";
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
        $regerror = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';   
        $regerror = 'Please confirm password.';  
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
            $regerror =  'Password did not match.';
			error_log("\n".$param_username." entered a wrong password on ".date("l").": ".date("Y-m-d h:i:sa"), 3, "SystemLogs/Logger-Register.log");
        }
        
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
		$username = $_POST["username"];
		
        $sql = "INSERT INTO users (UID, password, email) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $username, $param_password);
            
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            $param_email = $email;
			
            if(mysqli_stmt_execute($stmt)){
              
                setcookie("email", trim($_POST["email"]), time() + (86400 * 30), "/");
                setcookie("username", $username, time() + (86400 * 30), "/");
                
                //send email
				$subject = "Invitation - White Walkers Media";
				$htmlContent = '
				 
				Thanks for signing up!
				Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
				 
				------------------------
				Username: '.$username.'
				Password: '.$password.'
				------------------------
				 
				Please click this link to activate your account:
				https://www.whitewalkersmedia.com/login.php?username='.$username.'&password='.$param_password.'
				 
				';
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$headers .= 'From: White Walkers Media<info@whitewalkersmedia.com>' . "\r\n";
					$headers .= 'Cc: info@whitewalkersmedia.com' . "\r\n";
					$headers .= 'Bcc: info@whitewalkersmedia.com' . "\r\n";
						if(mail(trim($_POST["email"]),$subject,$htmlContent,$headers)){
							$regerror = 'Email has sent successfully.';
							error_log("\n Activation email sent to ".$_POST["email"]." on ".date("l").": ".date("Y-m-d h:i:sa"), 3, "SystemLogs/Logger-Register.log");
						}
						else{
							 $regerror = 'Email sending fail.';
						}
								$regerror = "Registration success!.";
				error_log("\n New user ".$param_username." Registered on ".date("l").": ".date("Y-m-d h:i:sa"), 3, "SystemLogs/Logger-Register.log");
                header("location: login.php?registered=true");
			}else{
                $regerror = "Something went wrong. Please try again later.";
            }
        }
         
    }
    
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | <?php echo $settingsArr['System_Name'];?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo $settingsArr["favicon_path"];?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
	
</head>
<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);"><img src="<?php echo $settingsArr["favicon_path"];?>" width="100"/></a>
            <small><?php echo $settingsArr["System_Name"];?></small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" action="" method="POST">
                    <div class="msg">Register a new membership<br><span class="label label-danger"><?php if($regerror){ echo '<b>'.$regerror.'</b>';} ?></span></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                         <div class="form-line">
										 <select name="username" class="form-control show-tick" required>
                                        <option value="">-- Please select your account--</option>
											<?php
				
		$query3=mysqli_query($conn,"select staffId,nameInFull from staff where status='1'");
		while($row3=mysqli_fetch_array($query3)){
			?>
                                        <option value="<?php echo $row3["staffId"]; ?>"><?php echo $row3["nameInFull"]; ?></option>
										
		<?php } ?>
                                    </select>
            </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm_password" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>

                    <button name="register" class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Register</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="login.php">Already have a login?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/examples/sign-up.js"></script>
</body>

</html>