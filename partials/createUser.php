<?php
include "error.php";
include "database.php";
include "register.php";

$createUser = new Register($pdo);
$createUser->createUser();



