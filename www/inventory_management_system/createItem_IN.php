<?php
require 'db.php';
$message = '';
if (isset ($_POST['hallID'])  && isset($_POST['type']) && isset($_POST['status']) && isset($_POST['center'])  && isset($_POST['date']) && isset($_POST['name']) && isset($_POST['SupName'])&& isset($_POST['email'])&& isset($_POST['phone'])&& isset($_POST['Description']) ) {
    
  $hallID = $_POST['hallID'];
  $type = $_POST['type'];
  $status = $_POST['status'];
  $center = $_POST['center'];
  $date = $_POST['date'];
  $name = $_POST['name'];
  $SupName= $_POST['SupName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $Description = $_POST['Description'];
    
  $sql = 'INSERT INTO items(hallID, type,status,center, date, name, SupName,email,phone,Description) VALUES(:hallID, :type, :status, :center, :date, :name, :SupName, :email, :phone, :Description)';
  $statement = $connection->prepare($sql);
    
  if ($statement->execute([':hallID' => $hallID, ':type' => $type,':status' => $status,':center' => $center,':date' => $date, ':name' => $name, ':SupName' => $SupName,':email' => $email, ':phone' => $phone,':Description' => $Description])) {
    $message = 'data inserted successfully';
  }



}


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





                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card-header">
                              <h3>ADD ITEMS</h3>

                            </div>
                                <br>
                            <div class="card-body">
                              <?php if(!empty($message)): ?>
                                <div class="alert alert-success">
                                  <?= $message; ?>
                                </div>
                              <?php endif; ?>
                              <form method="post">
                                
                                <div class="form-group">
                                  <label for="name">Hall ID :</label>
                                    
                                    <select class="form-control show-tick" name="hallID" id="hallID" required>
                                        <option value="">-- Please select --</option>
                                        <option value="H001">H001</option>
                                        <option value="H002">H002</option>
                                        <option value="H003">H003</option>
                                         <option value="H003">Staff room</option>
                                        <option value="H003">Reception</option>
                                      
                                    </select>
                                  
                        
                                </div>
                                   <div class="form-group">
                                  <label for="name">Item type :</label>
                                    
                                    <select class="form-control show-tick" name="type" id="type" required>
                                        <option value="">-- Please select --</option>
                                        <option value="Electric">Electric</option>
                                        <option value="Furniture">Furniture</option>
                                        <option value="Other">Other</option>
                                       
                                    </select>
                                  
                        
                                </div>
                                 
                                   <div class="form-group">
                                  <label for="text">Status :</label>
                                 
                                    <select class="form-control show-tick" name="status" id="status" required>
                                        <option value="">-- Please select --</option>
                                        <option value="In Stock">In Stock</option>
                                        <option value="In use">In use</option>
                                           <option value="In use">Damaged</option>
                                        
                                    </select>
                                        
                            
                                </div>  <div class="form-group">
                                  <label for="text">Center :</label>
                                    <select class="form-control show-tick" name="center" id="center" required>
                                        <option value="">-- Please select --</option>
                                        <option value="Kandy">Kandy</option>
                                        <option value="Kegalla">Kegalla</option>
                                        <option value="Kurunegala">Kurunegala</option>
                                      
                                    </select>
                                  </div>
                                  
                                <div class="form-group">
                                 
                                    <div class="form-group">
                                  <label for="text">Entry date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                  <input type="date" name="date" id="date" size="20" required>
                                        <label for="text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Item name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                  <input type="text" name="name" id="name" size="20" required>
                                  </div>
                                <div class="form-group">
                                  <label for="text">Supplier name :</label>
                                  <input type="text" name="SupName" id="SupName" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label for="text">Supplier email :</label>
                                  <input type="email" name="email" id="email"  required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                     <label for="text">Supplier phone :</label>
                                  <input type="text" name="phone" id="phone" pattern="([0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9])" required>
                                </div>
                                </div>
                                  
                                 
                                   <div class="form-group">
                                  <label for="text">Description &nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                  <input type="text" name="Description" id="Description" class="form-control"  required>
                                </div>
                                  
                                 
                                <div class="form-group">
                                  <button type="submit" class="btn btn-info">Add item</button>

                                </div>
                              </form>
                                <button onclick="window.location.href='AddItem_IN.php'" class="btn  btn-default waves-effect">Back</button><br><br><br>
                            </div>
                          </div>
                        </div>
<?php require 'footer.php'; ?>
            
        </div>     
  </section>
    
   <!-- TinyMCE -->
   <script src="plugins/tinymce/tinymce.js"></script>

	<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>
 </html>
            
            
