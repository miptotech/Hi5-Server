<?php
	require('Config/database.php');
	require('Config/globals.php');

	// // Vars
	$user_id     = $_POST['user_id'];
	$name        = $_POST['name'];
	$description = $_POST['description'];

	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["file"]["tmp_name"]) . ".jpg";
	move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

	$picture = $url_base . $target_file;

	$query="INSERT INTO `group` (user_id,name,description,picture) VALUES ('$user_id','$name','$description','$picture');"; //realizar query
	$result = mysqli_query($conn, $query);

	$group_id = mysqli_insert_id($conn);

	$query="INSERT INTO `group_user` (user_id,group_id) VALUES ('$user_id','$group_id');"; //realizar query
	$result = mysqli_query($conn, $query);

	echo "ok";

?>
