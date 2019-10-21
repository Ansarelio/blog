<?php
include '../inc/connection.php';
include '../inc/login.php';

if (!$loggedIn) {
	header('location: login.php');
}

$id = $_GET['id'];
$query = $DBcon->query("SELECT * FROM `comment` WHERE `id` = $id");
$comment = $query->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
	<title>Добро пожаловать на мой блог</title>
</head>
<body>
	
	<div class="wrap">
	<?php
	  include "../inc/admin-navbar.php";
	?>
		<div class="container mt-4 mb-4">
			<div class="row">
				<div class="col-sm-3">
					<?php
						include "../inc/admin-sidebar.php";
					?>
				</div>
				<div class="col-sm-9">
					<div class="jumbotron">
						<h5>Name: <?= $comment['username']?></h5>
						<h6>Email: <?= $comment['email']?></h6>
						<h6>Date: <?=date('d-m-y H:i', $comment['created_at'])?></h6>
					  	<p>Comment: <?= $comment['comment']?></p>
					    <a class="btn btn-primary btn-lg" href="comments.php" role="button">Назад</a>
					  </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
