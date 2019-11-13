<?php 
/*
* Google Metirial Design Template designed Asiri Hewage
* asiriofficial@gmail.com
* All Rights Reserved C 2018
* http://asirihewage.business.site
*/
?>

<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	
<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->
	
		<!-- Load session variables ---------------------------------------->
	<?php include 'static/session.php';?>
	<!--# End Load session variables -->
<?php 
	if(isset($_GET["UID"])){
		$UID = $_GET["UID"];
	}else{
		$UID = $sessionArr['UID'];
	}
	
		$queryData=mysqli_query($conn,"select U.UID, S.jobtype, S.maritalstatus, S.managedBy, S.nationality, P.phone, S.datejoined, S.nic,  S.nameWithInit, S.nameInFull, S.gender, S.post, S.dob, E.email, S.dateCreated, S.centerId from users U, staff S, emails E, phones P where P.userId=S.staffId AND E.userId=S.staffId AND S.staffId='".$UID."' order by S.staffId LIMIT 1");
		while($rowData=mysqli_fetch_array($queryData)){
	
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
        <div class="container-fluid">
           
			<!-- Main page content  ----------------------------->

<section>

<div class="container">
<div class="profile-head">
<div class="col-md- col-sm-4 col-xs-12">
<img src="<?php echo $sessionArr['favicon_path'];?>" class="img-responsive" />
</div><!--col-md-4 col-sm-4 col-xs-12 close-->


<div class="col-md-5 col-sm-5 col-xs-12">
<h5><?php echo $rowData['nameWithInit']; ?></h5>
<p><?php echo $rowData['jobtype']; ?></p>
<ul>
<li><span class="glyphicon glyphicon-briefcase"></span> 2 years</li>
<li><span class="glyphicon glyphicon-map-marker"></span><?php echo $rowData['nationality']; ?></li>
<li><span class="glyphicon glyphicon-home"></span> Kandy</li>
<li><span class="glyphicon glyphicon-phone"></span> <a href="#" title="call"><?php echo $rowData['phone']; ?></a></li>
<li><span class="glyphicon glyphicon-envelope"></span><a href="#" title="mail"><?php echo $rowData['email']; ?></a></li>

</ul>


</div><!--col-md-8 col-sm-8 col-xs-12 close-->




</div><!--profile-head close-->
</div><!--container close-->


<div id="sticky" class="container card">
    
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-menu" role="tablist">
      <li class="active">
          <a href="#profile" role="tab" data-toggle="tab">
              <i class="fa fa-male"></i> Profile
          </a>
		  
      </li>
	  <li><a href="#Privilages" role="tab" data-toggle="tab">
          <i class="fa fa-key"></i> Privilages
          </a>
      </li>
      <li><a href="#change" role="tab" data-toggle="tab">
          <i class="fa fa-key"></i> Edit Profile
          </a>
      </li>
    </ul>
    
    <!-- Tab panes -->
    <div class="tab-content">
    <div class="tab-pane fade active in" id="profile">
    <div class="container">
<div class="col-sm-11" style="float:left;">
<div class="hve-pro">
</div><!--hve-pro close-->
</div><!--col-sm-12 close-->
<br clear="all" />
<div class="row">
<div class="col-md-12">
<h4 class="pro-title">Details</h4>
</div><!--col-md-12 close-->


<div class="col-md-6">

<div class="table-responsive responsiv-table">
  <table class="table bio-table">
      <tbody>
     <tr>      
        <td>Name in full</td>
        <td><?php echo $rowData['nameInFull']; ?></td> 
     </tr>
     <tr>    
        <td>Name with initials</td>
        <td><?php echo $rowData['nameWithInit']; ?></td>       
     </tr>
	  <tr>    
        <td>User ID</td>
        <td><?php echo $UID; ?></td>       
    </tr>
     <tr>    
        <td>Birthday</td>
        <td><?php echo $rowData['dob']; ?></td>       
    </tr>
   
    <tr>
        <td>Occupation</td>
        <td><?php echo $rowData['post']; ?></td> 
     </tr>

    </tbody>
  </table>
  </div><!--table-responsive close-->
</div><!--col-md-6 close-->

<div class="col-md-6">

<div class="table-responsive responsiv-table">
  <table class="table bio-table">
      <tbody>
     <tr>  
        <td>Email</td>
        <td><?php echo $rowData['email']; ?></td> 
     </tr>
     <tr>    
        <td>Mobile</td>
        <td><?php echo $rowData['phone']; ?></td>       
     </tr>
     <tr>    
        <td>Phone</td>
        <td><?php echo $rowData['phone']; ?></td>       
    </tr>
    <tr>    
        <td>Date Joined</td>
        <td><?php echo $rowData['dateCreated']; ?></td>       
    </tr>
    <tr>
        <td>NIC</td>
        <td><?php echo $rowData['nic']; ?></td> 
     </tr>

    </tbody>
  </table>
  </div><!--table-responsive close-->
</div><!--col-md-6 close-->

</div><!--row close-->




</div><!--container close-->
</div><!--tab-pane close-->
      
      
<div class="tab-pane fade" id="change">
<div class="container fom-main">
<div class="row">
<div class="col-sm-12">
<h2 class="register">Edit Your Profile</h2>
</div><!--col-sm-12 close-->

</div><!--row close-->
<br />
<div class="row">

<form class="form-horizontal main_form text-left" action=" " method="post"  id="contact_form">
<fieldset>

<div class="col-md-6">
<div class="form-group col-md-6">
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <b>Full Name:</b><input  name="nameInFull" placeholder="First Name" class="form-control" value="<?php echo $rowData['nameInFull']; ?>"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group col-md-6">
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
  <b>Name With Initials:</b><input name="nameWithInit" placeholder="Last Name" class="form-control"  value="<?php echo $rowData['nameWithInit']; ?>"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group col-md-6"> 
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
	<input name="email" placeholder="E-Mail Address" class="form-control"  value="<?php echo $rowData['email']; ?>" type="text" style="visibility:hidden">
  <b>Email:</b><input name="email" placeholder="E-Mail Address" class="form-control"  value="<?php echo $rowData['email']; ?>" type="text" disabled>
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group col-md-6">
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
  <b>Primary Phone:</b><input name="phone" value="<?php echo $rowData['phone']; ?>" placeholder="(94)555-1212" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->
</div>





<div class="col-md-6">
 <div class="form-group col-md-6">
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
  <b>Status:</b><input name="number" value="<?php echo $rowData['maritalstatus']; ?>" placeholder="Single" class="form-control" type="text">
    </div>
  </div>
</div>

 <div class="form-group col-md-6">
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
  <b>Managed By:</b><input name="text" value="<?php echo $rowData['managedBy']; ?>" placeholder="" class="form-control" type="text">
    </div>
  </div>
</div>
</div>
<!-- Button -->
<div class="form-group col-md-10">
  <div class="col-md-6">
    <button type="submit" class="btn btn-warning submit-button" >Save</button>
    <button type="submit" class="btn btn-warning submit-button" >Cancel</button>

  </div>
</div>
</fieldset>
</form>
</div><!--row close-->
</div><!--container close -->          
</div><!--tab-pane close-->















<div class="tab-pane fade" id="Privilages">
<div class="container fom-main">
<div class="row">
<div class="col-sm-12">
<h2 class="register">Priviladges</h2>
</div><!--col-sm-12 close-->

</div><!--row close-->
<br />
<div class="row">

<div class="table-responsive ">
                                <table class="table table-bordered table-striped table-hover dataTable">
                                    
                                    <tbody>
                                        <?php
				
		$query2=mysqli_query($conn,"select * from authlevels A, users U where U.authId=A.authId AND U.UID='".$UID."'");
		while($row2=mysqli_fetch_array($query2)){
			?>
					<!-- authId,name, created, description, studentManagement	, financialManagement	, inventoryManagemnt	, courseManagemnt, libraryManagement	, staffManagement	, 
administration	, studentBasic	, staffBasic	, 	InventoryBasic	, 	libraryBasic	,attendance			-->
                                        <tr>
										<form action="#" id="setLevels" name="setLevels" method="POST" >
                                          <div class="col-md-6"> 
                                        <div class="switch">
                                            <label><input  disabled id ="toggle" name="administration" type="checkbox" <?php if($row2['administration']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        Administration
										</div>
                                            <div class="switch">
                                            <label><input disabled id ="toggle" name="maintenance" type="checkbox" <?php if($row2['maintenance']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        Maintenance
										</div>
											<div class="switch">
                                            <label><input disabled id ="toggle" name="libraryManagement" type="checkbox" <?php if($row2['libraryManagement']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        Library Management
										</div>
											<div class="switch">
                                             <label><input disabled id ="toggle" name="inventoryManagemnt" type="checkbox" <?php if($row2['inventoryManagemnt']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        Inventory Managemnt
										</div>
										</div>
										<div class="col-md-6">
										<div class="switch">
                                             <label><input disabled id ="toggle"  name="courseManagemnt" type="checkbox" <?php if($row2['courseManagemnt']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        Course Managemnt
										</div>
										<div class="switch">
                                            <label><input disabled id ="toggle"  name="financialManagement" type="checkbox" <?php if($row2['financialManagement']=='1') echo 'checked value="1"'; else echo 'value="0"';?>><span class="lever switch-col-blue"></span></label>
                                        Financial Management
										</div>
										<div class="switch">
                                             <label><input disabled id ="toggle"   name="studentManagement" type="checkbox" <?php if($row2['studentManagement']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        Student Management
										</div>
										<div class="switch">
                                            <label><input disabled id ="toggle"   name="staffManagement" type="checkbox" <?php if($row2['staffManagement']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        Staff Management
										</div>
										<div class="switch">
                                            <label><input disabled id ="toggle" name="attendance" type="checkbox" <?php if($row2['attendance']=='1') echo 'checked value="1"'; else echo 'value="0"'; ?>><span class="lever switch-col-blue"></span></label>
                                        Attendance Mamagement
										</div>
										</div>
										</form>
										</tr>
					

	<?php
		}
	?> 
	
									
		
                                    
                                   
                                    </tbody>
                                </table>
                            </div>



</div><!--row close-->
</div><!--container close -->          
</div><!--tab-pane close-->




<div class="tab-pane fade" id="Privilages">
<div class="container fom-main">
<div class="row">
<div class="col-sm-12">
<h2 class="register">Priviladges</h2>
</div><!--col-sm-12 close-->

</div><!--row close-->
<br />
<div class="row">





</div><!--row close-->
</div><!--container close -->          
</div><!--tab-pane close-->






<div class="tab-pane fade" id="Privilages">
<div class="container fom-main">
<div class="row">
<div class="col-sm-12">
<h2 class="register">Priviladges</h2>
</div><!--col-sm-12 close-->

</div><!--row close-->
<br />
<div class="row">





</div><!--row close-->
</div><!--container close -->          
</div><!--tab-pane close-->










</div><!--tab-content close-->
</div><!--container close-->

</section><!--section close-->


			
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
	<?php
		}
	?> 