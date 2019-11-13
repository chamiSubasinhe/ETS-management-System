<?php error_reporting(0);
?>
<?php 
/*
* Google Metirial Design Template designed Asiri Hewage
* asiriofficial@gmail.com
* All Rights Reserved C 2018
* http://asirihewage.business.site
*/
?>

<?php $loadingMSG = 'Welcome...'; ?>

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
$UID = $password = "";
$UID_err = $password_err = $activation_err ="";
 
if(isset($_GET['message'])){
	$activation_err = $_GET['message'];
}


if(isset($_POST["login"])){

    
    if(empty(trim($_POST["UID"]))){
        $UID_err = 'Please enter UID.';
    } else{
        $UID = mysqli_real_escape_string($link, trim($_POST["UID"]));
    }
    
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = mysqli_real_escape_string($link, trim($_POST['password']));
    }
    
    if(empty($UID_err) && empty($password_err)){
        $sql = "SELECT UID, password FROM users WHERE UID = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_UID);
            
            $param_UID = $UID;
            
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                   
                    mysqli_stmt_bind_result($stmt, $UID, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                           
                            session_start();
                            $_SESSION['UID'] = $UID; 
							$_SESSION['logged']=true;		
							setcookie("UID", $UID , time()+3600);
							
							//----retrive data
							$getdata =mysqli_query($conn,'select * from users where UID="'.$_SESSION['UID'].'"');
		                    while($row2=mysqli_fetch_array($getdata)){
		                        $_SESSION['userId'] = $row2['id'];
		                        $_SESSION['authId'] = $row2['authId'];
								error_log("\n".$UID." Logged in on ".date("l").": ".date("Y-m-d h:i:sa"), 3, "SystemLogs/Logger-Login.log");

		                    }
							//---end retrive data
						if($_SESSION['authId']==0){
						   $_SESSION['UID']='';
						   $string = $_SESSION['email'];
						   $string = '*****'.substr($string, -15);
                           // $string = str_replace("u","*",$string);
                    
						    $activation_err = 'Your account is not yet activated! please check your email: '.$string;
						}
						if($_SESSION['authId']=='1' && $_SESSION['UID']){
						    // header("location: home.php");
							//echo '<meta http-equiv="Location" content="home.php">';
							echo'<script> location.replace("home.php"); </script>';
						}else if($_SESSION['authId']=='2' && $_SESSION['UID']){
						    // header("location: home.php");
							//echo '<meta http-equiv="Location" content="home.php">';
							echo'<script> location.replace("course_management_system/"); </script>';
						}else if($_SESSION['authId']=='3' && $_SESSION['UID']){
						    // header("location: home.php");
							//echo '<meta http-equiv="Location" content="home.php">';
							echo'<script> location.replace("library_management_system/"); </script>';
						}else if($_SESSION['authId']=='4' && $_SESSION['UID']){
						    // header("location: home.php");
							//echo '<meta http-equiv="Location" content="home.php">';
							echo'<script> location.replace("financial_management_system/"); </script>';
						}
						else if($_SESSION['authId']=='5' && $_SESSION['UID']){
						    // header("location: home.php");
							//echo '<meta http-equiv="Location" content="home.php">';
							echo'<script> location.replace("inventory_management_system/"); </script>';
						}
						else if($_SESSION['authId']=='6' && $_SESSION['UID']){
						    // header("location: home.php");
							//echo '<meta http-equiv="Location" content="home.php">';
							echo'<script> location.replace("staff_management_system/"); </script>';
						}else if($_SESSION['authId']=='7' && $_SESSION['UID']){
						    // header("location: home.php");
							//echo '<meta http-equiv="Location" content="home.php">';
							echo'<script> location.replace("attendance_management_system/"); </script>';
						}else if($_SESSION['authId']=='8' && $_SESSION['UID']){
						    // header("location: home.php");
							//echo '<meta http-equiv="Location" content="home.php">';
							echo'<script> location.replace("student_management_system/"); </script>';
						}
						
						
							//header("location: template.php");
                            
                        } else{
                            $activation_err = 'The password you entered was not valid.';
							error_log("\n".$UID." Entered an invalid password on ".date("l").": ".date("Y-m-d h:i:sa"), 3, "SystemLogs/Logger-Login.log");
                        }
                    }
                } else{
                    $activation_err = 'No system user account found with that UID.';
					error_log("\n Someone named ".$UID." was trying to login on ".date("l").": ".date("Y-m-d h:i:sa"), 3, "SystemLogs/Logger-Login.log");
                }
            } else{
                $activation_err = 'Oops! Something went wrong. Please try again later.';
				error_log("\n Something went wrong on ".date("l").": ".date("Y-m-d h:i:sa"), 3, "SystemLogs/Logger-Login.log");
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
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
<style type="text/css">
/* fallback */
@font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: url(css/MaterialIcons-Regular.woff2) format('woff2');
}

