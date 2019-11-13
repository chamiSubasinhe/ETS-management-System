<?php
	 $db_host = 'localhost'; // Server Name
	 $db_user = 'root'; // Username
	 $db_pass = ''; // Password
	 $db_name = 'ets'; // Database Name
	
	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	if (!$conn) {
		die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
	}
	





?>

<!Doctype html>
<html>
	<head>
		<title>searchbar</title>
			<link rel="stylesheet" href="css/style.css"/>
			<script type="text/javascript">
				function active(){
					var searchbar= document.getElementById('searchbar');
					if(searchbar.value == 'search...'){
						searchbar.value =''
						searchbar.placeholder = 'search...'
						
					}
				}
				function inactive(){
					var searchbar= document.getElementById('searchbar');
					if(searchbar.value == ''){
						searchbar.value ='search...'
						searchbar.placeholder = ''
						
					}
				}
			</script>
			<style>
				#searchbar{
						border:1px solid #000000;
						border-right:none;
						font-size:16px;
						padding:10px;
						outline:none;
						width:250px;
						-webkit-border-top-left-radius:10px;
						-webkit-border-bottom-left-radius:10px;
						-moz-border-radius-topleft:10px;
						-moz-border-radius-bottomleft:10px;
						border-top-left-radius:10px;
						border-bottom-left-radius:10px;
						
	
					}
				#searchBtn{
						border:1px solid #000000;
						font-size:16px;   
						padding:10px;
						background:#f1d829;
						font-weight:bold;
						cursor:pointer;
						outline:none;
						-webkit-border-top-right-radius:10px;
						-webkit-border-bottom-right-radius:10px;
						-moz-border-radius-topright:10px;
						-moz-border-radius-bottomright:10px;
						border-top-right-radius:10px;
						border-bottom-right-radius:10px;
						
						
						
					}
				#searchBtn:hover{
					background:#f6e049;
				}	
				
			</style>
		
	
	
	</head>
	<body>
		<form action="searchbar.php" method="post"> 
			<input type="text" id="searchbar" placeholder="" value="search..." maxlength="25" autoComplete="off" onMouseDown="active();" onBlur="inactive();"/><input type="submit" id="searchBtn" value="go!"/>
		</form>
		<?php
			$query=mysqli_query("SELECT * FROM staffattendence");
			$num_rows=mysqli_num_rows($query);
			echo $num_rows;
		
		?>
	
	</body>


</html>