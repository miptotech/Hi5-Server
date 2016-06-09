<?php
	require('Config/database.php');

	$search = $_GET['search'];
	$email = $_GET['email'];

	$query="SELECT * FROM user WHERE email <> '$email' AND (name LIKE '%$search%' OR email LIKE '%$search%')";

	$result = mysqli_query($conn, $query);

	$rowcount=mysqli_num_rows($result);

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
?>
