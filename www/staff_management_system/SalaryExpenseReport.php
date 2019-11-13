<?php 

?>
<!DOCTYPE html>
<html>
<head>

    <!-- Google Fonts
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">-->


    <!--custom css added for staff managemment -->
    <link rel="stylesheet" type="text/css" href="css/custom.css"/>

    <!-- noUISlider Css -->
    <link href="plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    



    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />



    <!-- Page head --------------------------------------->
	<?php include 'head.php';?>
	<!--# end Page Loader -->

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

	<!--db connection-->
	<?php include_once 'includes/dbh.php';?>


</head>
<body class="theme-blue">

    <!-- Page Loader ------------------------------------>
	<?php include 'preloader.php';?>
    <!-- #END# Page Loader -->
	
    <!-- Overlay For Sidebars --------------------------->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
	
    <!-- Search Bar ------------------------------------->
    <?php include 'searchbar.php';?>
    <!-- #END# Search Bar -->
	
    <!-- Top Bar ---------------------------------------->
    <?php include 'topnav.php';?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -------------------------------->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info ---------------------->
			<?php include 'userinfo.php';?>
            <!-- #User Info -->
			
            <!-- Menu --------------------------->
			<?php include 'menu.php';?>
            <!-- #Menu -->
			
            <!-- Footer ------------------------->
            <?php include 'footer.php';?>
            <!-- #Footer -->
			
        </aside>
        <!-- #END# Left Sidebar -->
		
        <!-- Right Sidebar ----------------------------->
        <?php include 'rightsidebar.php';?>
        <!-- #END# Right Sidebar -->
		
    </section>



    <section class="content">
    <!-- Main page content  ----------------------------->

	<div class="card">
        <div class="body">

    <form action="SalaryExpenseReport.php" method="POST" id="myform">
     <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <div class = "form-control">Month*</div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" id="month" name="month" form="myform" required>
                                            	<option value="All" name="All">All</option>
                                                <option value="01" name="January">January</option>
                                                <option value="02" name="February">February</option>
                                                <option value="03" name="March">March</option>
                                                <option value="04" name="April">April</option>
                                                <option value="05" name="May">May</option>
                                                <option value="06" name="June">June</option>
                                                <option value="07" name="July">July</option>
                                                <option value="08" name="August">August</option>
                                                <option value="09" name="September">September</option>
                                                <option value="10" name="October">October</option>
                                                <option value="11" name="November">November</option>
                                                <option value="12" name="December">December</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <div class = "form-control">Year*</div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control show-tick" id="year" name="year" form="myform" required>
                                                 <option value="All" name="All">All</option>
                                                <option value="2017" name="2017">2017</option>
                                                <option value="2018" name="2018">2018</option>
                                                <option value="2019" name="2019">2019</option>
                                                <option value="2020" name="2020">2020</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>


                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <input type="submit" name="submit" class="btn bg-blue btn-block waves-effect">
                </div>
                            </div>


                    </div>




                            </div>
					    
					</div>
				</div>

		

                
      </form>
    <div class="container-fluid">
         <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <b>LIST OF EMPLOYEES</b>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">Options</i>
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
                                        <tr class="tr-custom">
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th>Total Basic</th>
                                            <th>Total Allowances</th>
                                            <th>Total Deductions</th>
                                            <th>Total Netpay</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="tr-custom">
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th>Total Basic</th>
                                            <th>Total Allowances</th>
                                            <th>Total Deductions</th>
                                            <th>Total Netpay</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="tbody-custom">
                                    	  <?php

                                    if(isset($_POST['submit']))
                                    {
                                        if(isset($_POST['month']))
                                        {
                                            $month = $_POST['month'];

                                        if(isset($_POST['year']))
                                        {

                                            $year = $_POST['year'];

                                            echo "<p style='font-size:20px; color:black; text-align:center'><b>Summary of Salary Expenses For ".$month."st Month of year ".$year."</b><p>";


									       $sql = "SELECT SUM(basic) AS tot_basic, SUM(allowences) AS tot_allow, SUM(deduction) AS tot_deduct FROM staff LEFT JOIN salary ON (staff.staffID = salary.staffID) WHERE staff.datejoined < '$year-$month-01'";

                         

										        $result = mysqli_query($conn, $sql);
										        $resultCheck = mysqli_num_rows($result);
										        
										        if($resultCheck > 0)
										        {
										            while($rows = mysqli_fetch_assoc($result))
										            {


                                                        $tot_basic = $rows['tot_basic'];
                                                        $tot_allow =  $rows['tot_allow'];
                                                        $tot_deduct = $rows['tot_deduct'];
										               
		

                                                    }
                                                }

                                                $net_pay = ($tot_basic + $tot_allow) - $tot_deduct;
                                


                                                ?>

                                  <tr>
                                            <tr id="<?php echo $row['staffID']; ?>">
                                            <td><?php echo $year; ?></td>
                                            <td><?php echo $month; ?></td>
                                            <td><?php echo $tot_basic; ?></td>
                                            <td><?php echo $tot_allow; ?></td>
                                            <td><?php echo $tot_deduct; ?></td>
                                            <td><?php echo $net_pay; ?></td>
                                        </tr>

                                    </tbody>

                                 </table>
                                 <div  class="col-lg-8 col-md-8 col-sm-8 col-xs-8"></div>
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    
                                    <?php
                                   echo '<a href="genSalaryExpense.php?basic=' . $tot_basic . '&allow=' . $tot_allow . '&deduct=' . $tot_deduct . '&netpay=' . $net_pay . '&month=' . $month . '&year=' . $year . '"><p style="color:black; padding:5px; margin:10px;" class="btn bg-blue btn-block waves-effect">GENERATE REPORT</p></a>';
                                


                                    }
                                    
                                        }


                                    }
                                
                                   ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table 
            &tot_allow=$tot_allow&tot_deduct=$tot_deduct&tot_netpay=$net_pay
            -->
                                    

                                    
                                
        </div>

    
	<!--  Main page content ----------------------------->
    </section>


	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'scripts.php';?>



    <!-- Custom Js -->
    <script src="js/pages/forms/advanced-form-elements.js"></script>

    <script src="plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>



    <!-- #END# Javascript  -->
		
</body>

</html>
