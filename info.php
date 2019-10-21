<?php
  include "inc/connection.php";
  include "inc/login.php";

  if(isset($_GET['type']) && !empty($_GET['type'])) {
    $type = $_GET['type'];
  }
  if(isset($_GET['message']) && !empty($_GET['message'])) {
    $message = $_GET['message'];
    $message = urldecode($message);
  }
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
      </div>
  <?php
    if(!empty($type) && !empty($message)) {
  ?>

  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div class="alert <?= $type; ?> mt-4" role="alert">
          <?= $message; ?>
        </div>
      </div>
    </div>
  </div>
  <?php
    }
  ?>
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
  <script type="text/javascript" src="js/bootstrap.min.js"></script>s
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
