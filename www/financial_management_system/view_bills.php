<?php 
/*
* 
*/
?>
<?php //$loadingMSG = 'System is Loading...'; ?>

<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	
<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->
	
		<!-- Load session variables ---------------------------------------->
	<?php //include 'static/session.php';?>
	<!--# End Load session variables -->
	
	
	<?php
	
	
	$message ='';

	//to delete a record
	
	//introduce transactionID to sql
	
	$transactionID = '';
	
	if (isset($_REQUEST['transactionID'])){
	
	$transactionID = mysqli_real_escape_string($conn,$_REQUEST['transactionID']);


	
	
	$delete = "UPDATE bills set status='0' WHERE transactionID='".$transactionID."'";

	


	$delete_query= mysqli_query($conn,$delete);



	if ($delete_query) {
    $message =  "Record deleted successfully";
	$flag = 1;
	} else {
		$flag = 0;
    $message =  "Error deleting record: ";
	}
	}

	//delete function end


?>

<?php
/*
    //record update function
	
	$transactionID='';
	$billno='';
	$category='';
	$amount='';
	
	
	
	
	if(isset($_GET["transactionID"]) )
	{
		$transactionID = mysqli_real_escape_string($conn,$_GET['transactionID']);
	}
	
		

		$query2=mysqli_query($conn,"select * from bills where transactionID='".$transactionID."' " );
		while($row2=mysqli_fetch_array($query2))
		{

			$transactionID=$row2['transactionID'];
			$billno=$row2['billNo'];
			$category=$row2['category'];
			$amount=$row2['amount'];
		}
		
	*/?><!--
	
	--><?php
/*

	if(isset($_get["transactionID"]))
	{
		
		if(isset($_POST["transactionID"])){
			$transactionID=$_POST["transactionID"];
		}
		if(isset($_POST["billno"])){
			$billno=$_POST["billno"];
		}
		if(isset($_POST["category"])){
			$category=$_POST["category"];
		}
		if(isset($_POST["amount"])){
			$amount=$_POST["amount"];
		}
		
		
		$update_query= "UPDATE bills SET billNo = $billno ,$category = $category ,amount = $amount WHERE transactionID=$transactionID ";

        $update = $mysqli_query($conn,$update_query);
	
		if($update){
			echo 'I record updated!';
		}
		else
		{
			echo'<br>';
			echo 'couldnt update'.mysqli_error($conn);
		}
	}
	
	else
	{
		$error = "One or more fields are not filled";
		echo $error;
	}
	
    //End update record
*/?>
	
	
	
	
	
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
                <h2>Manage bills</h2>
            </div>
            <div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
                <?php echo $message; ?>
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

                                    $sql = "SELECT * FROM bills where status='1'";

                                    $select_query= mysqli_query($conn,$sql);
                                    $i = 1 ; //count number




                                    while ($result = mysqli_fetch_assoc($select_query) ){



                                    ?>
                                        <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $result['transactionID']?></td>
                                        <td><?php echo $result['category']?></td>
                                        <td><?php echo $result['billNo']?></td>
                                        <td><?php echo $result['dateAdded']?></td>
                                        <td><?php echo $result['amount']?></td>

                                        <td>

                                            <a href="update_bills_form.php?transactionID=<?php echo $result['transactionID']; ?>" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                                            <a href="view_bills.php?action=delete&transactionID=<?php echo $result['transactionID']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a> </td>


                                        </tr>


                                    <?php $i++;

                                    }   ?>



                                    <!--	<?php
/*									$sql = "select * from bills ";
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
											
										
											
											
                                                

											
											

											
                                        </tr>';																																
										$i++;
									}
									*/?>
									
                                        -->
                                        
                                    </tbody>
                                </table>
                            </div>

                            </div>
							
							
							
							<div class="panel-body">
							Remove Log
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
											
                                        </tr>
                                    </thead>
                                    <tbody>
								    <?php

                                    $sql2 = "SELECT * FROM bills where status='0'";

                                    $select_query2= mysqli_query($conn,$sql2);
                                    $i = 1 ; //count number




                                    while ($result2 = mysqli_fetch_assoc($select_query2) ){



                                    ?>
                                        <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $result2['transactionID']?></td>
                                        <td><?php echo $result2['category']?></td>
                                        <td><?php echo $result2['billNo']?></td>
                                        <td><?php echo $result2['dateAdded']?></td>
                                        <td><?php echo $result2['amount']?></td>


                                        </tr>


                                    <?php $i++;

                                    }   ?>



                                    <!--	<?php
/*									$sql = "select * from bills ";
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
											
										
											
											
                                                

											
											

											
                                        </tr>';																																
										$i++;
									}
									*/?>
									
                                        -->
                                        
                                    </tbody>
                                </table>
                            </div>

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
