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
                                Add a new member
                            </h2></b>
						<div class = "col-sm-9">
		
						</div>
						

                        
                        </div>
						<div class = "body">
						<h2 class="card-inside-title">Basic Information</h2>
						<form method = "post" action = "addmembercode.php">
                            <div class="row clearfix">
                                <div class="col-sm-3">
								<div class = "form-control">
                                    Identification Number
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="SFKGLE001552" name = "id" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-sm-3">
								<div class = "form-control">
                                    Receipt Number
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="LIB4556" name = "receiptnumber" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
								<div class="row clearfix">
                                <div class="col-sm-3">
								<div class = "form-control">
                                    Member Type
									</div>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control show-tick" name = "membertype">
                                        <option>Staff</option>
                                        <option>Student</option>
                                    </select>

                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-sm-3">
								<div class = "form-control">
                                    Date
									</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="datepicker form-control" placeholder="Please choose a date..." name = "date" \>
                                        </div>
                                    </div>
                            </div>


						</div>
						<div class="row clearfix">	
							<div class = "col-sm-8"></div>
							<div class = "col-sm-4">
								<input type = "submit" class="btn bg-blue btn-block waves-effect" id = "addMember" value= "ADD MEMBER"></button>
							</div>
						</div>
						</form>
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