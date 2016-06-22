<?php
	require('Config/database.php');

	$id = $_GET['id'];

	$query="SELECT * FROM post p JOIN user u ON p.user_id = u.id WHERE p.user_id = '$id'";

	$result = mysqli_query($conn, $query);

	$rowcount=mysqli_num_rows($result);

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
?>
