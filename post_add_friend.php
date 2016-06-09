<?php
	require('Config/database.php');

	$id         = $_GET['id'];
	$idFriend   = $_GET['idFriend'];

	$query="INSERT INTO friend (user_id, friend_id) VALUES ('$id','$idFriend');";

	$result = mysqli_query($conn, $query);

	echo "ok";
?>
