
<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->

<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->

<?php 
if(isset($_POST['Submit']))
{
$courseID=$_POST['courseID'];
$home=$_POST['home'];
$resident=$_POST['resident'];
$name=$_POST['name'];
$type=$_POST['type'];
$email=$_POST['email'];
$response=$_POST['response'];

$s1="INSERT INTO inquiry (courseID,home,resident,name,type,email,response)VALUES('".$courseID."','".$home."','".$resident."','".$name."','".$type."','".$email."','".$response."')";

}





?>
<!DOCTYPE html>





<html>

	<!-- Page head --------------------------------------->
	<?php include '../static/head.php';?>
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
        <div class="container-fluid">
            <div class="block-header">
   
              
                
    <!---------form--->
                   <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>ADD NEW RECORD </h2>
                         
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" >
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="courseID" id="courseID" required>
                                        <label class="form-label">course ID</label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" id="name" required>
                                        <label class="form-label">name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="home" id="home" required>
                                        <label class="form-label">home</label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="resident" id="resident" required>
                                        <label class="form-label">resident</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" id="email" required>
                                        <label class="form-label">Email</label>
                                    </div>
                                </div>
                             
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="response" cols="30" rows="5" class="form-control no-resize" id="response" required></textarea>
                                        <label class="form-label">response</label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="type" id="type" required>
                                        <label class="form-label">type</label>
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
		<?php include '../static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
