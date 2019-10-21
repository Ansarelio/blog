<?php
include '../inc/connection.php';
include '../inc/login.php';

if (!$loggedIn) {
	header('location: login.php');
}


$query = $DBcon->query("SELECT * FROM `users`");
$users = $query->fetch_all(MYSQLI_ASSOC);

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
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>