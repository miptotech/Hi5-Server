<?php
	require('Config/database.php');

	$group_id = $_GET['group_id'];

	$query="SELECT p.id, g.name as gname, p.message, p.picture, u.name, u.picture as upicture, p.created_at as orderdate, DATE_FORMAT(p.created_at,'%M %d, %Y') as created_at, COUNT(DISTINCT(l.id)) AS likes, COUNT(DISTINCT(c.id)) AS comments
			FROM post p
			LEFT JOIN  `like` AS l ON p.id = l.post_id AND active = 1
			LEFT JOIN comment AS c ON p.id = c.post_id
			JOIN user AS u ON p.user_id = u.id
			JOIN `group` g ON p.group_id = g.id
			WHERE p.group_id = '$group_id'
			GROUP BY p.id
			ORDER BY orderdate DESC
			";

	$result = mysqli_query($conn, $query);

	$rowcount=mysqli_num_rows($result);

	//$myArray = array();

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
?>
