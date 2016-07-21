<?php
	require('Config/database.php');

	$user_id = $_GET['user_id'];
	$post_id = $_GET['post_id'];

	$query="SELECT * FROM `like` WHERE user_id = '$user_id' AND post_id = '$post_id';";

	$result = mysqli_query($conn, $query);

	$rowcount=mysqli_num_rows($result);

	if($rowcount>0){

		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

		echo json_encode($row);

	}else{
		echo "null";
	}
?>
