<?php 
	//page by H.M.Y.L.W.Bandara
?>

<!-- DB connection ---------------------------------------->
<?php include 'includes/dbh.php';?>
<!--# end DB connection ----------------------------------->
	

<!DOCTYPE html>
<html>
<head>



<!-- Page head --------------------------------------->
<?php include 'head.php';?>
<!--# end Page Loader -------------------------------->


<style type="text/css">

.custom-hover:hover{
    font-size: 150%;
    cursor: pointer;
}

.heading-hide{
    display: none;
}


.liveserchlist{
    background-color: #eee;
    cursor: pointer;
}

.liveserchlist li{
    padding:12px;
}


</style>

</head>
	
<body class="theme-blue">
    <!-- Page Loader ------------------------------------>
	<?php include 'preloader.php';?>
    <!-- #END# Page Loader ------------------------------>
	
    <!-- Overlay For Sidebars --------------------------->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars --------------------->
	
    <!-- Search Bar ------------------------------------->
    <?php include 'searchbar.php';?>
    <!-- #END# Search Bar ------------------------------->
	
    <!-- Top Bar ---------------------------------------->
    <?php include 'topnav.php';?>
    <!-- #Top Bar --------------------------------------->
	
    <section>
        <!-- Left Sidebar -------------------------------->
        <aside id="leftsidebar" class="sidebar">
		
            <!-- User Info ---------------------->
			<?php include 'userinfo.php';?>
            <!-- #User Info ---------------------->
			
            <!-- Menu --------------------------->
			<?php include 'menu.php';?>
            <!-- #Menu -------------------------->
			
            <!-- Footer ------------------------->
            <?php include 'footer.php';?>
            <!-- #Footer ------------------------>
			
        </aside>
        <!-- #END# Left Sidebar -------------------------------->
		
        <!-- Right Sidebar ----------------------------->
        <?php include 'rightsidebar.php';?>
        <!-- #END# Right Sidebar -->
		
    </section>


	
	
    <section class="content">
	<!-- Main page content  ----------------------------->
        <div class="container-fluid">
				<div class="row clearfix js-sweetalert">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header"><h2 align="center"><b>ADD A NEW STAFF MEMBER</h2></b></div>

							<div class = "col-sm-9"></div>
							
						<div class = "body">
							<form id="myform" method="post" action="includes/insertStaffQuery.php" enctype="multipart/form-data">
							<h2 id="personal-heading" class="card-inside-title custom-hover">Personal Details+</h2>
                        <div id="personal-heading-toggle" class="heading-hide">
    




                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class = "form-control">
                                        Profile image*
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" class="form-control" name="file" >
                                        </div>
                                    </div>
                                </div>
                            </div>




							
							<div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
									<div class = "form-control">
										Full name*
									</div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="name" class="form-control" id="full_name" name="full_name" minlength="10" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
														
							<div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
									<div class = "form-control">
										Gender
									</div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                           <div class="demo-radio-button" >
                                                <input name="gender" type="radio" class="with-gap" id="radio_3" value="M" checked>
                                                <label for="radio_3">Male</label>
                                                <input name="gender" type="radio" id="radio_4" class="with-gap" value="F">
                                                <label for="radio_4">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
									<div class = "form-control">
										National ID*
									</div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="nic"name="nic" minlength="10" maxlength="10" placeholder="123456789V"required>
                                            <div class="help-info">Ex: 123456789V</div>
                                        </div>
                                    </div>
                                </div>
                            </div>	

                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class = "form-control">
                                        Date of birth*
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                             <input type="date" id="dob" class="form-control" name="dob" required>
                                    </div>
                                </div>
                            </div>

                            </div>   
                            
                            <div>
                                <p id="scroll_up" class="custom-hover"><b>Scroll up^</b></p>
                            </div>

                        
               

          </div>   <!--end of slide-->
                            					
					</div>  
 	

			<hr>
			


	</div>
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">

                            <h2 id="employment-heading" class="card-inside-title custom-hover">
                                Employment Details+
                            </h2>
                            <div id="employment-heading-toggle" class="heading-hide">
							<div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class = "form-control">
                                    Position*
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" id="position" name="position" form="myform" required>
                                                <option value="accountant" name="accountant" selected="selected" >Accountant</option>
                                                <option value="branchAdmin" name="branchAdmin">Branch Admin</option>
                                                <option value="lecturer" name="lecturer">Lecturer</option>
                                                <option value="receptionst" name="receptionst">Receptionst</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class = "form-control">
                                    Date joined*
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control" id="date_join" name="date_join" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<div class = "form-control">
                                    managed_by*
									</div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="managed_by" name="managed_by" title="This field should contain 12 chracters. eg:SFXXXXXX123456" minlength="12" maxlength="12" required>
                                            <div>
                                                 <p id="searchList"></p>
                                            </div>
                                            <div class="help-info">Ex: SFXXXXXX123456</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

							<div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<div class = "form-control">
                                    Job Type*
									</div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="job_type" form="myform" required>
                
                                                <option value="permenent" selected="selected">permenent</option>
                                                <option value="contract">contract</option>
                                                <option value="partTime">Part time</option>
                                                <option value="internship">Internship</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

  

							 <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<div class = "form-control">
                                    Job Status*
									</div>
                                </div>
                               <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="job_status" form="myform" required>

                                                <option value="confirmed" selected="selected">Confirmed</option>
                                                <option value="probation">Probation</option>
                                                <option value="resigned">Resigned</option>
                                                <option value="dismissed">Dismissed</option>
                                                <option value="retired">Retired</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>



                            </div>


                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class = "form-control">
                                        Basic salary*
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="basic" name="basic" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class = "form-control">
                                        Allowances*
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="allow" name="allow" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class = "form-control">
                                        Deductions*
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="deduct" name="deduct" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <div>
                                <p id="scroll_up1" class="custom-hover"><b>Scroll up^</b></p>
                            </div>
                        </div>
                      
                        
                    </div>

        </div>
    </div>
