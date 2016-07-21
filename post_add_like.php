<?php
	require('Config/database.php');

	$user_id = $_POST['user_id'];
	$post_id = $_POST['post_id'];

	$query="INSERT INTO `like` (post_id, user_id, active) VALUES ('$post_id','$user_id',1 );";

	$result = mysqli_query($conn, $query);

	echo "ok";
?>
