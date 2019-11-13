<?php
require 'db.php';
$sql = 'SELECT * FROM courierdetails';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<html>
<?php include 'static/head.php';?>
<body class="theme-red">
    
      <div class="overlay"></div>
    
    <?php include 'static/searchbar.php';?>
    
     <?php include 'static/topnav.php';?>
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
           



                                <div class="body">
                            <div class="table-responsive">
                                      <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                          <thead>
                                        <tr>
                                          <th>Courier No</th>
                                          <th>Agent ID</th>
                                          <th>Staff ID</th>
                                          <th>Date sent</th>

                                          <th>Value</th>
                                          <th>Description</th>
                                        <th><button onclick="window.location.href='createCour_IN.php'" class="btn  btn-default waves-effect">Add Record</button>
                                </th>
                                              </tr></thead>
                                        <?php foreach($people as $person): ?>
                                          <tr>
                                            <td><?= $person->id; ?></td>
                                            <td><?= $person->agentID; ?></td>
                                            <td><?= $person->staffID; ?></td>
                                               <td><?= $person->dateSent; ?></td>
                                           
                                            <td><?= $person->value; ?></td>
                                               <td><?= $person->description; ?></td>
                                            <td>
                                              <a href="ViewCour_IN.php?id=<?= $person->id ?>" class="btn btn-info">View</a>
                                              <a href="editCour_IN.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
                                              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="deleteCour_IN.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
                                            </td>
                                          </tr>
                                        <?php endforeach; ?>
                                      </table>
                                    </div>
                                  </div>
                                </div>
<?php require 'footer.php'; ?>
             
        
        
        
    </section>
    
   <!-- TinyMCE -->
   <script src="plugins/tinymce/tinymce.js"></script>

	<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>
    </html>
