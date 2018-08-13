<?php
include "error.php";
include "database.php";
include "like.php";

$getLike = new Like($pdo);
$data = $getLike->getLike();

// var_dump($data[0]['postId']);


if ($_SESSION['userId']){

	$id = $_GET['like'];

	if(isset($data[0]['postId']) == $id){

		$deleteLike = new Like($pdo);
		$deleteLike->deleteLike();
		// header('Location: /php-ninjas/partials/home.php');
		echo'<script>window.location="../partials/home.php";</script>';  
	}
	else{

		$likePost = new Like($pdo);
		$likePost->likePost();

		echo'<script>window.location="../partials/home.php";</script>'; 
	}

}


include "footer.php"; ?>



