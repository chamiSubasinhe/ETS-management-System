
<!DOCTYPE html>




<html>


	<!-- Page head --------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Loader -->
	
<body class="theme-red">

    <!-- Page Loader ------------------------------------>
	<?php //include 'static/preloader.php';?>
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
            
            
            
            
            
             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink ">
                        <div class="icon">
                            <i class="material-icons">flight_takeoff</i>
                        </div>
                        <div class="content">
                            
                           <form action="AddCour_IN.php">
                           <div class="text"><button onclick="window.location.href='/page2'" class="btn  btn-default waves-effect">COURIER-SERVICE</button></div>
                            </form>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                        
                    </div>
                </div>
            
       
                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange">
                        <div class="icon">
                        <i class="material-icons">equalizer</i>
                        </div>
                        <div class="content">
                            <form action="AddItem_IN.php">
                           <div class="text"><button onclick="window.location.href='/page2'" class="btn  btn-default waves-effect">VIEW ITEMS</button></div>
                            </form>
                      
                        </div>
                    </div>
                </div>
                
                   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal">
                        <div class="icon">
                            <i class="material-icons">brightness_low</i>
                        </div>
                        <div class="content">
                            <form action="librarybooksearch.php">
                           <div class="text"><button onclick="window.location.href='/page2'" class="btn  btn-default waves-effect">REPORTS</button></div>
                            </form>
                        </div>
                    </div>
                </div>
                
                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-purple ">
                        <div class="icon">
                            <i class="material-icons">devices</i>
                        </div>
                        <div class="content">
                          <form action="report_IN.php">
                           <div class="text"><button onclick="window.location.href='/page2'" class="btn  btn-default waves-effect">STOCK-LEVELS</button></div>
                            </form>
                            
                        </div>
                    </div>
                </div>
           
                <script src="js/cal.js"></script>
 <link rel="stylesheet" href="css/cal.css">
<body onload="startTime()">
  <div class="container">
    <div class="card" >
      <div class="front">
        <div class="contentfront">
          <div class="month">
            <table align="left">
              <tr class="orangeTr">
                <th>M</th>
                <th>T</th>
                <th>W</th>
                <th>T</th>
                <th>F</th>
                <th>S</th>
                <th>S</th>
              </tr>
              <tr class="whiteTr">
                <th></th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
              </tr>
              <tr class="whiteTr">
                <th>7</th>
                <th>8</th>
                <th>9</th>
                <th>10</th>
                <th>11</th>
                <th>12</th>
                <th>13</th>
              </tr>
              <tr class="whiteTr">
                <th>14</th>
                <th>15</th>
                <th>16</th>
                <th>17</th>
                <th>18</th>
                <th>19</th>
                <th>20</th>
              </tr>
              <tr class="whiteTr">
                <th>21</th>
                <th>22</th>
                <th>23</th>
                <th>24</th>
                <th>25</th>
                <th>26</th>
                <th>27</th>
              </tr>
              <tr class="whiteTr">
                <th>28</th>
                <th>29</th>
                <th>30</th>
                <th>31</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </table>
          </div>
          <div class="date">
            <div class="datecont">
              <div id="date"></div>
              <div id="day"></div>
              <div id="month"></div>
              <i class="fa fa-pencil edit" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="back">
        <!---<div class="contentback">
          <div class="backcontainer">
            hhh
          </div>
        </div>--->
      </div>
    </div>
  </div>
</body>
                
           
            
         
            
            
            
            
   

           
                
                
	<!--  Main page content ----------------------------->
	</div>
     
            
    </section>

    
       
            <!-- #END# Basic Validation -->

	 <!-- Jquery Validation Plugin Css -->
   
	 <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
