<?php
include "error.php";
include "database.php";
include "post.php";

$savePost = new Post($pdo);
$savePost->savePost();
