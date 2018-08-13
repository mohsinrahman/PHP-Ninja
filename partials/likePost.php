<?php
include "error.php";
include "database.php";
include "post.php";

$likePost = new Like($pdo);
$likePost->likePost();
