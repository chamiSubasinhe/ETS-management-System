s<?php 
/*
* Google Metirial Design Template designed Asiri Hewage
* asiriofficial@gmail.com
* All Rights Reserved C 2018
* http://asirihewage.business.site
*/
?>

<?php $loadingMSG = 'Query compiler is initialing...'; ?>

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
	function highlight_file_with_line_numbers($file) { 
          //Strip code and first span
        $code = $string = str_replace("\n", "", substr(highlight_file($file, true), 36, -15));;
        //Split lines
        $lines = explode('<br>', $code);
        //Count
        $lineCount = count($lines);
        //Calc pad length
        $padLength = strlen($lineCount);
        
        //Re-Print the code and span again
        echo "<code><span style=\"color: #000000\">";
        
        //Loop lines
        foreach($lines as $i => $line) {
            //Create line number
            $lineNumber = str_pad($i + 1,  $padLength, '0', STR_PAD_LEFT);
            //Print line
            echo sprintf('<br><span style="color: #999999">%s | </span>%s', $lineNumber, $line);
        }
        
        //Close span
        echo "</span></code>";
    }
	
	
	   function Read() {
		   $file = "test.txt";
		   $fp = fopen($file, "r");
		   while(!feof($fp)) {
			   $data = fgets($fp, filesize($file));
			   echo "$data";
		   }
		   fclose($fp);
	   } 

	   function Write() {
		   $file = "test.txt";
		   $fp = fopen($file, "w");
		   $data = $_POST["tekst"];
		   fwrite($fp, $data);
		   fclose($fp);
	   }
			   
        if ($_POST["submit_check"]){
            Write();
        };
		
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
			
			 <!-- CKEditor -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Text Editor
                            </h2>
                        </div>
						<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="body">
                            <textarea class="form-controll" name="tekst" id="ckeditor"><?php Read();; ?></textarea>
                        </div>
						<input type="submit" class="btn form-controll" name="submit" value="Update text">
						<input type="hidden" class="btn form-controll m-t-15 waves-effect" name="submit_check" value="1">
						</form>
                    </div>
                </div>
            </div>
            <!-- #END# CKEditor -->
			<?php highlight_file_with_line_numbers("template");?>
		
		
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
