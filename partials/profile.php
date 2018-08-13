<?php 
session_start();
require '../config/config.php';
include "error.php";
include "database.php";
include "profile-header-view.php";
include "profile-post-view.php";
include "footer.php";

class Profile{

	private $pdo;
  	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function profileAllPosts($id){

		$statement = $this->pdo->prepare("SELECT * FROM post
			WHERE userId = $id
			");
		$statement->execute();

		$allPosts = $statement->fetchAll(PDO::FETCH_ASSOC);

         return $allPosts;
		
	} //showPost end



} // class end
