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

.tr-custom th{
    text-align: left;
    background-color: lightblue;
    font-weight: bold;
}

.tbody-custom td{
    background-color: lightgreen;
}


.heading-custom{
    font-size: 20px;
    text-align: center;
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


    <div class="card">
        <div class="body">
            <form action="performanceReport.php" method="POST" id="myform">


            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <div class = "form-control">Order By*</div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" id="order" name="order" form="myform" required>
                                                <option>Select</option>
                                                <option value="staffID" name="id">By id</option>
                                                <option value="percent" name="performance">By Performance</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <div class = "form-control">Arrangement*</div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" id="arrange" name="arrange" form="myform" required>
                                                <option>Select</option>
                                                <option value="ASC" name="id">Ascending Order</option>
                                                <option value="DESC" name="performance">Descending Order</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                           

                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>


                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <input type="submit" name="submit" class="btn bg-blue btn-block waves-effect">
                                </div>








                            </div>
                            </form>
                             </div>

                        </div>
                    </div>


                   
 

    </section>

    <section class="content">
        <div class="card">
            <div class="body">

               <!-- <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover dataTable js-exportable">-->
                <div>
                    <table border="1px">

                <thead>



                         <?php

                            if(isset($_POST['submit']))
                            {

                               if(isset($_POST['order']))
                                { 
                                    $order = $_POST['order'];

                                    if(isset($_POST['arrange'])){ 

                                        $arrange = $_POST['arrange'];

                                        echo "<p class='heading-custom'>PERFORMANCE REPORT ORDERED BY ".$order." AND ".$arrange."</p>";

                                $query = "SELECT * FROM perform ORDER BY $order $arrange";
                                $result = mysqli_query($conn, $query);
  
                               

                            ?>
                                <tr class="tr-custom">
                                    <th>Staff ID</th>
                                    <th>Accuracy</th>
                                    <th>Speed</th>
                                    <th>Job Knowledge</th>
                                    <th>Quantitiy of work</th>
                                    <th>Initiative</th>
                                    <th>Communication</th>
                                    <th>CommenSense</th>
                                    <th>Appearence</th>
                                    <th>Co-operation</th> 
                                    <th>Customer service</th>
                                    <th>Overall Conduct</th> 
                                    <th>Comments</th> 
                                    <th>Total</th>
                                    <th>Average</th> 

                                </tr>
                            </thead>
                            <tfoot>
                                 <tr class="tr-custom">
                                    <th>Staff ID</th>
                                    <th>Accuracy</th>
                                    <th>Speed</th>
                                    <th>Job Knowledge</th>
                                    <th>Quantitiy of work</th>
                                    <th>Initiative</th>
                                    <th>Communication</th>
                                    <th>CommenSense</th>
                                    <th>Appearence</th>
                                    <th>Co-operation</th> 
                                    <th>Customer service</th>
                                    <th>Overall Conduct</th> 
                                    <th>Comments</th> 
                                    <th>Total</th>
                                    <th>Average</th> 

                                </tr>
                            </tfoot>
                                <tbody class="tbody-custom">

                                    <?php
                                    while($Rows = mysqli_fetch_array($result)){
                                    ?>
                                    
                                    <tr id="<?php echo $numRows2['staffID']; ?>">
                                    <td style="text-align: right;"><?php echo $Rows['staffID']; ?></td>    
                                    <td style="text-align: right;"><?php echo $Rows['accuracy']; ?></td>
                                    <td style="text-align: right;"><?php echo $Rows['speed']; ?></td>
                                    <td style="text-align: right;"><?php echo $Rows['jobknow']; ?></td>
                                    <td style="text-align: right;"><?php echo $Rows['qow']; ?></td>
                                    <td style="text-align: right;"><?php echo $Rows['inititive']; ?></td>
                                    <td style="text-align: right;"><?php echo $Rows['communication']; ?></td>
                                    <td style="text-align: right;"><?php echo $Rows['commensense']; ?></td>
                                    <td style="text-align: right;"><?php echo $Rows['app']; ?></td>
                                    <td style="text-align: right;"><?php echo $Rows['corp']; ?></td>
                                    <td style="text-align: right;"><?php echo $Rows['cs']; ?></td>
                                    <td style="text-align: right;"><?php echo $Rows['conduct']; ?></td>
                                    <td style="text-align: right;"><?php echo $Rows['othercom']; ?></td>
                                    <td style="text-align: right;"><?php echo $Rows['total']; ?></td>
                                    <td style="text-align: right;"><?php echo $Rows['percent']; ?></td>
                                    </tr>
                                                                                

                                                    <?php
                                                     }

                                                     }


                                                }

                                            
                                            ?>

                        

                    </tbody>

            </table>

            <br><br>
            <div class ="col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <?php
                                   echo '<a href="pdfperformReport.php?order=' . $order . '&arrange=' . $arrange . '"><p style="color:black; padding:5px; margin:10px;" class="btn bg-blue btn-block waves-effect">GENERATE REPORT</p></a>';


                                    }
                                   ?>
                </div>
                        <br><br>
            </div>
        </div>
    </section>
  
    <!-- Javascript --------------------------------->
    <?php include 'scripts.php'; ?> 
    <!-- #END# Javascript  -->


		
</body>

</html>