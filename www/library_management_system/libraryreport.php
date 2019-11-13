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

<?php
	$flag = 0;
	$rowFine = 0;
	$studentFine = 0;
	$lastBook = 0;
	$totalBooks = 0;
	$member = 0;
	$book = 0;
	
if(isset($_POST['reportbtn'])){
		$flag = 1;
		$studentFine = 1750;
		$lastBook = "Advanced Networking";
		$result = "REPORT FOR MONTH SEPTEMBER";
		$member = "SFKGLE002277";
		$book = "Computer Science Basics";
		
		$totalFine = "SELECT SUM(fine) AS 'sum_fine' FROM libraryborrow";
		$resultFine = mysqli_query($conn, $totalFine);
		
		while($row = mysqli_fetch_assoc($resultFine))
		{
			$rowFine += $row['sum_fine'];
		}
		
		$totBook = "SELECT COUNT(isbn) AS 'tot_book' FROM book";
		$resultTotBook = mysqli_query($conn, $totBook);
		
		while($row = mysqli_fetch_assoc($resultTotBook))
		{
			$totalBooks += $row['tot_book'];
		}		
}
?>

<!DOCTYPE html>

<html>
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
								<h2><b>Report</h2></b>
							<div class = "col-sm-9"></div>
							</div>
							
							
						<div class = "body">
							<form method = "post" action = "">
							<h2 class="card-inside-title">Select month to generate report</h2>
                            <div class="row clearfix">
                                <div class="col-sm-3">
									<div class = "form-control">
										Month
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
									 <select class="form-control show-tick">
                                        <option>January</option>
                                        <option>February</option>
                                        <option>March</option>
										<option>April</option>
										<option>May</option>
										<option>June</option>
										<option>July</option>
										<option>August</option>
										<option selected = "selected">September</option>
										<option>October</option>
										<option>November</option>
										<option>December</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
							<div class = "col-sm-8"></div>
							<div class = "col-sm-4">
								<input type = "submit" class="btn bg-teal btn-block waves-effect" name = "reportbtn" value = "GENERATE REPORT"/>
						</form>
                        </div>
						<br/><br/><br/><br/>
									<?php  if($flag == 1){ echo '<div class="alert bg-green">' .$result.'</div>'; }?>	
									
									<div class="row clearfix">
                                <div class="col-sm-3">
									<div class = "form-control">
										Total Fines
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value = '<?php echo $rowFine;?>' name = "fine" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
							
						<div class="row clearfix">
                                <div class="col-sm-3">
									<div class = "form-control">
										Student Fines
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value = '<?php echo $studentFine;?>' name = "fine" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
							
													<div class="row clearfix">
                                <div class="col-sm-3">
									<div class = "form-control">
										Last Book Added
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value = '<?php echo $lastBook;?>' name = "lastbook" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
							
																				<div class="row clearfix">
                                <div class="col-sm-3">
									<div class = "form-control">
										Total Books In Library
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value = '<?php echo $totalBooks;?>' name = "totbook"  disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
														
						<div class="row clearfix">
                                <div class="col-sm-3">
									<div class = "form-control">
										Member with most outstanding fines
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value = '<?php echo $member;?>' name = "member"  disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							<div class="row clearfix">
                                <div class="col-sm-3">
									<div class = "form-control">
										Most borrowed book
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value = '<?php echo $book;?>' name = "book"  disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="body">
                            </div>
							September earnings as a percentage of total earnings
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%;">
                                    15%
                                </div>
                            </div>
                        </div>
							
							
							
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