<?php 
/*
* Google Metirial Design Template designed Asiri Hewage
* asiriofficial@gmail.com
* All Rights Reserved C 2018
* http://asirihewage.business.site




*****************SMS API Request $_REQUEST["message"] && $_REQUEST["numb"]   https://telco.whitewalkersmedia.com/send.php
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

<body class="login-page">
    <div class="login-box">
        <div class="logo">
		
            <a href="javascript:void(0);"><img src="<?php echo $settingsArr["favicon_path"];?>" width="100"/></a>
            <small><?php echo $settingsArr["System_Name"];?></small>
        </div>
        <div class="card">
            <div class="body">
                    <div class="msg"><b>Enter your phone number</b></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone</i>
                        </span>
                        <div class="form-line">
						<p id="response"></p>
						<input type="text" style="display:none" id = "message" value="ets login asiri">
                            <input type="text" id="numb" class="form-control mobile-phone-number" name="numb" <?php if($settingsArr["SMS_APP_ID"]==NULL || $settingsArr["SMS_APP_ID"]==''){ echo 'placeholder="This service is not available" disabled'; }else {echo 'placeholder="Ex: +00 (000) 000-00-00"';}?> >
                        </div>
                    </div>
					
                    <div class="row">
                        <div class="col-xs-6">
						<?php if($settingsArr["SMS_APP_ID"]==NULL || $settingsArr["SMS_APP_ID"]==''){ echo '<button type="button" class="btn btn-default waves-effect" disabled="disabled">Get SMS Key</button>'; }else {echo '<button class="btn btn-block bg-red waves-effect" id="sms-send" type="submit">Get SMS Key</button>';}?>
                            
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6 align-center">
                            <a href="login.php">Sign in normaly?</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
	
	
 <script>
         $(document).ready(function() {
           
            $("#sms-send").click(function(event){
               
               $.post(
                  "https://telco.whitewalkersmedia.com/send.php",
                  { message: document.getElementById("message").value, numb: document.getElementById("numb").value },
                  function(data) {
                     $('#response').html(data);
                        document.getElementById("numb").style.display = 'none';
						document.getElementById("sms-send").innerHTML= "SMS sent";
                  }
               );            
            });
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