<?php

	 $db_host = 'localhost'; // Server Name
	 $db_user = 'asiri'; // Username
	 $db_pass = 'asiri123'; // Password
	 $db_name = 'ets'; // Database Name
	
	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	if (!$conn) {
		die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
	}
	


?>