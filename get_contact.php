<?php
	require('Config/database.php');

	$search = $_GET['search'];
	$id = $_GET['id'];

	$query="SELECT * FROM user WHERE id <> '$id' AND (name LIKE '%$search%' OR email LIKE '%$search%')";

	$result = mysqli_query($conn, $query);

	$rowcount=mysqli_num_rows($result);

	//$myArray = array();

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
?>
