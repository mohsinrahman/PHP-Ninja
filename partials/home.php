<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
include 'header.php';
include 'error.php';
include 'database.php';
include 'post.php';  

$username = $_SESSION["username"];

if (!isset($username)) {
	header("location:../index.php");
}

if($_SESSION['isAdmin'] === 1){
	include 'adminNavbar.php';
}
else{
	include 'userNavbar.php';
}
?> 
<main class="container-fluid con">
	<div class="row">
		<div class="col-md-4">
			<?php include "form.php";?>
		</div>
		<div class="col-md-8">
				<?php include "showpostOnHtml.php";?>
		</div>

	</div>
</main>
<?php  include 'footer.php'; ?>