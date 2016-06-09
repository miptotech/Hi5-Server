<?php
	require('Config/database.php');

	$email = $_GET['email'];

	$query="SELECT * FROM user WHERE email = '$email'";

	$result = mysqli_query($conn, $query);

	$num_result = mysqli_num_rows($result);

	echo json_encode($num_result);

?>
