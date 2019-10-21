<?php
include "inc/connection.php";

$username = $email = $phone = $password = $confirmPassword = $rules = $checked = '';

$error = '';

if (isset($_POST['username']))
{
  $username = getPost('username');
  $email = getPost('email');
  $phone = getPost('phone');
  $password = getPost('password');
  $confirmPassword = getPost ('confirmPassword');
  $rules = getPost ('rules');

  $error = validation($username, $email, $phone, $password, $confirmPassword, $rules);
  $error .= confPass($password, $confirmPassword);

  if (empty($error)){
    $password = password_hash($password, PASSWORD_DEFAULT);
    $status = 0;
    $time = time();
    $insertQuery = $DBcon->query("INSERT INTO `users` VALUES (NULL, '$email', '$username', '$phone', '$password', 'status', '$time')");
  
    if ($insertQuery){
      // echo "Успешно сохранено!";
        $message = "Регистрация прошла успешно!";
        $message = urlencode($message);
      header('location: info.php?type=alert-success&message=' . $message);
    } else {
      die('Неверный запрос: ' . $DBcon->error);
    }
  }
}



 function confPass($password, $confirmPassword){
    if($password !== ($confirmPassword)){
      return "Пароли не совпдают";
    } 
  }

  function validation($username, $email, $phone, $password, $confirmPassword, $rules){
    $error = '';
    if (is_null($username)){
       $error .= 'Поле имя пользователя не может быть пустым <br />';
    } elseif (strlen($username) < 3) {
       $error .= 'Имя не может быть короче трех символов <br />';
    }
    if (is_null($email)){
       $error .= 'Поле email не может быть пустым <br />';
    } 
    if (is_null($phone)){
      $error .= 'Поле телефон не может быть пустым <br />';
    }
    if (is_null($password)){
      $error .= 'Поле пароль не может быть пустым <br />';
    } elseif (strlen($password) < 6) {
      $error .= 'Пароль не может быть короче 6 символов';
    }
    if (is_null($confirmPassword)){
      $error .= 'Повторите пароль <br />';
    }
    if (is_null($rules)){
      $error .= 'Ознакомьтесь с правилами блога <br />';
    } else {
      $checked = 'checked';
    }
    return $error;
  }
  function getPost($post){
  if (isset($_POST[$post]) && !empty($_POST[$post])){
    $string = checkInputs($_POST[$post]);
    return $string;
  } else {
    return NULL;
  }
}

function checkInputs($string){
  $string = stripslashes($string);
  $string = htmlspecialchars($string);
  $string = trim($string);
  return $string;
}





// 
// if (($password) != ($confirmPassword)){
//   $error .= 'Пароли не совпдают <br />';
// }
// if (is_null($username)){
//   $error .= 'Поле имя пользователя не может быть пустым <br />';
// }
// if (is_null($email)){
//   $error .= 'Поле email не может быть пустым <br />';
// }
// if (is_null($phone)){
//   $error .= 'Поле телефон не может быть пустым <br />';
// }
// if (is_null($password)){
//   $error .= '';
// }
// if (is_null($confirmPassword)){
//   $error .= '';
// }





?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="wrap">
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
        <h1 class="display-4">Регистрация</h1>
          <hr class="my-4">
            <form method="POST">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Имя пользователя</label>
                <div class="col-sm-10">
                  <input type="text" name="username" id="username" value="<?= $username;?>" class="form-control" placeholder="Имя пользователя">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" name="email" value="<?= $email;?>" class="form-control" id="email" placeholder="Email">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Телефон</label>
                <div class="col-sm-10">
                  <input type="phone" name="phone" value="<?= $phone;?>" class="form-control" id="phone" placeholder="Телефон">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Пароль</label>
                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Пароль">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Повторите пароль</label>
                <div class="col-sm-10">
                  <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Повторите пароль">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-10">
                  <div class="form-check">
                    <input name="rules" class="form-check-input" type="checkbox" id="rules" <?= $checked;?>>
                    <label class="form-check-label" for="gridCheck1">
                      Я согласен(на) с <a href="#">правилами</a> использования блога.
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-10">
                  <button  id="reg-button" type="submit" class="btn btn-primary">Зарегестрироваться</button>
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
</div>

<script  src="https://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</html>
