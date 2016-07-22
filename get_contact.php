<?php
	require('Config/database.php');

	$search = strtolower($_GET['search']);
	$id = $_GET['id'];

	$query="SELECT u.* FROM user u WHERE u.id <> '$id' AND (LOWER(u.name) LIKE '%$search%' OR LOWER(u.email) LIKE '%$search%') AND NOT EXISTS (SELECT f.id FROM friend f WHERE f.friend_id = u.id AND f.user_id = '$id')";

	$result = mysqli_query($conn, $query);

	$rowcount=mysqli_num_rows($result);

	//$myArray = array();

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
?>
