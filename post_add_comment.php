<?php
	require('Config/database.php');

	$post_id   = $_GET['post_id'];
	$user_id   = $_GET['user_id'];
	$text      = $_GET['message'];

	$query="INSERT INTO comment (post_id, user_id, text) VALUES ('$post_id','$user_id','$text' );";

	$result = mysqli_query($conn, $query);

	echo "ok";
?>
