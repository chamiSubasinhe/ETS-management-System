<?php 
/*
* 
*/
?>
<?php $loadingMSG = 'System is Loading...'; ?>

<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	
<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->
	
		<!-- Load session variables ---------------------------------------->
	<?php include 'static/session.php';?>
	<!--# End Load session variables -->
	
	
	<?php

	//to delete a record
	
	//introduce transactionID to sql
	
	$transactionID = '';
	
	if (isset($_GET['transactionID'])){
	
	$transactionID = mysqli_real_escape_string($conn,$_GET['transactionID']);

	}
	
	$sql = "DELETE FROM bills WHERE transactionID='".$transactionID."'";

	$message ='';
	
	if ($conn->query($sql) === TRUE) {
    $message =  "Record deleted successfully";
	$flag = 1;
	} else {
		$flag = 0;
    $message =  "Error deleting record: " . $conn->error;
	}


	


?>
	
	
	
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
    <?php// include 'static/topnav.php';?>
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
                <h2>Manage bills</h2>
            </div>
	
			
			<hr>
			
					<div class="panel panel-default">

                        <div class="panel-body">
                            <div class="table-sorting table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tSortable22">
                                    <thead>
                                        <tr>
                                            <th>#</th>
											<th>TransactionID</th>
                                            <th>category</th>
                                            <th>Bill Number</th>
                                            <th>Date Added</th>
											<th>Amount</th>
											
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$sql = "select * from bills ";
									$q = $conn->query($sql);
									$i=1;
									while($r = $q->fetch_assoc())
									{
									
									echo '<tr >
                                            <td>'.$i.'</td>
											<td>'.$r['transactionID'].'</td>
                                            <td>'.$r['category'].'</td>
											<td>'.$r['billNo'].'</td>
                                            <td>'.date("d M y", strtotime($r['dateAdded'])).'</td>
                                            <td>'.$r['amount'].'</td>
											
											<td>
											
											
											
											

											<a href="edit_bills.php?action=edit&transactionID='.$r['transactionID'].'" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
											
											
											<a onclick="return confirm(\'Are you sure you want to delete this record\');" href="view_bills.php?action=delete&transactionID='.$r['transactionID'].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a> </td></button>
											
                                        </tr>';																																
										$i++;
									}
									?>
									
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
							<div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
						<?php echo $message; ?>
                            </div>
                        </div>
                    </div>
                     
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
