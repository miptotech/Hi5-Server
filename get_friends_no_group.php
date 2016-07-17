<?php
	require('Config/database.php');

	$group_id = $_GET['group_id'];
	$user_id  = $_GET['user_id'];

	$query="SELECT u.* FROM `user` u WHERE u.id IN (SELECT friend_id FROM  `friend` WHERE user_id='$user_id') AND u.id NOT IN (SELECT user_id FROM `group_user` WHERE group_id = '$group_id')";

	$result = mysqli_query($conn, $query);

	$rowcount=mysqli_num_rows($result);

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
?>
