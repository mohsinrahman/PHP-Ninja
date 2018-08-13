<?php
include 'error.php';
include 'database.php';
include 'comment.php';

$deleteComment = new Comment($pdo);
$delComms = $deleteComment->deleteCommentByCommentId();

header('Location: /php-ninjas/partials/home.php');