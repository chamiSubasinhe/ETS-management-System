<?php
include_once('include/db_con.php');
$query="SELECT*FROM items where center='kandy'";
$result=mysql_query($query);
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
           
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Available items
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
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
                                           <th>Serial no</th>
                                            <th>Hall ID</th>
                                            <th>type</th>
                                            <th>Status</th>
                                            <th>Center</th>
                                            <th>Date</th>
                                            <th>Item name</th>
                                            <th>Supplier name </th>
                                            <th>Supplier email </th>
                                            
                                            
                                        </tr>
                                    </thead>
                                   
                                    
    
                                    
                                     <?php 
                                        while($rows=mysql_fetch_assoc($result))
                                        {
                                    ?>
                                    
                                 
                                
                                        <tr>
                                             <td><?php echo $rows['id']; ?></td>
                                            <td><?php echo $rows['hallID']; ?></td>
                                            <td><?php echo $rows['type']; ?></td>
                                            <td><?php echo $rows['status']; ?></td>
                                            <td><?php echo $rows['center']; ?></td>
                                            <td><?php echo $rows['date']; ?></td>
                                             <td><?php echo $rows['name']; ?></td>
                                            <td><?php echo $rows['SupName']; ?></td>
                                            <td><?php echo $rows['email']; ?></td>
                                          
                                            
                                           
                                        </tr>
                                   
                                  
                                    <?php
                                  }
                                ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
          
             
            
            
			
            
            
			
			
			
        </div>
        
        
        
    </section>
    
   <!-- TinyMCE -->
   <script src="plugins/tinymce/tinymce.js"></script>

	<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>