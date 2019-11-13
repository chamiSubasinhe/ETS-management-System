<?php 
	//page by H.M.Y.L.W.Bandara
?>

<!-- DB connection ---------------------------------------->
<?php include 'includes/dbh.php';?>
<!--# end DB connection ----------------------------------->
	

<!DOCTYPE html>
<html>
<head>



<!-- Page head --------------------------------------->
<?php include 'head.php';?>
<!--# end Page Loader -------------------------------->


</head>
	
<body class="theme-blue">
    <!-- Page Loader ------------------------------------>
	<?php include 'preloader.php';?>
    <!-- #END# Page Loader ------------------------------>
	
    <!-- Overlay For Sidebars --------------------------->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars --------------------->
	
    <!-- Search Bar ------------------------------------->
    <?php include 'searchbar.php';?>
    <!-- #END# Search Bar ------------------------------->
	
    <!-- Top Bar ---------------------------------------->
    <?php include 'topnav.php';?>
    <!-- #Top Bar --------------------------------------->
	
    <section>
        <!-- Left Sidebar -------------------------------->
        <aside id="leftsidebar" class="sidebar">
		
            <!-- User Info ---------------------->
			<?php include 'userinfo.php';?>
            <!-- #User Info ---------------------->
			
            <!-- Menu --------------------------->
			<?php include 'menu.php';?>
            <!-- #Menu -------------------------->
			
            <!-- Footer ------------------------->
            <?php include 'footer.php';?>
            <!-- #Footer ------------------------>
			
        </aside>
        <!-- #END# Left Sidebar -------------------------------->
		
        <!-- Right Sidebar ----------------------------->
        <?php include 'rightsidebar.php';?>
        <!-- #END# Right Sidebar -->
		
    </section>


	
	
    <section class="content">
	<!-- Main page content  ----------------------------->


    <div class="card">
        <div class="body">
            <form action="customReports.php" method="POST" id="myform">


            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <div class = "form-control">Position*</div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" id="position" name="position" form="myform" required>

                                            <option>Select</option>
                                            <?php

                                                $query1 = "SELECT * FROM post";
                                                $result1 = mysqli_query($conn, $query1);

                                                while($numRows1 = mysqli_fetch_array($result1)){

                                                    $postid = $numRows1['postid'];
                                                    $rowsData1 = $numRows1['postname'];
                                                    ?>

                                                    <option value="<?php echo $rowsData1; ?>"><?php echo $rowsData1; ?></option>
                                                    

                                                    <?php
                                                }


                                            ?>




                                                <!--
                                                <option value="accountant" name="accountant" selected="selected" >Accountant</option>
                                                <option value="branchAdmin" name="branchAdmin">Branch Admin</option>
                                                <option value="lecturer" name="lecturer">Lecturer</option>
                                                <option value="receptionst" name="receptionst">Receptionst</option>-->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                           


                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <div class = "form-control">
                                    Job Type*
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="job_type" form="myform" required>

                                            <option>Select</option>
                                            <?php

                                                $query2 = "SELECT * FROM jobtype";
                                                $result2 = mysqli_query($conn, $query2);

                                                while($numRows2 = mysqli_fetch_array($result2)){

                                                    $typeid = $numRows2['jobtypeid'];
                                                    $rowsData2 = $numRows2['jobtypename'];
                                                    ?>

                                                    <option value="<?php echo $rowsData2; ?>"><?php echo $rowsData2; ?></option>
                                                    

                                                    <?php
                                                }


                                            ?>









                                                <!--
                                                <option value="permenent" selected="selected">permenent</option>
                                                <option value="contract">contract</option>
                                                <option value="partTime">Part time</option>
                                                <option value="internship">Internship</option>-->
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>


                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <input type="submit" name="submit" class="btn bg-blue btn-block waves-effect">
                                </div>


                            </div>
                            </form>
                             </div>

                        </div>
                    </div>


                   
 

    </section>

    <section class="content">
        <div class="card">
            <div class="body">

                <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                <thead>
                    <tr>
                        <th>Staff ID</th>
                        <th>Full name</th>
                        <th>Managed by</th>
                        <th>Gender</th>
                        <th>Post</th>
                        <th>Date of birth</th>
                        <th>NIC</th>
                        <th>Date Joined</th>
                        <th>Job Type</th>
                        <th>Job Status</th>   
                    </tr>
                </thead>
                <tfoot>
                        <tr>
                        <th>Staff ID</th>
                        <th>Full name</th>
                        <th>Managed by</th>
                        <th>Gender</th>
                        <th>Post</th>
                        <th>Date of birth</th>
                        <th>NIC</th>
                        <th>Date Joined</th>
                        <th>Job Type</th>
                        <th>Job Status</th>   
                </tfoot>
                    <tbody>
                        <tr>
                            

                                            

                                            <?php

                                            if(isset($_POST['submit']))
                                            {


                                                if(isset($_POST['position'])){$post = $_POST['position'];}
                                                if(isset($_POST['job_type'])){$jobtype = $_POST['job_type'];}

                                                $query3 = "SELECT * FROM staff WHERE post = '$post' AND jobtype = '$jobtype'";
                                                $result3 = mysqli_query($conn, $query3);

                                                while($numRows2 = mysqli_fetch_array($result3)){

                                                    ?>

                                                    </tr>
                                                        <tr id="<?php echo $numRows2['staffID']; ?>">
                                                            <td><?php echo $numRows2['staffID']; ?></td>    
                                                            <td><?php echo $numRows2['nameInFull']; ?></td>
                                                            <td><?php echo $numRows2['managedBy']; ?></td>
                                                            <td><?php echo $numRows2['gender']; ?></td>
                                                            <td><?php echo $numRows2['post']; ?></td>
                                                            <td><?php echo $numRows2['dob']; ?></td>
                                                            <td><?php echo $numRows2['nic']; ?></td>
                                                            <td><?php echo $numRows2['datejoined']; ?></td>
                                                            <td><?php echo $numRows2['jobtype']; ?></td>
                                                            <td><?php echo $numRows2['jobstatus']; ?></td>
                                                    </tr>
                                                                                

                                                    <?php
                                                }

                                            }
                                            ?>

                        

                    </tbody>

            </table>
            </div>
        </div>
    </section>
  
    <!-- Javascript --------------------------------->
    <?php include 'scripts.php'; ?> 
    <!-- #END# Javascript  -->


		
</body>

</html>