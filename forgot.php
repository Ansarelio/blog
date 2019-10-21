<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
  include "inc/navbar.php";
?>
<div class="container">
<?php
  if(!empty($error)){
?>
<div class="row justify-content-center">
  <div class="col-sm-8">
    <div class="alert alert-danger mt-4" role="alert">
      <?php echo $error; ?>
    </div>
  </div>
</div>
<?php
  }
?>
<div class="row justify-content-center">
  <div class="col-sm-8">
    <div class="jumbotron mt-4">
      <h1 class="display-4">Восстановление пароля</h1>
        <hr class="my-4">
          <form method="POST">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-4 col-form-label">Введите email указанный при регистрации</label>
              <div class="col-sm-8">
                <input type="text" name="email" value="" class="form-control" id="inputEmail3" placeholder="Введите email">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Подтвердить</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php
  include "inc/footer.html";
?>


<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
