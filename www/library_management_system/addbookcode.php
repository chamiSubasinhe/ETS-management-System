<?php
include 'static/dbconnection.php';

	$isbn = test_input($_POST['isbn']);
	$title = test_input($_POST['title']);
	$callnumber = test_input($_POST['callnumber']);
	$yearpublished = test_input($_POST['yearpublished']);
	$edition = test_input($_POST['edition']);
	$pages = test_input($_POST['pages']);
	$author = test_input($_POST['author']);
	$description = test_input($_POST['description']);
	
	$isbnERROR = "Invalid ISBN";
	$authorERROR = "Author name should only be letters";

	
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
	$sql_find_book = "SELECT isbn FROM book WHERE isbn = '$isbn'";	
	$result = mysqli_query($conn, $sql_find_book);
	

	if(!preg_match('/^[0-9]{13}$/',$isbn)){
		echo "<script type='text/javascript'>alert('$isbnERROR');
			window.location.href = 'libraryaddbookform.php';
		</script>";
	}
	
	else if(!preg_match('/^[a-zA-Z]+/',$author)){
		echo "<script type='text/javascript'>alert('$authorERROR');
			window.location.href = 'libraryaddbookform.php';
		</script>";
	}
	

	else if(mysqli_num_rows($result) > 0){
		echo "<script type='text/javascript'>alert('Book already exists in database');
								window.location.href = 'libraryaddbookform.php';
							</script>";
	}
	
	else{
		
		$sql_book = "INSERT INTO book(isbn,title,edition,yearPublished,pages,description,callNumber,author) VALUES('$isbn','$title','$edition','$yearpublished','$pages','$description', '$callnumber', '$author')";
		$sql_copy = "INSERT INTO copy(isbn) VALUES ('$isbn');"; 
		$sql_author = "INSERT INTO author(isbn,name) VALUES ('$isbn','$author');"; 

				if (mysqli_query($conn, $sql_book)) {
					if (mysqli_query($conn, $sql_copy)) {
						if (mysqli_query($conn, $sql_author)) {
							echo "<script type='text/javascript'>alert('Book added successfully');
								window.location.href = 'librarybooksmain.php';
							</script>";
						}
						else{
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}
					}
					else{
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
				}
				else{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				mysqli_close($conn);
		}

	?>
