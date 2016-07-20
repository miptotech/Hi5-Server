<?php
	require('Config/database.php');

	$id         = $_GET['id'];
	$group_id   = $_GET['group_id'];
	$hi5        = $_GET['hi5_check'];
	$message    = $_GET['message'];

	$query="INSERT INTO post (group_id, friend_id, message, hi5) VALUES ('$id','$group_id','$message','$hi5' );";

	$result = mysqli_query($conn, $query);

	echo "ok";
?>
