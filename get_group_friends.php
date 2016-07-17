<?php
	require('Config/database.php');

	$id = $_GET['id'];

	$query="SELECT u.* FROM `group` AS g INNER JOIN `group_user` AS gu ON g.id = gu.group_id INNER JOIN `user` AS u ON gu.user_id = u.id WHERE g.id = '$id'";

	$result = mysqli_query($conn, $query);

	$rowcount=mysqli_num_rows($result);

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
?>
