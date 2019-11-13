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

	
	<?php



    $billno = '';
    $amount = '';
    $category = '';


    if (isset($_POST['billno'])){

        $billno = mysqli_real_escape_string($conn, $_POST['billno']);

    }
    if (isset($_POST['amount'])){

        $amount = mysqli_real_escape_string($conn, $_POST['amount']);


    }
    if (isset($_POST['category'])){

        $category = mysqli_real_escape_string($conn, $_POST['category']);

    }




    // Attempt insert query execution


    $sql = "INSERT INTO `bills` 
(`billNo`, `category`, `dateAdded`, `transactionID`, `amount`)
 VALUES ('$billno', '$category', CURRENT_TIMESTAMP, NULL, '$amount')";


    $insert_query= mysqli_query($conn,$sql);


    if(isset($_POST['amount']))
    {


        if(($insert_query == true)){
            $message = "Records inserted successfully.";
            $flag = 1;
        } else{
            $flag = 0;
            $message= "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }




    }



    ?>
	
	

	
<!DOCTYPE html>
<html>

<script type = "text/javascript" >

	


	function Autofill(){
		
		document.getElementById("billno").value = '0099';
		document.getElementById("amount").value = '5000';

		
		
		
		
		
	}
	</script>












	<!-- Page head --------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Loader -->
	
		<head>
	<title>Bills</title>
	</head>
	
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
    <?php //include 'static/topnav.php';?>
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
                <h2></h2>
            </div>
			
			
			
			<!-- Page Loader -->
		<div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
	
	<div class="container-fluid">
            <div class="block-header">
                <h2></h2>
            </div>
	
            <!-- Advanced Form Example With Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <!--Suceess or fail messages-->

                            <div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
                                <?php echo $message; ?>
                            </div>

                            <h2>BILL MANAGEMENT</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons"></i>
                                    </a>
                                    
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form id="wizard_with_validation" method="POST" action="">
                                <h3>Category</h3>
                              
								<fieldset>
								
								<div class="form-group form-float" >
                                        <div class="form-line">
                                            

                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <tr>

                                                    <td><select required name="category" class="form-control show-tick">
                                                            <OPTION>please select a category</option>
                                                            <option value="Electricity bills">Electricity bills</option>
                                                            <option value="water bills">water bills</option>
                                                            <option value="Telephone bills">Telephone bills</option>
                                                            <option value="Rent">Rent</option>
                                                            <option value="Broadband bills">Broadband bills</option>
                                                        </select></td>

                                                </tr>
                                            </table>
											
											

                                        <?php
                                        /*<select name="category" class="form-control">

                                            <?php


                                            $query2=mysqli_query($conn,"select category from bills");
                                            while($row2=mysqli_fetch_array($query2)){

                                        <option value="<?php echo $row2["category"]; ?>"> <?php echo $row2["category"]; ?> </option>



                                    </select>*/
                                        ?>

										
										</div>
                                    </div>
									
									
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" id="billno" class="form-control" name="billno" required>
                                            <label class="form-label">Bill no*</label>
                                        </div>
                                    </div>
									
						  </fieldset>

                                <h3>TRANSACTIONS</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" id="amount" min = "1" name="amount" class="form-control" placeholder="RS." required>
                                            <label class="form-label">Amount*</label>
                                        </div>
                                    </div>
                                    
								<button type="submit" value="submit" class="btn btn-success waves-effect">confirm</button>
								<a class="btn btn-primary waves-effect" onclick="Autofill()" >Demo Data</a>
  


                                    
                                </fieldset>
                            </form>
							
							

							
							
							
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Form Example With Validation -->
								
								<?php
								
								//<button type="button" class="btn btn-danger waves-effect">clear</button>
								
								?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
	
			
			
			<hr>
			
			
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
