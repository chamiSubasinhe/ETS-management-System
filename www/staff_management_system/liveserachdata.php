<?php

	 include 'includes/dbh.php';


	 if(isset($_POST['suggestion']))
	 {
	 	$output = "";
	 	$query = "SELECT * FROM staff WHERE staffID LIKE '%".$_POST['suggestion']."%'";
	 	$result = mysqli_query($conn, $query);
	 	$output = '<ul class="list-unstyled liveserchlist">';
	 	if(mysqli_num_rows($result) > 0)
	 	{
	 		while ($row = mysqli_fetch_array($result))
	 		{
	 			$output .='<li id="searchLi">'.$row["staffID"].'</li>';
	 		}
	 	}
	 	else
	 	{
	 		$output .='<li>Id not found</li>';
	 	}
	 	$output .='</ul>';
	 	echo $output;
	 }




?>