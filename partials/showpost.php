<?php
include "error.php";
//include "database.php";

$statement = $pdo->prepare("SELECT * FROM post
	INNER JOIN users 
	ON post.id = users.userId
	");
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $row) {
	$title = $row['title'];
	$img = $row['img'];
	$blogText = $row['blogText'];
	$nrOfLikes = $row['nrOfLikes'];
	$postDate = $row['postDate'];
	$username = $row['username'];
	/*echo "<tr> <td>$title</td> <td>$img</td> <td>$blogText</td> <td>$nrOfLikes</td> <td>$postDate</td></tr>";*/
	echo
	"
	<div class='col-lg-12 col-md-12 col-sm-12'>
		<div class='show card'>

			<div class='card-block'>
				<h4 class='card-title'>$title</h4>
				<h5 class='card-subtitle text-muted'><img class='img-fluid' src='$img'></h5>
				<p class='card-text' style='font-style: italic;'> $blogText </p>
				<h5 class='card-subtitle text-muted'>Date Made and Likes</h5>
				<hr class='muted'>
				$username
				$postDate
				

			</div>
		</div>
	</div>
	";
}




?>