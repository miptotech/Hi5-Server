<?php
	// require('Config/database.php');

	// $id         = $_GET['id'];
	// $idFriend   = $_GET['idFriend'];
	// $hi5        = $_GET['hi5_check'];
	// $message    = $_GET['message'];

	// $query="INSERT INTO post (user_id, friend_id, message, hi5) VALUES ('$id','$idFriend','$message','$hi5' );";

	// $result = mysqli_query($conn, $query);

	// echo "ok";

	require('Config/database.php');
	require('Config/globals.php');

	// Vars

	$postdata = file_get_contents("php://input");

	$id         = $_POST['id'];
	$idFriend   = $_POST['idFriend'];
	$hi5        = $_POST['hi5_check'];
	$message    = $_POST['message'];

	$picture = "";

	if($_FILES){
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["file"]["tmp_name"]) . ".jpg";
		move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

		$picture = $url_base . $target_file;
	}

	$query="INSERT INTO post (user_id, friend_id, message, hi5, picture) VALUES ('$id','$idFriend','$message','$hi5','$picture' );";

	$result = mysqli_query($conn, $query);

	echo "ok";
?>
