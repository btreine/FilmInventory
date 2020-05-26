<html>
<head>
    <title> Adding Film</title>
</head>
<body>
    
    <?php
  
        $title = $_POST['title'];
	    $description = $_POST["description"];
	    $releaseYear = $_POST["release_year"];
	    $languageID = $_POST["language_id"];
	    $rentalDuration = $_POST["rental_duration"];
	    $rentalRate = $_POST["rental_rate"];
	    $length = $_POST["length"];
	    $replacementCost = $_POST["replacement_cost"];
	    $rating = $_POST["rating"];
	    $specialFeatures = $_POST["special_features"];

        $keys = array_keys($_POST);
	   
	
	    $connect = mysqli_connect('localhost', 'root', '', 'sakila');
        if(!$connect) {
	    die("ERROR: Cannot connect to database $db on server $server using user name $user (".  mysqli_connect_errno().
	    ", ".mysqli_connect_error().")");
	}
	    $insert = "INSERT INTO sakila.film (title,description,release_year,language_id,rental_duration,rental_rate,length,replacement_cost,rating,special_features) VALUES ("."'".$title."'".","."'".$description."'".",".$releaseYear.",".$languageID.",".$rentalDuration.",".$rentalRate.",".$length.",".$replacementCost.","."'".$rating."'".","."'".$specialFeatures."'".");";
		
		
	    if ($connect ->query($insert) === TRUE) {
		    echo "New film successfully added";
		} else {
		    echo "Error: " .$insert. "<br>" .$connect->error;
		}
		$connect->close();
    ?>
    <form action = "manager.html">
	<input type = "submit" value = "Back">
	</form>
</body>
</html>