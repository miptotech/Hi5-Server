<?php
	require('Config/database.php');

	$group_id    = $_GET['group_id'];
	$friend_id   = $_GET['friend_id'];

	$query="INSERT INTO `group_user` (user_id, group_id) VALUES ('$friend_id','$group_id');";

	$result = mysqli_query($conn, $query);

	echo "ok";
?>
