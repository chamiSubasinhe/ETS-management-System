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
	$flag2 = 0;
	
if(isset($_POST['searchbtn'])){
	if(empty($_POST['searchterm'])){
		$flag = 1;
		$emptyfield = "You must enter a search term";
	}
	else{
		$query = $_POST['searchterm'];
		$sql_find_book = "SELECT * FROM book WHERE title LIKE '%".$query."%' OR author LIKE '%".$query."%' ";		
		$result = mysqli_query($conn, $sql_find_book);
		$num_rows = mysqli_num_rows(mysqli_query($conn,$sql_find_book));
		
		if($num_rows == 0){
			$flag2 = 1;
			$emptyfield2 = "Book not found";
		}	
	}
}
else{
		$flag = 1;
		$emptyfield = "You must enter a search term";
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
	
	 <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />

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
								<h2><b>Search Book</h2></b>
							<div class = "col-sm-9"></div>
							</div>
							
							
						<div class = "body">
							<form method = "post" action = "">
							<h2 class="card-inside-title">Enter Title/Author to search for book</h2>
							<?php if($flag == 1){echo '<div class="alert bg-red">' .$emptyfield. '</div>';} ?>
							<?php if($flag2 == 1){echo '<div class="alert bg-red">' .$emptyfield2. '</div>';} ?>
                            <div class="row clearfix">
                                <div class="col-sm-3">
									<div class = "form-control">
										Title/Author
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Introduction to C++/S.P.Navanthe"  name="searchterm" />
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class = "col-sm-4"></div>
							<div class = "col-sm-4">
							<?php if($flag2 == 1){echo '<a href="../www/libraryaddbookform.php">Add a new book</a>';} ?>
							
							</div>
							<div class = "col-sm-4">
								<input type = "submit" class="btn bg-teal btn-block waves-effect" name = "searchbtn" value = "SEARCH BOOK" />
						</div>
						</form>
					
                        
						
						
						<br/><br/>

		
							
                          </div>
						<?php 
						if($flag == 0 && $flag2 == 0){
						echo '<div class="body">';
                        echo '    <div class="table-responsive">';
                        echo '        <table class="table table-bordered table-striped table-hover dataTable js-exportable">';
                        echo '            <thead>';
                        echo '                <tr>';
                        echo '                    <th>ISBN</th>';
                        echo '                    <th>Title</th>';
						echo '					<th>Edition</th>';
						echo '					<th>Year Published</th>';				
						echo '					<th>Pages</th>';
						echo '					<th>Description</th>';
						echo '					<th>Call Number</th>  ';                                    
						echo '					<th>Date Added</th>';
						echo '					<th>Author</th> '  ;
						echo '				<th>Action</th> '  ;
											
											
                        echo '                </tr>';
                        echo '            </thead>';
		
                        echo '            <tbody>';
									
									while(($row = mysqli_fetch_array($result)))
											{
											echo "<tr>";
											echo "<td>" . $row['isbn'] . "</td>";
											echo "<td>" . $row['title'] . "</td>";
											echo "<td>" . $row['edition'] . "</td>";
											echo "<td>" . $row['yearPublished'] . "</td>";
											echo "<td>" . $row['pages'] . "</td>";
											echo "<td>" . $row['description'] . "</td>";
											echo "<td>" . $row['callNumber'] . "</td>";
											echo "<td>" . $row['dateAdded'] . "</td>";
											echo "<td>" . $row['author'] . "</td>";
											echo '<td>	<form action = "librarybookupdateform.php"><input type = "submit" class="btn bg-green btn-block waves-effect" id = "update" value = "UPDATE BOOK"/></form></td>';
											echo "</tr>";
											}
									
 
                        echo '            </tbody>';
                        echo '        </table>';
                        echo '    </div>';
                        echo '</div>';
						}
						
						?>	
									
									
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