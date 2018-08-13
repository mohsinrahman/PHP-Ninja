<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
include "error.php";
include "database.php";


class Comment {
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function createComment(){
		$statement = $this->pdo->prepare("
			INSERT INTO comment (comment, userId, postId)
			VALUES (:comment, :userId, :postId)");

//Execute statement, fetch data
		$statement->execute([

			":comment" => $_POST['comment'],
			":userId" => $_SESSION['userId'],
			":postId" => $_POST['postId'],
			]);

		return $this->getLatestCommentByPostId($_POST['postId']);
		//header('Location: /php-ninjas/partials/home.php');
	} //function end

	public function getLatestCommentByPostId($postId) {
		$statement = $this->pdo->prepare("
			SELECT * FROM comment
			LEFT JOIN user 
			ON comment.userId = user.userId
			WHERE comment.postId = :postId
			ORDER BY comment.commentDate DESC
			LIMIT 1
			");
		$statement->execute([
			":postId" => $postId
			]);
		$comments = $statement->fetchAll(PDO::FETCH_ASSOC);
		return json_encode($comments[0]);
	} //function end


	public function getCommentByPostId($postId) {
		$statement = $this->pdo->prepare("
			SELECT * FROM comment
			LEFT JOIN user 
			ON comment.userId = user.userId
			WHERE comment.postId = :postId
			/*ORDER BY comment.commentDate DESC*/
			");
		$statement->execute([
			":postId" => $postId
			]);
		$comments = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $comments;
	} //function end

	public function deleteCommentByCommentId() {
		if (isset($_GET['del'])) {
			$id = $_GET['del'];
			
			$statement = $this->pdo->prepare("
				DELETE FROM comment
				WHERE commentId = :commentId
				");

			$statement->execute([
				":commentId" => $id
				]);

			return $statement;
		}
		header('Location: /php-ninjas/partials/home.php');
	}

} //End of Class

