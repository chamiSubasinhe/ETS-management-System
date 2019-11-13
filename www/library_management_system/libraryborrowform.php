<?php 
//page by S.L.Weldeniya
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
<?php
$flag = 0;
$flag2 = 0;
$flag3 = 0;

$banner = "You must fill all fields";

if(isset($_POST['borrow'])){
	if(empty($_POST['isbn']) || empty($_POST['id']) || empty($_POST['date'])){
		$flag = 1;
		$banner = "You must fill all fields";
	}
	else{
		$isbn = $_POST['isbn'];
		$id = $_POST['id'];
		$date = $_POST['date'];	
		
		if(!preg_match('/^[0-9]{13}$/',$isbn) || !preg_match('/^[A-Z]{6}[0-9]{6}$/',$id)){
			$banner2 = "Borrow Operation Unsuccessful - Invalid ISBN/MemberID";
			$flag3 = 1;
			
		}
		
		else{
			$query = "INSERT INTO libraryborrow(isbn,memberID,dateBorrowed) VALUES('$isbn','$id','$date') ";
			$result = mysqli_query($conn, $query);		
		
			
			if($result > 0){
				$banner2 = "Borrow Operation Successful";
				$flag2 = 1;
			}
			else{
				$banner2 = "Borrow Operation Unsuccessful";
				$flag3 = 1;
			}
		}	
	
	}
}
?>

	
<!DOCTYPE html>
<html>

	<!-- Page head --------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Loader -->
	
	    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
	
	    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

	
<body class="theme-red">

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
    <?php include 'static/topnav.php';?>
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
        <div class="container-fluid">

			    <div class="row clearfix js-sweetalert">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
						    <h2><b>
                                Borrow Books
                            </h2></b>



                        
                        </div>
						<form method = "post" action = "">
						<div class = "body">
						<h2 class="card-inside-title">Borrow</h2>
						<?php if($flag == 0 && $flag2 == 0 && $flag3 == 0){echo '<div class="alert bg-red">' .$banner. '</div>';} ?>
						<?php if($flag == 0 && $flag2 == 1 && $flag3 == 0){echo '<div class="alert bg-green">' .$banner2. '</div>';} ?>
						<?php if($flag == 1 && $flag2 == 0 && $flag3 == 0){echo '<div class="alert bg-red">' .$banner. '</div>';} ?>
						<?php if($flag == 0 && $flag2 == 0 && $flag3 == 1){echo '<div class="alert bg-red">' .$banner2. '</div>';} ?>
                            <div class="row clearfix">
                                <div class="col-sm-3">
								<div class = "form-control">
                                    Member Identification Number
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="SFKGLE002277" name = "id"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-sm-3">
								<div class = "form-control">
                                    Book ISBN
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="9781598215162" name = "isbn"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-sm-3">
								<div class = "form-control">
                                    Borrow Date
									</div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="datepicker form-control" placeholder="Please choose a date..." name = "date">
                                        </div>
                                    </div>
                            </div>
							<div class = "col-sm-8"></div>
							<div class = "col-sm-4">
								<input type = "submit" class="btn bg-blue btn-block waves-effect"  name = "borrow" value = "BORROW" />
							</div>
						</form>
						</div>

						</div>

						
                </div>
            </div>
			
			<hr>
			
			

	</div>
	</section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		  <!-- Jquery Core Js -->
    <script src="../../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
		<!-- #END# Javascript  -->
		
</body>

</html>