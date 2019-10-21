<?php
include '../inc/connection.php';
include '../inc/login.php';

if ($loggedIn) {
	header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Блог</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	
	<div class="wrap">
		<div class="container mt-4 mb-4">
			<div class="row">
				<div class="col-sm-12">
					<div class="card admin-login-form">
					  <h5 class="card-header">Авторизуйтесь</h5>
					  <div class="card-body">
					    <form action="login.php" method="POST">
						  <div class="form-group">
						    <label for="email">Email address</label>
						    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
						  </div>
						  <div class="form-group">
						    <label for="password">Password</label>
						    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
						  </div>
						  <button type="submit" class="btn btn-primary">Submit</button>
						</form>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>