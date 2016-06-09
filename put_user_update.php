<?php
	require('Config/database.php');

	$email   = $_GET['email'];
	$name    = $_GET['name'];

	$query="UPDATE user SET name = '$name' WHERE email = '$email';";

	$result = mysqli_query($conn, $query);

	echo "ok";
?>
