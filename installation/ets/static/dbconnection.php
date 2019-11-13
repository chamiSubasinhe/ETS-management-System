<?php

/*
* Google Metirial Design Template designed Asiri Hewage
* asiriofficial@gmail.com
* All Rights Reserved C 2018
* http://asirihewage.business.site
*/

	 $db_host = 'localhost'; // Server Name
	 $db_user = 'asiri'; // Username
	 $db_pass = 'asiri123'; // Password
	 $db_name = 'ets'; // Database Name
	
	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

	if (!$conn) {
		preloader("DB Connection failed.". mysqli_connect_error());	
		flush;
	}
	
	/*
	$dsn = 'mysql:host='.$db_host.';dbname='.$db_name;
	$username = $db_user;
	$password = $db_pass;
	$options = [];
	
	//New PDO connection
	try {
	$conPDO = new PDO($dsn, $username, $password, $options);
	}
	catch(PDOException $e) {
			preloader("PDO Database connection error!");
	}

	*/
?>
