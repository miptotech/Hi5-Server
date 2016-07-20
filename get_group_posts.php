<?php
	require('Config/database.php');

	$group_id = $_GET['group_id'];

	$query="SELECT p.*, g.name as name FROM post p JOIN `group` g ON p.group_id = g.id WHERE p.group_id = '$group_id'";

	$result = mysqli_query($conn, $query);

	$rowcount=mysqli_num_rows($result);

	//$myArray = array();

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
?>
