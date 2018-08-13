<?php
include "error.php";
include "database.php";
include "comment.php";

$createPost = new Comment($pdo);
$createdPost= $createPost->createComment();
echo $createdPost;
//header('Location: /php-ninjas/partials/home.php');