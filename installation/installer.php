<?php 
/*
* Google Metirial Design Template designed Asiri Hewage
* asiriofficial@gmail.com
* All Rights Reserved C 2018
* http://asirihewage.business.site
*/
?>
	
	
<!DOCTYPE html>
<html>

	<!-- Page head --------------------------------------->
	<?php include 'installation/static/head.php';?>
	<!--# end Page Loader -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	
<body class="text-center">

    <!-- Page Loader ------------------------------------>
	<?php include 'installation/static/preloader.php';?>
    <!-- #END# Page Loader -->
	
    <!-- Overlay For Sidebars --------------------------->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
	
	<div><hr></div>
	
	<div class="container">
            <div class="row clearfix">
           
	<!-- Main page content  ----------------------------->
	
		<?php
	session_start();
	ini_set('max_execution_time', 300); //300 seconds = 5 minutes
	$error='';
	$flag=1;
	preloader("Institute Management System - Installation Started");
	sleep(1);
	
	
	
	if(!isset($_SESSION['system'])){
		$_SESSION['system']='0';
	}
	if(!isset($_SESSION['db'])){
		$_SESSION['db']='0';
	}
	
   
if(isset($_POST["btn_createDB"]) && isset($_POST["dbhost"])){
	if(!isset($_POST["dbhost"])){
		$error = 'please provide a host address';
		$flag=0;
	}
	if(!isset($_POST["dbusername"])){
		$error = 'please provide a database username';
		$flag=0;
		$_POST["dbhost"]='root';
	}
	if(!isset($_POST["dbpassword"])){
		$error = 'please provide a password';
		$flag=0;
	}
	if(!isset($_POST["dbname"])){
		$error = 'please provide a database name';
		$flag=0;
		$_POST["dbhost"]='ets';
	}
	if(is_file('ets/static/dbconnection.php')){
		unlink('ets/static/dbconnection.php');
	}
	fwrite(fopen("ets/static/dbconnection.php", "a"), '');
	preloader("Creating Configuration file....");
	sleep(1);
	
	$myfile = fopen("ets/static/dbconnection.php", "a") or die("Unable to open file!");
	$txt = '<?php $db_host = "'.$_POST["dbhost"].'"; // Server Name
	 $db_user = "'.$_POST["dbusername"].'"; // Username
	 $db_pass = "'.$_POST["dbpassword"].'"; // Password
	 $db_name = "'.$_POST["dbname"].'"; // Database Name
	';

	$txt = $txt.' $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	if (!$conn) {
		die ("Failed to connect to MySQL: " . mysqli_connect_error());	
	} ?>';
	
	
	if(!fwrite($myfile, $txt)){
		$_SESSION['system']='0';
		$_SESSION['db']='0';
		$flag=0;
		preloader("Creating Configuration file failed");
		sleep(1);
	}else{
		$_SESSION['db']='1';
		preloader("Creating Configuration file success !");
		sleep(1);
		
		
	}
	
	fclose($myfile);
}




		//check installation filesize
		
		//preloader('error');
		//die;
		$file = 'https://api.asicloud.org/system.zip';// remote server url
		$newfile = 'system.zip';

	if($_SESSION['system']=='0'){
		//php check
		if(intval(phpversion()) > 3){
			preloader("PHP version: ".phpversion()." -ok");
			sleep(1);
		 }else{
			preloader("PHP version: ".phpversion()." is not supported");
			$error=$error."PHP version: ".phpversion()." is not supported";
		 }
		 
		  //check php write access  ----------------------------------
		if(!is_file('testFile.txt')){
			file_put_contents('testFile.txt', 'Institute management System file');
			preloader("System Write Access- Allowed");
			sleep(1);
		}else{
			preloader("System Write Access - Not Allowed");
			$error=$error.'System Write Access - Not Allowed'; 
		}
	
	
		 //check php read access  ----------------------------------
		if(is_file('testFile.txt')){
			unlink('testFile.txt');
			preloader("System Read Access- Allowed");
			sleep(1); 
		}else{
			preloader("System Read Access - Not Allowed");
			$error=$error."System Read Access - Not Allowed"; 
		}
	 
		preloader("Migrating the system from the remote server...");
		sleep(1);
			
		if ( copy($file, $newfile) ) {
			preloader("Migration successful!");
			sleep(1);
		}else{
			preloader("System migration failed! Please Reload.");
			$error=$error."System migration failed! Please Reload.";
		}

		//system
		if(is_file('system.zip')){
			preloader($_SERVER['DOCUMENT_ROOT']."/system.zip unzipping to the root...");
			sleep(1);
		}else{
			preloader($_SERVER['DOCUMENT_ROOT']."/system.zip - missing");
			$error=$error.$_SERVER['DOCUMENT_ROOT']."/system.zip - missing";
		}
		//unziping
		$zip = new ZipArchive;
		if ($zip->open('system.zip') === TRUE) {
			$zip->extractTo('ets/');
			$zip->close();
			preloader("System Coppied into".$_SERVER['DOCUMENT_ROOT']);
			sleep(1);
		} else {
			preloader("System can not be coppied into".$_SERVER['DOCUMENT_ROOT']);
			$error=$error."System can not be coppied into".$_SERVER['DOCUMENT_ROOT'];
		}


		preloader("File checksum started....");
		sleep(1);
		
		//statis
		if(is_file('ets/static/index.html')){
			$dir    = 'static/';
			$files2 = scandir($dir, 1);
			foreach($files2 as $value) {
				preloader($_SERVER['DOCUMENT_ROOT']."/static/".$value);
				usleep(100000);
			}
			
		}else{
			preloader("System Static directory and files are missing!");
			$error=$error."System Static directory and files are missing!";
		}

		//css
		if(is_file('ets/css/index.html')){
			$dir    = 'css/';
			$files2 = scandir($dir, 1);
			foreach($files2 as $value) {
				preloader($_SERVER['DOCUMENT_ROOT']."/css/".$value);
				usleep(100000);
			}
			
		}else{
			preloader("System css directory and files are missing!");
			$error=$error."System css directory and files are missing!";
		}
		
		//js
		if(is_file('ets/js/index.html')){
			$dir    = 'js/';
			$files2 = scandir($dir, 1);
			foreach($files2 as $value) {
				preloader($_SERVER['DOCUMENT_ROOT']."/js/".$value);
				usleep(100000);
			}
			
		}else{
			preloader("System js directory and files are missing!");
			$error=$error."System js directory and files are missing!";
		}
		
		
		if($error==''){
			$_SESSION['system']='1';
		}
		
	}else{
		preloader("Institute Management System - Initialize database connection");
		sleep(2);
	}
		
		
		?>
	<?php
	if($_SESSION['db']=='0'){
	?>
	<br>
			<!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Connect Database</h2><small>You must have a database server and an empty database created on it.<small>
                            <div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
						<?php echo $error; ?>
                            </div>
                        </div>
                        <div class="body">
                            <form method="POST" class="form-horizontal">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Database Host</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text"  name="dbhost" class="form-control" placeholder="Enter your database host address">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Database User Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="dbusername" class="form-control" placeholder="Enter your database user name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Database Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="dbname" class="form-control" placeholder="Enter your database name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Database Password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="dbpassword" class="form-control" placeholder="Enter your database password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="btn_createDB">Connect Database</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
			

	<?php } 
	
	if($_SESSION['db']=='1'){?>
	<div class="row clearfix" >
	<div class="col-3">
		<img width="250" src="https://api.asicloud.org/images/giphy.gif" />
	</div>
	<div class="col-6">
		<h2>Thank You!</h2>
		<p>The system has successfully installed on your server. Hope you will enjoy our product!</p>
		-Asiri & Development Team
		<br>
		<a class="btn btn-success" href="../www/" target="_blank">System Home</a> | <a class="btn btn-orange" href="index.php" target="_blank">Github Repository</a> | <a class="btn btn-info" href="index.php" target="_blank">User Manual</a>| <a class="btn btn-warning" href="index.php" target="_blank">Terms of Servoce and Privacy Policy</a>
	</div>
	</div>
	<?php } ?>
			
	<!--  Main page content ----------------------------->
	</div>
	</div>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'installation/static/scripts.php';?>
		<!-- #END# Javascript  -->

</body>

</html>
