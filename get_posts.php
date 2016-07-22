<?php
	require('Config/database.php');

	$id = $_GET['id'];

	$query="SELECT DISTINCT (id), message, picture, name, upicture, orderdate, created_at, likes, comments, fid, fname, gid, gname
				FROM (
				SELECT p.id, p.message, p.picture, u.name, u.picture as upicture, p.created_at as orderdate, DATE_FORMAT(p.created_at,'%M %d, %Y') as created_at, COUNT(DISTINCT(l.id)) AS likes, COUNT(DISTINCT(c.id)) AS comments, fr.id as fid, fr.name as fname, gr.id as gid, gr.name as gname
				FROM post p
				LEFT JOIN  `like` AS l ON p.id = l.post_id AND active = 1
				LEFT JOIN comment AS c ON p.id = c.post_id
				JOIN user AS u ON p.user_id = u.id
				LEFT JOIN user AS fr ON p.friend_id = fr.id
				LEFT JOIN `group` AS gr ON p.group_id = gr.id
				WHERE p.user_id ='$id'
				GROUP BY p.id
				UNION
				SELECT p2.id, p2.message, p2.picture, u2.name, u2.picture as upicture, p2.created_at as orderdate, DATE_FORMAT(p2.created_at,'%M %d, %Y') as created_at, COUNT(DISTINCT(l2.id)) AS likes, COUNT(DISTINCT(c2.id)) AS comments, fr2.id as fid, fr2.name as fname, gr2.id as gid, gr2.name as gname
				FROM post p2
				LEFT JOIN  `like` AS l2 ON p2.id = l2.post_id AND active = 1
				LEFT JOIN comment AS c2 ON p2.id = c2.post_id
				JOIN user AS u2 ON p2.user_id = u2.id
				JOIN friend AS f2 ON f2.friend_id = u2.id
				LEFT JOIN user AS fr2 ON p2.friend_id = fr2.id
				LEFT JOIN `group` AS gr2 ON p2.group_id = gr2.id
				WHERE f2.user_id ='$id'
				GROUP BY p2.id
				UNION
				SELECT p3.id, p3.message, p3.picture, u3.name, u3.picture as upicture, p3.created_at as orderdate, DATE_FORMAT(p3.created_at,'%M %d, %Y') as created_at, COUNT(DISTINCT(l3.id)) AS likes, COUNT(DISTINCT(c3.id)) AS comments, fr3.id as fid, fr3.name as fname, gr3.id as gid, gr3.name as gname
				FROM post p3
				LEFT JOIN  `like` AS l3 ON p3.id = l3.post_id AND active = 1
				LEFT JOIN comment AS c3 ON p3.id = c3.post_id
				JOIN user AS u3 ON p3.user_id = u3.id
				JOIN group_user AS g3 ON g3.group_id = p3.group_id
				LEFT JOIN user AS fr3 ON p3.friend_id = fr3.id
				LEFT JOIN `group` AS gr3 ON p3.group_id = gr3.id
				WHERE
				g3.user_id ='$id'
				GROUP BY p3.id
				) AS T
				ORDER BY orderdate DESC";

	$result = mysqli_query($conn, $query);

	$rowcount=mysqli_num_rows($result);

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
?>
