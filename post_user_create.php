<?php
	require('Config/database.php');

	$email   = $_GET['email'];
	$name    = $_GET['name'];
	$picture = $_GET['picture'];

	$query="INSERT INTO user (email, name, picture) VALUES ('$email', '$name', '$picture');";

	$result = mysqli_query($conn, $query);

	echo "ok";
?>