.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -webkit-font-feature-settings: 'liga';
  -webkit-font-smoothing: antialiased;
}
</style>

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
		
            <a href="javascript:void(0);"><img src="<?php echo $settingsArr["favicon_path"];?>" width="150"/></a>
            <small><?php echo $settingsArr["System_Name"];?></small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg"><b>Sign In</b> to start your session<br><span class="label label-danger"><?php if($activation_err){ echo '<b>'.$activation_err.'</b>';} ?></span></div>
					
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="UID" id="UIDtemp" placeholder="UID" <?php if(isset($_COOKIE[$UID])) { echo 'value="'.$_COOKIE[$UID].'"';}?> required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
						<span class="label label-danger" id="passwordError">WARNING! Caps lock is ON.</span>
						
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button name="login" class="btn btn-block bg-red waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <?php if($settingsArr["SMS_APP_ID"]!=NULL || $settingsArr["SMS_APP_ID"]!=''){ echo '<div class="col-xs-6">
                            <a href="smssignup.php">Login with SMS</a>
                        </div>'; }?>
                        <div class="col-xs-6 align-right">
                            <a href="forgotpw.php">Forgot Password?</a>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
		
		<hr>
		<p>Demo Logins for each function: </p>
		<button id="administrator" onclick="myFunction1()" class="btn btn-primary">Main Administrator</button>
		<button id="course" onclick="myFunction2()" class="btn btn-primary">Course Management</button>
		<button id="library" onclick="myFunction3()" class="btn btn-primary">Library Management</button>
		<button id="financial" onclick="myFunction4()" class="btn btn-primary">Financial Management</button>
		<button id="inventory" onclick="myFunction5()" class="btn btn-primary">Inventory Management</button>
		<button id="staff" onclick="myFunction6()" class="btn btn-primary">Staff Management</button>
		<button id="attendance" onclick="myFunction7()" class="btn btn-primary">Attendance Management</button>
		<button id="student" onclick="myFunction8()" class="btn btn-primary">Student Management</button>
		
		
		<script>
			function myFunction1() {
				document.getElementById("UIDtemp").value = "SFKGAD001325";
				document.getElementById("password").value = "asiri123";
			}
			function myFunction2() {
				document.getElementById("UIDtemp").value = "SFKGLE001553";
				document.getElementById("password").value = "asiri123";
			}
			function myFunction3() {
				document.getElementById("UIDtemp").value = "SFKGMA001563";
				document.getElementById("password").value = "asiri123";
			}
			function myFunction4() {
				document.getElementById("UIDtemp").value = "SFKGLE001564";
				document.getElementById("password").value = "asiri123";
			}
			function myFunction5() {
				document.getElementById("UIDtemp").value = "SFKGAD001365";
				document.getElementById("password").value = "asiri123";
			}
			function myFunction6() {
				document.getElementById("UIDtemp").value = "SFKGAD001366";
				document.getElementById("password").value = "asiri123";
			}
			function myFunction7() {
				document.getElementById("UIDtemp").value = "SFKGMA001567";
				document.getElementById("password").value = "asiri123";
			}
			function myFunction8() {
				document.getElementById("UIDtemp").value = "SFKGLE001552";
				document.getElementById("password").value = "asiri123";
			}
		</script>
      
	
	
    </div>
	
	<!-- Detect Capstock -->
		<script>
	var input = document.getElementById("password");
	var text = document.getElementById("passwordError");
	text.style.display = "none"
	input.addEventListener("keyup", function(event) {

	if (event.getModifierState("CapsLock")) {
		text.style.display = "block";
	  } else {
		text.style.display = "none"
	  }
	});
	</script>
	
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>