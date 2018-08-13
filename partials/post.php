<?php
if (session_status() == PHP_SESSION_NONE) {
	 session_start();

}
include "error.php";
include "database.php";

class Post{

	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function createPost(){

		$statement = $this->pdo->prepare("
			INSERT INTO post (title, img, blogText, userId)
			VALUES (:title, :img, :blogText, :userId)");

//Execute statement, fetch data
		$statement->execute([
			":title" => $_POST['title'],
			":img" => $_POST['img'],
			":blogText" => $_POST['blogText'],
			":userId"=> $_SESSION['userId']
			]);

		header('Location: /php-ninjas/partials/home.php'); // CHANGE TO FETCH
	} //function end



	public function showPost(){

		$statement = $this->pdo->prepare("SELECT * FROM post
			INNER JOIN user 
			ON post.userId = user.userId
			ORDER BY postDate DESC
			");
		$statement->execute();

		$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		return $posts;

	} //showPost end

	public function latestPost(){

		$statement = $this->pdo->prepare("SELECT * FROM post
			INNER JOIN user 
			ON post.userId = user.userId
			ORDER BY postDate DESC
			LIMIT 3 
			");
		$statement->execute();

		$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

		return $posts;
	} 

	public function editPost(){

		if(isset($_GET['edit'])){

		$id = $_GET['edit']; //get the post with the edit-id
		$statement = $this->pdo->prepare("SELECT * FROM post WHERE $id = id"); 

		$statement->execute();

		$editPost = $statement->fetch(PDO::FETCH_ASSOC);

		return $editPost; 
	}
} 

public function savePost(){
			// var_dump($_POST['edit']);
	if(isset($_POST['id'])){

		$id = $_POST['id'];
		 //get the post with the right edit-id

		$statement = $this->pdo->prepare("
			UPDATE post 
			SET title = :title, img = :img, blogText = :blogText 
			WHERE id = :id
			");

		$statement->execute([
			":title" => $_POST['title'],
			":img" => $_POST['img'],
			":blogText" => $_POST['blogText'],
			":id" => $id

			]);

			// return $statement;
	}
	header('Location: /php-ninjas/partials/home.php');  

}  
  

public function deletePost(){
  //var_dump($_POST['delbtn']);
  
  if(isset($_POST['delbtn'])){
        
    $id = $_POST['delbtn'];


     //var_dump($id);
     //get the post with the right edit-id
         var_dump($this->pdo);
    $statement = $this->pdo->prepare("
      DELETE FROM post 
      WHERE id = :id
      ");

    $statement->execute([
      ":id" => $id
      ]);

    return $id;
  }
  //header('Location: /php-ninjas/partials/home.php');


}  

}// class end