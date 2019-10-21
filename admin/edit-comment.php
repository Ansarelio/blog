<?php
include '../inc/connection.php';
include '../inc/login.php';

if (!$loggedIn) {
	header('location: login.php');
}
$id = $_GET['id'];
$query = $DBcon->query("SELECT * FROM `comment` WHERE `id` = $id");
$comment = $query->fetch_assoc();

if (!empty($_POST['email'])) {
	$edemail=$_POST['email'];
	$edcomment=$_POST['comment'];
	$edusername=$_POST['username'];
	$editCom = $DBcon->query("UPDATE `comment` SET `username`='$edusername', `email`='$edemail',`comment`='$edcomment' WHERE `id`='$id'");
	if ($editCom){
			header('location: comments.php');
		}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit comment</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div class="wrap">
  <div class="row justify-content-center">
    <div class="col-sm-8">
      <div class="jumbotron mt-4">
        <h1 class="display-4">Edit comment</h1>
          <hr class="my-4">
            <form method="POST">
              <div class="form-group mt-2">
	              <h4>Редактирование</h4>
	              <label for="exampleInputEmail1">Email</label>
	              <input type="email" name="email" class="form-control" value="<?= $comment['email'];?>" id="email" placeholder="Enter email">
	            </div>
	            <div class="form-group">
	              <label for="exampleInputPassword1">Username</label>
	              <input type="text" name="username" class="form-control" id="username" value="<?= $comment['username'];?>" placeholder="Username">
	            </div>
	            <div class="form-group">
	              <label for="comment">Comment:</label>
	              <textarea class="form-control" rows="5" name="comment"  id="comment"><?= $comment['comment'];?></textarea>
	            </div>
	            <button type="submit" id="com-btn" class="btn btn-primary mb-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  

</div>

<script  src="https://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</html>
