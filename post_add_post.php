<?php
	require('Config/database.php');

	$id         = $_GET['id'];
	$idFriend   = $_GET['idFriend'];
	$hi5        = $_GET['hi5_check'];
	$message    = $_GET['message'];

	$query="INSERT INTO post (user_id, friend_id, message, hi5) VALUES ('$id','$idFriend','$message','$hi5' );";

	$result = mysqli_query($conn, $query);

	echo "ok";
?>
