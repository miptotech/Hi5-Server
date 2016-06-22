<?php
	require('Config/database.php');

	$email   = $_GET['email'];
	$name    = $_GET['name'];
	$gender    = $_GET['gender'];
	$birthday    = $_GET['birthday'];

	$query="UPDATE user SET name = '$name', gender = '$gender', birthday = '$birthday' WHERE email = '$email';";

	$result = mysqli_query($conn, $query);

	echo "ok";
?>
