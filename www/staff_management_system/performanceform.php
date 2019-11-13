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
            <!--search from content-->

        <div class="container-fluid">
            <div class="row clearfix js-sweetalert">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 align="center"><b>SEARCH STAFF MEMBER</h2></b>
                        <div class = "col-sm-9"></div>
                    </div>
                            
                    <div class = "body">
                        <form method = "post" action = "performanceform.php">
                    <h2 class="card-inside-title">SEARCH</h2>
                            
                            
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class = "form-control">SERACH BY ID*</div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="search" name="search" plcaeholder="SMXXXX123456" class="form-control" required>
                                    </div>
                                <p id="searchList"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>                

                    <div class = "col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <input type = "submit" class="btn bg-blue btn-block waves-effect" name="submit_search" value = "SEARCH STAFF MEMBER"/>
                    </div>

                    <br><br>
                    </form> 
                </div>
            </div>
        </div>
    </section>


        <?php

             if(isset($_POST['submit_search']))
             {

                $search = mysqli_real_escape_string($conn, $_POST['search']);

                $sql = "SELECT * FROM staff  LEFT JOIN salary ON (staff.staffID = salary.staffID) LEFT JOIN staffbankdetails ON (staff.staffID = staffbankdetails.staffID) LEFT JOIN staffcontact ON (staff.staffID = staffcontact.staffID)  WHERE staff.staffID LIKE ? OR nameInFull LIKE ?";

                //LEFT JOIN dependents ON (staff.staffID = dependents.staffID)

                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    echo "SQL satement failed";
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "ss", $search, $search);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);


                 while($rows = mysqli_fetch_assoc($result))
                    {

                    
                            $emp_id = $rows['staffID'];        
                          

                ?>


    <section class="content">
    <!-- Main page content  ----------------------------->
        <div class="container-fluid">
                <div class="row clearfix js-sweetalert">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2 align="center"><b>ADD A NEW STAFF MEMBER</h2></b>
                            <div class = "col-sm-9"></div>
                        </div>
                            
                    <div class="body">
                        <form method="post" action="includes/insertPerform.php" id="myformper">
                            <!--personal info tab-->
                            <h3>Comments by the reporting officer</h3>
                           
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class = "form-control">ID*</div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                           <input type="text" class="form-control" id="emp_id" name="emp_id" value="<?php echo $rows['staffID']; ?>" title="This field should contain 12 chracters. eg:SFXXXXXX123456" pattern="([S][F][A-Z][A-Z][A-Z][A-Z][0-9][0-9][0-9][0-9][0-9][0-9])" minlength="12" maxlength="12"  placeholder="SFXXXXXX123456" required>

                                        <div class="help-info">Ex: SFXXXXXX123456</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="form-group form-float">
                                    <div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                 <label>Time period : </label>
                                        </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="period" form="myformper">
                                                <option value="janTOapril" selected="selected">Jan to April</option>
                                                <option value="aprilTOaug">May to Aug</option>
                                                <option value="sepTOdec">Sep to dec</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                                



                                <div class="row clearfix">
                                <div class="form-group form-float">
                                    <div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                 <label>Accuracy</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="accuracy" placeholder="Rating" id="accuracy" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                      <div class="form-group">
                                          <div class="form-line">
                                              <textarea rows="2" class="form-control no-resize auto-growth" id="accuracycom" name="accuracycom" placeholder="Other comments"></textarea>
                                          </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                                
                                
                                
                                <div class="row clearfix">
                                <div class="form-group form-float">
                                   <div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                 <label>Speed</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="speed" placeholder="Rating" id="speed">
                                            </div>
                                        </div>
                                    </div>
      
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                          <div class="form-line">
                                              <textarea rows="2" class="form-control no-resize auto-growth" id="speedcom" name="speedcom" placeholder="Other comments"></textarea>
                                          </div>
                                        </div>
                                    </div>
                                
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row clearfix">
                                <div class="form-group form-float">
                                   <div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                 <label>Job knowledge</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="jobknowledge" placeholder="Rating" id="jobknowledge">
                                            </div>
                                        </div>
                                    </div>
                                   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                          <div class="form-line">
                                              <textarea rows="2" class="form-control no-resize auto-growth" id="jobknowledgecom" name="jobknowledgecom" placeholder="Other comments"></textarea>
                                          </div>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                                </div>    
                                
                                <div class="row clearfix">
                                <div class="form-group form-float">
                                   <div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                 <label>Initiative</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="init" placeholder="Rating" id="init">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                          <div class="form-line">
                                              <textarea rows="2" class="form-control no-resize auto-growth" id="initcom" name="initcom" placeholder="Other comments"></textarea>
                                          </div>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                                </div>
                                
                                <div class="row clearfix">
                                 <div class="form-group form-float">
                                   <div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                 <label>Quantity of work</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="qow" placeholder="Rating" id="qow">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                          <div class="form-line">
                                              <textarea rows="2" class="form-control no-resize auto-growth" id="qowcom" name="qowcom" placeholder="Other comments"></textarea>
                                          </div>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                                </div>
                                

                                
                                <div class="row clearfix">
                                 <div class="form-group form-float">
                                   <div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                 <label>Communication</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="communication" placeholder="Rating" name="communication" id="communication">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                          <div class="form-line">
                                              <textarea rows="2" class="form-control no-resize auto-growth" id="communicationcom" name="communicationcom" placeholder="Other comments"></textarea>
                                          </div>
                                        </div>
                                    </div>
 

                                    </div>
                                </div>
                                </div>    
                                    
                                <div class="row clearfix">
                                 <div class="form-group form-float">
                                   <div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                 <label>Common sense/ Mental alertness</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="commonsense" placeholder="Rating" id="commonsense">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                          <div class="form-line">
                                              <textarea rows="2" class="form-control no-resize auto-growth" id="commonsensecom" name="commonsensecom" placeholder="Other comments"></textarea>
                                          </div>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                                </div>
                                
                                <div class="row clearfix">
                                 <div class="form-group form-float">
                                   <div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                 <label>Appearence and mannerisms</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="appe" placeholder="Rating" id="appe">
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                          <div class="form-line">
                                              <textarea rows="2" class="form-control no-resize auto-growth" id="appecom" name="appecom"placeholder="Other comments"></textarea>
                                          </div>
                                        </div>
                                    </div>
 
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row clearfix">
                                 <div class="form-group form-float">
                                   <div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                 <label>Co-operation</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="cooperation" placeholder="Rating" id="cooperation">
                                            </div>
                                        </div>
                                    </div>
 
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                          <div class="form-line">
                                              <textarea rows="2" class="form-control no-resize auto-growth" id="cooperationcom" name="cooperationcom" placeholder="Other comments"></textarea>
                                          </div>
                                        </div>
                                    </div>
     
                                    </div>
                                </div>
                                </div>
                                
                                 <div class="row clearfix">
                                 <div class="form-group form-float">
                                   <div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                 <label>Customer service</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="cs" placeholder="Rating" id="cs">
                                            </div>
                                        </div>
                                    </div>
 
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                          <div class="form-line">
                                              <textarea rows="2" class="form-control no-resize auto-growth" id="cscom" name="cscom" placeholder="Other comments"></textarea>
                                          </div>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                                </div>
                                            
                                <div class="row clearfix">
                                 <div class="form-group form-float">
                                   <div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                 <label>Overall conduct</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="conduct" placeholder="Rating" id="conduct">
                                            </div>
                                        </div>
                                    </div>
  
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                           <div class="form-line">
                                              <textarea rows="2" class="form-control no-resize auto-growth" id="conductcom" name="conductcom" placeholder="Other comments"></textarea>
                                          </div>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                                </div>
                                
                                <div class="row clearfix">
                                <div class="form-group form-float">
                                   <div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                 <label>Total</label>
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="total" placeholder="Rating" id="total">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <button type="button" id="btn_total" class="btn bg-blue btn-block waves-effect">Calculate Total</button>
                            </div>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row clearfix">
                                <div class="form-group form-float">
                                   <div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                 <label>As a percentage</label>
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="asper" placeholder="Rating" id="percent">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <button type="button" id="btn_percent" class="btn bg-blue btn-block waves-effect">Calculate Percentage</button>
                            </div>

                                    </div>
                                </div>
                                </div>


                            <h3>Confirmation</h3>
                           
                            
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <div class = "form-control">Enterd by*</div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <div class="form-group">
                                        <div class="form-line">
                                           <input type="text" class="form-control" id="emp_id_enter" name="emp_id_enter" title="This field should contain 12 chracters. eg:SFXXXXXX123456" pattern="([S][F][A-Z][A-Z][A-Z][A-Z][0-9][0-9][0-9][0-9][0-9][0-9])" minlength="12" maxlength="12"  placeholder="SFXXXXXX123456" required>
                                           </div>
                                <p id="searchList2"></p>
                                    </div>
                                    
                                        </div>
                                    </div>
            


          

                            <div class = "col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                
                            </div>

                            <div class = "col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <input type="button" class="btn bg-blue btn-block waves-effect" name="demo" onclick="fillForm()" value ="FILL FROM WITH SAMPLE DATA"/>
                            </div>


                            <div class = "col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <input type="submit" class="btn bg-blue btn-block waves-effect" name="addperform" value="ADD PERFORMANCE"/>
                            </div>
                          
                          <br><br>

                                        </div>
                        </div>
                             
                               <?php 

                        }
                    }

                    }
                    ?>
                                
                         
                             <!--Contact info tab end-->
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
        
        
        
        <!--End Emplooyee performance form-->
	<!--  Main page content ----------------------------->
    </section>

    <?php 

            if(isset($_GET['insert']))
            {
 
                $addperformCheck = $_GET['insert'];

                if($addperformCheck == "sucess")
                {
                    echo "<script type='text/javascript'>alert('Staff Member Performance SUCESSFULLY Added'); </script>";
                    header("Location: performanceform.php");
                }
                elseif($addperformCheck == "formnotsubmitted") 
                {
                    echo "<script type='text/javascript'>alert('You did not clicked the burron!'); </script>";
                    "Location: performanceform.php";
                }
            }


 ?>


	<script>


        
        $(document).ready(function(){
            $("#btn_total").click(function(){
                $("#total").val((parseInt($("#accuracy").val()) + parseInt($("#speed").val()) + parseInt($("#jobknowledge").val()) + parseInt($("#init").val()) + parseInt($("#qow").val()) + parseInt($("#communication").val()) + parseInt($("#commonsense").val()) + parseInt($("#appe").val()) + parseInt($("#cooperation").val()) + parseInt($("#cs") .val())+ parseInt($("#conduct").val())));
            });
        });

        $(document).ready(function(){
            $("#btn_percent").click(function(){
                var tot = (parseInt($("#accuracy").val()) + parseInt($("#speed").val()) + parseInt($("#jobknowledge").val()) + parseInt($("#init").val()) + parseInt($("#qow").val()) + parseInt($("#communication").val()) + parseInt($("#commonsense").val()) + parseInt($("#appe").val()) + parseInt($("#cooperation").val()) + parseInt($("#cs") .val())+ parseInt($("#conduct").val()));
                var tot_round = Math.round(((tot * 100) / 110));
                $("#percent").val(tot_round);
            });
        });

        
        $(document).ready(function(){
            $("#search").keyup(function(){
                var name = $("#search").val();
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
            $("#search").val($(this).text());
            $("#searchList").fadeOut();
        });


          $(document).ready(function(){
            $("#emp_id_enter").keyup(function(){
                var name = $("#emp_id_enter").val();
                if( this.value.length < 4 ) return;
                    $.post("liveserachdata.php",{
                        suggestion: name
                        }, function(data,status){
                            $("#searchList2").fadeIn();
                            $("#searchList2").html(data);
                        });
                });
        });

         $(document).on('click', '#searchLi', function(){
            $("#emp_id_enter").val($(this).text());
            $("#searchList2").fadeOut();
        });


            


        function fillForm() {
                document.getElementById("accuracy").value = "8";
                document.getElementById("accuracycom").value = "Always at work and on time.";
                document.getElementById("speed").value = "8";
                document.getElementById("speedcom").value = "Has had no unscheduled absences during the rating period.";
                document.getElementById("jobknowledge").value = "7";
                document.getElementById("jobknowledgecom").value = "Can always be counted on to work overtime when necessary without complaint.";
                document.getElementById("init").value = "10";
                document.getElementById("initcom").value = "TMakes sure work area is covered at all times.";
                document.getElementById("qow").value = "8";
                document.getElementById("qowcom").value = "Consistently arrives to work on time.";
                document.getElementById("communication").value = "7";
                document.getElementById("communicationcom").value = "Occasionally leaves work early.";
                document.getElementById("commonsense").value = "7";
                document.getElementById("commonsensecom").value = "Occasionally arrives late to work.";
                document.getElementById("appe").value = "8";
                document.getElementById("appecom").value = "Has a good attendance record.";
                document.getElementById("cooperation").value = "5";
                document.getElementById("cooperationcom").value = "Frequently leaves work early.";
                document.getElementById("cs").value = "8";
                document.getElementById("cscom").value = "Sometimes does not make sure all work is completed before leaving for the day.";
                document.getElementById("conduct").value = "7";
                document.getElementById("conductcom").value = "Occasionally calls in to work without prior approval, resulting in unscheduled absences.";

                
            }        




    </script>
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'scripts.php';?>


    <!-- #END# Javascript  -->
		
</body>

</html>
