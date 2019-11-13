<?php

	$existingNames = array("SFKGLE123456", "SFKGLE555666");

	if(isset($_POST['query']))
	{
		$name = $_POST['query'];
		
		if(!empty($name))
		{

			foreach ($existingNames as $existingName) 
			{
				if(strpos($existingName, $name) !== false)
				{
						echo $existingName;
						echo "<br>";
				}
			}
		}
	}

  ?>