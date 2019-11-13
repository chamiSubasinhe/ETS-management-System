<?php $loadingMSG = 'System is Loading...'; ?>

<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	
<!-- Load system variables ---------------------------------------->
	<?php// include 'static/getVariables.php';?>
	<!--# End Load system variables -->
	
		<!-- Load session variables ---------------------------------------->
	<?php// include 'static/session.php';?>
	<!--# End Load session variables -->
	
	<?php
	
	$stuID='';
	$dob='';
	$nic='';
	$address='';
	$nameInFull='';
	$nameWithInit='';
	$insertString ='';
	$flag1=3;
	$flag2=3;
	$flag3=3;
	
	$message='';
	$message2='';
	$message3='';
	$phone='';
	$email='';
	
	
	if(isset($_POST["stuID"]) )
	{
			$stuID=$_POST["stuID"];
	}
	else
		{
			$stuID='STKGIT001452';
		
		}
		

			$query2=mysqli_query($conn,"select S.stuID as 'stuID', S.nameWithInit as 'nameWithInit', S.nameInFull as 'nameInFull', P.phone as 'phone', S.address as 'address',E.email as 'email', nic, dob from student S, emails E, phones P where S.stuID=E.userId AND S.stuID=P.userId AND S.stuID='".$stuID."' " );
			while($row2=mysqli_fetch_array($query2))
			{
				
				
		

				$stuID=$row2['stuID'];
				$nameWithInit=$row2['nameWithInit'];
				$nameInFull =$row2['nameInFull'];
				$dob =$row2['dob'];
				$nic =$row2['nic'];
				$address =$row2['address'];
				$phone =$row2['phone'];
				$email =$row2['email'];
			
			}

	
		
		?>
		
		<?php
		
		if(isset($_POST["update"]))
	{
		
		if(isset($_POST["stuID"])){
			$stuID=$_POST["stuID"];
		}
		if(isset($_POST["nameWithInit"])){
			$nameWithInit=$_POST["nameWithInit"];
		}
		if(isset($_POST["nameInFull "])){
			$nameInFull =$_POST["nameInFull "];
		}
		if(isset($_POST["dob"])){
			$dob=$_POST["dob"];
		
		}
		if(isset($_POST["nic"])){
			$nic=$_POST["nic"];
		}
		if(isset($_POST["address"])){
			$address=$_POST["address"];
		}
		if(isset($_POST["phone"])){
			$phone=$_POST["phone"];
		}
		if(isset($_POST["email"])){
			$email=$_POST["email"];
		}
		
		$updateStudent="UPDATE student SET  nameWithInit='".$nameWithInit."' ,nameInFull='".$nameInFull ."' ,dob='".$dob."',nic='".$address."',address='".$address."' WHERE stuID='".$stuID."'  ";
		$updatePhone="UPDATE phones SET  phone='".$phone."' WHERE userId='".$stuID."'  ";
		$updateEmail="UPDATE emails SET  email='".$email."' WHERE userId='".$stuID."'  ";
		          
		if(!mysqli_query($conn,$updateStudent)){
			//$message= 
			echo'error';
			//$flag1=0;
		}
		else
		{
			echo'<br>';
			//$message=
			echo'I record updated student table!';
			//$flag1=1;
		
		}
		if(!mysqli_query($conn,$updatePhone)){
			//$message2= 
			echo'error';
			//$flag2=0;
		}
		else
		{
			echo'<br>';
			//$message2= 
			echo'I record updated phone table!';
			//$flag2=1;
		}
		
		if(!mysqli_query($conn,$updateEmail)){
			//$message3= 
			echo'error';
			//$flag3=0;
		}
		else
		{
			echo'<br>';
			//$message3= 
			echo'I record updated Email table!';
			//$flag3=1;
		}
	}
?>
	
	<!DOCTYPE html>
<html>

	<!-- Page head --------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Loader -->
	
	<body class="theme-red">
	<!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />


    <!-- Page Loader ------------------------------------>
	<?php include 'static/preloader.php';?>
    <!-- #END# Page Loader -->
	
    <!-- Overlay For Sidebars --------------------------->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
	
    <!-- Search Bar ------------------------------------->
    <?php include 'static/searchbar.php';?>
    <!-- #END# Search Bar -->
	
    <!-- Top Bar ---------------------------------------->
    <?php //include 'static/topnav.php';?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -------------------------------->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info ---------------------->
			<?php include 'static/userinfo.php';?>
            <!-- #User Info -->
			
            <!-- Menu --------------------------->
			<?php include 'static/menu.php';?>
            <!-- #Menu -->
			
            <!-- Footer ------------------------->
            <?php include 'static/footer.php';?>
            <!-- #Footer -->
			
        </aside>
        <!-- #END# Left Sidebar -->
		
        <!-- Right Sidebar ----------------------------->
        <?php include 'static/rightsidebar.php';?>
        <!-- #END# Right Sidebar -->
		
    </section>

	
	
	
    <section class="content">
	<!-- Main page content  ----------------------------->
        
                   
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>STUDENT REGISTRATION</h2>
                           
                        </div>
		<div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
						<?php echo $message; ?>
        </div>
                        <div class="body">
                            <form id="form_validation"  action="upst.php" method="POST">
							                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="stuID" class="form-control" style="visibility:hidden;" name="stuID" value="<?php  echo $stuID;  ?>">
                                        <input type="text" id="stuID" class="form-control" name="stuID" value="<?php  echo $stuID;  ?>" disabled>
                                        <label class="form-label">Student Id</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="nameWithInit" class="form-control" name="nameWithInit"  value="<?php  echo $nameWithInit;  ?>">
                                        <label class="form-label">Name with initial</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="nameInFull" class="form-control" name="nameInFull" value="<?php  echo $nameInFull;  ?>" >
                                        <label class="form-label">Initial denoted by<label>
                                    </div>
                                </div>
								
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="nic" class="form-control" name="nic" value="<?php  echo $nic;  ?>" >
                                        <label class="form-label">nic</label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="mobile" class="form-control" name="phone"  value="<?php  echo $phone;  ?>"  >
                                        <label class="form-label">Mobile phone number<label>
                                    </div>
                                </div>	
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" id="email" class="form-control" name="email" value="<?php  echo $email;  ?>" >
                                        <label class="form-label">Email</label>
                                    </div>
                                </div>
                                
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="address" id="address" class="form-control no-resize" name="address"  value="" required><?php  echo $address;  ?></textarea>
                                        <label class="form-label">Address<label>
                                    </div>
                                </div>
								
								<div class="col-sm-12">
								<div class="form-group">
									<button class="btn btn-alert" input type="submit" name="update" value="" id="updateExam">Update</button>
                                    <button class="btn btn-danger waves-effect" data-type="cancel" name="expire" id="expireExam" value="expireExam">Expire</button></td>
									 <button class="btn btn-danger waves-effect" data-type="cancel" name="delete" id="expireExam" value="expireExam">Delete</button></td>
								</div>
								</div>
				
		<div><hr></div>
		
		</form>
		
                        </div>
                    </div>
                </div>
            </div>  
			<!--  Main page content ----------------------------->
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php'; ?>
		<!-- #END# Javascript  -->
		 <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

		
</body>

</html>
			
			