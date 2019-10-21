<?php
include 'inc/connection.php';
include 'inc/login.php';



$queryCount = $DBcon->query("SELECT * FROM `comment`");
$commentRows = $queryCount->num_rows;
$commentCount = $commentRows / 3;
$commentCount = ceil($commentCount); 



// // $pg = isset($_GET['pg']) ? $_GET['pg'] : 1;
// if ($pg < 1) {
//   $pg = 1;
// }
// $query = displayPag($pg,$DBcon);
// $query = $DBcon->query("SELECT * FROM `comment` LIMIT 3 OFFSET 0");
// // var_dump($comments);
// function displayPag($pg,$DBcon){
//    $start = (($pg-1)*3);
//    $query = $DBcon->query("SELECT * FROM `comment` LIMIT 3 OFFSET $start");
//    return $query;
// }



$pg = 1;
$offset = 0;
$query = $DBcon->query("SELECT * FROM `comment` LIMIT 3 OFFSET $offset");
$comments = $query->fetch_all(MYSQLI_ASSOC);
// $prevCommentPage = $pg !== 1 ? $pg - 1 : null;
// $nextCommentPage = $pg !== $commentPages ? $pg + 1 : '';
$prevCommentPage = null;
$nextCommentPage = 2;

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
      <div class="col-sm-12">
       <div class="media border mt-4 mb-4">
        <img src="img/demvy.png" alt="Generic placeholder image">
          <div class="media-body mr-1">
            <h5 class="mt-1">Какой-то заголовок</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias at molestiae id totam ipsum nam possimus eos fugit ad ipsam nostrum dicta, cum provident optio, eaque blanditiis? Fugit, ab, quo!</p>
            <div class="row">
              <div class="col-sm-12">
                <div class="island-com border">
                <h2 class="ml-2">Comments</h2>
                <div class="comments-block">
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
            </div>
              <div class="pagnation ">
                <nav aria-label="">
            <ul class="pagination mt-4">
              <?php
              if ($pg == 1) {
                echo "<li class='page-item disabled'>
                  <a class='page-link' id='pg-prev' href='#' tabindex='-1'>Предыдущая</a>
                </li>";
              } else {
                echo "<li class='page-item'>
                  <a class='page-link' id='pg-prev' data-pg='" . $prevCommentPage ."' href='post.php?pg=" . $prevCommentPage . "' tabindex='-1'>Предыдущая</a>
                </li>";
              }
              ?>
              <?php for ($i = 1; $i <= $commentCount; $i++) {
                  if ($i == $pg) { ?>
    <li class='page-item active'>
      <a class='page-link' id='pg-<?=$i;?>' data-pg="<?= $i; ?>" href='post.php?pg=<?= $i; ?>'><?= $i; ?></a></li>
                <?php } else { ?>
    <li class='page-item'>
      <a class='page-link' id='pg-<?=$i;?>' data-pg="<?= $i; ?>" href='post.php?pg=<?= $i; ?>'><?= $i; ?></a></li>
                <?php }
              }
              ?>
              <?php
              if ($pg == $commentCount) {
                echo "<li class='page-item disabled'>
                  <a class='page-link'  id='pg-next' href='#'>Следующая</a>
                </li>";
              } else {
                echo "<li class='page-item'>
                  <a class='page-link' id='pg-next' data-pg='" . ($pg+1) ."' href='post.php?pg=" . $nextCommentPage . "'>Следующая</a>
                </li>";
              }
              ?>
            </ul>
          </nav>
            </div>
              <div class="row">
                <div class="col-sm-12">
                  <button type="button" id="comment-toggle-btn" class="btn btn-primary ml-2 mt-2 mb-2">Комментировать</button>
                  <form method="POST" id="comment-form" class="ml-2">
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
                    <button type="submit" id="com-btn" class="btn btn-primary mb-2">Submit</button>
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
</div>



<?php
  include "inc/footer.html";
?>
</div>



<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/post-ajax.js"></script>
</body>
</html>

