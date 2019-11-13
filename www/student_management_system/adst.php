<?php $loadingMSG = 'System is Loading...'; ?>

<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	
<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->
	
		<!-- Load session variables ---------------------------------------->
	<?php include '../static/session.php';?>
	<!--# End Load session variables -->
	
	
	<?php
			
	$flag ='';
	

		
		
	if(isset($_POST['AddStudent'])){
		
		if(isset($_POST['stuID'])){
			$stuID=mysqli_real_escape_string($conn,$_POST['stuID']);
		}else{
			$flag=1;
			$message="Please insert STUDENTID";
		}
		
		
		
		
		if(isset($_POST['nameWithInit'])){
			$nameWithInit=mysqli_real_escape_string($conn,$_POST['nameWithInit']);
		}else{
			$flag=1;
			$message="Please insert NAME WITH INITIALS";
		}
		
		if(isset($_POST['nameInFull'])){
			$nameInFull=mysqli_real_escape_string($conn,$_POST['nameInFull']);
		}else{
			$flag=1;
			$message="Please insert NAME IN FULL";
		}
		
		if(isset($_POST['dob'])){
			$dob=mysqli_real_escape_string($conn,$_POST['dob']);
			$dob = strtotime($dob);
			$dob = date('YYYY-mm-dd',$dob);


		}else{
			$flag=1;
			$message="Please insert DOB";
		}
		
		if(isset($_POST['nic'])){
			$nic=mysqli_real_escape_string($conn,$_POST['nic']);
		}else{
			$flag=1;
			$message="Please insert NIC";
		}
		
		

		if(isset($_POST['gender'])){
			$gender=mysqli_real_escape_string($conn,$_POST['gender']);
		}else{
			$flag=1;
			$message="Please insert GENDER";
		}
		
		
		
		if(isset($_POST['address'])){
			$address=mysqli_real_escape_string($conn,$_POST['address']);
		}else{
			$flag=1;
			$message="Please insert ADDRESS";
		}
		
		if(isset($_POST['mobile'])){
			$phone1=mysqli_real_escape_string($conn,$_POST['mobile']);
			$type1 = 'Mobile';
		}else{
			$flag=1;
			$message="Please insert phone";
		}
	
		if(isset($_POST['residence'])){
			$phone2=mysqli_real_escape_string($conn,$_POST['residence']);
			$type2 = 'Residence';
		}else{
			$flag=1;
			$message="Please insert residence phone";
		}
		if(isset($_POST['courseID'])){
			$courseID=mysqli_real_escape_string($conn,$_POST['courseID']);
		}else{
			$flag=1;
			$message="Please insert courseID";
		}
		
		
		
		if(isset($_POST['ol'])){
			$ol='1';
		}else{
			$ol='0';
		}
		
		if(isset($_POST['al'])){
			$al='1';
		}else{
			$al='0';
		}
		
		
		
		
		if($flag==0){
			$sql1 = "INSERT INTO student (stuID,nameWithInit,nameInFull,dob,nic,gender,address,ol,al,courseID) VALUES( '".$stuID."','".$nameWithInit."','".$nameInFull."','".$dob."','".$nic."','".$gender."','".$address."','".$ol."','".$al."','".$courseID."')";
		}
		
		if($flag==0){
			$sql2 = "INSERT INTO phones (userId,phone,type) VALUES( '".$stuID."','".$phone1."','".$type1."')";
		}
		if($flag==0){
			$sql3 = "INSERT INTO phones (userId,phone,type) VALUES( '".$stuID."','".$phone2."','".$type2."')";
		}
		
		if(mysqli_query($conn,$sql1) && $flag==0){
			$flag==1;
			$message= "Student ".$nameInFull.' added successfuly.';
		}
		else{
			$flag==0;
			$message= "Student ".$nameInFull.' can not be added.';
		}
		
		
		if(mysqli_query($conn,$sql2) && $flag==0){
			$flag==1;
			$message= "1 record added";
		}
		else{
			$flag==0;
		}
		
		
		if(mysqli_query($conn,$sql3) && $flag==0){
			$flag==1;
			$message= "Student ".$nameInFull.' added successfuly.';
		}
		else{
			$flag==0;
		}
		
		
		
		
		
	}else{
		$flag==0;
		$message="Data recieving error!";
	}
		
	//new student
	$getSID=mysqli_query($conn,"select stuID from student order by stuID DESC LIMIT 1 ");
		
		while($rowgetSID=mysqli_fetch_array($getSID)){
			$stuID = $rowgetSID['stuID'];
		}
		
		$part1 = substr($stuID, 0, 6);
		$part2 = intval(substr($stuID, 6))+1;
		$part2 = str_pad($part2, 6, '0', STR_PAD_LEFT);
		$newstuID = $part1.$part2;
	//end new student	
		
	
	?>
	<?php
		
	if (isset($_POST['search'])){
		
		
		$stuID=mysqli_real_escape_string($conn, $_POST['stuID']);
		
		
		$sql_find_certificate = "SELECT * FROM student WHERE stuID = '".$stuID."'  ";
	
		$result = mysqli_query($conn, $sql_find_certificate);
	
	if(mysqli_num_rows($result) > 0){
		$message2= "successfuly Search";
		$flag=1;
	}
	
		else{
				$message2="Error in Search "; 
				$flag=0;
			}
				
	
	} 
	?>
		
	<?php
	?>
	
	
