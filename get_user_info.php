<?php
	require('Config/database.php');

	$email = $_GET['email'];

	$query="SELECT user.id, user.picture, user.name, user.email, user.gender, DATE_FORMAT(user.birthday,'%M %d, %Y') as birthday FROM user WHERE email = '$email'";

	$result = mysqli_query($conn, $query);

	$rowcount=mysqli_num_rows($result);

	if($rowcount>0){

		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

		echo json_encode($row);

	}
?>
