<?php 

?>
<!DOCTYPE html>
<html>
<head>

    <!-- Google Fonts
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">-->


    <!--custom css added for staff managemment -->
    <link rel="stylesheet" type="text/css" href="css/custom.css"/>

    <!-- noUISlider Css -->
    <link href="plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    



    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />



    <!-- Page head --------------------------------------->
	<?php include 'head.php';?>
	<!--# end Page Loader -->

	<!--db connection-->
	<?php include_once 'includes/dbh.php';?>


</head>
<body class="theme-blue">

    <!-- Page Loader ------------------------------------>
	<?php include 'preloader.php';?>
    <!-- #END# Page Loader -->
	
    <!-- Overlay For Sidebars --------------------------->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
	
    <!-- Search Bar ------------------------------------->
    <?php include 'searchbar.php';?>
    <!-- #END# Search Bar -->
	
    <!-- Top Bar ---------------------------------------->
    <?php include 'topnav.php';?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -------------------------------->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info ---------------------->
			<?php include 'userinfo.php';?>
            <!-- #User Info -->
			
            <!-- Menu --------------------------->
			<?php include 'menu.php';?>
            <!-- #Menu -->
			
            <!-- Footer ------------------------->
            <?php include 'footer.php';?>
            <!-- #Footer -->
			
        </aside>
        <!-- #END# Left Sidebar -->
		
        <!-- Right Sidebar ----------------------------->
        <?php include 'rightsidebar.php';?>
        <!-- #END# Right Sidebar -->
		
    </section>

    <section>

    </section>

    <section class="content">
    <!-- Main page content  ----------------------------->

	

      
    <div class="container-fluid">
         <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <b>LIST OF EMPLOYEES</b>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">Options</i>
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Staff ID</th>
                                            <th>Full name</th>
                                            <th>Post</th>
                                            <th>Basic</th>
                                            <th>Allowances</th>
                                            <th>Deductions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Staff ID</th>
                                            <th>Full name</th>
                                            <th>Post</th>
                                            <th>Basic</th>
                                            <th>Allowances</th>
                                            <th>Deductions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    	  <?php
										    
										       $sql = "SELECT staff.staffID, staff.nameInFull, staff.post, salary.allowences, salary.deduction, salary.basic FROM staff, salary WHERE staff.staffID = salary.staffID";



										        $result = mysqli_query($conn, $sql);
										        $resultCheck = mysqli_num_rows($result);
										        
										        if($resultCheck > 0)
										        {
										            while($rows = mysqli_fetch_assoc($result))
										            {
										               
										                ?>

                                         	<tr id="<?php echo $row['staffID']; ?>">
                                         	<td><?php echo $rows['staffID']; ?></td>	
                                            <?php $id= $rows['staffID']; ?>;
                                            <td><?php echo $rows['nameInFull']; ?></td>
                                            <td><?php echo $rows['post']; ?></td>
                                            <td><?php echo $rows['basic']; ?></td>
                                            <td><?php echo $rows['allowences']; ?></td>
                                            <td><?php echo $rows['deduction']; ?></td>

                                        </tr>
                                                                           <?php
                                        }
                                    }
                                ?>

                                    </tbody>

                                 </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
                                    

                                    
                                
        </div>

    
	<!--  Main page content ----------------------------->
    </section>


	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'scripts.php';?>



    <!-- Custom Js -->
    <script src="js/pages/forms/advanced-form-elements.js"></script>

    <script src="plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>



    <!-- #END# Javascript  -->
		
</body>

</html>
