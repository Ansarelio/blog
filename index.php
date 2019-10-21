<?php
include 'inc/connection.php';
include 'inc/login.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Блог</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="wrap">
	<?php
	  include "inc/navbar.php";
	?>
	<div class="container">
	  <div class="row">
	    <div class="col-sm-8">
	      <h1 class="mt-4">Blog</h1>
	      <h6>by Anuarbekov Ansar</h6>
	        <div id="carouselExampleIndicators" class="carousel slide mb-4" data-ride="carousel">
	          <ol class="carousel-indicators">
	            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	          </ol>
	          <div class="carousel-inner">
	            <div class="carousel-item active">
	              <img id="first-img" class="d-block w-100" src="img/space.jpg" alt="First slide">
	            </div>
	            <div class="carousel-item">
	              <img class="d-block w-100" src="img/space2.jpg" alt="Second slide">
	            </div>
	            <div class="carousel-item">
	              <img class="d-block w-100" src="img/space3.jpg" alt="Third slide">
	            </div>
	          </div>
	          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	            <span class="sr-only">Previous</span>
	          </a>
	          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	            <span class="carousel-control-next-icon" aria-hidden="true"></span>
	            <span class="sr-only">Next</span>
	          </a>
	        </div>
	      </div>
	    <div class="col-sm-4">
	      <div class="card mt-4">
	        <div class="card-body">
	        	<?php
		  			if($loggedIn) {
			  	?>
						<span>Здравствуйте, <?= $_SESSION['username']; ?></span>
						<hr>
						<form action="index.php" method="POST">
							<input type="hidden" name="logout">
							<button class="btn btn-info" type="submit">Выйти</button>
						</form>
			  	<?php
			  		} else {
			  	?>
			  			<h2>Авторизация</h2>
						<form action="index.php" method="POST">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Email адрес</label>
						    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="email адрес">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Пароль</label>
						    <input name="password" type="password" class="form-control" id="password" placeholder="Пароль">
						  </div>
						  <button id="login-button" type="submit" class="btn btn-primary">Войти</button>
						</form>
						<hr />
					    <a href="reg.php" class="card-link">Регистрация</a>
					    <a href="forgot.php" class="card-link">Забыли пароль?</a>

			  	<?php
			  		}
			  	?>
	        </div>
	      </div>
	      <div class="card mt-4 mb-4">
	        <div class="card-body">
	          <a href="#" id="last-posts-button">Последние посты</a>
	            <ul id="last-posts-ul" class="list-group list-group-flush">
	              <li class="list-group-item"><a href="#">1 post</a></li>
	              <li class="list-group-item"><a href="#">2 post</a></li>
	              <li class="list-group-item"><a href="#">3 post</a></li>
	            </ul>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>


<?php
  include "inc/footer.html";
?>
</div>

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
