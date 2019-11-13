<?php 
/*

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
            <div class="block-header">
                <h2>Take Fees</h2>
            </div>

            <!--Table of students -->
            <div class="table-sorting table-responsive">
                <table class="table table-striped table-bordered table-hover" id="tSortable22">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>StudentID</th>
                        <th>Total fee</th>
                        <th>Balence</th>
                        <th>Date </th>


                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $sql = "SELECT stuID,totalAmount,pendingAmount,paidDate FROM studentpayment where status='0'";

                    $select_query= mysqli_query($conn,$sql);
                    $i = 1 ; //count number




                    while ($result = mysqli_fetch_assoc($select_query) ){



                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $result['stuID']?></td>
                            <td><?php echo $result['totalAmount']?></td>
                            <td><?php echo $result['pendingAmount']?></td>
                            <td><?php echo $result['paidDate']?></td>


                            <td>

                                <a href="add__fee_form.php?studentID=<?php echo $result['stuID']; ?>" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                               


                        </tr>


                        <?php $i++;

                    }   ?>



                    <!--	<?php
                    /*
                                                        }
                                                        */?>

                                        -->

                    </tbody>
                </table>
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
