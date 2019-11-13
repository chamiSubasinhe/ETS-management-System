
			<ol class="breadcrumb breadcrumb-bg">
			<?php 
			
			if(basename($_SERVER['PHP_SELF'], ".php").PHP_EOL == "Logger"){
                                echo '<li><a href="index.php"><i class="material-icons">home</i> Home</a></li>
                                <li class="active"><i class="material-icons">library_books</i>Logger</li> '; 
			}

			else if(basename($_SERVER['PHP_SELF'], ".php").PHP_EOL == "home"){
                                echo '<li><a href="index.php"><i class="material-icons">home</i> Home</a></li>
                                <li class="active"><i class="material-icons">library_books</i>Home</li> '; 
			}

			else if(basename($_SERVER['PHP_SELF'], ".php").PHP_EOL == "settings"){
                                echo '<li><a href="index.php"><i class="material-icons">home</i> Home</a></li>
                                <li class="active"><i class="material-icons">library_books</i>Settings</li> '; 
			}
			
			else {
				 echo '<li><a href="index.php"><i class="material-icons">home</i> Home</a></li>
                                <li class="active"><i class="material-icons">library_books</i>Unknown Page</li> '; 
			}

			?>
            </ol>
	