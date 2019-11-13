<?php
	//load system variables to settingsArr array 
	$query2=mysqli_query($conn,"select * from settings");
	$settingsArr = array();
	
	while($row2=mysqli_fetch_array($query2)){
		$settingsArr[$row2['variable']]  = $row2['value'];// settings 2d array
	}
	
?>