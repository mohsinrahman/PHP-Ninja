<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
include "error.php";
include "database.php";

class Like{

	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getAllLikes() {

		$statement = $this->pdo->prepare("
               SELECT * FROM likes
			");
         $statement->execute();
         return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public function likePost(){

		if(isset($_GET['like'])){

			$id = $_GET['like'];

			$statement = $this->pdo->prepare("
				INSERT INTO likes (userId, postId) 
				VALUES (:userId, :postId)	 
				");

			$statement->execute([
				":userId" => $_SESSION['userId'],
				":postId" => $id
				]);

			return $statement;
		}
		header('Location: /php-ninjas/partials/home.php');  

	} 

	public function getLike(){

		if(isset($_GET['like'])){

			$id = $_GET['like'];

			$statement = $this->pdo->prepare("
				SELECT * FROM likes 
				WHERE userId = :userId AND postId = :id	
				");

			$statement->execute([
				":userId" => $_SESSION['userId'],
				":id" => $id
				]);

			$getLike = $statement->fetchAll(PDO::FETCH_ASSOC);

			return $getLike; 
		}
		header('Location: /php-ninjas/partials/home.php');  

	} 
	public function deleteLike(){
			// var_dump($_POST['edit']);
		if(isset($_GET['like'])){

			$id = $_GET['like'];
		// var_dump($id);
		 //get the post with the right edit-id

			$statement = $this->pdo->prepare("
				DELETE FROM likes 
				WHERE userId = :userId AND postId = :id	
				");

			$statement->execute([
				":userId" => $_SESSION['userId'],
				":id" => $id
				]);

			return $statement;
		}
		header('Location: /php-ninjas/partials/home.php');  

	} 

// public function countLikesOnPostId(){

// 	if(isset($_GET['like'])){


// 	$id = $_GET['like'];

// 	$statement = $this->pdo->prepare("
// 		SELECT COUNT(postId) FROM likes 
// 		WHERE postId = :id		 
// 		");

// 	$statement->execute([
// 		":id" => $id
// 		]);

// 	return $statement;
//  } 

// }
	// public function showLikeOnPost(){

// 		$statement = $this->pdo->prepare("SELECT * FROM post
// 			INNER JOIN user 
// 			ON post.userId = user.userId

// 			");
// 		$statement->execute();

// 		$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

// 		return $posts;

// 	} //showPost end

// public function countLikesOnPostId(){

// 	if(isset($_GET['like'])){


// 	$id = $_GET['like'];

// 	$statement = $this->pdo->prepare("
// 		SELECT COUNT(postId) FROM likes 
// 		WHERE postId = :id		 
// 		");

// 	$statement->execute([
// 		":id" => $id
// 		]);

// 	return $statement;
//  } 

// }
}//class-end 