<?php 
/*

*/
?>
<?php $loadingMSG = 'Student search engine is initialing...'; ?>

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
                <h2>Search students here</h2>
            </div>
		
			
			<hr>
			
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Student Search</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
						
                        <div class="body">
                            <form id="form_validation"  action="" method="POST">
							
							 <div class="demo-radio-button">Search: 
							 
                                <input type="radio" id="radio_7" value="1" name="option" class="radio-col-red" checked />
                                <label for="radio_7">By student ID</label>
							
								<input type="radio" id="radio_8" value="2" name="option" class="radio-col-pink"  />
                                <label for="radio_8">By module Id </label>
							
								<input type="radio" id="radio_9" value="3" name="option" class="radio-col-purple"  />
                                <label for="radio_9">By date</label> 
							
								<input type="radio" id="radio_10" value="4" name="option" class="radio-col-indigo" />
                                <label for="radio_10">By arrivalTime</label> 
							
								<input type="radio" id="radio_11" value="5" name="option" class="radio-col-blue"  /
                                <label for="radio_11">By depatureTime</label> 
                               
                            </div>
							
							
								<div class="body">
                           
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="searchTerm" required>
                                        <label class="form-label">Enter your search term here...</label>
										
                                    </div>
                                </div>
                               
                                <button class="btn btn-primary waves-effect" type="submit" name="search">Search</button>
								
                            </form>	
							
                        </div>
                    </div>
                </div>
            </div>  
 
						</div>
			
			<?php
				$flag=1;
				$select='';
				if(isset($_POST["search"])){
					
					if(isset($_POST["searchTerm"])){
								$search = $_POST["searchTerm"];
					}
					
					$select = $_POST["option"];
					
					if(isset($_POST["option"])){
						if($_POST["option"]==1){
								$query=mysqli_query($conn,"select * from studentattendence WHERE stuID LIKE '%".$search."%'");
						}
					}
					
					if(isset($_POST["option"])){
						if($_POST["option"]==2){
								$query=mysqli_query($conn,"select * from studentattendence WHERE moduleID LIKE '%".$search."%'");
						}
					}
					
					if(isset($_POST["option"])){
						if($_POST["option"]==3){
								$query=mysqli_query($conn,"select * from studentattendence WHERE date LIKE '%".$search."%'");
						}
					}
					
					if(isset($_POST["option"])){
						if($_POST["option"]==4){
								$query=mysqli_query($conn,"select * from studentattendence WHERE arivalTime LIKE '%".$search."%'");
						}
					}
					
					if(isset($_POST["option"])){
						if($_POST["option"]==5){
								$query=mysqli_query($conn,"select * from studentattendence WHERE depatureTime LIKE '%".$search."%'");
						}
					}
					
					$message='Search query '.$_POST["searchTerm"].' is not sufficint to a successful search! SelectID='.$select;
					
			if(isset($query)){
			?>
			
			 <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Search Result
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>stuID </th>
                                            <th>moduleId</th>
                                            <th>arrivalTime</th>
                                            <th>depatureTime</th>
                                            <th>date</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>stuID </th>
                                            <th>moduleId</th>
                                            <th>arrivalTime</th>
                                            <th>depatureTime</th>
                                            <th>date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
									
									<?php
		while($row2=mysqli_fetch_array($query)){
			?>
									<tr>
                                            <td><?php echo $row2['stuID']; ?></td>
                                            <td><?php echo $row2['moduleID']; ?></td>
                                            <td><?php echo $row2['arivalTime']; ?></td>
                                            <td><?php echo $row2['depatureTime']; ?></td>
                                            <td><?php echo $row2['date']; ?></td>
                                            
                                    </tr>

	<?php
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
			 
			<?php 
			} 
			else{
				?>
				<div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
						<?php echo $message; ?>
                            </div>
				<?php
			}
				}
				?>
			
			
	<!--  Main page content ----------------------------->
	</div>
    </section>
	
	
	

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
