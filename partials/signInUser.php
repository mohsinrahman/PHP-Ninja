<?php
include "error.php";
include "database.php";
include "signin.php";

$signIn = new SignIn($pdo);
$signIn->signInUser();


