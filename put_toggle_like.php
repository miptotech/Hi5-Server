<?php
	require('Config/database.php');

	$user_id = $_POST['user_id'];
	$post_id = $_POST['post_id'];

	$query="SELECT * FROM `like` WHERE user_id = '$user_id' AND post_id = '$post_id';";
	$result = mysqli_query($conn, $query);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);


	$id = $row['id'];
	$active = $row['active'];

	if($active){
		$query="UPDATE `like` SET active = 0 WHERE id = '$id';";
	}else{
		$query="UPDATE `like` SET active = 1 WHERE id = '$id';";
	}

	$result = mysqli_query($conn, $query);

	if($active){
		echo "-";
	}else{
		echo "+";
	}
?>
