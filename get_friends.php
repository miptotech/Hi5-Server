<?php
	require('Config/database.php');

	$id = $_GET['id'];

	$query="SELECT * FROM user u JOIN friend f ON f.friend_id = u.id WHERE f.user_id = '$id'";

	$result = mysqli_query($conn, $query);

	$rowcount=mysqli_num_rows($result);

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
?>
