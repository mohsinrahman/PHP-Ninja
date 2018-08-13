<?php
include "error.php";
include "database.php";
include "post.php";

$editPost = new Post($pdo);
$data = $editPost->editPost();
