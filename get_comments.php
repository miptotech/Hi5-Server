<?php
	require('Config/database.php');

	$post_id = $_GET['post_id'];

	$query="SELECT c.*, u.name as name, u.picture as picture FROM comment c JOIN user u ON c.user_id = u.id  WHERE c.post_id = '$post_id' ORDER BY c.created_at ASC";

	$result = mysqli_query($conn, $query);

	$rowcount=mysqli_num_rows($result);

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
?>
