<?php
//Update auth level // enable auth levels or disable
	if(isset($_REQUEST['section']) && isset($_REQUEST['authId']))
	{
		$authId = $_REQUEST['authId'];
		$section = $_REQUEST['section'];
		
		//$staticSetting = $_REQUEST['staticNew'];
		if($section =='1'){
			$updateSetting="Update settings SET section='1', WHERE authId='".$authId."'";
		}else{
			$updateSetting="Update settings SET section='0', WHERE authId='".$authId."'";
		}
		
	
		// proceed to screw this database up 
		$exec = mysqli_query($conn,$updateSetting);
		if(!$exec){// always trust your users... :P 
			echo 'Updated';
		}else{ 
			echo 'Could not update';
		} 
	}
	
	
	

/*
<script>
         $(document).ready(function() {
           
            $("#driver").click(function(event){
               
               $.post(
                  "helo.php",
                  { name: "<?php echo $name; ?>", fname: document.getElementById("fname").value },
                  function(data) {
                     $('#stage').html(data);
                  }
               );            
            });
         });
      </script>
	  
	  
	  
	  <p>Click on the button to load result.html file −</p>
       
      <div id = "stage" style = "background-color:cc0;">
         STAGE
      </div>
        <input type = "text" id = "fname" value = "" />
       
      <input type = "button" id = "driver" value = "Load Data" />

*/
?>

