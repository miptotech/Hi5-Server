<?php
	require('Config/database.php');

	$id = $_GET['id'];

	$query="SELECT u.* FROM `group` AS g INNER JOIN `user` AS u ON g.user_id = u.id WHERE g.id = '$id'";

	$result = mysqli_query($conn, $query);

	$rowcount=mysqli_num_rows($result);

	if($rowcount>0){

		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

		echo json_encode($row);

	}
?>