<!DOCTYPE html>
<html>

	<!-- Page head --------------------------------------->
	<?php include '../static/head.php';?>
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
                            <form id="form_validation"  action="adst.php" method="POST">
							                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="stuID" class="form-control" style="visibility:hidden;" name="stuID" value="<?php echo $newstuID; ?>">
                                        <input type="text" id="stuID" class="form-control" name="stuID" value="<?php echo $newstuID; ?>" disabled>
                                        <label class="form-label">Student Id <small>(Student next to <?php echo $stuID;?>)</small></label>
                                    </div>
                                </div>
								
								
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="nameWithInit" class="form-control" name="nameWithInit" required>
                                        <label class="form-label">Name with initial</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="nameInFull" class="form-control" name="nameInFull" required>
                                        <label class="form-label">Initial denoted by<label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="Date" id="dob" class="form-control" name="dob" required>
                                        <label class="form-label">Date of Birth<label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="nic" class="form-control" name="nic" required>
                                        <label class="form-label">nic</label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="mobile" class="form-control" name="mobile" required>
                                        <label class="form-label">Mobile phone number<label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="residence" class="form-control" name="residence" required>
                                        <label class="form-label">Residence<label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" id="email" class="form-control" name="email" required>
                                        <label class="form-label">Email</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="radio" value="1" name="gender" id="male" class="with-gap" checked>
                                    <label for="male">Male</label>

                                    <input type="radio" value="0" name="gender" id="female" class="with-gap">
                                    <label for="female" class="m-l-20">Female</label>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="address" id="address" class="form-control no-resize" name="address" required></textarea>
                                        <label class="form-label">Address<label>
                                    </div>
                                </div>
								
								<div class="form-group form-float">
								<div class="form-group">
								<input type="checkbox" id="ch1"  name="al" checked/>
                                <label for="basic_checkbox_1">A/L</label>
								</div>
                                    <input type="checkbox" id="ch2"  name="ol"/>
                                    <label for="checkbox">O/L</label> 
								</div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="nameWithInit" class="form-control" name="courseID" required>
                                        <label class="form-label">CourseID</label>
                                    </div>
                                </div>
								
                                <input class="btn btn-primary waves-effect" type="submit" name="AddStudent" />
                            <button onclick="myFunction()" class="btn btn-primary">Fill Sample Data</button>
		<script>
			function myFunction() {
				document.getElementById("address").value = "Kandy RD, Colombo";
				document.getElementById("email").value = "asiri123@gmail.com";
				document.getElementById("residence").value = "0721258930";
				document.getElementById("mobile").value = "0786161343";
				document.getElementById("nic").value = "961571162V";
				document.getElementById("nameInFull").value = "Emma Tiffani Sarah Perera";
				document.getElementById("nameWithInit").value = "E.T.S.Perara";
			}
			function fill2(){
				document.getElementById("stuID").value = "STKGIT001452";
			}
		</script>
		
		
		</form>
		
                        </div>
                    </div>
                </div>
            </div>  
			
			
			
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>SEARCH STUDENT DETAILS</h2>
							
						
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
						
                        <div class="body">
                            <form id="form_validation"  action="upst.php" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="stuID" required>
                                        <label class="form-label">Student Id</label>
                                    </div>
                                </div>
								<div class="body">
                            
                            
                               
                                <button class="btn btn-primary waves-effect" type="submit" name="search">Search</button>
								<a class="btn btn-primary waves-effect" onclick="fill2()" >Demo Data</a>
                            </form>
							<p><?//php echo $message; ?></p>
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
