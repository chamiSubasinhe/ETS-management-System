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

	$hallID = "";
	$type = "";
	$status = "";
	$center = "";
	$date = "";
	$name = "";
	$SupName = "";
	$email = "";
	$phone = "";
    $Description = "";
	
	$sql = "SELECT * FROM items";
	///if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>hallID</th>";
                echo "<th>type</th>";
                echo "<th>status</th>";
                echo "<th>center</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['hallID'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['center'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
//} //else{
   // echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
//}
 
// Close connection
//mysqli_close($link);
	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
}

?>

	
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

</style>
</head>


	<!-- Page head --------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Loader -->
	
	    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">


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
        <!--aside id="leftsidebar" class="sidebar">
            <!-- User Info ---------------------->
			<!--?php include 'static/userinfo.php';?>
            <!-- #User Info -->
			
            <!-- Menu --------------------------->
			<!--?php include 'static/menu.php';?>
            <!-- #Menu -->
			
            <!-- Footer ------------------------->
            <!--?php include 'static/footer.php';?>
            <!-- #Footer -->
			
        <!--/aside>
        <!-- #END# Left Sidebar -->
		
        <!-- Right Sidebar ----------------------------->
        <?php include 'static/rightsidebar.php';?>
        <!-- #END# Right Sidebar -->
		
    </section>

	
	
	
    <section class="content">
	<!-- Main page content  ----------------------------->
        <div class="container-fluid">

			    <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><b>
                                Search for Books
                            </h2></b>
                        </div>
						
                        <div class="body" >
			<div id="custom-search-input">
			<form method = "POST" action = "librarybooksearch.php">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" placeholder="Enter isbn........." name = "searchbook"/>
						<span class="input-group-btn">
							<input type = "submit" class="btn bg-blue btn-block waves-effect" name = "search" value = "SEARCH" />
						</span>
			</form>
                </div>
            </div>
                </div>
		

                        </div>
                    </div>
                </div>
            </div>
			
			<hr>
			
			
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>