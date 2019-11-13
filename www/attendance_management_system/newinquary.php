
<?php 
include('include/db_con.php');
if(isset($_POST['Submit']))
{
$fn=$_POST['name'];
$ln=$_POST['surname'];
$phone=$_POST['email'];
$email=$_POST['description'];

$s1="INSERT INTO item (itemId,name,description,availability)VALUES('".$fn."','".$ln."','".$phone."','".$email."')";
mysql_query($s1) or die (mysql_error($con));
}
?>

<!--# End Load Settings CRUDE -->


	<?php $loadingMSG = 'Loading system Global Variables'; ?>
	
	
	
<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->

<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->

	
	
<!DOCTYPE html>
<html>

	<!-- Page head --------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Loader -->
	
	
	
	<style>
	/* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */  
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
    background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
	
	



	</style>
	
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
        <div class="container-fluid">
            <div class="block-header">
                <h3>Inquiry Form</h3>
            </div>
			
			
			<hr>
			<div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="2000" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php echo $result; ?>
                            </div>
						
			<!-- Main page content  ----------------------------->
<div class="container">
  <form action="action_page.php"method="post">

    <label for="fname">courseID</label>
    <input type="text" id="courseID	" name="courseID	" placeholder="courseID	.."required>

    <label for="lname">email</label>
    <input type="email" id="lname" name="email" placeholder="Your email"required>
	
	
	
	 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="home" class="form-control" name="number1" required>
                                        <label class="form-label">parsonal Number</label>
                                    </div>
                                    <div class="help-info">Numbers only</div>
                                </div>
								
								
	 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" id="resident" class="form-control" name="number" required>
                                        <label class="form-label">Resident Number</label>
										
										
                                    </div>
                                    <div class="help-info">Numbers only</div>
                                </div>
															
								
   

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="What you want to know..." style="height:200px"></textarea>

    <input type="submit" value="Submit">

  </form>
</div>







	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
		



		
</body>

</html>
