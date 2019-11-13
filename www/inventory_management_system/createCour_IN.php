<?php
require 'db.php';
$message = '';
if (isset ($_POST['agentID'])  && isset($_POST['staffID']) && isset($_POST['dateSent']) && isset($_POST['receiver']) && isset($_POST['postcode']) && isset($_POST['weight']) && isset($_POST['value']) && isset($_POST['qty']) && isset($_POST['oriaddress']) && isset($_POST['desaddress']) && isset($_POST['description'])&& isset($_POST['service'])&& isset($_POST['agentname']) && isset($_POST['contact']) && isset($_POST['track']) ) {
    
  $agentID = $_POST['agentID'];
  $staffID = $_POST['staffID'];
  $dateSent = $_POST['dateSent'];
  $receiver = $_POST['receiver'];
  $postcode = $_POST['postcode'];
  $weight = $_POST['weight'];
  $value = $_POST['value'];
  $qty = $_POST['qty'];
  $oriaddress = $_POST['oriaddress'];
  $desaddress = $_POST['desaddress'];
  $description = $_POST['description'];
  $service = $_POST['service'];
  $agentname = $_POST['agentname'];
  $contact = $_POST['contact'];
  $track= $_POST['track'];
    
  $sql = 'INSERT INTO courierdetails(agentID, staffID, dateSent, receiver, postcode, weight,value, qty, oriaddress, desaddress, description,service, agentname, contact, track) VALUES(:agentID, :staffID, :dateSent, :receiver, :postcode, :weight,:value, :qty, :oriaddress, :desaddress, :description,:service, :agentname, :contact, :track)';
  $statement = $connection->prepare($sql);
    
  if ($statement->execute([':agentID' => $agentID, ':staffID' => $staffID, ':dateSent' => $dateSent, ':receiver' => $receiver, ':postcode' => $postcode,  ':weight' => $weight,':value' => $value,':qty' => $qty,':oriaddress' => $oriaddress,':desaddress' => $desaddress,':description' => $description,':service' => $service,':agentname' => $agentname,':contact' => $contact,':track' => $track])) {
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
                              <h3>Add courier</h3><br>

                            </div>
                            <div class="card-body">
                              <?php if(!empty($message)): ?>
                                <div class="alert alert-success">
                                  <?= $message; ?>
                                </div>
                              <?php endif; ?>
                              <form method="post">
                                <div class="form-group">
                                  <label for="text">Agent ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                  <input type="text" name="agentID" id="agentID" size="20" placeholder="  ex.A01" pattern="([A][0-9][0-9])" required>
                                 <label for="text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Staff ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                  <input type="text" name="staffID" id="staffID" size="20"  placeholder="  ex.SFKGLE000001" pattern="([S][F][A-Z][A-Z][A-Z][A-Z][0-9][0-9][0-9][0-9][0-9][0-9])" required>
                                  </div>
                                  <div class="form-group">
                                  <label for="text">Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                  <input type="date" name="dateSent" id="dateSent" size="20" required>
                                 <label for="text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Receiver's email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                  <input type="email" name="receiver" id="receiver" size="20" required>
                                  </div>
                                  <div class="form-group">
                                  <label for="text">Post code &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                      <input type="text" name="postcode" id="postcode" size="20" placeholder="  ex.51341" pattern="([0-9][0-9][0-9][0-9][0-9])"  required>
                                      
                                  </div>
                                   <div class="form-group">
                                  <label for="text">Total weight &nbsp;:</label>
                                  <input type="text" name="weight" id="weight" size="20" placeholder="  ex.3.5kg" required>
                                 <label for="text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total value &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                  <input type="text" name="value" id="value" size="20"placeholder="  ex.1350LKR" required>
                                  </div>
                                  <div class="form-group">
                                  <label for="text">Quantity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                      <input type="text" name="qty" id="qty" size="20" >
                                      
                                     
                                      
                                  </div>
                                     
                                  
                                   <div class="form-group">
                                  <label for="text">Origin center :</label>
                                    <select class="form-control show-tick" name="oriaddress" id="oriaddress" required>
                                        <option value="">-- Please select --</option>
                                        <option value="Ets campus,No-24,peradeniya road,kandy">Ets campus,No-24,peradeniya road,kandy</option>
                                        <option value="Ets campus,No-32,kandy road,kurunegala">Ets campus,No-32,kandy road,kurunegala</option>
                                        <option value="Ets campus,No:314,kandy road,kegalle">Ets campus,No:314,kandy road,kegalle</option>
                                      
                                    </select>
                                  </div>
                                  <div class="form-group">
                                  <label for="text">Destination center :</label>
                                    <select class="form-control show-tick" name="desaddress" id="desaddress" required>
                                        <option value="">-- Please select --</option>
                                        <option value="Ets campus,No-24,peradeniya road,kandy">Ets campus,No-24,peradeniya road,kandy</option>
                                        <option value="Ets campus,No-32,kandy road,kurunegala">Ets campus,No-32,kandy road,kurunegala</option>
                                        <option value="Ets campus,No:314,kandy road,kegalle">Ets campus,No:314,kandy road,kegalle</option>
                                      
                                    </select>
                                  </div>
                                  <div class="form-group">
                                  <label for="text">Description :</label>
                                  <input type="text" name="description" id="description" class="form-control" required>
                            
                                </div>
                                    <h3>Posting via company</h3><br>
                                  <div class="form-group">
                                  <label for="text">Service Company :</label>
                                    <select class="form-control show-tick" name="service" id="service" required>
                                        <option value="">-- Please select --</option>
                                        <option value="DHL Express">DHL Express (011 234 456 7)</option>
                                        <option value="FedEx">FedEx (011 452 222 2)</option>
                                        <option value="Certis Lanka">Certis Lanka (011 987 777 7)</option>
                                         <option value="Pronto Lanka">Pronto Lanka (011 234 234 1)</option>
                                      
                                    </select>
                                  </div>
                                   <div class="form-group">
                                  <label for="text">Agent name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                  <input type="text" name="agentname" id="agentname" size="20">
                                 <label for="text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact no &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                  <input type="text" name="contact" id="contact" size="20"  pattern="([0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9])" required>
                                       <label for="text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Traking no &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                                  <input type="text" name="track" id="track" size="20" >
                                  </div>
                                <div class="form-group">
                                  <button type="submit" class="btn btn-info">Save</button>

                                </div>
                              </form>
                                <button onclick="window.location.href='AddCour_IN.php'" class="btn  btn-default waves-effect">Back</button><br><br>
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
            
            
