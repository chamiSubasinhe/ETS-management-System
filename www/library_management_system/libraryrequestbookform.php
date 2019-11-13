<?php 
	//page by S.L.Weldeniya
?>

<?php $loadingMSG = 'Query compiler is initialing...'; ?>

<!-- DB connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
<!--# end DB connection ----------------------------------->
	
<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
<!--# End Load system variables ----------------------------------->

<!DOCTYPE html>

<html>

<?php 

$isbn = $_POST['isbn'];
$isbnERROR = "Invalid ISBN";

if(isset($_POST['request'])){
	if(!preg_match('/^[0-9]{13}$/',$isbn)){
		echo "<script type='text/javascript'>alert('$isbnERROR');
			window.location.href = 'libraryrequestbookform.php';
		</script>";
	}
	else{
		$to = "email@example.com"; // this is your Email address
		$from = "librarian";
		
		$subject = "Book Request";
		$message = "Request for book. \n ISBN" . $isbn;
		$headers = "From:" . $from;
		
			mail($to,$subject,$message,$headers);
			$msg =  "Request E-mail for book with ISBN " . $isbn . " sent. Thank you ";
			echo "<script type='text/javascript'>alert('$msg');
									window.location.href = 'libraryrequestbookform.php';
			</script>";
    }
}
?>

<head>


	
	<!-- Page head --------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Loader -------------------------------->
	
	<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

</head>
	
<body class="theme-red">
    <!-- Page Loader ------------------------------------>
	<?php include 'static/preloader.php';?>
    <!-- #END# Page Loader ------------------------------>
	
    <!-- Overlay For Sidebars --------------------------->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars --------------------->
	
    <!-- Search Bar ------------------------------------->
    <?php include 'static/searchbar.php';?>
    <!-- #END# Search Bar ------------------------------->
	
    <!-- Top Bar ---------------------------------------->
    <?php include 'static/topnav.php';?>
    <!-- #Top Bar --------------------------------------->
	
    <section>
        <!-- Left Sidebar -------------------------------->
        <aside id="leftsidebar" class="sidebar">
		
            <!-- User Info ---------------------->
			<?php include 'static/userinfo.php';?>
            <!-- #User Info ---------------------->
			
            <!-- Menu --------------------------->
			<?php include 'static/menu.php';?>
            <!-- #Menu -------------------------->
			
            <!-- Footer ------------------------->
            <?php include 'static/footer.php';?>
            <!-- #Footer ------------------------>
			
        </aside>
		
        <!-- #END# Left Sidebar -------------------------------->
		
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
								<h2><b>Request Book</h2></b>
							<div class = "col-sm-9"></div>
							</div>
							
							
						<div class = "body">
							<form method = "post" action = "libraryrequestbookform.php">
                            <div class="row clearfix">
                                <div class="col-sm-3">
									<div class = "form-control">
										ISBN
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="9781566199094"  name="isbn" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class = "col-sm-8"></div>
							<div class = "col-sm-4">
								<input type = "submit" class="btn bg-blue btn-block waves-effect" name = "request" value = "REQUEST BOOK"/>
						</form>
                        </div>
						<br/><br/>
							
                                    </div>
                                </div>
                            </div>						
						</div>		
					</div>
			<hr>
			

		
    </section>
	
	

	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php'; ?>
		  <!-- Jquery Core Js -->

		<!-- #END# Javascript  -->
		
</body>

</html>