</div>
                    
    

    <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="body">

                            <h2 id="contact-heading" class="card-inside-title custom-hover">
                                Contact+
                        </h2>
                        <div id="contact-heading-toggle" class="heading-hide">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class = "form-control">
                                    Web
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" id="email" class="form-control" name="email" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class = "form-control">
                                    Phone
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="phone" name="phone" minlength="10" maxlength="10" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class = "form-control">
                                    Address
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="address" name="address" required>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <div>
                                <p id="scroll_up2" class="custom-hover"><b>Scroll up^</b></p>
                            </div>

                    </div>



                </div>
            </div>
        </div>
    </div>

            <div class="card">
                <div class="body">
                <br>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class = "form-control">ID*</div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                           <input type="text" class="form-control" name="emp_id" id="emp_id" title="This field should contain 12 chracters. eg:SFXXXXXX123456" pattern="([S][F][A-Z][A-Z][A-Z][A-Z][0-9][0-9][0-9][0-9][0-9][0-9])" minlength="12" maxlength="12"  placeholder="SFXXXXXX123456" required>
                                        <div class="help-info">Ex: SFXXXXXX123456</div>
                                        </div>
                                    </div>
                                </div>
                           
                   
                    
                     <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9"></div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class="form-group">
                                           <Button type="button" name="generateID" id="generateID" class="btn bg-blue btn-block waves-effect">Generate ID</Button>
                                
                                    </div>

                                </div>
                    </div>
                    
                </div>
            </div>

        </div>



                            <div class = "col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <!--<input type=hidden name="hiddenvalue" value="<?php echo $rows['staffID']; ?>"> -->
                            </div>

                                            <div class = "col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <input type="button" class="btn bg-blue btn-block waves-effect" name="demo" onclick="fillForm()" value ="FILL FROM WITH SAMPLE DATA"/>
                            </div>


                            <div class = "col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <input type="submit" class="btn bg-blue btn-block waves-effect" name="addsm" value = "ADD STAFF MEMBER"/>
                            </div>



                            <br><br><br><br><br>





            






            </div>
            </div>
		
        </div>
		</form>

 

    </section>

           </div>
    </div>
</div>


        <?php 

            if(isset($_GET['addsm']))
            {
 
                $addsmCheck = $_GET['addsm'];

                if($addsmCheck == "empty")
                {
                    echo "<script type='text/javascript'>alert('Fill all required feilds'); </script>";
                    header("Location: addSMemberForm.php");
                }
                elseif($addsmCheck == "email") 
                {
                    echo "<script type='text/javascript'>alert('Email is not valid'); </script>";
                    "Location: addSMemberForm.php";
                } elseif($addsmCheck == "invalid") 
                {
                    echo "<script type='text/javascript'>alert('Staff ID is not valid'); </script>";
                    "Location: addSMemberForm.php";
                }
                elseif($addsmCheck == "idtaken")
                {
                    echo "<script type='text/javascript'>alert('Staff ID is taken'); </script>";
                    "Location: addSMemberForm.php"; 
                }
                elseif($addsmCheck == "sucess")
                {
                    echo "<script type='text/javascript'>alert('Staff member added'); </script>";
                    "Location: addSMemberForm.php"; 
                }


            }
 ?>

        <script>
     
            $(document).ready(function() {
                $("#personal-heading").click(function(){
                    $("#personal-heading-toggle").slideToggle(750);
                });
            });

              $(document).ready(function() {
                $("#employment-heading").click(function(){
                    $("#employment-heading-toggle").slideToggle(750);
                });
            });

                $(document).ready(function() {
                $("#contact-heading").click(function(){
                    $("#contact-heading-toggle").slideToggle(750);
                });
            });


            $(document).ready(function(){
                $("#generateID").click(function(){
                    $.ajax({url: "generateid.php", success: function(data){
                        $("#emp_id").val($.trim(data));
                    }});
                });
            });

            $(document).ready(function() {
                $("#scroll_up").click(function() {
                    $("#personal-heading-toggle").slideUp(750);
                });
            });

            
            $(document).ready(function() {
                $("#scroll_up1").click(function() {
                    $("#employment-heading-toggle").slideUp(750);
                });
            });


             $(document).ready(function() {
                $("#scroll_up2").click(function() {
                    $("#contact-heading-toggle").slideUp(750);
                });
            }); 


            $(document).ready(function(){
                $("#managed_by").keyup(function(){
                    var name = $("#managed_by").val();
                    if( this.value.length < 4 ) return;
                        $.post("liveserachdata.php",{
                            suggestion: name
                            }, function(data,status){
                                $("#searchList").fadeIn();
                                $("#searchList").html(data);
                            });
                    });
            }); 

            $(document).on('click', '#searchLi', function(){
            $("#managed_by").val($(this).text());
            $("#searchList").fadeOut();
        }); 

        function fillForm() {
				document.getElementById("full_name").value = "Lakshan Waruna Bandara";
				document.getElementById("nic").value = "963152213V";
				document.getElementById("basic").value = "100000";
				document.getElementById("allow").value = "12000";
				document.getElementById("deduct").value = "5000";
				document.getElementById("email").value = "lakshan@gmail.com";
				document.getElementById("phone").value = "0710412513";
				document.getElementById("address").value = "No. 2277, Dr CDL Fernando Road, Kandy";
				
			}            

 </script>   

	
	
		<!-- Javascript --------------------------------->
		<?php include 'scripts.php'; ?> 

        

		<!-- #END# Javascript  -->


		
</body>

</html>