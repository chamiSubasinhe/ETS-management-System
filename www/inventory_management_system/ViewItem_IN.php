<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM items WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['hallID'])  && isset($_POST['type']) && isset($_POST['status'])  && isset($_POST['center']) && isset($_POST['date']) && isset($_POST['name'])&& isset($_POST['SupName'])&& isset($_POST['email'])&& isset($_POST['phone'])&& isset($_POST['Description']) ) {
  $hallID = $_POST['hallID'];
  $type = $_POST['type'];
  $status = $_POST['status'];
  $center = $_POST['center'];
  $date = $_POST['date'];
  $name = $_POST['name'];
  $SupName = $_POST['SupName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $Description = $_POST['Description'];
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
      <h3>Item Details</h3><br>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Hall ID :</label>
             <select class="form-control show-tick" name="hallID" id="hallID" disabled>
                                        <option value="<?= $person->hallID; ?>"><?= $person->hallID; ?></option>
                                        <option value="H001">H001</option>
                                        <option value="H002">H002</option>
                                        <option value="H003">H003</option>
                                        <option value="H003">Staff room</option>
                                        <option value="H003">Reception</option>
                                      
                                    </select>
        </div>
           <div class="form-group">
                                  <label for="name">Item type :</label>
                                    
                                    <select class="form-control show-tick" name="type" id="type" disabled>
                                        <option value="<?= $person->type; ?>"><?= $person->type; ?></option>
                                        <option value="Electric">Electric</option>
                                        <option value="Furniture">Furniture</option>
                                        <option value="Other">Other</option>
                                       
                                    </select>
                                  
                        
                                </div>
               <div class="form-group">
                                  <label for="text">Status :</label>
                                 
                                    <select class="form-control show-tick" name="status" id="status" disabled>
                                        <option value="<?= $person->status; ?>"><?= $person->status; ?></option>
                                        <option value="In Stock">In Stock</option>
                                        <option value="In use">In use</option>
                                           <option value="In use">Damaged</option>
                                        
                                    </select>
                                        
                            
                                </div>
                                 
          
        <div class="form-group">
            <label for="text">Center :</label>
             <select class="form-control show-tick" name="center" id="center" disabled>
                    <option value="<?= $person->center; ?>"><?= $person->center; ?></option>
                    <option value="Kandy">Kandy</option>
                    <option value="Kegalla">Kegalla</option>
                    <option value="Kurunegala">Kurunegala</option>
                                      
            </select>
        </div>
            <div class="form-group">
                                 
                                    <div class="form-group">
                                  <label for="text">Entry date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                  <input type="date" value="<?= $person->date; ?>"name="date" id="date" size="20" disabled>
                                        <label for="text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Item name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                  <input type="text" value="<?= $person->name; ?>" name="name" id="name" size="20" disabled>
                                  </div>
                                <div class="form-group">
                                  <label for="text">Supplier name :</label>
                                  <input type="text" value="<?= $person->SupName; ?>" name="SupName" id="SupName" disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label for="text">Supplier email :</label>
                                  <input type="email" value="<?= $person->email; ?>" name="email" id="email"  disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                     <label for="text">Supplier phone :</label>
                                  <input type="text" value="<?= $person->phone; ?>" name="phone" id="phone"  disabled>
                                </div>
                                </div>
                                  
                                 
                                   <div class="form-group">
                                  <label for="text">Description &nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                  <input type="text" value="<?= $person->Description; ?>" name="Description" id="Description" class="form-control"  disabled>
                                       
                                </div>
          
        
      </form>
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

