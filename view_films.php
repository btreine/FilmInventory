<html>
<head>
    <title> Film Inventory</title>
</head>
<body>
    <center> <h1> Inventory </center></h1>
	<form action = "manager.html">
	<input type = "submit" value = "Back">
	</form>
<?php
    $connect = mysqli_connect('localhost', 'root', '', 'sakila');
    if(!$connect) {
	die("ERROR: Cannot connect to database $db on server $server using user name $user (".mysqli_connect_errno().
	", ".mysqli_connect_error().")");
	}
	$aQuery = "select title, description, rating, rental_rate, length, rental_duration, category.name as catagory, film.film_id from film left join film_category
	on film.film_id = film_category.film_id 
	left join category
	on film_category.category_id = category.category_id;";
	$result = mysqli_query($connect, $aQuery);
	print("<table border = 1>");
	print("<tr><td><h2>Title</td><td><h2>Descrption</td><td><h1>Rating</td><td><h2>Rental Duration</td><td><h2>Rental Rate</td><td><h2>Length</td><td><h2>Catagory</td><td><h2><h2>Actors</td>");
    while( $row = mysqli_fetch_assoc($result)) {
	    
		$actorQuery = "select actor.first_name, actor.last_name from actor right join film_actor
	on actor.actor_id = film_actor.actor_id where (film_id =".$row["film_id"].")";
	    $actorsResult = mysqli_query($connect, $actorQuery);
		$numActors = mysqli_num_rows($actorsResult);
	    print("<tr>");
		print("<td>".$row["title"]."</td><td>".$row["description"]."</td><td>".$row["rating"]."</td><td>".$row["rental_duration"]." Days</td><td>$".$row["rental_rate"]."</td><td>".$row["length"]." minutes</td><td>".$row["catagory"]."</td><td>");
		while ( $actorRow = mysqli_fetch_assoc($actorsResult)) {
		    print ($actorRow["first_name"]." ".$actorRow["last_name"].",");
		}
	    print("</td>");
	}
	print("</table>");
	
	
	
	
	mysqli_close($connect);
?>
    <form action = "manager.html">
	<input type = "submit" value = "Back">
	</form>

</body>
</html>