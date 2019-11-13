


<!DOCTYPE html>




<html>


	<!--DB conection-->
	<?php include('static/dbconnection.php');?>


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
		
    <?php 
	
	$settingsArr='';
	
	
	
	$message='';

if(isset($_POST['Submit']))
	
{
	$stuID=$_POST['stuID'];
	$courseID=$_POST['courseID'];
	$moduleID=$_POST['moduleID'];
	

	
$s1="INSERT INTO studentattendence(stuID,courseID,moduleID)VALUES('".$stuID."','".$courseID."','".$moduleID."')";


$insert=mysqli_query($conn,$s1);

if(isset($_POST['stuID'] ) == true)
{

    if($insert)
    {
        $message = "Records inserted Successfully ";
        $flag = 1;
    }
    else{
        $flag = 0;
        $message = "Error cannot insert" ;

    }

}







}





?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</section>
    
    
   
    

    
      <section class="content">
        <div class="container-fluid">
            <div class="block-header">
   
              
                
    <!---------form--->
                   <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
						
						
						   <!--Suceess or fail messages-->

                            <div class="alert alert-<?php if($flag==0){echo 'danger';}else if($flag==1){ echo 'success';} ?> alert-dismissible" data-auto-dismiss="5000" role="alert">
                                <?php echo $message; ?>
                            </div>
						
						
						
						
						
						
						
                            <h2>ADD NEW RECORD </h2>
                         
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" >
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="stuID" id="stuID" required>
                                        <label class="form-label">student ID</label>
                                    </div>
                                </div>
								
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="courseID" id="courseID" required>
                                        <label class="form-label">courseID</label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="moduleID" id="moduleID" required>
                                        <label class="form-label">moduleID</label>
                                    </div>
                                </div>
                                
                             
                               
                                <button class="btn btn-primary waves-effect"  type="submit" name="Submit" value="Submit">SUBMIT</button>
                               
                               
                                
                                
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    
              
            
            
            
            

            
              
            
            
            
                </div></div>
          </section>
       
            <!-- #END# Basic Validation -->

	 <!-- Jquery Validation Plugin Css -->
   
	 <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
