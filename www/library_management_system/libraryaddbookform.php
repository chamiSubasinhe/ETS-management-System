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
								<h2><b>Add a new book</h2></b>
							<div class = "col-sm-9"></div>
							</div>
							
							
						<div class = "body">
							<form method = "post" action = "addbookcode.php">
							<h2 class="card-inside-title">Basic Information</h2>
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
							
							<div class="row clearfix">
                                <div class="col-sm-3">
									<div class = "form-control">
										Title
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Introduction to Programming" name = "title" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
														
							<div class="row clearfix">
                                <div class="col-sm-3">
									<div class = "form-control">
										Author(s)
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="C.Dietel" name = "author" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-sm-3">
									<div class = "form-control">
										Call Number
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="630.51 P884" name = "callnumber" required />
                                        </div>
                                    </div>
                                </div>
                            </div>						
						</div>		
					</div>
				</div>
			<hr>
			


	</div>
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">

                            <h2 class="card-inside-title">
                                Other Information
                          
                            </h2>
							<div class="row clearfix">
                                <div class="col-sm-3">
								<div class = "form-control">
                                    Edition
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" class="form-control" placeholder="2" name = "edition"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-sm-3">
								<div class = "form-control">
                                    Pages
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" class="form-control" placeholder="354" name = "pages"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-sm-3">
								<div class = "form-control">
                                    Year Published
									</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" class="form-control" placeholder="2010" name = "yearpublished" />
                                        </div>
                                    </div>
                                </div>
                            </div>

							<div class="row clearfix">
                                <div class="col-sm-12">
								<div class = "form-control">
                                   Description
									</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="1" class="form-control no-resize auto-growth" placeholder="Programming for beginners" name = "description"></textarea>
                                </div>
								
                            </div>
							<div class = "col-sm-4">
							</div>
							<div class = "col-sm-4">
							</div>

							<div class = "col-sm-4">
								<input type = "submit" class="btn bg-blue btn-block waves-effect" id = "add" value = "ADD BOOK"/>

                        </div>
						<br/><br/>
                    </div>
								


                      </form>              

				</div>
                </div>
		
            </div>
		
    </section>
	
	

	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php'; ?>
		  <!-- Jquery Core Js -->

		<!-- #END# Javascript  -->
		
</body>

</html>