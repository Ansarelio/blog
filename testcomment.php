<?php
include 'inc/connection.php';
include 'inc/login.php';

if (isset($_POST['comment-email'])) {
  $email = getPost('comment-email');
  $name = getPost('comment-username');
  $comment = getPost('comment-comment');
  $status = 0;
  $created_at = time();

  $insertQuery = $DBcon->query("INSERT INTO `comment` (`email`, `username`, `comment`, `status`, `created_at`) VALUES ('$email', '$name', '$comment', '$status', '$created_at')");
  
  if ($insertQuery) {
    header('location: post.php?status=success');
  } else {
    die('Неверный запрос: ' . $DBcon->error);
  }
}

$num = 5; 
// Извлекаем из URL текущую страницу 
$page = $_GET['page']; 
// Определяем общее число сообщений в базе данных 
$result = $DBcon->query("SELECT COUNT(*) FROM `comment`"); 
$posts = fetch_all($result); 
// Находим общее число страниц 
$total = intval(($posts - 1) / $num) + 1; 
// Определяем начало сообщений для текущей страницы 
$page = intval($page); 
// Если значение $page меньше единицы или отрицательно 
// переходим на первую страницу 
// А если слишком большое, то переходим на последнюю 
if(empty($page) or $page < 0) $page = 1; 
  if($page > $total) $page = $total; 
// Вычисляем начиная к какого номера 
// следует выводить сообщения 
$start = $page * $num - $num; 
// Выбираем $num сообщений начиная с номера $start 
$result = mysql_query("SELECT * FROM `comment` LIMIT $start, $num"); 
// В цикле переносим результаты запроса в массив $postrow 
while ( $comment[] = mysql_fetch_array($result))

// $query = $DBcon->query("SELECT * FROM `comment`");
// $comments = $query->fetch_all(MYSQLI_ASSOC);

// var_dump($comments);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Блог</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="wrap">
  <?php
    include "inc/navbar.php";
  ?>

  <div class="container">
    <div class="row">
      <div class="col-sm-12">
       <div class="media border mt-4 mb-4">
        <img src="img/demvy.png" alt="Generic placeholder image">
          <div class="media-body mr-1">
            <h5 class="mt-1">Я пришел на занятие</h5>
            <p>Сегодня суббота, 17.03.2018 и Я сижу на занятии по WEB-программированию. Как и всегда, в первую очередь наш преподаватель Султан, проверяет домашнее задание и видит, что домашнее задание выполнено, ведь этот пост и был домашним заданием.</p>
            <div class="row">
              <div class="col-sm-12">
                <div class="island-com border">
                <h2>Comments</h2>
                <?php
                  foreach ($comments as $comment) {
                ?>
                <div class="pl-2 comment mb-2 row">
                <div class="comment-avatar col-md-1 col-sm-2 text-center pr-1">
                    <a href=""><img class="mx-auto rounded-circle img-fluid" src="https://pbs.twimg.com/profile_images/687218472032546816/Zl0jUAbf_400x400.jpg" alt="avatar"></a>
                </div>
                <div class="comment-content col-md-11 col-sm-10">
                    <h6 class="small comment-meta">
                      <span><?php echo $comment['username']?></span> <?php echo date('d-m-y H:i', $comment['created_at'])?></h6>
                    <div class="comment-body">
                        <p>
                            <?php echo $comment['comment'] ?>
                            <br>
                            <a href="" class="text-right small"><i class="ion-reply"></i> Reply</a>
                        </p>
                    </div>
                </div>
              </div>
                <?php
                  }
                ?>
                <ul class="pagination">
                  <li class="page-item">
                    <span class="page-link">Previous</span>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item">
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <form method="POST">
                  <div class="form-group mt-2">
                    <h4>Введите Ваш комментарий</h4>
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="comment-email" class="form-control" id="email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input type="text" name="comment-username" class="form-control" id="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" name="comment-comment" id="comment"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?php
  include "inc/footer.html";
?>
</div>



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
