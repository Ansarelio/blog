<?php
include '../inc/connection.php';
include '../inc/login.php';


if (isset($_POST['comment-email'])) {
  $email = getPost('comment-email');
  $name = getPost('comment-username');
  $comment = getPost('comment-comment');
  $status = 0;
  $created_at = time();

  $insertQuery = $DBcon->query("INSERT INTO `comment` (`email`, `username`, `comment`, `status`, `created_at`) VALUES ('$email', '$name', '$comment', '$status', '$created_at')");
  
  if ($insertQuery) {
    exit('Успешно!');
  } else {
    die('Неверный запрос: ' . $DBcon->error);
  }
}

?>