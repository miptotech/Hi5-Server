<?php
	// require('Config/database.php');

	// $email   = $_GET['email'];
	// $name    = $_GET['name'];
	// $gender    = $_GET['gender'];
	// $birthday    = $_GET['birthday'];

	// $query="UPDATE user SET name = '$name', gender = '$gender', birthday = '$birthday' WHERE email = '$email';";

	// $result = mysqli_query($conn, $query);

	// echo "ok";

	require('Config/database.php');
	require('Config/globals.php');

	// Vars
	$id       = $_POST['id'];
	$name     = $_POST['name'];
	$gender   = $_POST['gender'];
	$birthday = $_POST['birthday'];

	if($_FILES){
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["file"]["tmp_name"]) . ".jpg";
		move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

		$picture = $url_base . $target_file;
	}

	$query="UPDATE user SET name = '$name', gender = '$gender', birthday = '$birthday'";

	if(isset($picture)){
		$query .= ", picture = '$picture'";
	}
	$query .= "WHERE id = '$id';";

	$result = mysqli_query($conn, $query);

	echo "ok";
?>
