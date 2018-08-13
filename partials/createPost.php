<?php
include "error.php";
include "database.php";
include "post.php";

$createPost = new Post($pdo);
$createPost->createPost();

