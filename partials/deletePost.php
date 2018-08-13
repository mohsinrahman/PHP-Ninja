<?php
include "error.php";
include "database.php";
include "post.php";


$deletePost = new Post($pdo);
$id = $deletePost->deletePost();
echo $id;

//header('Location: /php-ninjas/partials/home.php');