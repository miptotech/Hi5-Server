<?php
	require('Config/database.php');

	// Vars
	$user_id     = $_POST['user_id'];
	$name        = $_POST['name'];
	$description = $_POST['description'];

	$query="INSERT INTO `group` (user_id,name,description) VALUES ('$user_id','$name','$description');"; //realizar query
	$result = mysqli_query($conn, $query);

	$group_id = mysqli_insert_id($conn);

	$query="INSERT INTO `group_user` (user_id,group_id) VALUES ('$user_id','$group_id');"; //realizar query
	$result = mysqli_query($conn, $query);

	echo "ok";
?>
